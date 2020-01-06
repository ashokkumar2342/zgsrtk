<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Remark;
use App\ReplyRemark;
use Illuminate\Auth\validate;
use Illuminate\Http\Request;


class RemarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remarks =  Remark::orderBy('created_at','DESC')->paginate(20);
       return view('admin.remarks.list', compact('remarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        // return view('admin.remarks.list', compact('remark'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
             $this->validate($request,[
                 'message' => 'required|max:198',
                  
                 ]);

        $replyRemark = new ReplyRemark();
        $replyRemark->remark_id = $id;
        $replyRemark->message = $request->message;
        if ($replyRemark->save()) {
            return redirect()->route('admin.remarks.list')->with(['message'=>' Reply Send successfully','class'=>'success']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Remark  $remark
     * @return \Illuminate\Http\Response
     */
    public function show(Remark $remark)
    {
        $replyRemarks = ReplyRemark::where('remark_id',$remark->id)->orderBy('created_at','desc')->get();
        return view('admin.remarks/reply_remark', compact('remark','replyRemarks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Remark  $remark
     * @return \Illuminate\Http\Response
     */
    public function edit(Remark $remark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Remark  $remark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Remark $remark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Remark  $remark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Remark $remark)
    {
        //
    }
}
