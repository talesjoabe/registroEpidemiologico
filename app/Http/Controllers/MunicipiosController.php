<?php

namespace App\Http\Controllers;
use App\Models\municipios;
use Illuminate\Http\Request;

class MunicipiosController extends Controller
{
    public function index()
    {
        $municipio = municipios::all();
        return response()->json($municipio);
    }

    public function store(Request $request)
    {
        $municipio= new municipios();
        $municipio->fill($request->all());
        $municipio->save();

        return response()->json($municipio, 201);
    }

    public function update(Request $request, $id)
    {
        $municipio = municipios::find($id);

        if(!$municipio) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $municipio->fill($request->all());
        $municipio->save();

        return response()->json($municipio);
    }

    public function show($id)
    {
        $municipio = municipios::find($id);

        if(!$municipio) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response
        ()->json($municipio);
    }

    public function destroy($id)
    {
        $municipio = municipios::find($id);

        if(!$municipio) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $municipio->delete();
    }
}
