<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index()
    {
        return view('pages.users.users');

    }

    public function getList(Request $request) {

       /* try { */

            $skip = $request->input('start') * $request->input('take');

            $filters = json_decode($request->input('filters'), true);

            $datos = User::leftJoin('users_status', 'users_status.id', 'users.status_id')

                    ->leftJoin('model_has_roles', 'model_has_roles.model_id', 'users.id')

                    ->leftJoin('roles', 'model_has_roles.role_id', 'roles.id');

            if ( $filters['name'] !== '') { $datos->where('users.name', 'LIKE', '%'.$filters['name'].'%');}

            $datos = $datos->orderby('users.name', 'asc');

            $total = $datos->select('users.id', 'users.name', 'users.status_id', 'users.email', 'roles.name as rol', 'roles.id as rol_id', 'users_status.status')->count();

            $list =  $datos->skip($skip)->take($request['take'])->get();

            $roles = Role::select('id', 'name')->get();

            $result = [

                'total' => $total,

                'list' =>  $list,

                'roles' => $roles,

            ];

            return response()->json($result, 200);

       /* } catch (\Exception $e) {

            return response()->json('A ocurrido un error al obtener los datos!', 500);
        } */

    }

    public function store(Request $request) {

        $data = $request->input('user');

        $user = User::where('name', $data['name'])->first();

        if (!empty($user)) return response()->json('Ya existe un usuario con ese email!', 500);


        $user = new User();

        $user->name = $data['name'];

        $user->email = $data['email'];

        $user->password = Hash::make($data['password']);

        $user->status_id = $data['status_id'];

        $user->save();


        $user->assignRole($data['rol']);

        return response()->json('Usuario creado con exito!', 200);
    }

    public function update(Request $request, $id) {

        $data = $request->input('user');

        $user = User::find($id);

        $user->name = $data['name'];

        $user->email = $data['email'];

        $user->password = Hash::make($data['password']);

        $user->status_id = $data['status_id'];

        $user->save();

        $roles =  (Role::select('name')->get())->pluck('name');

        foreach ( $roles as $rol) {

            $user->removeRole($rol);

        }

        $user->assignRole($data['rol']);

        return response()->json('Datos actualizados con exito!', 200);
    }

    public function destroy($id)  {

        User::destroy($id);

        return response()->json('Usuario eliminado con exito!', 200);
    }
}
