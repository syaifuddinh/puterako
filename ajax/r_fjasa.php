<?php
	session_start();
	require('../library/conn.php');
	require('../library/helper.php');
	require_once('../library/ImageManipulator.php');
	date_default_timezone_set("Asia/Jakarta");
	/*if( isset( $_REQUEST['keyword'] ) and $_REQUEST['keyword'] != "" )
	{

		$keyword		=		$_REQUEST['keyword'];
		$query			=		"SELECT * from permintaan_penawaran WHERE status ='0' and status_survey = '1' and status_blm_tdk_survey = '0' and (kode_pp LIKE '%$keyword%' or nama_perusahaan LIKE '%$keyword%') limit 10";
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
	}*/
	
	
	//-------------------------FS------------------------------------------////
	
		if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "add" )
	{
		

		if(isset($_POST['description']) and @$_POST['description'] != ""){
			$id_form=$_POST['id_form'];
			$totalsf=(int)(($_POST['orang'] * $_POST['vol'] * $_POST['hari']) * $_POST['unit']);
			$itemsf = "INSERT INTO fjasa_dtl_tmp SET 
											description		='".$_POST['description']."',
											vol      		='".$_POST['vol']."',
											hari		    ='".$_POST['hari']."',
											orang			='".$_POST['orang']."',
											unit			='".$_POST['unit']."',
											id_form			='".$id_form."',
											total			='".$totalsf."' ";
			mysql_query($itemsf);
			
			$query			= "SELECT * FROM fjasa_dtl_tmp WHERE id_form='".$_POST['id_form']."'";
			$result			= mysql_query($query);
			
			$array = array();
			if(mysql_num_rows($result) > 0) {
				while ($res = mysql_fetch_array($result)) {
					
					if(!isset($_SESSION['data_jasa'.$id_form.''])) {

					
					$array[$res['id_fjasa_dtl']] = array("id" => $res['id_fjasa_dtl'],"description" => $res['description'], "vol" => $res['vol'], "orang" => $res['orang'], "hari" => $res['hari'], "unit" => $res['unit'], "total" => $res['total'], "id_form" => $res['id_form']);
				} else {
					$total=(int)($res['vol'] * $res['orang'] * $res['hari'] * $res['unit']);
					$array = $_SESSION['data_jasa'.$id_form.''];
					
						$array[$res['id_fjasa_dtl']] = array("id" => $res['id_fjasa_dtl'],"description" => $res['description'], "vol" => $res['vol'], "orang" => $res['orang'], "hari" => $res['hari'], "unit" => $res['unit'], "total" => $res['total'], "id_form" => $res['id_form']);
					}
				   
				}
			}
				$_SESSION['data_jasa'.$id_form.''] = $array;
				echo view_item_jasa($array);
			 
		}
		
	}
	
	if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "editfjasa" )
	{
	if(isset($_POST['description']) and @$_POST['description'] != ""){
			$id_form=$_POST['id_form'];
			$totalsf2=(int)(($_POST['orang'] * $_POST['vol'] * $_POST['hari']) * $_POST['unit']);
	
			$itemsf2 = "UPDATE fjasa_dtl_tmp SET 
											description	='".$_POST['description']."',
											vol     ='".$_POST['vol']."',
											orang	='".$_POST['orang']."',
											hari	='".$_POST['hari']."', 
											unit	='".$_POST['unit']."',
											total	='".$totalsf2."' 
											WHERE id_fjasa_dtl ='".$_POST['id']."' ";
			mysql_query($itemsf2);
			
			$query			= "SELECT * FROM fjasa_dtl_tmp WHERE id_form='".$_POST['id_form']."'";
			$result			= mysql_query($query);
			
			$array = array();
			if(mysql_num_rows($result) > 0) {
				while ($res = mysql_fetch_array($result)) {
					
						$array[$res['id_fjasa_dtl']] = array("id" => $res['id_fjasa_dtl'],"description" => $res['description'], "vol" => $res['vol'], "orang" => $res['orang'], "hari" => $res['hari'], "unit" => $res['unit'], "total" => $res['total'], "id_form" => $res['id_form']);
					}
				   
				
			}
					
				$_SESSION['data_jasa'.$id_form.''] = $array;
				echo view_item_jasa($array);
			 
		}
		
	}
	
	
			
	
	
	
	if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "hapus-jasa" )
	{
		$id = $_POST['idhapus'];
		$id_form = $_POST['id_form'];
		$itemdelete = "DELETE FROM fjasa_dtl_tmp WHERE id_fjasa_dtl = '".$id."'";
		mysql_query($itemdelete);
		unset($_SESSION['data_jasa'.$id_form.''][$id]);
		echo view_item_jasa($_SESSION['data_jasa'.$id_form.'']);
	}
	
	
	
	
	function view_item_jasa($data) {
		$n = 1;
		$html = "";
		$grandtotal = 0;
		$profit10= 0;
		$pph6= 0;
		$total= 0;
		$pembulatan= 0;
		if(count($data) > 0) {
			foreach($data as $key=>$item){
				//$id_tmp=$item['id'];
				
				$total += ceil($item['total']);
				$profit10 = ceil($total);
				$pph6 = ceil($profit10/0.94);
				//PEMBULATAN
				/*---------------------------
				$ratusan = substr($pph6, -3);
 				if($ratusan<500)
 				$akhir = $pph6 - $ratusan;
 				else
 				$akhir = $pph6 + (1000-$ratusan);
				--------------------------*/
				$pembulatan =($pph6);
				
				$html .= '<tr><td>'.$n++.'</td>
					<td>'.$item['description'].'<input type="hidden" data-id="id_form" value='.$item['id_form'].' class="form-control" placeholder="id_form..."/></td>
					<td>'.$item['vol'].'</td>
					<td>'.$item['hari'].'</td>
					<td>'.$item['orang'].'</td>
					<td style="text-align:right">'.number_format($item['unit']).'</td>
					<td style="text-align:right">'.number_format($item['total']).'</td>
					<td>
					<!-- <a href="" class="label label-primary" data-toggle="modal"  data-target="#tambah_jasa"><i class="fa fa-plus-circle"></i></a> -->
					<a href="javascript:;" class="label label-info edit_jasa" data-toggle="modal" data-target="#edit_jasa" data-id="'.$item['id'].'"><i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="label label-danger hapus-jasa" data-id="'.$key.'"><i class="fa fa-times"></i></a>           </td>
				</tr>';
				
			}
			$html .=
					'<tr>
					<td colspan="6" style="text-align:right">Total</td>	
					<td colspan="1" style="text-align:right"><input type="hidden" value="'.$total.'" id="b_total" name="b_total" data-id="b_total"><b>'.number_format($total).'</b></td>
					<td></td>
					</tr>
					
					<tr>
					<td colspan="6" style="text-align:right">Profit (%) <input style="width:50px" type="number" placeholder="Profit" value="0" id="profit" name="profit" data-id="profit" ></td>	
					<td colspan="1" style="text-align:right"><input type="number" readonly value="'.$profit10.'" id="b_profit10" name="b_profit10"></td>
					<td></td>
					</tr> 
			
					<tr>
					<td colspan="6" style="text-align:right">Pph 6%</td>	
					<td colspan="1" style="text-align:right"><input type="number" readonly value="'.$pph6.'" id="b_pph6" name="b_pph6"></td>
					<td></td>
					</tr>
					
					
					<tr>
					<td colspan="6" style="text-align:right">Pembulatan</td>	
					<td colspan="1" style="text-align:right"><input type="number" value="'.$pembulatan.'" id="b_grand_total" name="b_grand_total"></td>
					<td></td></tr>';
			$html .= "<script>$('.hapus-jasa').click(function(){
						var id =	$(this).attr('data-id'); 
						var id_form = $('#id_form').val();
						$.ajax({
							type: 'POST',
							url: '".base_url()."ajax/r_fjasa.php?func=hapus-jasa',
							data: 'idhapus=' + id + '&id_form=' +id_form,
							cache: false,
							success:function(data){
								$('#show-item-fjasa').html(data).show();
							 }
						  });
					  });
					  
					  	$(document).on(\"change paste keyup\", \"input[data-id='profit']\", function(){
							var subtotal = $('#b_total').val();
							var profit = $(this).val();
							var persen_profit = parseInt(100-profit);
							var nominal_profit = Math.ceil(subtotal/(persen_profit/100));		
							var pph6 = Math.ceil(nominal_profit/0.94);	
						
							$('[name=\"b_profit10\"]').val(nominal_profit);
							
							$('[name=\"b_pph6\"]').val(pph6);
							
							$('[name=\"b_grand_total\"]').val(pph6);
						});
					  
				     </script>";
				
		} else {
			$html .= '<tr> <td colspan="10" class="text-center"> Tidak ada item . </td></tr>';
		}
		
		$html  .= "<script>$('.edit_jasa').click(function(){
						var id =	$(this).attr('data-id'); 
						var id_form = $('#id_form').val();
						$.ajax({
							type: 'POST',
							url: '".base_url()."ajax/r_fjasa.php?func=edit_jasa',
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
	
	if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "edit_jasa" ){
		
		$id				= $_POST['id'];
		$query			= "SELECT * from fjasa_dtl_tmp WHERE id_fjasa_dtl = '".$id."' ";
		$result			= mysql_query($query);
		
		while ($res = mysql_fetch_array($result)) {
		echo ' <div class="col-md-12 pm-min">
                    <form role="form" method="post" action="" id="form-edit-jasa">
                        <div class="col-md-12 pm-min-s">
                           
                            <div class="col-md-12 pm-min-s">
                                Description
                                  <label class="control-label"></label>
                                <input type="text" name="description" id="description" value='.$res['description'].' class="form-control" placeholder="Description..."/> <input type="hidden" name="id" id="id" value='.$res['id_fjasa_dtl'].' class="form-control" placeholder="Description..."/> <input type="hidden" name="id_form" id="id_form" value='.$res['id_form'].' class="form-control" placeholder="Description..."/>
                              
                
                            </div>
                             <div class="col-md-4 pm-min-s">
                            <label class="control-label">Vol</label>
                            <input type="number" name="vol" id="vol" placeholder="Vol...." value='.$res['vol'].' class="form-control"  tabindex="3"/>
                             </div>
                            
                            <div class="col-md-4 pm-min-s">
                            <label class="control-label">Hari</label>
                            <input type="number" name="hari" id="hari" class="form-control" value='.$res['hari'].' tabindex="3"/>
                             </div>
                             
                             <div class="col-md-4 pm-min-s">
                            <label class="control-label">Orang</label>
                            <input type="number" name="orang" id="orang" class="form-control" value='.$res['orang'].' tabindex="3"/>
                             </div>
                             
                              <div class="col-md-12 pm-min-s">
                            <label class="control-label">Unit</label>
                            <input type="number" name="unit" id="unit" class="form-control" value='.$res['unit'].'  tabindex="3"/>
                             </div>
                             
                        </div>
                   
                    </form>
                    </div>
					<div class="modal-footer">
                                                <button type="button" name="submit" class="btn btn-success edit-to-jasa" tabindex="4" data-dismiss="modal"><i class="fa fa-plus"></i> Update</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>';
	echo "<script>$('.edit-to-jasa').click(function(){
						var id =	$(this).attr('data-id'); 
						$.ajax({
							type: 'POST',
							url: '".base_url()."ajax/r_fjasa.php?func=editfjasa',
							data: $('#form-edit-jasa').serialize(),
							cache: false,
							success:function(data){
								$('#show-item-fjasa').html(data).show();
				  				$('#description').val('');
								$('#vol').val('1'); $('#hari').val('1');$('#orang').val('1');$('#unit').val('1'); 
							}
						});
					});
				  </script>";
		}
		
	
		
	}
	
	
	
	if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "save" ){
		$id_form = $_POST['id_form'];
		if(isset($_SESSION['data_jasa'.$id_form.'']) and count($_SESSION['data_jasa'.$id_form.'']) > 0) {
			$id = $_POST['kd_jasa'];
			$token = $_POST['token'];
			$tgl_input = date("Y-m-d H:i:s");
		
			$mySql	= "INSERT INTO fjasa_hdr SET 
						kd_jasa		='".$id."', 
						deskripsi	='".$_POST['deskripsi']."',
						token		='".$token."',
						tgl_input	='".$tgl_input."',
						status		='0',
						subtotal	='".$_POST['b_total']."',
						profit10	='".$_POST['b_profit10']."',
						pph6		='".$_POST['b_pph6']."',
						profit		='".$_POST['profit']."',
						total		='".$_POST['b_grand_total']."' ";	
			if(mysql_query($mySql)) {
				$array = $_SESSION['data_jasa'.$id_form.''];
				foreach($array as $key=>$item){
					$itemSql1 = "INSERT INTO fjasa_dtl SET 
											kd_jasa		='".$id."',
											description	='".$item['description']."',
											vol      	='".$item['vol']."',
											hari		='".$item['hari']."',
											orang		='".$item['orang']."',
											unit		='".$item['unit']."',
											token		='".$token."' ";
				if(mysql_query($itemSql1)) {
						// Skrip Update stok
						/*$statusupdatesurvey = "UPDATE permintaan_penawaran SET status_blm_tdk_survey = '1' WHERE kode_pp ='".$id."'";
						mysql_query($statusupdatesurvey);*/
								
					}
											
				}
			
				mysql_query("DELETE FROM fjasa_dtl_tmp WHERE id_form = '".$id_form."'");
				
				//echo "00||".$id;
				unset($_SESSION['data_jasa'.$id_form.'']);
				//$manipulator->save($target_dir . $newNamePrefix);
			  }
			} else {echo "Gagal query: ".mysql_error();
		}
			
	} 
	
	if( isset( $_REQUEST['func'] ) and @$_REQUEST['func'] == "edit" ){
		$id_form = $_POST['id_form'];
		if(isset($_SESSION['data_jasa'.$id_form.'']) and count($_SESSION['data_jasa'.$id_form.'']) > 0) {
			$id = $_POST['kd_jasa'];
			$token = $_POST['token'];
			$tgl_input = date("Y-m-d H:i:s");
		
			$mySql	= "INSERT INTO fjasa_hdr SET 
						kd_jasa		='".$id."', 
						deskripsi	='".$_POST['deskripsi']."',
						token		='".$token."',
						tgl_input	='".$tgl_input."',
						status		='0',
						subtotal	='".$_POST['b_total']."',
						profit10	='".$_POST['b_profit10']."',
						pph6		='".$_POST['b_pph6']."',
						profit		='".$_POST['profit']."',
						total		='".$_POST['b_grand_total']."' ";	
			if(mysql_query($mySql)) {
				$array = $_SESSION['data_jasa'.$id_form.''];
				foreach($array as $key=>$item){
					$itemSql1 = "INSERT INTO fjasa_dtl SET 
											kd_jasa		='".$id."',
											description	='".$item['description']."',
											vol      	='".$item['vol']."',
											hari		='".$item['hari']."',
											orang		='".$item['orang']."',
											unit		='".$item['unit']."',
											token		='".$token."' ";
				if(mysql_query($itemSql1)) {
						// Skrip Update stok
						/*$statusupdatesurvey = "UPDATE permintaan_penawaran SET status_blm_tdk_survey = '1' WHERE kode_pp ='".$id."'";
						mysql_query($statusupdatesurvey);*/
								
					}
											
				}
			
				mysql_query("DELETE FROM fjasa_dtl_tmp WHERE id_form = '".$id_form."'");
				
				//echo "00||".$id;
				unset($_SESSION['data_jasa'.$id_form.'']);
				//$manipulator->save($target_dir . $newNamePrefix);
			  }
			} else {echo "Gagal query: ".mysql_error();
		}
			
	} 
	
	
?>