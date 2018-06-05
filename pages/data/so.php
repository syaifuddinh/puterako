<?php include 'script/so.php'; ?>
<section class="content-header">
       
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Penjualan</a></li>
          <li><a href="#">Sales Order</a></li>
        </ol>
</section>

<div class="row">
									<div class="col-lg-12">
                                    <!-- ALERT SUKSES DITAMBAHKAN -->
              
        		

        		<!-- END ALERT -->
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												

												<li class="active">
													<a data-toggle="tab" href="#home4">Form Sales Order</a>
												</li>
                                                
                                                <li>
													<a data-toggle="tab" href="#profile4">List Sales Order</a>
												</li>

												
											</ul>

											<div class="tab-content">
												<div id="profile4" class="tab-pane">
													<p>
                                                    <!-- /.box-header -->
                                                    
                   
                        </br>
            <div class="box-body">
              <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead>
                	<tr>
                      <th>No</th>
                      <th>Kode SO</th>
                      <th>Ref</th>
                      <th>Tanggal SO</th>
                      <th>Pelanggan</th>
                      <th>Keterangan</th>
                      <th>Status</th>
                      <th>Opsional</th>
                    </tr>
                </thead>
                
                <tbody>	
                    <?php
												$n=1; if(mysql_num_rows($q_so) > 0) { 
												while($data = mysql_fetch_array($q_so)) { 
										     ?>
                	
    				<tr>
        				<td><?php echo $n++ ?></td>
        				<td><?php echo $data['kode_so'];?></td>
        				<td><?php echo $data['ref'];?></td>
                        <td><?php echo date("d-m-Y",strtotime($data['tgl_buat']));?></td>
                        <td><?php echo $data['nama_custemer'];?></td>
                        <td><?php echo $data['keterangan_hdr'];?></td>
                        <td style="text-align:center"><?php if ($data['status']=='0'){echo '<button type="button" class="btn btn-success">OPEN</button>';}elseif($data['status']=='2'){echo '<span class="btn btn-mini fa fa-remove">CLOSE</span>';}else {echo '<button type="button" class="btn btn-danger">BATAL</button>';} ?></td>
												<td>
                                        
                                               <a href="<?=base_url()?>r_cetak_so.php?kode=<?=$data['kode_so']?>" target="_blank"> <button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-print"></span> Print</button></a>               
											
												</td>
						
                        
       				</tr>

    				          <?php
												} }
											?>

                </tbody>
              </table>
             
            </div>
            <!-- /.box-body -->
                                                    
                                                    
                                                    
                                                    </p>
												</div>
                                                
                                                
                                                
                                                
<!-- SAAT TAMBAH -->                                                
                                                <div id="home4" class="tab-pane in active">
													<p>

<form class="form-horizontal" action="" method="post" id="form-add">
             
                     <div class="form-group">
                         <label style="text-align:left" class="col-lg-2 col-sm-2 control-label">Nomer SO</label>
                         <div class="col-lg-10">
                             <input type="text"  class="form-control" name="kode_so" id="kode_so" placeholder="Kode SO..." >
                         </div>
                     </div>
                     
                      <div class="form-group">
                         <label style="text-align:left" class="col-lg-2 col-sm-2 control-label">Ref</label>
                         <div class="col-lg-10">
                             <input type="text" class="form-control" name="ref" id="ref" placeholder="Referensi..." >
                         </div>
                     </div>

                     
                     <div class="form-group">
                         <label style="text-align:left" class="col-lg-2 col-sm-2 control-label">Tanggal SO</label>
                         <div class="col-lg-10">
