@extends('dashboard.cms.parent')

@section('title', 'Edit customer')
@section('main-title', 'Edit customer')
@section('sub-title', 'Edit customer')

@section('styles')

@endsection

@section('content')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit new customer</h3>
              </div>
             
              <form method="POST" onsubmit="event.preventDefault(); performStore();">
             @csrf
                <div class="card-body">

               
             
                     <div class="card-body">
                            <div class="row">  
                                           <div class="form-group col-md-4">
                                                   <label for="name">customer name</label>
                                                    <!--     <input type="text" class="form-control" id="name" placeholder="Enter customer name" name="name" value="{{ $customer->user->name ?? "" }}" required>-->
                                                    <input type="text" id="name" name="name" value="{{ $customers->user->name ?? '' }}" class="form-control">
                                                  </div>
             
                                                
                                             <div class="form-group col-md-4">
                                                    <label for="identity_id">customer identity_id</label>
                                                    <input type="text" class="form-control" id="identity_id" placeholder="Enter customer identity_id" name="identity_id" value="{{$customers->identity_id }}" required>
                                                  </div>

                                                  <div class="form-group col-md-4">
                                                  <label for="image">image</label>
                                                  <input type="file" class="form-control" id="image" placeholder="choose Image" name="image" accept="image/*" required>
                                                </div>
                                                  
                           </div>
          
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
                                                    <input type="text" class="form-control" id="address" placeholder="Enter customer address" name="address" value="{{$customers->user->address ?? ""}}" required>
                                                  </div> 

                                                  
                                                     
                                                   
                          </div>
                          
                          <div class="row">
                             
                                                    <div class="form-group col-md-4">
                                                    <label for="gender">Gender</label>
                                                    <select class="form-control" id="gender" name="gender" required>
                                                        <option value="">Select Gender</option>
                                                        <option value="male" {{ ($customers->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                                                        <option value="female" {{ ($customers->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                                                    </select>
                                                </div>
                                              <div class="form-group col-md-4">
                                                      <label for="email">customer email</label>
                                                      <input type="text" class="form-control" id="email" placeholder="Enter customer email" name="email" value="{{$customers->email }}" required>
                                                    </div>

                                                        <div class="form-group col-md-4">
                                                        <label for="password">customer password</label>
                                                        <input type="text" class="form-control" id="password" placeholder="Enter customer password" name="password" value="{{$customers->password }}" required>
                                                      </div>
                                                      <div class="form-group col-md-4">
                                                      <label for="birthday">customer birthday</label>
                                                      <input type="date" class="form-control" id="birthday" placeholder="Enter customer birthday" name="birthday" value="{{$customers->birthday }}" required>
                                                    </div>
                                                  
                                                       
                                                    <div class="form-group col-md-4">
                                                    <label for="phone">customer phone</label>
                                                    <input type="text" class="form-control" id="phone" placeholder="Enter customer phone" name="phone" value="{{$customers->user->phone ?? ""}}" required>
                                                  </div>
                            </div>
                </div>
                

                                                <div class="card-footer">
                                                <button type="button" onclick="performUpdate({{ $customers->id }})" class="btn btn-primary">Update</button>
                                                <!--  <button type="button" onclick="performUpdate({{ $customers->id }})" class="btn btn-primary">Update</button>-->
                                                <a href="{{ route('customers.index') }}" class="btn btn-primary">Go to Index</a>

                                                </div>
                                            </form>
                                            </div>
                                @endsection

                                @section('scripts')
                                <script>
                                    function performUpdate(id){
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

                                        storeRoute('/admin/customers_update/'+id,formData);

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


