<?php

namespace App\Http\Controllers;
use App\Models\usuario_doencas;
use Illuminate\Http\Request;

class UsuarioDoencasController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:view usuario_doencas', ['only' => ['index']]);
        $this->middleware('permission:view usuario_doencas', ['only' => ['show']]);
        $this->middleware('permission:create usuario_doencas', ['only' => ['store']]);
        $this->middleware('permission:update usuario_doencas', ['only' => ['update']]);
        $this->middleware('permission:delete usuario_doencas', ['only' => ['destroy']]);
    }

    /**
     * @OA\Get(
     *     path="/usuario_doencas",
     *     @OA\Response(response="200", description="Mostra a lista de todas as doenças")
     * )
     */
    public function index()
    {
        $usuario_doenca = usuario_doencas::all();
        return response()->json($usuario_doenca);
    }

    /**
     * @OA\Post(
     *     path="/usuario_doencas",
     *     @OA\Response(response="200", description="Cria uma linha na tabela usuário_doença")
     * )
     */
    public function store(Request $request)
    {
        $usuario_doenca= new usuario_doencas();
        $usuario_doenca->fill($request->all());
        $usuario_doenca->save();

        return response()->json($usuario_doenca, 201);
    }

    /**
     * @OA\Post(
     *     path="/usuario_doencas/{id}",
     *     @OA\Response(response="200", description="Modifica um elemento de uma linha na tabela usuário_doença especifica")
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/usuario_doencas/{id}",
     *     @OA\Response(response="200", description="Mostra uma linha na tabela usuário_doença especifica")
     * )
     */
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

    /**
     * @OA\Delete(
     *     path="/usuario_doencas/{id}",
     *     @OA\Response(response="200", description="Deleta uma linha na tabela usuário_doença especifica")
     * )
     */
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
