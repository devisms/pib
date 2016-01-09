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
        <title>Detail | POS INDONESIA</title>

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

                <!-- Header -->
                <?php include 'menu.php'; ?> 
                <div class="pageInfo">
                    <div class="cover"></div>
                    <div class="container">
                        <div class="row">

                            <div class="col-md-4">
                                <h2 class="pageTitle">Our Blog</h2>
                            </div><!-- end of col-md-4 -->

                            <div class="col-md-8">
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="post_list.php">List</a></li>
                                    <li class="active">Blog</li>
                                </ol><!-- end of breadcrumb -->
                            </div><!-- end of col-md-8 -->

                        </div><!-- end of row -->
                    </div><!-- end of container -->
                </div><!-- end of page info -->
            </section><!-- end of Page Header -->


            <!-- Blog -->
            <section class="blog section mainSection scrollAnchor lightSection" id="blog">
                <!-- Page Info -->

                <div class="sectionWrapper">
                    <div class="container blogColmn3">

                        <div class="row">

                            <div class="col-md-12 sectionTitle">
                                <h2 class="sectionHeader">
                                    Look At Our Latest News
                                    <span class="generalBorder"></span>
                                </h2><!-- end of sectionHeader -->                
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.</p>
                            </div><!-- end of section title -->

                        </div><!-- end of row -->

                        <div class="row">

                            <div class="col-md-8">

                                <div class="row">
                                    <?php
                                    $id = $_GET['post_id'];

                                    $postSql = mysql_query("select * from front_post where post_id='$id'") or die("Query user salah : " . mysql_error());
                                    $postRow = mysql_fetch_array($postSql)
                                    ?> 
                                    <article class="col-md-12 post postWide singlePost">
                                        <div class="postWrapper">
                                            <div class="postMedia postSlider carousel2">

                                                <img alt="post sample" src="../posbackend/front/images/berita/<?php echo $postRow['photo']; ?>" title="post sample">
                                                <img alt="post sample" src="../posbackend/front/images/berita/<?php echo $postRow['photo']; ?>" title="post sample">
                                                <img alt="post sample" src="../posbackend/front/images/berita/<?php echo $postRow['photo']; ?>" title="post sample">
                                            </div>
                                            <div class="postContents">
                                                <a href="#" class="postIcon">
                                                    <i class="animated fa fa-newspaper-o"></i>
                                                </a>
                                                <h4 class="postTitle"><?php echo $postRow['judul']; ?></h4>
                                                <p class="postDetails"><?php echo $postRow['keterangan']; ?></p>

                                                <ul class="postMeta clearfix">
                                                    <li class="postDate">
                                                        <div class="metaContent">
                                                            <i class="animated fa fa-clock-o"></i>
                                                            <?php echo $postRow['date']; ?>
                                                        </div>
                                                    </li>

                                                </ul>

                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </article><!-- end of post -->

                                    <div class="clearfix"></div>


                                </div><!-- end of row -->

                            </div><!-- end of col-md-8 -->

                            <aside class="col-md-4 sidebar">
                                <div class="widget">
                                    <h5 class="widgetHeader clearfix">
                                        Latest Topics
                                        <span class="tickerControl">
                                            <i class="animated fa fa-angle-left" id="ticker-prev"></i>
                                            <i class="animated fa fa-angle-right" id="ticker-next"></i>
                                        </span>
                                    </h5><!-- end of widget header -->
                                    <div class="widgetBody">

                                        <ul id="ticker" class="ticker">
                                            <?php
                                            $sqlselect = "select * FROM front_post ORDER BY post_id desc";
                                            $data = mysql_query($sqlselect) or die("gagal");
                                            $cekQuery = mysql_query("select * FROM front_post");

                                            $no = 1;
                                            while ($postRow = mysql_fetch_array($data)) {
                                                $id = $postRow['post_id'];
                                                ?>
                                                <li class="clearfix">
                                                    <article class="post">
                                                        <div class="postContents">
                                                            <h5 class="postTitle"><a href="?open=post_view&post_id=<?php echo $postRow['post_id']; ?>" title="post sample"><?php
                                                            $title = $postRow['judul'];
                                                            echo substr($title, 0, 40);
                                                            ?></a></h5>
                                                            <ul class="postMeta">
                                                                <li class="postDate"><?php echo $postRow['date']; ?></li>
                                                            </ul>
                                                        </div><!-- end of post  contents -->
                                                    </article><!-- end of post -->
                                                </li>
                                            <?php } ?>


                                        </ul><!-- end of ticker -->
                                    </div><!-- end of widget body -->
                                </div><!-- end of widget -->



                            </aside><!-- end of sidebar -->
                        </div>



                        <div class="clearfix"></div>

                    </div><!-- end of container -->
                </div><!-- end of section wrapper -->
            </section><!-- end blog section -->


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
