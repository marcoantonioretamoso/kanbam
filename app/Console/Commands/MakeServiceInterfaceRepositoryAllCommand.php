<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeServiceInterfaceRepositoryAllCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:sir {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service and interface and repository class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        $this->call('make:repository', [
            'name' => $name . 'Repository'
        ]);

        $this->call('make:service', [
            'name' => $name . 'Service'
        ]);

        $this->call('make:interface', [
            'name' => $name . 'Interface'
        ]);
    }
}
