<?php $this->load->view('component/page_head'); ?>
<body class="nav-md">
<div class="container body">
<div class="main_container">

<?php 
	if ($this->session->userdata('level') != "1") {
	$this->load->view('component/sidebar_baru_user'); 
	}
	else{	
	 	$this->load->view('component/sidebar_baru'); 
	}
?>
<?php $this->load->view('component/header_baru'); ?>
<div class="right_col" role="main">
  
<?php $this->load->view($subview); ?>

   
</div>
 <!-- footer content -->
        <footer>
          <div class="pull-right">
            Aluradmi - Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
 </div>
 </div>
<?php $this->load->view('component/page_tail'); ?>