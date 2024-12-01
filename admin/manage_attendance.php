<?php
include('header.php');
?>

<div class="container-fluid">

<!-- DataTales Example -->
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
            <table id="table_id" class="table table-bordered">
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
                <?php
                include('config.php');
                $q = "select * from `attendance`";
                $res= mysqli_query($conn,$q);
                    while($row = mysqli_fetch_array($res))
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
                ?>
                </tbody>
        </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
include('footer.php');
?>