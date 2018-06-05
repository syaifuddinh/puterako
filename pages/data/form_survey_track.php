<?php include 'script/fs.php'; ?>
<section class="content-header">
       
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Penjualan</a></li>
          <li><a href="#">Track Form Survey</a></li>
        </ol>
</section>
<section class="content">
	<div class="col-lg-12">
        <?php
		//TOMBOL PREV
    	$prev = mysql_fetch_array($q_fs_prev); {
        if (isset($prev['id_fs_hdr'])){
            ?>
            <a class="btn-lg btn-warning" href="<?=base_url()?>?page=form_survey_track&action=track&kode=<?=$prev['id_fs_hdr']?>">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>
        <?php
		//TOMBOL next	
		} } $next = mysql_fetch_array($q_fs_next); {
        if (isset($next['id_fs_hdr'])){
            ?>
            &nbsp;<a class="btn-lg btn-warning" href="<?=base_url()?>?page=form_survey_track&action=track&kode=<?=$next['id_fs_hdr']?>">
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
            <?php
        } }
    
    ?>
    <?php $res = mysql_fetch_array($q_fs_hdr); {?>
    &nbsp;<a href="<?=base_url()?>?page=form_survey" class="btn-lg btn-danger" align="right"><i class=" fa fa-reply"></i> BACK</a>
     <?php if($res['status']<>2){ ?>
     <a href="#modalAddItem" data-toggle="modal" class="btn-lg btn-danger"> CLOSE </a>
     <?php } ?>
     
    <br>
    <br>



<div class="panel panel-default">
				<div class="panel-body">
               
										<form role="form" method="post" action="" id="saveForm" >								
										<div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Kode Proyek</label>
											<input type="text" name="kode_pp" id="kode_pp"  value="<?=$res['kd_proyek']?>" class="form-control" readonly="readonly">
                                       
									    </div> 
                            
										<div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Nama Proyek</label>
											<input type="text" name="nama_proyek" value="<?=$res['nama_proyek']?>" id="nama_proyek" class="form-control" readonly>
										</div>
                                         <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Alamat</label>
											<input type="text" name="alamat" id="alamat" value="<?=$res['alamat']?>" class="form-control" readonly>
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>UP</label>
											<input type="text" name="up" id="up" value="<?=$res['up']?>" class="form-control" readonly>
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Jabatan</label>
											<input type="text" name="jabatan" value="<?=$res['jabatan']?>" id="jabatan" class="form-control" readonly>
										</div>
                                         <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Surveyor</label>
											<input type="text" value="<?=$res['surveyor']?>" name="surveyor" id="surveyor" class="form-control" readonly>
										</div>
                                       
										<div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Tanggal</label>
											<div>
												<input type="date" value="<?=$res['tanggal']?>" name="tanggal" id="datepicker" class="form-control datepicker" readonly/>
											</div>  
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Lokasi</label>
											<input type="text" name="lokasi_hdr" id="lokasi_hdr" class="form-control" value="<?=$res['lokasi_hdr']?>" readonly>
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Keterangan</label>
											<div>
												 <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan..." disabled><?=$res['keterangan']?></textarea>
											</div>  
										</div>
<!--                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Foto Lokasi</label>
											<div>
												 <img src='<?=base_url()?>images/<?=$res['foto']?>' width='110' height='110' align="middle">
											</div>  
										</div> -->
                                       
						 <?php }; ?>  
                         
                         <div class="form-group">
                                        <h3>Matrix Survey Form </h3>
                                        </div>
                                       
                                        <div class="form-group">
                     	                     <div class="col-lg-12">
										<table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="20px">No</th>
                                                    <th>Material dan Equipment</th>
                                                    <th>Lokasi</th>
                                                    <th>Jumlah</th>
                                                    <th>Satuan</th>
