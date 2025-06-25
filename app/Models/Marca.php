<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'slug',
        'imagen',
        'estado',
    ];

    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
}
