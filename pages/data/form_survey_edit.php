<?php include 'script/fs.php'; ?>
<script src="assets/fs-autocomplete.js"></script>

<section class="content-header">
       
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Penjualan</a></li>
          <li><a href="#">Revisi Form Survey</a></li>
        </ol>
</section>

            <!-- /.row -->
            <div class="box box-info">
            <div class="box-body">

                             <div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class="active">
													<a data-toggle="tab" href="#menuFormfs">Form Survey</a>
												</li>
                                               
                                                
											</ul>
		

			<div class="row">
			<div class="tab-content">
				<div id="menuFormfs" class="tab-pane fade in active">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                 <?php
								if(isset($_GET['action']) and $_GET['action'] == "edit") {
									$row = mysql_fetch_array($q_edit);
									
								}
								?>
									<form role="form" method="post" action=""  >								
										<div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>No Penawaran</label>
											<input type="text" name="kd_proyek" id="kd_proyek" placeholder="Ambil Dari Kode Penawaran" class="form-control" url="<?=base_url()?>ajax/r_fs.php" <?=(isset($row['kd_proyek']) ? "readonly": "")?> value="<?=(isset($row['kd_proyek']) ? $row['kd_proyek'] : '')?>" required>
                                          <ul id="search_suggestion_holder" style="margin-left:-40px; min-width:600px; max-width:700px"></ul>   
									</div> 
                            
										<div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Nama Proyek</label>
											<input type="text" name="nama_proyek" id="nama_proyek" class="form-control" value="<?=(isset($row['kd_proyek']) ? $row['nama_proyek'] : '')?>"  readonly>
										</div>
                                       
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Alamat</label>
											<input type="text" name="alamat" id="alamat" class="form-control" value="<?=(isset($row['kd_proyek']) ? $row['alamat'] : '')?>"  readonly>
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>UP</label>
											<input type="text" name="up" id="up" class="form-control" value="<?=(isset($row['kd_proyek']) ? $row['up'] : '')?>"  readonly>
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Jabatan</label>
											<input type="text" name="jabatan" id="jabatan" class="form-control" value="<?=(isset($row['kd_proyek']) ? $row['jabatan'] : '')?>"  readonly>
										</div>
                                         <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Surveyor</label>
											<input type="text" name="surveyor" id="surveyor" class="form-control" value="<?=(isset($row['kd_proyek']) ? $row['surveyor'] : '')?>"  required>
										</div>
                                       
										<div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Tanggal</label>
											<div>
												<input type="text" name="tanggal" id="tanggal" class="form-control" autocomplete="off" value="<?=(isset($row['kd_proyek']) ? date("d-m-Y",strtotime($row['tanggal'])) : '')?>" required/>
											</div>  
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Lokasi</label>
											<input type="text" name="lokasi_hdr" id="lokasi_hdr" class="form-control" value="<?=(isset($row['kd_proyek']) ? $row['lokasi_hdr'] : '')?>">
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Keterangan</label>
											<div>
												 <textarea rows="1" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan..."> <?=(isset($row['kd_proyek']) ? $row['keterangan'] : '')?></textarea>
											</div>  
										</div>
                                        
                                         <div class="form-group">
                                        <h3>Matrix Survey Form </h3>
                                        </div>
                                        <div class="form-group">
										 	<div class="form-group">
                                           		<div class="col-lg-12">  
                                            		<div class="pull-right">
                                                         <a href="javascript:;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_survey"><i class="glyphicon glyphicon-plus"></i> Add Item</a>                    		
                                                     </div>
                                           		</div>  
                                         	</div>
										</div>
                                        </br>
                                        </br>
                                        <div class="form-group">
                     	                     <div class="col-lg-12">
										<table id="example2" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="20px">No</th>
                                                    <th>Material dan Equipment</th>
                                                    <th>Area</th>
                                                    <th>Jumlah</th>
                                                    <th>Satuan</th>
