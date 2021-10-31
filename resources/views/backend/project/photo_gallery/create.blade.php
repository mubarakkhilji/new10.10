@extends('backend.layouts.app')

@section('title','Create Project Photo')

@push('css')

@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Create Project Photo</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Create Project Photo</li>
              </ol>
            </div>
          </div>
        </div>
    </section>
    <section class="content p-10">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card card-primary">
                <form  action="{{ route('admin.project.photo.store', $project->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFullName">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="exampleInputFullName" placeholder="Enter title">
                      @error('title')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFullName">Photo Type</label>
                    <select name="photo_type" class="form-control @error('photo_type') is-invalid @enderror">
                      <option value="">Select a photo type</option>
                      <option value="slider_image">Slider image</option>
                      <option value="photo_gallery_image">Photo gallery image</option>
                      <option value="at_a_glance_image">At a glance image</option>
                      <option value="features_and_amenities_image">Features and amenities</option>
                    </select>
                      @error('photo_type')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label>Upload Photo</label><br>
                        <input type="file" name="photo" class="@error('photo') is-invalid @enderror" id="exampleInputFullName">
                          @error('photo')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                  </div>
                </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection

@push('script')

@endpush