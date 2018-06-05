<?php include 'script/penawaran.php'; ?>
<section class="content-header">
       
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Penjualan</a></li>
          <li><a href="#">Penawaran Track</a></li>
        </ol>
</section>
<section class="content">
	<div class="col-lg-12">
 
		     <?php
            //TOMBOL PREV
            $prev = mysql_fetch_array($q_penawaran_prev); {
            if (isset($prev['id_penawaran'])){
                ?>
                <a class="btn-lg btn-warning" href="<?=base_url()?>?page=penawaran_track&action=track&kode=<?=$prev['id_penawaran']?>">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
            <?php
            //TOMBOL next	
            } } $next = mysql_fetch_array($q_penawaran_next); {
            if (isset($next['id_penawaran'])){
                ?>
                &nbsp;<a class="btn-lg btn-warning" href="<?=base_url()?>?page=penawaran_track&action=track&kode=<?=$next['id_penawaran']?>">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
                <?php
            } }
        
               ?>
           
         &nbsp;<a href="<?=base_url()?>?page=penawaran" class="btn-lg btn-danger" align="right"><i class=" fa fa-reply"></i> BACK</a>
 <?php
			if(isset($_GET['action']) and $_GET['action'] == "track") {
						$row = mysql_fetch_array($penawaran_hdr);
						$sub_total = $row['sub_total'];
						$kode_penawaran = $row['kode_penawaran'];
						$diskon = $row['diskon_hdr'];
						$ppn = $row['ppn'];
						$grand_totaltrack = ($sub_total-$diskon)+$ppn;
									
			} ?>
                                
         <?php if($row['status']<>1){ ?>
     <a href="#modalAddItem" data-toggle="modal" class="btn-lg btn-danger"> CLOSE </a>
     <?php } ?>
             <br>
    <br>
          
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                       
                                
                                <form role="form" method="post" action="">								
										<div class="form-group">
											<label class="control-label col-md-6 col-sm-2 col-xs-12">No Penawaran</label>
											<input type="text" name="kode_penawaran" id="kode_penawaran" value="<?=$row['kode_penawaran']?>" class="form-control" readonly>
                                           
                                        
                                   
                                            
									</div> 
                                    
                                    <div class="form-group">
											<label class="control-label col-md-6 col-sm-6 col-xs-12">Versi</label>
											<input type="text" name="versi" value="<?=$row['versi']?>" id="versi" class="form-control" readonly>
									</div>
                                    
                                    <div class="form-group">
											<label class="control-label col-md-6 col-sm-6 col-xs-12">Dengan Hormat</label>
											<input type="text" name="dengan_hormat" id="dengan_hormat" class="form-control" value="<?=$row['dengan_hormat']?>" placeholder="dengan hormat..." readonly>
									</div>
                                    
                                    <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Tanggal</label>
                                            <div>
												<input type="date" name="tanggal" value="<?=$row['tanggal']?>" id="datepicker" class="form-control datepicker" readonly/>
											</div>  
										</div>
                            
							
										<div class="form-group">
											<label class="control-label col-md-6 col-sm-6 col-xs-12">Kepada Nama Perusahaan</label>
											<input type="text" name="nama_perusahaan" value="<?=$row['kepada']?>" id="nama_perusahaan" class="form-control" readonly>
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Up</label>
											<input type="text" name="up" id="up" value="<?=$row['Up']?>" class="form-control"  readonly>
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Perihal</label>
											<input type="text" name="perihal" id="perihal" value="<?=$row['perihal']?>" class="form-control"  readonly>
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Kategori</label>
											<input type="text" name="kategori" id="kategori" value="<?=$row['kategori']?>" class="form-control"  readonly>
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Hormat Kami</label>
											<input type="text" name="hormat_kami" id="hormat_kami" value="<?=$row['hormat_kami']?>" class="form-control"  readonly>
										</div>
                                       
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Note</label>
											<textarea rows="10" class="form-control" disabled name="note"  id="note" placeholder="Note..." ><?=$row['note']?></textarea>
										</div>
                                   </form>
							
                          
	         
                        </div>
                        <!-- /.panel-body -->
                    </div>                       
                    <!-- /.panel-default -->
                </div>
                <!-- /.col-lg-12 -->
                </div>
                  <?php 
