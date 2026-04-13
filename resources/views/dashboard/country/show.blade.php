@extends('dashboard.cms.parent')

@section('title', 'Show Data of Country')
@section('main-title', 'Show Data of Country')
@section('sub-title', 'Show Data of Country')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Show Data of Country</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="country_name">country name</label>
                    <input type="text" class="form-control" id="country_name" placeholder="Enter country name" name="country_name" disabled
                    value="{{ $countries->country_name }}"
                    required>
                  </div>
                  <div class="form-group">
                    <label for="code">country code</label>
                    <input type="text" class="form-control" id="code" placeholder="Enter country code" name="code" disabled
                    value="{{ $countries->code }}"
                     required>
                  </div>
                    <div class="row">
                    <div class="form-group col-md-12">
                        @foreach ($countries->cities as $city)
                        <input type="text" value="{{$city->city_name ?? null}}"
                        class="form-control-solid" disabled />
                        <span> </span>
                        @endforeach
                        </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ route('countries.index') }}" class="btn btn-primary">Go Back</a>
                </div>
              </form>
            </div>
@endsection

@section('scripts')

@endsection


