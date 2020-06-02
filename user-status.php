<?php
include("includes/db.php");
$user_id=$_POST['user_ids'];
$user_idss=$_POST['user_idss'];
$update_product="update librarian_registration set status='$user_idss' where id='$user_id'";
mysqli_query($con,$update_product);
echo "success";
?>