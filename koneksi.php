<?php 

$koneksi = mysqli_connect("localhost","root","","bukucatatan");

// Check connection
if (mysqli_connect_errno()){
	echo "Database Tidak Terhubung : " . mysqli_connect_error();
}

?>