<?php 

session_start();
if(!isset($_SESSION["login"])){
  header ("Location: login/login.php");
  exit;
}

 ?>
<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_sup'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_sup = $_GET['id_sup'];

			//query ke database SELECT tabel databarang berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id_sup='$id_sup'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$id_sup			 = $_POST['id_sup'];
			$nama_sup		 = $_POST['nama_sup'];
			$alamat			 = $_POST['alamat'];
			$no_telp	 	 = $_POST['no_telp'];

			$sql = mysqli_query($koneksi, "UPDATE supplier SET nama_sup='$nama_sup', alamat='$alamat', no_telp='$no_telp' WHERE id_sup='$id_sup'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_sup";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_sup&id_sup=<?php echo $id_sup; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id Supplier</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_sup" class="form-control" size="4" value="<?php echo $data['id_sup']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Supplier</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_sup" class="form-control" value="<?php echo $data['nama_sup']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No Telepon</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="no_telp" class="form-control" value="<?php echo $data['no_telp']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_brg" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
