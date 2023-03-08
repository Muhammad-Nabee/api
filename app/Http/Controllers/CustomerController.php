<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\User;

class CustomerController extends Controller
{
    function customerlogin(Request $request)
    {
        
    
        $user = User::where('email', $request->email) ->where('password',md5($request->password))->first();
 
                                
               
     
                 if($user){
                  
                   Auth::login($user);

                   return response()->json($user);
                 } else
                 {
                    return response()->json(['message'=>"hello"]);
                 }


    }

    function create(Request $request){
  
        //insert data into database
        $customer = new User;
        $customer->uuid= Str::uuid()->tostring();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->password = md5($request->password);
        $customer->Dob = $request->Dob;
        $customer->role='customer';
        $customer->gender = $request->gender;
        $customer->contact_no = $request->contact_no;
        $customer->cnic = $request->cnic;
        $customer->save();
        return response()->json($customer);

    }
 
   
    function show()
    {
    $customer = User::all();
        
        return response()->json($customer);
    }

    function showbyid($id)
    {
        
        $customer = User::where('uuid',$id)->first();
        return response()->json($customer);
    }

    function updatebyid(Request $request, $id)
    {
       
        $customer= User::where('uuid',$id)->first();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->password = md5($request->password);
        $customer->Dob = $request->Dob;
        $customer->role='customer';
        $customer->gender = $request->gender;
        $customer->contact_no = $request->contact_no;
        $customer->cnic = $request->cnic;
        $customer->update();
        return response()->json($customer);

    }

    function deletebyid($id)
    {
        $customer = User::find($id);
        
        if($customer){
            $customer->delete();
            return response()->json([ 'data'      => 'delete data successfully']);
        }else{
            return response()->json([ 'data'      => 'data not  found']);
        }
       
       
    }
}
