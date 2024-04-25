<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component // created by this command (php artisan make:livewire CreatePoll).
{
    public $title; // all public properties of class CreatePoll will be passed to the view bellow

    public $options = ['First'];

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption() // an livewire action (is just a php function to add new empety element to options array)
    {
        $this->options[] = ''; // $this->options[] to add this value ('') at the end of this array
    }

    public function removeOption($index)
    {
        unset($this->options[$index]); // to remove element from the array
        $this->options = array_values($this->options); // to re generete the indexes of the array (remove the gaps of deleted elements)
    }

    public function createPoll()
    {
        $poll = Poll::create([                                  // 1- create a new poll with this title
            'title' => $this->title
        ]);

        foreach ($this->options as $optionName) {
            $poll->options()->create(['name' => $optionName]);  // 2- assosiate all options to the created poll by options() relation 
        }

        $this->reset(['title', 'options']);                     // 3- Livewire method to resete the form after creating each poll.
    }
}