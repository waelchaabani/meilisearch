<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use MeiliSearch\Client;
use Str;

class MillisearchUpdate extends Command
{
    private $client;
    private $models;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'millisearch:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->client = new Client(config('millisearch.host'));
        $this->models = ['post','category'];
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle():void
    {
        /* Settings */
        $this->client->index('posts')->updateFilterableAttributes(['category_id']);
         /* Flush & Import */
        foreach($this->models as $model) {
            $model_name = Str::studly($model);
            $model_class = "App\\Models\\$model_name";
            $this->line(shell_exec('php artisan scout:flush ' . '"' . $model_class . '"'));
            $this->line(shell_exec('php artisan scout:import ' . '"' . $model_class . '"'));
        }

         
    }
}
