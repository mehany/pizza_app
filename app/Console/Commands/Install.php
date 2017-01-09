<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mockery\CountValidator\Exception;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate secret key, create sqlite database, and run migrations';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //exec('php artisan key:generate && touch database/database.sqlite && php artisan migrate');

        $tasks = [
            "php -r \"file_exists('.env') || copy('.env.example', '.env');\"",
            'php artisan key:generate',
            'touch database/database.sqlite',
            'php artisan migrate:refresh'
        ];

        $bar = $this->output->createProgressBar(count($tasks));

        foreach ($tasks as $key => $task) {

            $this->info('Running : '. $task);

            try{
                
                exec($task);
                $bar->advance(); echo ($key+1 != count($tasks))? PHP_EOL : '';

            }catch(\Exception $e){
                $this->error($e);
            }
        }

        $bar->finish();

        echo PHP_EOL;

        return;
    }
}