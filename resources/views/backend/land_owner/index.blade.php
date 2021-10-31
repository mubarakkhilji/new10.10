@extends('backend.layouts.app')

@section('title','Land Owner')

@push('style')

@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Land Owner List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Land Owner List</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
    <!-- Main content -->
    <section class="content p-10">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-tools" style="float: left">
                        <form action="{{ route('admin.land-owner.index') }}" method="GET">
                            @csrf
                            <div class="input-group input-group-sm" style="width: 250px;">
                            
                                <input type="text" name="searchKeyword" class="form-control float-left" placeholder="Search">
        
                                <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>                  
                        <tr>
                          <th>SL</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Land Size</th>
                          <th>Contact Person</th>
                          <th>Contact Number</th>
                          <th>Contact Address</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($landOwners as $key => $landOwner)
                            <tr>
                                <td width="30" class="text-center">{{ $landOwners->firstItem() + $key }}</td>
                                <td>{{ $landOwner->name }}</td>  
                                <td>{{ $landOwner->email }}</td>  
                                <td>{{ $landOwner->address }}</td>  
                                <td>{{ $landOwner->land_size }}</td>  
                                <td>{{ $landOwner->contact_person }}</td>  
                                <td>{{ $landOwner->contact_number }}</td>  
                                <td>{{ $landOwner->contact_address }}</td>
                                <td width="100" class="text-center">
                                    @if ($landOwner->status === 'Replied')
                                    <a href="{{ route('admin.land-owner.status.update', $landOwner->id) }}" class="btn btn-sm btn-success">Replied</a>
                                    @else
                                    <a href="{{ route('admin.land-owner.status.update', $landOwner->id) }}" class="btn btn-sm btn-warning">Pending</a>
                                    @endif
                                </td>
                            </tr>  
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                    <div class="d-flex justify-content-center">
                        {!! $landOwners->links() !!}
                    </div>  
                </div>
              </div>
          </div>
        </div>
      </section>
@endsection

@push('script')

@endpush