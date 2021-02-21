<?php

namespace App\Http\Livewire\KitchenSink;

use Livewire\Component;

class Buttons extends Component
{
    public $title = 'Buttons';

    public function render()
    {
        return view('livewire.kitchen-sink.buttons');
    }
}
