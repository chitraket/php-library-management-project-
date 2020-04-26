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
     $paga=44;
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

if(isset($_GET['user_id'])){
    
    $edit_p_cat_id = $_GET['user_id'];
    
    $edit_p_cat_query = "select * from librarian_registration where id='$edit_p_cat_id'";
    
    $run_edit = mysqli_query($con,$edit_p_cat_query);
    
    $row_edit = mysqli_fetch_array($run_edit);
    
    $firstname = $row_edit['firstname'];
    $lastname=$row_edit['lastname'];
    $password = $row_edit['password'];
    $email=$row_edit['email'];
    $images=$row_edit['images'];
    $contact=$row_edit['contact'];
    $permission=$row_edit['permission'];
    $subjects=explode(",",$permission);
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
                    <h4 class="mb-0 font-size-18">Update Book</h4>  
                </div>

        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       <form method="POST" enctype="multipart/form-data"> 
                       <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">First Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="First Name" name="f_name" value="<?php echo $firstname; ?>"  id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Last Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Last Name" name="l_name" value="<?php echo $lastname; ?>"  id="example-text-input">
                                </div>
                            </div>     
                            <div class="form-group row">
                                <label for="example-tel-input" class="col-md-3 col-form-label">Image</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="s_img" class="custom-file-input" id="customFilewas">
                                            <label class="custom-file-label" id="customFileswas">Choose file</label>
                                            <br>
                                            <br/>
                                            <img   width="70" height="70" src="admin_images/<?php echo $images ?>" alt="<?php echo $images; ?>">  
                                              <br>
                                              <br/>
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
                                    <input class="form-control" type="text" placeholder="Email" value="<?php echo $email; ?>" id="example-password-input" name="s_email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Contact</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Email" value="<?php echo $contact; ?>" id="example-password-input" name="s_contact">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Password</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="password" placeholder="Password"  value="<?php echo $password; ?>" id="example-password-input" name="s_password">
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="example-url-input" class="col-md-3 col-form-label">Admin Permission</label>
                                <div class="col-md-9">
                                        
                                        <div class="custom-control custom-checkbox mb-2">
                                        
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="subject[]" value="1" 
                                        <?php 
                                        if(in_array(1,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>
                                        >
                                        <label class="custom-control-label" for="customCheck1">Add Student</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="subject[]" value="2" 
                                            <?php 
                                        if(in_array(2,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck2">View Student</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3" name="subject[]" value="3" 
                                            <?php 
                                        if(in_array(3,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck3">Add Books</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4" name="subject[]" value="4" 
                                            <?php 
                                        if(in_array(4,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck4">View Books</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5" name="subject[]" value="5" 
                                            <?php 
                                        if(in_array(5,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck5">Issue Book</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6" name="subject[]" value="6" 
                                            <?php 
                                        if(in_array(6,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck6">Return Book</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7" name="subject[]" value="7" 
                                            <?php 
                                        if(in_array(7,$subjects))
                                        {
                                            echo "checked";
                                        }
                                        ?>>
                                            <label class="custom-control-label" for="customCheck7">Messages</label>
                                        </div>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-form-label">Status</label>
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
                            window.open('update-book.php','_self');
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
            $user_id=$_GET['user_id'];
            $f_name=$_POST['f_name'];
            $l_name=$_POST['l_name'];
            $a=$_POST['subject'];
            $per=implode(",",$a);
            $img = $_FILES['s_img']['name'];
            $s_email=$_POST['s_email'];
            $s_contact=$_POST['s_contact'];
            $s_password=$_POST['s_password'];
            $statuss=$_POST['customRadios'];
            if(!($img==""))
            {
            $temp_name1 = $_FILES['s_img']['tmp_name'];
            move_uploaded_file($temp_name1,"admin_images/$img");
                $update_p_cat = "update librarian_registration set firstname='$f_name',lastname='$l_name',password='$s_password',email='$s_email',images='$img',contact='$s_contact',roles='sub',permission='$per',status='$statuss' where id='$user_id'";
              
                $run_p_cat = mysqli_query($con,$update_p_cat);
                if($run_p_cat){
                  ?>
                  <script>
                      swal({
                          title:"Your User Has Been Updated",
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
              else{
                $update_p_cat = "update librarian_registration set firstname='$f_name',lastname='$l_name',password='$s_password',email='$s_email',contact='$s_contact',roles='sub',permission='$per',status='$statuss' where id='$user_id'";
              
                $run_p_cat = mysqli_query($con,$update_p_cat);
                if($run_p_cat){
                  ?>
                  <script>
                      swal({
                          title:"Your book Has Been Updated",
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