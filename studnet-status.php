<?php
include("includes/db.php");
$studnet_id=$_POST['studnet_ids'];
$studnet_idss=$_POST['studnet_idss'];
$update_product="update student_registration set status='$studnet_idss' where id='$studnet_id'";
mysqli_query($con,$update_product);
echo "<script>window.open('view-studnet.php','_self')</script>";
?>