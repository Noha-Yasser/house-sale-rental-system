@extends('dashboard.cms.parent')

@section('title', 'Edit Country')
@section('main-title', 'Edit Country')
@section('sub-title', 'edit Country')

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
                      <select required id="payment_method"  name="payment_method" class="w-100 rounded shadow-sm p-2">
                          <option value="cash"  {{$transactions-> payment_method == "cash" ? "selected" : ""}}>Cash</option>
                          <option value="card"  {{$transactions-> payment_method == "card" ? "selected" : ""}}>card</option>
                          <option value="paypal"  {{$transactions-> payment_method == "paypal" ? "selected" : ""}}>PayPal</option>
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" id="amount" value="{{$transactions->amount}}" name="amount" required>
                  </div>
            
                  <div class="form-group">
                      <label for="status">Status :</label>
                      <select required id="status"  name="status"  class="w-100 rounded shadow-sm p-2">
                          <option value="paid"  {{$transactions-> status == "paid" ? "selected" : ""}}>Paid</option>
                          <option value="failed"  {{$transactions-> status == "failed" ? "selected" : ""}}>failed</option>
                          <option value="pending"  {{$transactions-> status == "pending" ? "selected" : ""}}>Pending</option>
                      </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" onclick="performUpdate({{$transactions->id}})" class="btn btn-primary">Update</button>
                <a href="{{ route('transactions.index') }}" class="btn btn-primary">Go Back</a>

                </div>
              </form>
            </div>
@endsection

@section('scripts')
<script>
    function performUpdate(id){
        let formData=new FormData();
        formData.append('payment_method',document.getElementById('payment_method').value);
        formData.append('amount',document.getElementById('amount').value);
        formData.append('status',document.getElementById('status').value);
        storeRoute('/admin/transactions_update/'+id,formData)
    }
</script>
@endsection


