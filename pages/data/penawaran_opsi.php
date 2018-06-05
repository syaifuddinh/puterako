<?php include 'script/penawaran.php'; ?>
<script src="assets/penawaran-autocomplete.js"></script>
<script src="assets/jasa-autocomplete.js"></script>
<section class="content-header">
       
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Penjualan</a></li>
          <li><a href="#">Penawaran</a></li>
        </ol>
</section>

            <!-- /.row -->
            <div class="box box-info">
            <div class="box-body">

                             <div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class="active">
													<a data-toggle="tab" href="#menuFormPp">Form Penawaran</a>
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
								
								if(isset($_GET['action']) and $_GET['action'] == "opsi") {
									$row = mysql_fetch_array($q_edit);
									
								}
								?>
                         
									<form role="form" method="post" action="" id="opsiForm">								
										<div class="form-group">
											<label class="control-label col-md-6 col-sm-2 col-xs-12">No Penawaran</label>
											<input type="text" name="kode_penawaran" id="kode_penawaran" url="<?=base_url()?>ajax/r_penawaran.php" autocomplete="off" class="form-control" placeholder="Input Kode Penawaran / Ambil Data Dari PP" value="<?=(isset($row['kode_penawaran']) ? $row['kode_penawaran'] : '')?>" readonly required>
                                         
                            <input type="hidden" name="id_form" id="id_form" value="<?php echo $id_form; ?>"/> 
                                         <input type="hidden" value="<?=RandomString() ?>"  id="token" name="token" class="form-control" >
                                   
                                      <ul id="search_suggestion_holder" style="margin-left:-40px; min-width:600px; max-width:700px"></ul>      
									</div> 
<!--                                    <div class="form-group">
											<label class="control-label col-md-6 col-sm-6 col-xs-12">Opsi</label>
											<input type="text" name="versi" id="versi" class="form-control" placeholder="Versi..." value="<?=(isset($row['kode_penawaran']) ? $row['versi'] : '')?>" readonly required>
									</div>  -->
                                    <div class="form-group">
											<label class="control-label col-md-6 col-sm-6 col-xs-12">Dengan Hormat</label>
											<input type="text" name="dengan_hormat" id="dengan_hormat" class="form-control" value="<?=(isset($row['kode_penawaran']) ? $row['dengan_hormat'] : '')?>" placeholder="dengan hormat..." required>
									</div>
                                    <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Tanggal</label>
											<div>
                                            <?php
											$tanggal= date("d-m-Y", strtotime($row['tanggal']));; ?>
												<input type="text" value="<?=(isset($row['kode_penawaran']) ? $tanggal : '')?>" name="tanggal" id="tanggal" data-date-format="dd-mm-yyyy"  class="form-control" autocomplete="off" required/>
											</div>  
										</div>
                            
							
										<div class="form-group">
											<label class="control-label col-md-6 col-sm-6 col-xs-12">Kepada Nama Perusahaan</label>
											<input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" placeholder="Kepada Perusahaan Yang Di Beri Penawaran..." value="<?=(isset($row['kode_penawaran']) ? $row['kepada'] : '')?>" required>

										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Up</label>
											<input type="text" name="up" id="up" class="form-control" placeholder="Up..." value="<?=(isset($row['kode_penawaran']) ? $row['Up'] : '')?>" required>
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Perihal</label>
											<input type="text" value="<?=(isset($row['kode_penawaran']) ? $row['perihal'] : '')?>" name="perihal" id="perihal" class="form-control" placeholder="Perihal..." required>
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Kategori</label>
											<select id="kategori" name="kategori" class="form-control">
                                                <option value="0">-- Pilih Kategori --</option>
                                                <option value="Service" <?php if(isset($row['kode_penawaran'])) {if($row['kategori']=='Service'){ echo 'selected';}} ?>>Service</option>
                                                <option value="Project" <?php if(isset($row['kode_penawaran'])) {if($row['kategori']=='Project'){ echo 'selected';}} ?>>Project</option>
                                            </select>
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Hormat Kami</label>
											<input type="text" name="hormat_kami" id="hormat_kami" value="<?=(isset($row['kode_penawaran']) ? $row['hormat_kami'] : '')?>" class="form-control" placeholder="hormat kami..." required>
										</div>
                                       
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Note</label>
											<textarea rows="10" class="form-control" name="note" id="notehdr" placeholder="Note..." ><?=(isset($row['kode_penawaran']) ? $row['note'] : '')?>		
