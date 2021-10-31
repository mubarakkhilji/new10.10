<?php

namespace App\Http\Controllers\Backend;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = Event::query();

        if ($request->searchKeyword) {
            $events->where('title',  'LIKE', "%$request->searchKeyword%")
                    ->orWhere('published_date',  'LIKE', "%$request->searchKeyword%");
        }

        $events = $events->orderBy('title')->paginate(10);

        return view('backend.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.event.create');
    }

    /**
     * Store the event details file.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->store('event/details');
   
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
            'status' => 'required||in:Draft,Published',
        ]);

        $event = new Event();

        if ($request->hasFile('photo')) {  
            $event->photo = $request->file('photo')->store('event'); 
        }

        $event->title = $request->title;
        $event->short_description = $request->short_description;
        $event->details = $request->details;
        $event->published_date = $request->published_date;
        $event->status = $request->status;
        $event->save();
        
        Alert::toast('Event successfully created', 'success');

        return redirect()->route('admin.event.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('backend.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
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
            
            if (Storage::exists($event->photo)) {
                Storage::delete($event->photo);
            }

            $event->photo = $request->file('photo')->store('event');
        }

        $event->title = $request->title;
        $event->short_description = $request->short_description;
        $event->details = $request->details;
        $event->published_date = $request->published_date;
        $event->status = $request->status;
        $event->save();
        
        Alert::toast('Event successfully updated', 'success');

        return redirect()->route('admin.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if (Storage::exists($event->photo)) {
            Storage::delete($event->photo);
        }
        
        $event->delete();

        Alert::toast('Event successfully deleted', 'success');

        return redirect()->route('admin.event.index');
    }
}
