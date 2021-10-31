@extends('frontend.layouts.app')

@section('title', $title . ' Page')

    @push('css')

    @endpush

@section('content')
    <section
        style="margin: 0; background-image: url({{ asset('storage/' . $settings->breadcrub_image) }});background-attachment: fixed;background-size: cover;background-position: center;background-repeat: no-repeat;"
        class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-light ">{{ $title }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center text-light">
                        <li><a class="text-light" href="{{ route('home') }}">Home</a></li>
                        <li class="active">Media</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section border-0 m-0 pb-3 appear-animation" data-appear-animation="fadeInUp"
        data-appear-animation-delay="0" data-appear-animation-duration="1s">
        <div class="container container-lg-custom">
            <div class="row pb-1">
                @forelse ($media as $medium)
                    <div class="col-sm-6 col-lg-4 mb-4 pb-2">
                        <a href="{{ route(Str::lower($title) . '.details', [$medium->id, Str::slug($medium->title)]) }}">
                            <article>
                                <div
                                    class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
                                    <div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
                                        <img src="{{ asset('storage/' . $medium->photo) }}" class="img-fluid"
                                            alt="{{ $title }} - {{ config('app.name', 'Laravel') }}">
                                        <div class="thumb-info-title bg-transparent p-4">
                                            <div class="thumb-info-type bg-color-primary px-2 mb-1">{{ $title }}</div>
                                            <div class="thumb-info-inner mt-1">
                                                <h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0">
                                                    {{ $medium->title }}</h2>
                                            </div>
                                            <div class="thumb-info-show-more-content">
                                                <p class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5">
                                                    {{ $medium->short_description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </a>
                    </div>
                @empty
                    <p class="text-center">No {{ $title }} found!</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('script')

@endpush
