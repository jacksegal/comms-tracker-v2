<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateRoutes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:routes {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates restful routes for model';

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

        $model = $this->argument('model');


        $html = view('stubs/routes', [
            'model' => $model,
            'l' => '{',
            'r' => '}',
        ])->render();

        $this->info($html);

    }
}
