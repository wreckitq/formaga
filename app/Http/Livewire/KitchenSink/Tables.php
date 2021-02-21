<?php

namespace App\Http\Livewire\KitchenSink;

use Livewire\Component;

class Tables extends Component
{
    public $title = 'Tables Page';

    public function render()
    {
        return view('livewire.kitchen-sink.tables');
    }
}
