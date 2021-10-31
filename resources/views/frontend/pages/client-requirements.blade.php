@extends('frontend.layouts.app')

@section('title', 'Client Requirements Page')

    @push('css')

    @endpush

@section('content')
    <section
        style="margin: 0; background-image: url({{ asset('storage/' . $settings->breadcrub_image) }});background-attachment: fixed;background-size: cover;background-position: center;background-repeat: no-repeat;"
        class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-light ">Send Requirements</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center text-light">
                        <li><a class="text-light" href="{{ route('home') }}">Home</a></li>
                        <li class="active">Client Requirements</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section border-0 m-0 pb-3 appear-animation" data-appear-animation="fadeInUp"
        data-appear-animation-delay="0" data-appear-animation-duration="1s">
        <div class="container container-lg-custom">
            <div class="row pb-1">
                <div class="col-lg-6 offset-lg-3">
                    <h2 class="text-5 mt-2 mb-3">Your Preference</h2>
                    <form class="contact-form" action="{{ route('client.requirement.store') }}" method="POST"
                        novalidate="novalidate">
                        @csrf
                        @if (session('message'))
                            <div class="alert alert-success">
                                {!! session('message') !!}
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="mb-1 text-2">Preferred Location</label>
                                <input type="text" value="{{ old('preferred_location') }}" maxlength="100"
                                    class="@error('preferred_location') is-invalid @enderror form-control text-3 h-auto py-2"
                                    name="preferred_location" required="">
                                @error('preferred_location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="mb-1 text-2">Preferred Size</label>
                                <input type="text" value="{{ old('preferred_size') }}" maxlength="100"
                                    class="@error('preferred_size') is-invalid @enderror form-control text-3 h-auto py-2"
                                    name="preferred_size" required="">
                                @error('preferred_size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="mb-1 text-2">Bed Rooms</label>
                                <select name="bed_rooms"
                                    class="@error('bed_rooms') is-invalid @enderror  form-control text-3 h-auto py-2">
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                @error('bed_rooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="mb-1 text-2">Bath Rooms</label>
                                <select name="bath_rooms"
                                    class="@error('bath_rooms') is-invalid @enderror form-control text-3 h-auto py-2">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                                @error('bath_rooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <h2 class="text-6 mt-2 mb-3">Contact Information</h2>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="mb-1 text-2">Name<sup>*</sup></label>
                                <input type="text" value="{{ old('client_name') }}" maxlength="100"
                                    class="@error('client_name') is-invalid @enderror form-control text-3 h-auto py-2"
                                    name="client_name" required="">
                                @error('client_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="mb-1 text-2">Profession</label>
                                <input type="text" value="{{ old('profession') }}" maxlength="100"
                                    class="@error('profession') is-invalid @enderror form-control text-3 h-auto py-2"
                                    name="profession" required="">
                                @error('profession')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
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
                                <label class="mb-1 text-2">Cell Phone<sup>*</sup></label>
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
                                <label class="mb-1 text-2">Address<sup>*</sup></label>
                                <textarea maxlength="5000" rows="5"
                                    class="@error('address') is-invalid @enderror form-control text-3 h-auto py-2"
                                    name="address" required="">{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="submit" value="Send Requirements" class="btn btn-primary btn-modern"
                                    data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')

@endpush
