<?php
session_start();
if(isset($_SESSION['admin_email']))
{
    echo "<script>window.open('index.php','_self')</script>";
}
include("includes/db.php"); 
?>
<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/vertical/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Feb 2020 17:43:30 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Login | SKOTE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Sweet Alert-->
        <script src="assets/js/sweetalert.min.js"></script>
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index.html">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal" action="#" method="POST">
                                    <div class="form-group ">
                                <label for="example-text-input">Student Enrollment</label>
                          
                                    <input class="form-control" type="text" placeholder="Student Enrollment" name="student_enrollment"  id="example-text-input">

                            </div>
                            <div class="form-group ">
                                <label for="example-password-input" >Student First Name</label>
                                
                                    <input class="form-control" type="text" placeholder="Student First Name" id="example-password-input" name="student_f_name">

                            </div>
                            <div class="form-group ">
                                <label for="example-password-input" >Student Last Name</label>
                    
                                    <input class="form-control" type="text" placeholder="Student Last Name" id="example-password-input" name="student_l_name">
                               
                            </div>
                            <div class="form-group">
                                <label for="example-password-input" >Student Semester</label>
                      
                                    <input class="form-control" type="text" placeholder="Student Semester" id="example-password-input" name="student_sem">

                            </div>
                            <div class="form-group ">
                                <label for="example-password-input">Student Contact</label>
                                
                                    <input class="form-control" type="text" placeholder="Student Contact" id="example-password-input" name="student_contact">

                            </div>
                            <div class="form-group ">
                                <label for="example-password-input" >Student Email</label>
                               
                                    <input class="form-control" type="text" placeholder="Student Email" id="example-password-input" name="student_email">
                               
                            </div>
                            <div class="form-group">
                                <label for="example-password-input" >Student Password</label>
                                
                                    <input class="form-control" type="password" placeholder="Student Password" id="example-password-input" name="student_password">
                               
                            </div>
                                       
                
                                       
                                        
                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="submit">Register</button>
                                        </div>
            
                                        <!--<div class="mt-4 text-center">
                                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                        </div>-->
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <?php 

if(isset($_POST['submit'])){

    $studuct_f_name=$_POST['student_f_name'];
    $student_l_name=$_POST['student_l_name'];
    $studnet_enrollment=$_POST['student_enrollment'];
    $studnet_email=$_POST['student_email'];
    $studnet_sem=$_POST['student_sem'];
    $student_contact=$_POST['student_contact'];
    $student_password=$_POST['student_password'];
    $insert_product = "insert into student_registration(firstname,lastname,password,email,contact,sem,enrollment,status) values('$studuct_f_name','$student_l_name','$student_password','$studnet_email','$student_contact','$studnet_sem','$studnet_enrollment','no')";
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){
        ?>
        <script>
            swal({
                title:"Student Has Been Inserted.",
                text: "",
                icon: "success",
                buttons: [,"OK"],
                successMode: true,
               
        })
        .then((willDelete) => {
                if (willDelete) {
                    window.open('auth-login.php','_self');
                } 
                else {
                }
        });
    </script>
    
    <?php   
    }  
    }
    ?>
                        <div class="mt-5 text-center">
                            
                            <!--<p>Don't have an account ? <a href="auth-register.html" class="font-weight-medium text-primary"> Signup now </a> </p>-->
                            <p>© 2020 Skote.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/vertical/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Feb 2020 17:43:30 GMT -->
</html>
