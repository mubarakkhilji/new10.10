@extends('backend.layouts.app')

@section('title','Edit Project')

@push('css')

@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Project</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Edit Project</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
    <section class="content p-10">
        <div class="container-fluid">
            <form  action="{{ route('admin.project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                <label for="exampleInputFullName">Project Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $project->title) }}" id="exampleInputFullName" placeholder="Enter project title">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label for="exampleInputFullName">Short Description</label>
                                    <textarea class="form-control @error('short_description') is-invalid @enderror" name="short_description" value="" placeholder="Enter project short description">{{ old('short_description', $project->short_description) }}</textarea>
                                    @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label for="exampleInputFullName">Project Category</label>
                                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">Select project category</option>
                                        @foreach ($categories as $category)
                                            <option {{ $category->id == $project->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label for="exampleInputFullName">Project Type</label>
                                    <select name="type_id" class="form-control @error('type_id') is-invalid @enderror">
                                        <option value="">Select project type</option>
                                        @foreach ($types as $type)
                                            <option {{ $type->id == $project->type_id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label for="status">Is Featured : </label>
                                <input name="is_featured" type="checkbox" {{ $project->is_featured == 'Yes' ? 'checked' : '' }} value="Yes" class="@error('is_featured') is-invalid @enderror">
                                    @error('is_featured')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <label for="status">Is Best Project : </label>
                                <input name="is_best" type="checkbox" {{ $project->is_best == 'Yes' ? 'checked' : '' }} value="Yes" class="@error('is_best') is-invalid @enderror">
                                    @error('is_best')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputMobile">Project Details</label>
                                    <textarea name="details">{!! old('details', $project->details) !!}</textarea>
                                    @error('details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status : </label>
                                    <input name="status" type="radio" {{ $project->status == 'Draft' ? 'checked' : '' }}  id="radio_1" value="Draft" class="@error('status') is-invalid @enderror">
                                    <span for="radio">Draft</span>
                                    <input name="status" type="radio" {{ $project->status == 'Published' ? 'checked' : '' }} id="radio_2" value="Published" class="@error('status') is-invalid @enderror">
                                    <span for="radio_2">Published</span>
                                      @error('status')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                </div>
                                <div class="form-group">
                                    <label>Featured Image</label><br>
                                    <input class="@error('featured_image') is-invalid @enderror" type="file" name="featured_image">
                                    @error('featured_image')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Contact Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            <label for="exampleInputFullName">Address 1</label>
                                <textarea class="form-control @error('address_1') is-invalid @enderror" name="address_1" placeholder="Enter address 1">{{ old('address_1', $project->address_1) }}</textarea>
                                @error('address_1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for="exampleInputFullName">Address 2</label>
                                <textarea class="form-control @error('address_2') is-invalid @enderror" name="address_2" placeholder="Enter address 2">{{ old('address_2', $project->address_2) }}</textarea>
                                @error('address_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFullName">District</label>
                                <input type="text" name="district" class="form-control @error('district') is-invalid @enderror" value="{{ old('district', $project->district) }}" id="exampleInputFullName" placeholder="Enter district">
                                    @error('district')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFullName">Police Station</label>
                                <input type="text" name="police_station" class="form-control @error('police_station') is-invalid @enderror" value="{{ old('police_station', $project->police_station) }}" id="exampleInputFullName" placeholder="Enter police station">
                                    @error('police_station')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFullName">Zip Code</label>
                                <input type="text" name="zip_code" class="form-control @error('zip_code') is-invalid @enderror" value="{{ old('zip_code', $project->zip_code) }}" id="exampleInputFullName" placeholder="Enter zip code">
                                    @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFullName">Project Location (Google map)</label>
                                <textarea type="text" name="project_location_map" class="form-control @error('project_location_map') is-invalid @enderror" id="exampleInputFullName" placeholder="Enter project location map">{{ old('project_location_map', $project->project_location_map) }}</textarea>
                                    @error('project_location_map')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFullName">Project Video (Youtube link)</label>
                                <input type="text" name="video" value="{{ old('video', $project->video) }}" class="form-control @error('video') is-invalid @enderror" id="exampleInputFullName" placeholder="Enter project video link">
                                    @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
        </div>
      </section>
@endsection

@push('script')
<script src="{{ asset('assets/backend/ckeditor/ckeditor.js') }}"></script>
{{-- <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> --}}
<script>
  CKEDITOR.replace('details', {
        filebrowserUploadUrl: "{{route('admin.news.file.Upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endpush