@extends('backend.layouts.app')

@section('title', 'Create Career')

    @push('style')

    @endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Career</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Career</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content p-10">
        <div class="container-fluid">
            <form action="{{ route('admin.career.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputFullName">Job Title</label>
                                        <input type="text" name="job_title"
                                            class="form-control @error('job_title') is-invalid @enderror"
                                            value="{{ old('job_title') }}" id="exampleInputFullName"
                                            placeholder="Enter job title">
                                        @error('job_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFullName">Vacancy</label>
                                        <input type="text" name="vacancy"
                                            class="form-control @error('vacancy') is-invalid @enderror"
                                            value="{{ old('vacancy') }}" id="exampleInputFullName"
                                            placeholder="Enter vacancy">
                                        @error('vacancy')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFullName">Job Location</label>
                                        <input type="text" name="job_location"
                                            class="form-control @error('job_location') is-invalid @enderror"
                                            value="{{ old('job_location') }}" id="exampleInputFullName"
                                            placeholder="Enter job location">
                                        @error('job_location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFullName">Salary</label>
                                        <input type="text" name="salary"
                                            class="form-control @error('salary') is-invalid @enderror"
                                            value="{{ old('salary') }}" id="exampleInputFullName" placeholder="Enter salary">
                                        @error('salary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFullName">Application Deadline</label>
                                        <input type="date" name="deadline"
                                            class="form-control @error('deadline') is-invalid @enderror"
                                            value="{{ old('deadline') }}" id="exampleInputFullName"
                                            placeholder="Enter application deadline">
                                        @error('deadline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Employment Status : </label>
                                        <input name="employment_status" type="radio" checked id="radio_1" value="Full time"
                                            class="@error('employment_status') is-invalid @enderror">
                                        <span for="radio">Full time</span>
                                        <input name="employment_status" type="radio" id="radio_2" value="Half time"
                                            class="@error('employment_status') is-invalid @enderror">
                                        <span for="radio_2">Half time</span>
                                        <input name="employment_status" type="radio" id="radio_3" value="Contructual"
                                            class="@error('employment_status') is-invalid @enderror">
                                        <span for="radio_3">Contructual</span>
                                        @error('employment_status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status : </label>
                                        <input name="job_status" type="radio" checked id="radio_1" value="Draft"
                                            class="@error('job_status') is-invalid @enderror">
                                        <span for="radio">Draft</span>
                                        <input name="job_status" type="radio" id="radio_2" value="Published"
                                            class="@error('job_status') is-invalid @enderror">
                                        <span for="radio_2">Published</span>
                                        @error('job_status')
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
                    <div class="col-md-6">
                        <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputMobile">Job Responsibilities</label>
                                        <textarea class="@error('job_responsibilities') is-invalid @enderror"
                                            name="job_responsibilities">{!!  old('job_responsibilities') !!}</textarea>
                                        @error('job_responsibilities')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputMobile">Educational Requirements</label>
                                        <textarea class="@error('educational_requirements') is-invalid @enderror"
                                            name="educational_requirements">{!!  old('educational_requirements') !!}</textarea>
                                        @error('educational_requirements')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputMobile">Experience Requirements</label>
                                        <textarea class="@error('experience_requirements') is-invalid @enderror"
                                            name="experience_requirements">{!!  old('experience_requirements') !!}</textarea>
                                        @error('experience_requirements')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputMobile">Additional Requirements</label>
                                        <textarea class="@error('additional_requirements') is-invalid @enderror"
                                            name="additional_requirements">{!!  old('additional_requirements') !!}</textarea>
                                        @error('additional_requirements')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputMobile">Compensation And Other Benefits</label>
                                        <textarea class="@error('compensation_other_benefits') is-invalid @enderror"
                                            name="compensation_other_benefits">{!!  old('compensation_other_benefits') !!}</textarea>
                                        @error('compensation_other_benefits')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputMobile">Apply Instruction</label>
                                        <textarea class="@error('apply_instruction') is-invalid @enderror"
                                            name="apply_instruction">{!!  old('apply_instruction') !!}</textarea>
                                        @error('apply_instruction')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </form>
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
        CKEDITOR.replace('job_responsibilities', {
            filebrowserUploadUrl: "{{ route('admin.blog.file.Upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('educational_requirements', {
            filebrowserUploadUrl: "{{ route('admin.blog.file.Upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('experience_requirements', {
            filebrowserUploadUrl: "{{ route('admin.blog.file.Upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('additional_requirements', {
            filebrowserUploadUrl: "{{ route('admin.blog.file.Upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('compensation_other_benefits', {
            filebrowserUploadUrl: "{{ route('admin.blog.file.Upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('apply_instruction', {
            filebrowserUploadUrl: "{{ route('admin.blog.file.Upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

    </script>
@endpush
