<?php include 'script/pp.php'; ?>
<section class="content-header">
       
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Dashboard</a></li>
        </ol>
</section>
 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Permintaan Penawaran</h1>
                </div>
                <!-- /.col-lg-12 -->
               
            </div>
            
            <?php
		//TOMBOL PREV
			$prev = mysql_fetch_array($q_pp_prev); {
			if (isset($prev['id_pp'])){
				?>
				<a class="btn-lg btn-warning" href="<?=base_url()?>?page=detail_pp&action=track&kode=<?=$prev['id_pp']?>">
					<i class="fa fa-chevron-left" aria-hidden="true"></i>
				</a>
			<?php
			//TOMBOL next	
			} } $next = mysql_fetch_array($q_pp_next); {
			if (isset($next['id_pp'])){
				?>
				&nbsp;<a class="btn-lg btn-warning" href="<?=base_url()?>?page=detail_pp&action=track&kode=<?=$next['id_pp']?>">
					<i class="fa fa-chevron-right" aria-hidden="true"></i>
				</a>
				<?php
			} }
    
            ?>
           
            <a href="<?=base_url()?>?page=pp" class="btn btn-danger"  ><i class=" fa fa-reply"></i> Back</a>
          
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        
                         <?php
								if(isset($_GET['action']) and $_GET['action'] == "detail") {
									$row = mysql_fetch_array($q_hdr);
									
								} ?>
                                
                                <form role="form" method="post" action="" id="saveForm">								
										<div class="form-group col-md-6 col-sm-2">
											<label>Kode Proyek</label>
											<input type="text" name="kd_proyek" id="kd_proyek" class="form-control " value="<?=$row['kd_proyek']?>" readonly="readonly">
                                            
									     </div> 
                            
							
										<div class="form-group col-md-6 col-sm-2">
											<label>Nama Proyek</label>
											<input type="text" name="nama_proyek"  value="<?=$row['nama_proyek']?>" id="nama_proyek" class="form-control" readonly="readonly">
										</div>
                                        <div class="form-group col-md-6 col-sm-2">
											<label>Alamat Proyek</label>
											<input type="text" name="alamat_proyek"  value="<?=$row['alamat_proyek']?>" id="alamat_proyek" class="form-control" readonly="readonly">
										</div>
                                        <div class="form-group col-md-6 col-sm-2">
											<label>Contact Person</label>
											<input type="text" name="contact_person"  value="<?=$row['contact_person']?>" id="contact_person" class="form-control" readonly="readonly">
										</div>
                                        
                                        <div class="form-group col-md-6 col-sm-2">
											<label>Nama Sales</label>
											<input type="text"  value="<?=$row['nama_sales']?>" name="nama_sales" id="nama_sales" class="form-control" readonly="readonly">
										</div>
										<div class="form-group col-md-6 col-sm-2">
											<label>Tanggal</label>
											<div>
												<input type="date"  value="<?=$row['tanggal']?>" name="tanggal" id="datepicker" class="form-control datepicker" readonly="readonly"/>
											</div>  
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
           
              <div class="header" style="border-bottom:1px solid #ccc;">
        <div class="progress progress-striped" style="height:33px; margin-top:20px;">
          <div class="progress-bar progress-bar-warning" style="width: 100%; font-size: 28px;padding: 6px 15px;text-align: left;">Data Item Proyek</div>
        </div>
        
              
					<table class="table table-striped table-bordered table-hover">
                                  <thead>
                                        <tr>
                                                    <th width="20px">#</th>
                                                    <th>Kode Item</th>
                                                    <th>Model Item</th>
                                                    <th>Item</th>
                                                    <th width="50px" class="text-center">Jml</th>
                                                   
                                        </tr>
                                  </thead>
                    <?php $n=1;if(isset($_GET['action']) and $_GET['action'] == "detail") {
									if(mysql_num_rows($q_dtl) > 0) { 
									while($res = mysql_fetch_array($q_dtl)) {
									
								 ?>
                                        <tr><td><?=$n++?></td>
                                        <td><?=$res['kode_item']?></td>
                                        <td><?=$res['model_item']?></td>
                                        <td><?=$res['nama_item']?></td>
                                        <td><?=$res['qty']?></td>
                     <?php }
											}else {
										echo '<tr> <td colspan="10" class="text-center"> Data tidak ditemukan. </td></tr>';
									}
					}
								?>
                    </tbody>
                    </table>
                    
 <?php 
$msg = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><strong>Permintaan Pemawaran DI BATALKAN!!!</strong><br><strong>Alasan : '.$row['alasan_batal'].'</strong></div>';
if ($row['status']==1)  {
						 echo $msg;
					 } else {
						 echo '';
					}
?> 
             
        
        
                </div>
                
						
  
        <!-- /#page-wrapper -->