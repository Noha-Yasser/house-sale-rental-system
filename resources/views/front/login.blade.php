{{-- @extends('front.parent')
@section('title','Login Page')
@section('styles')



  <link rel="stylesheet" href="{{ asset('front/css/login.css') }}" />
  <style>

  footer, .footer, [class*="footer"] {
    display: none !important;
}</style>

@endsection --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
   <link rel="stylesheet" href="{{ asset('front/css/login.css') }}" />
</head>
<body>


 {{-- <script src="system.js" ></script> --}}
{{-- 
@section('content') --}}
  <!-- Popup -->
  <div class="overlay" id="overlay">
    <div class="popup">
      <h2>Are you?</h2>
      <p>Please choose your account type to continue</p>

      <div class="choices">
        <button class="choice-btn" onclick="chooseRole('Customer')">Customer</button>
        <button class="choice-btn" onclick="chooseRole('Company')">Company</button>
        <button class="choice-btn" onclick="chooseRole('Admin')">Admin</button>
      </div>
    </div>
  </div>

  <!-- Login Box -->
  <div class="login-wrapper" id="loginWrapper">
    <div class="login-card">
      <h1>Login</h1>
      <p class="role-text" id="roleText">Selected: -</p>

              <form method="POST" action="{{ route('login.submit') }}" id="loginForm">
@csrf
<input type="hidden" name="role" id="selectedRole" value="">
        <div class="input-box">
                <input type="email" style="  margin-bottom: 5px;" name="email" placeholder="Email" required value="{{ old('email') }}" />
                @error('email')
                    <span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror

        <div class="input-box">
          <input type="password" placeholder="Password" required />
           @error('password')
                    <span style="color: red; font-size: 12px;">{{ $message }}</span>
                @enderror
        </div>

        <div class="options">
          <label>
            <input type="checkbox" />
            Remember me
          </label>
          <a href="{{ route('password.request') }}">Forgot password?</a>
        </div>
        <button type="submit"  class="login-btn" onclick="gotoProfile()" >Login</button>

        <p class="register">
          Don't have an account? <a href="{{route('register.page') }}">Register</a>
        </p>
      </form>
    </div>
  </div>



</body>
</html>
{{-- @endsection --}}

{{-- @section('scripts') --}}

<script>
    // تخزين نوع المستخدم المختار
    let selectedRole = '';

    function chooseRole(role) {
        selectedRole = role;
        document.getElementById('selectedRole').value = role;
        document.getElementById('roleText').innerText = 'Selected: ' + role;
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('loginWrapper').style.display = 'flex';
    }


</script>
{{-- 
@endsection --}}
