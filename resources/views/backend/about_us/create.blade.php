@extends('backend.layouts.app')

@section('title','Create About Us Page')

@push('css')

@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Create About Us Page</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Create About Us Page</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
    <section class="content p-10">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card card-primary">
                <form  action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputFullName">Page Title</label>
                      <input type="text" name="page_title" class="form-control @error('page_title') is-invalid @enderror" value="{{ old('page_title') }}" id="exampleInputFullName" placeholder="Enter page title">
                        @error('page_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputMobile">Page Content</label>
                        <textarea name="page_content" class="@error('page_content') is-invalid @enderror">{!! old('page_content') !!}</textarea>
                        @error('page_content')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    <div class="form-group">
                      <label for="status">Status : </label>
                      <input name="status" type="radio" checked  id="radio_1" value="Active" class="@error('status') is-invalid @enderror">
                      <span for="radio_1">Active</span>
                      <input name="status" type="radio" id="radio_2" value="Inactive" class="@error('status') is-invalid @enderror">
                      <span for="radio_2">Inactive</span>
                        @error('status')
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
<script src="{{ asset('assets/backend/ckeditor/ckeditor.js') }}"></script>
{{-- <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> --}}
<script>
  CKEDITOR.replace('page_content', {
    filebrowserUploadUrl: "{{route('admin.about.file.Upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
</script>
@endpush