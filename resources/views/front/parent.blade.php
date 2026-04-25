<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/css/homestyle.css') }}">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title')</title>
       @yield('styles') 
</head>
<body>
    <div id="header">
        <img id="logo" src="{{asset('front/img/apartments-for-rent-logo.png') }}">
        <ul id="menu">
            <li><a href="login.html" id="login">Login</a></li>
            <li><a href="shop.html">Shop</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="home.html">Home</a></li>

        </ul>
    </div>





@yield('content')




    <footer class="myfooter">
        <img style="height: 52px;" src="{{ asset('front/img/apartments-for-rent-logo.png') }}" alt="logo" style="display: block;">
        <br><p>&copy; 2023 CoStar Group, Inc.</p>
       <i class="fa fa-home" style="display: inline;"></i>  Equal Housing Opportunity
        <ul class="icon">
            <li>
                <a href="https/www.facebook.com"> <i class="fa fa-facebook fa-2x"></i></a>
            </li>
            <li>
                <a href="https/www.instagram.com">   <i class="fa fa-instagram fa-2x"></i></a>
            </li>
            <li>
                <a href="https/www.twitter.com">  <i class="fa fa-twitter fa-2x"></i></i></a>
            </li>
            <li> 
                <a href="https/www.youtube.com">  <i class="fa fa-youtube fa-2x"></i></a>
            </li>
            <li>
                <a href="https/www.pinterest.com">   <i class=" fa fa-pinterest fa-2x"></i></a>
            </li>
        </ul>

       
    </footer>

    @yield('scripts')
</body>
</html>