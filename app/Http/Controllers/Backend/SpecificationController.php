<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Specification;
use App\Http\Controllers\Controller;
use App\Models\ProjectSpecification;
use RealRashid\SweetAlert\Facades\Alert;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $specifications = Specification::query();

        if ($request->searchKeyword) {
            $specifications->where('title',  'LIKE', "%$request->searchKeyword%");
        }

        $specifications = $specifications->orderBy('title')->paginate(10);

        return view('backend.specification.index', compact('specifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.specification.create');
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
            'status' => 'required|in:Active,Inactive',
        ]);

        $category = new Specification();
        $category->title = $request->title;
        $category->status = $request->status;
        $category->save();

        Alert::toast('Project specification successfully created', 'success');

        return redirect()->route('admin.specification.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function edit(Specification $specification)
    {
        return view('backend.specification.edit', compact('specification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specification $specification)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'status' => 'required|in:Active,Inactive',
        ]);

        $specification->title = $request->title;
        $specification->status = $request->status;
        $specification->save();

        Alert::toast('Project specification successfully updated', 'success');

        return redirect()->route('admin.specification.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specification  $specification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specification $specification)
    {
        // Don't delete if any specification is already used in any project specification
        $hasUsed = ProjectSpecification::where('specification_id', $specification->id)->first();

        if ($hasUsed) {
            Alert::toast('Sorry! could not deleted. This specification already used', 'warning');

            return redirect()->back();
        }
        
        $specification->delete();

        Alert::toast('Project specification successfully deleted', 'success');

        return redirect()->back();
    }
}
