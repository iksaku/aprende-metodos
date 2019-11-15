<?php

namespace App\Http\Controllers;

use App\Method;

class MethodController extends Controller
{
    public function method(Method $method)
    {
        return view('app.method', compact('method'));
    }
}
