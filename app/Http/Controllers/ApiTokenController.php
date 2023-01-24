<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiTokenController extends Controller
{
    public function createToken(Reuest $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => ['required', 'string', 'max 255'],
            'password' => ['required', 'string', 'min:8'],
            'device_name' => ['required', 'string'],
        ]);
        if ($validate->fails()) {
            return response()->json(['err' => $validate->errors()]);
        }
        $user = User::query()->where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['err' => 'user not found',401]);
        }
        $token=$user->createToken($request->device_name);
        return['token'=>$token->plainTextToken];
    }

}
