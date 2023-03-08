<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function _construct(){
        $this->middleware('auth:api',['except'=>['login','register']]);
    }

    function register(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|string|email|unique::users',
            'password'=>'required|string|confirmed|min:6'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }
        $user = User::create(array_merge(
            $validator->validated(),
            ['password'=>bcrypt($request->password)]
        ));
        return response()->json([
            'message'=>'User successfully registered',
            'user'=>$user
        ],201);
    }

    public function customerlogin(Request $request){
     
       $user = Customer::where('email', $request->email)
                 ->where('password',md5($request->password))
                 ->first();
                 dd($user);
                
              
                 if($user){
                   Auth::login($user);
                   
                
                    
                 } 
     
    }


    function login(Request $request){
        $validator=Validator::make($request->all(),[
            'email'=> 'required|email',
            'password'=> 'required|string|min:4'

        ]);
        // $token=config('jwt')['secret'];
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
       
        if(!$token=auth()->attempt($validator->validated())){
            
            return response()->json(['error'=>'Unauthorized'],401);
        }
        return $this->createNewToken($token);

    }

    function createNewToken($token)
    {
       
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in'> auth('api')->factory()->getTTL() * 464465353454316000,
            'user' => auth()->user()
        ]);
      
    }
   
}
