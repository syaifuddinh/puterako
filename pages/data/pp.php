<?php include 'script/pp.php'; ?>

<section class="content-header">
       
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Penjualan</a></li>
          <li>
          	<a href="#">Permintaan Penawaran</a>

          </li>
        </ol>
</section>

            <!-- /.row -->
            <div class="box box-info">
            <div class="box-body">

                             <div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class="active">
													<a data-toggle="tab" href="#menuFormPp">Form Permintaan Penawaran</a>
												</li>
                                                <li>
													<a data-toggle="tab" href="#menuListPp">List Permintaan Penawaran</a>
												</li>
                                                
											</ul>
		

			<div class="row">
			<div class="tab-content">
				<div id="menuFormPp" class="tab-pane fade in active">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">
                                  	
								<?php
									$isEdit = false;
									if(isset($_GET['action']) and $_GET['action'] == "edit") {
										$row = mysql_fetch_array($q_edit);
										$isEdit = true;
									}
								?>
                         
									<form role="form" method="post" action="" id="saveForm">								
										<?php 
											if($isEdit) {
												echo "<input type='hidden' name='kode_pp' value='{$row['kode_pp']}'>";
											}
										 ?>
                            
							
										<div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Nama perusahaan</label>
											<input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" value="<?=($isEdit ? $row['nama_perusahaan'] : '')?>" required>
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Alamat</label>
											<input type="text" name="alamat" id="alamat" value="<?=($isEdit ? $row['alamat'] : '')?>" class="form-control" required>
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">UP</label>
											<input type="text" name="up" id="up" value="<?=($isEdit ? $row['up'] : '')?>" class="form-control" required>
										</div>
                                         <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Jabatan</label>
											<input type="text" name="jabatan" id="jabatan" value="<?=($isEdit ? $row['jabatan'] : '')?>" class="form-control" required>
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Phone Number</label>
											<input type="text" name="contact_person" value="<?=($isEdit ? $row['contact_person'] : '')?>" id="contact_person" class="form-control" required>
										</div>
                                        
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Sales</label>
											<input type="text" name="nama_sales" id="nama_sales" class="form-control" value="<?=($isEdit ? $row['nama_sales'] : '')?>" required>
										</div>
										<div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Tanggal</label>
											<div>
												<input type="text" name="tanggal" id="tanggal" class="form-control"  value="<?=(isset($row['id_pp']) ?  date("d-m-Y",strtotime($row['tanggal'])) : '')?>" required/>
											</div>  
										</div>

										<div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Kategori</label>
											<div>
												<select name="kategori" class="form-control" required>
													<?php 
                              $isNone = '';
                              $isService = '';
                              $isSales = '';
                              if($isEdit) {
	                              switch ($row['kategori']) {
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
	                            }
                             ?>          
                              <option value="" <?php echo $isNone; ?> >---- Kategori ----</option>
                              <option value="service" <?php echo $isService; ?>>Service</option>
                              <option value="sales" <?php echo $isSales; ?>>Sales</option>
												</select>
											</div>  
										</div>
                                        <div class="form-group">
											<div>
												<label>
								<input type="checkbox" name="status_survey" id="status_survey" value="1" <?=($isEdit ? ($row['status_survey'] == "1" ? "checked" : "0") : "")?>/><span class="lbl">  Jika Butuh Survey Mohon Di Centang</span>
                             </label>
											</div>  
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Deskripsi</label>
											<div>
												 <textarea class="form-control" rows="10"  name="diskripsi" id="diskripsi" placeholder="Deskripsi..."><?=(isset($row['id_pp']) ? $row['diskripsi'] : '')?></textarea>
											</div>  
										</div>
										
										
										
										
                                  
									 <div align="left" class="form-group">
                     <button class="btn btn-success" type="submit"  name="<?=(isset($row['id_pp']) ? "update" : "simpan")?>"><i class="fa fa-pencil"></i> Simpan&nbsp;</button>
                     <a href="<?=base_url()?>?page=pp" class="btn btn-danger"><i class=" fa fa-reply"></i> Batal</a>
                 </div>
										
									</form>

<!-- Tambah Item Proyek       --->

									
                                </div>
								<!-- /.panel-body -->
							</div>                       
							<!-- /.panel-default -->
						</div>
						<!-- /.col-lg-12 -->					
				</div>
				
				<div id="menuListPp" class="tab-pane fade">					
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">								
									<table class="table table-bordered">
										<thead>
											<tr align="center">
                        <th>No</th>
												<th>No PP</th>
												<th>Tanggal</th>
												<th>Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th>Up</th>
												<th>Nama Sales</th>
                        <th>Status</th>
												<th>Opsional</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$n=1; if(mysql_num_rows($q_pp) > 0) { 
												while($data = mysql_fetch_array($q_pp)) { 
												$kd_pp = $data['kode_pp'];
												$ref = $data['ref'];
												if($ref > 0) 
													$kd_pp .= '_REF_' . $ref;
												?>
										        
											<tr>
                                                <td> <?php echo $n++ ?></td>
												<td><a href="<?=base_url()?>?page=pp_track&action=track&kode=<?=$data['id_pp']?>"><?php echo $kd_pp;?></a></td>
												<td> <?php echo date("d-m-Y",strtotime($data['tanggal']));?></td>
                                                <td> <?php echo $data['nama_perusahaan'];?></td>
												<td> <?php echo $data['alamat'];?></td>
												<td> <?php echo $data['up'];?></td>
												<td> <?php echo $data['nama_sales'];?></td>
                                                <td align="center">
												<?php 
												if ($data['status_blm_tdk_survey']=='0' AND $data['status']=='0'){echo '<span class="btn btn-mini fa fa-square-o"> Surveyed</span> <span class="btn btn-mini fa fa-square-o"> Penawaran</span>';}
												elseif ($data['status_blm_tdk_survey']=='0' AND $data['status']=='1'){echo '<span class="btn btn-mini fa fa-square-o"> Surveyed</span> <span class="btn btn-mini fa fa-check-square-o"> Penawaran</span>';} 
												elseif ($data['status_blm_tdk_survey']=='1' AND $data['status']=='0'){echo '<span class="btn btn-mini fa fa-check-square-o"> Surveyed</span> <span class="btn btn-mini fa fa-square-o"> Penawaran</span>';}
												elseif ($data['status_blm_tdk_survey']=='1' AND $data['status']=='1'){echo '<span class="btn btn-mini fa fa-check-square-o"> Surveyed</span> <span class="btn btn-mini fa fa-check-square-o"> Penawaran</span>';}
												?>
                                                </td>
												<td>
                                             <?php if ($data['status']<>'2') {?>    <a href="<?=base_url()?>?page=pp&action=edit&kode=<?=$data['id_pp']?>" ><button type="button" class="btn btn-success"> REVISI </button></a>
											 <?php } ?>
												</td>
											</tr>
											<?php
												} }
											?>
										</tbody>
									</table>								
								</div>
								<!-- /.panel-body -->
							</div>                       
							<!-- /.panel-default -->
						</div>
						<!-- /.col-lg-12 -->	
                        

						
				</div>
			</div>			
			</div>
			<!-- /.row -->


