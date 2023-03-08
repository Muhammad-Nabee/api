<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\File;

class DriverController extends Controller
{
    function create(Request $request)
    {
        $driver = new Driver;
        $driver->dr_name = $request->dr_name;
        $driver->dr_join = $request->dr_join;
        $driver->dr_mobile = $request->dr_mobile;
        $driver->dr_licence = $request->dr_licence;
        $driver->dr_licence_valid = $request->dr_licence_valid;
        $driver->dr_address = $request->dr_address;
        if($request->hasfile('dr_photo')){
            $file = $request->file('dr_photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/drivers/',$filename);
            $driver->dr_photo = $filename;
        }
        $driver->dr_available = $request->dr_available;

        $driver->save();
        return response()->json($driver);
    }

    function show()
    {
        $driver = Driver::all();
        return response()->json($driver);
    }

    function showbyid($id)
    {
        $driver = Driver::find($id);
        return response()->json($driver);
    }

    function updatebyid(Request $request,$id)
    {
        $driver = Driver::find($id);
        $driver->dr_name = $request->dr_name;
        $driver->dr_join = $request->dr_join;
        $driver->dr_mobile = $request->dr_mobile;
        $driver->dr_licence = $request->dr_licence;
        $driver->dr_licence_valid = $request->dr_licence_valid;
        $driver->dr_address = $request->dr_address;
        if($request->hasfile('dr_photo')){
            $destination = 'uploads/drivers/'.$driver->dr_photo;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('dr_photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/drivers/',$filename);
            $driver->dr_photo = $filename;
        }
        $driver->dr_available = $request->dr_available;

        $driver->update();
        return response()->json($driver);
        
    }

    function deletebyid($id)
    {
        $driver = Driver::find($id);
        $destination = 'uploads/drivers/'.$driver->dr_photo;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $driver->delete();
        return response()->json($driver);
    }
}
