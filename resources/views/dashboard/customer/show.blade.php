@extends('dashboard.cms.parent')

@section('title', 'Show Data of customer')
@section('main-title', 'Show Data of customer')
@section('sub-title', 'Show Data of customer')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Show Data of customer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">


                     <div class="form-group ">
                                            @if($customers->user->image ?? false)
                                                <img src="{{ asset('storage/images/customer/' . $customers->user->image) }}" 
                                                  class="img-circle img-bordered-sm"  width="100" height="100" style="object-fit: cover; border-radius: 50%;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                      </div>
                                  <div class="row">
                                   
                                      <div class="form-group  col-md-4">
                                              <label for="name">customer name</label>
                                              <input type="text" class="form-control" id="customer_name" placeholder="Enter customer name" name="customer_name" disabled
                                              value="{{ $customers->user->name ?? ""}}"
                                              required>
                                            </div>
                                      <div class="form-group  col-md-4">
                                        <label for="phone">customer phone</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Enter customer phone" name="phone" disabled
                                        value="{{ $customers->user->phone  ?? ""}}"
                                        required>
                                      </div>
                                </div>    
                                 <div class="row">
               
                                       <div class="form-group  col-md-4">
                                         <label>City</label>
                                         <input type="text" class="form-control" disabled 
                                          value="{{ $customers->user->city->city_name ?? 'N/A' }}">
                                         </div> 

                 
                                        <div class="form-group  col-md-4" >
                                        <label for="email">customer email</label>
                                        <input type="text" class="form-control" id="email" placeholder="Enter customer email" name="email" disabled
                                        value="{{ $customers->email  ?? ""}}"
                                        required>
                                      </div>
                               </div>
                                 <div class="row">
                                      <div class="form-group  col-md-4">
                                        <label for="birthday">customer birthday</label>
                                        <input type="text" class="form-control" id="birthday" placeholder="Enter customer birthday" name="birthday" disabled
                                        value="{{ $customers->birthday }}"
                                        required>  </div> 
                                      <div class="form-group  col-md-4">
                                        <label for="gender">customer gender</label>
                                        <input type="text" class="form-control" id="gender" placeholder="Enter customer gender" name="gender" disabled
                                        value="{{ $customers->gender }}"
                                        required>
                                      </div>
                              </div>
                               <div class="row">
                                      <div class="form-group  col-md-4">
                                        <label for="identity_id">customer identity_id</label>
                                        <input type="text" class="form-control" id="identity_id" placeholder="Enter customer identity_id" name="identity_id" disabled
                                        value="{{ $customers->identity_id }}"
                                        required>
                                      </div>
                                      <div class="form-group col-md-4">
                                          <label>city</label>
                                           <input type="text" class="form-control" id="identity_id" placeholder="Enter customer identity_id" name="identity_id" disabled
                                        value="{{    $customers->user->city->city_name ?? "" }}"
                                        required>
           
                                             </div>
                               </div>                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
           <a href="{{ route('customers.edit', $customers->id) }}" class="btn btn-primary">
    Go to Edit
</a>
                  <a href="{{ route('customers.index') }}" class="btn btn-primary">Go Back</a>
                </div>
              </form>
            </div>
@endsection

@section('scripts')

@endsection


