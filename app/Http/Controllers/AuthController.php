<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\User;


use stdClass;
class AuthController extends Controller {

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
                'email' => 'El correo debe ser un correo válido.'
            ], 422);
        }

        $credentials = $request -> only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'El correo o contraseña son incorrectos!'], 401);
        }

        $user = $request -> user();
        $tokenStr = $user -> createToken('auth_token') -> plainTextToken;
        $user -> remember_token = $tokenStr;
        $user -> save();

        return response()->json(['token' => $tokenStr, 'user' => $user], 200);
    }

    public function logout( $token ) {
        $tokenModel = PersonalAccessToken::findToken($token);

        if (!$tokenModel) {
            return response() -> json(['error' => 'Token no válido o usuario no autenticado'], 401);
        }

        $tokenId = $tokenModel -> id;
        $user = $tokenModel -> tokenable;

        $user -> tokens() -> where('id', $tokenId)  ->  delete();
        auth() -> logout();

        return response() -> json(['message' => 'Usuario cerró sesión exitosamente'], 200);
    }

    public function newUser( Request $request ) {

        $request -> validate([
            'nombre' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:'.User::class],
            'password' => ['required'],
            'ap_paterno' => ['required'],
            'ap_materno' => ['required'],
            'rol' => ['required'],
        ], [
            'email.unique' => 'Este correo ya fue registrado!',
            'password.regex' => 'La contraseña debe contener una mayuscula y minimo dos numeros sin repetir'
        ]);

        $user = User::create([
            'email' => $request -> email,
            'nombre' => $request -> nombre,
            'rol' => $request -> rol,
            'ap_paterno' => $request -> ap_paterno,
            'ap_materno' => $request -> ap_materno,
            'password' => Hash::make($request -> password)
        ]);
        return response()->json($user);
    }

    public function getAllUsers() {
        $users = User::where('rol', '!=', 'admin') -> get();
        return response()->json($users);
    }
}
