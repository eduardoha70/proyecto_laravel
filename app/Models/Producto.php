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

    public function scopeFilter($query, $req)
    {
        $query = $query->select($this->table.'.*');
        if(!empty($req['query']))
        {
            $query = $query->query($req['query']);
        }
        return $query;
    }

    public function scopeQuery($query, $q)
    {
        return empty($q) ? $query : $query
            ->where('descripcion', 'LIKE', '%'.$q.'%');
    }
}
