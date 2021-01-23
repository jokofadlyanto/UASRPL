<?php 

session_start();
if(!isset($_SESSION["login"])){
  header ("Location: login/login.php");
  exit;
}

 ?>

<?php include('config.php'); ?>

		<center><font size="6">Tambah Data Transaksi</font></center>
		<hr>

		<form action="aksi_transaksi.php?act=input" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Barang</label>
				<div class="col-md-6 col-sm-6">
					<select name='id_brg' class='form-control' required>
									<?php
									$sqlquery = "SELECT * FROM databarang";
									if ($result = mysqli_query($koneksi, $sqlquery)) {
										while ($row = mysqli_fetch_assoc($result)) {
											$id_brg = $row["id_brg"];
											$nama = $row["nama"];
											echo "<option value='$id_brg'>$nama</option>";
										}
										mysqli_free_result($result);
									}
									?>
									</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Supplier</label>
				<div class="col-md-6 col-sm-6">
					<select name='id_sup' class='form-control'>
									<?php
									$sqlquery = "SELECT * FROM supplier";
									if ($result = mysqli_query($koneksi, $sqlquery)) {
										while ($row = mysqli_fetch_assoc($result)) {
											$id_sup	 = $row["id_sup"];
											$nama = $row["nama_sup"];
											echo "<option value='$id_sup'>$nama</option>";
										}
										mysqli_free_result($result);
									}
									?>
									</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="jumlah" class="form-control" required autocomplete="off">
				</div>
			</div>
			<!-- <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Tranasaksi</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="date" name="date" class="form-control" size="4" required>
				</div>
			</div> -->
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-success" value="Simpan">
			</div>
		</form>
	</div>
