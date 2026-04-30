<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Profile</title>
  <link rel="stylesheet" href="{{ asset('front/css/adminProfile.css') }}">
</head>
<body>
    <!-- start web header -->
    <div id="header">
        <img id="logo" src="img/apartments-for-rent-logo.png">
        <ul id="menu">
            <li><a href="adminProfile.html" id="profile-img"><img src="img/brad-1.png"/></a></li>
            <li><a href="shop.html">Shop</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="home.html">Home</a></li>

        </ul>
    </div>
    <!-- end web header -->

<div class="container">

  <!-- Header -->
  <div class="header">
    <div class="admin-info">
      <img src="img/brad-1.png" class="logo">
      <div>
        <h2>Israa Osama</h2>
        <p>info@gmail.com</p>
      </div>
    </div>

    <button class="edit-btn">Edit</button>
  </div>

  <!-- Admin Details -->
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


  <!-- dashboard Button -->
  <div class="dashboard-container">
    <a href="">
        <button class="dashboard-btn">Dashboard</button>
    </a>
  </div>

</div>

</body>
</html>