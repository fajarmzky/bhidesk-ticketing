<?php

namespace App\Http\Controllers\Auth;

use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB;
use Session;


class UserController extends Controller
{
    public function getAllUsers(){
        $user = users::all();

        return view('user.index',compact('user'));
    }

    public function addUsers(Request $request){
        $this->validate($request, [
            'name'   => 'required', 'string', 'max:255',
            'email'   => 'required', 'string', 'email', 'max:255', 'unique:users',
            'telephone' => 'required',
            'password'    => 'required', 'string', 'min:6', 'confirmed',
            'role'  => 'required',
        ]);

        $user = new users;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return response()->json([
            'success'    => true,
            'message'    => 'User Created'
        ]);
    }

    public function editUsers($id)
    {
        $data = users::where('id', $id)->first();
        return $data;
    }

    public function updateUsers(Request $request, $id)
    {
        $this->validate($request, [
            'name'   => 'required', 'string', 'max:255',
            'email'   => 'required', 'string', 'email', 'max:255', 'unique:users',
            'telephone' => 'required',
            'password'    => 'required', 'string', 'min:6', 'confirmed',
            'role'  => 'required',
        ]);
        $user = users::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->update();

        return response()->json([
            'success'    => true,
            'message'    => 'User updated'
        ]);
    }

    public function deleteUsers($id){
        $deleteUser = DB::delete('delete from users where id = ?', [$id]);

        return response()->json([
            'success'    => true,
            'message'    => 'Data Deleted'
        ]);
    }
}