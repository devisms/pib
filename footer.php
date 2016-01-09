<footer class="footer" id="footer">

        <!-- Top Footer -->
        <div class="topFooter">
          <div class="container">
            <div class="row">

              <div class="col-md-8 footerWidget footerBox">
                <h5 class="footerWidgetHeader">About Us</h5><!-- end of footer widget header -->
                <?php
                    $sqlselect = "select * FROM front_about ORDER BY about_id";
                    $data = mysql_query($sqlselect) or die("gagal");
                    $row = mysql_fetch_array($data);
                    $id = $row['about_id'];
                  ?>
                <p class="footerAboutContent footerText"><?php $ket = $row['keterangan'];
                                                 echo substr($ket, 0, 550);
                                            ?></p>
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
                  <p>All Rights Reserved &copy; POS INDONESIA  |  Build By <a href="http://www.studioitech.com" target="_blank">Studio IT</a></p>
               
              </div><!-- end of copyrights -->

              <div class="col-md-6 footerSocial">
                <div class="footerSocialWrapper">
                    <?php
                    $sqlselect = "select * FROM front_contact ORDER BY contact_id";
                    $data = mysql_query($sqlselect) or die("gagal");
                    $row = mysql_fetch_array($data);
                    $id = $row['contact_id'];
                  ?>
                  <ul class="bottomSocial socialNav">
                    <li class="facebook"><a href="<?php echo $row['facebook']; ?>" target="_blank"><i class="animated fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="<?php echo $row['twitter']; ?>" target="_blank"><i class="animated fa fa-twitter"></i></a></li>
                  </ul><!-- end of bottom social -->
                  
                </div><!-- end of footer social wrapper -->
              </div><!-- end of footer social -->
            </div><!-- end of row -->
          </div><!-- end of container -->
        </div><!-- end of bottom footer -->
      </footer><!-- end of footer -->