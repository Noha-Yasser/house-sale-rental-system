@extends('dashboard.cms.parent')

@section('title', 'company')
@section('main-title', 'index company')
@section('sub-title', 'index company')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('content')
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Companies List</h3>
        <div class="card-tools">
            <a href="{{ route('companies.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add New Company
            </a>
        </div>
    </div>
    <div class="card-body">
        {{-- @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif --}}

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th  class="text-center">ID</th>
                    <th class="text-center">Logo</th>
                    <th class="text-center">Company Name</th>
                 <th class="text-center">City Name</th>
                    <th class="text-center">Rating</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                       <td class="text-center">
    @if($company->user->image ?? false)
        <img src="{{ asset('storage/images/company/' . $company->user->image) }}" 
           class="img-circle img-bordered-sm"  width="80" height="80" style="object-fit: cover; border-radius: 50%;">
    @else
        <span class="text-muted">No Image</span>
    @endif
      </td>
                    <td>{{ $company->user->name ?? ""}}</td>
                <td><span class="badge bg-info">{{ $company->user->city->city_name ?? "" }}</span></td>
                    <td>
                        @if($company->rating > 0)
                            <span class="badge badge-success">{{ $company->rating }} ★</span>
                        @else
                            <span class="badge badge-secondary">Not rated</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">Edit</a>
    <button type="button" onclick="performDestroy({{  $company->id }}, this)" class="btn btn-danger btn-sm" title="delete">
                    <i class="fas fa-trash"></i>
                </button>
                     </td>
                </tr>
                {{-- @empty
                <tr><td colspan="6" class="text-center">No companies found</td></tr>
                @endforelse --}}@endforeach
            </tbody>
        </table>

        {{ $companies->links() }}
    </div>
</div>



<script>
    function performDestroy(id,reference){
        confirmDestroy('/admin/companies/'+id,reference);
    }
</script>
@endsection



