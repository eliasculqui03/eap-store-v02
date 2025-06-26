<?php

namespace App\Livewire;

use App\Helpers\CartMangement;
use App\Livewire\Partials\MenuMovil;
use App\Livewire\Partials\Navbar;
use App\Models\Producto;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detalle de producto')]
class ProductsDetailPage extends Component
{

    public $slug;
    public $cantidad = 1;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function incrementarCantidad()
    {
        $this->cantidad++;
    }
    public function decrementarCantidad()
    {
        if ($this->cantidad > 1) {
            $this->cantidad--;
        }
    }

    public function agregarCarrito($producto_id)
    {
        $num_carrito = CartMangement::addItemToCartWithQuantity($producto_id, $this->cantidad);

        $this->dispatch('actualizar-num-carrito', num_carrito: $num_carrito)->to(Navbar::class);

        $this->dispatch('actualizar-num-carrito', num_carrito: $num_carrito)->to(MenuMovil::class);
    }
    public function render()
    {
        return view(
            'livewire.products-detail-page',
            [
                'producto' => Producto::where('slug', $this->slug)->firstOrFail(),
            ]
        );
    }
}
