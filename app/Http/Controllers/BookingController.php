<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;
use App\Mail\apimail;    
use Illuminate\Support\Facades\File;


class BookingController extends Controller
{
    function create(Request $request){
        
        //insert data into database
        $vehicle = new Booking();
        $vehicle->uuid= Str::uuid()->tostring();
        $vehicle->name = $request->name;
        $vehicle->father_name = $request->father_name;
        $vehicle->email = $request->email;
        $vehicle->cnic = $request->cnic;
        $vehicle->address = $request->address;
        $vehicle->service = $request->service;
        $vehicle->car_name = $request->car_name;
        $vehicle->gender = $request->gender;
        $vehicle->status = '0';
        $vehicle->date_in = $request->date_in;
            $vehicle->date_out = $request->date_out;
        $vehicle->save();
         $sendmail=array(
         'name'=>$vehicle->name,
         );
            Mail::to($request->email)->send(new apimail($sendmail));
        return response()->json($vehicle);

    }

    
    function showbooking()
    {
        $vehicle = Booking::all();
        return response()->json($vehicle);
    }
  
    
    function showbyid($id)
    {
        
        $customer = Booking::where('uuid',$id)->first();
        return response()->json($customer);
    }

    function updatebyid(Request $request,$id)
    {
        
       
        $customer= Booking::where('uuid',$id)->first();
      
    
        $customer->name = $request->name;
        $customer->father_name = $request->father_name;
        $customer->email = $request->email;
        $customer->cnic = $request->cnic;
        $customer->address = $request->address;
        $customer->gender=$request->gender;
        $customer->gender = $request->gender;
        $customer->car_name = $request->car_name;
        $customer->service = $request->service;
        $customer->date_in=$request->date_in;
        $customer->date_out= $request->date_out;
        $customer->update();
        return response()->json($customer);

    }
    function deletebyid($id)
    {
        $customer = Booking::find($id);
        
        if($customer){
            $customer->delete();
            return response()->json([ 'data'      => 'delete data successfully']);
        }else{
            return response()->json([ 'data'      => 'data not  found']);
        }
       
       
    }
}
