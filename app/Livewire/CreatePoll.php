<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component // created by this command (php artisan make:livewire CreatePoll).
{
    public $title; // all public properties of class CreatePoll will be passed to the view bellow

    public $options = ['First'];

    protected $rules = [ // livewire array to add validation rules 
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:1|max:10', // to add validation rules to the array itself (min one option, max 10 options)
        'options.*' => 'required|min:1|max:255' // 'options.*' to add validation rules for each element of the options array (for each option)
    ];

    protected $messages = [ // livewire array to specify a custom error message for a specified property
        'options.*' => 'The option can\'t be empty.' // a custom error message for each option in the options array
    ];

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

    public function updated($propertyName) // livewire method to have a realtime validation for all class properties (just if any property updated it will only update the validation for it)
    {
        $this->validateOnly($propertyName);
    }

    public function createPoll()
    {
        $this->validate(); // will validate the request with the rules specified in the rules() method

        Poll::create([                                  // 1- create a new poll with this title
            'title' => $this->title
        ])->options()->createMany( // more laravel way to assosiate all options to the created poll, so we will use createMany to create more than one relation
            collect($this->options) // convert the options array to a collection to use the map collection method.
                ->map(fn($option) => ['name' => $option]) // map method allow us to access each collection item and perform some opperations on it, so we will convert each option item to array have key name and its value, so now the map have a collection object (options) that have array of arrays
                ->all() // to convert the final collection to an array beacause createMany() accepts arrays.
        );

        // foreach ($this->options as $optionName) {    // 2- assosiate all options to the created poll by options() relation 
        //     $poll->options()->create(['name' => $optionName]);  
        // }

        $this->reset(['title', 'options']);             // 3- Livewire method to resete the form after creating each poll.
    }
}