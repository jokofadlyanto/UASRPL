<?php
include("config.php");

$act=$_GET['act'];

if ($act=='delete'){

// 	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id_sup = $_GET['id_sup'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id_sup='$id_sup'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM supplier WHERE id_sup='$id_sup'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=tampil_sup";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=tampil_sup";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=tampil_sup";</script>';
	}

}

elseif ($act=='input'){
	$id_sup = $_POST["id_sup"];
	$nama_sup = $_POST["nama_sup"];
	$alamat = $_POST["alamat"];
	$no_telp = $_POST["no_telp"];

	$cek = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id_sup='$id_sup'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO supplier(id_sup, nama_sup, alamat, no_telp) VALUES('$id_sup', '$nama_sup', '$alamat', '$no_telp')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_sup";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Id barang sudah terdaftar.</div>';
			}

}

?>