<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Company Profile</title>
  <link rel="stylesheet" href="{{ asset('front/css/customerProfile.css') }}">
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
    <div class="customer-info">
      <img src="img/aya.png" class="logo">
      <div>
        <h2>Israa Osama</h2>
        <p>info@gmail.com</p>
      </div>
    </div>

    <button class="edit-btn">Edit</button>
  </div>

  <!-- customer Details -->
  <div class="details">
    <div class="field">
      <label>First Name</label>
      <input type="text" value="Israa">
    </div>
    <div class="field">
      <label>Last Name</label>
      <input type="text" value="Osama">
    </div>

    <div class="field">
      <label>Phone Number</label>
      <input type="number" value="0599920214">
    </div>

    <div class="field">
      <label>Date of Birth</label>
      <input type="date" value="20/12/2003">
    </div>

    <div class="field">
      <label>Email</label>
      <input type="email" value="info@gmail.com">
    </div>
  </div>

  <!-- Properties Grid -->
  <h3 class="section-title">You bought</h3>

  <div class="grid">

    <!-- Card -->
    <div class="card">
      <img src="img/aboutsec1.jpg">
      <h4>Luxury Villa</h4>
      <p>Ramallah</p>
      <span>$250,000</span>
    </div>

    <div class="card">
      <img src="img/about1.jpg">
      <h4>Modern Apartment</h4>
      <p>Nablus</p>
      <span>$120,000</span>
    </div>

  </div>

  <!-- shop Button -->
  <div class="shop-container">
    <a href="shop.html">
        <button class="shop-btn">Shop Now </button>
    </a>
  </div>

</div>

</body>
</html>