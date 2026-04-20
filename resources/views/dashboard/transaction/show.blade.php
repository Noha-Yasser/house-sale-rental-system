@extends('dashboard.cms.parent')

@section('title', 'Show Data of Country')
@section('main-title', 'Show Data of Country')
@section('sub-title', 'Show Data of Country')

@section('styles')

@endsection

@section('content')
                   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Transaction</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" onsubmit="event.preventDefault(); performUpdate();">
             @csrf>
                <div class="card-body">

                  <div class="form-group">
                      <label for="payment_method">Payment Method :</label>
                      <select required id="payment_method"  name="payment_method" class="w-100 rounded shadow-sm p-2" disabled>
                          <option value="cash"  {{$transactions-> payment_method == "cash" ? "selected" : ""}}>Cash</option>
                          <option value="card"  {{$transactions-> payment_method == "card" ? "selected" : ""}}>card</option>
                          <option value="paypal"  {{$transactions-> payment_method == "paypal" ? "selected" : ""}}>PayPal</option>
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" id="amount" value="{{$transactions->amount}}" name="amount" required disabled>
                  </div>
            
                  <div class="form-group">
                      <label for="status">Status :</label>
                      <select required id="status"  name="status"  class="w-100 rounded shadow-sm p-2" disabled>
                          <option value="paid"  {{$transactions-> status == "paid" ? "selected" : ""}}>Paid</option>
                          <option value="failed"  {{$transactions-> status == "failed" ? "selected" : ""}}>failed</option>
                          <option value="pending"  {{$transactions-> status == "pending" ? "selected" : ""}}>Pending</option>
                      </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  
                <a href="{{ route('transactions.index') }}" class="btn btn-primary">Go Back</a>

                </div>
              </form>
            </div>
@endsection

@section('scripts')

@endsection


