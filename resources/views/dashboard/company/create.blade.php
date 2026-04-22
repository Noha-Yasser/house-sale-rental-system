@extends('dashboard.cms.parent')

@section('title', 'create company')
@section('main-title', 'create company')
@section('sub-title', 'create company')

@section('styles')

@endsection

@section('content')
           <div class="card">
    <div class="card-header">
        <h3 class="card-title">Company Information</h3>
        <div class="card-tools">
            <a href="{{ route('companies.index') }}" class="btn btn-default btn-sm">Back to List</a>
        </div>
    </div>
    <div class="card-body">
        {{-- <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data"> --}}
           <form method="POST" onsubmit="event.preventDefault(); performStore();">
           @csrf
<div class="row">
                  
            <div class="form-group col-sm-4">
                <label for="name">Company Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control " required>
                
            </div>

            <div class="form-group col-sm-4">
                <label for="website">Website</label>
                <input type="url" name="website" id="website" class="form-control " placeholder="https://example.com">
               
            </div>
           <div class="form-group col-md-4">
                    <label for="image">image</label>
                    <input type="file" class="form-control" id="image" placeholder="choose Image" name="image" accept="image/*" required>
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
  <div class="form-group col-md-4">
                                                    <label for="address">Detailed Company address (street, building number)</label>
                                                    <input type="text" class="form-control" id="address" placeholder="Enter Company address" name="address"  required>
                                                  </div> 
  </div>
<div class="row">
                  
            <div class="form-group col-sm-4">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="4" class="form-control ">{{ old('description') }}</textarea>
             
            </div>


            <div class="form-group col-sm-4">
                <label for="rating">Rating (0-5)</label>
                <input type="number" name="rating" id="rating" step="0.1" min="0" max="5" class="form-control ">
               
            </div>    </div>
            <div class="row">
  <div class="form-group col-sm-4">
                    <label for="phone">Customer phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter Customer phone" name="phone" required>
                  </div>
                      <div class="form-group col-sm-4">
                    <label for="email">Customer email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Customer email" name="email" required>
                  </div>
                   <div class="form-group col-sm-4">
                    <label for="password">Customer password</label>
                    <input type="text" class="form-control" id="password" placeholder="Enter Customer password" name="password" required>
                  </div>
                  </div>  
            <button type="submit" onclick="performStore()" class="btn btn-primary">Save Company</button>
            <a href="{{ route('companies.index') }}" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function performStore(){
        let formData=new FormData();
        formData.append('image',document.getElementById('image').files[0]);
           formData.append('city_id',document.getElementById('city_id').value);
      
        formData.append('name',document.getElementById('name').value);
     
      
                  formData.append('description',document.getElementById('description').value);
                      formData.append('website',document.getElementById('website').value);
                      formData.append('rating', document.getElementById('rating').value);
     formData.append('phone',document.getElementById('phone').value);
         formData.append('email',document.getElementById('email').value);
        formData.append('password',document.getElementById('password').value);
        
        store('/admin/companies',formData)

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


