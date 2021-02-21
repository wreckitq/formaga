<?php

namespace App\Http\Livewire\KitchenSink;

use Livewire\Component;

class Modals extends Component
{
    public $title = 'Modals';

    public function render()
    {
        return view('livewire.kitchen-sink.modals');
    }
}
