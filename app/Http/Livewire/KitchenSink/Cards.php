<?php

namespace App\Http\Livewire\KitchenSink;

use Livewire\Component;

class Cards extends Component
{
    public $title = 'Cards';

    public function render()
    {
        return view('livewire.kitchen-sink.cards');
    }
}
