<?php 
	if(isset($_GET['kode'])) {
		$id = $_GET['kode'];
		$qp = "SELECT * FROM penawaran_hdr WHERE id_penawaran = $id";
		$go = mysql_query($qp);
		$resp = mysql_fetch_array($go); 
	}
?>
<div class="box-body">
	<div class="row">
	    <div class="col-md-12">
	      <div class="invoice-title">
	        <h2>
	        	Detail Penawaran
	        </h2>
	        <h3 class="pull-right">Order # 12345</h3>
	      </div>
	      <hr>
	      <div class="row">
	        <div class="col-xs-6">
	          <address>
	            <strong>Kode Penawaran:</strong><br>
	            <?php echo $resp['kode_penawaran']; ?>
	          </address>
	        </div>
	        <div class="col-xs-6 text-right">
	          <address>
	            <strong>Kepada:</strong><br>
	            <?php echo $resp['kepada']; ?>
	          </address>
	        </div>
	      </div>
	      <div class="row">
	        <div class="col-xs-6">
	          <address>
	            <strong>Kode PP:</strong><br>
	            <?php echo $resp['kode_pp']; ?>
	          </address>
	        </div>
	        <div class="col-xs-6 text-right">
	          <address>
	            <strong>Tanggal:</strong><br>
	            <?php echo $resp['tanggal']; ?>
	          </address>
	        </div>
	      </div>
	    </div>
	  </div>
	<!-- Menampilkan detail penawaran -->
	<?php 
			// Melihat semua jenis barang di detail penawaran
			$q_dtl_jenis = 'SELECT DISTINCT jenis_barang FROM penawaran_dtl WHERE kode_penawaran  != "' . $resp["kode_pp"] . '" ';

			$cmd_dtl_jenis = mysql_query($q_dtl_jenis);

			$jenis_barang = array();
			if($cmd_dtl_jenis) {
				while($r = mysql_fetch_array($cmd_dtl_jenis)) 
					array_push($jenis_barang, $r['jenis_barang']);
			}
			// Menampilkan detail penawaran 
			if(count($jenis_barang) > 0) {
				foreach ($jenis_barang as $key => $val) {
					
	 ?>
		
	  <div class="row">
	    <div class="col-md-12">
	      <div class="panel panel-default">
	        <div class="panel-heading">
	          <h3 class="panel-title">
	          	<strong>
	          		<?php echo $val; ?>
	          	</strong>
	          </h3>
	        </div>
	        <div class="panel-body">
	          <div class="table-responsive">
	            <table class="table table-condensed">
	              <thead>
	                <tr>
	                  <td><strong>Model</strong></td>
	                  <td class="text-center"><strong>Price</strong></td>
	                  <td class="text-center"><strong>QTY</strong></td>
	                  <td class="text-right"><strong>Totals</strong></td>
	                </tr>
	              </thead>
	              <tbody>
	                <!-- foreach ($order->lineItems as $line) or some such thing here -->
	                <?php 
	                	$q_detail = "SELECT * FROM penawaran_dtl WHERE kode_penawaran='" . $resp['kode_pp'] . "' AND jenis_barang = '" . $val . "'";
	                	$run_detail = mysql_query($q_detail);
	                	if($run_detail AND mysql_num_rows($run_detail) > 0) {
	                		$subtotal = 0;
	                		while($resp_dtl = mysql_fetch_array($run_detail)) {
	                			$subtotal += ($resp_dtl['qty'] * $resp_dtl['harga']);
	                ?>
	                	<tr>
	                		<td>
	                			<?php echo $resp_dtl['model_item']; ?>
	                		</td>
	                		<td class="text-center">
	                			<?php echo $resp_dtl['harga']; ?>
	                		</td>
	                		<td class="text-center">
	                			<?php echo $resp_dtl['qty']; ?>
	                		</td>
	                		<td  class="text-right">
	                			<?php echo $resp_dtl['qty'] * $resp_dtl['harga']; ?>
	                		</td>
	                	</tr>
	                <?php
	                		}
	                ?>
	                	<tr>
	                  <td class="thick-line"></td>
	                  <td class="thick-line"></td>
	                  <td class="thick-line text-center"><strong>Subtotal</strong></td>
	                  <td class="thick-line text-right">$670.99</td>
	                </tr>
	                <tr>
	                  <td class="no-line"></td>
	                  <td class="no-line"></td>
	                  <td class="no-line text-center"><strong>Shipping</strong></td>
	                  <td class="no-line text-right">$15</td>
	                </tr>
	                <tr>
	                  <td class="no-line"></td>
	                  <td class="no-line"></td>
	                  <td class="no-line text-center"><strong>Total</strong></td>
	                  <td class="no-line text-right">$685.99</td>
	                </tr>
	                <?php
	                	}
	                	else {
	                ?>
	                		<tr>
	                			<td colspan="4">Tidak ada data</td>
	                		</tr>
	                	<?php	
	                	}
	                 ?>
	              
	                
	              </tbody>
	            </table>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	 <?php	
	 			}			
			}
	 ?>
  
	<!-- ---------------------------- -->
  <div class="row" style="margin-bottom:5mm">
  	<div class="col-md-12" style="display: flex;">
  		<form method='post' action="<?php echo base_url(); ?>pages/data/script/approval/approve.php" style='margin-right:2mm'> 
	  		<input type="hidden" name="id" value="<?php echo $resp['id_penawaran']; ?>">
	  		<button class="btn btn-primary">
	  			Approve
	  		</button>
	  	</form>	
	  		
	  	
	  		<button class="btn btn-danger" data-toggle="modal" data-target="#alasan-batal">
	  				Batal
	  		</button>
	  		<!-- Modal -->
				<div id="alasan-batal" class="modal fade" role="dialog">
					<form method='post' action="<?php echo base_url(); ?>pages/data/script/approval/batal.php"> 
	  			<input type="hidden" name="id" value="<?php echo $resp['id_penawaran']; ?>">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Konfirmasi</h4>
					      </div>
					      <div class="modal-body">
					        <div class="form-group">
								    <label for="email">Alasan batal:</label>
								    <textarea name="alasan_batal" class="form-control" id="alasan-batal-text"></textarea>
								  </div>
					      </div>
					      <div class="modal-footer">

					      	<button type="submit" class="btn btn-primary" >Submit</button>

					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
					    </div>

					  </div>
			
				</div>	
	  		

	  	</form> 
  	</div>
  </div>
</div>