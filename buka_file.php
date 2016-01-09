<?php

error_reporting(E_ALL ^ E_NOTICE);
$page = ($_GET['page']);

switch ($page) {
    case 'post_list' :
        if (!file_exists("post_list.php"))
            die("File tidak ditemukan !");
        include "post_list.php";
        break;

    case 'post_view' :
        if (!file_exists("post_view.php"))
            die("File tidak ditemukan !");
        include "post_view.php";
        break;
        
    case 'dash' :
        if (!file_exists("dash.php"))
            die("File tidak ditemukan !");
        include "dash.php";
        break;

    default:
        if (!file_exists("dash.php"))
            die("Empty Main Page!");
        include "dash.php";
        break;
}
?>