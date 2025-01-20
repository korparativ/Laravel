<?php

namespace App\Console\Commands;

use App\Models\Emploee;
use Illuminate\Console\Command;

class TestDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:test_insert';

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
        $emploee = new Emploee();
        $emploee->first_name = 'John';
        $emploee->age = 21;
        $emploee->save();

        // $emploee = Emploee::where('id', 2)->first();
        // $emploee->first_name = 'Joseph';
        // $emploee->save();

        //Emploee::where('id', 3)->delete();

        return 0;
    }
}
