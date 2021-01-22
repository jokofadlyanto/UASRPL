<?php
include("config.php");

$act=$_GET['act'];

if ($act=='delete'){

// 	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id_brg = $_GET['id_brg'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM databarang WHERE id_brg='$id_brg'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM databarang WHERE id_brg='$id_brg'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=tampil_brg";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=tampil_brg";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=tampil_brg";</script>';
	}

}

elseif ($act=='input'){
	$id_brg = $_POST["id_brg"];
	$nama = $_POST["nama"];
	$harga_beli = $_POST["harga_beli"];
	$harga_jual = $_POST["harga_jual"];
	$stock = $_POST["stock"];

	$cek = mysqli_query($koneksi, "SELECT * FROM databarang WHERE id_brg='$id_brg'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO databarang(id_brg, nama, harga_beli, harga_jual, stock) VALUES('$id_brg', '$nama', '$harga_beli', '$harga_jual', '$stock')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_brg";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Id barang sudah terdaftar.</div>';
			}

}

?>