<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student; 
use App\News;
class NewsController extends Controller
{
    public function index(){
        
       $news = News::orderBy('id','desc')->paginate(10);
        return view('admin.news.list',compact('news'));
       
    }
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
        'file' => 'mimes:pdf,docx|max:3000|nullable',             
             
          ]);
          if ($request->hasFile('file')) {

              $imageFile = $request->file('file');
              $imageName = $imageName = time().$imageFile->getClientOriginalName();
              $imageFile->move(public_path('uploads'),$imageName);
              $gallery = new News();
              $gallery->file = $imageName;  
              $gallery->news = $request->news;           

              $gallery->save();

              
          }     
         
        // $news = News::create([
        //     'news' => $request['news'],
            
        //     ]);       
        return redirect()->route('admin.news.list')->with(['message'=>'News Created Successfully ','class'=>'success']);
        // return redirect()->route('admin.front.list')->with(['message'=>'Image Uploaded Successfully ']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {

        // return view('admin.front.view',compact('productMenu'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {

        // $news = News::find($id);
        return view('admin.news.edit',compact('news'));

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
 
            
           $news->news=$request->news;
           $news->save();
            
               
        return redirect()->route('admin.news.list')->with(['message'=>'News Update Successfully ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        // echo "string";
        // $news = News::destroy($news);
        $news->delete();
        // dd($news);
        return redirect()->route('admin.news.list')->with(['message'=>'News delete successfully ...!','class'=>'danger']);
 
    }

}
