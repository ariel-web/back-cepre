<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
      
      $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
        //'remember_me' => 'boolean'
      ]);
      $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
        return response()->json([
        'message' => 'Unauthorized'
      ], 401);
      $user = $request->user();
      $tokenResult = $user->createToken('Personal Access Token');
      $token = $tokenResult->token;
      
      if ($request->remember_me)
      $token->expires_at = Carbon::now()->addWeeks(1);
      $token->save();

      $datos['nombres'] = $user->nombres;
      $datos['apellidos'] = $user->apellidos;

      $this->response['acces_token'] =  $tokenResult->accessToken;
      $this->response['estado'] = true;
      $this->response['datos'] = $datos;
      return response()->json($this->response, 200);

    }

    public function register(Request $request) {

      $request->validate([
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string'
      ]);

      $user = new User();
      $user->dni= $request->dni;
      $user->nombres= $request->nombres;
      $user->apellidos = $request->apellidos;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->save();
      return response()->json([
        'message' => 'Usuario Creado!'
      ], 201);
    }

    public function logout() {
      $user = Auth::guard('client')->user();
      $request->token()->revoke();
      return response()->json([ 'message' => 'Salió del Sistema']);
    }

    public function user(Request $request){
      $user =  auth('sanctum')->user();  
      return response()->json($user);
    }

}