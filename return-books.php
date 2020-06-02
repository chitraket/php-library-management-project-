
<?php

 session_start();
 include("includes/db.php");

 if(!isset($_SESSION['admin_email']))
 {
     echo "<script>window.open('auth-login.php','_self')</script>";
 } 
 else{
    include("includes/header.php");
    include("includes/sidebar.php");
    $admin_email=$_SESSION['admin_email'];
$query_per="select * from librarian_registration where email='$admin_email'";
    $run_query_per=mysqli_query($con,$query_per);
    while($row_query_per=mysqli_fetch_array($run_query_per))
    {
         $admin_permission=$row_query_per['permission'];                                
    } 
$paga=6;
    $subject=explode(",",$admin_permission);
  if(in_array($paga,$subject))
        {
    if (isset($_GET['book_id'])) {
        $delete_id = $_GET['book_id'];

        $select_return="select * from issue_books where id='$delete_id'";
        $run_return=mysqli_query($con,$select_return);
        while($row_return=mysqli_fetch_array($run_return))
        {
            $date=$row_return["books_issue_date"]; 
            $book_name=$row_return["books_name"];
            $now=time();
            $your_date = strtotime($date);
            $datediff =$now-$your_date;
            $dates=round($datediff/(60*60*24)+1);
            if($dates>15)
            {
                $datess=$dates-15;
                ?>
                <script>
                    swal({
                        title: "You have fines of Rs.<?php echo $datess*50; ?>.",
                        text: "",
                        icon: "success",
                        buttons:[,"OK"],
                        successMode: true,
                       
                })
                .then((willDelete) => {
                        if (willDelete) {
                            <?php
                               $delete_pro = "update issue_books set books_return_date=NOW() where id='$delete_id'";
                               $run_delete = mysqli_query($con, $delete_pro);
                               if ($run_delete) {
                                $update_product="update add_books set available_qty=available_qty+1 where books_name='$book_name'";
                                mysqli_query($con,$update_product);
                                   ?>
                                   window.open('return_book.php?m=1','_self');
                                   <?php
                               }
                            ?>
                        } 
                        else {  
                        }
                });
            </script>
                <?php
            }
            else
            {
               $delete_pro = "update issue_books set books_return_date=NOW() where id='$delete_id'";
               $run_delete = mysqli_query($con, $delete_pro);
               if ($run_delete) {
                $update_product="update add_books set available_qty=available_qty+1 where books_name='$book_name'";
                mysqli_query($con,$update_product);
                echo "<script>window.open('return_book.php?m=1','_self')</script>";
               }
            }
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