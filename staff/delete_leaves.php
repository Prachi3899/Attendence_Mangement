<?php
if(isset($_REQUEST['id']))
{
    $id =$_REQUEST['id'];
    include("config.php");
    $q = "delete from leaves where id='$id'";
    $res = mysqli_query($conn,$q);
    if($res>0)
    {
        echo "<script>window.location.assign('manage_leaves.php?msg=Record Deleted')</script>";
        
    }
    else{
        echo "<script>window.location.assign('manage_leaves.php?msg=Try Again')</script>";
    }
}
else{
    echo "<script>window.location.assign('manage_leaves.php')</script>";
}
?>