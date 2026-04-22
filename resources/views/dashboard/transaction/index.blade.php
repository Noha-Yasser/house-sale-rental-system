@extends('dashboard.cms.parent')

@section('title', 'Transaction')
@section('main-title', 'index Transaction')
@section('sub-title', 'index Transaction')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Transaction Table</h3> --}}
                <a href="{{ route('transactions.create') }}" class="btn btn-primary">ADD NEW Transaction</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>


                    <tr>
                      <th style="width: 10px">ID</th>
                      <th class="text-center">Payment Method</th>
                      <th class="text-center">amount</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Actions</th>
                    </tr>

                  </thead>
                  <tbody>
                    @foreach($transactions as $transaction)
                    <tr>
                      <td>{{ $transaction->id }}</td>
                      <td>{{ $transaction->payment_method }}</td>
                      <td>{{ $transaction->amount }}</td>
                      <td>{{ $transaction->status }}</td>
                       <td>
                <!-- Show -->
                <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info btn-sm" title="show">
                    <i class="fas fa-eye"></i>
                </a>

                <!-- Edit -->
                <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm" title="edit">
                    <i class="fas fa-edit"></i>
                </a>

                <!-- Delete -->
                <button type="button" onclick="performDestroy({{ $transaction->id }}, this)" class="btn btn-danger btn-sm" title="delete">
                    <i class="fas fa-trash"></i>
                </button>
            </td>

                    </tr>
                @endforeach
                  </tbody>
                </table>
              </div>
             
            </div>
          </div>
         </div>

@endsection

@section('scripts')
<script>
    function performDestroy(id,reference){
        confirmDestroy('/admin/transactions/'+id,reference);
    }
</script>
@endsection


