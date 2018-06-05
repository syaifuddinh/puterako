 <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2017-2018 <a href="https://lotusolusi.com">Lotusolusi.com</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
   <!-- <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url();?>vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url();?>data/morris-data.js"></script>
    <!-- DataTables -->
	<script src="<?php echo base_url();?>vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>dist/js/sb-admin-2.js"></script>
    
      <script src="<?php echo base_url();?>assets/timepicker/jQuery.js"></script>

	<script src="<?php echo base_url();?>assets/timepicker/js/moment.js"></script>
	<script src="<?php echo base_url();?>assets/timepicker/js/bootstrap-datetimepicker.min.js"></script>
		
    
    <script src="assets/gritter.js"></script>
    <script type="text/javascript">
      function notifSuccess(text){
      $.gritter.add({
        title: 'Success!',
        text: "" + text + "",
        image: '<?=base_url()?>assets/images/success.png',
		class_name: 'success',
        time: '4000'
      });
      return false;
    }
	
	function notifError(text){
      $.gritter.add({
        title: 'Error!',
        text: "" + text + "",
        image: '<?=base_url()?>assets/images/error.png',
		class_name: 'error',
        time: '6000'
      });
      return false;
    }
    </script>
</script>


</body>

</html>
