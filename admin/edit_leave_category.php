<?php
include('header.php');
?>
<?php
if(isset($_REQUEST['id']))
{
    include('config.php');
    $id = $_REQUEST['id'];
    $q = "select * from leave_category where id='$id'";
    $res = mysqli_query($conn,$q);
    if($row = mysqli_fetch_array($res))
    {
        $category_name = $row['category_name'];
    }
}
else{
    echo "<script>window.location.assign('manage_leave_category.php')</script>";
}
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    
        <h6 class="m-0 font-weight-bold text-primary">Edit Leave Category</h6>
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
                <label for="inputtext" class="form-label">Leave Category</label>
                <input type="text" name="category_name" class="form-control" value="<?php echo $category_name?>" required id="inputPassword4">
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
    $category_name1 = $_REQUEST["category_name"];

    $q1 = "UPDATE `leave_category` SET `category_name` = '$category_name1' WHERE `leave_category`.`id` = '$id'";
    $res1 = mysqli_query($conn,$q1);
    if($res1>0)
    {
        echo "<script>window.location.assign('manage_leave_category.php?msg=Record Updated')</script>";
    }
    else{
        echo "<script>window.location.assign('manage_leave_category.php?msg=Try Again')</script>";  
    }
}
?>