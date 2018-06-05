<?php include 'script/f_jasa.php'; ?>
<script src="assets/fs-autocomplete.js"></script>

<section class="content-header">
       
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Penjualan</a></li>
          <li><a href="#">Form Jasa</a></li>
        </ol>
</section>

            <!-- /.row -->
            <div class="box box-info">
            <div class="box-body">

                             <div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class="active">
													<a data-toggle="tab" href="#menuFormfs">Revisi Jasa</a>
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
									$token=$row['token'];
									
								}
								?>
                                
									<form role="form" method="post" action="">								
										<div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Kode Jasa</label>
											<input type="text" name="kd_jasa" id="kd_jasa" value="<?=$row['kd_jasa']?>" placeholder="Kode Jasa..." class="form-control" autocomplete="off" readonly>
                                            
							
                                          <ul id="search_suggestion_holder" style="margin-left:-40px; min-width:600px; max-width:700px"></ul>   
                                            
									</div> 
                            
										<div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Deskripsi</label>
											<input type="text" name="deskripsi" id="deskripsi" value="<?=$row['deskripsi']?>" placeholder="Deskripsi Jasa..." class="form-control">
										</div>
                                       
                                        
                                        
                                        
                                         <div class="form-group">
                                        <h3>Jasa</h3>
                                        </div>
                                        <div class="form-group">
											<div class="form-group">
                                           <div class="col-lg-12">  
                                             
                                           </div>  
                                         </div>
										</div>
                                        </br>
                                        </br>
                                        <div class="form-group">
                     	                     <div class="col-lg-12">
										<table id="example" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="20px">No</th>
                                                    <th>Description</th>
                                                    <th>Vol</th>
                                                    <th>Hari</th>
                                                    <th>Orang</th>
                                                    <th>Unit</th>
                                                    <th>Total</th>
                                                    <th width="100px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
												if(isset($_SESSION['data_jasa']) and count(@$_SESSION['data_jasa']) > 0) {
									$n=1;
									$array = $_SESSION['data_jasa'];
									foreach($array as $key=>$item) {
												?>
                                            	<tr> 
                                            		<td><?php echo $n ?></td>
                                                    <td><?php echo $item['description'];?><input type="hidden" name="description[]" id="description" value="<?php echo $item['description'];?>" /><input type="hidden" name="id_fjasa_dtl[]" id="id_fjasa_dtl[]" value="<?php echo $item['id_fjasa_dtl'];?>" /></td>
                                                    <td><input type="number" name="vol[]" id="vol[]" data-id="vol" data-group="<?=$n;?>" value="<?php echo $item['vol'];?>"  /></td>
                                                    <td><input type="number" name="hari[]" id="hari[]" data-id="hari" data-group="<?=$n;?>" value="<?php echo $item['hari'];?>"  /></td>
                                                    <td><input type="number" name="orang[]" id="orang[]" data-id="orang" data-group="<?=$n;?>" value="<?php echo $item['orang'];?>"  /></td>
                                                    <td><input type="number" name="unit[]" id="unit[]" data-id="unit" data-group="<?=$n;?>" value="<?php echo $item['unit'];?>"  /></td>
                                                    <td><input type="number" readonly="readonly" name="total[]" id="total[]" data-id="total" data-group="<?=$n;?>" value="<?php echo $item['total'];?>"  /></td>
                                                    <td></td>
                                            	</tr>
                                                
                                                <?php
											     
											    
												$n++;} }
											?>
                                            	<tr>
                                                	<td colspan="6" style="text-align:right">Subtotal</td>
                                                    <td><input type="number" readonly="readonly" name="subtotal" id="subtotal" value="<?php echo $row['subtotal'];?>"  /></td>
                                                </tr>
                                                <tr>
                                                	<td colspan="6" style="text-align:right">Profit 10%</td>
                                                    <td><input type="number" readonly="readonly" name="profit10" id="profit10" value="<?php echo $row['profit10'];?>"  /></td>
                                                </tr>
                                                <tr>
                                                	<td colspan="6" style="text-align:right">Pph 6%</td>
                                                    <td><input type="number" readonly="readonly" name="pph6" id="pph6" value="<?php echo $row['pph6'];?>"  /></td>
                                                </tr>
                                                <tr>
                                                	<td colspan="6" style="text-align:right">Pembulatan</td>
                                                    <td><input type="number" name="grand_total" id="grand_total" value="<?php echo $row['total'];?>"  /></td>
                                                </tr>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
                                         
									
                          </div>
                        <!-- /.panel-body -->
                    </div>                       
                    <!-- /.panel-default -->
                    
                    <div align="left" class="form-group">
                     <button class="btn btn-success" type="submit"  name="<?=(isset($row['kd_jasa']) ? "update" : "simpan")?>"><i class="fa fa-pencil"></i> Simpan&nbsp;</button>
                     <a href="<?=base_url()?>?page=form_jasa" class="btn btn-danger"><i class=" fa fa-reply"></i> Batal</a>
                 </div>
                 
            
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
                            <input type="hidden" name="id_form" id="id_form" value="<?php echo $id_form; ?>"/> 
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
               
                

  
<script>
		$(document).on("change paste keyup", "input[data-id='vol']", function(){
  			var vol = $(this).val() || 0;
			var group = $(this).data('group');
			var hari = $("input[data-id='hari'][data-group='"+group+"']").val();
			var orang = $("input[data-id='orang'][data-group='"+group+"']").val();
			var yunit = $("input[data-id='unit'][data-group='"+group+"']").val();
			var total = parseInt((vol*hari*orang)*yunit);
			$("input[data-id='total'][data-group='"+group+"']").val(total);			
			
  			var subtot = 0;
  			$('[name="total[]"]').each(function() {
    			subtot += +this.value || 0;
  			});
			$('[name="subtotal"]').val(subtot);
			
			var profit10 = 0;
				profit10=Math.ceil(subtot/0.9);
			
			$('[name="profit10"]').val(profit10);
			
			var pph6 = 0;
				pph6=Math.ceil(profit10/0.94);
			
			$('[name="pph6"]').val(pph6);
			
			$('[name="grand_total"]').val(pph6);
			
		});
		
		$(document).on("change paste keyup", "input[data-id='hari']", function(){
  			var hari = $(this).val() || 0;
			var group = $(this).data('group');
			var vol = $("input[data-id='vol'][data-group='"+group+"']").val();
			var orang = $("input[data-id='orang'][data-group='"+group+"']").val();
			var yunit = $("input[data-id='unit'][data-group='"+group+"']").val();
			var total = parseInt((vol*hari*orang)*yunit);
			$("input[data-id='total'][data-group='"+group+"']").val(total);			
			
  			var subtot = 0;
  			$('[name="total[]"]').each(function() {
    			subtot += +this.value || 0;
  			});
			$('[name="subtotal"]').val(subtot);
			var profit10 = 0;
				profit10=Math.ceil(subtot/0.9);
			
			$('[name="profit10"]').val(profit10);
			var pph6 = 0;
				pph6=Math.ceil(profit10/0.94);
			
			$('[name="pph6"]').val(pph6);
			
			$('[name="grand_total"]').val(pph6);
		});		
		
		$(document).on("change paste keyup", "input[data-id='orang']", function(){
  			var orang = $(this).val() || 0;
			var group = $(this).data('group');
			var hari = $("input[data-id='hari'][data-group='"+group+"']").val();
			var vol = $("input[data-id='vol'][data-group='"+group+"']").val();
			var yunit = $("input[data-id='unit'][data-group='"+group+"']").val();
			var total = parseInt((vol*hari*orang)*yunit);
			$("input[data-id='total'][data-group='"+group+"']").val(total);			
			
  			var subtot = 0;
  			$('[name="total[]"]').each(function() {
    			subtot += +this.value || 0;
  			});
			$('[name="subtotal"]').val(subtot);
			var profit10 = 0;
				profit10=Math.ceil(subtot/0.9);
			
			$('[name="profit10"]').val(profit10);
			var pph6 = 0;
				pph6=Math.ceil(profit10/0.94);
			
			$('[name="pph6"]').val(pph6);
			
			$('[name="grand_total"]').val(pph6);
		});
		
		$(document).on("change paste keyup", "input[data-id='unit']", function(){
  			var yunit = $(this).val() || 0;
			var group = $(this).data('group');
			var hari = $("input[data-id='hari'][data-group='"+group+"']").val();
			var orang = $("input[data-id='orang'][data-group='"+group+"']").val();
			var vol = $("input[data-id='vol'][data-group='"+group+"']").val();
			var total = parseInt((vol*hari*orang)*yunit);
			$("input[data-id='total'][data-group='"+group+"']").val(total);			
			
  			var subtot = 0;
  			$('[name="total[]"]').each(function() {
    			subtot += +this.value || 0;
  			});
			$('[name="subtotal"]').val(subtot);
			var profit10 = 0;
				profit10=Math.ceil(subtot/0.9);
			
			$('[name="profit10"]').val(profit10);
			var pph6 = 0;
				pph6=Math.ceil(profit10/0.94);
			
			$('[name="pph6"]').val(pph6);
			
			$('[name="grand_total"]').val(pph6);
		});

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

   