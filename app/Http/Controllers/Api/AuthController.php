<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Validator;

class AuthController extends Controller
{

    public function test (Request $request){
        return response()->json(['status' => 'OK'], 200);
    }

    public function testOauth (Request $request){
        $user = Auth::user();

        return response()->json(['user' => $user], 200);
    }
    

    public function register (Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 422);
        }

        $input = $request->all();
        $input["password"] = bcrypt($request->password);

        $user = User::create($input);
        $token = $user->createToken("MyAppRandomName")->accessToken;

        return response()->json(['token' => $token, 'user' => $user], 200);

    }

}