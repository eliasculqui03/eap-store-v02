<?php

namespace App\Livewire\Partials;

use App\Helpers\CartMangement;
use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{

    public $num_carrito = 0;

    public function mount()
    {
        $this->num_carrito = count(CartMangement::getCartItemsFromCookie());
    }

    #[On('actualizar-num-carrito')]
    public function updateCartCount($num_carrito)
    {
        $this->num_carrito = $num_carrito;
    }

    public function render()
    {
        return view('livewire.partials.navbar');
    }
}
