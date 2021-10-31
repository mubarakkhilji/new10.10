<?php

namespace App\Http\Controllers\Backend;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $testimonials = Testimonial::query();

        if ($request->searchKeyword) {
            $testimonials->where('name',  'LIKE', "%$request->searchKeyword%")
                    ->orWhere('designation',  'LIKE', "%$request->searchKeyword%")
                    ->orWhere('company',  'LIKE', "%$request->searchKeyword%");
        }

        $testimonials = $testimonials->orderBy('name')->paginate(10);

        return view('backend.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.testimonial.create');
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
            'name' => 'required|max:191',
            'designation' => 'required|max:191',
            'company' => 'required|max:191',
            'testimonial' => 'required',
        ]);

        $testimonial = new Testimonial();

        if ($request->hasFile('photo')) {   
            $testimonial->photo = $request->file('photo')->store('testimonial'); 
        }

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->company = $request->company;
        $testimonial->testimonial = $request->testimonial;
        $testimonial->status = $request->status;
        $testimonial->save();
        
        Alert::toast('Testimonial successfully created', 'success');

        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('backend.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'designation' => 'required|max:191',
            'company' => 'required|max:191',
            'testimonial' => 'required',
        ]);

        if ($request->hasFile('photo')) {

            if (Storage::exists($testimonial->photo)) {
                Storage::delete($testimonial->photo);
            }

            $testimonial->photo = $request->file('photo')->store('testimonial'); 
        }

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->company = $request->company;
        $testimonial->testimonial = $request->testimonial;
        $testimonial->status = $request->status;
        $testimonial->save();
        
        Alert::toast('Testimonial successfully updated', 'success');

        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        if (Storage::exists($testimonial->photo)) {
            Storage::delete($testimonial->photo);
        }

        $testimonial->delete();

        Alert::toast('Testimonial successfully deleted', 'success');

        return redirect()->back();
    }
}
