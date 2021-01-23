<?php
include("config.php");
include("fungsi/waktu.php");
require 'fungsi/indotgl.php';

$act=$_GET['act'];
if ($act=='input'){
	$id_brg = $_POST["id_brg"];
	$id_sup = $_POST["id_sup"];
	$jumlah = $_POST["jumlah"];
	

				$sql = mysqli_query($koneksi, "INSERT INTO transaksi VALUES('', '$id_brg', '$id_sup', '$jumlah', '$tgl_now')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=laporan";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}
?>