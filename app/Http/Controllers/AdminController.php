<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsersResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function index()
    {
        return view('app');
    }

    public function getUsers(Request $request) {
        $users = User::where('id_role', '>', 1)->get();
        return UsersResource::collection($users);
    }

    public function getRoles(Request $request) {
        $roles = Role::where('id', '>', 1)->get();
        return $roles;
    }

    public function updateUser(Request $request, $id) {
        $validator = Validator::make(
            $request->all(),
            [
                'id_role' => 'required',
                'email' => 'required',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $user = User::find($id);
        $user->id_role = $validator['id_role'];
        $user->email = $validator['email'];
        $user->save();
        return new UsersResource($user);
    }

    public function suspendre(Request $request, $id) {
        $user = User::find($id);
        $user->banned_until = 1;
        $user->save();
        return new UsersResource($user);
    }

    public function rajouter(Request $request, $id) {
        $user = User::find($id);
        $user->banned_until = 0;
        $user->save();
        return new UsersResource($user);
    }
}
