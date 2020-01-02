<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

abstract class BaseController
{
    protected $classe;

    public function index(Request $request)
    {
        return $this->classe::paginate($request->per_page); //se não passar o per page pela url, ele usa o padrao do Model
    }

    public function store(Request $request)
    {
        return response()
            ->json($this->classe::create($request->all()), 201); //201 = criado
    }

    public function show(int $id)
    {
        $recurso = $this->classe::find($id);
        if (is_null($recurso)) {
            return response()->json('', 204); //recurso não encontrado
        }
        return response()->json($recurso);
    }

    public function update(int $id, Request $request)
    {
        $recurso = $this->classe::find($id);
        if (is_null($recurso)) {
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }
        $recurso->fill($request->all());
        $recurso->save();

        return $recurso;
    }

    public function destroy(int $id)
    {
        $qtdadeRecursosRemovidos = $this->classe::destroy($id);
        if ($qtdadeRecursosRemovidos === 0) {
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }
        return response()->json('', 204);
    }
}
