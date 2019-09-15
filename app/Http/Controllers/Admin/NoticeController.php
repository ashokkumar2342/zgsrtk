<?php

namespace App\Http\Controllers\Admin;

use App\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = Notice::orderBy('id','desc')->paginate(10);
        return view('admin.notice.list',compact('news'));
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
               $this->validate($request, [
            'news' => 'required|max:255',
            

        ]);
         
        $news = Notice::firstOrNew([
            'news' => $request['news'],
            
            ]);       
        return redirect()->route('admin.notice.list')->with(['message'=>'Notice Created Successfully ','class'=>'success']);
        // return redirect()->route('admin.front.list')->with(['message'=>'Image Uploaded Successfully ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        return view('admin.notice.edit',compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
         $notice->news=$request->news;
           $notice->save();
            
               
        return redirect()->route('admin.notice.list')->with(['message'=>'News Update Successfully ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        
           $notice->delete();
            
               
        return redirect()->route('admin.notice.list')->with(['message'=>'Delete Successfully ']);
    }
}
