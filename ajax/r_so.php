<?php
	session_start();
	require('../library/conn.php');
	require('../library/helper.php');
	require_once('../library/ImageManipulator.php');
	date_default_timezone_set("Asia/Jakarta");
	
	if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "add" )
	{
		if(isset($_POST['kode_barang']) and @$_POST['kode_barang'] != ""){
			
			$qty = (is_numeric($_POST['jumlah']) ? $_POST['jumlah'] : "0");
			$total = ($_POST['jumlah']) *($_POST['harga']);
			$qty = ($qty > 0 ? $qty : "0");
				if(!isset($_SESSION['load_so'])) {
					$array[$_POST['kode_barang']] = array('kode_barang' => $_POST['kode_barang'], 'nama_barang' => $_POST['nama_barang'], 
							'jumlah' => $_POST['jumlah'], 'satuan' => $_POST['satuan'], 
							'harga' => $_POST['harga'],"total" => $total);
				} else {
					$array = $_SESSION['load_so'];
					if(array_key_exists($_POST['kode_barang'], $array)) {
						$array[$_POST['kode_barang']]['jumlah'] = ($array[$_POST['kode_barang']]['jumlah'] + $qty);
					} else {
						$array[$_POST['kode_barang']] = array('kode_barang' => $_POST['kode_barang'], 'nama_barang' => $_POST['nama_barang'],
							'qty' => $_POST['jumlah'], 'satuan' => $_POST['satuan'], 
							'harga' => $_POST['harga'],"total" => $total);
					}
				}
				$_SESSION['load_so'] = $array;
				echo view_so($array);
			 
		}
		
	}
	
	
	if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "load" ){
		$id				= $_REQUEST['master_proyek'];
		$query			= "SELECT a.*,b.ppn,b.diskon_hdr,b.sub_total,b.grand_total from penawaran_dtl a INNER JOIN penawaran_hdr b on a.kode_penawaran=b.kode_penawaran where a.kode_penawaran ='$id' ";
		$result			= mysql_query($query);
		$array = array();
		if(mysql_num_rows($result) > 0) {
			while ($res = mysql_fetch_array($result))
	
			 {
				$array[] = array("kode_barang" => $res['model_item'], "nama_barang" => $res['description_item'], "qty" => $res['qty'], "satuan" => $res['satuan'], "harga" => $res['harga'],"total" => $res['total'],"sub_total" => $res['sub_total'],"ppn" => $res['ppn'],"diskon2" => $res['diskon_hdr']);
			}
		}
		$_SESSION['load_so'] = $array;
		echo view_so($array);
	}
	if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "hapus-load" )
	{
		$id = $_POST['idhapus'];
		unset($_SESSION['load_so'][$id]);
		echo view_so($_SESSION['load_so']);
	}
	
	function view_so($array){
		$n=1;
		$total_brutto=0;
		$html = "";
		if(count($array) > 0) {
			foreach ($array as $key=>$item){
				$html .= '<tr><td>'.$n.'</td>
					<td>'.$item['kode_barang'].'</td>
					<td>'.$item['nama_barang'].'</td>
					<td>'.$item['qty'].'</td>
					<td>'.$item['satuan'].'</td>
					<td style="text-align:right">'.number_format($item['harga'], 0, ",", ".").'</td>
					<td style="text-align:right">'.number_format($item['total'], 0, ",", ".").'</td>
					<td>
					
					</td>
					<td><a href="javascript:;" class="label label-danger hapus-cart" data-id="'.$key.'"><i class="fa fa-times"></i></a></td>
				</tr>';
				
				$n += 1;
				$total_brutto += $item['total'];
				$diskon2 = $item['diskon2'];
				$ppn = $item['ppn'];
				$grand_total = ($total_brutto-$diskon2)+$ppn;
			}
			$html .='<tr>
                                	<td style="font-weight:bold" colspan="6" align="right">Total Brutto :</td>
                                    <td align="right" style="font-weight:bold">'.number_format($total_brutto, 0, ",", ".").'</td>
                                    <td colspan="4"><input type="hidden" value="'.$total_brutto.'" id="total_brutto"></td>
                                </tr>
                                ';
			$html .='<tr>
                                	<td style="font-weight:bold" colspan="6" align="right">Diskon :</td>
                                    <td align="right" style="font-weight:bold">'.number_format($diskon2, 0, ",", ".").'</td>
                                    <td colspan="4"><input type="hidden" value="'.$diskon2.'" id="diskon2"></td>
                                </tr>
                                ';
			$html .='<tr>
                                	<td style="font-weight:bold" colspan="6" align="right">ppn :</td>
                                    <td align="right" style="font-weight:bold">'.number_format($ppn, 0, ",", ".").'</td>
                                    <td colspan="4"><input type="hidden" value="'.$ppn.'" id="ppn"></td>
                                </tr>
                                ';
			$html .='<tr>
                                	<td style="font-weight:bold" colspan="6" align="right">Grand Total :</td>
                                    <td align="right" style="font-weight:bold">'.number_format($grand_total, 0, ",", ".").'</td>
                                    <td colspan="4"><input type="hidden" value="'.$grand_total.'" id="grand_total"></td>
                                </tr>
                                ';
			
			$html .= "<script>$('.hapus-cart').click(function(){
						var id =	$(this).attr('data-id'); 
						$.ajax({
							type: 'POST',
							url: '".base_url()."ajax/r_so.php?func=hapus-load',
							data: 'idhapus=' + id,
							cache: false,
							success:function(data){
								$('#show-item-barang').html(data).show();
							}
						});
					});
				  </script>";
		} else {$html = '<tr> <td colspan="10" class="text-center"> Tidak ada item barang. </td></tr>';}
		return $html;
	}
	
	if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "saveso" ){
		if(isset($_SESSION['load_so']) and count($_SESSION['load_so']) > 0) {
			$id = $_POST['kode_so'];
			$tanggal_so = date("Y-m-d",strtotime($_POST['tanggal_so']));
			$tanggal_jht = date("Y-m-d",strtotime($_POST['tanggal_jatuh_tempo']));
			$foto = $_FILES['UploadFile']['name'];
			$fotobaru = date('His').$foto;
		/*	$target_dir = "../images/"; //Menentukan lokasi direktori dimana kita akan menyimpan gambar hasil upload
			$target_file = $target_dir . basename($fotobaru);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Cek ukuran file (500000 = 500kb)
			if ($_FILES['UploadFile']['error'] > 0) {
				echo "Error: " . $_FILES['UploadFile']['error'] . "<br />";
			} else {
			// array of valid extensions
			$validExtensions = array('.jpg', '.jpeg', '.gif', '.png');
			// get extension of the uploaded file
			$fileExtension = strrchr($_FILES['UploadFile']['name'], ".");
			// check if file Extension is on the list of allowed ones
			if (in_array($fileExtension, $validExtensions)) {
				$newNamePrefix = $fotobaru;
				$manipulator = new ImageManipulator($_FILES['UploadFile']['tmp_name']);
				$width  = $manipulator->getWidth();
				$height = $manipulator->getHeight();
				$centreX = round($width / 2);
				$centreY = round($height / 2);
				// our dimensions will be 200x130
				$x1 = $centreX - 500; // 200 / 2
				$y1 = $centreY - 375; // 130 / 2
		 
				$x2 = $centreX + 500; // 200 / 2
				$y2 = $centreY + 375; // 130 / 2
		 
				// center cropping to 200x130
				$newImage = $manipulator->crop($x1, $y1, $x2, $y2);
				// saving file to uploads folder
			}
			*/
			$mySql	= "INSERT INTO so_hdr SET 
						kode_so	='".$id."', 
						ref	='".$_POST['ref']."',
						nama_custemer	='".$_POST['nama_customer']."',
						keterangan_hdr	='".$_POST['keterangan']."',
						tgl_buat	='".$tanggal_so."',
						tgl_jht	='".$tanggal_jht."',
						user_pencipta	='".$_SESSION['app_id']."',
						kode_sales	='".$_POST['salesman']."',
						tgl_input	='".date('H:i:s')."',
						kode_proyek	='".$_POST['master_proyek']."',
						po_custemer	='".$_POST['po_customer']."',
						alamat_penagihan	='".$_POST['alamat_penagihan']."',
						alamat_pengiriman ='".$_POST['alamat_pengiriman']."',
						kepada_kota	='".$_POST['kepada_kota']."',
						kepada_telpon	='".$_POST['kepada_telpon']."',
						status = '0' ";	
			if(mysql_query($mySql)) {
				$array = $_SESSION['load_so'];
				foreach($array as $key=>$item){
					$itemSql = "INSERT INTO so_dtl SET 
											kode_so	='".$id."', 
											kode_inventori	='".$item['kode_barang']."',
											nama_inventori	='".$item['nama_barang']."',
											satuan	    ='".$item['satuan']."',
											jumlah_so   ='".$item['qty']."',
											harga		='".$item['harga']."',
											total_harga	='".$item['total']."'";
				 if(mysql_query($itemSql)) {
						// Skrip Update stok
						
						$total_brutto1 += $item['total'];
						$diskon1 = $item['diskon2'];
						$ppn = $item['ppn'];
						$grand_total = ($total_brutto1-$diskon1)+$ppn;
						$updateppn = "UPDATE so_hdr SET ppn = '".$item['ppn']."', 
						                                diskon2 = '".$item['diskon2']."',
														sub_total ='".$item['sub_total']."',
														grand_total ='".$grand_total."'  WHERE kode_so ='".$id."'";
						mysql_query($updateppn);
					}
					
					$updatestatuspenawaran2 = "update penawaran_hdr SET status ='2' where kode_penawaran = '".$id."'" ;
					mysql_query($updatestatuspenawaran2);						
				}
				
			}
				
		
				//echo "00||".$id;
				unset($_SESSION['load_so']);
				//$manipulator->save($target_dir . $newNamePrefix);
			} else {echo "Gagal query: ".mysql_error();
			}
			
		} else {
			echo "99||Item Proyek masih kosong";
		}
		
?>
