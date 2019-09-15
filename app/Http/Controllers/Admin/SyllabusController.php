<?php

namespace App\Http\Controllers\Admin;

use App\Center;
use App\ClassType;
use App\Http\Controllers\Controller;
use App\SessionDate;
use App\StudentDetails;
use App\Syllabus;
use Illuminate\Contracts\Routing\download;
use Illuminate\Http\Request;
use Storage;


class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $syllabuses =  Syllabus::orderBy('id','desc')->get();
         
        $centers = Center::where('status',1)->get();
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');



        return view('admin.syllabus.list',compact('classes','sessions','centers','syllabuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'center' => 'required|numeric',
            'session' => 'required|numeric',
            'class' => 'required|numeric',                        
            'syllabus' => 'required|mimes:pdf,docx|max:5000', 
            'title' => 'required|max:255',
             
      
        ]);

         $file = $request->file('syllabus');
        $imageName = time().'.pdf';
        $file->move(public_path('uploads/holidayhomework'),$imageName);

        $syllabus= new Syllabus();
        $syllabus->center_id= $request->center;        
        $syllabus->session_id= $request->session;
        $syllabus->class_id= $request->class;
        
        $syllabus->syllabus = $imageName;
        $syllabus->title= $request->title;
        if($syllabus->save()){   
            return redirect()->route('admin.syllabus.list',$syllabus->id)->with(['class'=>'success','message'=>' file Upload success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function download(Syllabus $syllabus)
    {
         
       // return view('admin.holidayhomework.show',compact('holidayhomework'));
       $path = public_path('uploads\holidayhomework/'.$syllabus->syllabus);

       return response()->download($path);
           
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function edit(Syllabus $syllabus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Syllabus $syllabus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Syllabus $syllabus)
    {
         if ($syllabus->delete()) {
        return redirect()->back()->with(['class'=>'success','message'=>' file Deleted success ...']);
             
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
}
