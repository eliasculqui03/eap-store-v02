<?php

namespace App\Livewire;

use App\Helpers\CartMangement;
use App\Livewire\Partials\MenuMovil;
use App\Livewire\Partials\Navbar;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Productos - EAP Store')]

class ProductsPage extends Component
{
    use WithPagination;


    //protected $paginationTheme = 'custom-pagination';

    #[Url]
    public $selected_categorias = [];

    #[Url]
    public $selected_marcas = [];

    #[Url]
    public $destacado;

    #[Url]
    public $en_venta;

    #[Url]
    public $precio_rango = 25000;

    #[Url]
    public $clasificar = 'ultimo';

    public function agregarCarrito($producto_id)
    {

        $num_carrito = CartMangement::addItemToCart($producto_id);

        $this->dispatch('actualizar-num-carrito', num_carrito: $num_carrito)->to(Navbar::class);
        $this->dispatch('actualizar-num-carrito', num_carrito: $num_carrito)->to(MenuMovil::class);
    }

    public function render()
    {

        $productosQuery = Producto::where('estado', 1);

        if (!empty($this->selected_categorias)) {
            $productosQuery->whereIn('categoria_id', $this->selected_categorias);
        }


        if (!empty($this->selected_marcas)) {
            $productosQuery->whereIn('marca_id', $this->selected_marcas);
        }

        if ($this->destacado) {
            $productosQuery->where('destacado', 1);
        }


        if ($this->en_venta) {
            $productosQuery->where('en_venta', 1);
        }

        if ($this->precio_rango) {
            $productosQuery->whereBetween('precio', [0, $this->precio_rango]);
        }

        if ($this->clasificar == 'ultimo') {
            $productosQuery->latest();
        }

        if ($this->clasificar == 'precio') {
            $productosQuery->orderBy('precio');
        }
        return view(
            'livewire.products-page',
            [
                'productos' => $productosQuery->paginate(3),
                'marcas' => Marca::where('estado', 1)->get(['id', 'nombre', 'slug']),
                'categorias' => Categoria::where('estado', 1)->get(['id', 'nombre', 'slug']),

            ]
        );
    }
}
