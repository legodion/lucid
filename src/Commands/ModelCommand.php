<?php

namespace Legodion\Lucid\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class ModelCommand extends GeneratorCommand
{
    protected $name = 'lucid:model';
    protected $type = 'Model';

    public function handle()
    {
        if (parent::handle() === false && !$this->option('force')) {
            return false;
        }

        if ($this->argument('name') == 'User') {
            $this->backupUserFiles();
        }

        if ($this->option('resource')) {
            $this->call('lucid:resource', [
                'name' => $this->argument('name'),
                '--force' => $this->option('force'),
            ]);
        }

        return 0;
    }

    protected function backupUserFiles()
    {
        $files = [
            database_path('factories/UserFactory.php'),
            database_path('migrations/2014_10_12_000000_create_users_table.php'),
        ];

        foreach ($files as $file) {
            if (file_exists($file)) {
                rename($file, $file . '.bak');
            }
        }
    }

    protected function getStub()
    {
        return $this->argument('name') == 'User'
            ? __DIR__ . '/../../stubs/UserModel.php'
            : __DIR__ . '/../../stubs/Model.php';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\Models';
    }

    protected function getOptions()
    {
        return [
            ['resource', 'r', InputOption::VALUE_NONE],
            ['force', null, InputOption::VALUE_NONE],
        ];
    }
}
