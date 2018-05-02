<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = "producto";

    protected $fillable = [
        'descripcion',
        'precio',
    ];

    public function scopeBuscar($query, $req)
    {
        return $query->where('descripcion', 'LIKE', '%'.$req.'%');
    }
}
