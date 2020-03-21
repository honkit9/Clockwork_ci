<?php $this->load->view("adminpanel/header"); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      
      <h2>View Blog</h2>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm" style="width: 100%">
          <thead>
            <tr>
              <th style="width: 10%">Room ID</th>
              <th style="width: 10%">Name</th>
              <th style="width: 30%">Summary</th>
              <th style="width: 10%">Price (RM)</th>
              <th style="width: 20%">Recommendation</th>
              <th style="width: 10%">Image</th>
				<th style="width: 5%"></th>
				<th style="width: 5%"></th>
            </tr>
          </thead>
          <tbody>
          	<?php 
          	if ($result) {
          		$counter=1;
          		foreach ($result as $key => $value) {
          			echo "<tr>
			              <td>".$value['Room_ID']."</td>
			              <td>".$value['Room_Name']."</td>
			              <td>".$value['Room_Summary']."</td>
			                    <td>".$value['Room_Price']."</td>
			                          <td>".$value['Recommendation']."</td>
			              <td><img src='".base_url().$value['Room_Image']."' class='img-fluid' width='100'></td>
			              
			              <td><a class=\"btn btn-info\" href='".base_url().'admin/room/editblog/'.$value['Room_ID']."'>Edit</a></td>
			              
			              <td><a class=\"btn delete btn-danger\" href='#.' data-id='".$value['Room_ID']."'>Delete</a></td>

			            </tr>";

			            $counter++;
          		}

          		
          	}
          	else{
          		echo "<tr><td colspan='6'>No Records found</td><tr>";
          	}
          		

          	 ?>

            
            
          </tbody>
        </table>
      </div>

    </main>
  </div>
</div>

<?php $this->load->view('adminpanel/footer.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	$(".delete").click(function(){

		var delete_id = $(this).attr('data-id');

		var bool = confirm('Are you Sure you want to delete the blog forever?');
		console.log(bool);

		if (bool) {
			//alert("Move to delete functionality using AJAX");

			$.ajax({
				url:'<?= base_url().'admin/blog/deleteblog/'?>',
				type:'post',
				data:{'delete_id': delete_id},
				success: function(response){
					console.log(response);
					if (response == "deleted") {
						location.reload();
					}else if (response == "notdeleted"){
						alert("Something went wrong!");
					}
				}
			});
		}else{
			alert("Your Blog is Safe");

		}
	});


	<?php 

			if (isset($_SESSION['updated'])) {
				if ($_SESSION['updated'] == "yes") {
					echo 'alert("Data has been updated!");';
				}else if($_SESSION['updated'] == "no"){
					echo 'alert("Some error occurred & data not updated!");';

				}
			}

	 ?>

</script>