<!--                                                    <th>Note</th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="show-item-fs">
                                              <?php
												$n=1; $grand_total= 0; if(isset($_GET['action']) and $_GET['action'] == "track") { 
												while($data = mysql_fetch_array($q_fs_dtl)) { 
										     ?>
                                            <tr><td><?php echo $n++ ?></td>
                                                <td><?php echo $data['kode_item'];?></td>
                                                <td><?php echo $data['lokasi'];?></td>
                                                <td><?php echo $data['qty'];?></td>
                                                <td><?php echo $data['satuan'];?></td>
<!--                                                <td><?php echo $data['note'];?></td> -->
                                               
                                            </tr>
                                            
                                            <?php
											     
											     $grand_total += $data['qty'];
												} }
											?>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
                                        
                                        <div>
                                        	
                                        	<?php 
											//CEK VERSI
											$q_opsi_to_penawaran = mysql_query("SELECT IFNULL(MAX(versi),0) AS versi FROM fs_hdr fsh LEFT JOIN penawaran_hdr p ON p.kode_penawaran=fsh.kd_proyek WHERE fsh.kd_proyek='".$res['kd_proyek']."' ");
											
											$res_opsi = mysql_fetch_array($q_opsi_to_penawaran);
											//CEK KODE TOKEN TERAKHIR PENAWARAN
											$q_token_terakhir = mysql_query("SELECT p.kode_penawaran, p.token FROM fs_hdr fsh LEFT JOIN penawaran_hdr p ON p.kode_penawaran=fsh.kd_proyek WHERE fsh.kd_proyek='".$res['kd_proyek']."' ORDER BY id_penawaran DESC LIMIT 1 ");
											
											$res_token = mysql_fetch_array($q_token_terakhir);
											//AMBIL ID FORM
											$id_form = buatkodeform("kode_form");   
											
											$idtem = "INSERT INTO form_id SET kode_form ='".$id_form."' ";
                            				mysql_query($idtem); 
											
											//JIKA PENAWARAN MASIH BARU BELUM ADA OPSI
											if ($res['status_app']=='0' and $res_opsi['versi']=='0'){ ; ?>
                                        	<a href="<?=base_url()?>?page=penawaran&action=link_to_penawaran&kode=<?=$res['kd_proyek']?>" class="btn-lg btn-info pull-right" align="right"><i class="fa fa-mail-forward"></i> Penawaran 1</a>
											<?php }else{; ?>
                                            <a href="<?=base_url()?>?page=penawaran_opsi&action=opsi&kode=<?=$res['kd_proyek']?>&token=<?=$res_token['token']?>&id_form=<?=$id_form?>" class="btn-lg btn-info pull-right" align="right"><i class="fa fa-mail-forward"></i> Penawaran Opsi Berikutnya</a>
                                            <?php }; ?>
                                        </div>
            
            
            </div>
            
        </div>
    
 <?php 
$msg = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong>Form Survey DI TUTUP !!!</strong><br><strong>Alasan : '.$res['alasan_batal'].'</strong></div>';
if ($res['status']==2) {
						 echo $msg;
					 } else {
						 echo '';
					}
?>  
  </div>   
       <!---------------------------------------END--------------------------------------------><!-- ============ MODAL ADD ITEM =============== -->
<div id="modalAddItem" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">PEMBATALAN (<?=$res['kd_proyek']?>)</h4>
                </div>
<form id="frm" name="frm"  method="post" action="">                  
                <!-- body modal -->                
                <div class="modal-body" style="min-height: 200px">
                    <div class="control-group">
                		<div class="controls alert alert-success">
                        <label class="control-label"> <strong>Alasan Pembatalan</strong></label>
                        <textarea class="form-control" name="alasan_batal" id="alasan_batal" placeholder="Alasan Batal..."></textarea>
                        <input type="hidden" name="batal_fs" id="batal_fs"  value="<?=$res['kd_proyek']?>" class="form-control" readonly="readonly">
     <!--              		<select id="kode_inventori1" class="chzn-select" name="kode_inventori1" data-placeholder="Pilih Barang">
                        	<option value=""></option>
                        	
                    		</select>  -->
<!--                            <input id="tags" type="text" class="form-control" /> -->

                		</div>
            		</div>
                    <br />
            		<div id="detail_barang"></div>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="batal" name="batal"><i class="fa fa-check"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                    
                </div>
</form>                
            </div>
        </div>
    </div>
<!---------------------------------------END-------------------------------------------->                                                
</section>
