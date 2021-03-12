<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;



class RoleController extends Controller

{
    public $guard_name = 'api';

    function __construct()
    {
        $this->middleware('permission:view roles', ['only' => ['index']]);
        $this->middleware('permission:view roles', ['only' => ['show']]);
        $this->middleware('permission:create roles', ['only' => ['store']]);
        $this->middleware('permission:update roles', ['only' => ['update']]);
        $this->middleware('permission:delete roles', ['only' => ['destroy roles']]);
    }

    /**
     * @OA\Get(
     *     path="/roles",
     *     @OA\Response(response="200", description="Mostra todos os perfis")
     * )
     */
    public function index(Request $request)

    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return response()->json($roles);

    }

    public function create()
    {
        $permission = Permission::get();
        return response()->json($permission);
    }


    /**
     * @OA\Post(
     *     path="/roles/{id}",
     *     @OA\Response(response="200", description="Cria um perfil")
     * )
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return response()->json($role);
    }

    /**
     * @OA\Get(
     *     path="/roles/{id}",
     *     @OA\Response(response="200", description="Mostra um perfil especifico")
     * )
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
        return response()->json($rolePermissions);
    }

    public function edit($id)

    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return response()->json($rolePermissions);
    }


    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($request->input('permission'));

        return response()->json($role);
    }

    /**
     * @OA\Delete(
     *     path="/roles/{id}",
     *     @OA\Response(response="200", description="Deleta um perfil especifico")
     * )
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $this->authorize('delete', $role);
        $role->delete();

        return response()->json($role);
    }
}
