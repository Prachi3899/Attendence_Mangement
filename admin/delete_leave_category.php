<?php
if(isset($_REQUEST['id']))
{
    $id =$_REQUEST['id'];
    include("config.php");
    $q = "delete from leave_category where id='$id'";
    $res = mysqli_query($conn,$q);
    if($res>0)
    {
        echo "<script>window.location.assign('manage_leave_category.php?msg=Record Deleted')</script>";
        
    }
    else{
        echo "<script>window.location.assign('manage_leave_category.php?msg=Try Again')</script>";
    }
}
else{
    echo "<script>window.location.assign('manage_leave_category.php')</script>";
}
?>