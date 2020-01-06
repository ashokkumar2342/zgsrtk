<?php

namespace App\Http\Controllers\Admin;

use App\AttendanceType;
use App\Contact;
use App\Enquiry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $contacts = Contact::orderBy('created_at','desc')->paginate(10);

       return view('admin.contact.list',compact('contacts'));
    }
    public function enquiry()
    {
       $enquirys = Enquiry::orderBy('created_at','desc')->paginate(10);

       return view('admin.contact.enquiry',compact('enquirys'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AttendanceType  $attendanceType
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceType $attendanceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AttendanceType  $attendanceType
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AttendanceType  $attendanceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AttendanceType  $attendanceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        
       if ($contact->delete()) {
        return redirect()->back()->with(['class'=>'success','message'=>' file Deleted success ...']);
             
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
       
    }
     public function enquirydestroy(Enquiry $enquiry)
    {
        
       if ($enquiry->delete()) {
        return redirect()->back()->with(['class'=>'success','message'=>' file Deleted success ...']);
             
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
       
    }
}
