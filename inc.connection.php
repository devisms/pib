<?php

# Konek ke Web Server Lokal

$myHost	= "localhost";

$myUser	= "root";

$myPass	= "1234";

$myDbs	= "pos";



# Konek ke Web Server Lokal

$koneksidb	= mysql_connect($myHost, $myUser, $myPass);

if (! $koneksidb) {

  echo "Failed Connection !";

}



# Memilih database pd MySQL Server

mysql_select_db($myDbs) or die ("Database not Found !");

?>