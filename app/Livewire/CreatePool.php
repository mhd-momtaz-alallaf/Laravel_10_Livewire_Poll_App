<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePool extends Component // created by this command (php artisan make:livewire CreatePool).
{
    public $title; // all public properties of class CreatePool will be passed to the view bellow

    public $options = ['First'];

    public function render()
    {
        return view('livewire.create-pool');
    }

    public function addOption() // an livewire action (is just a php function to add new empty element to optiions array)
    {
        $this->options[] = ''; // $this->options[] to add this value ('') at the end of this array
    }
}
