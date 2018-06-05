<?php 
	include "../library/conn.php";
	if(!empty($_POST['nama_pp'])){
		$nama = $_POST['nama_proyek'];
		$data_hdr = mysql_query("SELECT * FROM pp_hdr WHERE nama_proyek LIKE '$nama'");
		$hasil = mysql_fetch_array($data_hdr);
		$kd = $hasil['kd_proyek'];
		
		$md_item = $_POST['md_pp'];
		$nama_pp = $_POST['nama_pp'];
		$qty = $_POST['qty_pp'];
		mysql_query("INSERT INTO pp_dtl VALUES ('', '$kd', '$md_item', '$nama_pp', '$qty')");
	}
	
	$data = mysql_query("SELECT * FROM pp_dtl WHERE kd_proyek='$kd'");
	while($d = mysql_fetch_array($data)){
		$m = mysql_query("SELECT * FROM model_item WHERE id_model=$d[model_item]");
		$m = mysql_fetch_array($m)
?>
	<tr>
		<td><?php echo $m['nama_model_item'] ?></td>
		<td><?php echo $d['nama_item'] ?></td>
		<td><?php echo $d['qty'] ?></td>
		<td>
			<a href="#?id=<?php echo $d['id_pp_dtl'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
				<button class="btn btn-danger"> Hapus </button>
			</a>
		</td>
	</tr>
<?php 
	}
?>