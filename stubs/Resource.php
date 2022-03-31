<?php

namespace DummyNamespace;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class DummyClass extends Resource
{
    public static $model = \App\Models\DummyClass::class;
    public static $title = 'name';
    public static $search = ['id', 'name'];

    public function fields(Request $request)
    {
        return [
            ID::make()
                ->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),
        ];
    }

    public function cards(Request $request)
    {
        return [];
    }

    public function filters(Request $request)
    {
        return [];
    }

    public function lenses(Request $request)
    {
        return [];
    }

    public function actions(Request $request)
    {
        return [];
    }
}
