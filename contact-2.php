<!DOCTYPE html>
<!--[if lt IE 7]>
  <html class="no-js IE lt-ie9 lt-ie8 lt-ie7"></html>
<![endif]-->
<!--[if IE 7]>
  <html class="no-js IE lt-ie9 lt-ie8"></html>
<![endif]-->
<!--[if IE 8]>
  <html class="no-js IE lt-ie9"></html>
<![endif]-->
<!--[if gt IE 8]>
  <html class="no-js IE gt-ie8"></html>
<![endif]-->
<!--[if !IE]><!-->
<html class="no-js">
    <!--<![endif]-->
    <?php
    include "inc.connection.php";
    ?>
    <head>

        <!-- title -->
        <title>SIMA POS Indonesia</title>

        <!-- meta tags -->
        <meta charset="utf-8">
        <meta content="width=device-width,initial-scale=1,maximum-scale=1" name="viewport">
        <meta content="HTML Tidy for Linux (vers 25 March 2009), see www.w3.org" name="generator">
        <meta content="Mahmoud Bayomy" name="author">
        <meta content="Here is the whole descrption of the website" name="description">

        <!-- fav icon -->
        <link href="images/favicon.png" rel="shortcut icon">

        <!-- css => style sheet -->
        <link href="style.css" media="screen" rel="stylesheet" type="text/css">
        <!-- css => responsive sheet -->
        <link href="css/responsive.css" media="screen" rel="stylesheet" type="text/css">

        <!-- JQuery => javascript libs -->
        <script src="js/jquery.js" type="text/javascript"></script>
        <!-- online JQuery libs -->
        <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->

        <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


        <!--[if lt IE 9]><!-->
        <!-- css for ie -->
        <link href="css/ie.css" media="screen" rel="stylesheet" type="text/css">
        <!--<![endif]-->

        <!-- google maps -->
        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <script type="text/javascript">
            //--google maps--
            Object.keys = Object.keys || function(o) {
                var result = [];
                for (var name in o) {
                    if (o.hasOwnProperty(name))
                        result.push(name);
                }
                return result;
            };

            jQuery(document).ready(function($) {

                // send message
                var form = $(".sendMessageForm");
                $('.errorsmsg').hide();
                $('.suucessmsg').hide();

                form.on("submit", function(event) {
                    $(".loadingbtn").button('loading');

                    event.preventDefault();

                    $.ajax({
                        type: "POST",
                        url: form.attr('action'),
                        data: form.serialize(),
                        success: function(response) {
                            if (response == "success") {
                                $('.errorsmsg').slideUp();
                                $('.suucessmsg').slideDown();
                            }
                            else {
                                $('.suucessmsg').slideUp();
                                $('.errorsmsg').slideDown();
                            }
                            console.log(response);
                            $(".loadingbtn").button('reset');
                        }
                    });
                });

                var zoomLevel = parseFloat($('#GoogleMap').attr('data-zoom-level'));
                var centerlat = parseFloat($('#GoogleMap').attr('data-center-lat'));
                var centerlng = parseFloat($('#GoogleMap').attr('data-center-lng'));
                var markerImg = $('#GoogleMap').attr('data-marker-img');
                var enableZoom = $('#GoogleMap').attr('data-enable-zoom');
                var enableAnimation = $('#GoogleMap').attr('data-enable-animation');
                var animationDelay = 0;

                if (isNaN(zoomLevel)) {
                    zoomLevel = 5;
                }
                if (isNaN(centerlat)) {
                    centerlat = -0.664934;
                }
                if (isNaN(centerlng)) {
                    centerlng = 118.302096;
                }
                if (typeof enableAnimation != 'undefined' && enableAnimation == 1 && $(window).width() > 690) {
                    animationDelay = 180;
                    enableAnimation = google.maps.Animation.BOUNCE
                } else {
                    enableAnimation = null;
                }

                var latLng = new google.maps.LatLng(centerlat, centerlng);

                var mapOptions = {
                    center: latLng,
                    zoom: zoomLevel,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false,
                    panControl: false,
                    zoomControl: enableZoom,
                    zoomControlOptions: {
                        style: google.maps.ZoomControlStyle.LARGE,
                        position: google.maps.ControlPosition.LEFT_CENTER
                    },
                    mapTypeControl: false,
                    scaleControl: false,
                    streetViewControl: false

                };

                var map = new google.maps.Map(document.getElementById("GoogleMap"), mapOptions);
                var infoWindows = [];
                google.maps.event.addListenerOnce(map, 'tilesloaded', function() {
                    //don't start the animation until the marker image is loaded if there is one
                    setMarkers(map);
                });

                function setMarkers(map) {
                    for (var i = 1; i <= Object.keys(map_data).length; i++) {
                        var markerImgLoad = new Image();
                        markerImgLoad.src = markerImg;
                        (function(i) {
                            setTimeout(function() {
                                var marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(map_data[i].lat, map_data[i].lng),
                                    map: map,
                                    infoWindowIndex: i - 1,
                                    animation: enableAnimation,
                                    icon: markerImg,
                                    optimized: false
                                });
                                setTimeout(function() {
                                    marker.setAnimation(null);
                                }, 1000);
                                //infowindows 
                                var infowindow = new google.maps.InfoWindow({
                                    content: map_data[i].mapinfo,
                                    maxWidth: 1000
                                });
                                infoWindows.push(infowindow);
                                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                    return function() {
                                        infoWindows[this.infoWindowIndex].open(map, this);
                                    }

                                })(marker, i));
                            }, i * animationDelay);
                        }(i));
                    }//end for loop
                }//setMarker

            });
            /* <![CDATA[ */
            var map_data = {
            <?php
            $sql = 'SELECT * FROM lokasi_copy WHERE 1 = 1';
            if (isset($_POST["inpCkb"]) !== false) {
                $arrCk = $_POST["inpCkb"];
                for ($i = 0; $i < count($arrCk); $i++) {
                    if ($i == 0) {
                        $sql .= ' AND unit_kerja like "' . $arrCk[$i] . ' %" ';
                    } else {
                        $sql .= ' OR unit_kerja like "' . $arrCk[$i] . ' %" ';
                    }
                }
            }
            $mySql = mysql_query($sql) or die();
            $txt = '';
            $x = 1;
            while ($p = mysql_fetch_array($mySql)) {
                $txt .= ',"' . $x . '":{"lat":"' . $p['lat'] . '", "lng":"' . $p['lon'] . '", "mapinfo":"' . $p['unit_kerja'] . '", "icon":"images/' . $p['gambar'] . '"}';
                $x++;
            }
            echo substr($txt, 1);
            ?>
                //"1":{"lat":"-6.930695", "lng":"107.609501", "mapinfo":"Here is our location"},
                //"2":{"lat":"-6.947057", "lng":"107.599914", "mapinfo":"Here is our location"},
                //"3":{"lat":"-6.913998", "lng":"107.694499", "mapinfo":"Here is our location"},
            //};
            /* ]]> */

        </script>

    </head>

    <body id="top" class="page">

        <!--[if lt IE 9]>
          <p class="browsehappy">
            You are using an
            <strong>outdated</strong>
            browser. Please
            <a href="http://browsehappy.com/">upgrade your browser</a>
            to improve your experience.
          </p>
        <![endif]-->

        <div class="loadingContainer">
            <div class="loading">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div><!-- end of loading -->
        </div><!-- end of loading container -->


        <div class="allWrapper">

            <!-- Page Header -->
            <section class="pageHeader section mainSection scrollAnchor darkSection" id="pageHeader">


                <!-- Header -->
                <header class="header headerStyle1 style-1" id="header">
                    <div class="sticky scrollHeaderWrapper">
                        <div class="container">
                            <div class="row">

                                <div class="logoWrapper">
                                    <h1 class="logo">
                                        <a class="clearfix" href="home-2.html" title="SIMA POS">
                                            <span class="square">
                                                <span><img  src="images/favicon.png" ></span>
                                            </span>
                                            <span class="text">SIMA POS</span>
                                        </a>
                                    </h1><!-- end of logo -->
                                </div><!-- end of logoWrapper -->

                                <nav class="mainMenu mainNav" id="mainNav">
                                    <ul class="navTabs">
                                        <li>
                                            <a href="index.php" class="">Home</a>
                                        </li>
                                        <li>
                                            <a href="post_list.php">Berita</a>
                                        </li>
                                        <li>
                                            <a href="gallery.php">Gallery</a>
                                        </li>

                                        <li>
                                            <a href="about.php">About</a>
                                        </li>
                                        <li>
                                            <a href="contact.php">Contact</a>
                                        </li>
                                        <li>
                                            <a href="contact-2.php">Peta</a>
                                        </li>
                                        <li class="login formTop">
                                            <button class="formSwitcher"  data-toggle="modal" data-target="#loginModal">Login</button>
                                            <div class="modal loginModal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="container">
                                                    <ol class="formWrapper loginFormWrapper" id="loginFormWrapper">
                                                        <li><h5><i class="fa fa-user"></i>Login Area</h5></li>
                                                        <li>
                                                            <form class="loginForm" method="POST">
                                                                <input class="loginName" id="loginName" name="loginName" placeholder="Username" type="text">
                                                                <input class="loginPassword" id="loginPassword" name="loginPassword" placeholder="Password" type="password">
                                                                <input type="checkbox" name="remember" id="remember">
                                                                <label for="remember">Remember Me</label>
                                                                <button class="generalBtn loginBtn" type="submit">Login</button>
                                                            </form>
                                                        </li>
                                                        <li class="register"><p><a href="register.html">Create A new Account</a></p></li>
                                                    </ol>
                                                </div><!-- end of container -->
                                            </div><!-- end of modal -->
                                            <a href="login.html">Login</a>
                                        </li>
                                    </ul><!-- end of nav tabs -->
                                </nav><!-- end of main nav -->

                                <a href="#" class="generalLink" id="responsiveMainNavToggler"><i class="fa fa-bars"></i></a>
                                <div class="clearfix"></div><!-- end of clearfix -->
                                <div class="responsiveMainNav"></div><!-- end of responsive main nav -->

                            </div><!-- end of row -->
                        </div><!-- end of container -->
                    </div><!-- end of sticky -->
                </header><!-- end of header -->


                <!-- Page Info -->
                <div class="pageInfo">
                    <div class="cover"></div>
                    <div class="container">
                        <div class="row">

                            <div class="col-md-4">
                                <h2 class="pageTitle">PETA ASSETS</h2>
                            </div><!-- end of col-md-4 -->

                            <div class="col-md-8">
                                <ol class="breadcrumb">
                                    <li><a href="#">Home</a></li>
                                    <li class="active">Peta Assets</li>
                                </ol><!-- end of breadcrumb -->
                            </div><!-- end of col-md-8 -->

                        </div><!-- end of row -->
                    </div><!-- end of container -->
                </div><!-- end of page info -->


            </section><!-- end of Page Header -->


            <div class="googleMap" 
                 data-enable-animation="5" 
                 data-enable-zoom="1"

                 id="GoogleMap"></div><!-- end of google map -->

            <section>
                <div class="sectionWrapper">
                    <div class="container">
                        <div class="row text-center">
                            <form action="contact-2.php" method="post">
                                <input type="checkbox" name="inpCkb[]" id="KP" value="KP"
                                       <?php if (isset($_POST["inpCkb"])) {
                                           if (in_array('KP', $arrCk)) {
                                               echo 'checked';
                                           } else {
                                               echo '';
                                           }
                                       } ?>>
                                <label for="KP">KP</label>
                                <input type="checkbox" name="inpCkb[]" id="KPC" value="KPC"
                                       <?php if (isset($_POST["inpCkb"])) {
                                           if (in_array('KPC', $arrCk)) {
                                               echo 'checked';
                                           } else {
                                               echo '';
                                           }
                                       } ?>>
                                <label for="KPC">KPC</label>
                                <input type="checkbox" name="inpCkb[]" id="RMD" value="RMD"
<?php if (isset($_POST["inpCkb"])) {
    if (in_array('RMD', $arrCk)) {
        echo 'checked';
    } else {
        echo '';
    }
} ?>>
                                <label for="RMD">RMD</label>
                                <input type="checkbox" name="inpCkb[]" id="RUKO" value="RUKO"
<?php if (isset($_POST["inpCkb"])) {
    if (in_array('RUKO', $arrCk)) {
        echo 'checked';
    } else {
        echo '';
    }
} ?>>
                                <label for="RUKO">RUKO</label>
                                <input type="checkbox" name="inpCkb[]" id="TAKOS" value="TAKOS"
<?php if (isset($_POST["inpCkb"])) {
    if (in_array('TAKOS', $arrCk)) {
        echo 'checked';
    } else {
        echo '';
    }
} ?>>
                                <label for="TAKOS">TAKOS</label>
                                <button class="generalBtn loginBtn" type="submit">Cari</button>
                            </form>                           
<?php echo $sql; ?>
                        </div>
                    </div>
            </section>



            <!-- departments -->
            <section class="departments section mainSection lightSection" id="departments">
                <div class="sectionWrapper">
                    <div class="container">


                        <div class="row">

                            <div class="col-md-4">
                                <div class="department">
                                    <h5 class="departHeader">Assets Department</h5><!-- end of depart header -->
                                    <div class="departBody">

                                        <p class="emailAccount">
                                            <span class="title">Email Accounts :</span>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis.<br />
                                            Email Account : <a href="mailto:Sales@7host.com">assets@pos.com</a>
                                        </p>

                                        <p class="phoneNum">
                                            <span class="title">Phone Numbers :</span>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis.<br />
                                            Telephone No : <a href="tele:00201065370701">002 01065370701</a>
                                        </p>

                                    </div><!-- end of depart body -->
                                </div><!-- end of department -->
                            </div><!-- end of col-md-4 -->

                            <div class="col-md-4">
                                <div class="department">
                                    <h5 class="departHeader">Support Department</h5><!-- end of depart header -->
                                    <div class="departBody">

                                        <p class="emailAccount">
                                            <span class="title">Email Accounts :</span>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis.<br />
                                            Email Account : <a href="mailto:Sales@7host.com">Support@pos.com</a>
                                        </p>

                                        <p class="phoneNum">
                                            <span class="title">Phone Numbers :</span>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis.<br />
                                            Telephone No : <a href="tele:00201065370701">002 01065370701</a>
                                        </p>

                                    </div><!-- end of depart body -->
                                </div><!-- end of department -->
                            </div><!-- end of col-md-4 -->

                            <div class="col-md-4">
                                <div class="department">
                                    <h5 class="departHeader">Mutasi Department</h5><!-- end of depart header -->
                                    <div class="departBody">

                                        <p class="emailAccount">
                                            <span class="title">Email Accounts :</span>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis.<br />
                                            Email Account : <a href="mailto:Sales@7host.com">mutasi@pos.com</a>
                                        </p>

                                        <p class="phoneNum">
                                            <span class="title">Phone Numbers :</span>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis.<br />
                                            Telephone No : <a href="tele:00201065370701">002 01065370701</a>
                                        </p>

                                    </div><!-- end of depart body -->
                                </div><!-- end of department -->
                            </div><!-- end of col-md-4 -->

                        </div><!-- end of row -->
                    </div><!-- end of container -->
                </div><!-- end of section wrapper -->
            </section><!-- end departments section -->



            <!-- contact -->
            <section class="contact section mainSection scrollAnchor lightSection" id="contact">
                <div class="sectionWrapper">
                    <div class="container">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="department">
                                    <h5 class="departHeader">Send Email</h5><!-- end of depart header -->

                                    <div class="departBody clearfix">

                                        <p>Duis dapibus aliquam mi, eget euismod sem scelerisque ut. Vivamus at elit quis urna adipiscing iaculis. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>

                                        <!-- start success message  -->

                                        <div class="col-md-12 alertWrapper suucessmsg">

                                            <div class="alert alert-success" role="alert">
                                                <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

                                                <div class="alertContents clearfix">
                                                    <i class="animated alertIcon fa fa-check"></i>
                                                    <span class="alertDetails">Your message has been sent successfully</span>
                                                </div><!-- end of alert contents -->

                                            </div><!-- end of alert -->

                                        </div><!-- end of alertWrapper -->

                                        <!-- end success message -->


                                        <!-- start error message  -->
                                        <div class="col-md-12 alertWrapper errorsmsg">

                                            <div class="alert alert-error" role="alert">
                                                <button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

                                                <div class="alertContents clearfix">
                                                    <i class="animated alertIcon fa fa-close"></i>
                                                    <span class="alertDetails">An error occurred please try again later</span>
                                                </div><!-- end of alert contents -->

                                            </div><!-- end of alert -->

                                        </div><!-- end of alertWrapper -->

                                        <!-- end error message -->

                                        <div class="sendMessage add-send clearfix">

                                            <form method="POST" action="sendmail.php" class="sendMessageForm clearfix">
                                                <ul class="row clearfix">
                                                    <li class="col-md-6"><input type="text" value="Your Name" onblur="if (this.value == '')
                                                                this.value = 'Your Name'" onfocus="if (this.value == 'Your Name')
                                                                            this.value = ''" name="name" id="name" class="name"></li>
                                                    <li class="col-md-6"><input type="email" value="Email" onblur="if (this.value == '')
                                                                this.value = 'Email'" onfocus="if (this.value == 'Email')
                                                                            this.value = ''" name="email" id="email" class="email"></li>
                                                    <li class="col-md-6"><input type="text" value="Phone" onblur="if (this.value == '')
                                                                this.value = 'Phone'" onfocus="if (this.value == 'Phone')
                                                                            this.value = ''" name="phone" id="phone" class="phone"></li>
                                                    <li class="col-md-6"><input type="text" value="Subject" onblur="if (this.value == '')
                                                                this.value = 'Subject'" onfocus="if (this.value == 'Subject')
                                                                            this.value = ''" name="subject" id="subject" class="subject"></li>
                                                    <li class="col-md-12"><textarea name="message" id="messageArea"></textarea></li>
                                                </ul>
                                                <button type="submit" class="loadingbtn"  data-loading-text="Sending Your Message .... ">&nbsp;&nbsp;&nbsp;&nbsp; Send &nbsp;&nbsp;&nbsp;&nbsp; </button>
                                            </form><!-- end of send Message form -->
                                        </div><!-- end of send Message -->

                                    </div><!-- end of widget body -->

                                </div><!-- end of widget -->

                            </div><!-- end of col-md-8 -->

                        </div>

                    </div><!-- end of container -->
                </div><!-- end of section wrapper -->
            </section><!-- end contact section -->




            <!-- Footer -->
            <footer class="footer" id="footer">

                <!-- Top Footer -->
                <div class="topFooter">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-8 footerWidget footerBox">
                                <h5 class="footerWidgetHeader">About POS INDONESIA</h5><!-- end of footer widget header -->
                                <p class="footerAboutContent footerText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis.</p>
                                <div class="aboutLinks clearfix">
                                </div><!-- end of about links -->
                            </div><!-- end of footer widget -->


                            <div class="col-md-4 footerWidget footerBox">
                                <h5 class="footerWidgetHeader">Sign In</h5>
                                <ul class="getInTouchList">
                                    <li>
                                        <span class="head">Username :</span>
                                        <span class="text"><input type="text" class="input-group"></span>
                                    </li>
                                    <li>
                                        <span class="head">Password :</span>
                                        <span class="text"><input type="password" class="input-group"></span>
                                    </li>
                                    <li>
                                        <span class="head"><a class="generalLink orderNow" href="#" title="Login">Login</a></span>
                                    </li>
                                </ul><!-- end of get In Touch List -->
                            </div><!-- end of footer widget -->

                        </div><!-- end of row -->
                    </div><!-- end of container -->
                </div><!-- end of top footer -->

                <!-- Bottom Footer -->
                <div class="bottomFooter">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-6 copyrights">
                                <p>All Rights Reserved &copy; POS INDONESIA  |  Build By <a href="#">Studio IT</a></p>
                                <ul class="terms clearfix">
                                    <li><a href="#" title="Terms of Use">Terms of Use</a></li>
                                    <li><a href="#" title="Privacy Policy">Privacy Policy</a></li>
                                    <li><a href="#" title="Money Back Guarantee">Money Back Guarantee</a></li>
                                </ul><!-- end of terms -->
                            </div><!-- end of copyrights -->

                            <div class="col-md-6 footerSocial">
                                <div class="footerSocialWrapper">

                                    <ul class="bottomSocial socialNav">
                                        <li class="facebook"><a href="#"><i class="animated fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="animated fa fa-twitter"></i></a></li>
                                        <li class="rss"><a href="#"><i class="animated fa fa-rss"></i></a></li>
                                    </ul><!-- end of bottom social -->

                                </div><!-- end of footer social wrapper -->
                            </div><!-- end of footer social -->
                        </div><!-- end of row -->
                    </div><!-- end of container -->
                </div><!-- end of bottom footer -->
            </footer><!-- end of footer -->


        </div><!-- end of all wrapper -->



        <!-- JavaScript Files ================================================== -->
        <script src="js/compiler.js" type="text/javascript"></script>
        <script src="js/scripts.js" type="text/javascript"></script>

        <!-- BootStrap JavaScript ================================================== -->
        <script src="js/bootstrap.js" type="text/javascript"></script>


        <!-- Switcher JavaScript ================================================== -->
        <script src="js/switcher.js" type="text/javascript"></script>
    </body>
</html>
