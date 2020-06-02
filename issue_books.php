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
    $paga=5;
    $query_per="select * from librarian_registration where email='$admin_email'";
    $run_query_per=mysqli_query($con,$query_per);
    while($row_query_per=mysqli_fetch_array($run_query_per))
    {
         $admin_permission=$row_query_per['permission'];
                                
    } 
    $subject=explode(",",$admin_permission);
    if(in_array($paga,$subject))
    {
            ?>
      
            <!-- ========== Left Sidebar Start ========== -->
    

<div class="main-content">
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Issue Books</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       <form method="POST" action="" enctype="multipart/form-data"> 
                       <div class="form-group row">
                                <label for="example-search-input" class="col-md-3 col-form-label">Student Enrollment</label>
                                <div class="col-md-9">
                                <select class="form-control select2" name="accessories_manufacturer">
                              <?php 
                              
                              $get_accessories_manufacturers = "select * from student_registration where status='yes'";
                              $run_accessories_manufacturers = mysqli_query($con,$get_accessories_manufacturers);
                              
                              while ($row_accessories_manufacturers=mysqli_fetch_array($run_accessories_manufacturers)){
                                  
                           // $manufacturer_accessories_id=$row_accessories_manufacturers['accessories_brand_id'];
                                  $manufacturer_accessories_title = $row_accessories_manufacturers['enrollment'];
                                  
                              ?>  
                                  
                                  <option value='<?php echo  $manufacturer_accessories_title; ?>'> <?php echo $manufacturer_accessories_title; ?> </option>
                                  
                              <?php
                                  
                              }
                              
                              ?>
                              
                          </select>
                                </div>
                            </div>
                           
                            <div class="form-group mt-4">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="submit">
                                        Submit
                                    </button>
                                </div>
                            </div>                                        
                       </form>
                       <?php
                       
                        if(isset($_POST['submit']))
                        {
                            $res1=mysqli_query($con,"select * from student_registration where enrollment='$_POST[accessories_manufacturer]'");
                            while($row=mysqli_fetch_array($res1))
                            {
                                $firstname=$row["firstname"];
                                $lastname=$row["lastname"];
                                //$username=$row["username"];
                                $email=$row["email"];
                                $contact=$row["contact"];
                                $sem=$row["sem"];
                                $enrollment=$row["enrollment"];

                            }
                            ?>
                                <form method="POST" action="" enctype="multipart/form-data"> 
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Student Enrollment</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Student Enrollment" name="student_enrollment"  value="<?php echo $enrollment; ?>" id="example-text-input" disabled>
                                    <input value="<?php echo $enrollment; ?>" type="hidden" name="enrollment"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Student Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Student Enrollment" name="student_enrollment"  value="<?php echo $firstname; ?> <?php echo $lastname; ?>" id="example-text-input" disabled>
                                    <input value="<?php echo $firstname; ?> <?php echo $lastname; ?>" type="hidden" name="name"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Student Email</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Student Email" name="student_enrollment"  value="<?php echo $email; ?>" id="example-text-input" disabled>
                                    <input value="<?php echo $email; ?>" type="hidden" name="email"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Student Contact</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Student Enrollment" name="student_enrollment"  value="<?php echo $contact; ?>" id="example-text-input" disabled>
                                    <input value="<?php echo $contact; ?>" type="hidden" name="contact"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Student Semester</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Student Enrollment" name="student_enrollment"  value="<?php echo $sem; ?>" id="example-text-input" disabled>
                                    <input value="<?php echo $sem; ?>" type="hidden" name="sem"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-md-3 col-form-label">Books Name</label>
                                <div class="col-md-9">
                                <select class="form-control select2" name="books_name">
                              <?php 
                              
                              $get_accessories_manufacturerss = "select * from add_books where NOT available_qty='0' AND status='yes' ";
                              $run_accessories_manufacturerss = mysqli_query($con,$get_accessories_manufacturerss);
                              
                              while ($row_accessories_manufacturerss=mysqli_fetch_array($run_accessories_manufacturerss)){
                                  
                           // $manufacturer_accessories_id=$row_accessories_manufacturers['accessories_brand_id'];
                                  $manufacturer_accessories_titles = $row_accessories_manufacturerss['books_name'];
                                  
                                  echo "
                                  
                                  <option value='$manufacturer_accessories_titles'> $manufacturer_accessories_titles </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="submit2">
                                        Issue Books
                                    </button>
                                </div>
                            </div>  
                                </form>
                                
                            
                            <?php

                        } 
                        ?>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <?php 
                            if(isset($_POST['submit2'])){

                            $book_name=$_POST['books_name'];
                            $name=$_POST['name'];
                                $email=$_POST["email"];
                                $contact=$_POST["contact"];
                                $sem=$_POST["sem"];
                                $enrollment=$_POST["enrollment"];
                                $insert_product = "insert into issue_books(student_enrollment,student_name,student_sem,student_contact,student_email,books_name,books_issue_date,books_return_date) values('$enrollment','$name','$sem','$contact','$email','$book_name',NOW(),'')";
                                $run_product = mysqli_query($con,$insert_product);
                                
                                if($run_product){
                                    $update_product="update add_books set available_qty=available_qty-1 where books_name='$book_name'";
                                mysqli_query($con,$update_product);
                                    ?>
                                    <script>
                                        swal({
                                            title:"Issue books Successful.",
                                            text: "",
                                            icon: "success",
                                            buttons: [,"OK"],
                                            successMode: true,
                                           
                                    })
                                    .then((willDelete) => {
                                            if (willDelete) {
                                                window.open('issue_books.php','_self');
                                            } 
                                            else {
                                            }
                                    });
                                </script>
                                
                                <?php     
                                }
                                
                            }
                            ?>
        <!-- end row -->
        <?php 
        include("includes/footer.php");
        ?>
       


    </div>
</div>
</div>
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

         <!-- select 2 plugin -->
         <script src="assets/libs/select2/js/select2.min.js"></script>
        <script src="assets/js/pages/ecommerce-select2.init.js"></script>
        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>
        
        <script src="assets/js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea'});</script>

        <script src="assets/js/app.js"></script>

        
    </body>


<!-- Mirrored from themesbrand.com/skote/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Feb 2020 17:43:03 GMT -->
</html>
<script>
$(document).ready(function(){  
 var counter=60*60;
 myVar= setInterval(function()
 { 
     if(counter<=30)
     {

                    swal({
                        title:"Your Session is About to Expire!",
                        text: "Redirecting in "+counter+"s seconds.",
                        icon: "warning",
                        buttons: ["Logout","Stay Connected"],
                        successMode: true,
                       
                })
                .then((willDelete) => {
                        if (willDelete) {
                            window.open('issue_books.php','_self');
                        } 
                        else
                        {
                            window.open('logout.php','_self');
                        }

                });
     }
  if(counter==0)
  {
   $.ajax
   ({
    type:'post',
     url:'auth-logout.php',
     data:{
      logout:"logout"
     },
     success:function(response) 
     {
        window.location="auth-login.php";
     }
   });
   }
   counter--;
 }, 1000)
});
</script>
<?php 

 }

else{
    
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