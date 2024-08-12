<?php

namespace App\Http\Controllers;

use App\ExampleServiceContainer;
use App\Models\User;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function __invoke(ExampleServiceContainer $exampleServiceContainer)
    {
        // dump($exampleServiceContainer->var);
        // $exampleServiceContainer->var = 'B';
        // dump($exampleServiceContainer->var);

        // $exampleServiceContainer = app(ExampleServiceContainer::class);

        // dump($exampleServiceContainer->var);
        

    }
}
