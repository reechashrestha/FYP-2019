<?php

namespace App\Http\Controllers;
use App\service;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $service = Service::all();
        return view('services', compact('service'));
        //return view('/services')->with('tbl_service',$service);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {

        $request->validate([
            'category_id'=> 'required',
            'service_name'=> 'required|max:255',
            'service_desc'=> 'required|max:255',
            'service_status'=> 'required|max:255',
            'service_image' => 'required|image|max:2048'

        ]);

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

        //return view('/services')->with('service',$service);
        return redirect('/services')->with('success', 'Successfully Stored!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $service = Service::find($id);
        return view('crud/edit_service')->with('service',$service);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){

        $request->validate([
            'category_id'=> 'required',
            'service_name'=> 'required|max:255',
            'service_desc'=> 'required|max:255',
            'service_status'=> 'required|max:255',
            'service_image' => 'required|image|max:2048'

        ]);

        $service = Service::find($id);

        $service->category_id = $request->get('category_id');
        $service->service_name = $request->get('service_name');
        $service->service_desc = $request->get('service_desc');
        $service->service_status = $request->get('service_status');

        if ($request->hasFile('service_image')) {
            $file = $request->file('service_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/service/',$filename);
            $service->service_image = $filename;

        }

        $service->save();
        return redirect('/services')->with('success', 'Data Updated Successfully!');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);

        return view('/services', compact('service'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\service  $service
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        return redirect('/services')->with('success', 'Successfully Deleted!');
    }

}