</textarea>
										</div>
										
										
										
										
										
                                        <div class="form-group">
                          <?php
										if(isset($_GET['action']) and $_GET['action'] == "opsi") {
													$row1 = mysql_fetch_array($judul1);
																
										} ?>               
                                         
                         <input type="text" name="perihal1" id="perihal1" class="form-control" value="<?=$row1['jenis_barang']?>"  placeholder="Judul..." required>
                         
                      
                         
                     
                                        </div>
                                        <div class="form-group">
											<div class="form-group">
                                           <div class="col-lg-12">  
                                             <div class="pull-right">
                                                 <a href="javascript:;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#infrastructure">
                                            <i class="glyphicon glyphicon-plus"></i> Add Item
                                        </a>                    		
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
                                                    <th>Note</th>
                                                    <th>Harga</th>
                                                    <th>Total</th>
                                                    <th width="100px">Opsional</th>
                                                </tr>
                                            </thead>
                                            <tbody id="show-item-infrastructure">
                                            <?php
												if(isset($_SESSION['data_infrastructure'.$id_form.'']) and count(@$_SESSION['data_infrastructure'.$id_form.'']) > 0) {
									$n=1;
									$grandtotal = 0;
									$array = $_SESSION['data_infrastructure'.$id_form.''];
									foreach($array as $key=>$item) {
									$total = ceil($item['jumlah']*$item['harga']);	
												?>
                                            <tr> 
                                            	<td><?php echo $n++ ?></td>
                                                <td><?php echo $item['model'];?></td>
                                                <td><?php echo $item['description'];?></td>
                                                <td><?php echo number_format($item['jumlah']);?></td>
                                                <td><?php echo $item['satuan'];?></td>
                                                <td><?php echo $item['note'];?></td>
                                                <td style="text-align:right"><?php echo number_format($item['harga']);?></td>
                                                <td style="text-align:right"><?php echo number_format($total);?></td>
                                                <td>
<!--                                                <a href="" class="label label-primary" data-toggle="modal"  data-target="#infrastructure"><i class="fa fa-plus-circle"></i></a> -->
					<a href="javascript:;" class="label label-info edit_infrastructure" data-toggle="modal" data-target="#edit_infrastructure" data-id="<?=$item['id']?>"><i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="label label-danger hapus-cart-infrastructure" data-id="<?=$key?>"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <?php
											     $grandtotal += ($total);
											    
												}  }
											?>
                                            <tr><td colspan="7" style="text-align:right"> <b> Total Nett Rp 
