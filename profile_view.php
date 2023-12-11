<?php 
include 'admin_dbcon.php';

 
$student_id_query= mysqli_query($admin_dbcon, "SELECT `id`, `student_name`, `father_name`, `mother_name`, `guardian`, `relation_guardian`, `occupation_guardian`, `dob`, `student_number`, `guardian_number`, `blood_group`,`photo`, `admission_time`, `regi_time`, `status` FROM `admission` WHERE `id`='$student_id'");
$student_admin_data= mysqli_fetch_assoc($student_id_query);
if(isset($_POST['update_submit'])){
    $id=$_POST['id'];
    $student_name=$_POST['student_name'];
    $father_name=$_POST['father_name'];
    $mother_name=$_POST['mother_name'];
	$guardian = $_POST['guardian'];
	$relation_guardian = $_POST['relation_guardian'];
	$occupation_guardian = $_POST['occupation_guardian'];
	$dob=$_POST['dob'];
	$student_number = $_POST['student_number'];
    $guardian_number = $_POST['guardian_number'];
    $blood_group=$_POST['blood group'];
    $admission_time=$_POST['admission time'];
    

    $student_update=mysqli_query($admin_dbcon,"UPDATE `admission` SET `id`='$id',`student_name`='$student_name',`father_name`='$father_name',`mother_name`='$mother_name',`guardian`='$guardian',`relation_guardian`='$relation_guardian',`occupation_guardian`='$occupation_guardian',`dob`='$dob',`student_number`='$student_number',`guardian_number`='$guardian_number',`blood_group`='$blood_group',`admission_time`='$admission_time',`regi_time`='$regi_time',`status`='$status' WHERE `id`='$student_id'");

    if($student_update){
        echo "<script>
          alert('Your Data successfully updated!');
      window.location.href='admin_index.php?page=admin_dashboard_page'; 
        </script>";
    }else{
        echo "<script>
        alert('Your Data updated failed!');
     window.location.href='admin_index.php?page=student_admin_index'; 
      </script>";
    }
}


?>


<div class="main_div p-3">
<div class="container-fluid" style="padding-left:0;position:relative;">
<section class="section-content">
	<div class="row d-flex">
				<div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 col-xxl-2">
				<?php require_once ('student_admin_sidebar.php');?>	
				</div>
				<div class="col-sm-12 col-md-12 col-lg-8 col-xl-9 col-xxl-10"> 
					<div class="student_profile">
						<h1 style="color:#65BDB6;"><i class="fa-solid fa-user px-2" style="font-size:35px"></i>Student Personal Info<small> Statistics Overview</small></h1>
						<nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
						<ol style="background-color:#f5f5f5;" class="breadcrumb  px-2 pt-2 py-2">
							<li class="breadcrumb-item"><a style="font-size:18px;color:#65BDB6;" href="admin_index.php?page=admin_dashboard " class="text-decoration-none"><i class="fa-solid fa-gauge px-2" style="font-size:18px;color:#65BDB6;"></i>Dashboard</a></li>
							<li class="breadcrumb-item"><a style="font-size:18px;color:#65BDB6;" href="" class="text-decoration-none"><i class="fa-solid fa-user px-2" style="font-size:18px;color:#65BDB6;"></i>Personal Information</a></li>
						</ol>
						</nav>
			        </div>
