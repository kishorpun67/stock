<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="{{asset('front/images/favicon.png')}}" type="image/x-icon">
<title>Burger house | Home</title>
<link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/fontawesome-free-6.0.0-web/css/fontawesome.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/fontawesome-free-6.0.0-web/css/solid.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/fontawesome-free-6.0.0-web/css/regular.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/fontawesome-free-6.0.0-web/css/brands.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/font-awesome-4.7.0/css/font-awesome-4.7.0.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/fonts.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('front/css/animate.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap-touch-slider.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{asset('front/lightbox/css/lightbox.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/css/owl.carouselv2.3.4.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('front/css/reset.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('front/css/side_nav.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('front/css/navbar.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('front/css/responsive.css')}}" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400&display=swap" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<div class="container">
  <figure class="logo_holder"><a href="index.html"> <img src="{{asset('front/images/istockphoto-1156053620-612x612.jpg')}}" alt="This is web logo"> </a> </figure>
  <div class="title_bar my-3">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Management</a></li>
      <li><a href="#">Services</a></li>
    </ul>
  </div>
  
  <!--<div class="contact_info">
    <address>
    <figure class="icon"> <i class="fa-solid fa-globe"></i> </figure>
    <div class="details">
      <h4 class="contact_title">Address</h4>
      <span>Burger House <br>
      Bhaktapur</span> </div>
    </address>
    <address>
    <figure class="icon"> <i class="fa-solid fa-phone" aria-hidden="true"></i></figure>
    <div class="details">
      <h4 class="contact_title">Phone</h4>
      <span><a href="tel:#" class="call">9812345678</a></span> </div>
    </address>
    <address>
    <figure class="icon"> <i class="fa-solid fa-envelope" aria-hidden="true"></i> </figure>
    <div class="details">
      <h4 class="contact_title">Email</h4>
      <a href="mailto:#" class="email">info@demomail.com</a> </div>
    </address>
  </div>-->
  
  
  <div class="contact_info">
    <address>
   
    <div class="details">
    
      <span>Burger House <br>
      Bhaktapur</span> </div>
    </address>
     
     
  </div>
  
  
  
  
  <div class="button-bar center">
    <h2 class="sub-title">Select</h2>
    <ul>
      <li><a href="{{route('admin.food','room')}}" class="btn room-btn">Room</a></li>
      <li><a href="{{route('admin.food',"table")}}" class="btn table-btn">Table</a></li>
    </ul>
  </div>
</div>
<footer class="footer mt-5">
  <div class="copyright">
    <div class="container">
      <p class="lft">© <script type="text/javascript" language="javascript">var date = new Date(); document.write(date.getFullYear());</script> All Rights Reserved.</p>
      <div class="footer-social-icons">
        <ul>
          <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i> </a></li>
          <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i> </a></li>
          <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
        </ul>
      </div>
      <p class="rht"> Powered by: <a href="https://rarasoft.business.site/" target="_blank" class="company_link" collator_asort="">&nbsp;Rara Soft Pvt. Ltd</a> </p>
    </div>
  </div>
</footer>
<section class="back_top"><!--//back to top scroll-->
  <div class="container">
    <div id="back-top" style="display: block;"> <a href="#top" title="Go to top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
  </div>
</section>
<!--//back to top scroll--> 

<script type="text/javascript" src="{{asset('front/js/jquery-1.9.1.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('front/js/owl.carouselv2.3.4.js')}}"></script> 
<script type="text/javascript" src="{{asset('front/js/fixed-nav.js')}}"></script> 
<script type="text/javascript" src="{{asset('front/js/jquery.js')}}"></script> 
<script type="text/javascript" src="{{asset('front/js/bootstrap.js')}}"></script> 
<script type="text/javascript" src="{{asset('front/js/Push_up_jquery.js')}}"></script> 
<script type="text/javascript" src="{{asset('front/js/annimatable_jquery.js')}}"></script>
</body>
</html>
