<?php

namespace App\Http\Controllers\Student;

use App\Section;
use App\ClassType;
use App\ClassFee;
use App\SessionDate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        return view('admin.manage.section.list',compact('sections','classes','sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $fee = ClassFee::where(['class_id'=>$request->id,'session_id'=>$request->session])->first()->total_fee;
        $section = Section::where(['class_id'=>$request->id,'session_id'=>$request->session])->get();
        return response()->json(['section'=>$section,'fee'=>$fee]);
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
            'session' => 'required|max:199',
            'class' => 'required|numeric',
            'sectionName' => 'required|max:199'
        ]);
        $section = new Section();
        $section->name = $request->sectionName;
        $section->class_id = $request->class;
        $section->session_id = $request->session;
        if ($section->save()) {
            return redirect()->back()->with(['class'=>'success','message'=>'Class created success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function show(Section $sectionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $sectionEdit)
    {
        $sections = Section::all();
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        return view('admin.manage.section.list',compact('sections','sectionEdit','classes','sessions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $this->validate($request,[
            'session' => 'required|max:199',
            'class' => 'required|numeric',
            'sectionName' => 'required|max:199'
            ]);
        $section->name = $request->sectionName;
        $section->class_id = $request->class;
        $section->session_id = $request->session;
        if ($section->save()) {
            return redirect()->route('admin.section.list')->with(['class'=>'success','message'=>'Class created success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        if ($section->delete()) {
            return redirect()->back()->with(['class'=>'success','message'=>'section deleted success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
}
