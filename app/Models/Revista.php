<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Revista extends Model
{
    use SoftDeletes;

    protected $table = 'revistas';

    protected $fillable = [
        'titulo',
        'issn',
        'numero',
        'anio_publicacion',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean',
        'anio_publicacion' => 'integer'
    ];

    public function articulos()
    {
        return $this->hasMany(Articulo::class, 'revista_id');
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }
}