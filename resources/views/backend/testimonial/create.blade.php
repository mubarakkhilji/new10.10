@extends('backend.layouts.app')

@section('title','Create Testimonial')

@push('css')

@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Create Testimonial</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Create Testimonial</li>
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
                <form  action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputFullName">Full name</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="exampleInputFullName" placeholder="Enter full name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFullName">Designation</label>
                      <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" value="{{ old('designation') }}" id="exampleInputFullName" placeholder="Enter designation">
                        @error('designation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFullName">Company</label>
                      <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" value="{{ old('company') }}" id="exampleInputFullName" placeholder="Enter company">
                        @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputMobile">Testimonial</label>
                      <textarea type="text" name="testimonial" class="form-control @error('testimonial') is-invalid @enderror" id="exampleInputMobile" placeholder="Enter testimonial">{{ old('testimonial') }}</textarea>
                        @error('testimonial')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="status">Status : </label>
                      <input name="status" type="radio" checked id="radio_1" value="Active" class="@error('status') is-invalid @enderror">
                      <span for="radio1">Active</span>
                      <input name="status" type="radio" id="radio_2" value="Inactive" class="@error('status') is-invalid @enderror">
                      <span for="radio_2">Inactive</span>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Upload photo</label><br>
                        <input type="file" name="photo" class="@error('photo') is-invalid @enderror">
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