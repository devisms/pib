<?php
include_once "library/inc.connection.php";
if (isset($_POST['submit'])) {
            # Validasi form, jika kosong sampaikan pesan error
            $message = array();
            if (trim($_POST['txtnama']) == "") {
                echo "<script>alert('Name can't be empty!); location.href='contact.php';</script>";
            }

            $txtnama = $_POST['txtnama'];
            $txtnama = str_replace("'", "&acute;", $txtnama);

            $txtphone = $_POST['txtphone'];
            $txtphone = str_replace("'", "&acute;", $txtphone);
            
            $txtemail = $_POST['txtemail'];
            $txtemail = str_replace("'", "&acute;", $txtemail);
            
            $txtsubject = $_POST['txtsubject'];
            $txtsubject = str_replace("'", "&acute;", $txtsubject);
            
            $txtpesan = $_POST['txtpesan'];
            $txtpesan = str_replace("'", "&acute;", $txtpesan);
            
            $date = date('d-m-Y');

            # SIMPAN DATA KE DATABASE
            if (count($message) == 0) {
                $qrySave = mysql_query("INSERT INTO front_mail SET 
			mail_id='', 
			nama='$txtnama',
                        phone='$txtphone',
                        email='$txtemail',
                        subject='$txtsubject',
			pesan='$txtpesan',
                        date='$date'
			") or die("Gagal query" . mysql_error());
                if ($qrySave) {
                    echo "<script>alert('Success!'); location.href='contact.php';</script>";
                }
                exit;
            }

            # JIKA ADA PESAN ERROR DARI VALIDASI
            // (Form Kosong, atau Duplikat ada), Ditampilkan lewat kode ini
            if (!count($message) == 0) {
                echo "<div class='mssgBox'>";

                $Num = 0;
                foreach ($message as $indeks => $pesan_tampil) {
                    $Num++;
                    echo "&nbsp;&nbsp;$Num. $pesan_tampil<br>";
                }
                echo "</div> <br>";
            }
  } else {
    unset($_POST['submit']);
}
?>