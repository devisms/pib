<?php

include "inc.connection.php";

$sql = 'SELECT * FROM unit_regional';
$mySql = mysql_query($sql) or die();
while ($r = mysql_fetch_array($mySql)) {
    echo $r['kode_kprk'] . '-' . $r['nama_dirian'] . '<br>';

    $sql1 = 'SELECT * FROM unit_kprk WHERE kode_regional = ' . $r['kode_kprk'];
    $mySql1 = mysql_query($sql1) or die();
    while ($kprk = mysql_fetch_array($mySql1)) {
        echo '--' . $kprk['kode_kprk'] . '-' . $kprk['nama_dirian'] . '<br>';

        $sql2 = 'SELECT * FROM unit_kpc WHERE kode_regional = ' . $kprk['kode_kprk'];
        $mySql2 = mysql_query($sql2) or die();
        while ($kpc = mysql_fetch_array($mySql2)) {
            echo '----' . $kpc['kode_kprk'] . '-' . $kpc['nama_dirian'] . '<br>';
        }
    }
}
?>

