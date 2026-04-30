@extends('front.parent')
@section('title','Register Page')
@section('styles')
    <link rel="stylesheet" href="{{ asset('front/css/register.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        footer, .footer, [class*="footer"] {
            display: none !important;
        }
    </style>
@endsection


@section('content')
<!-- Popup -->
<div class="overlay" id="overlay">
    <div class="popup">
        <h2>Are you?</h2>
        <p>Select your account type</p>
        <div class="choices">
            <button class="choice-btn" onclick="chooseRole('Customer')">Customer</button>
            <button class="choice-btn" onclick="chooseRole('Company')">Company</button>
        </div>
    </div>
</div>

<!-- Register Box -->
<div class="login-wrapper" id="registerWrapper" style="display: none;">
    <div class="login-card">
        <h1>Register</h1>
        <p class="role-text" id="roleText">Selected: -</p>

        {{-- إزالة action والطريقة --}}
        <form id="registerForm">
            @csrf
            <input type="hidden" name="role" id="selectedRole" value="">

            <!-- Company Fields -->
            <div id="companyField" style="display:none;">
                <div class="input-box">
                    <input type="text" id="company_name" name="company_name" placeholder="Company Name" required>
                </div>
                <div class="input-box">
                    <textarea id="description" name="description" placeholder="Description" rows="3" required></textarea>
                </div>
                <div class="input-box">
                    <input type="text" id="address" name="address" placeholder="Address">
                </div>
                <div class="input-box">
                    <input type="url" id="website" name="website" placeholder="Website of your company" required>
                </div>
            </div>

            <!-- Customer Fields -->
            <div id="customerField" style="display:none;">
                <div class="input-box">
                    <input type="text" id="full_name" name="full_name" placeholder="Full Name" required>
                </div>
                <div class="input-box">
                    <input type="date" id="birthday" name="birthday" placeholder="Birthday" required>
                </div>
                <div class="input-box">
                    <select id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>

            <!-- Common Fields -->
            <div class="input-box">
                <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
            </div>

            <div class="input-box">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-box">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>

            <div class="input-box">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
            </div>

            <button type="button" onclick="performRegister()" class="login-btn">Register</button>

            <p class="register">
                Already have an account? <a href="{{ route('login.page') }}">Login</a>
            </p>
        </form>

        @if($errors->any())
            <div class="alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let selectedRole = '';

    function chooseRole(role) {
        selectedRole = role;
        document.getElementById('selectedRole').value = role;
        document.getElementById('registerWrapper').style.display = 'flex';
        document.getElementById('roleText').innerText = 'Selected: ' + role;
        document.getElementById('overlay').style.display = 'none';

        if (role === 'Company') {
            document.getElementById('companyField').style.display = 'block';
            document.getElementById('customerField').style.display = 'none';
        } else if (role === 'Customer') {
            document.getElementById('customerField').style.display = 'block';
            document.getElementById('companyField').style.display = 'none';
        }
    }

    function performRegister() {
        // التحقق من اختيار الدور
        if (!document.getElementById('selectedRole').value) {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Please select account type first!',
            });
            return;
        }

        let formData = new FormData();

        // الحقول المشتركة
        formData.append('role', document.getElementById('selectedRole').value);
        formData.append('phone', document.getElementById('phone').value);
        formData.append('email', document.getElementById('email').value);
        formData.append('password', document.getElementById('password').value);
        formData.append('password_confirmation', document.getElementById('password_confirmation').value);

        // حقول Customer
        if (document.getElementById('full_name')) {
            formData.append('full_name', document.getElementById('full_name').value);
        }
        if (document.getElementById('birthday')) {
            formData.append('birthday', document.getElementById('birthday').value);
        }
        if (document.getElementById('gender')) {
            formData.append('gender', document.getElementById('gender').value);
        }

        // حقول Company
        if (document.getElementById('company_name')) {
            formData.append('company_name', document.getElementById('company_name').value);
        }
        if (document.getElementById('description')) {
            formData.append('description', document.getElementById('description').value);
        }
        if (document.getElementById('address')) {
            formData.append('address', document.getElementById('address').value);
        }
        if (document.getElementById('website')) {
            formData.append('website', document.getElementById('website').value);
        }

        // إرسال البيانات
        axios.post('/web/register', formData)
            .then(function(response) {
                if (response.data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.data.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                    setTimeout(function() {
                        window.location.href = response.data.redirect;
                    }, 2000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: response.data.message,
                    });
                }
            })
            .catch(function(error) {
                if (error.response && error.response.status === 422) {
                    let errors = error.response.data.errors;
                    let errorMessage = '';
                    for (let key in errors) {
                        errorMessage += errors[key][0] + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: errorMessage,
                    });
                } else if (error.response && error.response.data.message) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: error.response.data.message,
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Something went wrong!',
                    });
                }
            });
    }
</script>
@endsection
