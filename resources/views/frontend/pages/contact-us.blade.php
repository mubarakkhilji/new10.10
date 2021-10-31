@extends('frontend.layouts.app')

@section('title', 'Contact Us Page')

    @push('css')

    @endpush

@section('content')
    <section
        style="margin: 0; background-image: url({{ asset('storage/' . $settings->breadcrub_image) }});background-attachment: fixed;background-size: cover;background-position: center;background-repeat: no-repeat;"
        class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-light ">Contact Us</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center text-light">
                        <li><a class="text-light" href="{{ route('home') }}">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div>
            {!! $settings->office_location_map !!}
        </div>
    </section>

    <section class="section border-0 m-0 pb-3 appear-animation" data-appear-animation="fadeInUp"
        data-appear-animation-delay="0" data-appear-animation-duration="1s">
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-6">
                    <h2 class="font-weight-bold text-8 mt-2 mb-0">Contact Us</h2>
                    <p class="mb-4">Feel free to ask for details, don't save any questions!</p>
                    <form class="contact-form-recaptcha-v3" action="{{ route('contact.us.store') }}" method="POST"
                        novalidate="novalidate">
                        @csrf
                        @if (session('message'))
                            <div class="alert alert-success">
                                {!! session('message') !!}
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="mb-1 text-2">Full Name</label>
                                <input type="text" value="{{ old('name') }}" maxlength="100"
                                    class="form-control text-3 h-auto py-2 @error('name') is-invalid @enderror" name="name"
                                    required="">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="mb-1 text-2">Email Address</label>
                                <input type="email" value="{{ old('email') }}" maxlength="100"
                                    class="form-control text-3 h-auto py-2 @error('email') is-invalid @enderror"
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
                                <label class="mb-1 text-2">Mobile</label>
                                <input type="text" value="{{ old('contact_number') }}" maxlength="100"
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
                                <label class="mb-1 text-2">Subject</label>
                                <input type="text" value="{{ old('subject') }}" maxlength="100"
                                    class="form-control text-3 h-auto py-2" name="subject" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="mb-1 text-2">Message</label>
                                <textarea maxlength="5000" rows="5"
                                    class="form-control text-3 h-auto py-2 @error('message') is-invalid @enderror"
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
                                <input type="submit" value="Send Message" class="btn btn-primary btn-modern"
                                    data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn"
                        data-appear-animation-delay="800" style="animation-delay: 800ms;">
                        <h4 class="mt-2 mb-1">Our <strong>Office</strong></h4>
                        <ul class="list list-icons list-icons-style-2 mt-2">
                            <li><i class="fas fa-map-marker-alt top-6"></i> <strong class="text-dark">Address:</strong>
                                {{ $settings->company_address }}</li>
                            <li><i class="fas fa-phone top-6"></i> <strong class="text-dark">Phone:</strong>
                                {{ $settings->mobile }}
                            </li>
                            <li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">Email:</strong> <a
                                    href="mailto:mail@example.com">{{ $settings->email }}</a></li>
                        </ul>
                    </div>
                    <h4 class="pt-5">Get in <strong>Touch</strong></h4>
                    <p class="lead mb-0 text-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo
                        at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor
                        sit amet, consectetur adipiscing elit.</p>

                    <ul class="footer-social-icons social-icons mt-4">
                        <li class="social-icons-facebook"><a href="#" target="_blank" title="Facebook"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li class="social-icons-twitter"><a href="#" target="_blank" title="Twitter"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li class="social-icons-linkedin"><a href="#" target="_blank" title="Linkedin"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </li>
                    </ul>
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
