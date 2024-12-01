<?php
include('header.php');
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    
        <h6 class="m-0 font-weight-bold text-primary">Attendance</h6>
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
                <label for="inputtext" class="form-label">Time</label>
                <input type="text" name="time" class="form-control" required id="inputPassword4">
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
    $today_date = date('Y-m-d');
    $staff = $_REQUEST["staff"];
    $time = $_REQUEST["time"];
    $created_by = "HOD";

    $sel = mysqli_query($conn,"SELECT * FROM `staff` where id='$staff'");
    if($selstaff = mysqli_fetch_array($sel))
    {
      $q = "INSERT INTO `attendance`(date_of_attendance,staff,time,designation,created_by) VALUES ('$today_date','$staff','$time','$selstaff[designation]','$created_by')";
      $res = mysqli_query($conn,$q);
      if($res>0)
      {
          echo "<script>window.location.assign('attendance.php?msg=Record Inserted')</script>";
      }
      else{
          echo "<script>window.location.assign('attendance.php?msg=Try Again')</script>";
        }      
      }
      else{
      echo "<script>window.location.assign('attendance.php?msg=Staff not found')</script>";
    }

}
?>