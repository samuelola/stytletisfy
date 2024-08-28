<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Library\Utilities;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\SigninRequest;


class AuthController extends Controller
{
    public function signup(SignupRequest $request)
    {

       $data = $request->validated();
        
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();

        return Utilities::sendResponse($user,"Registration is Successful");

    }

    public function signin(SigninRequest $request)
    {

        $data = $request->validated();

        $credentials = [
            'email'    => $data['email'],
            'password' => $data['password']
        ];

        $token = auth()->attempt($credentials);

        if ($token) 
        {
            return $this->respondWithToken($token);
        }
        
        return Utilities::sendError('Unauthorised',['error' => 'Unauthorised. Invalid Email or Password']);
    
       
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'name' => auth()->user()->name,
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email,
        ]);

        
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function user()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return Utilities::logoutResponse('Successfully logged out');
    }
}
