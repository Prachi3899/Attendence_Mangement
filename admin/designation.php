<?php
include('header.php');
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    
        <h6 class="m-0 font-weight-bold text-primary">Add Designation</h6>
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
                <label for="inputtext" class="form-label">Designation</label>
                <input type="text" name="designation" class="form-control" required id="inputPassword4">
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
    $designation = $_REQUEST["designation"];
    
    $q = "INSERT INTO `designation`(designation) VALUES ('$designation')";
    $res = mysqli_query($conn,$q);
    if($res>0)
    {
        echo "<script>window.location.assign('designation.php?msg=Record Inserted')</script>";
    }
    else{
        echo "<script>window.location.assign('designation.php?msg=Try Again')</script>";
    }
}
?>