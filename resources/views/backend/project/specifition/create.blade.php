@extends('backend.layouts.app')

@section('title','Create Project specification')

@push('css')

@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Create Project specification</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Create Project specification</li>
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
                        <form  action="{{ route('admin.project.specification.store', $project->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @foreach ($specifications as $specification)
                                    <div class="form-group">
                                        <label for="exampleInputFullName">{{ $specification->title }}</label>
                                        <input style="display: none" type="text" name="specification_id[]" value="{{ $specification->id }}">
                                          <input type="text" name="value[]" class="form-control @error('value') is-invalid @enderror" value="{{ old('value', isset($projectSpecification[$specification->id]) ? $projectSpecification[$specification->id] : '') }}" id="exampleInputFullName" placeholder="Enter project specification value">          
                                        @error('value')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div> 
                                @endforeach
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