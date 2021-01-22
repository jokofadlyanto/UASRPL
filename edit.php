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
		if(isset($_GET['id_brg'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_brg = $_GET['id_brg'];

			//query ke database SELECT tabel databarang berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM databarang WHERE id_brg='$id_brg'") or die(mysqli_error($koneksi));

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
			$id_brg			 = $_POST['id_brg'];
			$nama			 = $_POST['nama'];
			$harga_beli		 = $_POST['harga_beli'];
			$harga_jual 	 = $_POST['harga_jual'];
			$stock 			 = $_POST['stock'];

			$sql = mysqli_query($koneksi, "UPDATE databarang SET nama='$nama', harga_beli='$harga_beli', harga_jual='$harga_jual', stock='$stock' WHERE id_brg='$id_brg'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_brg";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_brg&id_brg=<?php echo $id_brg; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id Barang</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_brg" class="form-control" size="4" value="<?php echo $data['id_brg']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Barang</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Harga Beli</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="harga_beli" class="form-control" value="<?php echo $data['harga_beli']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Harga Jual</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="harga_jual" class="form-control" value="<?php echo $data['harga_jual']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Stock</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="stock" class="form-control" value="<?php echo $data['stock']; ?>" required>
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