<div class="row">
<div class="personal_info col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
<table class="table table-bordered">
<tr>
<th>Student id</th>
<td><?=$student_admin_data['id']?></td>
</tr>
<tr>
<th>Student Name</th>
<td><?=$student_admin_data['student_name']?></td>
</tr>
<tr>
<th>Father's Name</th>
<td><?=$student_admin_data['father_name']?></td>
</tr>
<tr>
<th>Mother's Name</th>
<td><?=$student_admin_data['mother_name']?></td>
</tr>
<tr>
<tr>
<th>Guardian</th>
<td><?=$student_admin_data['guardian']?></td>
</tr>
<th>Relation with Guardian</th>
<td><?=$student_admin_data['relation_guardian']?></td>
</tr>
<th>Occupation Of  Guardian</th>
<td><?=$student_admin_data['occupation_guardian']?></td>
</tr>
<th>Date Of Birth</th>
<td><?=$student_admin_data['dob']?></td>
</tr>
<tr>
<th>Student Number</th>
<td><?=$student_admin_data['student_number']?></td>
</tr>
<th>Guardian Number</th>
<td><?=$student_admin_data['guardian_number']?></td>
</tr>
<tr>
<th>Blood Group</th>
<td><?=$student_admin_data['blood_group']?></td>
</tr>
<tr>
<th>Admission Date</th>
<td><?=$student_admin_data['admission_time']?></td>
</tr>
</table>
<button data-bs-toggle="modal" data-bs-target="#teacherunique<?=$student_admin_data['id']?>" data-bs-whatever="@mdo" class="btn btn-primary" ><i class="fa-solid fa-pencil px-1"></i>Edit Info</button>
<!-- modal section -->
<div id="teacherunique<?=$student_admin_data['id']?>" class="modal fade" role="dialog">
							  <div class="modal-dialog" style="max-width:700px;">
								<div class="modal-content bg-light">
								  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Update Personal Information</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									  </div>
									  <div class="modal-body">
									  
										<form method="POST" action=""  enctype="multipart/form-data">
										<div class="row">
											<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
											<div class="mb-3">
											<label for="id" class="form-label">Student id</label>
											<input type="text" class="form-control"  id="id" name="id" value="<?php echo $student_admin_data['id']?>">
										  </div>
										  <div class="mb-3">
											<label for="student_name" class="form-label">Student Name</label>
											<input type="text" class="form-control"  id="student_name" name="student_name" value="<?php echo $student_admin_data['student_name']?>">
										  </div>
										  <div class="mb-3">
											<label for="father_name" class="form-label">Father Name</label>
											<input type="text" class="form-control"  id="father_name" name="father_name" value="<?php echo $student_admin_data['father_name']?>">
										  </div>
										  <div class="mb-3">
											<label for="mother_name" class="form-label">Mother Name</label>
											<input type="text" class="form-control"  id="mother_name" name="mother_name" value="<?php echo $student_admin_data['mother_name']?>">
										  </div>
                                          <div class="mb-3">
											<label for="guardian" class="form-label">Guardian</label>
											<input type="text" class="form-control"  id="guardian" name="guardian" value="<?php echo $student_admin_data['guardian']?>">
										  </div>
                                          <div class="mb-3">
											<label for="relation_guardian" class="form-label">Relation with Guardian</label>
											<input type="text" class="form-control"  id="relation_guardian" name="relation_guardian" value="<?php echo $student_admin_data['relation_guardian']?>">
										  </div>

											</div>
											<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                            <div class="mb-3">
											<label for="occupation_guardian" class="form-label">Occupation Of Guardian</label>
											<input type="text" class="form-control"  id="occupation_guardian" name="occupation_guardian" value="<?php echo $student_admin_data['occupation_guardian']?>">
										  </div>
                                          <div class="mb-3">
											<label for="student_number" class="form-label">Student Number</label>
											<input type="text" class="form-control"  id="student_number" name="student_number" value="<?php echo $student_admin_data['student_number']?>">
										  </div>
                                          <div class="mb-3">
											<label for="guardian_number" class="form-label">Guardian Number</label>
											<input type="text" class="form-control"  id="guardian_number" name="guardian_number" value="<?php echo $student_admin_data['guardian_number']?>">
										  </div>
												<div class="mb-3">
											<label for="dob" class="form-label">Date Of Birth</label>
											<input type="date" class="form-control"  id="dob" name="dob" value="<?php echo $student_admin_data['dob']?>">
										  </div>

										  <div class="mb-3">
											<label for="blood group" class="form-label">Blood Group</label>
											<select class="form-select" name="blood group">
											<option <?php echo $student_admin_data['blood group']=="Null"? 'selected=""':'';?> value="Null">Unknown</option>											
											<option <?php echo $student_admin_data['blood group']=="A+"? 'selected=""':'';?> value="A+">A+</option>											
											<option <?php echo $student_admin_data['blood group']=="A-"? 'selected=""':'';?> value="A-">A-</option>											
											<option <?php echo $student_admin_data['blood group']=="AB+"? 'selected=""':'';?> value="AB+">AB+</option>
											<option <?php echo $student_admin_data['blood group']=="AB-"? 'selected=""':'';?> value="AB-">AB-</option>											
											<option <?php echo $student_admin_data['blood group']=="B+"? 'selected=""':'';?> value="B+">B+</option>											
											<option <?php echo $student_admin_data['blood group']=="B-"? 'selected=""':'';?> value="B-">B-</option>											
											<option <?php echo $student_admin_data['blood group']=="O+"? 'selected=""':'';?> value="O+">O+</option>											
											<option <?php echo $student_admin_data['blood group']=="O-"? 'selected=""':'';?> value="O-">O-</option>											
											</select>
										  </div>
											</div>  
										</div>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary" name="update_submit">Update</button>
									  </div>
									  </form>
									</div>
								  </div>
</div>									
<!-- modal section -->
</div>
<div class="personal_info col-sm-12 col-md-12 col-lg-6 col-xxl-6">
<?php 
	if(isset($_POST['photo_update'])){
		$student_photo=$_FILES['photo']['name'];
		  $photo_tmp=$_FILES['photo']['tmp_name'];
		$photo_update=mysqli_query($admin_dbcon,"UPDATE `admission_form` SET `photo`='$student_photo' WHERE `id`='$student_id'");
		if($photo_update){
		  move_uploaded_file($photo_tmp,'images/'.$student_photo);
		  echo "<script>
		  alert('Your photo successfully updated!');
		  window.location.href='admin_index.php?page=student_admin_index';
		</script>";
		$student_photo=false;
		}
		else{
		  echo "<script>
		  alert('Photo update failed!');
		  window.location.href='admin_index.php?page=student_admin_index';
		</script>";
		}
	  }
	
	?>
<form action="" method="POST" enctype="multipart/form-data">
    <img class="img-thumbnail" style="width:220px;height:220px;" src="images/<?=$student_admin_data['photo'];?>" alt=""><br>
    <label for="photo" class="form-label">Profile Picture</label>
    <input type="file" class="form-control" name="photo" id="photo" required style="width:30%;" >
    <br>
    <button type="submit" name="photo_update"  class="btn btn-primary">Change Profile</button>
</form>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
