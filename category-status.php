<?php
include("includes/db.php");
$book_id=$_POST['book_ids'];
$book_idss=$_POST['book_idss'];
$update_category="update category set status='$book_idss' where id='$book_id'";
mysqli_query($con,$update_category);
$update_product="update add_books set status='$book_idss' where cat_id='$book_id'";
mysqli_query($con,$update_product);
echo "success";
?>