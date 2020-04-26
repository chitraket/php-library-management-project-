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
    $paga=44;
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
                    <h4 class="mb-0 font-size-18">Add Sub User</h4>
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
                                <label for="example-text-input" class="col-md-3 col-form-label">First Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="First name" name="f_name"  id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Last Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Last name" name="l_name"  id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-tel-input" class="col-md-3 col-form-label">Image</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="s_img" class="custom-file-input" id="customFilewas">
                                            <label class="custom-file-label" id="customFileswas">Choose file</label>
                                            <script type="text/javascript">
                                            const realfileBtnwas=document.getElementById("customFilewas");
                                            const customTxtwas=document.getElementById("customFileswas");
                                            realfileBtnwas.addEventListener("change",function(){
                                                if(realfileBtnwas.value)
                                                {
                                                    customTxtwas.innerHTML=realfileBtnwas.value;
                                                }
                                                else{1111
                                                    customTxtwas.innerHTML="Choose file";
                                                }
                                            });
                                            </script>
                                </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Email</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="email" placeholder="Email" id="example-password-input" name="s_email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Contact</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Contact" id="example-password-input" name="s_contact">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Password</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="password" placeholder="Password" id="example-password-input" name="s_password">
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="example-url-input" class="col-md-3 col-form-label">Permission</label>
                                <div class="col-md-9">
                                        <div class="custom-control custom-checkbox mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="subject[]" value="1" >
                                        <label class="custom-control-label" for="customCheck1">Add Student</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="subject[]" value="2" >
                                            <label class="custom-control-label" for="customCheck2">View Studnet</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3" name="subject[]" value="3" >
                                            <label class="custom-control-label" for="customCheck3">Add Book</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4" name="subject[]" value="4" >
                                            <label class="custom-control-label" for="customCheck4">View Book</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5" name="subject[]" value="5" >
                                            <label class="custom-control-label" for="customCheck5">Issue Book</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6" name="subject[]" value="6" >
                                            <label class="custom-control-label" for="customCheck6">Return Book</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7" name="subject[]" value="7" >
                                            <label class="custom-control-label" for="customCheck7">Messages</label>
                                        </div>

                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="submit">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect">
                                        Cancel
                                    </button>
                                </div>
                            </div>                                        
                       </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
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
                            window.open('add-user.php','_self');
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

if(isset($_POST['submit'])){

    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $s_img = $_FILES['s_img']['name'];
    $temp_name1 = $_FILES['s_img']['tmp_name'];
    move_uploaded_file($temp_name1,"admin_images/$s_img");
    $s_email=$_POST['s_email'];
    $s_contact=$_POST['s_contact'];
    $s_password=$_POST['s_password'];
    $a=$_POST['subject'];
    $per=implode(",",$a);

    $insert_product = "insert into librarian_registration(firstname,lastname,password,email,images,contact,roles,permission,status) values('$f_name','$l_name','$s_password','$s_email','$s_img','$s_contact','sub','$per','yes')";
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){
        ?>
        <script>
            swal({
                title:"Your New user Has Been Inserted.",
                text: "",
                icon: "success",
                buttons: [,"OK"],
                successMode: true,
               
        })
        .then((willDelete) => {
                if (willDelete) {
                    window.open('view-user.php','_self');
                } 
                else {
                }
        });
    </script>
    
    <?php     
    }
    
}

?>


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