<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Supplier</font></center>
		<hr>
		<a href="index.php?page=tambah_brg"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>Id Supplier</th>
					<th>Nama Supplier</th>
					<th>Alamat</th>
					<th>No Telepon</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel barang urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM supplier ORDER BY id_sup ASC") or die(mysqli_error($koneksi));
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
							<td>'.$data['id_sup'].'</td>
							<td>'.$data['nama_sup'].'</td>
							<td>'.$data['alamat'].'</td>
							<td>'.$data['no_telp'].'</td>
							<td>
								<a href="index.php?page=edit_sup&id_sup='.$data['id_sup'].'" class="btn btn-secondary btn-sm">Edit</a>
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
