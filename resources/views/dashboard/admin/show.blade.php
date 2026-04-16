@extends('dashboard.cms.parent')

@section('title', 'Show Data of admin')
@section('main-title', 'Show Data of admin')
@section('sub-title', 'Show Data of admin')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Show Data of admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">admin name</label>
                    <input type="text" class="form-control" id="admin_name" placeholder="Enter admin name" name="admin_name" disabled
                    value="{{ $admins->user->name ?? ""}}"
                    required>
                  </div>
                  <div class="form-group">
                    <label for="phone">admin phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter admin phone" name="phone" disabled
                    value="{{ $admins->user->phone  ?? ""}}"
                     required>
                  </div>
  <div class="form-group">
                    <label for="address">admin address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter admin address" name="address" disabled
                    value="{{ $admins->user->address  ?? ""}}"
                     required>
                  </div>
                    <div class="form-group">
                    <label for="email">admin email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter admin email" name="email" disabled
                    value="{{ $admins->email  ?? ""}}"
                     required>
                  </div>

                  {{-- <div class="row">
                    <div class="from-group col-md-12">
                        @foreach ( $countries->cities as $city )
                        <input type="text" value="{{ $city->name ?? null }}"
                        class="form-control-solid" disabled/>
                        <span> </span>
                        @endforeach
                        </div> --}}
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                 {{--  <button type="submit" class="btn btn-primary">Update</button>   --}}  
                      <a href="{{  route('admins.edit', $admins->id)  }}" class="btn btn-primary">Update</a>
                  <a href="{{ route('admins.index') }}" class="btn btn-primary">Go Back</a>
                </div>
              </form>
            </div>
@endsection

@section('scripts')

@endsection


