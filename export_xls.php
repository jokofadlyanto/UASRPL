<?php
//memasukkan file config.php
include("config.php");
include("fungsi/waktu.php");
include("fungsi/rupiah.php");
require 'fungsi/indotgl.php';
?>
<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan penjualan.xls")
 ?>

	<div class="container" style="margin-top:20px">
		<center><font size="6">Laporan Penjualan</font></center>
		<hr>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>Tanggal Transaksi</th>
					<th>Supplier</th>
					<th>Alamat</th>
					<th>Nama Barang</th>
					<th>Harga Jual</th>
					<th>Jumlah</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
<?php
									$no = 1;
									$total_semua = 0;
									$sqlquery = "SELECT supplier.*, databarang.*, transaksi.* FROM transaksi transaksi INNER JOIN supplier supplier ON transaksi.id_sup = supplier.id_sup INNER JOIN databarang databarang ON transaksi.id_brg = databarang.id_brg ORDER BY transaksi.id_sup ASC";
									if ($result = mysqli_query($koneksi, $sqlquery)) {
										while ($row = mysqli_fetch_assoc($result)) {
										$total = ($row["harga_jual"] * $row["jumlah"]);
										$total_semua += $total;

								?>
								<tr>
								<td><?php echo $no ?></td>
								<td><?php echo tgl_indo($row["tgl"]);?></td>
								<td><?php echo $row["nama_sup"];?></td>
								<td><?php echo $row["alamat"];?></td>
								<td><?php echo $row["nama"];?></td>
								<td><?php echo rupiah($row["harga_jual"]);?></td>
								<td><?php echo $row["jumlah"];?></td>
								<td><?php echo rupiah($total);?></td>
								</tr>
								<?php
									$no++;}
								?>
								<tr>
								<td colspan='7'>Grand Total</td>
								<td colspan='2'><?php echo rupiah($total_semua); ?></td>
								</tr>
								<?php
										mysqli_free_result($result);
									}
									mysqli_close($koneksi);
									?>
			<tbody>
		</table>
		<p>
							<div class="pull-right" style="float: right;">
							Jakarta, <?php echo $tgl_skrg .tgl_indo($tgl_sekarang); ?><br>
							<b><center>Owner</center></b>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<b><center>Joko Fadlyanto</center></b>
							</div>
	
	</div>
	
	</div>
