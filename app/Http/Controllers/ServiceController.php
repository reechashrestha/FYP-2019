<?php

namespace App\Http\Controllers;
use App\service;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        $service = Service::all();
        //return view('services', compact('service'));
        return view('/services')->with('tbl_service',$service);
    }

    public function store(Request $request) {

//        $request->validate([
//            'category_id'=> 'required',
//            'service_name'=> 'required|max:255',
//            'service_desc'=> 'required|max:255',
//            'service_status'=> 'required|max:255',
//            'service_image'=> 'required'
//        ]);

        $service = new Service();
        $service->category_id = $request->input('category_id');
        $service->service_name = $request->input('service_name');
        $service->service_desc = $request->input('service_desc');
        $service->service_status = $request->input('service_status');

        if ($request->hasFile('service_image')) {
            $file = $request->file('service_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/service/',$filename);
            $service->service_image = $filename;

        }   else{
            return $request;
            $service->service_image = '';
        }

        $service->save();

        return view('/services')->with('tbl_service',$service);

    }


}