$msg = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong>Permintaan Penawaran DI TUTUP !!!</strong><br><strong>Alasan : '.$row['alasan_batal'].'</strong></div>';
if ($row['status']==1) {
						 echo $msg;
					 } else {
						 echo '';
					}
?>  
                 
            <!-- /.row -->
           <?php
			if(isset($_GET['action']) and $_GET['action'] == "track") {
						$row = mysql_fetch_array($judul1);
									
			} ?>
          
               <div class="form-group">
                                         
               
                                        <h3 style="text-transform:uppercase"> <?=$row['jenis_barang']?></h3>
                                        </div>
                                        
                                        </br>
                                        </br>
                                        <div class="form-group">
                     	                     <div class="col-lg-12">
										<table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="20px">No</th>
                                                    <th>Model</th>
                                                    <th>Description</th>
                                                    <th width="50px" class="text-center">Qty</th>
                                                    <th>Satuan</th>
                                                    <th>Harga</th>
                                                    <th>Note</th>
                                                    <th>Total</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
												$n=1; $grand_total= 0; if(isset($_GET['action']) and $_GET['action'] == "track") { 
												while($data = mysql_fetch_array($infrastructure)) { 
										     ?>
                                            <tr><td><?php echo $n++ ?></td>
                                                <td><?php echo $data['model_item'];?></td>
                                                <td><?php echo $data['description_item'];?></td>
                                                <td><?php echo $data['qty'];?></td>
                                                <td><?php echo $data['satuan'];?></td>
                                                <td><?php echo number_format ($data['harga']);?></td>
                                                <td><?php echo ($data['note']);?></td>
                                                <td><?php echo number_format ($data['total']);?></td>
                                            </tr>
                                            
                                            <?php
											     
											     $grand_total += $data['total'];
												} }
											?>
                                            <tr>
                                            <td colspan="6" class="text-right"> <b>Total Nett Rp</b></td> 
                                            <td colspan="5"><?php echo number_format($grand_total);?></td>
                                            </tr>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
                                         <?php
										if(isset($_GET['action']) and $_GET['action'] == "track") {
													$row = mysql_fetch_array($judul2);
																
										} ?>
										<div class="form-group">
                                        <h3 style="text-transform:uppercase"> <?=$row['jenis_barang']?></h3>
                                        </div>
                                       
                                        </br>
                                        </br>
                                        <div class="form-group">
                     	                     <div class="col-lg-12">
										<table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="20px">No</th>
                                                    <th>Description</th>
                                                    <th width="50px" class="text-center">Qty</th>
                                                    <th>Satuan</th>
                                                    <th>Harga</th>
                                                    <th>Note</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                           <?php
												$n=1; $grand_total1= 0; if(isset($_GET['action']) and $_GET['action'] == "track") { 
												while($data = mysql_fetch_array($material)) { 
										     ?>
                                            <tr><td><?php echo $n++ ?></td>
                                                <td><?php echo $data['description_item'];?></td>
                                                <td><?php echo $data['qty'];?></td>
                                                <td><?php echo $data['satuan'];?></td>
                                                <td><?php echo number_format($data['harga']);?></td>
                                                <td><?php echo ($data['note']);?></td>
                                                <td><?php echo number_format($data['total']);?></td>
                                               
                                            </tr>
                                            <?php
											    
											     $grand_total1 += $data['total'];
												} }
											?>
                                            <tr>
                                            <td colspan="5" class="text-right"> <b>Total Nett Rp</b></td> 
                                            <td colspan="4"><?php echo number_format($grand_total1);?></td>
                                            </tr>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
                                        <?php
										if(isset($_GET['action']) and $_GET['action'] == "track") {
													$row = mysql_fetch_array($judul3);
																
										} ?>
                                         <div class="form-group">
                                        <h3 style="text-transform:uppercase"> <?=$row['jenis_barang']?></h3>
                                        </div>
                                        
                                        </br>
                                        </br>
                                        <div class="form-group">
                     	                     <div class="col-lg-12">
										<table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="20px">#</th>
                                                    <th>Description</th>
                                                    <th width="50px" class="text-center">Qty</th>
                                                    <th>Satuan</th>
                                                    <th>Harga</th>
                                                    <th>Note</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                           <?php
												$n=1;$grand_total2= 0; if(isset($_GET['action']) and $_GET['action'] == "track") { 
												while($data = mysql_fetch_array($jasa)) { 
										     ?>
                                            <tr><td><?php echo $n++ ?></td>
                                                <td><?php echo $data['description_item'];?></td>
                                                <td><?php echo $data['qty'];?></td>
                                                <td><?php echo $data['satuan'];?></td>
                                                <td><?php echo number_format ($data['harga']);?></td>
                                                <td><?php echo ($data['note']);?></td>
                                                <td><?php echo number_format ($data['total']);?></td>
                                               
                                            </tr>
                                            <?php
											    $grand_total2 += $data['total'];
												} }
											?>
                                            <tr>
                                            <td colspan="5" class="text-right"> <b>Total Nett Rp</b></td> 
                                            <td colspan="4"><?php echo number_format($grand_total2);?></td>
                                            </tr>
                                            
                                            </tbody>
                                            <tr>
                                            <td colspan="5" class="text-right"> <b>Sub Total Alt 1 Rp.
                                </b></td> 
                                            <td colspan="4"> <?php echo number_format($sub_total);?></td>
                                            
                                            </tr>
                                            <tr>
                                            <td colspan="5" class="text-right"> <b>Diskon
                                </b></td> 
                                            <td colspan="4"> <?php echo number_format($diskon);?></td>
                                            
                                            </tr>
                                            <tr>
                                            <td colspan="5" class="text-right"> <b>PPn 10%
                                </b></td> 
                                            <td colspan="4"> <?php echo number_format($ppn);?></td>
                                            
                                            </tr>
                                            <tr>
                                            <td colspan="5" class="text-right"> <b>Grand Total Rp.
                                
                                </b></td> 
                                            <td colspan="4"> <?php echo number_format($grand_totaltrack);?></td>
                                            
                                            </tr>
                                        </table>
										</div>
                                        </div>
									
										
									</form>
                                    
                                    </div>
                                </div>
  
                         </div>
                         </div>
                        
                           <!---------------------------------------END--------------------------------------------><!-- ============ MODAL ADD ITEM =============== -->
<div id="modalAddItem" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">PEMBATALAN (<?=$kode_penawaran?>)</h4>
                </div>
<form id="frm" name="frm"  method="post" action="">                  
                <!-- body modal -->                
                <div class="modal-body" style="min-height: 200px">
                    <div class="control-group">
                		<div class="controls alert alert-success">
                        <label class="control-label"> <strong>Alasan Pembatalan</strong></label>
                        <textarea class="form-control" name="alasan_batal" id="alasan_batal" placeholder="Alasan Batal..."></textarea>
                        <input type="hidden" name="kode_penawaran" id="kode_penawaran"  value="<?=$kode_penawaran?>" class="form-control" readonly="readonly">
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
                    <button type="submit" class="btn btn-primary" id="batal_penawaran" name="batal_penawaran"><i class="fa fa-check"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Close</button>
                    
                </div>
</form>                
            </div>
        </div>
    </div>
<!---------------------------------------END-------------------------------------------->

  </div>
</section>          
		
                
						
  
        <!-- /#page-wrapper -->