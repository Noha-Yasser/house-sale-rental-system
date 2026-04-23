@extends('dashboard.cms.parent')

@section('title', 'Show Review')
@section('main-title', 'Show Review')
@section('sub-title', 'Show Review')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Show All Review</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">

                <div class="row">
              <div class="col-12 col-sm-4">
             
              </div>
            </div>
                  
                  <div class="form-group">
                    <label for="property_id">Property Title</label>
                       <p class="w-100 bg-light shadow-sm rounded d-flex px-4 m-2"> {{ $reviews->property->title }}</p>
                    
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="comments">Commments</label>
                            
                    <p class="w-100 bg-light shadow-sm rounded d-flex px-4 m-2"> 
                        {{$reviews->comments }}  
                    </p>   
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <a href="{{ route('reviews.index') }}" class="btn btn-primary">Go Back</a>

                </div>
              </form>
            </div>
@endsection

@section('scripts')

@endsection


