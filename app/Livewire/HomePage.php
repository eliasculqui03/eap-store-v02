<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Marca;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        $marcas = Marca::where('estado', 1)->get();

        $categorias = Categoria::where('estado', 1)->get();

        return view(
            'livewire.home-page',
            [
                'marcas' => $marcas,
                'categorias' => $categorias,
            ]
        );
    }
}
