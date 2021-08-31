<?php

namespace App\Http\Controllers;

use App\Model\Content;
use App\Model\Course;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $contentData = Content::all();

        return view('backend.content.index', compact('contentData'));
    }

    public function create()
    {
        $course = Course::all();

        return view('backend.content.create', compact('course'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'status' => 'required',
            'course_id' => 'required',
        ]);

        for ( $i = 0; $i < count(request('title')); $i++ )
        {
            $content = new Content();
            $content->title = request('title')[$i];
            $content->status = request('status')[$i];
            $content->course_id = request('course_id')[$i];
            if ($request->hasFile('thumbnail'))
            {
                $file = $request->file('thumbnail')[$i];
                $extension = $file->getClientOriginalExtension();
                $fileName = time().'.'. $extension;
                $file->move('uploads',$fileName);
                $content->thumbnail = $fileName;
            }
            else
            {
                $content->thumbnail = '';
            }
            if ( $request->hasFile('video') )
            {
                $file = $request->file('video')[$i];
                $extension = $file->getClientOriginalExtension();
                $fileName = time().'.'. $extension;
                $file->move('uploads',$fileName);
                $content->video = $fileName;
            }
            else
            {
                $content->video = '';
            }
            if ( $request->hasFile('additional') )
            {
                $file = $request->file('additional')[$i];
                $extension = $file->getClientOriginalExtension();
                $fileName = time().'.'. $extension;
                $file->move('uploads', $fileName);
                $content->additional = $fileName;
            }
            else
            {
                $content->additional = '';
            }

            $content->save();
        }

        return redirect()->route('content.index')->with('success','Content Has been Created Successfully');
    }

    public function edit($id)
    {
        $course = Course::all();
        $contentData = Content::find($id);

        return view('backend.content.edit', compact('course','contentData'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'status'=>'required',
            'course_id'=>'required',
        ]);

        $thumbnail_hid = $request->hidden_file_thumbnail;
        if ( $request->hasFile('thumbnail') )
        {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'. $extension;
            $file->move('uploads',$fileName);
            $thumbnail = $fileName;
        }
        else
        {
            $thumbnail = $thumbnail_hid;
        }

        $video_hid=$request->hidden_file_video;
        if ($request->hasFile('video')){

            $file = $request->file('video');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'. $extension;
            $file->move('uploads',$fileName);
            $video = $fileName;
        }
        else
        {
            $video = $video_hid;
        }

        $add_hidden=$request->hidden_file_additional;
        if ( $request->hasFile('additional') )
        {
            $file = $request->file('additional');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'. $extension;
            $file->move('uploads',$fileName);//dd('ss');
            $additional = $fileName;
        }
        else
        {
            $additional = $add_hidden;
        }
        $edited_data=array(
            'title' => $request->title,
            'course_id' => $request->course_id,
            'additional' => $additional,
            'video' => $video,
            'thumbnail'=>$thumbnail,
            'status'=> $request->status,
        );
        Content::whereId($id)->update($edited_data);

        return redirect()->route('content.index')->with('success','Content Has been Updated Successfully');
    }

    public function destroy($id)
    {
        $content = Content::find($id);
        $content->delete();

        return redirect()->route('content.index')->with('success','content Has been Deleted Successfully');
    }
}
