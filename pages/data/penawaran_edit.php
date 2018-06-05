<?php include 'script/penawaran.php'; ?>

<section class="content-header">
       
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Penjualan</a></li>
          <li><a href="#">REVISI Penawaran</a></li>
        </ol>
</section>

            <!-- /.row -->
            <div class="box box-info">
            <div class="box-body">

                             <div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class="active">
													<a data-toggle="tab" href="#menuFormPp">Revisi Penawaran</a>
												</li>
                                               
                                                
											</ul>
                              </div>
                              
		

			<div class="row">
			<div class="tab-content">
				<div id="menuFormPp" class="tab-pane fade in active">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">
                                <?php
								if(isset($_GET['action']) and $_GET['action'] == "edit") {
									$row = mysql_fetch_array($q_edit);
									
								}
								?>
                         
									<form role="form" method="post" action="">								
										<div class="form-group">
											<label class="control-label col-md-6 col-sm-2 col-xs-12">No Penawaran</label>
											<input type="text" name="kode_penawaran" id="kode_penawaran" url="<?=base_url()?>ajax/r_penawaran.php" class="form-control" value="<?=(isset($row['kode_penawaran']) ? $row['kode_penawaran'] : '')?>" readonly="readonly" placeholder="Input Kode Penawaran / Ambil Data Dari PP" >
                                           
                                         <input type="hidden" value="<?=RandomString() ?>"  id="token" name="token" class="form-control" >
                                   
                                      <ul id="search_suggestion_holder" style="margin-left:-40px; min-width:600px; max-width:700px"></ul>      
									</div> 
                                    <div class="form-group">
											<label class="control-label col-md-6 col-sm-6 col-xs-12">Versi</label>
											<input type="text" name="versi" value="<?=(isset($row['kode_penawaran']) ? $row['versi'] : '')?>" id="versi" class="form-control" placeholder="versi...">
									</div>
                                    <div class="form-group">
											<label class="control-label col-md-6 col-sm-6 col-xs-12">Dengan Hormat</label>
											<input type="text" name="dengan_hormat" id="dengan_hormat" class="form-control" value="<?=(isset($row['kode_penawaran']) ? $row['dengan_hormat'] : '')?>" placeholder="dengan hormat...">
									</div>
                                    
                                    <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Tanggal</label>
											<div>
												<input type="date" value="<?=(isset($row['kode_penawaran']) ? $row['tanggal'] : '')?>" name="tanggal" id="datepicker" class="form-control datepicker" readonly="readonly"/>
											</div>  
										</div>
                            
							
										<div class="form-group">
											<label class="control-label col-md-6 col-sm-6 col-xs-12">Kepada Nama Perusahaan</label>
											<input type="text" name="nama_perusahaan" value="<?=(isset($row['kode_penawaran']) ? $row['kepada'] : '')?>" id="nama_perusahaan" class="form-control" placeholder="Kepada Perusahaan Yang Di Beri Penawaran..." readonly="readonly">
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Up</label>
											<input type="text" name="up" id="up" value="<?=(isset($row['kode_penawaran']) ? $row['Up'] : '')?>" class="form-control" placeholder="Up..." >
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Perihal</label>
											<input type="text" value="<?=(isset($row['kode_penawaran']) ? $row['perihal'] : '')?>" name="perihal" id="perihal" class="form-control" placeholder="Perihal..." >
										</div>
                                        
                                       
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Note</label>
											<textarea rows="10" class="form-control" name="note" id="note" placeholder="Note..." ><?=(isset($row['kode_penawaran']) ? $row['note'] : '')?>	
