<?php include 'script/lod2.php'; ?>


<section class="content-header">
       
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Penjualan</a></li>
          <li><a href="#">Form LOD</a></li>
        </ol>
</section>

            <!-- /.row -->
            <div class="box box-info">
            <div class="box-body">

                             <div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class="active">
													<a data-toggle="tab" href="#menuFormfs">Form LOD</a>
												</li>
                                                <li>
													<a data-toggle="tab" href="#menuListfs">List LOD</a>
												</li>
                                                
											</ul>
		

			<div class="row">
			<div class="tab-content">
				<div id="menuFormfs" class="tab-pane fade in active">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
									<form role="form" method="post" action=""  >								
										<div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>No LOD</label>
											<input type="text" name="no_lod" id="no_lod" placeholder="NO LOD" class="form-control"required>
                                         
									</div> 
                            
										<div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>NO Proyek</label>
											<input type="text" name="no_proyek" id="no_proyek" class="form-control" required>
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>NO SO</label>
											<input type="text" name="no_so" id="no_so" class="form-control" required>
										</div>
                                       
										<div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Tanggal</label>
											<div>
												<input type="text" name="tanggal" id="tanggal" class="form-control datepicker" required/>
											</div>  
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Nama_Pelanggan</label>
											<div>
												<input type="text" name="nama_pelanggan" class="form-control datepicker" required/>
											</div>  
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Company</label>
											<input type="text" name="company" id="company" class="form-control" required>
										</div>
                                         <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Address</label>
											<input type="text" name="address" id="address" class="form-control" required>
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Contact Person</label>
											<input type="text" name="contact_person" id="contact_person" class="form-control" required>
										</div>
                                         <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Petugas LOD</label>
											<input type="text" name="petugas" id="petugas" class="form-control" required>
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Task</label>
											<select class="form-control" id="task" name="task">
                                            <option value="">-- Pilih --</option>
                                            <option value="instalation">Instalation</option>
                                            <option value="service">Service</option>
                                            <option value="traning">Traning</option>
                                            <option value="demo">Demo</option>
                                            <option value="survey">Survey</option>
                                            <option value="other">Other</option>
                                            </select>
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Time Start</label>
											<input type="text" name="start" id="timepicker1" class="form-control datetimepicker" required/>
										</div>
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Time Finish</label>
											<input type="text" name="finish" id="timepicker2" class="form-control datetimepicker" required/>
										</div>
                                       
                                     <!--    <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>File Foto</label>
											<input type="file" name="gambar"  id="gambar">
										</div> -->
                                        
                                        
                                        <div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Note</label>
											<div>
												 <textarea rows="10" class="form-control" name="note" id="note" placeholder="Note..." ></textarea>
											</div>  
										</div>
                                        
									
                          </div>
                        <!-- /.panel-body -->
                    </div>                       
                    <!-- /.panel-default -->
                    
                   <div align="center" class="form-group">
                     <button class="btn btn-success" type="submit"  name="<?=(isset($row['Id']) ? "update" : "simpan")?>"><i class="fa fa-pencil"></i> Simpan&nbsp;</button>
                     <a href="<?=base_url()?>?page=lod2" class="btn btn-danger"><i class=" fa fa-reply"></i> Batal</a>
                 </div>
                 
            
            </form>
        
                </div>
                
</div>
				
				<div id="menuListfs" class="tab-pane fade">					
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">								
									<table class="table table-bordered">
										<thead>
											<tr>
                                                <th>No</th>
												<th>No LOD</th>
												<th>Tanggal</th>
												<th>Kode Proyek</th>
                                                <th>Nama_pelanggan</th>
                                                <th>Status</th>
                                                <th>Opsional</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$n=1; if(mysql_num_rows($q_lod) > 0) { 
												while($data = mysql_fetch_array($q_lod)) { 
												?>
										        
											<tr>
                                                <td> <?php echo $n++ ?></td>
												<td> <?php echo $data['no_lod'];?></td>
												<td> <?php echo date("d-m-Y",strtotime($data['tgl_buat']));?></td>
												<td> <?php echo $data['nama_pelanggan'];?></td>
                                                <td> <?php echo $data['no_proyek'];?></td>
                                                <td align="center"><?php if ($data['status']=='0'){echo '<button type="button" class="btn btn-success">OPEN</button>';}elseif($data['status']=='2'){echo '<span class="btn btn-mini fa fa-remove">CLOSE</span>';}else {echo '<button type="button" class="btn btn-danger">BATAL</button>';} ?></td>
												<td>
                                                <a href="<?=base_url()?>r_cetak_lod.php?kode=<?=$data['Id']?>" target="_blank"> <button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-print"></span> Print</button></a>               
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
           

        
   <script>
  
 
  
   $(document).ready(function(){
	   $("#timepicker1").datetimepicker({
		    format: 'HH:mm'
	   })
   })
    $(document).ready(function(){
	   $("#timepicker2").datetimepicker({
		     format: 'HH:mm'
	   })
   })
    $(document).ready(function(){
	   $("#timepicker3").datetimepicker({
		     format: 'HH:mm'
	   })
   })
  </script>

   