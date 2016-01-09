<?php
session_start();
include_once "library/inc.connection.php";

if(isset($_POST['btnLogin'])){
	# Baca variabel form
	$txtUser 		= $_POST['txtUser'];
	$txtUser 		= str_replace("'","&acute;",$txtUser);
	
	$txtPassword	= $_POST['txtPassword'];
	$txtPassword	= str_replace("'","&acute;",$txtPassword);
	
	//$cmbLevel		= $_POST['cmbLevel'];
	
	# Validasi form
	$pesanError = array();
	if ( trim($txtUser)=="") {
		$pesanError[] = "Data <b> Username </b>  tidak boleh kosong !";		
	}
	if (trim($txtPassword)=="") {
		$pesanError[] = "Data <b> Password </b> tidak boleh kosong !";		
	}
	
	# JIKA ADA PESAN ERROR DARI VALIDASI
	if (count($pesanError)>=1 ){
		echo "<div class='mssgBox'>";
		echo "<img src='images/attention.png'> <br><hr>";
			$noPesan=0;
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
			$noPesan++;
				echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
			} 
		echo "</div> <br>"; 
		
		// Tampilkan lagi form login
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
	else {
		# LOGIN CEK KE TABEL USER LOGIN
		$mySql = mysql_query("SELECT * FROM m_pegawai WHERE username='$txtUser' AND password='".md5($txtPassword)."'")
				or die ("Query Salah : ".mysql_error());
		$myData= mysql_fetch_array($mySql);
		
		# JIKA LOGIN SUKSES
		if(mysql_num_rows($mySql) >=1) {
			$_SESSION['SES_LOGIN'] = $myData['kode_pegawai']; 
			$_SESSION['SES_USER'] = $myData['username'];
			$_SESSION['SES_NAMA'] = $myData['nama_pegawai']; 
			$_SESSION['SES_KPRK'] = $myData['kode_kprk']; 
			$_SESSION['Level'] = $myData['level_petugas']; 
			// Jika yang login Administrator
			if($_SESSION['Level']=="Admin") {
				$_SESSION['SES_ADMIN'] = "Admin";
			}
			
			// Jika yang login Petugas
			if($_SESSION['Level']=="Petugas") {
				$_SESSION['SES_PETUGAS'] = "Petugas";
			}
			
			if($_SESSION['Level']=="Managerial") {
				$_SESSION['SES_MANAG'] = "Managerial";
			}
			
			// Refresh
			echo "<meta http-equiv='refresh' content='0; url=../posbackend/main.php?open='>";
		}
		else {
			 echo "Login Anda bukan $cmbLevel";
                         echo "<meta http-equiv='refresh' content='0; url=index.php'>";
			// echo "SELECT * FROM m_pegawai WHERE username='$txtUser' AND password='".md5($txtPassword)."' AND level_petugas='$cmbLevel';";
		}
	}
} // End POST
?>
 
<header class="header headerStyle1 headerStyle2" id="header">
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
                          <li><h5><i class="fa fa-user"></i></h5></li>
                          <li>
                            <form class="loginForm" method="POST">
                              <input class="loginName" id="loginName" name="txtUser" placeholder="Name" type="text">
                              <input class="loginPassword" id="loginPassword" name="txtPassword" placeholder="Password" type="password">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Remember Me</label>
                              <button class="generalBtn loginBtn" type="submit" name="btnLogin">Login</button>
                            </form>
                          </li>
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