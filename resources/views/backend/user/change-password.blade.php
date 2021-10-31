@extends('backend.layouts.app')

@section('title','Profile')

@push('css')

@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Change Password</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Change password</li>
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
                <form  action="{{ route('password.update') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Old password</label>
                            <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter old password">
                            @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">New password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword2" placeholder="Enter new password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword3">Confirm password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword3" placeholder="retype new password">
                        </div>
                  </div>  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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