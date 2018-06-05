<?php include 'script/f_jasa.php'; ?>


<section class="content-header">
       
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Penjualan</a></li>
          <li><a href="#">Form Jasa</a></li>
        </ol>
</section>

            <!-- /.row -->
            <div class="box box-info">
            <div class="box-body">
            
            <?php
		//TOMBOL PREV
    	$prev = mysql_fetch_array($q_fjasa_prev); {
        if (isset($prev['id_fjasa_hdr'])){
            ?>
            <a class="btn-lg btn-warning" href="<?=base_url()?>?page=form_jasa_track&action=track&kode=<?=$prev['id_fjasa_hdr']?>">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </a>
        <?php
		//TOMBOL next	
		} } $next = mysql_fetch_array($q_fjasa_next); {
        if (isset($next['id_fjasa_hdr'])){
            ?>
            &nbsp;<a class="btn-lg btn-warning" href="<?=base_url()?>?page=form_jasa_track&action=track&kode=<?=$next['id_fjasa_hdr']?>">
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>
            <?php
        } }
    
    ?>
    <?php $res = mysql_fetch_array($q_fjasa_hdr); ?>
    &nbsp;<a href="<?=base_url()?>?page=form_jasa" class="btn-lg btn-danger" align="right"><i class=" fa fa-reply"></i> BACK</a>
     <?php //if($res['status']<>2){ ?>
<!--     <a href="#modalAddItem" data-toggle="modal" class="btn-lg btn-danger"> CLOSE </a> -->
     <?php //} ?>
     
    <br>
    <br>

                             <div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class="active">
													<a data-toggle="tab" href="#menuFormfs">Form Jasa</a>
												</li>
                                                
                                                
											</ul>
		

			<div class="row">
			<div class="tab-content">
				<div id="menuFormfs" class="tab-pane fade in active">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                
									<form role="form" method="post" action="" id="saveForm" >								
										<div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Kode Jasa</label>
											<input type="text" name="kd_jasa" id="kd_jasa" placeholder="Kode Jasa..." class="form-control" value="<?=$res['kd_jasa']?>" autocomplete="off" readonly>
                                            
							
                            
                                          <ul id="search_suggestion_holder" style="margin-left:-40px; min-width:600px; max-width:700px"></ul>   
                                           
									</div> 
                            
										<div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Deskripsi</label>
											<input type="text" name="deskripsi" id="deskripsi" placeholder="Deskripsi Jasa..." value="<?=$res['deskripsi']?>" class="form-control" disabled="disabled">
										</div>
                                       
                                        
                                        
                                        
                                         <div class="form-group">
                                        <h3>&nbsp;</h3>
                                        </div>
                                        <div class="form-group">
											<div class="form-group">
                                           <div class="col-lg-12">  
                                             <div class="pull-right">
                                                                    		
                                             </div>
                                           </div>  
                                         </div>
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Detail Jasa</label>
                                        </div>    
                                        <div class="form-group">
                     	                     <div class="col-lg-12">
										<table id="example2" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="20px">No</th>
                                                    <th>Description</th>
                                                    <th>Vol</th>
                                                    <th>Hari</th>
                                                    <th>Orang</th>
                                                    <th style="text-align:right">Unit</th>
                                                    <th style="text-align:right">Total</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
												$n=1; $grand_total= 0; $total=0; if(isset($_GET['action']) and $_GET['action'] == "track") { 
												while($data = mysql_fetch_array($q_fjasa_dtl)) { 
												$total=(int)($data['vol']*$data['hari']*$data['orang'])*($data['unit'])
										     ?>
                                            <tr>
                                            	<td><?php echo $n++ ?></td>
                                                <td><?php echo $data['description'];?></td>
                                                <td><?php echo $data['vol'];?></td>
                                                <td><?php echo $data['hari'];?></td>
                                                <td><?php echo $data['orang'];?></td>
                                                <td style="text-align:right"><?php echo number_format($data['unit']);?></td>
                                                <td style="text-align:right"><?=number_format($total)?></td>
                                            </tr>
                                            
                                            <?php
											     
											     $grand_total += $total;
												} }
											?>
                                            <tr>
                                            	<td colspan="6" style="text-align:right">Total</td>
                                                <td style="text-align:right"><?=number_format($grand_total)?></td>
                                            </tr>
                                            <tr>
                                            	<td colspan="6" style="text-align:right">Profit <?=$res['profit']?>%</td>
                                                <td style="text-align:right"><?=number_format($res['profit10'])?></td>
                                            </tr>
                                            <tr>
                                            	<td colspan="6" style="text-align:right">Pph 6%</td>
                                                <td style="text-align:right"><?=number_format($res['pph6'])?></td>
                                            </tr>
                                            <tr>
                                            	<td colspan="6" style="text-align:right">Pembulatan</td>
                                                <td style="text-align:right"><b><?=number_format($res['total'])?></b></td>
                                            </tr>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
                                         
									
                          </div>
                        <!-- /.panel-body -->
                    </div>                       
                    <!-- /.panel-default -->
                    
                    
                 
            
            </form>
        
                </div>
                
</div>
				
				
			</div>			
			</div>
			<!-- /.row -->
             <!-- Tambah Item Infrastructure       --->

									
<div class="modal fade" id="tambah_survey" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
												  <button type="button" class="close" data-dismiss="modal">&times;</button>
												  <h4 class="modal-title">Tambah Jasa</h4>
												</div>
		          <div class="col-md-12 pm-min">
                    <form role="form" method="post" action="" id="form-add-jasa">
                        <div class="col-md-12 pm-min-s">
                           
                            <div class="col-md-12 pm-min-s">
                            
                                Description
                                  <label class="control-label"></label>
                                <input type="text" name="description" id="description" class="form-control" placeholder="Description..."/>
                              
                
                            </div>
                             <div class="col-md-4 pm-min-s">
                            <label class="control-label">Vol</label>
                            <input type="number" name="vol" id="vol" placeholder="Vol...." value="1" class="form-control"  tabindex="3"/>
                             </div>
                            
                            <div class="col-md-4 pm-min-s">
                            <label class="control-label">Hari</label>
                            <input type="number" name="hari" id="hari" class="form-control" value="1" tabindex="3"/>
                             </div>
                             
                             <div class="col-md-4 pm-min-s">
                            <label class="control-label">Orang</label>
                            <input type="number" name="orang" id="orang" class="form-control" value="1" tabindex="3"/>
                             </div>
                             
                              <div class="col-md-12 pm-min-s">
                            <label class="control-label">Unit</label>
                            <input type="number" name="unit" id="unit" class="form-control" value="1"  tabindex="3"/>
                             </div>
<!--                              <div class="col-md-12 pm-min-s">
                            <label class="control-label">Note</label>
                             <textarea rows="5" class="form-control" name="note" id="note" placeholder="Note..."></textarea>
                             </div> -->
                           
                             
                        </div>
                   
                    </form>
                    </div>
                               
															
												
												<div class="modal-footer">
                                                <button type="button" name="submit" class="btn btn-success add-to-jasa" tabindex="4" data-dismiss="modal"><i class="fa fa-plus"></i> Tambah</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
							
	
 
 <div class="modal fade" id="edit_jasa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Jasa</h4>
		    </div>
            <div class="modal-body" id="show-item-edit">
                
            </div>
            
												
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>					
               


   