<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Estate</title>
  <link rel="stylesheet" href="{{ asset('front/css/addHome.css') }}">
</head>
<body>

       <!-- start web header -->
    <div id="header">
        <img id="logo" src="img/apartments-for-rent-logo.png">
        <ul id="menu">
            <li><a href="shop.html">Shop</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="home.html">Home</a></li>

        </ul>
    </div>
    <!-- end web header -->

<div class="container">

  <h2>Add New Estate</h2>

  <form>

    <!-- Title -->
    <div class="input-box full">
      <label for="title">Title :</label>
      <input type="text" id="title" placeholder="Title" required>
    </div>

    <div class="form-grid">

      <!-- Description -->
      <div class="input-box">
        <label for="description">Description :</label>
        <input type="text" id="description" placeholder="Description" required>
      </div>

      <!-- Type -->
      <div class="input-box">
        <label for="type">Type :</label>
        <input type="text" id="type" placeholder="Type" required>
      </div>

      <!-- Area -->
      <div class="input-box">
        <label for="area">Area :</label>
        <input type="text" id="area" placeholder="Area" required>
      </div>
      
      <!-- Zip Code -->
      <div class="input-box">
        <label for="zipcode">Zip Code :</label>
        <input type="number" id="zipcode" placeholder="Zip Code" required>
      </div>

      <!-- Address -->
      <div class="input-box">
        <label for="address">Address :</label>
        <input type="text" id="address" placeholder="Address" required>
      </div>

      <!-- Price -->
      <div class="input-box">
        <label for="price">Price :</label>
        <input type="number" id="price" placeholder="Price" required>
      </div>

      <!-- Bathrooms -->
      <div class="input-box">
        <label for="bathrooms">Bathrooms :</label>
        <input type="number" id="bathrooms" placeholder="Bathrooms" required>
      </div>

      <!-- Bedrooms -->
      <div class="input-box">
        <label for="bedrooms">Bedrooms :</label>
        <input type="number" id="bedrooms" placeholder="Bedrooms" required>
      </div>

      <!-- State -->
      <div class="input-box">
        <label for="state">State :</label>
        <input type="text" id="state" placeholder="State" required>
      </div>

      <!-- Status -->
      <div class="input-box">
        <label for="status">Status :</label>
        <select required id="status">
            <option value="open">Open</option>
            <option value="closed">Closed</option>
          </select>
      </div>

       <!-- Photo -->
      <div class="input-box">
        <label for="photo">Photo :</label>
        <input type="file" id="photo"  required>
      </div>
      
    </div>

    <button type="submit" class="add-btn" onclick="AddEstateDone()">Add</button>

  </form>

  
  <div id="AddEstate"   style="display:none;">
    <h1>you have added A Estate Successfully</h1>
  </div>

<script>
  function AddEstateDone(){
      document.getElementById("AddEstate").style.display = "block";
    }

</script>

</div>

</body>
</html>