<!--                                                    <th>Note</th> -->
                                                    <th width="100px">Opsional</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
												if(isset($_SESSION['data_sf']) and count(@$_SESSION['data_sf']) > 0) {
									$n=1;
									$array = $_SESSION['data_sf'];
									foreach($array as $key=>$item) {
												?>
                                           <tr>
                                                <td><?php echo $n++ ?></td>
                                                <td><?php echo $item['kode_item'];?><input type="hidden" name="kode_item[]" id="kode_item" value="<?php echo $item['kode_item'];?>" /><input type="hidden" name="id_fs_dtl[]" id="id_fs_dtl" value="<?php echo $item['id_fs_dtl'];?>" /> </td>
                                                <td><input type="text" name="lokasi[]" id="lokasi" value="<?php echo $item['lokasi'];?>"  /></td>
                                                <td><input type="number" name="jumlah[]" id="jumlah" value="<?php echo $item['jumlah'];?>" /></td>
                                                <td><input type="text" name="satuan[]" id="satuan" value="<?php echo $item['satuan'];?>" />  <input type="hidden" name="token[]" id="token" value="<?php echo $item['token'];?>" /></td>
<!--                                                <td><input type="text" name="note[]" id="note" value="<?php echo $item['note'];?>" /> 
                                               </td> -->
                                                 
                                                <td><a href="<?=base_url()?>?page=form_survey_edit&action=hapus&kode=<?=$data['kode_item']?>" class="label label-danger"><i class="fa fa-times"></i></a></td>
                                            </tr>
                                            
                                            <?php
											     
											    
												} }
											?>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
                                         
									
                          </div>
                        <!-- /.panel-body -->
                    </div>                       
                    <!-- /.panel-default -->
                    
                   <div align="left" class="form-group">
                     <button class="btn btn-success" type="submit"  name="<?=(isset($row['kd_proyek']) ? "update" : "simpan")?>"><i class="fa fa-pencil"></i> Simpan&nbsp;</button>
                     <a href="<?=base_url()?>?page=form_survey" class="btn btn-danger"><i class=" fa fa-reply"></i> Batal</a>
                 </div>
                 
            
            </form>
        
                </div>
                
                
                <div class="modal fade" id="tambah_survey" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
												  <button type="button" class="close" data-dismiss="modal">&times;</button>
												  <h4 class="modal-title">Tambah Survey</h4>
												</div>
		          <div class="col-md-12 pm-min">
                    <form role="form" method="post" action="" id="form-add-survey">
                        <div class="col-md-12 pm-min-s">
                           
                            <div class="col-md-6 pm-min-s">
                                <label class="control-label">Material Dan Equipment</label>
                                <input type="text" name="kode_barang" id="kode_barang" class="form-control" placeholder="Input Barang Survey"/>
                              
                
                            </div>
                             <div class="col-md-6 pm-min-s">
                            <label class="control-label">Area</label>
                            <input type="text" name="lokasi" id="lokasi" placeholder="tidak boleh spasi bisa menggunakan _" class="form-control"  tabindex="3"/>
                             </div>
                            
                            <div class="col-md-6 pm-min-s">
                            <label class="control-label">Jml</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" value="0" tabindex="3"/>
                             </div>
                              <div class="col-md-6 pm-min-s">
                            <label class="control-label">Satuan</label>
                            <input type="text" name="satuan" id="satuan" class="form-control"  tabindex="3"/>
                             </div>
<!--                              <div class="col-md-12 pm-min-s">
                            <label class="control-label">Note</label>
                             <textarea rows="5" class="form-control" name="note" id="note" placeholder="Note..."></textarea>
                             </div> -->
                           
                             
                        </div>
                   
                    </form>
                    </div>
                               
															
												
												<div class="modal-footer">
                                                <button type="button" name="submit" class="btn btn-success add-to-survey" tabindex="4" data-dismiss="modal"><i class="fa fa-plus"></i> Tambah</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
                                    
                
</div>

				
				
                
                
                


<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

   