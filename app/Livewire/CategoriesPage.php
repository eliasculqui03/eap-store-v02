<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Attributes\Title;
use Livewire\Component;

class CategoriesPage extends Component
{
    #[Title('Categorias - EAP Store')]


    public function render()
    {
        $categorias = Categoria::where('estado', 1)->get();

        return view(
            'livewire.categories-page',
            [
                'categorias' => $categorias,
            ]
        );
    }
}
