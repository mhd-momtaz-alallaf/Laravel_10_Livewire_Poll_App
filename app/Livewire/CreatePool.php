<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePool extends Component // created by this command (php artisan make:livewire CreatePool).
{
    public $title; // all public properties of class CreatePool will be passed to the view bellow

    public function render()
    {
        return view('livewire.create-pool');
    }
}
