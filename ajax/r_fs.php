<?php
	session_start();
	require('../library/conn.php');
	require('../library/helper.php');
	require_once('../library/ImageManipulator.php');
	date_default_timezone_set("Asia/Jakarta");
	if( isset( $_REQUEST['keyword'] ) and $_REQUEST['keyword'] != "" )
	{

		$keyword		=		$_REQUEST['keyword'];
		$query			=		"SELECT * from permintaan_penawaran WHERE ref = 0 and status ='0' and status_survey = '1' /*and status_blm_tdk_survey = '0'*/ and (kode_pp LIKE '%$keyword%' or nama_perusahaan LIKE '%$keyword%') limit 10";
		$result			=		mysql_query($query);
		$html			=		"";
		if(mysql_num_rows($result) > 0) {
			while ( $row	=		mysql_fetch_array($result) ) 
			{
				$html	.='<li data="'.$row['kode_pp'].'" data2="'.$row['nama_perusahaan'].'" data3="'.$row['alamat'].'" data4="'.$row['up'].'" data5="'.$row['jabatan'].'">
							<span  class="left">'.$row['kode_pp'].' </span> 
							<span  class="right">'.$row['nama_perusahaan'].'</span> 
							</li>';
			}
		} else { $html = '<li data="">Data not found.</li>';}
		
		echo $html;
	}
	
	
	//-------------------------FS------------------------------------------////
	
		if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "add" )
	{
		

		if(isset($_POST['kode_barang']) and @$_POST['kode_barang'] != ""){
			$id_form=$_POST['id_form'];
			$itemsf = "INSERT INTO fs_dtl_tmp SET 
											kode_item	='".$_POST['kode_barang']."',
											lokasi      ='".$_POST['lokasi']."',
											qty		    ='".$_POST['jumlah']."',
											satuan		='".$_POST['satuan']."',
											id_form		='".$id_form."' ";
			mysql_query($itemsf);
			
			$query			= "SELECT * FROM fs_dtl_tmp WHERE id_form='".$_POST['id_form']."'";
			$result			= mysql_query($query);
			
			$array = array();
			if(mysql_num_rows($result) > 0) {
				while ($res = mysql_fetch_array($result)) {
					
					if(!isset($_SESSION['data_survey'])) {
					$array[$res['id_fs_dtl']] = array("id" => $res['id_fs_dtl'],"kode_barang" => $res['kode_item'], "lokasi" => $res['lokasi'], "jumlah" => $res['qty'], "satuan" => $res['satuan'], "id_form" => $res['id_form']);
				} else {
					$array = $_SESSION['data_survey'];
					
						$array[$res['id_fs_dtl']] = array("id" => $res['id_fs_dtl'],"kode_barang" => $res['kode_item'], "lokasi" => $res['lokasi'], "jumlah" => $res['qty'], "satuan" => $res['satuan'], "id_form" => $res['id_form']);
					}
				   
				}
			}
			
			
				$_SESSION['data_survey'] = $array;
				echo view_item_survey($array);
			 
		}
		
	}
	
	if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "editfs" )
	{
	if(isset($_POST['kode_barang']) and @$_POST['kode_barang'] != ""){
			
			$id_form=$_POST['id_form'];
			$itemsf2 = "UPDATE fs_dtl_tmp SET 
											kode_item	='".$_POST['kode_barang']."',
											lokasi      ='".$_POST['lokasi']."',
											qty		    ='".$_POST['jumlah']."',
											satuan		='".$_POST['satuan']."' WHERE id_fs_dtl ='".$_POST['id']."' ";
			mysql_query($itemsf2);
			
			$query			= "SELECT * FROM fs_dtl_tmp WHERE id_form='".$_POST['id_form']."'";
			$result			= mysql_query($query);
			
			$array = array();
			if(mysql_num_rows($result) > 0) {
				while ($res = mysql_fetch_array($result)) {
					
						$array[$res['id_fs_dtl']] = array("id" => $res['id_fs_dtl'],"kode_barang" => $res['kode_item'], "lokasi" => $res['lokasi'], "jumlah" => $res['qty'], "satuan" => $res['satuan'], "id_form" => $res['id_form']);
					}
				   
				
			}
			
			
				$_SESSION['data_survey'] = $array;
				echo view_item_survey($array);			 
		}
		
	}
	
	if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "hapus-survey" )
	{
		$id = $_POST['idhapus'];
		$id_form = $_POST['id_form'];
		$itemdelete = "delete from fs_dtl_tmp where id_fs_dtl = '".$id."'";
		mysql_query($itemdelete);
		unset($_SESSION['data_survey'][$id]);
		echo view_item_survey($_SESSION['data_survey']);
	}
	
	function view_item_survey($data) {
		$n = 1;
		$html = "";
		$grandtotal = 0;
		$total= 0;
		if(count($data) > 0) {
			foreach($data as $key=>$item){
				
				$total += ($item['jumlah']);
				$html .= '<tr><td>'.$n++.'</td>
					<td>'.$item['kode_barang'].'<input type="hidden" data-id="id_form" value='.$item['id_form'].' class="form-control" placeholder="id_form..."/></td>
					<td>'.$item['lokasi'].'</td>
					<td>'.$item['jumlah'].'</td>
					<td>'.$item['satuan'].'</td>
					<td>
<!--					<a href="" class="label label-primary" data-toggle="modal"  data-target="#tambah_survey"><i class="fa fa-plus-circle"></i></a> -->
					<a href="javascript:;" class="label label-info edit_survey" data-toggle="modal" data-target="#edit_survey" data-id="'.$item['id'].'"><i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="label label-danger hapus-survey" data-id="'.$key.'"><i class="fa fa-times"></i></a>           </td>
				</tr>';
				
			}
			$html .= '<tr><td colspan="7"><input type="hidden" value="'.$total.'" id="b_grand_total"></td></tr>';
			$html .= "<script>$('.hapus-survey').click(function(){
						var id =	$(this).attr('data-id'); 
						var id_form = $('#id_form').val();
						$.ajax({
							type: 'POST',
							url: '".base_url()."ajax/r_fs.php?func=hapus-survey',
							data: 'idhapus=' + id + '&id_form=' +id_form,
							cache: false,
							success:function(data){
								$('#show-item-fs').html(data).show();
							 }
						  });
					  });
				     </script>";
				
		} else {
			$html .= '<tr> <td colspan="10" class="text-center"> Tidak ada item barang. </td></tr>';
		}
		
		$html  .= "<script>$('.edit_survey').click(function(){
						var id =	$(this).attr('data-id'); 
						var id_form = $('#id_form').val();
						$.ajax({
							type: 'POST',
							url: '".base_url()."ajax/r_fs.php?func=edit_survey',
							data: 'id=' +id + '&id_form=' +id_form,
							cache: false,
							success:function(data){
								$('#show-item-edit').html(data).show();
							}
						});
					});
				  </script>";
				  
		return $html;
	}
	
	if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "edit_survey" ){
		
		$id				= $_POST['id'];
		$query			= "SELECT * from fs_dtl_tmp WHERE id_fs_dtl like '$id' ";
		$result			= mysql_query($query);
		
		while ($res = mysql_fetch_array($result)) {
		echo ' <div class="col-md-12 pm-min">
                    <form role="form" method="post" action="" id="form-edit-survey">
                        <div class="col-md-12 pm-min-s">
                           
                            <div class="col-md-6 pm-min-s">
                                <label class="control-label">Material Dan Equipment</label>
                                <input type="text" name="kode_barang" value='.$res['kode_item'].' id="kode_barang" class="form-control" placeholder="Input Barang Survey"/>
                                <input type="hidden" name="id" value='.$res['id_fs_dtl'].' id="id" class="form-control" placeholder="Input Barang Survey"/> <input type="hidden" name="id_form" id="id_form" value='.$res['id_form'].' class="form-control" placeholder="Description..."/>
                
                            </div>
                             <div class="col-md-6 pm-min-s">
                            <label class="control-label">Area</label>
                            <input type="text" name="lokasi" id="lokasi" value='.$res['lokasi'].' class="form-control"  tabindex="3"/>
                             </div>
                            
                            <div class="col-md-6 pm-min-s">
                            <label class="control-label">Jml</label>
                            <input type="number" name="jumlah" id="jumlah" value='.$res['qty'].' class="form-control" value="0" tabindex="3"/>
                             </div>
                              <div class="col-md-6 pm-min-s">
                            <label class="control-label">Satuan</label>
                            <input type="text" name="satuan" id="satuan" value='.$res['satuan'].' class="form-control"  tabindex="3"/>
                             </div>
                              
                             
                        </div>
                   
                    </form>
                    </div>
					<div class="modal-footer">
                                                <button type="button" name="submit" class="btn btn-success edit-to-survey" tabindex="4" data-dismiss="modal"><i class="fa fa-plus"></i> Update</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>';
	echo "<script>$('.edit-to-survey').click(function(){
						var id =	$(this).attr('data-id'); 
						$.ajax({
							type: 'POST',
							url: '".base_url()."ajax/r_fs.php?func=editfs',
							data: $('#form-edit-survey').serialize(),
							cache: false,
							success:function(data){
								$('#show-item-fs').html(data).show();
				  				$('#kode_barang').val('');
				                $('#jumlah').val('0'); $('#lokasi').val('');$('#satuan').val('');
			                 	$('#note').val(''); 
							}
						});
					});
				  </script>";
		}
		
	
		
	}
	
	
	
	if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "save" ){
		if(isset($_SESSION['data_survey']) and count($_SESSION['data_survey']) > 0) {
			$id = $_POST['kd_proyek'];
			$token = $_POST['token'];
			$foto = $_FILES['UploadFile']['name'];
			$tanggal = date("Y-m-d",strtotime($_POST['tanggal']));
			$fotobaru = date('His').$foto;
			// Membuat kode survey
          	$kd_survey = buat_no_survey($id, $tanggal);
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
			} */
			$mySql	= "INSERT INTO fs_hdr SET 
						kd_proyek	='".$id."', 
						nama_proyek	='".$_POST['nama_proyek']."',
						alamat	='".$_POST['alamat']."',
						up	='".$_POST['up']."',
						jabatan	='".$_POST['jabatan']."',
						surveyor	='".$_POST['surveyor']."',
						keterangan	='".$_POST['keterangan']."',
						token	='".$token."',
						tanggal	='".$tanggal."',
						foto	='".$fotobaru."',
						status	='0',
						status_survey = '1',
						lokasi_hdr	='".$_POST['lokasi_hdr']."',
						kd_survey = '$kd_survey'";	
			if(mysql_query($mySql)) {
				$array = $_SESSION['data_survey'];
				foreach($array as $key=>$item){
					$kode_item= $item['kode_barang'];
					$location=$item['lokasi'];
					$qty=$item['jumlah'];
					
					/*--------------------------------------------------------*/
					//CEK LOKASI UDAH ADA DI fs_dtl APA BELUM?
							$cek_lokasi_ada = "SELECT COUNT(*) count_lokasi FROM fs_dtl WHERE lokasi='".$location."'";
								$result	= mysql_query($cek_lokasi_ada);
		
								while ($res = mysql_fetch_array($result)) {
									$lokasi_ada = $res['count_lokasi'];
										if($lokasi_ada=='0'){
											//TAMBAHKAN LOKASI DI TABLE fs_dtl_lokasi
											$tambahlokasi = "ALTER TABLE fs_dtl_lokasi ADD ".$location." INT (11) NOT NULL DEFAULT '0'";
											mysql_query($tambahlokasi);
											
											//CEK APAKAH KD_ITEM SDH ADA DI FS_DTL_LOKASI
											$cek_item_ada = "SELECT COUNT(*) count_item FROM fs_dtl_lokasi WHERE kode_item='".$kode_item."' AND kd_proyek='".$id."' ";
											$result2	= mysql_query($cek_item_ada);
											
											while ($res2 = mysql_fetch_array($result2)) {
											$item_ada = $res2['count_item'];
												if($item_ada=='0'){
													//TAMBAHKAN LOKASI DI TABLE fs_dtl_lokasi di LOKASI baru
													$itemsqllokasi = "INSERT INTO fs_dtl_lokasi SET 
																			kd_proyek 		= '".$id."',
																			kode_item 		= '".$kode_item."',
																			token			= '".$token."',
																			".$location."	= '".$qty."' ";
													mysql_query($itemsqllokasi);
												}else{
													//UPDATE lokasi_fs_dtl DI LOKASI BARU
													$itemsqllokasi = "UPDATE fs_dtl_lokasi SET 
																		".$location."	= '".$qty."' 
																		WHERE kode_item='".$kode_item."' AND kd_proyek='".$id."' AND token='".$token."' ";
													mysql_query($itemsqllokasi);														
												}
											}
											
													
										}else{
											//CEK APAKAH KD_ITEM SDH ADA DI FS_DTL_LOKASI
											$cek_item_ada = "SELECT COUNT(*) count_item FROM fs_dtl_lokasi WHERE kode_item='".$kode_item."' AND kd_proyek='".$id."' ";
											$result2	= mysql_query($cek_item_ada);
											
											while ($res2 = mysql_fetch_array($result2)) {
											$item_ada = $res2['count_item'];
												if($item_ada=='0'){
													$itemsqllokasi = "INSERT INTO fs_dtl_lokasi SET 
																		kd_proyek 		= '".$id."',
																		kode_item		= '".$kode_item."',
																		token			= '".$token."',
																		".$location."	= '".$qty."' ";
													mysql_query($itemsqllokasi);	
												}else{
													$itemsqllokasi = "UPDATE fs_dtl_lokasi SET 
																		".$location."	= '".$qty."' 
																		WHERE kode_item='".$kode_item."' AND kd_proyek='".$id."' AND token='".$token."' ";
													mysql_query($itemsqllokasi);	
												}
											}
											
													
										}
								}
					/*--------------------------------------------------------*/
					
					$itemSql1 = "INSERT INTO fs_dtl SET 
											kd_proyek	='".$id."',
											kode_item	='".$item['kode_barang']."',
											lokasi      ='".$item['lokasi']."',
											qty		    ='".$item['jumlah']."',
											satuan		='".$item['satuan']."',
											token		='".$token."',
											status		='1' ";
				if(mysql_query($itemSql1)) {
						// Skrip Update stok
						mysql_query("delete from fs_dtl_tmp where kode_item like '".$item['kode_barang']."'");
						$statusupdatesurvey = "UPDATE permintaan_penawaran SET status_blm_tdk_survey = '1' WHERE kode_pp ='".$id."'";
						mysql_query($statusupdatesurvey);
								
					}
											
				}
			
				
				
				//echo "00||".$id;
				unset($_SESSION['data_survey']);
				//$manipulator->save($target_dir . $newNamePrefix);
			  }
			} else {echo "Gagal query: ".mysql_error();
		}
			
	} 
	
	if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "edit" ){
		if(isset($_SESSION['data_survey']) and count($_SESSION['data_survey']) > 0) {
			$kd_survey = $_POST['kd_survey'];
			$id = $_POST['kd_proyek'];
			$token = $_POST['token'];
			$id_form = $_POST['id_form'];
			$foto = $_FILES['UploadFile']['name'];
			$tanggal = date("Y-m-d",strtotime($_POST['tanggal']));
			$fotobaru = date('His').$foto;
			// membuat ref / kode referensi
			$cmd = "SELECT COUNT(id_fs_hdr) AS kode_ref FROM fs_hdr WHERE kd_proyek='$id'";
			$go = mysql_query($cmd);
			$resp = mysql_fetch_array($go);
			$ref = $resp['kode_ref'];


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
			} */


			$mySql	= "INSERT INTO fs_hdr SET 
						kd_proyek	='".$id."', 
						kd_survey = '$kd_survey',
						nama_proyek	='".$_POST['nama_proyek']."',
						ref = '$ref',
						alamat	='".$_POST['alamat']."',
						up	='".$_POST['up']."',
						jabatan	='".$_POST['jabatan']."',
						surveyor	='".$_POST['surveyor']."',
						keterangan	='".$_POST['keterangan']."',
						token	='".$token."',
						tanggal	='".$tanggal."',
						foto	='".$fotobaru."',
						status	='0',
						status_survey = '1',
						lokasi_hdr	='".$_POST['lokasi_hdr']."'";	

			if(mysql_query($mySql)) {
				$array = $_SESSION['data_survey'];
				foreach($array as $key=>$item){
					$kode_item= $item['kode_barang'];
					$location=$item['lokasi'];
					$qty=$item['jumlah'];
					
					/*--------------------------------------------------------*/
					//CEK LOKASI UDAH ADA DI fs_dtl APA BELUM?
							$cek_lokasi_ada = "SELECT COUNT(*) count_lokasi FROM fs_dtl WHERE lokasi='".$location."'";
								$result	= mysql_query($cek_lokasi_ada);
		
								while ($res = mysql_fetch_array($result)) {
									$lokasi_ada = $res['count_lokasi'];
										if($lokasi_ada=='0'){
											//TAMBAHKAN LOKASI DI TABLE fs_dtl_lokasi
											$tambahlokasi = "ALTER TABLE fs_dtl_lokasi ADD ".$location." INT (11) NOT NULL DEFAULT '0'";
											mysql_query($tambahlokasi);
											
											//CEK APAKAH KD_ITEM SDH ADA DI FS_DTL_LOKASI
											$cek_item_ada = "SELECT COUNT(*) count_item FROM fs_dtl_lokasi WHERE kode_item='".$kode_item."' AND kd_proyek='".$id."' AND token='".$token."' ";
											$result2	= mysql_query($cek_item_ada);
											
											while ($res2 = mysql_fetch_array($result2)) {
											$item_ada = $res2['count_item'];
												if($item_ada=='0'){
													//TAMBAHKAN LOKASI DI TABLE fs_dtl_lokasi di LOKASI baru
													$itemsqllokasi = "INSERT INTO fs_dtl_lokasi SET 
																			kd_proyek 		= '".$id."',
																			kode_item 		= '".$kode_item."',
																			token			= '".$token."',
																			".$location."	= '".$qty."' ";
													mysql_query($itemsqllokasi);
												}else{
													//UPDATE lokasi_fs_dtl DI LOKASI BARU
													$itemsqllokasi = "UPDATE fs_dtl_lokasi SET 
																		".$location."	= '".$qty."' 
																		WHERE kode_item='".$kode_item."' AND kd_proyek='".$id."' AND token='".$token."' ";
													mysql_query($itemsqllokasi);														
												}
											}
											
													
										}else{
											//CEK APAKAH KD_ITEM SDH ADA DI FS_DTL_LOKASI
											$cek_item_ada = "SELECT COUNT(*) count_item FROM fs_dtl_lokasi WHERE kode_item='".$kode_item."' AND kd_proyek='".$id."' AND token='".$token."' ";
											$result2	= mysql_query($cek_item_ada);
											
											while ($res2 = mysql_fetch_array($result2)) {
											$item_ada = $res2['count_item'];
												if($item_ada=='0'){
													$itemsqllokasi = "INSERT INTO fs_dtl_lokasi SET 
																		kd_proyek 		= '".$id."',
																		kode_item		= '".$kode_item."',
																		token			= '".$token."',
																		".$location."	= '".$qty."' ";
													mysql_query($itemsqllokasi);	
												}else{
													$itemsqllokasi = "UPDATE fs_dtl_lokasi SET 
																		".$location."	= '".$qty."' 
																		WHERE kode_item='".$kode_item."' AND kd_proyek='".$id."' AND token='".$token."' ";
													mysql_query($itemsqllokasi);	
												}
											}
											
													
										}
								}
					/*--------------------------------------------------------*/
					
					$itemSql1 = "INSERT INTO fs_dtl SET 
											kd_proyek	='".$id."',
											kode_item	='".$item['kode_barang']."',
											lokasi      ='".$item['lokasi']."',
											qty		    ='".$item['jumlah']."',
											satuan		='".$item['satuan']."',
											token		='".$token."',
											status		='1' ";
				if(mysql_query($itemSql1)) {
						// Skrip Update stok
						mysql_query("delete from fs_dtl_tmp where id_form = '".$id_form."'");
						$statusupdatesurvey = "UPDATE permintaan_penawaran SET status_blm_tdk_survey = '1' WHERE kode_pp ='".$id."'";
						mysql_query($statusupdatesurvey);
								
					}
											
				}
			
				
				
				//echo "00||".$id;
				unset($_SESSION['data_survey']);
				//$manipulator->save($target_dir . $newNamePrefix);
			  }
			} else {echo "Gagal query: ".mysql_error();
		}
			
	} 
	
	
?>