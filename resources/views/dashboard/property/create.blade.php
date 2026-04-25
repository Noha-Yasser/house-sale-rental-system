@extends('dashboard.cms.parent')

@section('title', 'Create Estate')
@section('main-title', 'Create Estate')
@section('sub-title', 'Create Estate')

@section('styles')
    <style>
        
            /* Container */
            .container {
            max-width: 100%;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            }

            /* Title */
            h2 {
            margin-bottom: 20px;
            }

            .GoBack{
                margin-top: 20px;
                padding: 8px;
                background: #007bff;
                color: white;
                border: none;
                border-radius: 10px;
                font-size: 16px;
                cursor: pointer;
            }
            /* Full width input */
            .full {
            margin-bottom: 15px;
            }

            /* Grid (2 per row) */
            .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            }

            /* Input box */
            .input-box {
            display: flex;
            flex-direction: column;
            }

            .input-box label {
            font-size: 13px;
            color: black;
            margin-bottom: 5px;
            }

            .input-box input, .input-box select {
            padding: 3px;
            border-radius: 8px;
            border: 1px solid #ddd;
            }

            /* Button */
            .add-btn {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #00b894;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            }

            .add-btn:hover {
            background: #019875;
            }
            /* Responsive */
            @media (max-width: 600px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            }
    
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2>Add New Estate</h2>
            <a href="{{ route('properties.index')}}">
                <button class="GoBack">Back</button>
            </a>
        </div>

  <form>

    <!-- Title -->
    <div class="input-box full">
      <label for="title">Title :</label>
      <input type="text" id="title" placeholder="Title" name="title" required>
    </div>
    <!-- Company Name  -->
      <div class="input-box full">
          <label for="company_id">Select Company Name</label>
          <select required id="company_id" name="company_id" class="form-control" >
            @foreach($companies as $company)
                  <option value="{{$company->id}}">{{$company->user->name}}</option>
            @endforeach
          </select>
      </div>

    <div class="form-grid">

      <!-- Description -->
      <div class="input-box">
        <label for="description">Description :</label>
        <input type="text" id="description" placeholder="Description" name="description" required>
      </div>

      <!-- Type -->
      <div class="input-box">
        <label for="type">Type :</label>
         <select required id="type" name="type">
            <option value="Apartment">Apartment</option>
            <option value="House">House</option>
            <option value="Estate">Estate</option>
          </select>
      </div>
      

      <!-- Area -->
      <div class="input-box">
        <label for="area">Area :</label>
        <input type="number" id="area" placeholder="Area" name="area" required>
      </div>
      
      <!-- Zip Code -->
      <div class="input-box">
        <label for="zip_code">Zip Code :</label>
        <input type="number" id="zip_code" placeholder="Zip Code" name="zip_code" required>
      </div>

      <!-- Address -->
      <div class="input-box">
        <label for="address">Address :</label>
        <input type="text" id="address" placeholder="Address" name="address" required>
      </div>

      <!-- Price -->
      <div class="input-box">
        <label for="price">Price :</label>
        <input type="number" id="price" placeholder="Price" name="price" required>
      </div>

      <!-- Bathrooms -->
      <div class="input-box">
        <label for="bathrooms">Bathrooms :</label>
        <input type="number" id="bathrooms" placeholder="Bathrooms" name="bathrooms" required>
      </div>

      <!-- Bedrooms -->
      <div class="input-box">
        <label for="bedrooms">Bedrooms :</label>
        <input type="number" id="bedrooms" placeholder="Bedrooms"  name="bedrooms" required>
      </div>

          <div class="input-box">
                                                            <label>Country</label>
                                                            <select class="form-control" id="country_id" onchange="loadCities(this.value)">
                                                                <option value="">choose country</option>
                                                                @foreach($countries as $country)
                                                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="input-box">
                                                            <label>City</label>
                                                            <select class="form-control" id="city_id">
                                                                <option value="">choose city</option>
                                                            </select>
                                                        </div>

      <!-- Status -->
      <div class="input-box">
        <label for="status">Status :</label>
        <select required id="status"  name="status">
            <option value="Available">Available</option>
            <option value="Sold">Sold</option>
            <option value="Pending">Pending</option>
          </select>
      </div>

       <!-- Photo -->
     <div class="form-group col-md-4">
                    <label for="photo">photo</label>
                    <input type="file" class="form-control" id="photo" placeholder="choose photo" name="photo" accept="image/*" required>
                  </div>
      
{{-- <div class="form-group">
    <label for="images">Property photos (you can choose multiple photos)</label>
    <input type="file" name="images[]" id="images" class="form-control" multiple accept="image/*">
    <small class="text-muted">The first image will automatically become the main image.</small>
</div> --}}

    </div>

    <button type="button" onclick="performStore()" class="add-btn">Add</button>

  </form>


</div>
@endsection

@section('scripts')
<script>
   function performStore(){
    let formdata = new FormData();
    formdata.append('company_id',document.getElementById('company_id').value);
    formdata.append('title',document.getElementById('title').value);
    formdata.append('description',document.getElementById('description').value);
    formdata.append('price',document.getElementById('price').value);
    formdata.append('type',document.getElementById('type').value);
    formdata.append('bedrooms',document.getElementById('bedrooms').value);
    formdata.append('bathrooms',document.getElementById('bathrooms').value);
    formdata.append('area',document.getElementById('area').value);
    formdata.append('address',document.getElementById('address').value);
    formdata.append('city_id',document.getElementById('city_id').value);
    formdata.append('country_id',document.getElementById('country_id').value);
    formdata.append('zip_code',document.getElementById('zip_code').value);
    formdata.append('status',document.getElementById('status').value);
    formdata.append('photo',document.getElementById('photo').files[0]);
     formdata.append('city_id', document.getElementById('city_id').value);
    formdata.append('zip_code', document.getElementById('zip_code').value);
    formdata.append('status', document.getElementById('status').value);
  
//  let imagesInput = document.getElementById('images');
//     if (imagesInput && imagesInput.files.length > 0) {
//         for (let i = 0; i < imagesInput.files.length; i++) {
//             formdata.append('images[]', imagesInput.files[i]);
//         }
//         console.log('تم إضافة ' + imagesInput.files.length + ' صور');
//     } else {
//         console.log('لم يتم اختيار أي صور');
//     }
    store('/admin/properties', formdata)

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
    console.error("Full Error:", error.response); 
    citySelect.innerHTML = '<option value="">error: ' + error.response.status + '</option>';
});
}
</script>

@endsection


