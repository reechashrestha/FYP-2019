<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();

        return view('categories', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create_categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name'=> 'required|max:255',
            'category_description'=> 'required|max:255',
            'category_status'=> 'required|max:255'
        ]);

        $category = new Category([
            'category_name' => $request->get('category_name'),
            'category_description' => $request->get('category_description'),
            'category_status' => $request->get('category_status'),
        ]);

        $category->save();

        return redirect('/categories')->with('success', 'Successfully Stored!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('categories', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('crud.edit_categories', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name'=> 'required|max:255',
            'category_description'=> 'required|max:255',
            'category_status'=> 'required|max:255'
        ]);

        $category = Category::find($id);

        $category->category_name = $request->get('category_name');
        $category->category_description = $request->get('category_description');
        $category->category_status = $request->get('category_status');
        $category->save();

        return redirect('/categories')->with('success', 'Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/categories')->with('success', 'Successfully Deleted!');
    }
}
