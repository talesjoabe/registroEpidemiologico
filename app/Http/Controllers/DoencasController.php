<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doencas;

class DoencasController extends Controller
{

    public function index()
    {
        $doenca = doencas::all();
        return response()->json($doenca);
    }

    public function store(Request $request)
    {
        $doenca= new doencas();
        $doenca->fill($request->all());
        $doenca->save();

        return response()->json($doenca, 201);
    }

    public function update(Request $request, $id)
    {
        $doenca = doencas::find($id);

        if(!$doenca) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }
        $doenca->fill($request->all());
        $doenca->save();

        return response()->json($doenca);
    }

    public function show($id)
    {
        $doenca = doencas::find($id);

        if(!$doenca) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response
        ()->json($doenca);
    }

    public function destroy($id)
    {
        $doenca = doencas::find($id);

        if(!$doenca) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $doenca->delete();
    }

}
