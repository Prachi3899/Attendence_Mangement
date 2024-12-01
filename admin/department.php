<?php
include('header.php');
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    
        <h6 class="m-0 font-weight-bold text-primary">Add Department</h6>
    </div>
    <div class="card-body">
    <?php
                  if(isset($_REQUEST['msg']))
                    {   
                      echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
                    }
                  ?>

          <form class="row">
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Department Name</label>
                <input type="text" name="department_name" class="form-control" required id="inputPassword4">
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
    $department_name = $_REQUEST["department_name"];
    
    $q = "INSERT INTO `department`(department_name) VALUES ('$department_name')";
    $res = mysqli_query($conn,$q);
    if($res>0)
    {
        echo "<script>window.location.assign('department.php?msg=Record Inserted')</script>";
    }
    else{
        echo "<script>window.location.assign('department.php?msg=Try Again')</script>";
    }
}
?>

