<?php

namespace App\Models;

use LaravelArdent\Ardent\Ardent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;

use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Producto extends Ardent implements AuditableContract
{
    use Auditable, SoftDeletes;

    /**
     * Atributo de tabla del modelo
     *
     * @var array
     */
    protected $table = "producto";

    /**
     * Atributo de conexion a base de datos
     *
     * @var array
     */
    protected $connection = 'data';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion',
        'precio',
    ];

    /**
     * Reglas para los campos del modelo
     *
     * @var array
     */
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
