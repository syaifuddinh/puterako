<div class="box-body">
  <div class="row">
    <div class="tab-content">
      <div id="menuListPp">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <table class="table table-bordered">
                <thead>
                  <tr align="center">
                    <th>No</th>
                    <th>No PP</th>
                    <th>No Penawaran</th>
                    <th>Kepada</th>
                    <th>Tanggal</th>
                    <th>Up</th>
                    <th>Status</th>
                    <th>Status Approve</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $penawaran_cmd = "SELECT * FROM penawaran_hdr";
                    $go = mysql_query($penawaran_cmd);
                    $n=1; if(mysql_num_rows($go) > 0) { 
                    while($data = mysql_fetch_array($go)) { 
                       ?>
                  <tr>
                    <td> <?php echo $n++ ?></td>
                    <td><a href="<?=base_url()?>?page=approval/detail&kode=<?=$data['id_penawaran']?>"><?php echo $data['kode_pp'];?></a></td>
                    <td> <?php echo $data['kode_penawaran'];?></td>
                    <td> <?php echo $data['kepada'];?></td>
                    <td> <?php echo date("d-m-Y",strtotime($data['tanggal']));?></td>
                    <td> <?php echo $data['Up'];?></td>
                    <td align="center"><?php if ($data['status']=='0'){echo '<button type="button" class="btn btn-success">OPEN</button>';}elseif($data['status']=='2'){echo '<span class="btn btn-mini fa fa-remove">CLOSE</span>';}else {echo '<button type="button" class="btn btn-danger">BATAL</button>';} ?></td>
                    <td> 
                    	<?php 
                    		$status_app = "-";
                    		switch( $data['status_app'] ) {
                    			case 0 :
                    				$status_app = 'Belum approve';
                    			break;

                    			case 1 :
                    				$status_app = 'Approved';
                    			break;

                    			case 2 :
                    				$status_app = 'Batal';
                    			break;
                    		}

                    		echo $status_app;
                    	?>
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
</div>