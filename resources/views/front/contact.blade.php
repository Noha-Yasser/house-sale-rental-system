

   @extends('front.parent')
@section('title','Contact')
@section('styles')
  <link rel="stylesheet" href="{{ asset('front/css/contactstyle.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  @endsection
@section('content')




   <section class="consec1">
        <div class="center">
         <h1>Help Center Frequently Asked Questions</h1>
              <div class="sec1div1">
                         <div class="sec1img">
                                  <img src="{{ asset('front/img/Hand with key_0.png') }}" alt="con">
                         </div>
                         <div class="sec1text">
                               <h3> I'm a renter</h3>
                               <p> Learn about searching for rentals and paying rent online.</p>
                             <a href="gmail.com"> <h5>Renter Help Center </h5></a>
                         </div>
                 </div>
                <div class="sec1div2">
                         <div class="sec1img">
                             <img src="{{ asset('front/img/Buildings_0.png') }}" alt="con">
                         </div>
                         <div class="sec1text">
                              <h3>I manage rentals</h3>
                               <p>Get help adding, editing, and managing your properties.</p>
                                 <a href="gmail.com">   <h5> Rental Manager Help Center</h5></a>

                           </div>
                        </div>
        </div>
</section>

<section class="sec2">
<div class="sec2div1">
    <h1>Top FAQs for renters</h1>
    <ul>
        <li> <p>Does Apartments.com screen listings? </p></li>
        <li> <p> How do I apply to rentals? </p></li>
        <li> <p> Will you help me find a new place to live? </p></li>
        <li><p> How do I avoid a scam? </p></li>
        <li> <p>A property manager is not responding… </p> </li>
    </ul>
</div>
<div class="sec2div2">
    <h1>Top FAQs for rental managers</h1>
    <ul>
        <li> <p>How do I refresh or edit a listing?</p> </li>
        <li> <p> I'm having trouble verifying my listing… </p></li>
        <li> <p>Why was my listing rejected?</p></li>
        <li> <p>I'm having issues logging in…</p></li>
        <li> <p>Who is My Account Representative?</p> </li>
    </ul>
</div>
</section>
<section class="sec3">
    <img src="{{ asset('front/img/Capture.PNG') }}" alt="con">
    <h1>Can’t Find What You’re Looking For?</h1>
    <p>Fill out the form below and we will get in touch with you as soon as possible.</p>

</section>

<section class="sec4">
    <form  >

        <div class="form1">
        <input type="text"  id="first_name" name="first_name"  placeholder="First Name*" required style="display: inline;">
        <input type="text"  id="last_name" name="last_name" placeholder="Last Name*" required></div>
        <div class="form2">
            <input type="email"  id="email" name="email" placeholder="Email*" required style="display: inline;">
        <input type="tel"  id="phone" name="phone" placeholder="phone(optional)"></div>

        <textarea  id="message" name="message" placeholder=" What can we help you with?"></textarea>

          <button type="button" onclick="performContact()" class="sub btn btn-primary">Submit</button>
    </form>
</section>
<section class="sec5">
    <div class="sec5txt1">
        <h1>Our customer support team has you covered.</h1>
        <p> Choose a category below that best fits your needs.</p>
    </div><div class="div12">
    <div class="div1">
        <h1>List or advertise your property</h1>
        <p>Are you a property manager, owner, or agent looking to reach millions of renters on Apartments.com? Contact our sales team and we'll help you get set up.</p>
        <ul>
            <li><p>Add a Property</p></li>
            <li><p>advertise@apartments.com</p> </li>
            <li><p> (866) 609-2264</p></li>
        </ul>
    </div>
    <div class="div2">
        <h1>Multifamily advertisers</h1>
        <p>Manage your listing on Apartments.com and get additional help with our full suite of online tools to lease and manage your property.</p>
       <div class="div2ul">
        <div  style="float: left;">
        <h3 style="margin-left: 20px; display: block;">Support</h3>

        <ul >
            <li><p>Rental manager tools</p></li>
            <li><p>support@apartments.com </p> </li>
            <li><p>(888) 658-7368</p></li>
        </ul></div>
    <div style="float: right;">
        <h3 style="margin-left: 20px; display: block;" >Billing</h3>

        <ul  >
            <li><p>billing@apartments.com</p></li>
            <li><p>(888)658-7368</p> </li>

        </ul></div>
    </div>
    </div>
    </div>
    <div class="div34">
       <div class="div3">
        <h1>Property owners & managers (single units)</h1>
        <p>Get the support you need to collect rent payments, manage leases, and more with our online tools.ding a new home, online tours, applying to properties, signing your lease, and paying rent online.</p>
        <h3 style="margin-left: 20px; display: block;">General Support</h3>
        <ul>
            <li><p>Rental manager tools</p></li>
            <li><p>support@apartments.com</p> </li>
            <li><p>(844) 293-8899</p></li>
        </ul>
         <p>Questions regarding rent payments processed through Apartments.com:</p>
        <p class="p3">rentpayments@apartments.com</p>
        </div>
        <div class="div4">
            <h1>Renters</h1>
        <p>Get help finding a new home, online tours, applying to properties, signing your lease, and paying rent online.</p>
        <ul>
            <li><h4 >Email:</h4><p>Rental manager tools</p></li>
            <li><h4 >Call:</h4><p>support@apartments.com</p> </li>

        </ul>
        <p>Questions regarding rent payments processed through Apartments.com:</p>
        <p class="p3">rentpayments@apartments.com</p>
      </div>
    </div>

</section>



@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/crud.js') }}"></script>
<script>
    function performContact(){
        let formData=new FormData();

       formData.append('first_name',document.getElementById('first_name').value);
        formData.append('last_name',document.getElementById('last_name').value);
        formData.append('email',document.getElementById('email').value);
        formData.append('phone',document.getElementById('phone').value);
        formData.append('message',document.getElementById('message').value);

        store('/web/contact',formData)}
</script>


@endsection



