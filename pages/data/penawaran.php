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
                                                <li>
													<a data-toggle="tab" href="#menuListPp">List Penawaran</a>
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
								$id_form = buatkodeform("kode_form");   
								if(isset($_GET['action']) and $_GET['action'] == "link_to_penawaran") {
									$row = mysql_fetch_array($q_link);
									
								}
								?>
                         
									<form role="form" method="post" action="" id="saveForm">								
										<div class="form-group">
											<label class="control-label col-md-6 col-sm-2 col-xs-12">No Penawaran</label>
											<input type="text" name="kode_pp" id="kode_penawaran" url="<?=base_url()?>ajax/r_penawaran.php" autocomplete="off" class="form-control" placeholder="Input Kode Penawaran / Ambil Data Dari PP" value="<?=(isset($row['kode_pp']) ? $row['kode_pp'] : '')?>" required>
                                            <?php   $idtem = "INSERT INTO form_id SET kode_form ='".$id_form."' ";
                            mysql_query($idtem); ?>
                            
                            <input type="hidden" name="id_form" id="id_form" value="<?php echo $id_form; ?>"/> 
                                         <input type="hidden" value="<?=RandomString() ?>"  id="token" name="token" class="form-control" >
                                   
                                      <ul id="search_suggestion_holder" style="margin-left:-40px; min-width:600px; max-width:700px"></ul>      
									</div> 
<!--                                    <div class="form-group">
											<label class="control-label col-md-6 col-sm-6 col-xs-12">Opsi</label>
											<input type="text" name="versi" id="versi" class="form-control" placeholder="Versi..." required>
									</div> -->
                                    <div class="form-group">
											<label class="control-label col-md-6 col-sm-6 col-xs-12">Dengan Hormat</label>
											<input type="text" name="dengan_hormat" id="dengan_hormat" class="form-control" value="Bersama ini kami PT. Puterako Inti Buana memberikan penawaran Pemasangan Kabel data di Lazada" placeholder="dengan hormat..." required>
									</div>
                                    <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Tanggal</label>
											<div>
												<input type="text" name="tanggal" id="tanggal" data-date-format="dd-mm-yyyy"  class="form-control" autocomplete="off" required/>
											</div>  
										</div>
                            
							
										<div class="form-group">
											<label class="control-label col-md-6 col-sm-6 col-xs-12">Kepada Nama Perusahaan</label>
											<input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" placeholder="Kepada Perusahaan Yang Di Beri Penawaran..." value="<?=(isset($row['kd_proyek']) ? $row['nama_proyek'] : '')?>" required>
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Up</label>
											<input type="text" name="up" id="up" class="form-control" placeholder="Up..." value="<?=(isset($row['kd_proyek']) ? $row['up'] : '')?>" required>
										</div>
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Perihal</label>
											<input type="text" name="perihal" id="perihal" class="form-control" placeholder="Perihal..." required>
										</div>
                                        
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Tertanda</label>
											<input type="text" name="hormat_kami" id="hormat_kami" class="form-control" placeholder="hormat kami..." required>
										</div>
                                        
                                       
                                        <div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12">Note</label>
											<textarea rows="10" class="form-control" name="note" id="notehdr" placeholder="Note..." >1. Harga di atas adalah dalam  Rupiah		
2. Penawaran berlaku s/d 2 minggu		
3. Penawaran belum termasuk kabel power		
4. Garansi 1 Tahun (Full Spare Part) yaitu: kerusakan yang disebabkan pabrik pembuatnya.		
    Yang tidak termasuk garansi adalah kerusakan yang diakibatkan karena tegangan tidak stabil,		
    kemasukan air/benda kecil lainnya atau bencana alam		
