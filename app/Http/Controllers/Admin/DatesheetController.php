<?php

namespace App\Http\Controllers\Admin;

use App\Datesheet;
use App\StudentDetails;
use App\ClassType;
use App\SessionDate;
use App\Center;
  
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class DatesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datesheets =  Datesheet::orderBy('id','desc')->paginate(10);
        $centers = Center::where('status',1)->get();
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        return view('admin.datesheet.list',compact('classes','sessions','centers','datesheets'));
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
                        
        'datesheet' => 'image|mimes:jpeg,png,jpg|max:3000',             

            'title' => 'required|max:255',
             
      
        ]);

         $file = $request->file('datesheet');
        $imageName = uniqid().$file->getClientOriginalName();
        $file->move(public_path('uploads/holidayhomework'),$imageName);

        $datesheet= new Datesheet();
        $datesheet->center_id= $request->center;        
        $datesheet->session_id= $request->session;
        $datesheet->class_id= $request->class;
        
        $datesheet->datesheet = $imageName;
        $datesheet->title= $request->title;
        if($datesheet->save()){   
            return redirect()->route('admin.datesheet.list',$datesheet->id)->with(['class'=>'success','message'=>' file Upload success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Datesheet  $datesheet
     * @return \Illuminate\Http\Response
     */
    public function show(Datesheet $datesheet)
    {
        
        return view('admin.datesheet.show',compact('datesheet'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Datesheet  $datesheet
     * @return \Illuminate\Http\Response
     */
    public function edit(Datesheet $datesheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Datesheet  $datesheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datesheet $datesheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Datesheet  $datesheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datesheet $datesheet)
    {
         if ($datesheet->delete()) {
        return redirect()->back()->with(['class'=>'success','message'=>' file Deleted success ...']);
             
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
}
