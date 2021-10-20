<?php $this->load->view("adminpanel/header"); ?>

	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">Roles and permission</h1>

		</div>

		<form name="roleform" method="post" action="<?= base_url().'admin/roles/roleupdate'?>">
		<table class="table table-hover" style="width: 100%">
			<thead>
			<tr>
				<th scope="col" style="width: 10%">#</th>
				<th scope="col" style="width: 30%;">Username</th>
				<th scope="col" style="width: 20%">Roles</th>
			</tr>
			</thead>
			<tbody>
			<?php
			if(isset($alluser)){
				foreach ($alluser as $key =>$res){
			?>
			<tr>
				<th scope="row"><?=$res['uid']?></th>
				<td><?=$res['username']?></td>
				<td>
					<div class="row">

					<?php
					$i=0;
						foreach($rolestatus as $role){
							$i++;
							foreach ($urtable as $urole){
								if($urole['uid']==$res['uid'] && $urole['rid']==$i ){
							?>
						<div class="col-6">
							<label for="rolename"><?=$role?></label>
						</div>
				<div class="col-6">
					<input type="checkbox" name="check_list[]" value="<?=$urole['urid']?>" <?=($urole['delete_status']==1)?"checked":""?>>
				</div>
							<?php
								}
						}
						}
					?>
					</div>
				</td>
			</tr>
			<?php
				}
			}?>

			</tbody>
		</table>
			<input type="submit" value="Update">
		</form>
	</main>
	</div>
	</div>

<?php $this->load->view('adminpanel/footer.php'); ?>
