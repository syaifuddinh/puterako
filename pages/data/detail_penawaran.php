<?php include 'script/penawaran.php'; ?>
<section class="content-header">
       
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Dashboard</a></li>
        </ol>
</section>
 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Penawaran</h1>
                </div>
                <!-- /.col-lg-12 -->
               
            </div>
            
            <?php
		//TOMBOL PREV
    	$prev = mysql_fetch_array($q_coa_prev); {
        if (isset($prev['id_kat_coa'])){
            ?>
            <a class="btn-lg btn-warning" href="<?=base_url()?>?page=kat_coa_track&action=track&id_kat_coa=<?=$prev['id_kat_coa']?>">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>
        <?php
		//TOMBOL next	
		} } $next = mysql_fetch_array($q_coa_next); {
        if (isset($next['id_kat_coa'])){
            ?>
            &nbsp;<a class="btn-lg btn-warning" href="<?=base_url()?>?page=kat_coa_track&action=track&id_kat_coa=<?=$next['id_kat_coa']?>">
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
            <?php
        } }
    
           ?>
           
            <a href="<?=base_url()?>?page=penawaran" class="btn btn-danger"  ><i class=" fa fa-reply"></i> Back</a>
          
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        
                         <?php
								if(isset($_GET['action']) and $_GET['action'] == "track") {
									$row = mysql_fetch_array($penawaran_hdr);
									
								} ?>
                                
                                <form role="form" method="post" action="" id="saveForm">								
										<div class="form-group">
											<label class="control-label col-md-6 col-sm-2 col-xs-12">No Penawaran</label>
											<input type="text" name="kode_penawaran" id="kode_penawaran" value="<?=$row['kode_penawaran']?>" class="form-control" readonly>
                                           
                                        
                                   
                                            
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
											<label class="control-label col-md-2 col-sm-2 col-xs-12">No PIB</label>
											<input type="text" name="no_pib" id="no_pib" value="<?=$row['no_pib']?>" class="form-control"  readonly>
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Note</label>
											<textarea class="form-control" disabled name="note"  id="note" placeholder="Note..." ><?=$row['note']?></textarea>
										</div>
                                   </form>
							
                          
	         
                        </div>
                        <!-- /.panel-body -->
                    </div>                       
                    <!-- /.panel-default -->
                </div>
                <!-- /.col-lg-12 -->
                 </div>
            <!-- /.row -->
          
               <div class="form-group">
                                        <h3> Quotation : Infrastructure</h3>
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
                                                    <th>Total</th>
                                                    <th width="40px">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr><td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>';
                                            </tbody>
                                        </table>
										</div>
                                        </div>
                                         <div class="form-group">
                                        <h3> Material Infrastructure</h3>
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

                                                    <th>Total</th>
                                                    <th width="40px">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody id="show-item-material">
                                            <tr> <td colspan="10" class="text-center"> Tidak ada item . </td></tr>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
                                         <div class="form-group">
                                        <h3>Jasa</h3>
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
                                                    <th>Total</th>
                                                    <th width="40px">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody id="show-item-jasa">
                                            <tr> <td colspan="10" class="text-center"> Tidak ada item . </td></tr>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
									
										
									</form>
                                    
                                    </div>
                                </div>
                         </div>
                         </div>

              
		
                
						
  
        <!-- /#page-wrapper -->