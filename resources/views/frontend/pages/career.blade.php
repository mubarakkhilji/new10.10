@extends('frontend.layouts.app')

@section('title', 'About Us Page')

    @push('css')

    @endpush

@section('content')
    <section
        style="margin: 0; background-image: url({{ asset('storage/' . $settings->breadcrub_image) }});background-attachment: fixed;background-size: cover;background-position: center;background-repeat: no-repeat;"
        class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-light ">Join With Us</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center text-light">
                        <li><a class="text-light" href="{{ route('home') }}">Home</a></li>
                        <li class="active">Career</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">
        <h2 class="font-weight-bold text-6 mb-3">OPEN POSITIONS</h2>
        <div class="row mb-2">
            <div class="col-md-12">
                @forelse ($careers as $career)
                    <div class="card">
                        <div class="card-header">
                            <a style="text-decoration: none" href="{{ route('career.details', [$career->id, Str::slug($career->job_title)]) }}">
                                <div>
                                    <span class="text-blod h4">{{ $career->job_title }}</span>
                                    <small class="float-right">{{ $career->created_at->diffForHumans() }}</small>
                                </div><br>
                                <p class="mb-0">
                                    @if (strlen($career->job_responsibilities) >= 120)
                                    <strong>Job Responsibilities</strong>: {!! Str::limit($career->job_responsibilities, 120) !!}...
                                    @else
                                    <strong>Job Responsibilities</strong>: {!! $career->job_responsibilities !!}
                                    @endif
                                </p>
                                <p class="mb-0"><strong>Job Location</strong>: {{ $career->job_location }}</p>
                                <p class="mb-0"><strong>Deadline</strong>: {{ $career->deadline }}</p>
                            </a>
                        </div><br>
                    </div>
                @empty
                    <p class="text-center">No position is open now</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
