<?php
include('header.php');
?>
<?php
if(isset($_REQUEST['id']))
{
    include('config.php');
    $id = $_REQUEST['id'];
    $q = "select * from staff where id='$id'";
    $res = mysqli_query($conn,$q);
    if($row = mysqli_fetch_array($res))
    {
        $name = $row['name'];
        $staff_unique_id = $row['staff_unique_id'];
        $designation = $row['designation'];
        $department = $row['department'];
        $contact = $row['contact'];
        $address = $row['address'];
        $email = $row['email'];
        $password = $row['password'];
        $gender = $row['gender'];
    }
}
else{
    echo "<script>window.location.assign('manage_staff.php')</script>";
}
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    
        <h6 class="m-0 font-weight-bold text-primary">Manage Staff</h6>
    </div>
    <div class="card-body">
        <?php
        if(isset($_REQUEST['msg']))
        {
            echo "<div class= 'alert alert-info'>".$_REQUEST["msg"]."</div>";
        }
        ?>
        <form class="row" method="post">
          <input type="hidden" name="id" value="<?php echo $id ?>">
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name?>" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Staff Unique Id</label>
                <input type="text" name="staff_unique_id" class="form-control" value="<?php echo $staff_unique_id?>" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">designation</label>
                <input type="text" name="designation" class="form-control" value="<?php echo $designation?>" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">department</label>
                <input type="text" name="department" class="form-control" value="<?php echo $department?>" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">contact</label>
                <input type="text" name="contact" class="form-control" value="<?php echo $contact?>" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $address?>" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email?>" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Password</label>
                <input type="text" name="password" class="form-control" value="<?php echo $password?>" required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Gender</label>
                <input type="text" name="gender" class="form-control" value="<?php echo $gender?>" required id="inputPassword4">
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
if(isset(($_REQUEST["submit"])))
{
    include('config.php');
    $id1 = $_REQUEST["id"];
    $name1 = $_REQUEST["name"];
    $staff_unique_id1 = $_REQUEST["staff_unique_id"];
    $designation1 = $_REQUEST["designation"];
    $department1 = $_REQUEST["department"];
    $contact1 = $_REQUEST["contact"];
    $address1 = $_REQUEST["address"];
    $email1 = $_REQUEST["email"];
    $password1 = $_REQUEST["password"];
    $gender1 = $_REQUEST["gender"];

    $filename = $_FILES["photo"]["name"];
    $filetmp_name = $_FILES["photo"]["tmp_name"];
    $new_name1 = rand().$filename;

    $q1 = "UPDATE `staff` SET `name` = '$name1',`staff_unique_id` = '$staff_unique_id1', `designation` = '$designation1',`department` = '$department1',`contact` = '$contact1', `address` = '$address1', `password` = '$password1', `gender` = '$gender1',`photo` = '$new_name1' WHERE `staff`.`id` = '$id'";
    $res1 = mysqli_query($conn,$q1);
    if($res1>0)
    {
        move_uploaded_file($filetmp_name,"staff/".$new_name);
        echo "<script>window.location.assign('manage_staff.php?msg=Record Updated')</script>";
    }
    else{
        echo "<script>window.location.assign('manage_staff.php?msg=Try Again')</script>";  
    }
}
?>