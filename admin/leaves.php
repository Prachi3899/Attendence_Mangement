<?php
include('header.php');
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    
        <h6 class="m-0 font-weight-bold text-primary">Leaves</h6>
    </div>
    <div class="card-body">
    <?php
                  if(isset($_REQUEST['msg']))
                    {   
                      echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
                    }
                  ?>
            <form class="row" method="post">
    
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Category</label>
                <select name="category" class="form-control" required>
                    <option value="" selected disabled>Select Category</option>
                    <?php
                        include('config.php');
                        $q = "select * from `leave_category`";
                        $res= mysqli_query($conn,$q);
                        while($row = mysqli_fetch_array($res))
                        {
                          echo "<option value='$row[id]'>".$row['category_name']."</option>";   
                        }
                    ?>
                </select>
              </div>
              <div class="col-md-6">
                <label for="inputtext" class="form-label">Staff</label>
                <select name="staff" class="form-control" required>
                    <option value="" selected disabled>Select Staff</option>
                    <?php
                        include('config.php');
                        $q = "select * from `staff`";
                        $res= mysqli_query($conn,$q);
                        while($row = mysqli_fetch_array($res))
                        {
                          echo "<option value='$row[id]'>".$row['name']."- ".$row['staff_unique_id']."- ".$row['designation']."</option>";   
                        }
                    ?>
                </select>
              </div>
              <div class="col-md-6">
                <br>
                <label for="inputtext" class="form-label">Date</label>
                <input type="date" name="date" class="form-control"  required id="inputPassword4">
              </div>
              <div class="col-md-6">
                <br>
                <label for="inputtext" class="form-label">Remarks</label>
                <input type="remarks" name="remarks" class="form-control" required id="inputPassword4">
              </div>
              <br><br>
              <div class="col-md-6">
                <br>
                <label for="inputtext" class="form-label">Sanction Leave</label>
                <input type="checkbox" name="sanction"   id="inputPassword4">

              </div>
              <div class="col-md-6">
                <br>
                <label for="inputtext" class="form-label">Message Leave</label>
                <input type="checkbox" name="message"   id="inputPassword4">
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
    $category = $_REQUEST["category"];
    $staff = $_REQUEST["staff"];
    $date = $_REQUEST["date"];
    $remarks = $_REQUEST["remarks"];
    $sanction = $_REQUEST["sanction"];
    $message = $_REQUEST["message"];
    $checked_by = "HOD";
    

    $sel = mysqli_query($conn,"SELECT * FROM `staff` where id='$staff'");
    if($selstaff = mysqli_fetch_array($sel))
    {
      $q = "INSERT INTO `leaves`(category,staff,date,remarks,sanction,message,designatioin,checked_by) VALUES ('$category','$staff','$date','$remarks','$sanction','$message','$selstaff[designation]','$checked_by')";
      $res = mysqli_query($conn,$q);
      if($res>0)
      {
          echo "<script>window.location.assign('leaves.php?msg=Record Inserted')</script>";
      }
      else{
          echo "<script>window.location.assign('leaves.php?msg=Try Again')</script>";
        }      
      }
      else{
        echo "<script>window.location.assign('leaves.php?msg=Leaves not found')</script>";
      }
}
?>