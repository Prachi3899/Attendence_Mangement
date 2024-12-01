<?php
include('header.php');
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    
        <h6 class="m-0 font-weight-bold text-primary">Add Staff</h6>
    </div>
    <div class="card-body">
    <?php
                  if(isset($_REQUEST['msg']))
                    {   
                      echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
                    }
                  ?>
            <form class="row" method="post" enctype="multipart/form-data">
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Staff Unique ID</label>
                <input type="text" name="staff_unique_id" class="form-control" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Designation</label>
                <input type="text" name="designation" class="form-control" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">department</label>
                <input type="text" name="department" class="form-control" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">contact</label>
                <input type="text" name="contact" class="form-control" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Password</label>
                <input type="text" name="password" class="form-control" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Gender</label>
                <input type="text" name="gender" class="form-control" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Profile Image</label>
                <input type="file" name="photo" class="form-control" id="inputPassword4">
              </div>
             <button type="submit" name="submit" class="btn btn-primary mx-auto d-block my-2">Submit</button>
            </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
include('footer.php');
?>

<?php
if(isset($_REQUEST["submit"]))
{
    include('config.php');
    $name = $_REQUEST["name"];
    $staff_unique_id = $_REQUEST["staff_unique_id"];
    $designation = $_REQUEST["designation"];
    $department = $_REQUEST["department"];
    $contact = $_REQUEST["contact"];
    $address = $_REQUEST["address"];
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    $gender = $_REQUEST["gender"];
    $created_by = "admin";

    $filename = $_FILES["photo"]["name"];
    $filetmp_name = $_FILES["photo"]["tmp_name"];
    $new_name = rand().$filename;


    $q = "INSERT INTO `staff`(name,staff_unique_id,designation,department,contact,address,email,password,gender,created_by,photo) VALUES ('$name','$staff_unique_id','$designation','$department','$contact','$address','$email','$password','$gender','$created_by','$new_name')";
    $res = mysqli_query($conn,$q);
    if($res>0)
    {
        move_uploaded_file($filetmp_name,"staff/".$new_name);
        echo "<script>window.location.assign('staff.php?msg=Record Inserted')</script>";
    }
    else{
        echo "<script>window.location.assign('staff.php?msg=Try Again')</script>";
    }
}
?>