<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ApiController extends Controller
{
    public function login(Request $request)
    {
    	 $input = $request->only('email', 'password');
        $jwt_token = null;
 
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }
 
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
    }
 
     public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        try {
            JWTAuth::invalidate($request->token);
 
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
 
    public function getAuthUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        $user = JWTAuth::authenticate($request->token);
 
        return response()->json(['user' => $user]);
    }

    public function show($id)
    { 
        $user = User::find($id);
    
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user with id cannot be found'
            ], 400);
        }
    
        return $user;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password'=>'required'
        ]);
    
        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password =Hash::make($request->password);
    
        if ($user->save())
            return response()->json([
                'success' => true,
                'user' => $user
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user could not be added'
            ], 500);
    }

    public function update(Request $request, $id)
    {
    	dd('hhh');
        $user = User::find($id);
    
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user with id ' . $id . ' cannot be found'
            ], 400);
        }
    
        $updated = $user->fill($request->all())
            ->save();
    
        if ($updated) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user could not be updated'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $user = $this->user->users()->find($id);
    
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user with id ' . $id . ' cannot be found'
            ], 400);
        }
    
        if ($user->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'user could not be deleted'
            ], 500);
        }
    }
}
