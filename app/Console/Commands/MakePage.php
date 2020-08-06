<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakePage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:page {content}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command makes a controller in the namespace Page and generates a view.';

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
     * @param $content
     * @return int
     */
    public function handle($content)
    {
        Artisan::call('make:controller', [
            'name' => 'Pages/' . $content . 'Controller'
        ]);

        Artisan::call('make:view', [
            'name' => 'pages.' . strtolower(Str::plural($content, 2)),
            '--with-yields',
            '--extends=' => 'layouts.main',
        ]);

        $this->info('Controller and View created.');
    }
}
