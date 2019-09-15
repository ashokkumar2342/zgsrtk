<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use App\GalleryCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use file;




class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id','desc')->paginate(20);
        
        return view('admin.slider.list', compact('sliders'));
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
        ]);

        if ($request->hasFile('file')) {

            $imageFile = $request->file('file');
            $imageName = $imageName = time().'.jpg';
            $imageFile->move(public_path('uploads'),$imageName);
            $gallery = new Slider();
            $gallery->image = $imageName; 
            $gallery->cid = 1;           

            $gallery->save();

            
        }
   

        return response()->json(['Status'=>true, 'message'=>'Image(s) Upload Successfully...' ]);

    }

     
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if($slider->delete()){    
            return redirect()->back()->with(['class'=>'success','message'=>'image deleted  successfully ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
}
