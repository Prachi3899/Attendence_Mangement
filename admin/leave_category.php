<?php
include('header.php');
?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    
        <h6 class="m-0 font-weight-bold text-primary">Leave Category</h6>
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
                <label for="inputtext" class="form-label">Leave Category</label>
                <input type="text" name="category_name" class="form-control" required id="inputPassword4">
              </div>
             <button type="submit" name="submit" class="btn btn-primary mx-auto d-block my-2">Submit</button>
            </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- </div> -->
<!-- End of Main Content -->

<?php
include('footer.php');
?>

<?php
if(isset($_REQUEST["submit"]))
{
    include('config.php');
    $category_name = $_REQUEST["category_name"];
    
    $q = "INSERT INTO `leave_category`(category_name) VALUES ('$category_name')";
    $res = mysqli_query($conn,$q);
    if($res>0)
    {
        echo "<script>window.location.assign('leave_category.php?msg=Record Inserted')</script>";
    }
    else{
        echo "<script>window.location.assign('leave_category.php?msg=Try Again')</script>";
    }
}
?>