<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use App\Models\Producto;
use App\Http\Resources\Producto as ProductoResource;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit ? $request->limit : 5;
        $query = ProductoResource::collection(Producto::paginate($limit));
        return $query;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registro = new Producto;
        $registro->fill($request->all());

        if (!$registro->save()) {
            $errors = $registro->errors();
            throw new \Exception($errors);
        }
        $response = [
            'message'   =>  'created',
            'id'        =>  $registro->id
        ];

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductoResource(Producto::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return new ProductoResource(Producto::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $registro = Producto::where('id', $id)->firstOrFail();
        $registro->fill($request->all());

        if (!$registro->save()) {
            $errors = $registro->errors();
            throw new \Exception($errors);
        }
        $response = [
            'message'   =>  'updated',
            'id'        =>  $registro->id
        ];

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = Producto::where('id', $id)->firstOrFail();

        if (!$registro->delete()) {
            $errors = $registro->errors();
            throw new \Exception($errors);
        }
        $response = [
            'message'   =>  'deleted',
            'id'        =>  $registro->id
        ];

        return $response;
    }
}
