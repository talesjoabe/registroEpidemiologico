<?php

namespace App\Http\Controllers;
use App\Models\estados;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view estados', ['only' => ['index']]);
        $this->middleware('permission:view estados', ['only' => ['show']]);
        $this->middleware('permission:create estados', ['only' => ['store']]);
        $this->middleware('permission:update estados', ['only' => ['update']]);
        $this->middleware('permission:delete estados', ['only' => ['destroy']]);
    }

    /**
     * @OA\Get(
     *     path="/estados",
     *     @OA\Response(response="200", description="Mostra a lista de todos os estados")
     * )
     */
    public function index()
    {
        $estado = estados::all();
        return response()->json($estado);
    }

    /**
     * @OA\Post(
     *     path="/estados",
     *     @OA\Response(response="200", description="Cria um estado")
     * )
     */
    public function store(Request $request)
    {
        $estado= new estados();
        $estado->fill($request->all());
        $estado->save();

        return response()->json($estado, 201);
    }

    /**
     * @OA\Post(
     *     path="/estados/{id}",
     *     @OA\Response(response="200", description="Modifica um elemento de um estado especifica")
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/estados/{id}",
     *     @OA\Response(response="200", description="Mostra um estado especifico")
     * )
     */
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

    /**
     * @OA\Delete(
     *     path="/estados/{id}",
     *     @OA\Response(response="200", description="Deleta um estado especifico")
     * )
     */
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