<!--                             <input type="text" class="form-control" name="tgl_kirim" id="tgl_kirim" placeholder="Tanggal Pengiriman..."> -->
								<div class="input-group">
								<input type="text" name="tanggal_so" id="tanggal" class="form-control datepicker" required/><span class="input-group-addon"><i class="fa fa-calendar bigger-110"></i></span>
							   </div>
                         </div>
                     </div>
                     
                     
                     <div class="form-group">
                         <label style="text-align:left" class="col-lg-2 col-sm-2 control-label">Tanggal Jatuh Tempo</label>
                         <div class="col-lg-10">
                            <div class="input-group">
								<input type="text" name="tanggal_jatuh_tempo" id="tanggal1" class="form-control datepicker" required/><span class="input-group-addon"><i class="fa fa-calendar bigger-110"></i></span>
							</div>
                         </div>
                     </div>
                      
                     <div class="form-group">
                         <label style="text-align:left" class="col-lg-2 col-sm-2 control-label">Salesman</label>
                         <div class="col-lg-10">
                             <input type="text" class="form-control" name="salesman" id="salesman" placeholder="Salesman..." >
                         </div>
                     </div>
                     <div class="form-group">
                         <label style="text-align:left" class="col-lg-2 col-sm-2 control-label">No Penawaran</label>
                         <div class="col-lg-4" >      
                            <select class="form-control" id="master_proyek" name="master_proyek">
                                <option value="">-- Pilih --</option>
                            <?php
                            if(mysql_num_rows($q_mp) > 0){
                                while($res = mysql_fetch_array($q_mp)){
                                   
								  echo '<option value="'.$res['kode_penawaran'].'" '.(isset($row['kode_barang']) ? ($row['kategori_1'] == $res['kode_penawaran'] ? "selected" : "") : "").'>'.$res['kode_penawaran'].'</option>';
                                }
                            }else{  ?>
                                    <option value="">Tambahkan Penawaran Terlebih Dahulu</option>
                                   
                                <?php   }
                            ?>
                                
                             </select>
                         </div>
                         <div class="col-lg-1">      
                       	<label style="text-align:left">Nama Customer</label>        
                         </div>
                         <div class="col-lg-5" id="sisaplafon">
                        <input style="font-weight:bold" type="text" class="form-control" name="nama_customer" id="nama_customer" placeholder="nama_customer..." >  
                         </div>
                     </div>
                      <div class="form-group">
                         <label style="text-align:left" class="col-lg-2 col-sm-2 control-label">PO Costumer</label>                         
<div class="col-lg-10">
                             <input type="text" class="form-control" name="po_customer" id="po_customer" placeholder="PO Costumer...">
                         </div>
                     </div>
                     
                     <div class="form-group">
                         <label style="text-align:left" class="col-lg-2 col-sm-2 control-label">Keterangan</label>
                         <div class="col-lg-10">
                             <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan..."></textarea>
                         </div>
                     </div>
                     <div class="form-group">
                         <label style="text-align:left" class="col-lg-2 col-sm-2 control-label">Alamat Pengiriman Barang</label>                         
<div class="col-lg-10">
                             <textarea class="form-control" name="alamat_pengiriman" id="alamat_pengiriman" placeholder="Alamat..."></textarea>
                         </div>
                     </div>
                     
                     <div class="form-group">
                         <label style="text-align:left" class="col-lg-2 col-sm-2 control-label">Alamat Penagihan</label>                         
<div class="col-lg-10">
                             <textarea class="form-control" name="alamat_penagihan" id="alamat_penagihan" placeholder="Alamat..."></textarea>
                         </div>
                     </div>
                     
                     <div class="form-group">
                         <label style="text-align:left" class="col-lg-2 col-sm-2 control-label">Kota</label>                         
<div class="col-lg-10">
                             <input type="text" class="form-control" name="kepada_kota" id="kepada_kota" placeholder="Kota...">
                         </div>
                     </div>
                     
                     <div class="form-group">
                         <label style="text-align:left" class="col-lg-2 col-sm-2 control-label">Telpon</label>                         
