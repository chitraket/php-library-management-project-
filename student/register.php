<?php
session_start();
if(isset($_SESSION['student_email']))
{
    echo "<script>window.open('index.php','_self')</script>";
}
include("includes/db.php"); 
include("includes/validation.php");
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
    <?php 
$error_fname="";
$error_lname="";
$error_enrollment="";
$error_sem="";
$error_contact="";
$error_email="";
$error_password="";
$errorresult=true;
if(isset($_POST['submit'])){
    if(name($_POST['student_f_name']))
    {
        $error_fname = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_fname = "";
    }
    if(name($_POST['student_l_name']))
    {
        $error_lname = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_lname = "";
    }
    if(contacts($_POST['student_contact']))
    {
        $error_contact = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_contact = "";
    }
    if(email($_POST['student_email']))
    {
        $error_email = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_email = "";
    }
    if(enrollment($_POST['student_enrollment']))
    {
        $error_enrollment = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_enrollment = "";
    }
    if(number($_POST['student_sem']))
    {
        $error_sem = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_sem = "";
    }
    if(pass($_POST['student_password']))
    {
        $error_password = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_password = "";
    }
    if($errorresult==false)
    {
        goto end;
    }
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
end:
    ?>        
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
                                    <a href="index.php">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal custom-validation" class="form-horizontal" action="#" method="POST">
                                    <div class="form-group ">
                                <label for="example-text-input">Student Enrollment</label>
                          
                                    <input class="form-control" type="number" placeholder="Student Enrollment" name="student_enrollment"  id="example-text-input" required data-parsley-pattern="/^[0-9]{15}$/">
                                    <span style="color: red;"><?php echo $error_enrollment;?></span>
                            </div>
                            <div class="form-group ">
                                <label for="example-password-input" >Student First Name</label>
                                
                                    <input class="form-control" type="text" placeholder="Student First Name" id="example-password-input" name="student_f_name" required data-parsley-pattern="/^[A-Za-z ]*$/">
                                    <span style="color: red;"><?php echo $error_fname;?></span>
                            </div>
                            <div class="form-group ">
                                <label for="example-password-input" >Student Last Name</label>
                    
                                    <input class="form-control" type="text" placeholder="Student Last Name" id="example-password-input" name="student_l_name" required data-parsley-pattern="/^[A-Za-z ]*$/" >
                                    <span style="color: red;"><?php echo $error_lname;?></span>
                            </div>
                            <div class="form-group">
                                <label for="example-password-input" >Student Semester</label>
                      
                                    <input class="form-control" type="number" placeholder="Student Semester" id="example-password-input" name="student_sem" required data-parsley-pattern="/^[0-9]*$/">
                                    <span style="color: red;"><?php echo $error_sem;?></span>
                            </div>
                            <div class="form-group ">
                                <label for="example-password-input">Student Contact</label>
                                
                                    <input class="form-control" type="number" placeholder="Student Contact" id="example-password-input" name="student_contact" required data-parsley-pattern="/^[9876][0-9]{9}$/">
                                    <span style="color: red;"><?php echo $error_contact;?></span>
                            </div>
                            <div class="form-group ">
                                <label for="example-password-input" >Student Email</label>
                               
                                    <input class="form-control" type="email" placeholder="Student Email" id="example-password-input" name="student_email" required>
                                    <span style="color: red;"><?php echo $error_email;?></span>
                            </div>
                            <div class="form-group">
                                <label for="example-password-input" >Student Password</label>
                                
                                    <input class="form-control" type="password" placeholder="Student Password" id="example-password-input" name="student_password" required data-parsley-pattern="/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/">
                                    <span style="color: red;"><?php echo $error_password;?></span>
                            </div>
                                       
                
                                       
                                        
                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" name="submit">Register</button>
                                        </div>
            
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        
                        <div class="mt-5 text-center">
                        
                            <p>© 2020 Skote.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/libs/parsleyjs/parsley.min.js"></script>

        <script src="assets/js/pages/form-validation.init.js"></script>

        <script src="assets/js/app.js"></script>
        <script src="assets/js/pages/form-validation.init.js"></script>
    </body>
</html>
