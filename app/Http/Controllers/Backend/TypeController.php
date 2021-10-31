<?php

namespace App\Http\Controllers\Backend;

use App\Models\Type;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $types = Type::query();

        if ($request->searchKeyword) {
            $types->where('name',  'LIKE', "%$request->searchKeyword%");
        }

        $types = $types->orderBy('name')->paginate(10);

        return view('backend.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.type.create');
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
            'status' => 'required|in:Active,Inactive',
        ]);

        $category = new Type();
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        Alert::toast('Project type successfully created', 'success');

        return redirect()->route('admin.type.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('backend.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'status' => 'required|in:Active,Inactive',
        ]);

        $type->name = $request->name;
        $type->status = $request->status;
        $type->save();

        Alert::toast('Project type successfully updated', 'success');

        return redirect()->route('admin.type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        // Don't delete if any type is already used in any project
        $hasUsed = Project::where('type_id', $type->id)->first();

        if ($hasUsed) {
            Alert::toast('Sorry! could not deleted. This type already used', 'warning');

            return redirect()->back();
        }
        
        $type->delete();

        Alert::toast('Project type successfully deleted', 'success');

        return redirect()->back();
    }
}
