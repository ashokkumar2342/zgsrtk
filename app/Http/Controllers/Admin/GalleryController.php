<?php

namespace App\Http\Controllers\Admin;

use App\Center;
use App\Gallery;
use App\GalleryCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use file;




class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallaries = Gallery::orderBy('id','desc')->paginate(20);
        $category = array_pluck(GalleryCategory::get(['id','name'])->toArray(),'name', 'id');
        $center = array_pluck(Center::get(['id','name'])->toArray(),'name', 'id');
        return view('admin.gallery.list', compact('gallaries','category','center'));
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
        'file' => 'image|mimes:jpeg,png,jpg|max:400',
        'cid' => 'required',
        'center_id' => 'required',
        ]);

        if ($request->hasFile('file')) {

            $imageFile = $request->file('file');
            $imageName = $imageName = time().'.jpg';
            $imageFile->move(public_path('uploads'),$imageName);
            $gallery = new Gallery();
            $gallery->image = $imageName; 
            $gallery->cid = $request->cid;           
            $gallery->center_id = $request->center_id;           

            $gallery->save();

            
        }
   

        return response()->json(['Status'=>true, 'message'=>'Image(s) Upload Successfully...' ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if($gallery->delete()){    
            return redirect()->back()->with(['class'=>'success','message'=>'image deleted  successfully ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
}
