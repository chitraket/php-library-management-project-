<?php
 session_start();
 include("includes/db.php");
 if(!isset($_SESSION['admin_email']))
 {
     echo "<script>window.open('auth-login.php','_self')</script>";
 } 
 else{
    $admin_email=$_SESSION['admin_email'];
$query_per="select * from librarian_registration where email='$admin_email'";
    $run_query_per=mysqli_query($con,$query_per);
    while($row_query_per=mysqli_fetch_array($run_query_per))
    {
         $admin_permission=$row_query_per['permission'];                                
    } 
$paga=4;
    $subject=explode(",",$admin_permission);
  if(in_array($paga,$subject))
        {
    if (isset($_GET['book_id'])) {
        $delete_id = $_GET['book_id'];
        
        $delete_pro = "delete from add_books where id='$delete_id'";
        
        $run_delete = mysqli_query($con, $delete_pro);
        
        if ($run_delete) {
            echo "<script>window.open('view-book.php?m=1','_self')</script>";
        }
    } ?>
<?php
 }

else{
    include("includes/header.php");
     include("includes/sidebar.php"); 
    ?>
    <!-- Sweet Alert-->

    <script>
    swal({
        title:"You cannot access this page!",
        text: "Please contact administrator",
        icon: "warning",
        buttons: [,"OK"],
        successMode: true,
       
})
.then((willDelete) => {
        if (willDelete) {
            window.open('index.php','_self');
        } 
        else {
        }
});
    </script>
    <?php
        }
    }
?>