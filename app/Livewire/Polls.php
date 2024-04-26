<?php

namespace App\Livewire;

use Livewire\Component;

class Polls extends Component
{
    public function render() // we can pass the parameters by the traditional controllers way
    {
        $polls = \App\Models\Poll::with('options.votes')->latest()->get();

        return view('livewire.polls', ['polls' => $polls]);
    }
}
