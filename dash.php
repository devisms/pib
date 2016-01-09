<section class="slider section mainSection scrollAnchor darkSection" id="slider">

        <div id="mainSlider" class="mainSlider homeSlider_2  owl-carousel sliderStyle1">

          <?php
        
        $sqlselect = "select * FROM cover ORDER BY coverid desc";
        $data = mysql_query($sqlselect) or die("gagal");
        $cekQuery = mysql_query("select * FROM cover");

        $no = 1;
        while ($postRow = mysql_fetch_array($data)) {
            $id = $postRow['coverid'];
            ?> 
            <div id="slide1" class="item slide">
                <div class="cover"></div><!-- end of cover -->
                <img  src="../posbackend/front/images/cover/<?php echo $postRow['photo']; ?>" title="Slide 1" alt="slide 1">
                <div class="captions">
                    <h2 class="animated"><?php echo $postRow['title']; ?></h2>
                    <p class="animated">
                        <?php echo $postRow['note']; ?></p>
                    <p class="links animated">
                        <a class="animated link sliderLinks light details" href="?open=about" title="More Details">More Details</a>
                    </p><!-- end of links -->
                </div><!-- end of captions -->
            </div><!-- end of slide -->
        <?php } ?>

        </div><!-- end of main slider -->

      </section><!-- end of slider -->

      <!-- Header -->
      <?php include 'menu.php'; ?>

      <!-- Welcome -->
      <section class="welcome welcome2 section mainSection scrollAnchor lightSection" id="welcome">
        <div class="sectionWrapper">
          <div class="container">

            <div class="row">

              <div class="col-md-12 sectionTitle">
                <h2 class="sectionHeader">
                  Selamat Datang Di Website POS INDONESIA Cabang Kota Bandung. 
                  <span class="generalBorder"></span>
                </h2><!-- end of sectionHeader -->
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.</p>
              </div><!-- end of section title -->
              
            </div><!-- end of row -->

            <div class="row">
        <?php
        $sqlselect = "select * FROM front_post ORDER BY post_id desc LIMIT 4";
        $data = mysql_query($sqlselect) or die("gagal");
        $cekQuery = mysql_query("select * FROM front_post");

        $no = 1;
        while ($postRow = mysql_fetch_array($data)) {
            $id = $postRow['post_id'];
            ?>
              <article class="col-md-3 post">
                <div class="postWrapper">
                  <div class="postMedia">
                    <a href="post_view.php&post_id=<?php echo $postRow['post_id']; ?>" title="post sample">
                        <img alt="post sample" src="../posbackend/front/images/berita/<?php echo $postRow['photo']; ?>" title="post sample">
                    </a>
                  </div>
                  <div class="postContents">
                    <h4 class="postTitle">
                      <a href="post_view.php&post_id=<?php echo $postRow['post_id']; ?>" title="post sample"><?php echo $postRow['judul']; ?></a>
                    </h4>
                    <p class="postDetails"><?php $ket = $postRow['keterangan'];
                                                 echo substr($ket, 0, 100);
                                            ?>   </p>
                    <a class="readMore bordered generalLink" href="post_view.php&post_id=<?php echo $postRow['post_id']; ?>" title="read more">Selengkapnya</a>
                  </div>
                </div>
              </article><!-- end of post -->
        <?php } ?>
              
            </div><!-- end of row -->
          </div><!-- end of container -->
        </div><!-- end of section wrapper -->
      </section><!-- end welcome section -->

      <!-- Facts -->
      <section class="facts section mainSection scrollAnchor graySection" id="facts">
        <div class="sectionWrapper">
          <div class="container">

            <div class="row">
              <div class="col-md-12 sectionTitle">
                <h2 class="sectionHeader">
                  Why POS Office
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
                  <p class="factDescription"><?php $ket = $point1['keterangan'];
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
                  <p class="factDescription"><?php $ket = $point2['keterangan'];
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
                  <p class="factDescription"><?php $ket = $point3['keterangan'];
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
                  <p class="factDescription"><?php $ket = $point4['keterangan'];
                                                 echo substr($ket, 0, 100);
                                            ?></p>
                </div><!-- end of fact -->
                
              </div><!-- end of facts wrapper -->
            </div><!-- end of row -->

          </div><!-- end of container -->
        </div><!-- end of section wrapper -->
      </section><!-- end of facts section -->

      <!-- Clients -->
      <section class="clients section mainSection scrollAnchor lightSection" id="clients">
        <div class="sectionWrapper">
          <div class="container">

            <div class="row">

              <div class="col-md-12 sectionTitle">
                <h2 class="sectionHeader">
                  Why You Are Hesitated, Join Our Happy Pathner Now !
                  <span class="generalBorder"></span>
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