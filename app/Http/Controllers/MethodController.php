<?php

namespace App\Http\Controllers;

use App\Method;

class MethodController extends Controller
{
    public function method(Method $method)
    {
        return view('app.method', compact('method'));
    }

    public function exercise(Method $method)
    {
        $user = Auth::user();
        
        // Ensure the user is only related once
        $method->users()->syncWithoutDetaching($user);

        // TODO Return view with exercise
    }
}
