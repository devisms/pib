<?php

include "inc.connection.php";
set_time_limit(0);

$sql = 'SELECT * FROM m_aset';
$mySql = mysql_query($sql) or die();
while ($r = mysql_fetch_array($mySql)) {
    echo $r['kode_aset'] . '<br>';

    $sql1 = 'SELECT distinct kode_aset, lat, lon, peruntukan  FROM test WHERE kode_aset = "' . $r['kode_aset'] . '" ';
    $mySql1 = mysql_query($sql1) or die();
    $num_test = mysql_num_rows($mySql1);
    if ($num_test > 0) {
        while ($r1 = mysql_fetch_array($mySql1)) {
//            echo $r1['kode_aset'].' adadadada<br>';
            $sql11 = 'Update m_aset set lat = '.$r1['lat'].', longitud = '.$r1['lon'].', peruntukan = "'.$r1['peruntukan'].'" WHERE kode_aset = "' . $r['kode_aset'] . '" ';
            $mySql11 = mysql_query($sql11) or die();
        }
//        echo "success<br>";
    } else {
//        echo "<br>";
    }
}

echo "finish";
?>