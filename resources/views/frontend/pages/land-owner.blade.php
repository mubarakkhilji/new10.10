@extends('frontend.layouts.app')

@section('title', 'Land Owner Page')

    @push('css')

    @endpush

@section('content')
    <section
        style="margin: 0; background-image: url({{ asset('storage/' . $settings->breadcrub_image) }});background-attachment: fixed;background-size: cover;background-position: center;background-repeat: no-repeat;"
        class="page-header page-header-modern bg-color-light-scale-1 page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-light ">Land Owners</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center text-light">
                        <li><a class="text-light" href="{{ route('home') }}">Home</a></li>
                        <li class="active">Land Owners</li>
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
                    <h2 class="text-5 mt-2 mb-3">Basic information of the land</h2>
                    <form class="contact-form" action="{{ route('land.owner.store') }}" method="POST"
                        novalidate="novalidate">
                        @csrf
                        @if (session('message'))
                            <div class="alert alert-success">
                                {!! session('message') !!}
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="mb-1 text-2">Address<sup>*</sup></label>
                                <textarea maxlength="5000"
                                    class="@error('address') is-invalid @enderror form-control text-3 h-auto py-2"
                                    name="address" required="">{{ old('address') }}</textarea>
                            </div>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <label class="mb-1 text-2">Land Size</label>
                                <input type="text" value="{{ old('land_size') }}"
                                    data-msg-required="Please enter your name." maxlength="100"
                                    class="@error('land_size') is-invalid @enderror form-control text-3 h-auto py-2"
                                    name="land_size" required="">
                                @error('land_size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="mb-1 text-2">Unit</label>
                                <select class="@error('unit') is-invalid @enderror form-control text-3 h-auto py-2"
                                    name="unit">
                                    <option value="Katha">Katha</option>
                                    <option value="Biga">Biga</option>
                                    <option value="Decimal">Decimal</option>
                                    <option value="Acre">Acre</option>
                                </select>
                                @error('unit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <h2 class="text-5 mt-2 mb-3">Information of the land owner</h2>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="mb-1 text-2">Landowner's Name<sup>*</sup></label>
                                <input type="text" value="{{ old('name') }}" maxlength="100"
                                    class="@error('name') is-invalid @enderror form-control text-3 h-auto py-2" name="name"
                                    required="">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="mb-1 text-2">Contact Person's Name<sup>*</sup></label>
                                <input type="text" value="{{ old('contact_person') }}" maxlength="100"
                                    class="@error('contact_person') is-invalid @enderror form-control text-3 h-auto py-2"
                                    name="contact_person" required="">
                                @error('contact_person')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="mb-1 text-2">Contact Address<sup>*</sup></label>
                                <textarea type="text" maxlength="100"
                                    class="@error('contact_address') is-invalid @enderror form-control text-3 h-auto py-2"
                                    name="contact_address" required="">{{ old('contact_address') }}</textarea>
                                @error('contact_address')
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
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label class="mb-1 text-2">Cell Phone<sup>*</sup></label>
                                <input type="email" value="{{ old('contact_number') }}"
                                    data-msg-required="Please enter the subject." maxlength="100"
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
                                <input type="submit" value="Send Request" class="btn btn-primary btn-modern"
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
