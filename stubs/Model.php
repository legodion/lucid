<?php

namespace DummyNamespace;

use Faker\Generator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Legodion\Lucid\Traits\HasNewFactory;

class DummyClass extends Model
{
    use HasNewFactory;

    protected $guarded = [];

    public function migration(Blueprint $table)
    {
        $table->id();
        $table->string('name');
        $table->timestamp('created_at')->nullable();
        $table->timestamp('updated_at')->nullable();
    }

    public function definition(Generator $faker)
    {
        return [
            'name' => $faker->firstName(),
            'created_at' => $faker->dateTimeThisMonth(),
        ];
    }
}