</b></td> <td style="text-align:right"><b><?php echo number_format($grandtotal, 0, ",", ".") ?></b> <input type="hidden" value="<?=$grandtotal?>" id="b_grand_total"></td></tr>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
                                         <div class="form-group">
                                          <?php
										if(isset($_GET['action']) and $_GET['action'] == "opsi") {
													$row2 = mysql_fetch_array($judul2);
																
										} ?>
                                        
                                       <input type="text" name="perihal2" id="perihal2" value="<?=$row2['jenis_barang']?>" class="form-control" placeholder="Judul..." required>
                                        </div>
                                        <div class="form-group">
											<div class="form-group">
                                           <div class="col-lg-12">  
                                             <div class="pull-right">
                                                 <a href="javascript:;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#material">
                                            <i class="glyphicon glyphicon-plus"></i> Add Item
                                        </a>                    		
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
                                                    <th>Note</th>
                                                    <th>Harga</th>
                                                    <th>Total</th>
                                                    <th width="100px">Opsional</th>
                                                </tr>
                                            </thead>
                                            <tbody id="show-item-material">
                                            <?php
												if(isset($_SESSION['data_material'.$id_form.'']) and count(@$_SESSION['data_material'.$id_form.'']) > 0) {
									$n=1;
									$grandtotal2 = 0;
									$array = $_SESSION['data_material'.$id_form.''];
									foreach($array as $key=>$item) {
									$total = ceil($item['jumlah']*$item['harga']);	
												?>
                                            <tr> 
                                            	<td><?php echo $n++ ?></td>
                                                <td><?php echo $item['description'];?></td>
                                                <td><?php echo number_format($item['jumlah']);?></td>
                                                <td><?php echo $item['satuan'];?></td>
                                                <td><?php echo $item['note'];?></td>
                                                <td style="text-align:right"><?php echo number_format($item['harga']);?></td>
                                                <td style="text-align:right"><?php echo number_format($total);?></td>
                                                <td>
<!--                                                <a href="" class="label label-primary" data-toggle="modal"  data-target="#material"><i class="fa fa-plus-circle"></i></a> -->
					<a href="javascript:;" class="label label-info edit_material" data-toggle="modal" data-target="#edit_material" data-id="<?=$item['id']?>"><i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="label label-danger hapus-cart-material" data-id="<?=$key?>"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <?php
											     $grandtotal2 += ($total);
											    
												}  }
											?>
                                            <tr><td colspan="6" style="text-align:right"> <b> Total Nett Rp 
</b></td> <td style="text-align:right"><b><?php echo number_format($grandtotal2, 0, ",", ".") ?></b> <input type="hidden" value="<?=$grandtotal2?>" id="b_grand_total"></td></tr>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
                                         <div class="form-group">
                                         <?php
										if(isset($_GET['action']) and $_GET['action'] == "opsi") {
													$row3 = mysql_fetch_array($judul3);
																
										} ?>
                                         
                                       <input type="text" name="perihal3" id="perihal3" value="<?=$row3['jenis_barang']?>" class="form-control" placeholder="Judul..." required>
                                        </div>
                                        <div class="form-group">
											<div class="form-group">
                                           <div class="col-lg-12">  
                                             <div class="pull-right">
                                                 <a href="javascript:;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#jasa">
                                            <i class="glyphicon glyphicon-plus"></i> Add Item
                                        </a>                    		
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
<!--                                                    <th>Note</th> -->
                                                    <th>Harga</th>
                                                    <th>Total</th>
                                                    <th width="100px">Opsional</th>
                                                </tr>
                                            </thead>
                                            <tbody id="show-item-jasa">
                                            <?php
												if(isset($_SESSION['data_jasa'.$id_form.'']) and count(@$_SESSION['data_jasa'.$id_form.'']) > 0) {
									$n=1;
									$grandtotal3 = 0;
									$array = $_SESSION['data_jasa'.$id_form.''];
									foreach($array as $key=>$item) {
									$total = ceil($item['jumlah']*$item['harga']);	
												?>
                                            <tr> 
                                            	<td><?php echo $n++ ?></td>
                                                <td><?php echo $item['description'];?></td>
                                                <td><?php echo number_format($item['jumlah']);?></td>
                                                <td><?php echo $item['satuan'];?></td>
                                                <td style="text-align:right"><?php echo number_format($item['harga']);?></td>
                                                <td style="text-align:right"><?php echo number_format($total);?></td>
                                                <td>
<!--                                                <a href="" class="label label-primary" data-toggle="modal"  data-target="#jasa"><i class="fa fa-plus-circle"></i></a>
					<a href="javascript:;" class="label label-info edit_jasa" data-toggle="modal" data-target="#edit_jasa" data-id="'.$item['id'].'"><i class="fa fa-pencil"></i></a> -->
					<a href="javascript:;" class="label label-danger hapus-cart-jasa" data-id="<?=$key?>"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                            
                                            <?php
											     $grandtotal3 += ($total);
											    
												}  }
											?>
                                            <tr><td colspan="5" style="text-align:right"> <b> Total Nett Rp 
