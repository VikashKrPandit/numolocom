<?php 
require("admin/include/conn.php");

// get app details
$appDetQuery   = $conn->query("select * from tbl_app_details where id=1"); 
$appDetRes = $appDetQuery->fetch_assoc();

?>
<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title><?php echo $appDetRes['app_name']; ?> - Play Lottery Online | Win Real Cash</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- favicon -->		
		<link rel="icon" type="image/x-icon" href="admin/<?php echo $appDetRes['favicon']; ?>">
        <!-- <link rel="icon" href="images/favicon.png" type="image/x-icon"> -->
		<!-- all css here -->

		<!-- bootstrap v3.3.6 css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- owl.carousel css -->
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/owl.transitions.css">
       <!-- Animate css -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- meanmenu css -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- font-awesome css -->
		<link rel="stylesheet" href="css/themify-icons.css">
		<!-- magnific css -->
        <link rel="stylesheet" href="css/magnific.min.css">
		<!-- style css -->
		<link rel="stylesheet" href="css/style.css">
		<!-- responsive css -->
		<link rel="stylesheet" href="css/responsive.css">

		<!-- modernizr css -->
		<script src="js/vendor/modernizr-2.8.3.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <style type="text/css">
            .logo-text{
                padding-top: 7px;
                font-size: 1.4em;
                text-transform: uppercase;
            }
            .logo-text-mobile{
                padding-top: 7px;
                font-size: 1em;
                text-transform: uppercase;
            }
            #mybutton {
              position: fixed;
              bottom: 8px;
              right: 10px;
              z-index: 1;
            }
            @media only screen and (max-width: 600px) {
                #scrollUp {
                    display: none!important;
                }
                #mybutton {
                  position: fixed;
                  bottom: 8px;
                  right: 10px;
                  z-index: 1;
                  display: flex;
                  justify-content: center;
                  flex-wrap: wrap;
                  width: 100%;
                }
            }
            @media only screen and (min-width: 1026px) {
                #mybutton {
                    display: none;
                }
            }
            .counter-img
            {
                width: 70px;
                padding-bottom: 10px;
            }
            .counter-text
            {
                font-size: 1.2em;
            }
            .m-2
            {
                padding: 10px !important;
            }
        </style>
	</head>
		<body>

		<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

        <div id="preloader"></div>
        <header class="header-one">
            <!-- Start top bar -->
            <!-- <div class="topbar-area">
                <div class="container">
                    <div class="row">
                        <div class=" col-md-8 col-sm-8 col-xs-12">
                            <div class="topbar-left">
                                <ul>
                                   <li><a href="#"><i class="fa fa-clock-o"></i> Live support</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> info@gmail.com</a></li> 
                                </ul>  
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="topbar-right">
								<ul>
                                    <li><a href="#"><img src="img/icon/w1.png" alt="">English</a>
                                       <ul>
                                           <li><a href="#"><img src="img/icon/w2.png" alt="">Deutsch</a>
                                           <li><a href="#"><img src="img/icon/w3.png" alt="">Español</a>
                                           <li><a href="#"><img src="img/icon/w4.png" alt="">Français</a>
                                           <li><a href="#"><img src="img/icon/w5.png" alt="">العربية</a>
                                       </ul>
                                    </li>
                                    <li><a href="#"><img src="img/icon/login.png" alt="">Login</a>
                                </ul>
							</div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- End top bar -->
            <!-- header-area start -->
            <div id="sticker" class="header-area hidden-xs">
                <div class="container">
                    <div class="row">
                        <!-- logo start -->
                        <div class="col-md-3 col-sm-3">
                            <div class="logo">
                                <!-- Brand -->
                                <a class="navbar-brand " href="/">
                                    <img src="admin/<?php echo $appDetRes['logo']; ?>" width="180" alt="<?php echo $appDetRes['app_name']; ?>">
                                    <!--<h3 class="logo-text"><?php // echo $appDetRes['app_name']; ?></h3>-->
                                </a>
                            </div>
                            <!-- logo end -->
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <div class="header-right-link">
                                <!-- search option end -->
								<a class="s-menu" href="megalotto.apk" download>Download</a>
                            </div>
                            <!-- mainmenu start -->
                            <nav class="navbar navbar-default">
                                <div class="collapse navbar-collapse" id="navbar-example">
                                    <div class="main-menu">
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a class="pages" href="/">Home</a>
                                            </li>
                                            <!--<li><a class="pages" href="#about">About</a></li>-->
                                            <li><a href="/#faq">Faq</a></li>
                                            <li><a href="/#contact">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!-- mainmenu end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-area end -->
            <!-- mobile-menu-area start -->
            <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <div class="logo">
                                    <a href="/"><img src="admin/<?php echo $appDetRes['logo']; ?>" alt="<?php echo $appDetRes['app_name']; ?>" /> 
                                        <!-- <h3 class="logo-text-mobile"><?php //echo $appDetRes['app_name']; ?></h3> -->
                                    </a>
                                </div>
                                <nav id="dropdown">
                                    <ul>
                                        <li><a class="pages" href="/">Home</a>
                                            </li>
                                            <!--<li><a class="pages" href="#about">About</a></li>-->
                                            <li><a href="#faq">Faq</a></li>
                                            <li><a href="#contact">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>					
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area end -->		
        </header>