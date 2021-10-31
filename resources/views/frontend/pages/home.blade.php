@extends('frontend.layouts.app')

@section('title', 'Home Page')

    @push('css')

    @endpush

@section('content')
    <div class="owl-carousel-wrapper" style="height: 100vh;">
        <div class="owl-carousel dots-inside dots-horizontal-center show-dots-hover show-dots-xs dots-light nav-inside nav-inside-plus nav-dark nav-md nav-font-size-md show-nav-hover mb-0"
            data-plugin-options="{'responsive': {'0': {'items': 1, 'dots': true, 'nav': false}, '479': {'items': 1}, '768': {'items': 1}, '979': {'items': 1}, '1199': {'items': 1}}, 'loop': false, 'autoHeight': false, 'margin': 0, 'dots': false, 'dotsVerticalOffset': '-35px', 'nav': true, 'animateIn': 'fadeIn', 'animateOut': 'fadeOut', 'mouseDrag': false, 'touchDrag': false, 'pullDrag': false, 'autoplay': true, 'autoplayTimeout': 9000, 'autoplayHoverPause': true, 'rewind': true}">

            @foreach ($sliders as $slider)
                <div class="position-relative overlay overlay-show overlay-op-9 pt-5"
                    style="background-image: url({{ asset('storage/' . $slider->file) }}); background-size: cover; background-position: center; height: 100vh;">
                    <div class="container position-relative z-index-3 h-100">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="col-lg-7 text-center">
                                <div class="d-flex flex-column align-items-center justify-content-center h-100">
                                    @if ($slider->sub_heading)
                                        <h3 class="position-relative text-color-light text-5 line-height-5 font-weight-medium ls-0 px-4 mb-1 appear-animation"
                                            data-appear-animation="fadeInDownShorterPlus"
                                            data-plugin-options="{'minWindowWidth': 0}">
                                            <span
                                                class="position-absolute right-100pct top-50pct transform3dy-n50 opacity-7">
                                                <img src="{{ asset('assets/frontend/img/slides/slide-title-border-light.png') }}"
                                                    class="w-auto appear-animation"
                                                    data-appear-animation="fadeInRightShorter"
                                                    data-appear-animation-delay="250"
                                                    data-plugin-options="{'minWindowWidth': 0}"
                                                    alt="{{ config('app.name', 'Laravel') }} Slider Image" />
                                            </span>

                                            {{ $slider->sub_heading }}

                                            <span
                                                class="position-absolute left-100pct top-50pct transform3dy-n50 opacity-7">
                                                <img src="{{ asset('assets/frontend/img/slides/slide-title-border-light.png') }}"
                                                    class="w-auto appear-animation"
                                                    data-appear-animation="fadeInLeftShorter"
                                                    data-appear-animation-delay="250"
                                                    data-plugin-options="{'minWindowWidth': 0}"
                                                    alt="{{ config('app.name', 'Laravel') }} Slider Image" />
                                            </span>
                                        </h3>
                                    @endif
                                    <h1 class="text-color-light font-weight-extra-bold text-10 text-sm-12-13 line-height-1 line-height-sm-3 mb-2 appear-animation"
                                        data-appear-animation="blurIn" data-appear-animation-delay="500"
                                        data-plugin-options="{'minWindowWidth': 0}">{{ $slider->heading }}</h1>
                                    <p class="text-4-5 text-color-light font-weight-light opacity-7 text-center mb-4"
                                        data-plugin-animated-letters
                                        data-plugin-options="{'startDelay': 1000, 'minWindowWidth': 0, 'animationSpeed': 30}">
                                        {{ $slider->description }}
                                    </p>
                                    <div class="appear-animation" data-appear-animation="fadeInUpShorter"
                                        data-appear-animation-delay="2300">
                                        @php
                                            $actionButtons = json_decode($slider->action_button);
                                        @endphp
                                        <div class="d-flex align-items-center mt-2">
                                            @foreach ($actionButtons->title as $key => $actionButton)
                                                @if ($actionButton)
                                                    <a href="{{ $actionButtons->url[$key] }}"
                                                        class="btn btn-primary btn-modern font-weight-bold text-2 py-3 btn-px-4 ml-4 mr-3">{{ $actionButton }}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <section id="services" class="section section-height-3 bg-primary border-0 m-0 appear-animation"
        data-appear-animation="fadeIn">
        <div class="container my-3">
            <div class="row mb-5">
                <div class="col text-center appear-animation" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="200">

                    <h2 class="font-weight-bold text-color-light mb-2  text-uppercase">
                        {{ Str::upper($settings->why_choose_us_title) }}</h2>

                    <p class="text-color-light opacity-7">{{ $settings->why_choose_us_sub_title }}</p>
                </div>
            </div>
            <div class="row mb-lg-4">
                @foreach ($whyChooseUs as $item)
                    <div class="col-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter"
                        data-appear-animation-delay="300">
                        <div class="feature-box feature-box-style-2">
                            <div class="feature-box-icon">
                                <img width="40" src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->title }} - {{ config('app.name', 'Laravel') }}">
                            </div>
                            <div class="feature-box-info">
                                <h4 class="font-weight-bold text-color-light text-4 mb-2 text-uppercase">
                                    {{ $item->title }}
                                </h4>
                                <p class="text-color-light opacity-7">{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section border-0 m-0 pb-0  appear-animation" data-appear-animation="fadeIn">
        <div class="container container-lg-custom">
            <div class="row justify-content-center pt-3 mt-3">
                <div class="col-lg-9 text-center">
                    <div class="appear-animation animated fadeInUpShorter appear-animation-visible"
                        data-appear-animation="fadeInUpShorter" style="animation-delay: 100ms;">
                        <h2 class="font-weight-normal text-6 mt-4">{{ $settings->project_title }}</h2>
                        <p class="mb-5">{{ $settings->project_sub_title }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="sort-destination-loader sort-destination-loader-showing recent-posts bg-dark m-0 p-0">
            <div class="row portfolio-list sort-destination m-0 p-0" data-sort-id="portfolio">
                @foreach ($projects as $project)
                    <div
                        class=" {{ $project->is_best == 'Yes' ? 'col-sm-6 col-lg-6 p-0 m-0 isotope-item text-left' : 'col-sm-6 col-lg-3 p-0 m-0 isotope-item text-left' }} col-sm-6 col-lg-3 p-0 m-0 isotope-item text-left">
                        <a href="{{ route('project.details', [$project->id, Str::slug($project->title)]) }}">
                            <article>
                                <div
                                    class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
                                    <div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
                                        <img src="{{ asset('storage/' . $project->featured_image) }}" class="img-fluid"
                                            alt="{{ $project->title }} - {{ config('app.name', 'Laravel') }}">
                                        <div class="thumb-info-title bg-transparent p-4">
                                            <div class="thumb-info-type bg-color-primary px-2 mb-1">
                                                {{ $project->type->name }}</div>
                                            <div class="thumb-info-inner mt-1">
                                                <h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0">
                                                    {{ $project->title }}</h2>
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
                @endforeach
            </div>
        </div>
        <ul class="nav nav-pills sort-source sort-source-style-3 d-none" data-sort-id="portfolio" data-option-key="filter"
            data-plugin-options="{'layoutMode': 'packery', 'filter': '*'}">
            <li class="nav-item active" data-option-value="*"><a class="nav-link text-1 text-uppercase active" href="#">Show
                    All</a></li>
        </ul>
    </section>



    <section class="call-to-action call-to-action-primary appear-animation" data-appear-animation="fadeInUp"
        data-appear-animation-delay="0" data-appear-animation-duration="1s">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-lg-9">
                    <div class="call-to-action-content">
                        <h3>{{ $settings->call_to_action_one_title }}</h3>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3">
                    <div class="call-to-action-btn">
                        @if ($settings->call_to_action_one_button_title)
                            <a href="{{ $settings->call_to_action_one_button_url }}" target="_blank"
                                class="btn btn-modern text-2 btn-light border-0">{{ $settings->call_to_action_one_button_title }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section border-0 m-0 pb-3 appear-animation" data-appear-animation="fadeInUp"
        data-appear-animation-delay="0" data-appear-animation-duration="1s">
        <div class="container container-lg-custom">
            <div class="row">
                <div class="col-lg-12 text-center appear-animation animated fadeInUpShorter appear-animation-visible"
                    data-appear-animation="fadeInUpShorter" style="animation-delay: 100ms;">
                    <h2 class="font-weight-normal text-6 pb-2 mb-4"><strong
                            class="font-weight-extra-bold">{{ Str::upper($settings->media_title) }}</strong></h2>
                </div>
            </div>

            <div class="row pb-1">
                @foreach ($news as $item)
                    <div class="col-sm-6 col-lg-4 mb-4 pb-2">
                        <a href="{{ route('news.details', [$item->id, Str::slug($item->title)]) }}">
                            <article>
                                <div
                                    class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
                                    <div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
                                        <img src="{{ asset('storage/' . $item->photo) }}" class="img-fluid"
                                            alt="{{ $item->title }} - {{ config('app.name', 'Laravel') }}">
                                        <div class="thumb-info-title bg-transparent p-4">
                                            <div class="thumb-info-type bg-color-primary px-2 mb-1">News</div>
                                            <div class="thumb-info-inner mt-1">
                                                <h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0">
                                                    {{ $item->title }}</h2>
                                            </div>
                                            <div class="thumb-info-show-more-content">
                                                <p class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5">
                                                    {{ $item->short_description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </a>
                    </div>
                @endforeach

                @foreach ($events as $event)
                    <div class="col-sm-6 col-lg-4 mb-4 pb-2">
                        <a href="{{ route('news.details', [$event->id, Str::slug($event->title)]) }}">
                            <article>
                                <div
                                    class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
                                    <div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
                                        <img src="{{ asset('storage/' . $event->photo) }}" class="img-fluid"
                                            alt="{{ $event->title }} - {{ config('app.name', 'Laravel') }}">
                                        <div class="thumb-info-title bg-transparent p-4">
                                            <div class="thumb-info-type bg-color-primary px-2 mb-1">Event</div>
                                            <div class="thumb-info-inner mt-1">
                                                <h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0">
                                                    {{ $event->title }}</h2>
                                            </div>
                                            <div class="thumb-info-show-more-content">
                                                <p class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5">
                                                    {{ $event->short_description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section
        class="section section-height-3 section-background border-0 m-0 appear-animation animated fadeIn appear-animation-visible"
        data-appear-animation="fadeIn"
        style="background-image: url({{ asset('assets/frontend/img/parallax/parallax-10.jpg') }}); background-size: cover; background-position: center center; animation-delay: 100ms;">
        <div class="container">
            <div class="row justify-content-center my-4">
                <div class="col appear-animation" data-appear-animation="fadeInUpShorter">
                    <div class="owl-carousel owl-theme nav-bottom rounded-nav"
                        data-plugin-options="{'items': 1, 'loop': true, 'autoHeight': true}">
                        @foreach ($testimonials as $testimonial)
                            <div>
                                <div class="col">
                                    <div
                                        class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark mb-0">
                                        <div class="testimonial-author">
                                            @if ($testimonial->photo)
                                                <img src="{{ asset('storage/' . $testimonial->photo) }}"
                                                    class="img-fluid rounded-circle"
                                                    alt="{{ $testimonial->name }} - {{ config('app.name', 'Laravel') }}">
                                            @else
                                                <img src="{{ asset('assets/frontend/img/avatar.png') }}"
                                                    class="img-fluid rounded-circle"
                                                    alt="{{ $testimonial->name }} - {{ config('app.name', 'Laravel') }}">
                                            @endif
                                        </div>
                                        <blockquote>
                                            <p class="text-color-dark text-5 line-height-5">
                                                {{ $testimonial->testimonial }}
                                            </p>
                                        </blockquote>
                                        <div class="testimonial-author pb-2">
                                            <p class="opacity-10"><strong
                                                    class="font-weight-extra-bold text-2">-{{ $testimonial->name }}
                                                </strong></p>
                                        </div>
                                        @if ($testimonial->designation)
                                            <div class="testimonial-author">
                                                <p class="opacity-10">{{ $testimonial->designation }} -
                                                    {{ $testimonial->company }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="call-to-action button-centered appear-animation" data-appear-animation="fadeInUp"
        data-appear-animation-delay="0" data-appear-animation-duration="1s">
        <div class="col-12">
            <div class="call-to-action-content">
                <h3>{{ $settings->call_to_action_two_title }}</h3>
            </div>
        </div>
        <div class="col-12">
            <div class="call-to-action-btn">
                @if ($settings->call_to_action_two_button_one_title)
                    <a href="{{ $settings->call_to_action_two_button_one_url }}" target="_blank"
                        class="btn btn-modern text-2 btn-primary">{{ $settings->call_to_action_two_button_one_title }}</a>
                @endif

                @if ($settings->call_to_action_two_button_two_title)
                    <a href="{{ $settings->call_to_action_two_button_two_url }}" target="_blank"
                        class="btn btn-modern text-2 btn-primary">{{ $settings->call_to_action_two_button_two_title }}</a>
                @endif

            </div>
        </div>
    </section>
@endsection

@push('script')

@endpush
