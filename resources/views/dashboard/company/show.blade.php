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
                @if($companies->logo)
                    <img src="{{ asset('storage/companies/' . $company->logo) }}" width="150" height="150" style="object-fit: cover;" class="rounded-circle">
                @else
                    <div class="bg-secondary p-5 rounded-circle d-inline-block">No Logo</div>
                @endif
            </div>
            <div class="col-md-9">
                <table class="table table-bordered">
                    <tr><th width="200">ID</th><td>{{ $companies->id }}</td></tr>
                    <tr><th>Company Name</th><td>{{ $companies->user->name ?? "" }}</td></tr>
                   
                    <tr><th>Address</th><td>{{$companies->user->city->city_name ?? "" }}</td></tr>
                    <tr><th>Description</th><td>{{ $companies->description ?? "" }}</td></tr>
                    <tr><th>Website</th><td>@if($companies->website) <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a> @else  @endif</td></tr>
                    <tr><th>Rating</th><td>{{ $companies->rating > 0 ? $company->rating . ' ★' : 'Not rated' }}</td></tr>
                    <tr><th>Created At</th><td>{{ $companies->created_at->format('Y-m-d H:i') }}</td></tr>
                    <tr><th>Last Updated</th><td>{{ $companies->updated_at->format('Y-m-d H:i') }}</td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection


