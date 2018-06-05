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

                             <div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class="active">
													<a data-toggle="tab" href="#menuFormfs">Form Edit Jasa</a>
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
									<form role="form" method="post" action="" id="editForm" >								
										<div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Kode Jasa</label>
											<input type="text" name="kd_jasa" id="kd_jasa" readonly placeholder="Kode Jasa..." class="form-control" value="<?=(isset($row['kd_jasa']) ? $row['kd_jasa'] : '')?>" autocomplete="off" required>
                            <input type="hidden" name="id_form" id="id_form" value="<?php echo $id_form; ?>"/> 
                                          <ul id="search_suggestion_holder" style="margin-left:-40px; min-width:600px; max-width:700px"></ul>   
                                           <input type="hidden" value="<?=RandomString() ?>"  id="token" name="token" class="form-control" > 
									</div> 
                            
										<div class="form-group col-md-12 col-sm-2 col-xs-12">
											<label>Deskripsi</label>
											<input type="text" name="deskripsi" id="deskripsi" value="<?=(isset($row['kd_jasa']) ? $row['deskripsi'] : '')?>" placeholder="Deskripsi Jasa..." class="form-control">
										</div>
                                       
                                        
                                        
                                        
                                         <div class="form-group">
                                        <h3>Jasa</h3>
                                        </div>
                                        <div class="form-group">
											<div class="form-group">
                                           <div class="col-lg-12">  
                                             <div class="pull-right">
                                                 <a href="javascript:;" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_survey">
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
                                                    <th width="100px">Opsional</th>
                                                </tr>
                                            </thead>
                                            <tbody id="show-item-fjasa">
                                            <?php
												if(isset($_SESSION['data_jasa'.$id_form.'']) and count(@$_SESSION['data_jasa'.$id_form.'']) > 0) {
									$n=1;
									$array = $_SESSION['data_jasa'.$id_form.''];
									foreach($array as $key=>$item) {
												?>
                                            <tr>
                                            	<td><?php echo $n++ ?></td>
                                                <td><?php echo $item['description'];?></td>
                                                <td><?php echo $item['vol'];?></td>
                                                <td><?php echo $item['hari'];?></td>
                                                <td><?php echo $item['orang'];?></td>
                                                <td style="text-align:right"><?php echo number_format($item['unit']);?></td>
                                                <td style="text-align:right"><?php echo number_format($item['total']);?></td>
                                                <td>
                                                <a href="javascript:;" class="label label-info edit_jasa" data-toggle="modal" data-target="#edit_jasa" data-id="<?=$item['id']?>"><i class="fa fa-pencil"></i></a>
					<a href="javascript:;" class="label label-danger hapus-jasa" data-id="<?=$key?>"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                            <?php
											     
											    
												} }
											?>
                                            <tr>
                                                <td colspan="6" style="text-align:right">Total</td>	
                                                <td colspan="1" style="text-align:right"><input type="hidden" value="<?=$row['subtotal']?>" id="b_total" name="b_total" data-id="b_total"><b><?=number_format($row['subtotal'])?></b></td>
                                                <td></td>
                                            </tr>
                                                
                                            <tr>
                                                <td colspan="6" style="text-align:right">Profit (%) <input style="width:50px" type="number" placeholder="Profit" value="<?=$row['profit']?>" id="profit" name="profit" data-id="profit" ></td>	
                                                <td colspan="1" style="text-align:right"><input type="number" readonly value="<?=$row['profit10']?>" id="b_profit10" name="b_profit10"></td>
                                                <td></td>
                                            </tr> 
                                        
                                            <tr>
                                                <td colspan="6" style="text-align:right">Pph 6%</td>	
                                                <td colspan="1" style="text-align:right"><input type="number" readonly value="<?=$row['pph6']?>" id="b_pph6" name="b_pph6"></td>
                                                <td></td>
                                            </tr>
                                                
                                                
                                            <tr>
                                                <td colspan="6" style="text-align:right">Pembulatan</td>	
                                                <td colspan="1" style="text-align:right"><input type="number" value="<?=$row['total']?>" id="b_grand_total" name="b_grand_total"></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
										</div>
                                        </div>
                                         
									
                          </div>
                        <!-- /.panel-body -->
                    </div>                       
                    <!-- /.panel-default -->
                    
                    <div class="form-group col-md-6">
											 <button type="submit" name="submit" class="btn btn-primary" tabindex="10"><i class="fa fa-check-square-o"></i> Simpan</button> <a href="<?=base_url()?>?page=form_jasa" class="btn btn-danger"><i class=" fa fa-reply"></i> Batal</a>&nbsp; <img src="<?=base_url()?>assets/images/loading.gif" class="animated"/>
               
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
               
                
                
                

<?php unset($_SESSION['data_jasa']); ?>
  <style>
  .pm-min, .pm-min-s{padding:3px 1px; }
  .animated{display:none;}
  </style>
  <script>
  $(document).ready(function (e) {
	 $("#editForm").on('submit',(function(e) {
		var grand_total = parseFloat($("#b_grand_total").val());
		if(grand_total == "" || isNaN(grand_total)) {grand_total = 0;}
		e.preventDefault();
	  	if(grand_total != 0) {			
			$(".animated").show();
			$.ajax({
				url: "<?=base_url()?>ajax/r_fjasa.php?func=save",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(html)
				{
					//var msg = html.split("||");
					//if(msg[0] == "00") {
						
						window.location = '<?=base_url()?>?page=form_jasa';
					//} else {
					//	notifError(msg[1]);
				//	}
					$(".animated").hide();
				}   
		   });
	  	} else {notifError("<p>Item  masih kosong.</p>");}
	 }));
  });
  

	$('.add-to-jasa').click(function(){
		var value	=	$(this).attr('data'); 
		$.ajax({
			type: "POST",
			url: '<?=base_url()?>ajax/r_fjasa.php?func=add',
			data: $("#form-add-jasa").serialize(),
			cache: false,
			success:function(data){
				$('#show-item-fjasa').html(data).show();
				$('#description').val('');
				$('#vol').val('1'); $('#hari').val('1');$('#orang').val('1');$('#unit').val('1'); 
			}
		});
	});
	
	$('.hapus-jasa').click(function(){
		var id =	$(this).attr('data-id'); 
		var id_form = $('#id_form').val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url()?>ajax/r_fjasa.php?func=hapus-jasa',
			data: 'idhapus=' + id + '&id_form=' +id_form,
			cache: false,
			success:function(data){
				$('#show-item-fjasa').html(data).show();
			 }
		});
	});
	
	$('.edit_jasa').click(function(){
		var id =	$(this).attr('data-id'); 
		var id_form = $('#id_form').val();
		$.ajax({
			type: 'POST',
			url: '<?=base_url()?>ajax/r_fjasa.php?func=edit_jasa',
			data: 'id=' +id + '&id_form=' +id_form,
			cache: false,
			success:function(data){
				$('#show-item-edit').html(data).show();
			}
		});
	});
	
	$(document).on("change paste keyup", "input[data-id='profit']", function(){
		var subtotal = $('#b_total').val();
		var profit = $(this).val();
		var persen_profit = parseInt(100-profit);
		var nominal_profit = Math.ceil(subtotal/(persen_profit/100));		
		var pph6 = Math.ceil(nominal_profit/0.94);	
						
		$('[name="b_profit10"]').val(nominal_profit);
							
		$('[name="b_pph6"]').val(pph6);
							
		$('[name="b_grand_total"]').val(pph6);
	});
  
  
   
</script>
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

   