@extends('dashboard.cms.parent')

@section('title', 'create Customer')
@section('main-title', 'create Customer')
@section('sub-title', 'create Customer')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create new Customer</h3>
              </div>

              <form method="POST" onsubmit="event.preventDefault(); performStore();">
             @csrf
                 <div class="card-body">
                 <div class="row">
                  <div class="form-group col-sm-4">
                    <label for="name">Customer name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Customer name" name="name" required>
                  </div>
                 <div class="form-group col-md-4">
                    <label for="image">image</label>
                    <input type="file" class="form-control" id="image" placeholder="choose Image" name="image" accept="image/*" required>
                  </div>
                 <div class="form-group col-sm-4">
                    <label for="identity_id">Customer identity_id</label>
                    <input type="text" class="form-control" id="identity_id" placeholder="Enter Customer identity_id" name="identity_id" required>
                   </div>
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
               <div class="form-group col-sm-4">
                    <label for="address"> Detailed Customer address (street, building number)</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter Customer address" name="address" required>
                  </div>
                 </div>
 <div class="row">

                  <div class="form-group col-sm-4">
                    <label for="email">Customer email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Customer email" name="email" required>
                  </div>
                   <div class="form-group col-md-4">
    <label for="gender">Gender</label>
    <select class="form-control" id="gender" name="gender" required>
        <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
</div>
                   <div class="form-group col-sm-4">
                    <label for="password">Customer password</label>
                    <input type="text" class="form-control" id="password" placeholder="Enter Customer password" name="password" required>
                  </div> </div>
<div class="row">
                <div class="form-group col-sm-4">
                    <label for="birthday">Customer birthday</label>
                    <input type="date" class="form-control" id="birthday" placeholder="Enter Customer birthday" name="birthday" required>
                   </div>
                   <div class="form-group col-sm-4">
                    <label for="phone">Customer phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter Customer phone" name="phone" required>
                  </div>
                 </div>
                </div>
                <!-- /.card-body -->
               </div>
                <div class="card-footer">
                  <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('customers.index') }}" class="btn btn-primary">Go Back</a>
                 </div>
              </form>
            </div>
@endsection

@section('scripts')
<script>
    function performStore(){
        let formData=new FormData();
        formData.append('image',document.getElementById('image').files[0]);
        formData.append('city_id',document.getElementById('city_id').value);
        formData.append('name',document.getElementById('name').value);
        formData.append('email',document.getElementById('email').value);
        formData.append('password',document.getElementById('password').value);
        formData.append('gender',document.getElementById('gender').value);
        formData.append('birthday',document.getElementById('birthday').value);
        formData.append('address',document.getElementById('address').value);
        formData.append('identity_id',document.getElementById('identity_id').value);
        formData.append('phone',document.getElementById('phone').value);
        store('/admin/customers',formData)

    }function loadCities(countryId) {
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


            let cities = response.data;

            cities.forEach(function (city) {
                let option = document.createElement('option');
                option.value = city.id;
                option.text = city.city_name;
                citySelect.appendChild(option);
            });
        })
        .catch(function (error) {
    console.error("Full Error:", error.response);
    citySelect.innerHTML = '<option value="">error: ' + error.response.status + '</option>';
});
}
</script>

@endsection


