<?php

namespace App\Models;

use LaravelArdent\Ardent\Ardent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

class Producto extends Ardent
{
    use SoftDeletes;

    protected $table = "producto";

    protected $fillable = [
        'descripcion',
        'precio',
    ];

    public static $rules = [
        'descripcion' => 'required|between:3,80',
        'precio'      => 'required|integer',
    ];

    public function beforeSave(){
         $this->uuid = $this->uuid ? $this->uuid : (string) Uuid::generate(4);
    }

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
