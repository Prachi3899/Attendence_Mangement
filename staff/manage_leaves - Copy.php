<?php
include('header.php');
?>
    <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        
            <h6 class="m-0 font-weight-bold text-primary">Manage Leaves</h6>
        </div>
        <div class="card-body">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>From Date</label>
                            <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date'];}?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>To Date</label>
                            <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date'];}?>" class="form-control">
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
            <table id="table_id" class="table table-bordered">
                <thead>
                <tr>
                    <th>Category</th>
                    <th>Staff</th>
                    <th>Designation</th>
                    <th>Date</th>
                    <th>Remarks</th>
                    <th>Sanction</th>
                    <th>Message</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('config.php');
                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                    {
                        $from_date = $_GET['from_date'];
                        $to_date = $_GET['to_date']; 

                        $query = "SELECT * FROM leaves WHERE created_at BETWEEN '$from_date' AND '$to_date' ";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $row)
                            {
                        ?>
                        <tr>
                            <td><?= $row['category']; ?></td>
                            <td><?= $row['staff']; ?></td>
                            <td><?= $row['designatioin']; ?></td>
                            <td><?= $row['date']; ?></td>
                            <td><?=  $row['remarks']; ?></td>
                            <td><?=  $row['sanction']; ?></td>
                            <td><?= $row['message']; ?></td>
                            <td><a href="delete_leaves.php?id=<?= $row['id']?>"><i class="fa fa-trash text-danger"></i></td>
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
        </tbody>
    </table>
</div>
</div>
</div>

<?php
include('footer.php');
?>
        