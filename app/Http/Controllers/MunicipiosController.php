<?php

namespace App\Http\Controllers;
use App\Models\municipios;
use Illuminate\Http\Request;

class MunicipiosController extends Controller
{
 function __construct()
    {
        $this->middleware('permission:view municipios', ['only' => ['index']]);
        $this->middleware('permission:view municipios', ['only' => ['show']]);
        $this->middleware('permission:create municipios', ['only' => ['store']]);
        $this->middleware('permission:update municipios', ['only' => ['update']]);
        $this->middleware('permission:delete municipios', ['only' => ['destroy']]);
    }

    /**
     * @OA\Get(
     *     path="/municipios",
     *     @OA\Response(response="200", description="Mostra a lista de todas as municipios")
     * )
     */
    public function index()
    {
        $municipio = municipios::all();
        return response()->json($municipio);
    }

    /**
     * @OA\Post(
     *     path="/municipios",
     *     @OA\Response(response="200", description="Cria um municipio")
     * )
     */
    public function store(Request $request)
    {
        $municipio= new municipios();
        $municipio->fill($request->all());
        $municipio->save();

        return response()->json($municipio, 201);
    }

    /**
     * @OA\Post(
     *     path="/municipios/{id}",
     *     @OA\Response(response="200", description="Modifica um elemento de um municipio especifico")
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/municipios/{id}",
     *     @OA\Response(response="200", description="Mostra um municipio especifico")
     * )
     */
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

    /**
     * @OA\Delete(
     *     path="/municipios/{id}",
     *     @OA\Response(response="200", description="Deleta um municipio especifico")
     * )
     */
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
