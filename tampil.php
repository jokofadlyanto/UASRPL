<?php
//memasukkan file config.php
include('config.php');

?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Barang</font></center>
		<hr>

		<a href="index.php?page=tambah_brg"><button class="btn btn-dark right">Tambah Data</button></a>

		<!-- <form action="" method="POST" style="float: right;">
		<button type="submit" name="cari" class="btn btn-secondary btn-sm">Cari </button>
		
			<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian." autocomplete="off" style="padding: 5px"></input>
			

		</form> -->
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>Id Barang</th>
					<th>Nama Barang</th>
					<th>Harga Beli</th>
					<th>Harga Jual</th>
					<th>Stock</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel barang urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM databarang ORDER BY id_brg ASC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['id_brg'].'</td>
							<td>'.$data['nama'].'</td>
							<td>'.$data['harga_beli'].'</td>
							<td>'.$data['harga_jual'].'</td>
							<td>'.$data['stock'].'</td>
							<td>
								<a href="index.php?page=edit_brg&id_brg='.$data['id_brg'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="aksi.php?act=delete&id_brg='.$data['id_brg'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
