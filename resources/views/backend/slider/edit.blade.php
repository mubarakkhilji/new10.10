@extends('backend.layouts.app')

@section('title','Edit Slider')

@push('css')

@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Slider</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Edit Slider</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
    <section class="content p-10">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card card-primary">
                <form  action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputFullName">Slider Heading</label>
                      <input type="text" name="heading" class="form-control @error('heading') is-invalid @enderror" value="{{ old('heading', $slider->heading) }}" id="exampleInputFullName" placeholder="Enter slider heading">
                        @error('heading')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFullName">Slider Sub Heading</label>
                      <input type="text" name="sub_heading" class="form-control @error('sub_heading') is-invalid @enderror" value="{{ old('sub_heading', $slider->sub_heading) }}" id="exampleInputFullName" placeholder="Enter slider sub heading">
                        @error('sub_heading')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFullName">Short Description</label>
                      <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter slider description">{{ old('description', $slider->description) }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <label>Action Button</label>
                    @php
                       $actionButton = json_decode($slider->action_button);
                    @endphp
                    <div id="inputFormRow">
                      @foreach ($actionButton->title as $key => $title)
                      <div class="form-group row">
                        <div class="col-sm-5">
                          <input type="text" name="button_title[]" value="{{ $title }}" class="form-control @error('button_title') is-invalid @enderror" id="inputEmail3" placeholder="Button title">
                          @error('button_title')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <div class="col-sm-5">
                          <input type="text" name="button_url[]" value="{{ $actionButton->url[$key] }}" class="form-control @error('button_url') is-invalid @enderror" id="inputEmail3" placeholder="Button URL">
                          @error('button_url')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <div class="col-sm-2">
                          <i style="vertical-align: -webkit-baseline-middle; font-size: 22px; color: #aaa" class="fas fa-plus-circle addRow"></i>
                          <i style="vertical-align: -webkit-baseline-middle; font-size: 22px; color: #aaa" class="fas fa-minus-circle removeRow"></i>
                        </div>
                      </div>
                      @endforeach
                    </div>
                    <div class="form-group">
                      <label for="status">Status : </label>
                      <input name="status" type="radio" {{ $slider->status == 'Active' ? 'checked' : '' }}  id="radio_1" value="Active" class="@error('status') is-invalid @enderror">
                      <span for="radio">Active</span>
                      <input name="status" type="radio" {{ $slider->status == 'Inactive' ? 'checked' : '' }} id="radio_2" value="Inactive" class="@error('status') is-invalid @enderror">
                      <span for="radio_2">Inactive</span>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFullName">Upload Photo</label>
                      <input type="file" name="file" class="@error('file') is-invalid @enderror" id="exampleInputFullName">
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

<div id="action-button-row" style="display: none;">
  <div class="form-group row">
    <div class="col-sm-5">
      <input type="text" name="button_title[]" class="form-control" id="inputEmail3" placeholder="Button title">
    </div>
    <div class="col-sm-5">
      <input type="text" name="button_url[]" class="form-control" id="inputEmail3" placeholder="Button URL">
    </div>
    <div class="col-sm-2">
      <i style="vertical-align: -webkit-baseline-middle; font-size: 22px; color: #aaa" class="fas fa-plus-circle addRow"></i>
      <i style="vertical-align: -webkit-baseline-middle; font-size: 22px; color: #aaa" class="fas fa-minus-circle removeRow"></i>
    </div>
  </div>
</div>

@endsection

@push('script')
<script type="text/javascript">
  if ($('#inputFormRow').find(".form-group").length  === 0) {
    $('.removeRow').hide();
  }

  // add row
  $(document).on('click', '.addRow', function () {
      var html = $("#action-button-row").html();
      $('#inputFormRow').append(html);
      $(".removeRow").show();
  });

  // remove row
  $(document).on('click', '.removeRow', function () {
    var childRows = $(this).parents('#inputFormRow').find(".form-group").length;
    if(childRows > 1) $(this).closest('.form-group').remove();
    if(childRows == 2) $('.removeRow').hide();
  });
</script>
@endpush