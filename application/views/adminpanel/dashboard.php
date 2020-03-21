<?php $this->load->view("adminpanel/header"); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
       
      </div>

      <div class="row">
		  <?php
		  if(isset($_SESSION['role1'])){
		  ?>
         <div class="col-md-3 alert alert-primary" role="alert">
          <a href="<?= base_url().'admin/room/'?>">View Rooms</a>
        </div>
		  <?php

		  }?>

		  <?php
		  if(isset($_SESSION['role1'])){
		  ?>
        <div class="col-md-1"></div>
         <div class="col-md-3 alert alert-warning" role="alert">
          <a href="<?= base_url().'admin/room/addblog'?>">Add Room</a>
        </div>
		  <?php
		  }?>

		  <?php
		  if(isset($_SESSION['role2'])){
			  ?>
			  <div class="col-md-1"></div>

			  <div class="col-md-3 alert alert-dark" role="alert">
				  <a href="<?= base_url().'customer/home/'?>">View Home Page</a>
			  </div>
			  <?php

		  }?>
      </div>
    </main>
  </div>
</div>

<?php $this->load->view('adminpanel/footer.php'); ?>
