<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userList(){
        // $data = User::all();
        $data = DB::table('users')
                    ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->select('users.*', 'roles.name as role_name')
                    ->orderBy('id', 'asc')
                    ->get();
        // dd($data);
        return view('user.user-list', ['users' => $data]);
    }

    public function addUser(){
        $data = DB::table('roles')->get();

        return view('user.user-add', ['roles' => $data]);
    }

    public function saveUser(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ])->assignRole($request->role);
        return back();
    }

    public function editUser($id){
        $user = User::where('id', $id)->first();
        return view('user.user-edit', compact('user'));
    }

    public function updateUser(Request $request){
        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return back();
    }

    public function deleteUser($id){
        User::find($id)->delete();
        return back();
    }
}
