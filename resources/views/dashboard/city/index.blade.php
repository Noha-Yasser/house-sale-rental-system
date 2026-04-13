@extends('dashboard.cms.parent')

@section('title', 'City')
@section('main-title', 'index city')
@section('sub-title', 'index city')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">city Table</h3> --}}
                <a href="{{ route('cities.create') }}" class="btn btn-primary">ADD NEW city</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>


                    <tr>
                      <th style="width: 10px">ID</th>
                      <th class="text-center">City Name</th>
                      <th class="text-center">Street</th>
                      <th class="text-center">Country Name</th>
                    <th class="text-center">Seeting</th>

                    </tr>

                  </thead>
                  <tbody>
                    @foreach($cities as $city)
                    <tr>
                      <td>{{ $city->id }}</td>
                      <td>{{ $city->city_name }}</td>
                      <td>{{ $city->street }}</td>
                      <td><span class="badge bg-info">{{ $city->country->country_name ?? ""}}</td>
                    {{-- <td>{{ $city->Seeting }}</td> --}}
                       <td>

                <!-- Show -->
                <a href="{{ route('cities.show', $city->id) }}" class="btn btn-info btn-sm" title="show">
                    <i class="fas fa-eye"></i>
                </a>

                <!-- Edit -->
                <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-warning btn-sm" title="edit">
                    <i class="fas fa-edit"></i>
                </a>

                <!-- Delete -->
                <button type="button" onclick="performDestroy({{ $city->id }}, this)" class="btn btn-danger btn-sm" title="delete">
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
              {{ $cities->links() }}
            </div>
          </div>
         </div>

@endsection

@section('scripts')
<script>
    function performDestroy(id,reference){
        confirmDestroy('/admin/cities/'+id,reference);
    }
</script>
@endsection


