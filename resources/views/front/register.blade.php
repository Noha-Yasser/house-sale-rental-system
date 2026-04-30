<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="{{ asset('front/css/register.css') }}">
</head>
<body>

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
  <div class="login-wrapper" id="registerWrapper">
    <div class="login-card">
      <h1>Register</h1>
      <p class="role-text" id="roleText">Selected: -</p>

      <form>
        
        <!-- يظهر فقط إذا Company -->
         <div  id="companyField" style="display:none;">
            <div class="input-box" >
                <input type="text" placeholder="Company Name" required>
            </div>
            <div class="input-box" >
                <input type="text" placeholder="Description"  required>
            </div>
            <div class="input-box" >
                <input type="text" placeholder="Address">
            </div>
            <div class="input-box" >
                <input type="url" placeholder="Website of your company" required>
            </div>
            <div class="input-box" >
                <input type="image" placeholder="logo" required>
            </div>
         </div>
        <!-- end of this section company role -->

        <!-- this appear for customer role  -->
         <div  id="customerField" style="display:none;">
            <div class="input-box">
              <input type="text" placeholder="Full Name" required>
            </div>

            <div class="input-box">
              <input type="date" placeholder="Birthday " required>
            </div>
            
            <div class="input-box">
              <input type="text" placeholder="Gender" required>
            </div>
        </div>
        <!-- end of this section company role -->


       
        <div class="input-box">
          <input type="number" placeholder="Phone Number" required>
        </div>

        <div class="input-box">
          <input type="email" placeholder="Email" required>
        </div>

        <div class="input-box">
          <input type="password" placeholder="Password" required>
        </div>

        <div class="input-box">
          <input type="password" placeholder="Confirm Password" required>
        </div>



        <a href="login.html">
            <button type="submit" class="login-btn">Register</button>
        </a>

        <p class="register">
          Already have an account? <a href="login.html">Login</a>
        </p>
      </form>
    </div>
  </div>

  <script>
    function chooseRole(role) {
      document.getElementById("roleText").textContent = "Selected: " + role;
      document.getElementById("overlay").style.display = "none";
      document.getElementById("registerWrapper").classList.add("show");

      // إظهار حقل الشركة إذا اختار Company
      if (role === "Company") {
        document.getElementById("companyField").style.display = "block";
      }

       // إظهار حقل customer إذا اختار Company
      if (role === "Customer") {
        document.getElementById("customerField").style.display = "block";
      }

    }
     
  </script>

</body>
</html>