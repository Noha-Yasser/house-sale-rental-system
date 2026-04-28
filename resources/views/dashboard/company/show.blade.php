@extends('dashboard.cms.parent')

@section('title', 'Show Data of company')
@section('main-title', 'Show Data of company')
@section('sub-title', 'Show Data of company')

@section('styles')

@endsection

@section('content')
        <div class="card">
        <div class="card-header">
        <h3 class="card-title">{{ $companies->user->name ?? ""}}</h3>
        <div class="card-tools">
        <a href="{{ route('companies.index') }}" class="btn btn-default btn-sm">Back to List</a>
         <a href="{{ route('companies.edit', $companies->id) }}" class="btn btn-warning btn-sm">Edit</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
        <div class="col-md-3 text-center">
        <td class="text-center">
    @if($companies->user->image ?? false)
        <img src="{{ asset('storage/images/company/' . $companies->user->image) }}"
           class="img-circle img-bordered-sm"   width="200" height="200" style="object-fit: cover; border-radius: 50%;">
    @else
        <span class="text-muted">No Image</span>
    @endif
      </td>
            </div>
            <div class="col-md-9">
                <table class="table table-bordered">
                    <tr>
                        <th width="200">ID</th>
                        <td>{{ $companies->id }}</td>
                    </tr>
                    <tr>
                        <th>Company Name</th>
                        <td>{{ $companies->user->name ?? "" }}</td>
                    </tr>

                    <tr>
                        <th>Address</th><
                        td>{{$companies->user->city->city_name ?? "" }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $companies->description ?? "" }}</td>
                    </tr>
                    <tr>
                        <th>Website</th>
                        <td>@if($companies->website) <a href="{{ $companies->website }}" target="_blank">{{ $companies->website }}</a> @else  @endif</td>
                    </tr>
                    <tr>
                        <th>Rating</th>
                        <td>{{ $companies->rating > 0 ? $companies->rating . ' ★' : 'Not rated' }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $companies->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Last Updated</th>
                        <td>{{ $companies->updated_at->format('Y-m-d H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection


