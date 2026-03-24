<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model
{
    use SoftDeletes;

    protected $table = 'articulos';

    protected $fillable = [
        'titulo',
        'pag_inicio',
        'pag_fin',
        'revista_id',
        'activo'
    ];

    protected $casts = [
        'pag_inicio' => 'integer',
        'pag_fin' => 'integer',
        'activo' => 'boolean'
    ];

    public function revista()
    {
        return $this->belongsTo(Revista::class, 'revista_id');
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'articulo_autor', 'articulo_id', 'autor_id')
                    ->withPivot('id', 'posicion', 'activo', 'deleted_at', 'created_at', 'updated_at')
                    ->withTimestamps()
                    ->orderBy('articulo_autor.posicion');
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }
}