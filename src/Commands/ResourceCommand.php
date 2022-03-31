<?php

namespace Legodion\Lucid\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class ResourceCommand extends GeneratorCommand
{
    protected $name = 'lucid:resource';
    protected $type = 'Resource';

    public function handle()
    {
        if (parent::handle() === false && !$this->option('force')) {
            return false;
        }

        if ($this->option('model')) {
            $this->call('lucid:model', [
                'name' => $this->argument('name'),
                '--force' => $this->option('force'),
            ]);
        }

        return 0;
    }

    protected function getStub()
    {
        return $this->argument('name') == 'User'
            ? __DIR__ . '/../../stubs/UserResource.php'
            : __DIR__ . '/../../stubs/Resource.php';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\Nova';
    }

    protected function getOptions()
    {
        return [
            ['model', 'm', InputOption::VALUE_NONE],
            ['force', null, InputOption::VALUE_NONE],
        ];
    }
}
