<?php

namespace App\Http\Controllers;

use App\Method;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $completedMethods = $user->methods()->wherePivot('completed', true)->count();

        $totalMethods = Method::count();

        return view('app.index', compact('completedMethods', 'totalMethods'));
    }
}
