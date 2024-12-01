<?php
include('header.php');
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    
        <h4 class="m-0 font-weight-bold text-primary">Attendance</h4>
      <a href="javascript:void(0)" class=" add-more-form float-right btn btn-primary">ADD MORE</a>
      </div>
    <div class="card-body">
                <?php
                  if(isset($_REQUEST['msg']))
                    {   
                      echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
                    }
                ?>

            <form class="row" action="code.php" method="POST">
              <div class="col-md-4">
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
              <div class="col-md-4">
                <label for="inputtext" class="form-label">Time</label>
                <input type="text" name="time" class="form-control" required id="inputPassword4">
              </div>
            <div class="paste-new-forms"></div>
              <button type="submit" name="save_multiple_dta" class="btn btn-primary">SUBMIT</button>
            </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {

    $(document).on('click', '.add-more-form',function (){
      $('.paste-new-forms').append('<div class="col-md-4">\
                <label for="inputtext" class="form-label">Staff</label>\
                <select name="staff" class="form-control" required>\
              </div>\
              <div class="col-md-4">\
                <label for="inputtext" class="form-label">Time</label>\
                <input type="text" name="time" class="form-control" required id="inputPassword4">\
              </div>\
              <button type="button" class="remove-btn btn btn-danger">Remove</button>');\
    });
  });
  </script>
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