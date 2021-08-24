<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index()
    {
        $categoryData=Category::all();
        //dd($categoryData);
        return view('backend.category.index',compact('categoryData'));
    }


    public function create()
    {
        return view('backend.category.create');
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'status'=>'required'
        ]);

        Category::create($request->all());
        return redirect()->route('category.index')->with('success','Category Has been Created Successfully');

    }

    public function edit($id)
    {
        $categoryData=Category::find($id);
        return view('backend.category.edit',compact('categoryData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'status'=>'required'
        ]);


        $category=Category::find($id);
        $category->update($request->all());
        return redirect()->route('category.index')->with('success','Category Has been Updated Successfully');
    }


    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('success','Category Has been Deleted Successfully');
    }
}
