@extends('dashboard.cms.parent')

@section('title', 'contact')
@section('main-title', 'index contact')
@section('sub-title', 'index contact')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('content')
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title">contact Table</h3> --}}
               

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>


                    <tr>
                      <th style="width: 10px">ID</th>
                      <th class="text-center"> First Name</th>
                      <th class="text-center"> Last Name</th> 
                       <th class="text-center">Phone</th>
                      <th class="text-center">Email</th>
                    <th class="text-center">Message</th>
    <th class="text-center">Seeting</th>
                    </tr>

                  </thead>
                  <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                      <td>{{ $contact->id }}</td>
                      <td>{{ $contact->first_name ??""}}</td>
                 <td>{{ $contact->last_name ??""}}</td>
                      <td>{{ $contact->phone ??""}}</td>
                       <td>{{ $contact->email }}</td>
                         <td>{{ $contact->message }}</td>
                 
                   <td>{{ $contact->Seeting }}
                     

          
                <button type="button" onclick="performDestroy({{ $contact->id }}, this)" class="btn btn-danger btn-sm" title="delete">
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
              {{ $contacts->links() }}
            </div>
          </div>
         </div>

@endsection

@section('scripts')
<script>
    function performDestroy(id,reference){
        confirmDestroy('/admin/contacts/'+id,reference);
    }
</script>
@endsection


