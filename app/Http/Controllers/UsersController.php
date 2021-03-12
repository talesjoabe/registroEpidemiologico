<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;


class UsersController extends Controller
{
    protected $guard_name ='api';
    function __construct()
    {
        $this->middleware('permission:view users', ['only' => ['index']]);
        $this->middleware('permission:view users', ['only' => ['show']]);
        $this->middleware('permission:create users', ['only' => ['store']]);
        $this->middleware('permission:update users', ['only' => ['update']]);
        $this->middleware('permission:delete users', ['only' => ['destroydelete users']]);
    }

    /**
     * @OA\Get(
     *     path="/users",
     *     @OA\Response(response="200", description="Mostra a lista de todos as users")
     * )
     */
    public function index()
    {
        $User = User::all();
        return response()->json($User);
    }

    /**
     * @OA\Post(
     *     path="/users",
     *     @OA\Response(response="200", description="Cria um user")
     * )
     */
    public function store(Request $request)
    {
        $User= new User();
        $User->fill($request->all());
        $User->save();

        return response()->json($User, 201);
    }

    /**
     * @OA\Post(
     *     path="/users/{id}",
     *     @OA\Response(response="200", description="Modifica um elemento de um user especifico")
     * )
     */
    public function update(Request $request, $id)
    {
        $User = User::find($id);

        if(!$User) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $User->fill($request->all());
        $User->save();

        return response()->json($User);
    }

    /**
     * @OA\Get(
     *     path="/users/{id}",
     *     @OA\Response(response="200", description="Mostra um user especifico")
     * )
     */
    public function show($id)
    {
        $User = User::find($id);

        if(!$User) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response
        ()->json($User);
    }

    /**
     * @OA\Delete(
     *     path="/users/{id}",
     *     @OA\Response(response="200", description="Deleta um user especifico")
     * )
     */
    public function destroy($id)
    {
        $User = User::find($id);

        if(!$User) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $User->delete();
    }

    /**
     * @OA\Get(
     *     path="/users/{user}/date_group",
     *     @OA\Response(response="200", description="Mostra a qual faixa etária o usuário pertence")
     * )
     */
    public function getGrupo($id){
        $user = User::find($id);

        $current_date = date('Y-m-d');
        $current_date = Carbon::createFromFormat('Y-m-d', $current_date);
        $birth_date = date_create($user->data_de_nascimento);
        $years = $current_date->diffInYears($birth_date);

        $grupo = null;
        if($years>=0 and $years<=18) $grupo = 0; // "00-18";
        elseif($years>=19 and $years<=25) $grupo = 1; // "19-25";
        elseif($years>=26 and $years<=35) $grupo = 2; // "26-35";
        elseif($years>=36 and $years<=50) $grupo = 3; // "36-50";
        elseif($years>=51 and $years<=60) $grupo = 4; //"51-60";
        elseif($years>=61 and $years<=70) $grupo = 5; //"61-70";
        elseif($years>=71 and $years<=80) $grupo = 6;//"71-80";
        elseif($years>=81 and $years<=100) $grupo = 7;//"81-100";
        else $grupo = null;

        return response()->json($grupo);
    }

    /**
     * @OA\Get(
     *     path="users/role",
     *     @OA\Response(response="200", description="Mostra quais usuários tem o perfil Administrador")
     * )
     */
    public function getUsersRole(){
         $users = User::with(['roles' => function ($query) {
                      $query->where('name', '=', 'Administrador');
                  }])->get();
        return response()->json($users);
    }
}
