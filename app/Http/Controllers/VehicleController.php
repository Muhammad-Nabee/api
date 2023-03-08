<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Vehicle;
use Illuminate\Support\Facades\File;

class VehicleController extends Controller
{
    function create(Request $request){
        
        //insert data into database
        $vehicle = new Vehicle;
        $vehicle->uuid= Str::uuid()->tostring();
        $vehicle->veh_reg = $request->veh_reg;
        $vehicle->veh_type = $request->veh_type;
        $vehicle->chesis_no = $request->chesis_no;
        $vehicle->company = $request->company;
        $vehicle->veh_color = $request->veh_color;
        $vehicle->veh_reg_date = $request->veh_reg_date;
        $vehicle->veh_description = $request->veh_description;
        if($request->hasfile('veh_photo')){
            $file = $request->file('veh_photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/vehicles/',$filename);
            $vehicle->veh_photo = $filename;
        }
        $vehicle->veh_available = $request->veh_available;
        $vehicle->status ='0';
        $vehicle->save();
        return response()->json($vehicle);

    }

    function show()
    {
        $vehicle = Vehicle::all();
        return response()->json($vehicle);
    }
    function showStatus()
    {
     
        $vehicle = Vehicle::where('status','0')->get();
        
        return response()->json($vehicle);
    }

    function showbyid($id)
    {
        $vehicle = Vehicle::find($id);
        return response()->json($vehicle);
    }

  public function updatebyid(Request $request, $id)
    {
    
    
        $vehicle= Vehicle::where('uuid',$id)->first();


        $vehicle->veh_reg= $request->veh_reg;
  
        $vehicle->veh_type = $request->veh_type;
        $vehicle->chesis_no = $request->chesis_no;
       
        $vehicle->company = $request->company;
        $vehicle->veh_color = $request->veh_color;
        $vehicle->veh_reg_date = $request->veh_reg_date;
        $vehicle->veh_description = $request->veh_description;
        if($request->hasfile('veh_photo')){
            $destination = 'uploads/vehicles/'.$vehicle->veh_photo;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('veh_photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/vehicles/',$filename);
            $vehicle->veh_photo = $filename;
        }
        $vehicle->veh_available = $request->veh_available;

        $vehicle->update();
        return response()->json($vehicle);
    }

    function deletebyid($id)
    {
        $vehicle = Vehicle::find($id);
        $destination = 'uploads/vehicles/'.$vehicle->veh_photo;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $vehicle->delete();
        return response()->json($vehicle);
    }
}
