<?php
if(isset($_REQUEST['id']))
{
    $id =$_REQUEST['id'];
    include("config.php");
    $q = "delete from designation where id='$id'";
    $res = mysqli_query($conn,$q);
    if($res>0)
    {
        echo "<script>window.location.assign('manage_designation.php?msg=Record Deleted')</script>";
        
    }
    else{
        echo "<script>window.location.assign('manage_designation.php?msg=Try Again')</script>";
    }
}
else{
    echo "<script>window.location.assign('manage_designation.php')</script>";
}
?>