<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Products extends Component
{

    public $selectedProducts = [];
    public $selectAll = false;
    public $bulkDisable = true;
    public $designTemplate = 'tailwind';

    public function __construct()
    {
        //
    }

    public function render()
    {
        $this->bulkDisable = count($this->selectedProducts) < 1;

        return view('livewire.'.$this->designTemplate.'.products'.[
            'products' => Products::with('category')->get()
            ]);
    }
}
