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
<?php
include_once "library/inc.connection.php";
?>
<html class="no-js">
    <!--<![endif]-->

    <head>

        <!-- title -->
        <title>About Us | POS INDONESIA</title>

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
                <?php include 'menu.php'; ?>


                <!-- Page Info -->
                <div class="pageInfo">
                    <div class="cover"></div>
                    <div class="container">
                        <div class="row">

                            <div class="col-md-4">
                                <h2 class="pageTitle">About Us</h2>
                            </div><!-- end of col-md-4 -->

                            <div class="col-md-8">
                                <ol class="breadcrumb">
                                    <li><a href="#">Home</a></li>
                                    <li class="active">About Us</li>
                                </ol><!-- end of breadcrumb -->
                            </div><!-- end of col-md-8 -->

                        </div><!-- end of row -->
                    </div><!-- end of container -->
                </div><!-- end of page info -->


            </section><!-- end of Page Header -->


            <!-- Introduction -->
            <section class="introduction introduction2 section mainSection scrollAnchor lightSection" id="introduction">
                <div class="sectionWrapper">
                    <div class="container">

                        <div class="row">
                            <?php
                            $sqlselect = "select * FROM front_about ORDER BY about_id";
                            $data = mysql_query($sqlselect) or die("gagal");
                            $row = mysql_fetch_array($data);
                            $id = $row['about_id'];
                            ?>
                            <div class="col-md-12 sectionTitle">
                                <h2 class="sectionHeader">
                                    All You Want To Know About POS INDONESIA
                                    <span class="generalBorder"></span>
                                </h2><!-- end of sectionHeader -->                
                                <p><?php echo $row['tag']; ?></p>
                            </div><!-- end of section title -->

                        </div><!-- end of row -->

                        <div class="row wideBlog">

                            <div class="col-md-12 post postWide singlePost singlePoject">

                                <div class="row">

                                    <div class="col-md-6 postContents">
                                        <p class="postDetails"><?php echo $row['keterangan']; ?></p>
                                    </div>

                                    <div class="col-md-6 postMedia postSlider carousel2">
                                        <a href="single-blog-1.html" title="post sample">
                                            <img alt="post sample" src="../posbackend/front/images/about/<?php echo $row['photo']; ?>" title="post sample">
                                        </a>
                                        <a href="single-blog-1.html" title="post sample">
                                            <img alt="post sample" src="../posbackend/front/images/about/<?php echo $row['photo']; ?>" title="post sample">
                                        </a>
                                        <a href="single-blog-1.html" title="post sample">
                                            <img alt="post sample" src="../posbackend/front/images/about/<?php echo $row['photo']; ?>" title="post sample">
                                        </a>
                                    </div>

                                </div><!-- end of row -->
                            </div><!-- end of post -->

                        </div><!-- end of row -->

                    </div><!-- end of container -->
                </div><!-- end of section wrapper -->
            </section><!-- end introduction section -->


            <!-- Facts -->
            <section class="facts section mainSection scrollAnchor graySection" id="facts">
                <div class="sectionWrapper">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-12 sectionTitle">
                                <h2 class="sectionHeader">
                                    Why POS Office ?
                                    <span class="generalBorder"></span>
                                </h2><!-- end of sectionHeader -->
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.</p>
                            </div><!-- end of section title -->

                        </div><!-- end of row -->

                        <div class="row factsContents">

                            <div class="col-md-3 factsWrapper">
                                <?php
                                $sqlselect = "select * FROM front_point WHERE point_id='1' ORDER BY point_id";
                                $data = mysql_query($sqlselect) or die("gagal");
                                $point1 = mysql_fetch_array($data);
                                $id = $point1['point_id'];
                                ?>
                                <div class="fact singleFact factBox">
                                    <div class="factIcon factIcon1"></div>
                                    <h4 class="factTitle">
                                        <a href="#"><?php echo $point1['judul']; ?></a>
                                    </h4>
                                    <p class="factDescription"><?php
                                        $ket = $point1['keterangan'];
                                        echo substr($ket, 0, 100);
                                        ?></p>
                                </div><!-- end of fact -->
                                <?php
                                $sqlselect = "select * FROM front_point WHERE point_id='2' ORDER BY point_id";
                                $data = mysql_query($sqlselect) or die("gagal");
                                $point2 = mysql_fetch_array($data);
                                $id = $point2['point_id'];
                                ?>
                                <div class="fact singleFact factBox">
                                    <div class="factIcon factIcon2"></div>
                                    <h4 class="factTitle">
                                        <a href="#"><?php echo $point2['judul']; ?></a>
                                    </h4>
                                    <p class="factDescription"><?php
                                        $ket = $point2['keterangan'];
                                        echo substr($ket, 0, 100);
                                        ?></p>
                                </div><!-- end of fact -->

                            </div><!-- end of facts wrapper -->

                            <div class="col-md-6 factsImg">
                                <div class="imacWrapper">
                                    <img alt="imac" class="imac" src="images/i-mac.png" title="design perview">
                                </div>
                            </div><!-- end of fact img -->

                            <div class="col-md-3 factsWrapper">
                                <?php
                                $sqlselect = "select * FROM front_point WHERE point_id='3' ORDER BY point_id";
                                $data = mysql_query($sqlselect) or die("gagal");
                                $point3 = mysql_fetch_array($data);
                                $id = $point3['point_id'];
                                ?>
                                <div class="fact singleFact factBox">
                                    <div class="factIcon factIcon3"></div>
                                    <h4 class="factTitle">
                                        <a href="#"><?php echo $point3['judul']; ?></a>
                                    </h4>
                                    <p class="factDescription"><?php
                                $ket = $point3['keterangan'];
                                echo substr($ket, 0, 100);
                                ?></p>
                                </div><!-- end of fact -->

                                <?php
                                $sqlselect = "select * FROM front_point WHERE point_id='4' ORDER BY point_id";
                                $data = mysql_query($sqlselect) or die("gagal");
                                $point4 = mysql_fetch_array($data);
                                $id = $point4['point_id'];
                                ?>
                                <div class="fact singleFact factBox">
                                    <div class="factIcon factIcon4"></div>
                                    <h4 class="factTitle">
                                        <a href="#"><?php echo $point4['judul']; ?></a>
                                    </h4>
                                    <p class="factDescription"><?php
                                        $ket = $point4['keterangan'];
                                        echo substr($ket, 0, 100);
                                ?></p>
                                </div><!-- end of fact -->

                            </div><!-- end of facts wrapper -->
                        </div><!-- end of row -->

                    </div><!-- end of container -->
                </div><!-- end of section wrapper -->
            </section><!-- end of facts section -->


            <!-- Team -->
            <section class="team section mainSection scrollAnchor darkSection" id="team">
                <div class="sectionWrapper">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-12 sectionTitle">
                                <h2 class="sectionHeader">
                                    Meet Our AWESOME TEAM
                                    <span class="generalBorder"></span>
                                </h2><!-- end of sectionHeader -->
                                </div><!-- end of section title -->

                        </div><!-- end of row -->

                        <div class="row teamContents">
                            <?php
                            $sqlselect = "select * FROM front_team ORDER BY team_id desc";
                            $data = mysql_query($sqlselect) or die("gagal");
                        
                            while ($postRow = mysql_fetch_array($data)) {
                                $id = $postRow['team_id'];
                                ?>
                                <div class="col-md-3 teamMember">

                                    <div class="teamMemberWrapper">
                                        <div class="memberAvatar"><img src="../posbackend/front/images/team/<?php echo $postRow['photo']; ?>" alt="team member" title="team member"></div>
                                        <h4 class="memberName"><a href="#"><?php echo $postRow['nama']; ?></a></h4>
                                        <span class="memberJob"><?php echo $postRow['jabatan']; ?></span>
                                        <ul class="memberSocial socialNav clearfix">
                                            <li class="facebook"><a href="<?php echo $postRow['facebook']; ?>" target="_blank"><i class="animated fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="<?php echo $postRow['twitter']; ?>" target="_blank"><i class="animated fa fa-twitter"></i></a></li>
                                        </ul>
                                    </div><!-- end of tream member wrapper -->

                                </div><!-- end of team Member -->
                            <?php } ?>
                            </div><!-- end of row -->

                        </div><!-- end of container -->
                    </div><!-- end of section wrapper -->
                </section><!-- end of team section -->


                <!-- Clients -->
                <section class="clients section mainSection scrollAnchor lightSection" id="clients">
                    <div class="sectionWrapper">
                        <div class="container">

                            <div class="row">

                                <div class="col-md-12 sectionTitle">
                                    <h2 class="sectionHeader">
                                        Why You Are Hesitated, Join Our Happy Pathner Now !
                                    </h2><!-- end of sectionHeader -->
                                </div><!-- end of section title -->

                            </div><!-- end of row -->

                            <div class="row">

                                <div class="clientsCarousel owl-carousel clientsGallary">
                                    <?php
                                    $sqlselect = "select * FROM front_costumer ORDER BY rand()";
                                    $data = mysql_query($sqlselect) or die("gagal");
                                    while ($postRow = mysql_fetch_array($data)) {
                                        $id = $postRow['costumer_id'];
                                        ?>
                                        <div class="col-md-2 col-sm-4 item client singleClientsWrapper">
                                            <a class="singleClient" href="#" title="client">
                                                <img alt="client 1" src="../posbackend/front/images/patner/<?php echo $postRow['photo']; ?>" title="<?php echo $postRow['nama']; ?>">
                                            </a><!-- end of single client -->
                                        </div><!-- end of single client wrapper -->
    <?php } ?>
                                    <!-- end of single client wrapper -->

                                </div><!-- end of clients gallary -->
                            </div><!-- end of row -->

                        </div>
                    </div>
                </section><!-- end clients section -->



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
