<?php

namespace App\Console\Commands;

use App\Models\Emploee;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestDataSelect extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:data-select';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        //$emploees = Emploee::all();

        //$emploees = Emploee::find(2);

        //$emploees = Emploee::where('id', '=', 2)->get();

        //echo $emploees['first_name'];

        //var_dump($emploees);

        //$emploees = Emploee::orderBy('age', 'DESC')->skip(2)->limit(2)->get();     // ASC - сортировка по возрастанию, DESC - по убыванию

        // $emploees = DB::table('emploees')
        //             ->groupBy('first_name')
        //             ->select('first_name', DB::raw('count(1) as emploee_total'))
        //             ->get();

        $emploees = Emploee::distinct()->orderBy('first_name')->get(['first_name']);

        foreach ($emploees as $emploee){
            //echo $emploee->first_name . ' ' . $emploee->id . ' ' . $emploee->age . PHP_EOL;
            //echo $emploee->first_name . ' ' . $emploee->emploee_total . PHP_EOL;
            echo $emploee->first_name . PHP_EOL;
        }

        return 0;
    }
}