</b></td> <td style="text-align:right"><b><?php echo number_format($grandtotal3, 0, ",", ".") ?></b> <input type="hidden" value="<?=$grandtotal3?>" id="b_grand_total"></td></tr>
                                            </tbody>
                                            <?php $subtot=ceil($grandtotal+$grandtotal2+$grandtotal3); ?>
<!--                                            <tr>
                                            	<td class="text-right" colspan="6"><b>Subtotal</b></td>
                                                <td style="text-align:right"><?=number_format($subtot)?></td>
                                            </tr> -->
                                            <tr>
                                            <td colspan="6" class="text-right"> <b>Diskon
                                </b></td> 
                                            <td colspan="6"> <select id="diskon_utama" name="diskon_utama"  class="form-control">
                                                            <option value="0">-- Pilih Diskon --</option>
                                                            <option value="5" <?php if(isset($row['kode_penawaran'])) {if($row['diskon_persen']=='5'){ echo 'selected';}} ?>>5%</option>
                                                            <option value="10" <?php if(isset($row['kode_penawaran'])) {if($row['diskon_persen']=='10'){ echo 'selected';}} ?>>10%</option>
                                                            <option value="15" <?php if(isset($row['kode_penawaran'])) {if($row['diskon_persen']=='15'){ echo 'selected';}} ?>>15%</option>
                                                            <option value="20" <?php if(isset($row['kode_penawaran'])) {if($row['diskon_persen']=='20'){ echo 'selected';}} ?>>20%</option>
                                                            </select> 
                                            </td>
                                            
                                            </tr>
                                            <tr>
                                            <td colspan="6" class="text-right"> <b>PPn
                                </b></td> 
                                            <td colspan="6"> <input type="checkbox"  name="ppn" id="ppn" value="1" <?php if(isset($row['kode_penawaran'])) {if((int)$row['ppn']>0){ echo 'checked="checked"';}} ?> /></td>
                                            
                                            </tr>
                                           
                                        </table>
										</div>
                                        </div>
										<div class="form-group col-md-6">
											 <button type="submit" name="submit" class="btn btn-primary" tabindex="10"><i class="fa fa-check-square-o"></i> Simpan</button> <a href="<?=base_url()?>?page=penawaran" class="btn btn-danger"><i class=" fa fa-reply"></i> Batal</a>&nbsp; <img src="<?=base_url()?>assets/images/loading.gif" class="animated"/>
               
										</div>
										
									</form>
                                    
                                    </div>
                                </div>
                         </div>
                         </div>

