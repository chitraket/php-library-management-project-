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
    $paga=7;
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
                    <h4 class="mb-0 font-size-18">Messages</h4>
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
                                <select class="form-control select2" name="student_enrollment" required>
                              <?php 
                              
                              $get_accessories_manufacturerss = "select * from student_registration where status='yes'";
                              $run_accessories_manufacturerss = mysqli_query($con,$get_accessories_manufacturerss);
                              
                              while ($row_accessories_manufacturerss=mysqli_fetch_array($run_accessories_manufacturerss)){
                                  
                           // $manufacturer_accessories_id=$row_accessories_manufacturers['accessories_brand_id'];
                                  $manufacturer_accessories_titles = $row_accessories_manufacturerss['enrollment'];
                                  
                                  echo "
                                  
                                  <option value='$manufacturer_accessories_titles'> $manufacturer_accessories_titles </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Title</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Title" id="example-password-input" name="title" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Messages</label>
                                <div class="col-md-9">
                                <textarea required class="form-control" placeholder="Messages" name="messages" cols="19" rows="6" > </textarea>
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
                            window.open('messages.php','_self');
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


    $studnet_enrollment=$_POST['student_enrollment'];
   $title=$_POST['title'];
   $messages=$_POST['messages'];
    $insert_product = "insert into messages(enrollment,title,msg) values('$studnet_enrollment','$title','$messages')";
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){
        ?>
        <script>
            swal({
                title:"Your Messages send successful.",
                text: "",
                icon: "success",
                buttons: [,"OK"],
                successMode: true,
               
        })
        .then((willDelete) => {
                if (willDelete) {
                    window.open('messages.php','_self');
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