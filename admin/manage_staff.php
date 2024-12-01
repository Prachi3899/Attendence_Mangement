<?php
include('header.php');
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    
        <h6 class="m-0 font-weight-bold text-primary">Manage Staff</h6>
    </div>
    <div class="card-body">
            <?php
                if(isset($_REQUEST['msg'])) 
                {
                    echo "<div class='alert alert-info'>".$_REQUEST['msg']."</div>";
                }
            ?>
            <table id="table_id" class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Staff Unique ID</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Gender</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('config.php');
                $q = "select * from `staff`";
                $res= mysqli_query($conn,$q);
                    while($row = mysqli_fetch_array($res))
                    {
                        ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td>
                                <?php
                                    if($row['photo']!="")
                                    {
                                ?>
                                <img src="./staff/<?php echo $row['photo']; ?>" height="80" width="80">
                                
                                <?php
                                    }
                                    else{
                                    ?>
                                <img src="./staff/User-Icon.jpg" height="80" width="80">
                                    <?php
                                    }?>

                            </td>
                                <td><?php echo $row['staff_unique_id']; ?></td>
                            <td><?php echo $row['designation']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['contact']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><a href="edit_staff.php?id=<?php echo $row['id']?>"><i class="fa fa-edit text-success"></i></a></td>
                            <td><a href="delete_staff.php?id=<?php echo $row['id']?>"><i class="fa fa-trash text-danger"></i></td>
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