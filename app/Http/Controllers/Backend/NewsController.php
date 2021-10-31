<?php

namespace App\Http\Controllers\Backend;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = News::query();

        if ($request->searchKeyword) {
            $news->where('title',  'LIKE', "%$request->searchKeyword%")
                    ->orWhere('published_date',  'LIKE', "%$request->searchKeyword%");
        }

        $news = $news->orderBy('title')->paginate(10);

        return view('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news.create');
    }

    /**
     * Store the news details file.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->store('news/details');
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/'. $fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
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
            'title' => 'required|max:191',
            'short_description' => 'required',
            'details' => 'required',
            'published_date' => 'required|date',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required|in:Draft,Published',
        ]);

        $news = new News();

        if ($request->hasFile('photo')) {
            $news->photo = $request->file('photo')->store('news');
        }

        $news->title = $request->title;
        $news->short_description = $request->short_description;
        $news->details = $request->details;
        $news->published_date = $request->published_date;
        $news->status = $request->status;
        $news->save();
        
        Alert::toast('News successfully created', 'success');

        return redirect()->route('admin.news.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('backend.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'short_description' => 'required',
            'details' => 'required',
            'published_date' => 'required|date',
            'status' => 'required||in:Draft,Published',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('photo')) {
            
            if (Storage::exists($news->photo)) {
                Storage::delete($news->photo);
            }

            $news->photo = $request->file('photo')->store('news');
        }

        $news->title = $request->title;
        $news->short_description = $request->short_description;
        $news->details = $request->details;
        $news->published_date = $request->published_date;
        $news->status = $request->status;
        $news->save();
        
        Alert::toast('News successfully updated', 'success');

        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if (Storage::exists($news->photo)) {
            Storage::delete($news->photo);
        }
        
        $news->delete();

        Alert::toast('News successfully deleted', 'success');

        return redirect()->route('admin.news.index');
    }
}
