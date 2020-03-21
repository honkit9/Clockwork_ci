<?php 
   //echo "<pre>"; print_r($result); die();
 ?>
<?php $this->load->view("adminpanel/header"); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      
      <h2>Edit Room</h2>
      
      <form enctype="multipart/form-data" action="<?= base_url().'admin/room/editblog_post' ?>" method="post">

		  <div class="row mb-3">
			  <div class="col-6">
				  <label for="Recommendation"  class="font-weight-bold">Status</label>

				  <select class="custom-select" name="status">
				  <option value="1" <?= ( $result[0]['status'] == "1" ? "selected" : "" ); ?>>Publish</option>
				  <option value="0" <?= ( $result[0]['status'] == "0" ? "selected" : "" ); ?>>Unpublish</option>
			  </select>
			  </div>
		  </div>


        <input type="hidden" name="roomid" value="<?= $roomid ?>">

		  <div class="row">
			  <div class="col-6">
				  <div class="form-group">
					  <label for="Recommendation"  class="font-weight-bold">Room Name</label>
					  <input type="text" value="<?= $result[0]['Room_Name'] ?>" class="form-control" name="roomtitle" placeholder="Room Name">
				  </div>
			  </div>
			  <div class="col-6">
				  <div class="form-group">
					  <label for="Recommendation"  class="font-weight-bold">Price (RM)</label>
					  <input type="number" value="<?= $result[0]['Room_Price'] ?>" class="form-control" name="price" step="0.01" placeholder="Price(RM)">
				  </div>
			  </div>
		  </div>


		  <div class="form-group">
			  <label for="Recommendation"  class="font-weight-bold">Summary</label>
			  <textarea class="form-control" name="desc" placeholder="Room Desc"><?= $result[0]['Room_Summary'] ?></textarea>
		  </div>

		  <div class="form-group">
			  <label for="Recommendation"  class="font-weight-bold">Recommendation</label>
			  <textarea class="form-control" name="recomendation" placeholder="Recomendation"><?= $result[0]['Recommendation'] ?></textarea>
		  </div>

		  <div class="row">
			  <div class="col-5">
				  <div class="form-group">
					  <label for="Recommendation" class="font-weight-bold">Room Image</label><br>
					  <img width="100" src="<?= base_url().$result[0]['Room_Image']?>">
					  <input type="file" class="form-control" name="file" placeholder="Title">
				  </div>
			  </div>
		  </div>






        
        <button type="submit" class="btn btn-primary">Edit Blog</button>


      </form>

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
