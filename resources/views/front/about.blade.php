@extends('front.parent')
@section('title','About us')
@section('styles')


    <link rel="stylesheet" href="{{ asset('front/css/aboutstyle.css') }}">
@endsection
@section('content')
 
    <div class="container">
        <img id="sec1" src="{{ asset('front/img/about1.png') }}">
        <div class="center">
            <div class="center2">
                <h4>About Us</h4>
                <h1>About The Apartments.com<br> Network</h1>
               
            </div>
        </div>
    </div>
    <section class="aboutsec1">
        <div class="sec1img">
            <img src="{{ asset('front/img/aboutsec1.jpg') }}" alt="about">
        </div>
        <div class="sec1text">
          <p>The Apartments.com Network represents the nation’s most comprehensive online rental marketplace. Our extensive network of 10 leading sites including Apartments.com, ForRent.com, ApartmentFinder.com and 7 others are visited over 100 million times each month by renters looking for their next apartment. Our suite of digital advertising, social and reputation management, and market analytics solutions delivers the most leases at a great ROI for our advertisers. Apartments.com is the only source you need to optimize your online marketing performance and fill your vacancies fast.</p>
        </div>
    </section>
     <section class="aboutsec2">
        <img src="{{ asset('front/img/aboutsec2.png') }}" alt="co">
     </section>
     <section class="aboutsec3">
        <div class="sec3text1">
          <h1>About<br> 
            CoStar Group</h1>
        </div>
        <div class="sec3text2">
          <p>CoStar Group, Inc. (NASDAQ: CSGP) is the leading provider of commercial real estate information, analytics and online marketplaces. Founded in 1987, CoStar conducts expansive, ongoing research to produce and maintain the largest and most comprehensive database of commercial real estate information. 

            Our suite of online services enables clients to analyze, interpret and gain unmatched insight on commercial property values, market conditions and current availabilities. STR provides premium data benchmarking, analytics and marketplace insights for the global hospitality sector. Ten-X provides a leading platform for conducting commercial real estate online auctions and negotiated bids. LoopNet is the most heavily trafficked commercial real estate marketplace online. Realla is the UK’s most comprehensive commercial property digital marketplace. Apartments.com, ApartmentFinder.com,
            
            ForRent.com, ApartmentHomeLiving.com, Westside Rentals, AFTER55.com, CorporateHousing.com, ForRentUniversity.com and Apartamentos.com form the premier online apartment resource for renters seeking great apartment homes and provide property managers and owners a proven platform for marketing their properties. Homesnap is an industry-leading online and mobile software platform that provides user-friendly applications to optimize residential real estate agent workflow and reinforce the agent-client relationship.
            
            CoStar Group’s websites attract tens of millions of unique monthly visitors. Headquartered in Washington, DC, CoStar maintains offices throughout the U.S. and in Europe, Canada and Asia with a staff of over 4,600 worldwide, including the industry’s largest professional research organization. For more information, visit www.costargroup.com.
            
             </p>
        </div>
    </section>
    <section class="aboutvid">
        <video class="video" src="{{ asset('front/img/Introduction to Apartments com Online Rental Tools.mp4') }}"  controls autoplay></video>
         </section>
    <section class="aboutsec4">
        <img src="{{ asset('front/img/aboutsec4.jpg') }}" alt="co">
     </section>
    
     <section class="aboutsec5">
        <img src="{{ asset('front/img/aya.png') }}" alt="co">
     </section>
    
  </footer>
@endsection

@section('scripts')
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // تغيير صورة الفوتر بعد تحميل الصفحة
        let footerLogo = document.getElementById('footerLogo');
        if (footerLogo) {
            footerLogo.src = "{{ asset('front/img/logo.svg') }}";
        }
    });
</script> --}}

@endsection