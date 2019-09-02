<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ;?></title>
    <!-- <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="js/jssor.slider-27.5.0.min.js" type="text/javascript"></script> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>tamplete_assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>tamplete_assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favocon.png"> 
    <link rel="icon" href="<?php echo site_url('assets/images/favicon.ico') ?>" type="image/gif">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.bootcss.com/tether/1.3.2/css/tether.min.css" rel="stylesheet">
<!-- for slider books -->
    <script type="text/javascript" src="<?php echo base_url();?>tamplete_assets/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>tamplete_assets/js/jssor.slider-27.5.0.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_options = {
              $AutoPlay: 1,
              $AutoPlaySteps: 5,
              $SlideDuration: 160,
              $SlideWidth: 200,
              $SlideSpacing: 5,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 5
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        });
    </script>
     <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 057 css*/
        .jssorb057 .i {position:absolute;cursor:pointer;}
        .jssorb057 .i .b {fill:none;stroke:#fff;stroke-width:2000;stroke-miterlimit:10;stroke-opacity:0.4;}
        .jssorb057 .i:hover .b {stroke-opacity:.7;}
        .jssorb057 .iav .b {stroke-opacity: 1;}
        .jssorb057 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 073 css*/
        .jssora073 {display:block;position:absolute;cursor:pointer;}
        .jssora073 .a {fill:#ddd;fill-opacity:.7;stroke:#000;stroke-width:160;stroke-miterlimit:10;stroke-opacity:.7;}
        .jssora073:hover {opacity:.8;}
        .jssora073.jssora073dn {opacity:.4;}
        .jssora073.jssora073ds {opacity:.3;pointer-events:none;}
    </style>
</head>
<body>
<div class="container">

	 
 <?php if ( $this->session->userdata('role')>0){?>

   <nav class="navbar navbar-expand-lg  bg-warning navbar-dark  fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    
    <ul class="nav justify-content-end ">
      <li class="nav-item">
    <a class="nav-link " href='<?php echo site_url('Mainindex');?>'>Home</a>
  </li>
 
  <li class="nav-item">
    <a class="nav-link" href='<?php echo site_url('Search/index');?>'>Buy Books</a>
  </li>
   <li class="nav-item">
  <a class="nav-link" href='<?php echo site_url('Admin')?>'>Dashboard</a>
   </li>
   <li  class="nav-item">
   <a class="nav-link"><?php echo  $this->session->userdata('name');?></a>
   </li>
  </ul>
</div>
<div>
 <form class="form-inline" action="<?php echo site_url('Search');?>" method = "post">
    <input class="form-control mr-sm-2"  name = "searchvalue" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
  </form>
 </div>
</nav>
  
  <?php } 
     else{?>
   <nav class="navbar navbar-expand-lg  bg-primary navbar-dark  fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item">
    <a class="nav-link " href='<?php echo site_url('Mainindex');?>'>Home</a>
  </li>
  

  <li class="nav-item">
  <a class="nav-link " href='<?php echo site_url('Register');?>'>Sell Books</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href='<?php echo site_url('Admin');?>'>Login</a>
  </li>
  <li class="nav-item">
  <a class="nav-link " href='<?php echo site_url('Register');?>'>Register</a>
  </li>

  </ul>
 
  
  </div>
 <div>
 <form class="form-inline" action="<?php echo site_url('Search');?>" method = "post">
    <input class="form-control mr-sm-2"  name = "searchvalue" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
  </form>
 </div>
</nav>
    <?php } ?>
 

      
