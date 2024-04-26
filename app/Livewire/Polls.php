<?php

namespace App\Livewire;

use Livewire\Component;

class Polls extends Component
{
    protected $listeners = [
        'pollCreated' => 'render' // this lestener will call the render method each time the pollCreated dispatch method is called in the CreatePoll class.
    ];

    public function render() // we can pass the parameters by the traditional controllers way
    {
        $polls = \App\Models\Poll::with('options.votes')->latest()->get();

        return view('livewire.polls', ['polls' => $polls]);
    }
}
