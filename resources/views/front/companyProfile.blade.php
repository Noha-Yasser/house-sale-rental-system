<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Company Profile</title>
  <link rel="stylesheet" href="{{ asset('front/css/companyProfile.css') }}">
</head>
<body>
    <!-- start web header -->
    <div id="header">
        <img id="logo" src="img/apartments-for-rent-logo.png">
        <ul id="menu">
            <li><a href="shop.html">Shop</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="about.html">About Us</a></li>
    
            <li><a href="home.html">Home</a></li>

        </ul>
    </div>
    <!-- end web header -->


<div class="container">

  <!-- Header -->
  <div class="header">
    <div class="company-info">
      <img src="img/aya.png" class="logo">
      <div>
        <h2>Al-Amal Company</h2>
        <p>info@company.com</p>
      </div>
    </div>

    <button class="edit-btn">Edit</button>
  </div>

  <!-- Company Details -->
  <div class="details">
    <div class="field">
      <label>Country</label>
      <input type="text" value="Palestine">
    </div>

    <div class="field">
      <label>Address</label>
      <input type="text" value="Al-Nasser Street - Gaza">
    </div>

    <div class="field">
      <label>Website</label>
      <input type="text" value="www.company.com">
    </div>

    <div class="field">
      <label>Email</label>
      <input type="email" value="info@company.com">
    </div>
  </div>

  <!-- Properties Grid -->
  <h3 class="section-title">Real Estate</h3>

  <div class="grid">

    <!-- Card -->
    <div class="card">
      <img src="img/aboutsec1.jpg">
      <h4>Luxury Villa</h4>
      <p>Ramallah</p>
      <span>$250,000</span>
      <a href="addHome.html">
        <button>Edit</button>
      </a>
    </div>

    <div class="card">
      <img src="img/about1.jpg">
      <h4>Modern Apartment</h4>
      <p>Nablus</p>
      <span>$120,000</span>
      <a href="addHome.html">
        <button>Edit</button>
      </a>
    </div>

  </div>

  <!-- Add Button -->
  <div class="add-container">
    <a href="addHome.html">
        <button class="add-btn">+ Add Property</button>
    </a>
  </div>

</div>

</body>
</html>