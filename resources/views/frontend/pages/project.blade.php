@extends('frontend.layouts.app')

@section('title', 'Project Page')

    @push('css')

    @endpush

@section('content')
    <section
        style="margin: 0; background-image: url({{ asset('storage/' . $settings->breadcrub_image) }});background-attachment: fixed;background-size: cover;background-position: center;background-repeat: no-repeat;"
        class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-light ">{{ $type->name }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center text-light">
                        <li><a class="text-light" href="{{ route('home') }}">Home</a></li>
                        <li class="active">Project</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section border-0 m-0 pb-0  appear-animation" data-appear-animation="fadeIn">
        <ul class=" pb-3 nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="portfolio"
            data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
            <li class="nav-item active" data-option-value="*"><a class="nav-link text-1 text-uppercase active" href="#">Show
                    All</a></li>
            @foreach ($categories as $category)
                <li class="nav-item" data-option-value=".{{ \Illuminate\Support\Str::slug($category->name) }}"><a
                        class="nav-link text-1 text-uppercase" href="#">{{ $category->name }}</a></li>
            @endforeach
        </ul>

        <div class="sort-destination-loader sort-destination-loader-showing recent-posts  m-0 p-0">
            <div class="row portfolio-list sort-destination m-0 p-0" data-sort-id="portfolio">
                @forelse ($projects as $project)
                    <div
                        class="col-sm-6 col-lg-4 pb-2 mb-4 isotope-item {{ \Illuminate\Support\Str::slug($project->category->name) }} text-left">
                        <a href="{{ route('project.details', [$project->id, Str::slug($project->title)]) }}">
                            <article>
                                <div
                                    class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
                                    <div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
                                        <img src="{{ asset('storage/' . $project->featured_image) }}" class="img-fluid"
                                            alt="{{ $project->title }} - {{ config('app.name', 'Laravel') }}">

                                        <div class="thumb-info-title bg-transparent p-4">
                                            <div class="thumb-info-type bg-color-primary px-2 mb-1">
                                                {{ $project->type->name }}
                                            </div>
                                            <div class="thumb-info-inner mt-1">
                                                <h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0">
                                                    {{ $project->title }}
                                                </h2>
                                            </div>
                                            <div class="thumb-info-show-more-content">
                                                <p
                                                    class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5 d-none d-lg-block">
                                                    {{ $project->short_description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </a>
                    </div>
                @empty
                    <p class="text-center">No {{ $type->name }} Project Found</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('script')

@endpush
