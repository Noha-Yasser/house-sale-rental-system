@extends('dashboard.cms.parent')

@section('title', 'Booking')
@section('main-title', 'index Booking')
@section('sub-title', 'index Booking')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Booking Table</h3> --}}
                <a href="{{ route('bookings.create') }}" class="btn btn-primary">ADD NEW Booking</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>


                    <tr>
                      <th style="width: 10px">ID</th>
                      <th class="text-center">Booking Date</th>
                      <th class="text-center">Booking time</th>
                      <th class="text-center">status</th>
                    <th class="text-center">note</th>

                    </tr>

                  </thead>
                  <tbody>
                    @foreach($bookings as $Booking)
                    <tr>
                      <td>{{ $Booking->id }}</td>
                      <td>{{ $Booking->Booking_date }}</td>
                      <td>{{ $Booking->Booking_time}}</td>
                      <td><span class="badge bg-info">{{ $Booking->country->country_name ?? ""}}</td>
                    {{-- <td>{{ $Booking->Seeting }}</td> --}}
                       <td>

                <!-- Show -->
                <a href="{{ route('bookings.show', $Booking->id) }}" class="btn btn-info btn-sm" title="show">
                    <i class="fas fa-eye"></i>
                </a>

                <!-- Edit -->
                <a href="{{ route('bookings.edit', $Booking->id) }}" class="btn btn-warning btn-sm" title="edit">
                    <i class="fas fa-edit"></i>
                </a>

                <!-- Delete -->
                <button type="button" onclick="performDestroy({{ $Booking->id }}, this)" class="btn btn-danger btn-sm" title="delete">
                    <i class="fas fa-trash"></i>
                </button>
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
              {{ $bookings->links() }}
            </div>
          </div>
         </div>

@endsection

@section('scripts')
<script>
    function performDestroy(id,reference){
        confirmDestroy('/admin/bookings/'+id,reference);
    }
</script>
@endsection


