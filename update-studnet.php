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
     $paga=2;
    $admin_email=$_SESSION['admin_email'];
    $query_per="select * from librarian_registration where email='$admin_email'";
    $run_query_per=mysqli_query($con,$query_per);
    while($row_query_per=mysqli_fetch_array($run_query_per))
    {
         $admin_permission=$row_query_per['permission'];                            
    } 
    $subject=explode(",",$admin_permission);
     if(in_array($paga,$subject))
     {

if(isset($_GET['student_id'])){
    
    $edit_p_cat_id = $_GET['student_id'];
    
    $edit_p_cat_query = "select * from student_registration where id='$edit_p_cat_id'";
    
    $run_edit = mysqli_query($con,$edit_p_cat_query);
    
    $row_edit = mysqli_fetch_array($run_edit);
    
    $enrollment = $row_edit['enrollment'];
    $firstname = $row_edit['firstname'];
    $lastname=$row_edit['lastname'];
    $password=$row_edit['password'];
    $email=$row_edit['email'];
    $contact=$row_edit['contact'];
    $sem=$row_edit['sem'];
    $status=$row_edit['status'];
}

?>
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Update Student</h4>  
                </div>

        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       <form method="POST" enctype="multipart/form-data"> 
                       <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Student Enrollment</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Student Enrollment" name="student_enrollment" value="<?php echo $enrollment; ?>"  id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Student First Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Student First Name" id="example-password-input" value="<?php echo $firstname; ?>" name="student_f_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Student Last Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Student Last Name" id="example-password-input" value="<?php echo $lastname; ?>" name="student_l_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Student Semester</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Student Semester" id="example-password-input" value="<?php echo $sem; ?>"  name="student_sem">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Student Contact</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Student Contact" id="example-password-input" value="<?php echo $contact; ?>" name="student_contact">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Student Email</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Student Email" id="example-password-input" value="<?php echo $email; ?>" name="student_email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Student Password</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="password" placeholder="Student Password" id="example-password-input" value="<?php echo $password; ?>" name="student_password">
                                </div>
                            </div>  
                            <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Student Status</label>
                                <?php
                                    if($status=="no")
                                    { 
                                ?>
                                                    <div class="custom-control custom-radio mt-2 ml-2">
                                                        <input type="radio" id="customRadio3" name="customRadios"  value="yes" class="custom-control-input" >
                                                        <label class="custom-control-label" for="customRadio3">Activate</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-2 ml-3">
                                                        <input type="radio" id="customRadio4" name="customRadios" value="no" class="custom-control-input" checked>
                                                        <label class="custom-control-label" for="customRadio4">Deactivate</label>
                                                    </div>
                            
                                <?php 
                                    }
                                    else
                                    {
                                        ?>
                                                <div class="custom-control custom-radio mt-2 ml-2">
                                                        <input type="radio" id="customRadio3" name="customRadios"  value="yes" class="custom-control-input" checked>
                                                        <label class="custom-control-label" for="customRadio3">Activate</label>
                                                    </div>
                                                    <div class="custom-control custom-radio mt-2 ml-3">
                                                        <input type="radio" id="customRadio4" name="customRadios" value="no" class="custom-control-input" >
                                                        <label class="custom-control-label" for="customRadio4">Deactivate</label>
                                                    </div>
                                                    
                                                    <?php
                                    }?>
                            </div> 
                            <div class="form-group mt-4">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="update">
                                        Update
                                    </button>
                                    
                                </div>
                            </div>                                           
                       </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div>
</div>
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

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
                            window.open('update-studnet.php','_self');
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

          if(isset($_POST['update'])){
              $student_id=$_GET['student_id'];
            $studuct_f_name=$_POST['student_f_name'];
            $student_l_name=$_POST['student_l_name'];
            $studnet_enrollment=$_POST['student_enrollment'];
            $studnet_email=$_POST['student_email'];
            $studnet_sem=$_POST['student_sem'];
            $student_contact=$_POST['student_contact'];
            $student_password=$_POST['student_password'];
            $customRadios=$_POST['customRadios'];
                $update_p_cat = "update student_registration set firstname='$studuct_f_name',lastname='$student_l_name',password='$student_password',email='$studnet_email',contact='$student_contact',sem='$studnet_sem',enrollment='$studnet_enrollment',status='$customRadios' where id='$student_id'";
              
                $run_p_cat = mysqli_query($con,$update_p_cat);
                if($run_p_cat){
                  ?>
                  <script>
                      swal({
                          title:"Your Student Has Been Updated",
                          text: "",
                          icon: "success",
                          buttons: [,"OK"],
                          successMode: true,
                         
                  })
                  .then((willDelete) => {
                          if (willDelete) {
                              window.open('view-studnet.php','_self');
                          } 
                          else {
                          }
                  });
              </script>
                    <?php
              
              }
              
          }
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