</textarea>
										</div>
										
										
										
										
										 <?php
										if(isset($_GET['action']) and $_GET['action'] == "edit") {
													$row = mysql_fetch_array($judul1);
																
										} ?>
                                        <div class="form-group">
                                       <h3 style="text-transform:uppercase"> <input type="hidden" name="judul1" id="judul1" value="<?=$row['jenis_barang']?>"  /><?=$row['jenis_barang']?></h3>
                                        </div>
                                        <div class="form-group">
											<div class="form-group">
                                           <div class="col-lg-12">  
                                             <div class="pull-right">
                                                      		
                                             </div>
                                           </div>  
                                         </div>
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
                                            <?php
								$n=1; $grand_total= 0; if(isset($_GET['action']) and $_GET['action'] == "edit") { 
										while($data = mysql_fetch_array($q_infra)) { 
								
								?>
                                            <tbody>
                                            <tr> 
                                            <td><?php echo $n++ ?></td>
                                            <td><?php echo $data['model_item'];?><input type="hidden" name="model_item[]" id="model_item" value="<?php echo $data['model_item'];?>" /><input type="hidden" name="kode_penawaran_dtl1[]" id="kode_penawaran_dtl1" value="<?php echo $data['kode_penawaran'];?>"  /></td>
                                            <td><input type="text" name="description[]" id="description" value="<?php echo $data['description_item'];?>"  /></td>
                                            <td><input type="text" name="jumlah[]" id="jumlah" value="<?php echo $data['qty'];?>"  /></td>
                                            <td><input type="text" name="satuan[]" id="satuan" value="<?php echo $data['satuan'];?>"  /></td>
                                            <td><input type="text" name="harga[]" id="harga" value="<?php echo  ($data['harga']);?>"  /></td>
                                             <td><input type="text" name="note[]" id="note" value="<?php echo  ($data['note']);?>"  /></td>
                                            <td><input type="text" name="total[]" id="total" value="<?php echo  ($data['total']);?>"  />
                                            <input type="hidden" name="profit[]" id="profit" value="<?php echo  ($data['profit']);?>"  />
                                            <input type="hidden" name="diskon[]" id="diskon" value="<?php echo  ($data['diskon']);?>"  /></td>
                                            </tr>
                                            <?php
											     
											     $grand_total += $data['total'];
												} }
											?>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
                                          <?php
										if(isset($_GET['action']) and $_GET['action'] == "edit") {
													$row = mysql_fetch_array($judul2);
																
										} ?>
                                        <div class="form-group">
                                       <h3 style="text-transform:uppercase"><input type="hidden" name="judul2" id="judul2" value="<?=$row['jenis_barang']?>"  /> <?=$row['jenis_barang']?></h3>
                                        </div>
                                        <div class="form-group">
											<div class="form-group">
                                           <div class="col-lg-12">  
                                             <div class="pull-right">
                                                 		
                                             </div>
                                           </div>  
                                         </div>
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
                                            <?php
								$n=1; $grand_total= 0; if(isset($_GET['action']) and $_GET['action'] == "edit") { 
										while($data = mysql_fetch_array($q_material)) { 
								
								?>
                                            <tbody >
                                            <tr> 
                                            <td><?php echo $n++ ?></td>
                                           <td><?php echo $data['description_item'];?><input type="hidden" name="description2[]" id="description2" value="<?php echo $data['description_item'];?>"  /><input type="hidden" name="kode_penawaran_dtl2[]" id="kode_penawaran_dtl2" value="<?php echo $data['kode_penawaran'];?>"  /></td>
                                            <td><input type="text" name="jumlah2[]" id="jumlah2" value="<?php echo $data['qty'];?>"  /></td>
                                            <td><input type="text" name="satuan2[]" id="satuan2" value="<?php echo $data['satuan'];?>"  /></td>
                                            <td><input type="text" name="harga2[]" id="harga2" value="<?php echo $data['harga'];?>"  /></td>
                                             <td><input type="text" name="note2[]" id="note2" value="<?php echo $data['note'];?>"  /></td>
                                            <td><input type="text" name="total2[]" id="total2" value="<?php echo $data['total'];?>"  />
                                            <input type="hidden" name="profit2[]" id="profit2" value="<?php echo  ($data['profit']);?>"  />
                                            <input type="hidden" name="diskon2[]" id="diskon2" value="<?php echo  ($data['diskon']);?>"  /></td>
                                            </tr>
                                            <?php
											     
											     $grand_total += $data['total'];
												} }
											?>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
                                         <?php
										if(isset($_GET['action']) and $_GET['action'] == "edit") {
													$row = mysql_fetch_array($judul3);
																
										} ?>
                                        <div class="form-group">
                                       <h3 style="text-transform:uppercase"><input type="hidden" name="judul3" id="judul3" value="<?=$row['jenis_barang']?>"  /> <?=$row['jenis_barang']?></h3>
                                        </div>
                                        <div class="form-group">
											<div class="form-group">
                                           <div class="col-lg-12">  
                                             <div class="pull-right">
                                                     		
                                             </div>
                                           </div>  
                                         </div>
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
                                             <?php
								$n=1; $grand_total= 0; if(isset($_GET['action']) and $_GET['action'] == "edit") { 
										while($data = mysql_fetch_array($q_jasa)) { 
								
								?>
                                            <tbody >
                                            <tr> 
                                            <td><?php echo $n++ ?></td>
                                            <td><?php echo $data['description_item'];?><input type="hidden" name="description3[]" id="description3" value="<?php echo $data['description_item'];?>"  /><input type="hidden" name="kode_penawaran_dtl[]3" id="kode_penawaran_dtl3" value="<?php echo $data['kode_penawaran'];?>"  /></td>
                                            <td><input type="text" name="jumlah3[]" id="jumlah3" value="<?php echo $data['qty'];?>"  /></td>
                                            <td><input type="text" name="satuan3[]" id="satuan3" value="<?php echo $data['satuan'];?>"  /></td>
                                            <td><input type="text" name="harga3[]" id="harga3" value="<?php echo $data['harga'];?>"  /></td>
                                             <td><input type="text" name="note3[]" id="note3" value="<?php echo $data['note'];?>"  /></td>
                                            <td><input type="text" name="total3[]" id="total3" value="<?php echo $data['total'];?>"  />
                                            <input type="hidden" name="profit3[]" id="profit3" value="<?php echo  ($data['profit']);?>"  />
                                            <input type="hidden" name="diskon3[]" id="diskon3" value="<?php echo  ($data['diskon']);?>"  /></td>
                                            </tr>
                                            <?php
											     
											     $grand_total += $data['total'];
												} }
											?>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
										 <div align="left" class="form-group">
                     <button class="btn btn-success" type="submit"  name="update"><i class="fa fa-pencil"></i> Simpan&nbsp;</button>
                     <a href="<?=base_url()?>?page=penawaran" class="btn btn-danger"><i class=" fa fa-reply"></i> Batal</a>
                 </div>
										
									</form>
                                    
                                    </div>
                                </div>
                         </div>
                         </div>


								
							
				
			
			</div>			
			</div>
			<!-- /.row -->
           
