<?php

namespace App\Http\Controllers\Admin;

use App\GalleryCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = GalleryCategory::orderBy('id','desc')->paginate(20);

        return view('admin.gallery.category', compact('categories'));
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
        $category = new GalleryCategory();
        $category->name = $request->name;
        $category->description = $request->description;
        if ($category->save()) {
           return redirect()->back()->with(['class'=>'success','message'=>'Successfully ...']);
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryCategory $galleryCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryCategory $galleryCategory)
    {
        return view('admin.gallery.category-edit', compact('galleryCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GalleryCategory $category)
    {
         
        $category->name = $request->name;
        $category->description = $request->description;
        if ($category->save()) {
           return redirect()->route('admin.gallery-category.list')->with(['class'=>'success','message'=>'Successfully ...']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GalleryCategory  $galleryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryCategory $galleryCategory)
    {
        
        if($galleryCategory->delete()){    
            return redirect()->back()->with(['class'=>'success','message'=>'Deleted  successfully ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
}
