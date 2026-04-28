@extends('dashboard.cms.parent')

@section('title', 'update company')
@section('main-title', 'update company')
@section('sub-title', 'update company')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">update new company</h3>
               </div>
              <form method="POST" onsubmit="event.preventDefault(); performStore();">
    @csrf
            <div class="card-body">
              <div class="row">
                  <div class="form-group col-md-4">
                    <label for="name">name</label>
                   <input type="text" id="name" name="name" value="{{ $companies->user->name ?? '' }}" class="form-control">
                   </div>
                  <div class="form-group col-md-4 ">
                    <label for="phone">phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone" value="{{ $companies->user->phone ?? ""}}" required>
                  </div>
                   <div class="form-group col-md-4">
                    <label for="rating">rating</label>
                    <input type="text" class="form-control" id="rating" placeholder="Enter rating" name="rating"  value="{{ $companies->rating ?? ""}}" required>
                  </div>
                   </div>
                  <div class="row">
                   <div class="form-group col-md-4">
                    <label for="email">website</label>
                    <input type="text" class="form-control" id="website" placeholder="Enter website" name="website" value="{{ $companies->website ?? "" }}" required>
                  </div>

                     <div class="form-group col-md-4">
                    <label for="password">description</label>
                    <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value="{{ $companies->description ?? "" }}" required>
                  </div>
                   <div class="form-group col-md-4">
                    <label for="image">image</label>
                    <input type="file" class="form-control" id="image" placeholder="choose Image" name="image" accept="image/*" required>
                  </div>
                </div>
                 <div class="row">
                   <div class="form-group col-md-4">
                    <label for="email">email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ $companies->email ?? "" }}" required>
                   </div>
                    <div class="form-group col-md-4">
                    <label for="password">companies password</label>
                    <input type="text" class="form-control" id="password" placeholder="Enter companies password" name="password" value="{{$companies->password }}" required>
                  </div> </div>
                  <div class="row">
                      <div class="form-group col-md-4">
                      <label>Country</label>
                      <select class="form-control" id="country_id" onchange="loadCities(this.value)">
                       <option value="">choose country</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                        @endforeach
    </select>
    </div>
    <div class="form-group col-md-4">
   <label>City</label>
  <select class="form-control" id="city_id">
  <option value="">choose city</option>
  </select>
  </div>
  <div class="form-group col-md-4">
   <label for="address">Detailed Customer address (street, building number)</label>
    <input type="text" class="form-control" id="address" placeholder="Enter customer address" name="address" value="{{$companies->user->address }}" required>
    </div>
  </div>
</div>
 <div class="card-footer">
   <button type="button" onclick="performUpdate( {{ $companies->id }})" class="btn btn-primary">Update</button>
    <a href="{{ route('companies.index') }}" class="btn btn-primary">Go Back</a>
            </div>
            </form>
            </div>
@endsection

@section('scripts')
<script>
    function performUpdate(id){
    let formData=new FormData();
        // formData.append('_method', 'PUT');
    formData.append('name',document.getElementById('name').value);
    formData.append('phone',document.getElementById('phone').value);
    formData.append('city_id',document.getElementById('city_id').value);
    formData.append('email',document.getElementById('email').value);
    formData.append('image',document.getElementById('image').files[0]);
    formData.append('description',document.getElementById('description').value);
    formData.append('website',document.getElementById('website').value);
    formData.append('rating', document.getElementById('rating').value);
    formData.append('address',document.getElementById('address').value);
    formData.append('password',document.getElementById('password').value);
    storeRoute('/admin/companies_update/'+ id,formData)

    }

    function loadCities(countryId) {
    let citySelect = document.getElementById('city_id');

    // إذا لم يتم اختيار دولة، نفرغ قائمة المدن
    if (!countryId) {
        citySelect.innerHTML = '<option value="">choose city </option>';
        return;
    }

    citySelect.innerHTML = '<option value="">Loading....</option>';

    axios.get('/admin/get-cities/' + countryId)
        .then(function (response) {
            // تفريغ القائمة قبل البدء
            citySelect.innerHTML = '<option value=""> choose city</option>';

            // التأكد من أن البيانات مصفوفة
            let cities = response.data;

            cities.forEach(function (city) {
                let option = document.createElement('option');
                option.value = city.id;
                option.text = city.city_name;
                citySelect.appendChild(option);
            });
        })
        .catch(function (error) {
    console.error("Full Error:", error.response); // هذا سيطبع الخطأ كاملاً في الـ Console
    citySelect.innerHTML = '<option value="">error: ' + error.response.status + '</option>';
});
}
</script>

@endsection


