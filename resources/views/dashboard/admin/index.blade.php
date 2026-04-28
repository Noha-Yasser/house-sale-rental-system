@extends('dashboard.cms.parent')

@section('title', 'Admin')
@section('main-title', 'index Admin')
@section('sub-title', 'index admin')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">admin Table</h3> --}}
                <a href="{{ route('admins.create') }}" class="btn btn-primary">ADD NEW admin</a>

              </div>

              <div class="card-body">
                <table class="table table-bordered">
                  <thead>


                    <tr>
                      <th style="width: 10px">ID</th>
                      <th class="text-center"> Name</th>
                      <th class="text-center">Image</th>
                       <th class="text-center">Phone</th>
                      <th class="text-center">Email</th>
                    <th class="text-center">City Name</th>
    <th class="text-center">Seeting</th>
                    </tr>

                  </thead>
                  <tbody>
                    @foreach($admins as $admin)
                    <tr>
                      <td>{{ $admin->id }}</td>
                      <td>{{ $admin->user->name ??""}}</td>
                   <td class="text-center">
    @if($admin->user->image ?? false)
        <img src="{{ asset('storage/images/admin/' . $admin->user->image) }}"
           class="img-circle img-bordered-sm"  width="80" height="80" style="object-fit: cover; border-radius: 50%;">
    @else
        <span class="text-muted">No Image</span>
    @endif
</td>
                   <td>{{ $admin->user->phone ??""}}</td>
                   <td>{{ $admin->email }}</td>
                   <td><span class="badge bg-info">{{ $admin->user->city->city_name ?? "" }}</td>
                   <td>{{ $admin->Seeting }}
                <a href="{{ route('admins.show', $admin->id) }}" class="btn btn-info btn-sm" title="show">
                <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-warning btn-sm" title="edit">
                <i class="fas fa-edit"></i>
                </a>
                <button type="button" onclick="performDestroy({{ $admin->id }}, this)" class="btn btn-danger btn-sm" title="delete">
                <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
                @endforeach
                  </tbody>
                </table>
              </div>

              {{-- <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div> --}}
              {{ $admins->links() }}
            </div>
          </div>
         </div>

@endsection

@section('scripts')
<script>
    function performDestroy(id,reference){
        confirmDestroy('/admin/admins/'+id,reference);
    }
</script>
@endsection


