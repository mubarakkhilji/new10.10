<?php

namespace App\Http\Controllers\Backend;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $aboutUs = AboutUs::query();

        if ($request->searchKeyword) {
            $aboutUs->where('page_title', 'LIKE', "%$request->searchKeyword%");
        }

        $aboutUs = $aboutUs->orderBy('page_title')->paginate(10);

        return view('backend.about_us.index', compact('aboutUs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.about_us.create');
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->store('about_us');
   
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
            'page_title' => 'required|max:191',
            'page_content' => 'required',
            'status' => 'required|in:Active,Inactive',
        ]);

        $aboutUs = new AboutUs();

        $aboutUs->page_title = $request->page_title;
        $aboutUs->page_content = $request->page_content;
        $aboutUs->status = $request->status;
        $aboutUs->save();
        
        Alert::toast('About Us Page successfully created', 'success');

        return redirect()->route('admin.about.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $about)
    {
        return view('backend.about_us.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUs $about)
    {
        $this->validate($request, [
            'page_title' => 'required|max:191',
            'page_content' => 'required',
            'status' => 'required|in:Active,Inactive',
        ]);

        $about->page_title = $request->page_title;
        $about->page_content = $request->page_content;
        $about->status = $request->status;
        $about->save();
        
        Alert::toast('About us page successfully updated', 'success');

        return redirect()->route('admin.about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $about)
    {
        $about->delete();

        Alert::toast('About us page successfully deleted', 'success');

        return redirect()->back();
    }
}