<!-- Tambah Item Infrastructure       --->

									
<div class="modal fade" id="infrastructure" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
												  <button type="button" class="close" data-dismiss="modal">&times;</button>
												  <h4 class="modal-title">Tambah Item</h4>
												</div>
		          <div class="col-md-12 pm-min">
                    <form role="form" method="post" action="" id="form-add-infrastructure">
                        <div class="col-md-12 pm-min-s">
                            <div class="col-md-6 pm-min-s">
                        
                                <label class="control-label">Model</label>
                              
                                <input type="text" name="model" id="model"  placeholder="Model...." tabindex="1" class="form-control"/>
                                <input type="hidden" name="id_form" id="id_form" value="<?php echo $id_form; ?>"/> 
                                
                           
                            </div>
                             
                            
                            <div class="col-md-6 pm-min-s">
                                <label class="control-label">Description</label>
                                <input type="text" name="description" id="description" class="form-control"/>
                                
                
                            </div>
                            
                            <div class="col-md-6 pm-min-s">
                            <label class="control-label">Jml</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" value="0" tabindex="3"/>
                             </div>
                              <div class="col-md-6 pm-min-s">
                            <label class="control-label">Satuan</label>
                            <input type="text" name="satuan" id="satuan" class="form-control"  tabindex="3"/>
                             </div>
                              <div class="col-md-6 pm-min-s">
                            <label class="control-label">Harga Hpp</label>
                            <input type="number" name="harga" id="harga" class="form-control" value="0" tabindex="3"/>
                             </div>
                             <div class="col-md-6 pm-min-s">
                            <label class="control-label">Profit (%)</label>
                            <input type="number" name="profit" id="profit" class="form-control" value="0" />
                             </div>
                             <div class="col-md-6 pm-min-s">
                            <label class="control-label">Diskon (%)</label>
                            <input type="number" name="diskon" id="diskon" class="form-control" value="0"/>     
                             </div>
                            <div class="col-md-12 pm-min-s">
                            <label class="control-label">Note</label>
                             <textarea rows="5" class="form-control" name="note" id="note" placeholder="Note..."></textarea>
                             </div>
                             
                        </div>
                   
                    </form>
                    </div>
                               
															
												
												<div class="modal-footer">
                                               
                                                <button type="button" name="submit" class="btn btn-success add-to-infrastructure" tabindex="4" data-dismiss="modal"><i class="fa fa-plus"></i> Tambah</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
								
                <!-- Tambah Item Infrastructure       --->

									
<div class="modal fade" id="material" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
												  <button type="button" class="close" data-dismiss="modal">&times;</button>
												  <h4 class="modal-title">Tambah Item</h4>
												</div>
		          <div class="col-md-12 pm-min">
                    <form role="form" method="post" action="" id="form-add-material">
                        <div class="col-md-12 pm-min-s">
                           
                            <div class="col-md-6 pm-min-s">
                                <label class="control-label">Description</label>
                                <input type="text" name="description" id="description1" class="form-control"/>
                                <input type="hidden" name="id_form" id="id_form" value="<?php echo $id_form; ?>"/> 
                                
                
                            </div>
                            
                            <div class="col-md-6 pm-min-s">
                            <label class="control-label">Jml</label>
                            <input type="number" name="jumlah" id="jumlah1" class="form-control" value="0" tabindex="3"/>
                             </div>
                              <div class="col-md-6 pm-min-s">
                            <label class="control-label">Satuan</label>
                            <input type="text" name="satuan" id="satuan1" class="form-control"  tabindex="3"/>
                             </div>
                              <div class="col-md-6 pm-min-s">
                            <label class="control-label">Harga Hpp</label>
                            <input type="number" name="harga" id="harga1" class="form-control" value="0" tabindex="3"/>
                             </div>
                             <div class="col-md-6 pm-min-s">
                            <label class="control-label">Profit (%)</label>
                            <input type="number" name="profit" id="profit1" class="form-control" value="0" />
                             </div>
                             <div class="col-md-6 pm-min-s">
                            <label class="control-label">Diskon (%)</label>
                            <input type="number" name="diskon" id="diskon1" class="form-control" value="0" />     
                             </div>
                            <div class="col-md-12 pm-min-s">
                            <label class="control-label">Note</label>
                             <textarea rows="5" class="form-control" name="note" id="note1" placeholder="Note..."></textarea>
                             </div>
                             
                        </div>
                   
                    </form>
                    </div>
                               
															
												
												<div class="modal-footer">
                                                <button type="button" name="submit" class="btn btn-success add-to-material" tabindex="4" data-dismiss="modal"><i class="fa fa-plus"></i> Tambah</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
							
							
                <!-- Tambah Item Infrastructure       --->

									
