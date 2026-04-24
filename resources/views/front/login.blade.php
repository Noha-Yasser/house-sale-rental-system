<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link rel="stylesheet" href="css/login.css" />

</head>
<body>
 <script src="system.js" ></script>


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

      <form>
        <div class="input-box">
          <input type="text" placeholder="Username" required />
        </div>

        <div class="input-box">
          <input type="password" placeholder="Password" required />
        </div>

        <div class="options">
          <label>
            <input type="checkbox" />
            Remember me
          </label>
          <a href="home.html">Forgot password?</a>
        </div>
        <button type="button"  class="login-btn" onclick="gotoProfile()" >Login</button>

        <p class="register">
          Don't have an account? <a href="register.html">Register</a>
        </p>
      </form>
    </div>
  </div>

 

</body>
</html>