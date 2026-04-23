@extends('dashboard.cms.parent')

@section('title', 'Reviews')
@section('main-title', 'index Reviews')
@section('sub-title', 'index Reviews')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">Reviews Table</h3> --}}
                <a href="{{ route('reviews.create') }}" class="btn btn-primary">ADD NEW Review</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>


                    <tr>
                      <th style="width: 10px">ID</th>
                      <th class="text-center">Comments</th>
                      <th class="text-center">Property Name</th>
                      <th class="text-center">Actions</th>

                    </tr>

                  </thead>
                  <tbody>
                    @foreach($reviews as $review)
                    <tr>
                      <td>{{ $review->id }}</td>
                      <td>{{ $review->comments}}</td>
                      <td><span class="badge bg-info px-2">{{ $review->property->title ?? ""}}</td>
                  
                       <td>

                            <!-- Show -->
                            <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-info btn-sm" title="show">
                                <i class="fas fa-eye"></i>
                            </a>

                            <!-- Edit -->
                            <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning btn-sm" title="edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Delete -->
                            <button type="button" onclick="performDestroy({{ $review->id }}, this)" class="btn btn-danger btn-sm" title="delete">
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
              {{ $reviews->links() }}
            </div>
          </div>
         </div>

@endsection

@section('scripts')
<script>
    function performDestroy(id,reference){
        confirmDestroy('/admin/reviews/'+id,reference);
    }
</script>
@endsection


