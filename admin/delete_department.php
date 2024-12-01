<?php
if(isset($_REQUEST['id']))
{
    $id =$_REQUEST['id'];
    include("config.php");
    $q = "delete from department where id='$id'";
    $res = mysqli_query($conn,$q);
    if($res>0)
    {
        echo "<script>window.location.assign('manage_department.php?msg=Record Deleted')</script>";
        
    }
    else{
        echo "<script>window.location.assign('manage_department.php?msg=Try Again')</script>";
    }
}
else{
    echo "<script>window.location.assign('manage_department.php')</script>";
}
?>