<?php $this->load->view("adminpanel/header"); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      
      <h2>Add New Room</h2>

		<?php echo form_open_multipart('admin/room/addblog_post'); ?>
		  <div class="row">
			  <div class="col-6">
				  <div class="form-group">
					  <input type="text" class="form-control" name="roomtitle" placeholder="Room Name">
				  </div>
			  </div>
			  <div class="col-6">
				  <div class="form-group">
					  <input type="number" class="form-control" name="price" step="0.01" placeholder="Price(RM)">
				  </div>
			  </div>
		  </div>


        <div class="form-group">
          <textarea class="form-control" name="desc" placeholder="Room Desc"></textarea>
        </div>

		  <div class="form-group">
			  <textarea class="form-control" name="recomendation" placeholder="Recomendation"></textarea>
		  </div>

		  <div class="row">
			  <div class="col-5">
				  <div class="form-group">
					  <input type="file" class="form-control" name="file" placeholder="Title" required>
				  </div>
			  </div>
		  </div>


        <button type="submit" class="btn btn-primary" name="addbtn" >Add Room</button>
		<div class="mt-3"></div>
		<?php

		if (isset($error)) {
			if ($error != "NO_ERROR") {
				echo '<div class="alert alert-danger" role="alert">';
				echo "$error";
				echo '</div>';
			}
		}


		?>
		<?php
		echo validation_errors();
		?>
<!--      </form>-->

    </main>
  </div>
</div>

<?php $this->load->view('adminpanel/footer.php'); ?>


<script type="text/javascript">
  <?php 
      if (isset($_SESSION['inserted'])) {
        if ($_SESSION['inserted']=="yes") {
          # code...
          echo "alert('Data Inserted Successfully!');";
        }
        else{
          echo "alert('Not Inserted!');";
        }
      }
   ?>
</script>
