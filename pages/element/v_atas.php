<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PT PUTERAKO</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>vendor/morrisjs/morris.css" rel="stylesheet">
      <!-- DataTables -->
     <link rel="stylesheet" href="<?php echo base_url();?>vendor/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- j QUERY -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/ajax-autocomplete.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/ajax2-autocomplete.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/gritter.css"/>
    <link href="<?=base_url()?>assets/timepicker/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/timepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    
		
	<script src="<?=base_url()?>assets/jquery.min.js"></script>
    
    <link href="<?=base_url()?>assets/select2/select2.css" rel="stylesheet">
	<script src="<?=base_url()?>assets/select2/select2.js"></script>
    <script>
    $(document).ready(function (e) {
        
        $(".select2").select2({
          width: '100%'
         });
    });
    </script>
      <link href="<?=base_url()?>assets/jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="<?=base_url()?>assets/jquery-ui-1.11.4/external/jquery/jquery.js"></script>
  <script src="<?=base_url()?>assets/jquery-ui-1.11.4/jquery-ui.js"></script>
  <script src="<?=base_url()?>assets/jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="<?=base_url()?>assets/jquery-ui-1.11.4/jquery-ui.theme.css">
  <script>
   $(document).ready(function(){
	   $("#tanggal").datepicker({
		     dateFormat:'dd-mm-yy'
	   })
   })
    $(document).ready(function(){
	   $("#tanggal1").datepicker({
		     dateFormat:'dd-mm-yy'
	   })
   })
  </script>
 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">

<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header"><img src="<?php echo base_url();?>/images/fotter.jpeg" width="230" height="58">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url();?>index.php">Dashboard</a></li>
       <!--   <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="">Profil Perusahaan</a></li>
                <li><a href="">Cabang</a></li>
                <li><a href="">Gudang</a></li>
                <li class="divider"></li>
                <li><a href="">Kategori Barang</a></li>
                <li><a href="">Kategori Pelanggan</a></li>
                <li><a href="">Tutup Periode</a></li>
                <li><a href="">Data User</a></li>
              </ul>
            </li> --->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Penjualan <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?=base_url()?>?page=pp">Permintaan Penawaran</a></li>
                 <li><a href="<?=base_url()?>?page=form_survey">Form Survey</a></li>
                 <li><a href="<?=base_url()?>?page=form_jasa">Form Jasa</a></li>
                 <li><a href="<?=base_url()?>?page=penawaran">Penawaran</a></li>
                 <!-- <li><a href="<?=base_url()?>?page=so">Sales Order</a></li> -->
                 <li><a href="<?=base_url()?>?page=lod2">Letter Of Duty</a></li>
               
              </ul>
            </li>
     <!--     <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?=base_url()?>?page=master_satuan">Master Satuan</a></li>
                <li><a href="<?=base_url()?>?page=master_barang">Master Barang</a></li>
                <li><a href="<?=base_url()?>?page=master_coa">Master COA</a></li>
                <li><a href="<?=base_url()?>?page=master_promo">Master Promo</a></li>
                <li class="divider"></li>
                <li><a href="<?=base_url()?>?page=master_pelanggan">Master Pelanggan</a></li>
                <li><a href="<?=base_url()?>?page=master_supplier">Master Supplier</a></li>
                <li><a href="<?=base_url()?>?page=master_karyawan">Master karyawan</a></li>
                
              </ul>
            </li> 
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Analisa Transaksi <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                 
                    
                     <li><a href="<?=base_url()?>?page=laporan_penjualan">laporan Penjualan Lazada</a></li>
                     <li><a href="<?=base_url()?>?page=laporan_penjualan_fbl">laporan Penjualan FBL</a></li>
                   
               <li class="divider"></li>  
                 
                     <li><a href="<?=base_url()?>?page=laporan_rekap_penjualan">laporan Rekap Lazada</a></li>
                     <li><a href="<?=base_url()?>?page=laporan_rekap_penjualan_fbl">laporan Rekap FBL</a></li>
                
               <li class="divider"></li>
                     <li><a href="<?=base_url()?>?page=top_transaksi">Top Transaksi Lazada Per Bulan</a></li>
                      <li><a href="<?=base_url()?>?page=top_transaksi_fbl">Top Transaksi FBL Per Bulan</a></li>
               
                
              </ul>
            </li> --->
          
            
          </ul>
          
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
        </div>
        
          <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
       <ul class="nav navbar-nav navbar-right user-nav">
          <li class="dropdown profile_menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$_SESSION['app_user']?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?=base_url()?>logout.php">Sign Out</a></li>
            </ul>
          </li>
        </ul>	
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
