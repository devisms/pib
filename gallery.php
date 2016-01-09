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
        <title>Gallery | POS INDONESIA</title>

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

                <!-- Page Info -->
                <div class="pageInfo">
                    <div class="cover"></div>
                    <div class="container">
                        <div class="row">

                            <div class="col-md-4">
                                <h2 class="pageTitle">Portfolio</h2>
                            </div><!-- end of col-md-4 -->

                            <div class="col-md-8">
                                <ol class="breadcrumb">
                                    <li><a href="#">Home</a></li>
                                    <li class="active">Portfolio</li>
                                </ol><!-- end of breadcrumb -->
                            </div><!-- end of col-md-8 -->

                        </div><!-- end of row -->
                    </div><!-- end of container -->
                </div><!-- end of page info -->



            </section><!-- end of Page Header -->


            <!-- Portfolio -->
            <section class="portfolio section mainSection scrollAnchor lightSection" id="portfolio">
                <div class="sectionWrapper">
                    <div class="container portfolio4Column">

                        <div class="row">

                            <div class="col-md-12 sectionTitle">
                                <h2 class="sectionHeader">
                                    Look At Our Portfolio
                                    <span class="generalBorder"></span>
                                </h2><!-- end of sectionHeader -->                
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.</p>
                            </div><!-- end of section title -->

                        </div><!-- end of row -->



                        <ul class='portfolioFilters filterOptions row'>
                            <li class='filter col-md-2' data-filter='all'><span>All</span></li>
                        </ul>

                        <div class="row grid" id="grid">

                            <?php
                            $BatasAwal = 12;
                            if (!empty($_GET['hal'])) {
                                $hal = $_GET['hal'] - 1;
                                $MulaiAwal = $BatasAwal * $hal;
                            } else if (!empty($_GET['hal']) and $_GET['hal'] == 1) {
                                $MulaiAwal = 0;
                            } else if (empty($_GET['hal'])) {
                                $MulaiAwal = 0;
                            }

                            $sqlselect = "select * from front_gallery order by gallery_id desc limit $MulaiAwal , $BatasAwal";
                            $data = mysql_query($sqlselect) or die("gagal");
                            $cekQuery = mysql_query("select * from front_gallery");
                            $jumlahData = mysql_num_rows($cekQuery);

                            $no = 1;
                            while ($postRow = mysql_fetch_array($data)) {
                                $id = $postRow['gallery_id'];
                                ?> 
                                <article class="col-md-3 project mix cloudHosting webHosting">
                                    <div class="projectWrapper">
                                        <figure class="projectMedia">

                                            <a href="#" title="project sample">
                                                <img alt="project sample" src="../posbackend/front/images/gallery/<?php echo $postRow['photo']; ?>" title="project sample">
                                            </a>

                                            <figcaption class="caption">
                                                <ul class="projectMeta">

                                                    <li><a href="#" data-toggle="modal" data-target=".lightBoxBlog" class="generalLink"><i class="animated fa fa-search"></i></a></li>
                                                </ul>
                                            </figcaption><!-- end of caption -->

                                        </figure><!-- end of project media -->
                                        <div class="projectContents">
                                            <h5 class="projectName"><a href="#"><?php echo $postRow['judul']; ?></a></h5><!-- end of project name -->


                                        </div><!-- end of project contents -->
                                    </div>
                                </article><!-- end of project -->

                            <?php } ?>
                            <div class="col-md-3 gap"></div><!-- end of gap --><!-- "gap" elements fill in the gaps in justified grid -->


                        </div><!-- end of row -->

                        <?php
                        if ($jumlahData > $BatasAwal) {
                            echo '<br/><center><div style="font-size:10pt;">Page : ';
                            $a = explode(".", $jumlahData / $BatasAwal);
                            $b = $a[0];
                            $c = $b + 1;
                            for ($i = 1; $i <= $c; $i++) {
                                echo '<a style="text-decoration:none;';
                                if ($_GET['hal'] == $i) {
                                    echo 'color:red';
                                }
                                echo '" href="gallery.php?&hal=' . $i . '">' . $i . '</a>, ';
                            }
                            echo '</div></center>';
                        }
                        ?>

                        <div class="clearfix"></div>

                    </div><!-- end of container -->
                </div><!-- end of section wrapper -->
            </section><!-- end portfolio section -->


            <!-- Footer -->
            <?php include 'footer.php'; ?>


        </div><!-- end of all wrapper -->

        <!-- light Box Portfolio -->

        <div class="modal fade lightBoxBlog lightBoxPortfolio" tabindex="-1" role="dialog" aria-hidden="true">

            <div class="container singlePostPage singleProjectPage">

                <div class="row wideBlog">

                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <?php
                    $postSql = mysql_query("select * from front_gallery ORDER BY gallery_id") or die("Query user salah : " . mysql_error());
                    $postRow = mysql_fetch_array($postSql)
                    ?> 
                    <article class="col-md-12 post postWide singlePost singlePoject">
                        <div class="postWrapper">
                            <div class="postMedia">
                                <a href="single-portfolio.html" title="project sample">
                                    <img alt="project sample" src="../posbackend/front/images/gallery/<?php echo $postRow['photo']; ?>" title="project sample">
                                </a>
                            </div>
                            <div class="postContents">
                                <a href="#" class="postIcon">
                                    <i class="animated fa fa-suitcase"></i>
                                </a>
                                <h4 class="postTitle">
                                    <a href="single-portfolio.html" title="project sample"><?php echo $postRow['judul']; ?></a>
                                </h4>
                                <p class="postDetails"><?php echo $postRow['keterangan']; ?></p>
                                <ul class="postMeta clearfix">
                                    <li class="postDate">
                                        <div class="metaContent">
                                            <i class="animated fa fa-clock-o"></i>
                                            Date : Feb 15, 2014
                                        </div>
                                    </li>
                                    <li class="postAuthor">
                                        <div class="metaContent">
                                            <i class="animated fa fa-user"></i>
                                            Author :
                                            <a href="#" title="author name">Begha</a>
                                        </div>
                                    </li>
                                    <li class="postComments">
                                        <div class="metaContent">
                                            <i class="animated fa fa-comment-o"></i>
                                            <a class="scrollTo" data-scroll="comments" href="#comments">Comments : 11</a>
                                        </div>
                                    </li>
                                </ul>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </article><!-- end of post -->

                    <div class="clearfix"></div>

                    <div class="col-md-12 share">

                        <div class="shareBtns clearfix">
                            <h5 class="shareHeader title">Share This Article If You Liked It :)</h5><!-- end of share header -->
                            <div class="shareBtnsWrapper">
                                <ul class="rrssb-buttons blankShare clearfix">
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=http://kurtnoble.com/labs/rrssb/index.html" class="popup"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="twitter">
                                        <a href="http://twitter.com/home?status=Ridiculously%20Responsive%20Social%20Sharing%20Buttons%20by%20@seagoat%20and%20@dbox%20http://kurtnoble.com/labs/rrssb" class="popup"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="googleplus">
                                        <a href="https://plus.google.com/share?url=Check%20out%20how%20ridiculously%20responsive%20these%20social%20buttons%20are%20http://kurtnoble.com/labs/rrssb/index.html" class="popup"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li class="email">
                                        <!-- Replace subject with your message using URL Endocding: http://meyerweb.com/eric/tools/dencoder/ -->
                                        <a href="mailto:?subject=Check%20out%20how%20ridiculously%20responsive%20these%20social%20buttons%20are&amp;body=http%3A%2F%2Fkurtnoble.com%2Flabs%2Frrssb%2Findex.html"><i class="fa fa-share-alt"></i></a>
                                    </li>
                                    <li class="linkedIn">
                                        <a href="https://www.linkedin.com/shareArticle?summary=Responsive+social+icons+by+KNI+Labs&amp;url=http%3A%2F%2Fkurtnoble%2Ecom%2Flabs%2Frrssb%2Findex%2Ehtml&amp;title=Ridiculously+Responsive+Social+Sharing+Buttons&amp;mini=true"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li class="pinterest">
                                        <a href="http://pinterest.com/pin/create/button/?url=http://kurtnoble.com/labs/rrssb/index.html&amp;media=http://kurtnoble.com/labs/rrssb/media/facebook-share.jpg&amp;description=Ridiculously%20responsive%20social%20sharing%20buttons%20by%20KNI%20Labs."><i class="fa fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div><!-- end of share btns wrapper -->
                        </div><!-- end of share btns -->

                    </div><!-- end of share -->

                </div><!-- end of row -->

            </div><!-- end of container -->
        </div><!-- end of light Box Portfolio -->


        <!-- JavaScript Files ================================================== -->
        <script src="js/compiler.js" type="text/javascript"></script>
        <script src="js/scripts.js" type="text/javascript"></script>

        <!-- BootStrap JavaScript ================================================== -->
        <script src="js/bootstrap.js" type="text/javascript"></script>


        <!-- Switcher JavaScript ================================================== -->
        <script src="js/switcher.js" type="text/javascript"></script>
    </body>
</html>
