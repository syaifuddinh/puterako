<?php include 'script/pp.php'; ?>
<section class="content-header">
       
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Penjualan</a></li>
          <li><a href="#">Track Permintaan Penawaran</a></li>
        </ol>
</section>
<section class="content">
	<div class="col-lg-12">
        <?php
		//TOMBOL PREV
    	$prev = mysql_fetch_array($q_pp_prev); {
        if (isset($prev['id_pp'])){
            ?>
            <a class="btn-lg btn-warning" href="<?=base_url()?>?page=pp_track&action=track&kode=<?=$prev['id_pp']?>">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>
        <?php
		//TOMBOL next	
		} } $next = mysql_fetch_array($q_pp_next); {
        if (isset($next['id_pp'])){
            ?>
            &nbsp;<a class="btn-lg btn-warning" href="<?=base_url()?>?page=pp_track&action=track&kode=<?=$next['id_pp']?>">
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
            <?php
        } }
    
    ?>
    <?php $res = mysql_fetch_array($q_pp); {?>
    &nbsp;<a href="<?=base_url()?>?page=pp" class="btn-lg btn-danger" align="right"><i class=" fa fa-reply"></i> BACK</a>
     <?php if($res['status']<>2){ ?>
     <a href="#modalAddItem" data-toggle="modal" class="btn-lg btn-danger"> CLOSE </a>
     <?php } ?>
    <br>
    <br>



<div class="panel panel-default">
				<div class="panel-body">
               
										<div class="form-group">
											<label class="control-label col-md-6 col-sm-6 col-xs-12">No Permintaan Penawaran</label>
											<input type="text" name="kode_pp" id="kode_pp"  value="<?=$res['kode_pp']?>" class="form-control" readonly="readonly">
                                            
									</div> 
                            
							
										<div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Nama perusahaan</label>
											<input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" value="<?=$res['nama_perusahaan']?>" readonly="readonly">
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Alamat</label>
											<input type="text" name="alamat" id="alamat" value="<?=$res['alamat']?>" class="form-control" readonly="readonly">
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Up</label>
											<input type="text" name="up" id="up" value="<?=$res['up']?>" class="form-control" readonly="readonly">
										</div>
                                         <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Jabatan</label>
											<input type="text" name="jabatan" id="jabatan" value="<?=$res['jabatan']?>" class="form-control" readonly="readonly">
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Contact Person</label>
											<input type="text" name="contact_person" value="<?=$res['contact_person']?>" id="contact_person" class="form-control" readonly="readonly">
										</div>
                                        
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Sales</label>
											<input type="text" name="nama_sales" id="nama_sales" class="form-control" value="<?=$res['nama_sales']?>" readonly="readonly">
										</div>
										<div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Tanggal</label>
											<div>
												<input type="text" name="tanggal" id="datepicker" class="form-control datepicker" value="<?= date("d-m-Y",strtotime($res['tanggal']))?>" readonly="readonly"/>
											</div>  
										</div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Status Survey</label>
                        <div>
                          <input type="text" name="status_survey" class="form-control" value="<?php if($res['status_survey']==1){echo 'Butuh Survey';}else {echo 'Tidak Butuh Survey';}?>" readonly="readonly"/>
                      </div>

                    <div class="form-group">
    										<label class="control-label col-md-2 col-sm-2 col-xs-12">Kategori</label>
    										<div>
    											<select name="kategori" class="form-control" disabled>
                            <?php 
                              $isNone = '';
                              $isService = '';
                              $isSales = '';
                              switch ($res['kategori']) {
                                  case 'service':
                                    $isService = 'selected="selected"';
                                    # code...
                                    break;
                                  
                                  case 'sales':
                                    $isSales = 'selected="selected"';
                                    # code...
                                    break;
                                  
                                  default:
                                    # code...
                                    $isNone = 'selected="selected"';
                                    break;
                                }
                             ?>          
                               <option value="" <?php echo $isNone; ?> >---- Kategori ----</option>
                              <option value="service" <?php echo $isService; ?>>Service</option>
                              <option value="sales" <?php echo $isSales; ?>>Sales</option>
                          </select>
    									</div>

										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Diskripsi</label>
											<div>
												 <textarea class="form-control" rows="10" name="diskripsi" id="diskripsi" placeholder="Diskripsi..." readonly="readonly"><?=$res['diskripsi']?></textarea>
											</div>  
										</div>
                                        <div>
                                        <?php if ($res['status']=='0' OR $res['status_blm_tdk_survey']=='0'){ ; ?>
                                        <a href="<?=base_url()?>?page=form_survey&action=link_to_survey&kode=<?=$res['kode_pp']?>" class="btn-lg btn-info pull-right" align="right"><i class="fa fa-mail-forward"></i> Survey</a>
										<?php }; ?>
                                        </div>
						 <?php }; ?>  
            
            
            </div>
        </div>
    
 <?php 
$msg = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong>Permintaan Penawaran DI TUTUP !!!</strong><br><strong>Alasan : '.$res['alasan_batal'].'</strong></div>';
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
                    <h4 class="modal-title">PEMBATALAN (<?=$res['kode_pp']?>)</h4>
                </div>
<form id="frm" name="frm"  method="post" action="">                  
                <!-- body modal -->                
                <div class="modal-body" style="min-height: 200px">
                    <div class="control-group">
                		<div class="controls alert alert-success">
                        <label class="control-label"> <strong>Alasan Pembatalan</strong></label>
                        <textarea class="form-control" name="alasan_batal" id="alasan_batal" placeholder="Alasan Batal..."></textarea>
                        <input type="hidden" name="batal_pp" id="batal_pp"  value="<?=$res['kode_pp']?>" class="form-control" readonly="readonly">
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
