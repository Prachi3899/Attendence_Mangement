<?php
include('header.php');
?>

<div class="container-fluid">

<!-- DataTales Example-->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    
        <h6 class="m-0 font-weight-bold text-primary">Manage Attendance</h6>
    </div>
    <div class="card-body">
            <?php
                if(isset($_REQUEST['msg'])) 
                {
                    echo "<div class='alert alert-info'>".$_REQUEST['msg']."</div>";
                }
            ?>
            <table id="table_id"  class="table table-bordered">
            <thead>
                <tr>
                    <th>Date of Attendance</th>
                    <th>Staff</th>
                    <th>Time</th>
                    <th>Designation</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                
    <div class="card-body">
        <form action="" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>To Date</label>
                        <input type="date" name="to_date" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Click to Filter</label><br>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card mt=4">
    <div class="card body">
        <?php
        $con = mysqli_connect("localhost","root","","teachermsystem");
        if(isset($_GET['from_date']) && isset($_GET['to_date']))
        {
           $from_date = $_GET['from_date'];
           $to_date = $_GET['to_date']; 

           $query = "SELECT * FROM attendance WHERE date_of_attendance BETWEEN 'from_date' AND '$to_date' ";
           $query_run = mysqli_query($con, $query);

           if(mysqli_num_rows($query_run)>0)
           {
            foreach($query_run as $row)
            {
                        ?><tr>
                        <td><?php echo $row['date_of_attendance']; ?></td>
                        <td><?php echo $row['staff']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['designation']; ?></td>
                        <td><a href="delete_attendance.php?id=<?php echo $row['id']?>"><i class="fa fa-trash text-danger"></i></td>
                    </tr>
                <?php
            }
        }
           else
           {
            echo "NO RECORD FOUND";
           }
        }
        ?>
    </div>
</div>
</tbody>
        </table>
        </div>
    </div> -->
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
include('footer.php');
?>