<?php

namespace App\Http\Controllers\Admin;

use App\Eventcalender;
use App\StudentDetails;
use App\ClassType;
use App\SessionDate;
use App\Center; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class EventcalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventcalenders =  Eventcalender::orderBy('id','desc')->paginate(10);
        $centers = Center::where('status',1)->get();
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        return view('admin.eventcalender.list',compact('classes','sessions','sections','centers','eventcalenders'));
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
            'eventcalender' => 'image|mimes:jpeg,png,jpg|max:3000',
            'title' => 'required|max:255', 
        ]);

        $file = $request->file('eventcalender');
        $imageName = uniqid().$file->getClientOriginalName();
        $file->move(public_path('uploads/holidayhomework'),$imageName);

        $eventcalender= new Eventcalender();
        $eventcalender->center_id= $request->center;        
        $eventcalender->session_id= $request->session;
        $eventcalender->class_id= $request->class;
        
        $eventcalender->eventcalender = $imageName;
        $eventcalender->title= $request->title;
        if($eventcalender->save()){   
            return redirect()->route('admin.eventcalender.list',$eventcalender->id)->with(['class'=>'success','message'=>' file Upload success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eventcalender  $eventcalender
     * @return \Illuminate\Http\Response
     */
    public function show(Eventcalender $eventcalender)
    {
        return view('admin.eventcalender.show',compact('eventcalender'));
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eventcalender  $eventcalender
     * @return \Illuminate\Http\Response
     */
    public function edit(Eventcalender $eventcalender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eventcalender  $eventcalender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eventcalender $eventcalender)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eventcalender  $eventcalender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eventcalender $eventcalender)
    {
        $eventcalender->delete();
        return redirect()->back()->with(['class'=>'success','message'=>'Success ']);
    }
}
