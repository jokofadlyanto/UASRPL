<?php 

session_start();
if(!isset($_SESSION["login"])){
  header ("Location: login/login.php");
  exit;
}

 ?>
<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>

		<form action="aksi_sup.php?act=input" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id Supplier</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id_sup" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Supplier</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_sup" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamat" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">No Telepon</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="no_telp" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-success" value="Simpan">
			</div>
		</form>
	</div>
