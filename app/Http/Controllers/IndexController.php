<?php

namespace App\Http\Controllers;

use App\Method;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('app.index', [
            'completedMethods' => Auth::user()->completed_methods_count,
            'totalMethods' => Method::count()
        ]);
    }
}
