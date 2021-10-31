@extends('frontend.layouts.app')

@section('title', 'About Us Page')

@section('content')
    <section
        style="margin: 0; background-image: url({{ asset('storage/' . $settings->breadcrub_image) }});background-attachment: fixed;background-size: cover;background-position: center;background-repeat: no-repeat;"
        class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-light ">{{ $aboutUs->page_title }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center text-light">
                        <li><a class="text-light" href="{{ route('home') }}">Home</a></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">
        <div class="row mb-2">
            <div class="col page-content" style="word-break: break-word!important;">
                {!! $aboutUs->page_content !!}
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