<div class="modal fade" id="jasa" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
												  <button type="button" class="close" data-dismiss="modal">&times;</button>
												  <h4 class="modal-title">Tambah Item</h4>
												</div>
		          <div class="col-md-12 pm-min">
                    <form role="form" method="post" action="" id="form-add-jasa">
                        <div class="col-md-12 pm-min-s">
                            
                            <div class="col-md-12 pm-min-s">
                                <label class="control-label">Kode Jasa</label>
                                <img src="assets/images/loading.gif" id="loader" />
                                <input type="text" name="kd_jasa" id="kd_jasa" url="<?=base_url()?>ajax/j_jasa.php" class="form-control" placeholder="Kode Jasa..." tabindex="1" autocomplete="off"/>
                                <input type="hidden" name="id_form" id="id_form" value="<?php echo $id_form; ?>"/> 
                                <ul id="search_suggestion_holder2" style="margin-left:0px; min-width:350px; max-width:550px"></ul>
                
                            </div>
                            
                            <div class="col-md-6 pm-min-s">
                                <label class="control-label">Description</label>
                                <input type="text" name="description" id="description2" readonly class="form-control"/>
                                
                
                            </div>
                            
                            <div class="col-md-6 pm-min-s">
                            <label class="control-label">Jml</label>
                            <input type="number" name="jumlah" id="jumlah2" class="form-control" value="1" tabindex="3"/>
                             </div>
                              <div class="col-md-6 pm-min-s">
                            <label class="control-label">Satuan</label>
                            <input type="text" name="satuan" id="satuan2" class="form-control"  tabindex="3"/>
                             </div>
                              <div class="col-md-6 pm-min-s">
                            <label class="control-label">Harga</label>
                            <input type="number" name="harga" id="harga2" readonly class="form-control" value="0" tabindex="3"/>
                             </div>
                            
                             
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
  <!-- edit Item Infrastructure       --->

									
<div class="modal fade" id="edit_infrastructure" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
												  <button type="button" class="close" data-dismiss="modal">&times;</button>
												  <h4 class="modal-title">Tambah Item</h4>
												</div>
		                                   <div class="modal-body" id="show-infrastructure-edit">
                                           </div>
											
											</div>
										</div>
</div>
								
 <!-- Edit Item Infrastructure       --->
 <!-- edit Item material       --->

									
<div class="modal fade" id="edit_material" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
												  <button type="button" class="close" data-dismiss="modal">&times;</button>
												  <h4 class="modal-title">Tambah Item</h4>
												</div>
		                                   <div class="modal-body" id="show-material-edit">
                                           </div>
											
											</div>
										</div>
</div>
								
 <!-- Edit Item material       --->

<!-- edit Item jasa       --->

									
<div class="modal fade" id="edit_jasa" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
												  <button type="button" class="close" data-dismiss="modal">&times;</button>
												  <h4 class="modal-title">Tambah Item</h4>
												</div>
		                                   <div class="modal-body" id="show-jasa-edit">
                                           </div>
											
											</div>
										</div>
</div>
								
 <!-- Edit Item jasa       --->


 
							
				
				
			</div>			
			</div>
			<!-- /.row -->
           
