<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo_Autor extends Pivot
{
    use SoftDeletes;

    protected $table = 'articulo_autor';

    public $incrementing = true;

    protected $fillable = [
        'articulo_id',
        'autor_id',
        'posicion',
        'activo'
    ];

    protected $casts = [
        'posicion' => 'integer',
        'activo' => 'boolean'
    ];

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'articulo_id');
    }

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }
}