<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sliders = Slider::query();

        if ($request->searchKeyword) {
            $sliders->where('heading',  'LIKE', "%$request->searchKeyword%");
        }

        $sliders = $sliders->orderBy('heading')->paginate(10);

        return view('backend.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
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
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'in:Active,Inactive',
        ]);

        $buttonTitle = $request->button_title;
        $buttonUrl = $request->button_url;

        $slider = new Slider();
        $slider->heading = $request->heading;
        $slider->sub_heading = $request->sub_heading;
        $slider->description = $request->description;
        $slider->status = $request->status;
        $slider->action_button = json_encode(["title" => $buttonTitle, 'url' => $buttonUrl]);
        $slider->file = $request->file('file')->store('slider');
        $slider->save();

        Alert::toast('Slider successfully created', 'success');

        return redirect()->route('admin.slider.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'status' => 'in:Active,Inactive',
        ]);

        $buttonTitle = $request->button_title;
        $buttonUrl = $request->button_url;

        $slider->heading = $request->heading;
        $slider->sub_heading = $request->sub_heading;
        $slider->description = $request->description;
        $slider->status = $request->status;
        $slider->action_button = json_encode(["title" => $buttonTitle, 'url' => $buttonUrl]);

        if ($request->hasFile('file')) {
            
            if (Storage::exists($slider->file)) {
                Storage::delete($slider->file);
            }

            $slider->file = $request->file('file')->store('slider');
        }
        
        $slider->save();

        Alert::toast('Slider successfully updated', 'success');

        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if (Storage::exists($slider->file)) {
            Storage::delete($slider->file);
        }

        $slider->delete();

        Alert::toast('Slider successfully deleted', 'success');

        return redirect()->route('admin.slider.index');
    }
}
