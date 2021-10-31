<?php

namespace App\Http\Controllers\Backend;

use App\Models\Type;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Specification;
use App\Models\ProjectPhotoGallery;
use App\Http\Controllers\Controller;
use App\Models\ProjectSpecification;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = Project::with('category', 'type');

        if ($request->searchKeyword) {
            $projects->where('title',  'LIKE', "%$request->searchKeyword%");
        }

        $projects = $projects->orderBy('title')->paginate(10);

        return view('backend.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $types = Type::orderBy('name')->get();

        return view('backend.project.create', compact('categories', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileName = $request->file('upload')->store('project/details');
   
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
            'category_id' => 'required|min:1|integer',
            'type_id' => 'required|min:1|integer',
            'status' => 'required|in:Draft,Published',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        $data['featured_image'] = $request->file('featured_image')->store('project');

        $project = Project::create($data);

        Alert::toast('Project successfully created', 'success');

        return redirect()->route('admin.project.details', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function projectDetails(Project $project)
    {
        return view('backend.project.project-details', compact('project')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $categories = Category::orderBy('name')->get();
        $types = Type::orderBy('name')->get();

        return view('backend.project.edit', compact('categories', 'types', 'project')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'category_id' => 'required|min:1|integer',
            'type_id' => 'required|min:1|integer',
            'status' => 'required|in:Draft,Published',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        if ($request->hasFile('featured_image')) {

            if (Storage::exists($project->featured_image)) {
                Storage::delete($project->featured_image);
            }
        
            $data['featured_image'] = $request->file('featured_image')->store('project');
        }

        $project->update($data);

        Alert::toast('Project successfully updated', 'success');

        return redirect()->route('admin.project.details', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->projectSpecification()->delete();

        if ($project->projectPhotos) {
            foreach ($project->projectPhotos as $projectPhoto) {
                if (Storage::exists($projectPhoto->file)) {
                    Storage::delete($projectPhoto->file);
                }
            }

            $project->projectPhotos()->delete();
        }

        $project->delete();
        
        Alert::toast('Project successfully deleted', 'success');

        return redirect()->route('admin.project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function createProjectSpecification(Project $project)
    {
        $specifications  = Specification::orderBy('title')->get();

        $projectSpecification = $project->projectSpecification()->pluck('value', 'specification_id')->toArray();

        return view('backend.project.specifition.create', compact('project', 'specifications', 'projectSpecification')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function storeProjectSpecification(Request $request, Project $project)
    {
        $project->projectSpecification()->delete();

        foreach ($request->specification_id as $key => $item) {
            if ($request->value[$key]) {
                $projectSpecification = new ProjectSpecification();
                $projectSpecification->specification_id = $item;
                $projectSpecification->project_id = $project->id;
                $projectSpecification->value = $request->value[$key];
                $projectSpecification->save();
            }
        }

        Alert::toast('Project specifition successfully created', 'success');

        return redirect()->route('admin.project.details', $project);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function createProjectPhoto(Project $project)
    {
        return view('backend.project.photo_gallery.create', compact('project')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function storeProjectPhoto(Request $request, Project $project)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'photo_type' => 'required|in:photo_gallery_image,slider_image,at_a_glance_image,features_and_amenities_image',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $projectPhoto = new ProjectPhotoGallery();
        $projectPhoto->title = $request->title;
        $projectPhoto->photo_type = $request->photo_type;
        $projectPhoto->project_id = $project->id;
        $projectPhoto->photo = $request->file('photo')->store('project');
        $projectPhoto->save();

        Alert::toast('Project photo successfully created', 'success');

        return redirect()->route('admin.project.details', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroyProjectPhoto($id)
    {
        $projectPhoto = ProjectPhotoGallery::findOrFail($id);

        if (Storage::exists($projectPhoto->file)) {
            Storage::delete($projectPhoto->file);
        }

        $projectPhoto->delete();

        Alert::toast('Project photo successfully deleted', 'success');

        return back();
    }
}
