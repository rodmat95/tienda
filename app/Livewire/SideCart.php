<?php

namespace App\Livewire;

use Livewire\Component;

class SideCart extends Component
{
    public $openCart = true;

    public function closeCart()
    {
        $this->openCart = false;
    }
    
    public function render()
    {
        return view('livewire.side-cart');
    }
}
