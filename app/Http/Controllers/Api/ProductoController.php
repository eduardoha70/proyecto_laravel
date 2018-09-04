<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Api\ApiController;
use App\Models\Producto;

class ProductoController extends ApiController
{
    function __construct(Producto $model)
    {
        parent::__construct($model, '\App\Http\Resources\ProductoResource');
    }
}

