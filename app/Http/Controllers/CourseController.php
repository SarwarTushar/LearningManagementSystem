<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        $courseData=Course::all();
        return view('backend.course.index',compact('courseData'));
    }

    public function create()
    {
        $category=Category::all();
        return view('backend.course.create',compact('category'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'status'=>'required',
            'short_description'=>'required',
            'category_id'=>'required',
            'level'=>'required',
        ]);

        Course::create($request->all());
        return redirect()->route('course.index')->with('success','Course Has been Created Successfully');
    }


    public function show($id)
    {
        $courseData=Course::find($id);
        return view('backend.course.show',compact('courseData'));
    }


    public function edit($id)
    {
        $category=Category::all();
        $courseData=Course::find($id);
        return view('backend.course.edit',compact('category','courseData'));

    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'status'=>'required',
            'short_description'=>'required',
            'category_id'=>'required',
            'level'=>'required',
        ]);


        $course=Course::find($id);
        $course->update($request->all());
        return redirect()->route('course.index')->with('success','Course Has been Updated Successfully');
    }

    public function destroy($id)
    {
        $course=Course::find($id);
        $course->delete();
        return redirect()->route('course.index')->with('success','Course Has been Deleted Successfully');
    }
}
