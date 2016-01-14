
<?php
include_once "library/inc.connection.php";
?>
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
            Object.keys = Object.keys || function (o) {
                var result = [];
                for (var name in o) {
                    if (o.hasOwnProperty(name))
                        result.push(name);
                }
                return result;
            };

            jQuery(document).ready(function ($) {

                // send message
                var form = $(".sendMessageForm");
                $('.errorsmsg').hide();
                $('.suucessmsg').hide();

                form.on("submit", function (event) {
                    $(".loadingbtn").button('loading');

                    event.preventDefault();

                    $.ajax({
                        type: "POST",
                        url: form.attr('action'),
                        data: form.serialize(),
                        success: function (response) {
                            if (response == "success") {

                                $('.errorsmsg').slideUp();

                                $('.suucessmsg').slideDown();


                            } else {
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
                    zoomLevel = 12;
                }
                if (isNaN(centerlat)) {
                    centerlat = -6.903429;
                }
                if (isNaN(centerlng)) {
                    centerlng = 107.5030708;
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

                google.maps.event.addListenerOnce(map, 'tilesloaded', function () {

                    //don't start the animation until the marker image is loaded if there is one
                    if (markerImg.length > 0) {
                        var markerImgLoad = new Image();
                        markerImgLoad.src = markerImg;

                        $(markerImgLoad).load(function () {
                            setMarkers(map);
                        });
                    } else {
                        setMarkers(map);
                    }

                });


                function setMarkers(map) {
                    for (var i = 1; i <= Object.keys(map_data).length; i++) {

                        (function (i) {
                            setTimeout(function () {

                                var marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(map_data[i].lat, map_data[i].lng),
                                    map: map,
                                    infoWindowIndex: i - 1,
                                    animation: enableAnimation,
                                    icon: markerImg,
                                    optimized: false
                                });

                                setTimeout(function () {
                                    marker.setAnimation(null);
                                }, 1000);

                                //infowindows 
                                var infowindow = new google.maps.InfoWindow({
                                    content: map_data[i].mapinfo,
                                    maxWidth: 1000
                                });

                                infoWindows.push(infowindow);

                                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                    return function () {
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
                "1": {"lat": "-6.930695",
                    "lng": "107.609501",
                    "mapinfo": "Here is our location"},
            };
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
                <?php include 'menu.php'; ?>


                <!-- Page Info -->
                <div class="pageInfo">
                    <div class="cover"></div>
                    <div class="container">
                        <div class="row">

                            <div class="col-md-4">
                                <h2 class="pageTitle">Contact</h2>
                            </div><!-- end of col-md-4 -->

                            <div class="col-md-8">
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">contact</li>
                                </ol><!-- end of breadcrumb -->
                            </div><!-- end of col-md-8 -->

                        </div><!-- end of row -->
                    </div><!-- end of container -->
                </div><!-- end of page info -->


            </section><!-- end of Page Header -->


            <div class="googleMap" data-center-lat="-6.9277128" data-center-lng="107.5873565" data-enable-animation="5" data-enable-zoom="1" data-marker-img="images/map-pin.png" data-zoom-level="13" id="GoogleMap"></div><!-- end of google map -->



            <!-- departments -->
            <section class="departments section mainSection lightSection" id="departments">
                <div class="sectionWrapper">
                    <div class="container">


                        <div class="row">
                        <?php
                        $sqlselect = "select * FROM front_contact ORDER BY contact_id desc";
                        $data = mysql_query($sqlselect) or die("gagal");

                        while ($postRow = mysql_fetch_array($data)) {
                            $id = $postRow['contact_id'];
                         ?>
                            <div class="col-md-4">
                                <div class="department">
                                    <h5 class="departHeader"><?php echo $postRow['kategori']; ?></h5><!-- end of depart header -->
                                    <div class="departBody">

                                        <p class="emailAccount">
                                            <span class="title">Contact Accounts :</span>
                                            
                                            Email Account : <a href="mailto:Sales@7host.com"><?php echo $postRow['email']; ?></a><br>
                                            Telephone No : <a href="#"><?php echo $postRow['phone']; ?></a><br /><br />
                                            
                                            <?php echo $postRow['keterangan']; ?></p>

                                       

                                    </div><!-- end of depart body -->
                                </div><!-- end of department -->
                            </div><!-- end of col-md-4 -->


                        <?php } ?>


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

                                        <p>Duis dapibus aliquam mi, eget euismod sem scelerisque ut. Vivamus 
                                            at elit quis urna adipiscing iaculis. Curabitur vitae velit in 
                                            neque dictum blandit. Proin in iaculis neque. Pellentesque habitant 
                                            morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
                                            Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque. 
                                            Pellentesque habitant morbi tristique senectus et netus et malesuada 
                                            fames ac turpis egestas. 
                                        </p>

                                        <!-- start success message  -->

                                        <!-- end error message -->

                                        <div class="sendMessage add-send clearfix">

                                            <form method="post" action="sendmail.php" enctype="multipart/form-data" >
                                                <ul class="row clearfix">
                                                    <li class="col-md-6"><input type="text" name="txtnama" class="name"></li>
                                                    <li class="col-md-6"><input type="email" name="txtemail" class="email"></li>
                                                    <li class="col-md-6"><input type="text" name="txtphone" class="phone"></li>
                                                    <li class="col-md-6"><input type="text" name="txtsubject" class="subject"></li>
                                                    <li class="col-md-12"><textarea name="txtpesan"></textarea></li>
                                                </ul>
                                                <button type="submit" name="submit">Send </button>
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
            <?php include 'footer.php'; ?>
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
