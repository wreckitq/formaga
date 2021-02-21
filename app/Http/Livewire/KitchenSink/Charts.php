<?php

namespace App\Http\Livewire\KitchenSink;

use Livewire\Component;

class Charts extends Component
{
    public $title = 'Charts';

    public function render()
    {
        return view('livewire.kitchen-sink.charts');
    }
}
