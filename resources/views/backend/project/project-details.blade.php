@extends('backend.layouts.app')

@section('title',' Project gallery')

@push('style')
<style>
  .hover-me {
    position: absolute;
    top: 4px;
    right: 12px;
    font-size: 20px;
    color: #6c757d;
    transition: 0.5s;
  }
  .hover-me:hover{
    color: red
  }
</style>

@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>{{ $project->title }}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-sm btn-primary">
                    Edit Project
                </a>&nbsp;
                <a href="{{ route('admin.project.specification', $project->id) }}" class="btn btn-sm btn-primary">
                    Add Project Specification
                </a>&nbsp;
                <a href="{{ route('admin.project.photo', $project->id) }}" class="btn btn-sm btn-primary">
                    Add Project Photo
                </a>&nbsp;
                <a href="{{ route('admin.project.create') }}" class="btn btn-sm btn-primary">
                    Create New Project
                </a>
              </ol>
            </div>
          </div>
        </div>
      </section>
    <section class="content p-10">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                      <h3 class="card-title text-bold">Project Information</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <table>
                          <tr>
                            <td width="25%">Project Category</td>
                            <td style="padding-left: 20px">: {{ $project->category->name }}</td>
                          </tr>
                          <tr>
                            <td>Project Type</td>
                            <td style="padding-left: 20px">: {{ $project->type->name }}</td>
                          </tr>
                          <tr>
                            <td>Featured Project</td>
                            <td style="padding-left: 20px">: {{ $project->is_featured }}</td>
                          </tr>
                          <tr>
                            <td>Best Project</td>
                            <td style="padding-left: 20px">: {{ $project->is_best }}</td>
                          </tr>
                          <tr>
                            <td>Short Description</td>
                            <td style="padding-left: 20px">: {{ $project->short_description }}</td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-6">
                        <table>
                          <tr>
                            <td>Address 1</td>
                            <td style="padding-left: 20px">: {{ $project->address_1 }}</td>
                          </tr>
                          <tr>
                            <td>Address 2</td>
                            <td style="padding-left: 20px">: {{ $project->address_2 }}</td>
                          </tr>
                          <tr>
                            <td>District</td>
                            <td style="padding-left: 20px">: {{ $project->district }}</td>
                          </tr>
                          <tr>
                            <td>Police Station</td>
                            <td style="padding-left: 20px">: {{ $project->police_station }}</td>
                          </tr>
                          <tr>
                            <td>Zip Code</td>
                            <td style="padding-left: 20px">: {{ $project->zip_code }}</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="card">
                      <div class="card-header">
                          <h3 class="card-title text-bold">Project Specification</h3>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>                  
                            <tr>
                              <th>SL</th>
                              <th>Specification</th>
                              <th>Value</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($project->projectSpecification as $key => $specification)
                                <tr>
                                    <td width="50" class="text-center">{{ $key +1 }}</td>
                                     <td>{{ $specification->specification->title }}</td>  
                                    <td>{{ $specification->value }}</td>
                                </tr>  
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="card">
                      <div class="card-header">
                          <h3 class="card-title text-bold">Photo Gallery</h3>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          @foreach ($project->projectPhotoGallery as $item)
                            <div class="col-3">
                              <div>
                                <a href="{{ route('admin.project.photo.destroy', $item->id)}}">
                                  <i class="hover-me fas fa-times-circle"></i>
                                </a>
                                  <img class="p-2 img-fluid img-thumbnail" src="{{ asset('storage/'.$item->photo) }}" alt="photo">
                                  <p class="pt-2 text-center">{{ $item->title }}</p>
                              </div>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </section>
@endsection

@push('script')

@endpush