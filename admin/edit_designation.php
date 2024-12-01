<?php
include('header.php')
?>
<?php
if(isset($_REQUEST['id']))
{
    include('config.php');
    $id = $_REQUEST['id'];
    $q = "select * from designation where id='$id'";
    $res = mysqli_query($conn,$q);
    if($row = mysqli_fetch_array($res))
    {
        $designation = $row['designation'];
    }
}
else{
    echo "<script>window.location.assign('manage_designation.php')</script>";
}
?>
        <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            
                <h6 class="m-0 font-weight-bold text-primary">Edit Designation</h6>
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
                        <label for="inputtext" class="form-label">Designation</label>
                        <input type="text" name="designation" class="form-control" value="<?php echo $designation?>" required id="inputPassword4">
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
include('footer.php')
?>
<?php
if(isset(($_REQUEST["submit"])))
{
    include('config.php');
    $id1 = $_REQUEST["id"];
    $designation1 = $_REQUEST["designation"];

    $q1 = "UPDATE `designation` SET `designation` = '$designation1' WHERE `designation`.`id` = '$id'";
    $res1 = mysqli_query($conn,$q1);
    if($res1>0)
    {
        echo "<script>window.location.assign('manage_designation.php?msg=Record Updated')</script>";
    }
    else{
        echo "<script>window.location.assign('manage_designation.php?msg=Try Again')</script>";  
    }
}
?>