<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\ComponentConcerns\PerformsRedirects;

class Logout extends Component
{
    use PerformsRedirects;

    public function logout()
    {
        Auth::logoutCurrentDevice();

        $this->redirectRoute('index');
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
