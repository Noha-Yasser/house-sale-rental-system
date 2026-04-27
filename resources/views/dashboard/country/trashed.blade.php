@extends('dashboard.cms.parent')

@section('title', 'country')
@section('main-title', 'index Country')
@section('sub-title', 'index Country')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Country Table</h3> --}}
                <a href="{{ route('countries.create') }}" class="btn btn-primary">ADD NEW COUNTRY</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>


                    <tr>
                      <th style="width: 10px">ID</th>
                      <th class="text-center">Country Name</th>
                      <th class="text-center">Code</th>
                      <th class="text-center">Number of City</th>
                      <th class="text-center">Seeting</th>
                    </tr>

                  </thead>
                  <tbody>
                    @foreach($countries as $country)
                    <tr>
                      <td>{{ $country->id }}</td>
                      <td>{{ $country->country_name }}</td>
                      <td>{{ $country->code }}</td>
                      <td><span class="badge bg-info">{{ $country->cities_count}}</td>
                       <td>
                <!-- Show -->
                <a href="{{ route('countries.show', $country->id) }}" class="btn btn-info btn-sm" title="show">
                    <i class="fas fa-eye"></i>
                </a>

                <!-- Edit -->
                <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-warning btn-sm" title="edit">
                    <i class="fas fa-edit"></i>
                </a>

                <!-- Delete -->
                <button type="button" onclick="performDestroy({{ $country->id }}, this)" class="btn btn-danger btn-sm" title="delete">
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
              {{ $countries->links() }}
            </div>
          </div>
         </div>

@endsection

@section('scripts')
<script>
    function performDestroy(id,reference){
        confirmDestroy('/admin/countries/'+id,reference);
    }
</script>
@endsection


