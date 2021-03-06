<?php

namespace App\Http\Controllers;
use App\Models\usuario_doencas;
use Illuminate\Http\Request;

class UsuarioDoencasController extends Controller
{
    public function index()
    {
        $usuario_doenca = usuario_doencas::all();
        return response()->json($usuario_doenca);
    }

    public function store(Request $request)
    {
        $usuario_doenca= new usuario_doencas();
        $usuario_doenca->fill($request->all());
        $usuario_doenca->save();

        return response()->json($usuario_doenca, 201);
    }

    public function update(Request $request, $id)
    {
        $usuario_doenca = usuario_doencas::find($id);

        if(!$usuario_doenca) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $usuario_doenca->fill($request->all());
        $usuario_doenca->save();

        return response()->json($usuario_doenca);
    }

    public function show($id)
    {
        $usuario_doenca = usuario_doencas::find($id);

        if(!$usuario_doenca) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response
        ()->json($usuario_doenca);
    }

    public function destroy($id)
    {
        $usuario_doenca = usuario_doencas::find($id);

        if(!$usuario_doenca) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $usuario_doenca->delete();
    }
}
