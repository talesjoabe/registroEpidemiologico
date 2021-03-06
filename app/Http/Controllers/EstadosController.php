<?php

namespace App\Http\Controllers;
use App\Models\estados;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    public function index()
    {
        $estado = estados::all();
        return response()->json($estado);
    }

    public function store(Request $request)
    {
        $estado= new estados();
        $estado->fill($request->all());
        $estado->save();

        return response()->json($estado, 201);
    }

    public function update(Request $request, $id)
    {
        $estado = estados::find($id);

        if(!$estado) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $estado->fill($request->all());
        $estado->save();

        return response()->json($estado);
    }

    public function show($id)
    {
        $estado = estados::find($id);

        if(!$estado) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response
        ()->json($estado);
    }

    public function destroy($id)
    {
        $estado = estados::find($id);

        if(!$estado) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $estado->delete();
    }
}
