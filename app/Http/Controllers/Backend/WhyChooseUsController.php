<?php

namespace App\Http\Controllers\Backend;

use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $whyChooseUs = WhyChooseUs::query();

        if ($request->searchKeyword) {
            $whyChooseUs->where('name',  'LIKE', "%$request->searchKeyword%");
        }

        $whyChooseUs = $whyChooseUs->orderBy('title')->paginate(10);

        return view('backend.why_choose_us.index', compact('whyChooseUs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.why_choose_us.create');
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
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,bmp,png,jpg',
        ]);

        $whyChooseUs = new WhyChooseUs();
        $whyChooseUs->title = $request->title;
        $whyChooseUs->description = $request->description;
        $whyChooseUs->status = $request->status;
        $whyChooseUs->image = $request->file('image')->store('why_choose_us');
        $whyChooseUs->save();

        Alert::toast('Why choose us successfully created', 'success');

        return redirect()->route('admin.why-choose-us.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $whyChooseUs = WhyChooseUs::find($id);

        return view('backend.why_choose_us.edit', compact('whyChooseUs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,bmp,png,jpg',
        ]);

        $whyChooseUs = WhyChooseUs::find($id);

        $whyChooseUs->title = $request->title;
        $whyChooseUs->description = $request->description;
        $whyChooseUs->status = $request->status;

        if ($request->hasFile('image')) {
            
            if (Storage::exists($whyChooseUs->image)) {
                Storage::delete($whyChooseUs->image);
            }

            $whyChooseUs->image = $request->file('image')->store('why_choose_us');
        }
        
        $whyChooseUs->save();

        Alert::toast('Why choose us successfully updated', 'success');

        return redirect()->route('admin.why-choose-us.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $whyChooseUs = WhyChooseUs::find($id);

        if (Storage::exists($whyChooseUs->file)) {
            Storage::delete($whyChooseUs->file);
        }

        $whyChooseUs->delete();

        Alert::toast('why choose us successfully deleted', 'success');

        return redirect()->route('admin.why-choose-us.index');
    }
}