5. Delivery Time : 6 - 8 Minggu		
6. Pembayaran: 30% DP, sisa on progress		
</textarea>
										</div>
										
										
										
										
										
                                        <div class="form-group">
                                         
                         <input type="text" name="perihal1" id="perihal1" class="form-control" placeholder="Judul..." required>
                         
                      
                         
                     
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
                                            <tr> <td colspan="10" class="text-center"> Tidak ada item . </td></tr>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
                                         <div class="form-group">
                                       <input type="text" name="perihal2" id="perihal2" class="form-control" placeholder="Judul..." required>
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
                                            <tr> <td colspan="10" class="text-center"> Tidak ada item . </td></tr>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
                                         <div class="form-group">
                                       <input type="text" name="perihal3" id="perihal3" class="form-control" placeholder="Judul..." required>
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
                                            <tr> <td colspan="10" class="text-center"> Tidak ada item . </td></tr>
                                            
                                            </tbody>
                                            <?php
											
											
											?>
                                            
                                            <tr>
                                            <td colspan="6" class="text-right"> <b>Diskon
                                </b></td> 
                                            <td colspan="6"> <select id="diskon_utama" name="diskon_utama"  class="form-control">
                                                            <option value="0">-- Pilih Diskon --</option>
                                                            <option value="5">5%</option>
                                                            <option value="10">10%</option>
                                                            <option value="15">15%</option>
                                                            <option value="20">20%</option>
                                                            </select> 
                                            </td>
                                            
                                            </tr>
                                            <tr>
                                            <td colspan="6" class="text-right"> <b>PPn
                                </b></td> 
                                            <td colspan="6"> <input type="checkbox" name="ppn" id="ppn" value="1" /></td>
                                            
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


 
							
				
				<div id="menuListPp" class="tab-pane fade">					
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-body">								
									<table class="table table-bordered">
										<thead>
											<tr>
                                                <th>No</th>
												<th>No Penawaran</th>
                                                <th>Opsi</th>
                                                <th>Kepada</th>
												<th>Tanggal</th>
												<th>UP</th>
                                                <th>Status</th>
												<th>Opsional</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$n=1; if(mysql_num_rows($q_penawaran) > 0) { 
												while($data = mysql_fetch_array($q_penawaran)) { 
										     ?>
										        
											<tr>
                                                <td> <?php echo $n++ ?></td>
												<td><a href="<?=base_url()?>?page=penawaran_track&action=track&kode=<?=$data['id_penawaran']?>"><?php echo $data['kode_pp'];?></a></td>
                                                <td> <?php echo $data['versi'];?></td>
                                                <td> <?php echo $data['kepada'];?></td>
												<td> <?php echo date("d-m-Y",strtotime($data['tanggal']));?></td>
												<td> <?php echo $data['Up'];?></td>
                                                <td align="center"><?php if ($data['status']=='0'){echo '<button type="button" class="btn btn-success">OPEN</button>';}elseif($data['status']=='2'){echo '<span class="btn btn-mini fa fa-remove">CLOSE</span>';}else {echo '<button type="button" class="btn btn-danger">BATAL</button>';} ?></td>
												<td>
                                         <?php if ($data['status']<>'2') {?>        <a href="<?=base_url()?>?page=penawaran_rev&action=edit&kode=<?=$data['kode_pp']?>&token=<?=$data['token']?>&id_form=<?=$id_form?>"><button type="button" class="btn btn-success"> REVISI </button></a>                       
                                               <a href="<?=base_url()?>r_cetak_penawaran.php?kode=<?=$data['kode_pp']?>&token=<?=$data['token']?>" target="_blank"> <button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-print"></span> Print</button></a>               <?php } ?>
											
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
           
<?php unset($_SESSION['data_material']); ?> 
<?php unset($_SESSION['data_jasa']); ?>
<?php unset($_SESSION['data_infrastructure']); ?>
  <style>
  .pm-min, .pm-min-s{padding:3px 1px; }
  .animated{display:none;}
  </style>
  <script>
  $(document).ready(function (e) {
	 $("#saveForm").on('submit',(function(e) {
		var grand_total = parseFloat($("#b_grand_total").val());
		if(grand_total == "" || isNaN(grand_total)) {grand_total = 0;}
		e.preventDefault();
	  	if(grand_total != 0) {			
			$(".animated").show();
			$.ajax({
				url: "<?=base_url()?>ajax/r_penawaran.php?func=save",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(html)
				{
					//var msg = html.split("||");
					//if(msg[0] == "00") {
						console.log(html);
						// window.location = '<?=base_url()?>?page=penawaran';
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
				$('#jumlah').val('0'); $('#harga').val('0');$('#satuan').val('0');
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
				$('#profit2').val(''); $('#diskon2').val('0');$('#note2').val('');
			}
		});
	});
	

  
   
</script>
   