<?php unset($_SESSION['data_material']); ?> 
<?php unset($_SESSION['data_jasa']); ?>
<?php unset($_SESSION['data_infrastructure']); ?>
  <style>
  .pm-min, .pm-min-s{padding:3px 1px; }
  .animated{display:none;}
  </style>
  <script>
  $(document).ready(function (e) {
	 $("#opsiForm").on('submit',(function(e) {
		var grand_total = parseFloat($("#b_grand_total").val());
		if(grand_total == "" || isNaN(grand_total)) {grand_total = 0;}
		e.preventDefault();
	  	if(grand_total != 0) {			
			$(".animated").show();
			$.ajax({
				url: "<?=base_url()?>ajax/r_penawaran.php?func=opsi",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(html)
				{
					//var msg = html.split("||");
					//if(msg[0] == "00") {
						
						window.location = '<?=base_url()?>?page=penawaran';
					//} else {
					//	notifError(msg[1]);
				//	}
					$(".animated").hide();
				}   
		   });
	  	} else {notifError("<p>Item Proyek masih kosong.</p>");}
	 }));
  });
  
    $('.add-to-infrastructure').click(function(){
		var value	=	$(this).attr('data'); 
		$.ajax({
			type: "POST",
			url: '<?=base_url()?>ajax/r_penawaran.php?func=addinfrastructure',
			data: $("#form-add-infrastructure").serialize(),
			cache: false,
			success:function(data){
				$('#show-item-infrastructure').html(data).show();
				$('#model').val(''); $('#description').val('');
				$('#jumlah').val('0'); $('#harga').val('0');$('#satuan').val('');
				$('#profit').val('0'); $('#diskon').val('0');$('#note').val('');
			}
		});
	});
	
	$('.add-to-material').click(function(){
		var value	=	$(this).attr('data'); 
		$.ajax({
			type: "POST",
			url: '<?=base_url()?>ajax/r_penawaran.php?func=addmaterial',
			data: $("#form-add-material").serialize(),
			cache: false,
			success:function(data){
				$('#show-item-material').html(data).show();
				$('#description1').val('');
				$('#jumlah1').val('0'); $('#harga1').val('0');$('#satuan1').val('');
				$('#profit1').val('0'); $('#diskon1').val('0');$('#note1').val('');
			}
		});
	});
	
	$('.add-to-jasa').click(function(){
		var value	=	$(this).attr('data'); 
		$.ajax({
			type: "POST",
			url: '<?=base_url()?>ajax/r_penawaran.php?func=addjasa',
			data: $("#form-add-jasa").serialize(),
			cache: false,
			success:function(data){
				$('#show-item-jasa').html(data).show();
				$('#kd_jasa').val('');
				$('#description2').val('');
				$('#jumlah2').val('1'); $('#harga2').val('0');$('#satuan2').val('');
				$('#profit2').val('0'); $('#diskon2').val('0');$('#note2').val('');
			}
		});
	});
	
	$('.hapus-cart-infrastructure').click(function(){
		var id =	$(this).attr('data-id'); 
		var id_form = $('#id_form').val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url()?>ajax/r_penawaran.php?func=hapus-infrastructure',
			data: 'idhapus=' + id + '&id_form=' +id_form,
			cache: false,
			success:function(data){
				$('#show-item-infrastructure').html(data).show();
			}
		});
	});
	
	$('.edit_infrastructure').click(function(){
		var id =	$(this).attr('data-id'); 
		var id_form = $('#id_form').val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url()?>ajax/r_penawaran.php?func=edit_infrastructure',
			data: 'id=' + id + '&id_form=' +id_form,
			cache: false,
			success:function(data){
				$('#show-infrastructure-edit').html(data).show();
			}
		});
	});
	
	$('.hapus-cart-material').click(function(){
		var id =	$(this).attr('data-id'); 
		var id_form = $('#id_form').val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url()?>ajax/r_penawaran.php?func=hapus-material',
			data: 'idhapus=' + id + '&id_form=' +id_form,
			cache: false,
			success:function(data){
				$('#show-item-material').html(data).show();
			}
		});
	});
	
	$('.edit_material').click(function(){
			var id =	$(this).attr('data-id'); 
			var id_form = $('#id_form').val();
			$.ajax({
			type: 'POST',
			url: '<?=base_url()?>ajax/r_penawaran.php?func=edit_material',
			data: 'id=' + id + '&id_form=' +id_form,
			cache: false,
			success:function(data){
				$('#show-material-edit').html(data).show();
			}
		});
	});
	
	$('.hapus-cart-jasa').click(function(){
		var id =	$(this).attr('data-id'); 
		var id_form = $('#id_form').val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url()?>ajax/r_penawaran.php?func=hapus-jasa',
			data: 'idhapus=' + id + '&id_form=' +id_form,
			cache: false,
			success:function(data){
				$('#show-item-jasa').html(data).show();
			}
		});
	});

  
   
</script>
   