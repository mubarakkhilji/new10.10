@extends('frontend.layouts.app')

@section('title', 'Project Details Page')

    @push('css')

    @endpush

@section('content')

    <div class="owl-carousel-wrapper" style="height: 100vh;">
        <div class="owl-carousel dots-inside dots-horizontal-center show-dots-hover show-dots-xs dots-light nav-inside nav-inside-plus nav-dark nav-md nav-font-size-md show-nav-hover mb-0"
            data-plugin-options="{'responsive': {'0': {'items': 1, 'dots': true, 'nav': false}, '479': {'items': 1}, '768': {'items': 1}, '979': {'items': 1}, '1199': {'items': 1}}, 'loop': false, 'autoHeight': false, 'margin': 0, 'dots': false, 'dotsVerticalOffset': '-35px', 'nav': true, 'animateIn': 'fadeIn', 'animateOut': 'fadeOut', 'mouseDrag': false, 'touchDrag': false, 'pullDrag': false, 'autoplay': true, 'autoplayTimeout': 9000, 'autoplayHoverPause': true, 'rewind': true}">

            @foreach ($project->sliderImage as $slider)
                <div class="position-relative overlay overlay-show overlay-op-9 pt-5"
                    style="background-image: url({{ asset('storage/' . $slider->photo) }}); background-size: cover; background-position: center; height: 100vh;">
                    <div class="container position-relative z-index-3 h-100">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="col-lg-7 text-center">
                                <div class="d-flex flex-column align-items-center justify-content-center h-100">
                                    <h1 class="text-color-light font-weight-extra-bold text-10 text-sm-12-13 line-height-1 line-height-sm-3 mb-2 appear-animation"
                                        data-appear-animation="blurIn" data-appear-animation-delay="500"
                                        data-plugin-options="{'minWindowWidth': 0}">{{ $project->title }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <section class="projectDescription ">
        <div class="row">
            <div class=" col-lg-6 ">
                @if ($project->atAGlanceImage)
                    <img src="{{ asset('storage/' . $project->atAGlanceImage->photo) }}" class="img-fluid" alt="{{ $project->title }} - {{ config('app.name', 'Laravel') }}">
                @endif
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 py-5 ">
                <div class="container-fluid">
                    <h1 class="text-start">AT A GLANCE</h1>
                    @if ($project->projectSpecification)
                        @forelse ($project->projectSpecification as $item)
                            <p class="text-start text-4">{{ $item->specification->title }}: {{ $item->value }}</p>
                        @empty
                            <p class="text-start text-4 text-center">No specification found!</p>
                    @endforelse
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="projectDescription bg-dark">
        <div class="container-fluid">
            <h1 class="text-start text-muted py-5">FEATURES & AMENITIES</h1>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6  ">
                    {!! $project->details !!}
                </div>
                <div class="col-lg-6">
                    @if ($project->featuresAmenitiesImage)
                        <div class="projectdes"
                            style="margin-bottom: 50px; background-image: url({{ asset('storage/' . $project->featuresAmenitiesImage->photo) }}); height: 400px;width: 80%;background-repeat: no-repeat;background-size: cover;background-position: center;">
                        </div>
                    @endif
                </div>
            </div>
    </section>





    <section class="section border-0 m-0 pb-0 appear-animation" data-appear-animation="fadeIn">
        <div class="container-fluid">
            <h1 class="text-center">Photo Gallery</h1>
            <div class="lightbox"
                data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
                <div class="row">
                    @if ($project->projectPhotoGallery)
                        @forelse ($project->projectPhotoGallery as $item)
                            <div class="col-sm-6 col-md-6 col-lg-3  pb-2 mb-4">
                                <a class="d-inline-block img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon mb-1 mr-1"
                                    href="{{ asset('storage/' . $item->photo) }}">
                                    <img class="img-fluid" src="{{ asset('storage/' . $item->photo) }}" alt="{{ $project->title }} - {{ config('app.name', 'Laravel') }}"
                                        width="" height="">
                                </a>
                            </div>
                        @empty
                            <p class="text-start text-4 text-center">No photo found!</p>
                    @endforelse
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="ProjectDescriptionVideo section border-0 m-0 pb-0 appear-animation" data-appear-animation="fadeIn">
        <div class="container-fluid">
            <h1 class="text-center">Project View</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="embed-responsive embed-responsive-16by9 ">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tQkDRXo7tLM"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col-md-6">
                {!! $project->project_location_map !!}
            </div>
            <div style="padding: 50px 50px;" class="col-md-6">
                <h3>Contact Information</h3>
                <table>
                    <tr>
                        <td width="25%"><strong>Address 1</strong></td>
                        <td>: {{ $project->address_1 }}</td>
                    </tr>
                    <tr>
                        <td width="25%"><strong>Address 2</strong></td>
                        <td>: {{ $project->address_2 }}</td>
                    </tr>
                    <tr>
                        <td width="25%"><strong>District</strong></td>
                        <td>: {{ $project->district }}</td>
                    </tr>
                    <tr>
                        <td width="25%"><strong>Police Station</strong></td>
                        <td>: {{ $project->police_station }}</td>
                    </tr>
                    <tr>
                        <td width="25%"><strong>Zip Code</strong></td>
                        <td>: {{ $project->zip_code }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>

    <section class="section border-0 m-0 pb-3 appear-animation" data-appear-animation="fadeInUp"
        data-appear-animation-delay="0" data-appear-animation-duration="1s">
        <div class="container container-lg-custom">
            <div class="row pb-1">
                <div class="col-lg-6 offset-lg-3">
                    <h2 class="text-5 mt-2 mb-3">Book Now</h2>
                    <form class="contact-form" action="{{ route('booking.store') }}" method="POST"
                        novalidate="novalidate">
                        @csrf
                        @if (session('message'))
                            <div class="alert alert-success">
                                {!! session('message') !!}
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="mb-1 text-2">Full Name<sup>*</sup></label>
                                <input type="email" value="{{ old('name') }}" maxlength="100"
                                    class="@error('name') is-invalid @enderror form-control text-3 h-auto py-2"
                                    name="name" required="">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="mb-1 text-2">Email<sup>*</sup></label>
                                <input type="email" value="{{ old('email') }}" maxlength="100"
                                    class="@error('email') is-invalid @enderror form-control text-3 h-auto py-2"
                                    name="email" required="">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="mb-1 text-2">Contact Number<sup>*</sup></label>
                                <input type="email" value="{{ old('contact_number') }}" maxlength="100"
                                    class="@error('contact_number') is-invalid @enderror form-control text-3 h-auto py-2"
                                    name="contact_number" required="">
                                @error('contact_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="mb-1 text-2">Message<sup>*</sup></label>
                                <textarea maxlength="5000" rows="5"
                                    class="@error('message') is-invalid @enderror form-control text-3 h-auto py-2"
                                    name="message" required="">{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="submit" value="Book Now" class="btn btn-primary btn-modern"
                                    data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div id="errors" style="display: none;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection

@push('script')

<script type="text/javascript">
    if ($('#errors').find(".alert-danger").length  > 0) {
        var $target = $('html,body'); 
        $target.animate({scrollTop: $target.height()}, 1000);
    }
</script>
    
@endpush
