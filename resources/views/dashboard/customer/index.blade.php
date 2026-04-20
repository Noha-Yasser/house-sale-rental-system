@extends('dashboard.cms.parent')

@section('title', 'customer')
@section('main-title', 'index customer')
@section('sub-title', 'index customer')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">customer Table</h3> --}}
                <a href="{{ route('customers.create') }}" class="btn btn-primary">ADD NEW customer</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>


                    <tr>
                      <th style="width: 10px">ID</th>
                      <th class="text-center">customer Name</th>
                      <th class="text-center">email</th>
                      <th class="text-center">City Name</th>
                       <th class="text-center">Seeting</th>

                    </tr>

                  </thead>
                  <tbody>
                  @foreach($customers as $customer)
<tr>
    <td>{{ $customer->id }}</td>
    <td>{{ $customer->user->name ?? 'N/A' }}</td> 
    <td>{{ $customer->email }}</td>
  
    <td><span class="badge bg-info">{{ $customer->user->city->city_name ?? "" }}</span></td>
    <td>
        <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
        <button type="button" onclick="performDestroy({{ $customer->id }}, this)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
    </td>
</tr>
@endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              {{-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div> --}}
              {{ $customers->links() }}
            </div>
          </div>
         </div>

@endsection

@section('scripts')
<script>
    function performDestroy(id,reference){
        confirmDestroy('/admin/customers/'+id,reference);
    }
</script>
@endsection


