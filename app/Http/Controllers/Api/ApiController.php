<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public $model;
    public $resource;

    public function __construct($model, $resource)
    {
        $this->model = $model;
        $this->resource = $resource;
    }

    /**
     * Display a listing of the transformer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $this->model;
        $limit = $request->limit ? $request->limit : 10;

        if (method_exists($query, 'scopeFilter')) {
            $query = $query->filter($request->all());
        }

        return $this->resource::collection($query->paginate($limit));
    }

    /**
     * Store a newly created transformer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $registro = new $this->model;
        $registro->fill($request->all());

        if (!$registro->save()) {
            $errors = $registro->errors();
            throw new \Exception($errors);
        }
        $response = [
            'message'  =>  'created',
            'data'     =>  $registro
        ];

        return $response;
    }

    /**
     * Display the specified transformer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        return new $this->resource($this->model::find($id));
    }

    /**
     * Update the specified transformer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $registro = $this->model::where('id', $id)->firstOrFail();
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
     * Remove the specified transformer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $registro = $this->model::where('id', $id)->firstOrFail();

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

