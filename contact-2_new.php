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
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript" src="js/infobox.js"></script>

        <script>

            function initialize() {

                //add map, the type of map
                var map = new google.maps.Map(document.getElementById('GoogleMap'), {
                    zoom: 5,
                    center: new google.maps.LatLng(-0.664934, 118.302096),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                //add locations
                var locations = [
<?php
if (isset($_POST["inpCkb"]) !== false) {
    $sql = 'SELECT * FROM m_aset WHERE id_kat_aset = 302 ';
    if (isset($_POST["inpCkb"]) !== false) {
        $arrCk = $_POST["inpCkb"];
        for ($i = 0; $i < count($arrCk); $i++) {
            if ($i == 0) {
                $sql .= ' AND peruntukan = "' . $arrCk[$i] . '" ';
            } else {
                $sql .= ' OR peruntukan = "' . $arrCk[$i] . '" ';
            }
        }
    }
    $mySql = mysql_query($sql) or die();
    $txt = '';
    $x = 1;
    while ($p = mysql_fetch_array($mySql)) {
        $gbr = '';
        switch ($p['peruntukan']) {
            case 'KP':
                $gbr = 'pin/mm_20_blue.png';
                break;
            case 'KW':
                $gbr = 'pin/mm_20_green.png';
                break;
            case 'KPRK':
                $gbr = 'pin/mm_20_orange.png';
                break;
            case 'KPCDK':
                $gbr = 'pin/mm_20_gray.png';
                break;
            case 'KPCRK':
                $gbr = 'pin/mm_20_gray_dark.png';
                break;
            default:
                $gbr = 'pin/mm_20_red.png';
                break;
        }
        $txt .= ',["' . $p['nama_aset'] . '", ' . $p['lat'] . ', ' . $p['longitud'] . ', "' . $gbr . '"]';
        $x++;
    }
    echo substr($txt, 1);
}
?>
//                    ['San Francisco: Power Outage', 37.7749295, -122.4194155, 'http://labs.google.com/ridefinder/images/mm_20_purple.png'],
//                    ['Sausalito', 37.8590937, -122.4852507, 'http://labs.google.com/ridefinder/images/mm_20_red.png'],
//                    ['Sacramento', 38.5815719, -121.4943996, 'http://labs.google.com/ridefinder/images/mm_20_green.png'],
//                    ['Soledad', 36.424687, -121.3263187, 'http://labs.google.com/ridefinder/images/mm_20_blue.png'],
//                    ['Shingletown', 40.4923784, -121.8891586, 'http://labs.google.com/ridefinder/images/mm_20_yellow.png']
                ];


                //declare marker call it 'i'
                var marker, i;

                //declare infowindow
                var infowindow = new google.maps.InfoWindow();

                //add marker to each locations
                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                        icon: locations[i][3]
                    });

                    //click function to marker, pops up infowindow
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            }
            google.maps.event.addDomListener(window, 'load', initialize);

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
                                            <a href="contact-2_new.php">Peta</a>
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
                <!--                <div class="pageInfo">
                                    <div class="cover"></div>
                                    <div class="container">
                                        <div class="row">
                
                                            <div class="col-md-4">
                                                <h2 class="pageTitle">PETA ASSETS</h2>
                                            </div> end of col-md-4 
                
                                            <div class="col-md-8">
                                                <ol class="breadcrumb">
                                                    <li><a href="#">Home</a></li>
                                                    <li class="active">Peta Assets</li>
                                                </ol> end of breadcrumb 
                                            </div> end of col-md-8 
                
                                        </div> end of row 
                                    </div> end of container 
                                </div> end of page info -->


            </section><!-- end of Page Header -->

        </div><!-- end of all wrapper -->
        <div style="position: absolute; top: 92px; right: 20%; bottom: 0; left: 0;"
             id="GoogleMap">

        </div><!-- end of google map -->

        <!--<div style="padding: 10px;width: 240px;float:right;overflow: scroll">-->
        <div style="position: absolute; top: 92px; right: 0; bottom: 0; left: 80%;padding: 10px">
            <form action="contact-2_new.php" method="post">
                <?php
                for ($index = 0; $index < 100; $index++) {
//                    echo '<br>';
                }
                ?>     
                <label><strong>Parameter</strong></label><br><br>

                <input type="checkbox" name="inpCkb[]" id="KP" value="KP"
                <?php
                if (isset($_POST["inpCkb"])) {
                    if (in_array('KP', $arrCk)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }
                }
                ?>>
                <label for="KP">Kantor Pusat</label><br>
                <input type="checkbox" name="inpCkb[]" id="KW" value="KW"
                <?php
                if (isset($_POST["inpCkb"])) {
                    if (in_array('KW', $arrCk)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }
                }
                ?>>
                <label for="KW">Kantor Wilayah</label><br>
                <input type="checkbox" name="inpCkb[]" id="KW" value="KW"
                <?php
                if (isset($_POST["inpCkb"])) {
                    if (in_array('KW', $arrCk)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }
                }
                ?>>
                <label for="KPRK">KPRK</label><br>
                <input type="checkbox" name="inpCkb[]" id="KPRK" value="KPRK"
                <?php
                if (isset($_POST["inpCkb"])) {
                    if (in_array('KPRK', $arrCk)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }
                }
                ?>>
                <label for="KPRK">KPRK</label><br>
                <input type="checkbox" name="inpCkb[]" id="KPCDK" value="KPCDK"
                <?php
                if (isset($_POST["inpCkb"])) {
                    if (in_array('KPCDK', $arrCk)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }
                }
                ?>>
                <label for="KPCDK">KPCDK</label><br>
                <input type="checkbox" name="inpCkb[]" id="KPCLK" value="KPCLK"
                <?php
                if (isset($_POST["inpCkb"])) {
                    if (in_array('KPCLK', $arrCk)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }
                }
                ?>>
                <label for="KPCLK">KPCLK</label><br>   
                <input type="checkbox" name="inpCkb[]" id="MPC" value="MPC"
                <?php
                if (isset($_POST["inpCkb"])) {
                    if (in_array('MPC', $arrCk)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }
                }
                ?>>
                <label for="MPC">MPC</label><br> 
                <input type="checkbox" name="inpCkb[]" id="Lainya" value=""
                <?php
                if (isset($_POST["inpCkb"])) {
                    if (in_array('', $arrCk)) {
                        echo 'checked';
                    } else {
                        echo '';
                    }
                }
                ?>>
                <label for="Lainya">Lainya</label><br>
                <button class="generalBtn loginBtn btn-block" type="submit">Cari</button>
            </form>                           
            <?php // echo $sql; ?>
        </div>



        <!-- JavaScript Files ================================================== -->
        <script src="js/compiler.js" type="text/javascript"></script>
        <script src="js/scripts.js" type="text/javascript"></script>

        <!-- BootStrap JavaScript ================================================== -->
        <script src="js/bootstrap.js" type="text/javascript"></script>


        <!-- Switcher JavaScript ================================================== -->
        <script src="js/switcher.js" type="text/javascript"></script>
    </body>
</html>
