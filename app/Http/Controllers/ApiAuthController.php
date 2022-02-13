<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|confirmed|min:5|max:30',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 409);
        }
 
        $access_token = Str::random(64);
 
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'access_token' => $access_token,
        ]);
 
        return response()->json([
            'access_token' => $access_token,
        ], 201);
    }
 
 
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:5|max:30',
        ]);
 
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 409);
        }
 
        $user = User::where('email', '=', $request->email)->first();
 
        if ($user !== null) {
            $passwordCorrect = Hash::check($request->password, $user->password);
            if ($passwordCorrect) {
                $access_token = Str::random(64);
 
                $user->update([
                    'access_token' => $access_token
                ]);
 
                return response()->json([
                    'access_token' => $access_token,
                ], 201);
            } else {
                return response()->json(['msg' => 'password not correct']);
            }
        } else {
            return response()->json(['msg' => 'email not found']);
        }
    }
 
    public function logout(Request $request)
    {
        $access_token = $request->header('access_token');
        $user = User::where('access_token', '=', $access_token)->first();
 
        $user->update([
            'access_token' => null
        ]);
 
        return response()->json([
            'msg' => 'logged out successfully',
        ], 200);
    }

}
