<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
   {
       $this->userService = $userService;
   }
   
    public function register(Request $request){
        $fields=$request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed'
        ]);

        $user = $this->userService->userCreate($fields);

        $token=$user->createToken('myapptoken')->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=>$token
        ];

        return response($response,201);
    }

    public function loginUser(Request $request)
    {
        try {
            $validateUser = $request->validate( 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);


            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }
            $user = $this->userService->userGet($request->email);        

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request){
       auth()->user()->tokens()->delete();

       return response()->json([
        'status' => true,
        'message' => 'User Loggout Successfully',
        ], 200);
    }
}
