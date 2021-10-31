@extends('frontend.layouts.app')

@section('title', 'Career Details Page')

    @push('css')

    @endpush

@section('content')
    <section
        style="margin: 0; background-image: url({{ asset('storage/' . $settings->breadcrub_image) }});background-attachment: fixed;background-size: cover;background-position: center;background-repeat: no-repeat;"
        class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-light ">{{ $career->job_title }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center text-light">
                        <li><a class="text-light" href="{{ route('home') }}">Home</a></li>
                        <li class="active">Job Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">
        <h2 class="font-weight-bold text-6 mb-3">Job Details</h2>
        <div class="row mb-2">
            <div class="col-md-8">
               
                    @if ($career->job_responsibilities)
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong>Job Responsibilities</strong>
                        </div>
                        <div class="card-body">
                            <p>{!! $career->job_responsibilities !!}</p>
                        </div>
                    </div>
                    @endif
                    @if ($career->educational_requirements)
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong>Educational Requirements</strong>
                        </div>
                        <div class="card-body">
                            <p>{!! $career->educational_requirements !!}</p>
                        </div>
                    </div>
                    @endif
                    @if ($career->experience_requirements)
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong>Experience Requirements</strong>
                        </div>
                        <div class="card-body">
                            <p>{!! $career->experience_requirements !!}</p>
                        </div>
                    </div>
                    @endif
                    @if ($career->additional_requirements)
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong>Additional Requirements</strong>
                        </div>
                        <div class="card-body">
                            <p>{!! $career->additional_requirements !!}</p>
                        </div>
                    </div>
                    @endif
                    @if ($career->compensation_other_benefits)
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong>Compensation And Other Benefits</strong>
                        </div>
                        <div class="card-body">
                            <p>{!! $career->compensation_other_benefits !!}</p>
                        </div>
                    </div>
                    @endif
                    @if ($career->compensation_other_benefits)
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong>Apply Instruction</strong>
                        </div>
                        <div class="card-body">
                            <p>{!! $career->apply_instruction !!}</p>
                        </div>
                    </div>
                    @endif
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Job Summery</strong>
                    </div>
                    <div class="card-body ">
                        <p class="mb-0"><strong>Location</strong> : {{ $career->job_location }}</p>
                        <p class="mb-0"><strong>Deadline</strong>: {{ $career->deadline }}</p>
                        <p class="mb-0"><strong>Vacancy</strong>: {{ $career->vacancy }}</p>
                        <p class="mb-0"><strong>Salary</strong>: {{ $career->salary }}</p>
                        <p class="mb-0"><strong>Employment Status</strong>: {{ $career->employment_status }}</p>
                        <p class="mb-0"><strong>Published Date</strong>: {{ $career->created_at->toDateString() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
