<?php

namespace App\Livewire;

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

    public function agregarCarrito($producto_id) {}
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