<div class="col-lg-10">
                             <input type="text" class="form-control" name="kepada_telpon" id="kepada_telpon" placeholder="Telpon...">
                         </div>
                     </div>
                    
                      
                    <div class="form-group">
                         <label style="text-align:left" class="col-lg-2 col-sm-2 control-label">Upload PO Custumer</label>
                         <div class="col-lg-10">
                             <input type="file" name="UploadFile"  id="UploadFile">
                         </div>
                     </div>
                     
                     <div class="form-group">
                       <div class="col-lg-12">  
                         <div class="pull-right">
                             <a href="#modalAddItem" class="btn btn-sm btn-primary" data-toggle="modal">
                        <i class="glyphicon glyphicon-plus"></i> Add Item
                    </a>                    		
                         </div>
                       </div>  
                     </div>
                     
                     
                     <div class="form-group">
                     	<div class="col-lg-12">
                        	<table id="simple-table"  class="table  table-bordered table-hover">
                            	<thead>
                            	<tr>
                                	<th width="3%">No</th>
                                    <th width="20%">Kode Barang</th>
                                    <th width="50%">Nama Barang</th>
                                    <th width="7%">Qty</th>
                                    <th width="5%">Satuan</th>
                                    <th width="20%">Harga</th>
                                    <th width="20%">Jumlah</th>
                                    <th>Keterangan</th>
                                    <th width="4%"></th>
                                </tr>
                                </thead>
                                 <tbody id="show-item-barang">
                                            <tr> <td colspan="10" class="text-center"> Tidak ada item . </td></tr>
                                </tbody>
                            </table>
                     	</div>
                     </div>
                     
                <div class="form-group col-md-6">
											 <button type="submit" name="submit" class="btn btn-primary" tabindex="10"><i class="fa fa-check-square-o"></i> Simpan</button><a href="" class="btn btn-danger"><i class=" fa fa-reply"></i> Batal</a>&nbsp; <img src="<?=base_url()?>assets/images/loading.gif" class="animated"/>
               
				</div>
                 </form>
                                                    
                                                    </p>
												</div>
                                                
<!-- ============ MODAL ADD ITEM =============== -->
<div class="modal fade" id="modalAddItem" role="dialog">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
												  <button type="button" class="close" data-dismiss="modal">&times;</button>
												  <h4 class="modal-title">Tambah SO</h4>
												</div>
		          <div class="col-md-12 pm-min">
                    <form role="form" method="post" action="" id="form-add-so">
                        <div class="col-md-12 pm-min-s">
                           
                            <div class="col-md-6 pm-min-s">
                                <label class="control-label">Kode Barang</label>
                                <input type="text" name="kode_barang" id="kode_barang" class="form-control"/>
                            </div>
                             <div class="col-md-6 pm-min-s">
                                <label class="control-label">Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control"/>
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
                            <label class="control-label">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control" value="0" tabindex="3"/>
                            
                             </div>
                             
                        </div>
                   
                    </form>
                    </div>
                               
															
												
												<div class="modal-footer">
                                                <button type="button" name="submit" class="btn btn-success add-to-so" tabindex="4" data-dismiss="modal"><i class="fa fa-plus"></i> Tambah</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
							
<!---------------------------------------END-------------------------------------------->
 											</div>
										</div>
  
									</div><!-- /.col -->
</div>                                    
<style>
  .pm-min, .pm-min-s{padding:3px 1px; }
  .animated{display:none;}
  </style>
<script>
$(document).ready(function (e) {
	 $("#form-add").on('submit',(function(e) {
		var grand_total = parseFloat($("#total_brutto").val());
		if(grand_total == "" || isNaN(grand_total)) {grand_total = 0;}
		e.preventDefault();
	  	if(grand_total != 0) {			
			$(".animated").show();
			$.ajax({
				url: "<?=base_url()?>ajax/r_so.php?func=saveso",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(html)
				{
					//var msg = html.split("||");
					//if(msg[0] == "00") {
						
						window.location = '<?=base_url()?>?page=so';
					//} else {
					//	notifError(msg[1]);
				//	}
					$(".animated").hide();
				}   
		   });
	  	} else {notifError("<p>Item barang masih kosong.</p>");}
	 }));
  });
  
$("#master_proyek").change(function(){
        var value	=	$(this).attr('data'); 
		$.ajax({
			type: "POST",
			url: '<?=base_url()?>ajax/r_so.php?func=load',
			data: $("#form-add").serialize(),
			cache: false,
			success:function(data){
				$('#show-item-barang').html(data).show();				
				
			}
		});
	});

$('.add-to-so').click(function(){
		var value	=	$(this).attr('data'); 
		$.ajax({
			type: "POST",
			url: '<?=base_url()?>ajax/r_so.php?func=add',
			data: $("#form-add-so").serialize(),
			cache: false,
			success:function(data){
				$('#show-item-barang').html(data).show();
				$('#kode_barang').val('');$('#nama_barang').val('');
				$('#jumlah').val('0'); $('#harga').val('0');$('#satuan').val('');
			}
		});
	});
	
</script>