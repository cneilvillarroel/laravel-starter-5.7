<?php

namespace App\Http\Controllers\Web;

use App\User;
use App\Http\Controllers\Controller;

// requerido para manejar errores de validation
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index(){
        return view('frontend.usuarios.usuarios', ['users' => User::all()]);
    }   


    public function editar($id = null){
        if($id){
            $user = User::find($id);
        }else{
            $user = new User;
        }
        return view('frontend.usuarios.usuarios-crud', ['user' => $user]);
    }   

    public function actualizar(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'sometimes|min:6|confirmed',
        ]);
        
        if($request->id){
            $user = User::find($request->id);
        }else{
            $user = new User;        
            $user->password = bcrypt($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        
        return view('frontend.usuarios.usuarios', ['users' => User::all()]);
    }   

    public function eliminar($id){
        $user = User::find($id);
        $user->delete();
        return view('frontend.usuarios.usuarios', ['users' => User::all()]);
    }   

    /*
    public function show($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
    */
}