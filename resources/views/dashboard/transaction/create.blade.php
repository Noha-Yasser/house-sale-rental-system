@extends('dashboard.cms.parent')

@section('title', 'create Transaction')
@section('main-title', 'create Transaction')
@section('sub-title', 'create Transaction')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create new Transaction</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" onsubmit="event.preventDefault(); performStore();">
             @csrf>
                <div class="card-body">

                  <div class="form-group">
                      <label for="payment_method">Payment Method :</label>
                      <select required id="payment_method"  name="payment_method" class="w-100 rounded shadow-sm p-2">
                          <option value="cash">Cash</option>
                          <option value="card">card</option>
                          <option value="paypal">PayPal</option>
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" id="amount" placeholder="Enter Payment Amount" name="amount" required>
                  </div>
            
                  <div class="form-group">
                      <label for="status">Status :</label>
                      <select required id="status"  name="status"  class="w-100 rounded shadow-sm p-2">
                          <option value="paid">Paid</option>
                          <option value="failed">failed</option>
                          <option value="pending">Pending</option>
                      </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('transactions.index') }}" class="btn btn-primary">Go Back</a>

                </div>
              </form>
            </div>
@endsection

@section('scripts')
<script>
    function performStore(){
        let formData=new FormData();
        formData.append('payment_method',document.getElementById('payment_method').value);
        formData.append('status',document.getElementById('status').value);
        formData.append('amount',document.getElementById('amount').value);
        store('/admin/transactions',formData)

    }
</script>

@endsection


