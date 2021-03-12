<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doencas;

class DoencasController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:view doencas', ['only' => ['index']]);
         $this->middleware('permission:view doencas', ['only' => ['show']]);
         $this->middleware('permission:create doencas', ['only' => ['store']]);
         $this->middleware('permission:update doencas', ['only' => ['update']]);
         $this->middleware('permission:delete doencas', ['only' => ['destroy']]);
    }

    /**
     * @OA\Get(
     *     path="/doencas",
     *     @OA\Response(response="200", description="Mostra a lista de todas as doenças")
     * )
     */
    public function index()
    {
        $doenca = doencas::all();
        return response()->json($doenca);
    }


    /**
     * @OA\Post(
     *     path="/doencas",
     *     @OA\Response(response="200", description="Cria uma doença")
     * )
     */
    public function store(Request $request)
    {
        $doenca= new doencas();
        $doenca->fill($request->all());
        $doenca->save();

        return response()->json($doenca, 201);
    }
    /**
     * @OA\Post(
     *     path="/doencas/{id}",
     *     @OA\Response(response="200", description="Modifica um elemento de uma doença especifica")
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/doencas/{id}",
     *     @OA\Response(response="200", description="Mostra uma doença especifica")
     * )
     */
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

    /**
     * @OA\Delete(
     *     path="/doencas/{id}",
     *     @OA\Response(response="200", description="Deleta uma doença especifica")
     * )
     */
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
