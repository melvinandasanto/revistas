<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model
{
    use SoftDeletes;

    protected $table = 'autores';

    protected $fillable = [
        'nombre',
        'correo',
        'adscripcion',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean'
    ];

    public function articulos()
    {
        return $this->belongsToMany(Articulo::class, 'articulo_autor', 'autor_id', 'articulo_id')
                    ->withPivot('id', 'posicion', 'activo', 'deleted_at', 'created_at', 'updated_at')
                    ->withTimestamps();
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    public function articuloAutores()
    {
        return $this->hasMany(Articulo_Autor::class, 'autor_id');
    }
}