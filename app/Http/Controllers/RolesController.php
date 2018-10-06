<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        return view('pages.roles.roles');

    }

    public function getPermission ($role) {
       return response()->json((Role::findById($role)->permissions)->pluck('name'));
    }

    public function getList(Request $request) {

        try {

            $skip = $request->input('start') * $request->input('take');

            $filters = json_decode($request->input('filters'), true);

            $orders = json_decode($request->input('orders'), true);

            $datos = DB::table('roles');

            if ( $filters['name'] !== '') { $datos->where('name', 'LIKE', '%'.$filters['name'].'%');}

            $datos = $datos->orderby($orders['field'], $orders['type']);

            $total = $datos->select('*')->count();

            $list =  $datos->skip($skip)->take($request['take'])->get();

            $result = [

                'total' => $total,

                'list' =>  $list,

            ];

            return response()->json($result, 200);

        } catch (\Exception $e) {

            return response()->json('A ocurrido un error al obtener los datos!', 500);
        }

    }

    public function store(Request $request) {

        $rol = Role::where('name', $request->input('rol'))->first();

        if (!empty($rol)) { return response()->json('Ya existe un rol con esa descripción!', 500);}

        $role = Role::create(['name' => $request->input('rol')]);

        $role->givePermissionTo($request->input('permission'));

        return response()->json('Rol creado con exito!', 200);
    }

    public function update(Request $request, $id) {

        $permission = Permission::all();

        $role = Role::findById($id);

        $role->name = $request->input('rol');

        $role->save();

        $role->revokePermissionTo($permission);

        $role->givePermissionTo($request->input('permission'));

        return response()->json('Datos actualizados con exito!', 200);
    }

    public function destroy($id)  {

        $permission = Permission::all();

        $role = Role::findById($id);

        $role->revokePermissionTo($permission);

        $role->save();

        Role::destroy($id);

        return response()->json('Rol eliminado con exito!', 200);
    }

}
