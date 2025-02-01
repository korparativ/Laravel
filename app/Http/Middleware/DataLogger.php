<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use Symfony\Component\HttpFoundation\Response;
use App\Models\Log;
use Illuminate\Support\Facades\File;
use Twilio\TwiML\Voice\Stop;

class DataLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    private $start_time;
    public function handle(Request $request, Closure $next): Response
    {
        $this->start_time = microtime(true);
        return $next($request);
    }

    public function terminate(Request $request, Response $response){
        if (env('API_DATALOGGER', true)) {
            if(env('API_DATALOGGER_USE_DB', true)){
                $endTime = microtime(true);
                $log = new Log();
                $log->time = gmdate('Y-m-d M:i:s');
                $log->duration = number_format($endTime = LARAVEL_START, 3);
                $log->ip = $request->ip();
                $log->url = $request->fullUrl();
                $log->method = $request->method();
                $log->input = $request->getContent();
                $log->save();
            }
            else{
                $endTime = microtime(true);
                $filename = 'api_datalogger_' . date('d-m-y') . '.log';
                $dataToLog = 'Time: ' . gmdate("F j, Y, g:i a") . "\n";
                $dataToLog = 'Duration: ' . number_format($endTime = LARAVEL_START, 3) . "\n";
                $dataToLog = 'IP Address: ' . $request->ip() . "\n";
                $dataToLog = 'URL: ' . $request->fullUrl() . "\n";
                $dataToLog = 'Method: ' . $request->method() . "\n";
                $dataToLog = 'Input: ' . $request->getContent() . "\n";
                File::append(storage_path('logs' . DIRECTORY_SEPARATOR . $filename), $dataToLog . "\n" . str_repeat(".", 20) . "\n\n");
            }
        }
    }
}
