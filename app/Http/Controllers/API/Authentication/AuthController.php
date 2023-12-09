<?php

namespace App\Http\Controllers\API\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $this->validate($request, [
            'nama_warga' => 'required',
            'email' => 'required|email|unique:warga'
        ]);

        $data = \App\Models\User::create([
            'nama_warga' => $request->nama_warga,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if (!$data) {
            return response()->json([
                'message' => 'Error'
            ], 401);
        }

        return response()->json([
            'message' => 'Anda berhasil daftar!',
            'data' => $data
        ]);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => ['required']
        ]);

        if (!\Illuminate\Support\Facades\Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid login credentials'], 401);
        }

        $user = \App\Models\User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'data' => $user,
            'message' => 'Anda berhasil login!'
        ]);
    }
    public function getUser(Request $request)
    {
        $user = auth('sanctum')->user();

        return response()->json([
            "message" => "success",
            "data" => $user
        ]);
    }

    public function logout(Request $request)
    {
        $user = auth('sanctum')->user();
        $token_id = $user->currentAccessToken()->id;

        $user->tokens()->where('id', $token_id)->delete();

        return response()->json([
            "message" => "success",
        ]);
    }
    public function update(Request $request, $id_warga)
    {
        $user = \App\Models\User::find($id_warga);
        $user->update($request->except('password'));

        if ($request->password) {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        return response()->json([
            "message" => "success",
            "data" => $user
        ]);
    }
}