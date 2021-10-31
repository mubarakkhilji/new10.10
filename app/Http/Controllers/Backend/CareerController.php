<?php

namespace App\Http\Controllers\Backend;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $careers = Career::query();

        if ($request->searchKeyword) {
            $careers->where('job_title',  'LIKE', "%$request->searchKeyword%");
        }

        $careers = $careers->orderBy('job_title')->paginate(10);

        return view('backend.career.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.career.create');
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
            'job_title' => 'required|max:191',
            'vacancy' => 'required|max:191',
            'job_location' => 'required|max:191',
            'salary' => 'required|max:191',
            'deadline' => 'required|max:191|date',
            'employment_status' => 'required|in:Full time,Half time,Contructual',
            'job_status' => 'required|in:Draft,Published',
            'job_responsibilities' => 'required',
        ]);

        Career::create($request->all());
        
        Alert::toast('Career successfully created', 'success');

        return redirect()->route('admin.career.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        return view('backend.career.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        $this->validate($request, [
            'job_title' => 'required|max:191',
            'vacancy' => 'required|max:191',
            'job_location' => 'required|max:191',
            'salary' => 'required|max:191',
            'deadline' => 'required|max:191|date',
            'employment_status' => 'required|in:Full time,Half time,Contructual',
            'job_status' => 'required|in:Draft,Published',
            'job_responsibilities' => 'required',
        ]);

        $career->update($request->all());
        
        Alert::toast('Career successfully updated', 'success');

        return redirect()->route('admin.career.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        $career->delete();

        Alert::toast('Career successfully deleted', 'success');

        return redirect()->route('admin.career.index');
    }
}
