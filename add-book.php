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
    include("includes/validation.php");
    $admin_email=$_SESSION['admin_email'];
    $paga=3;
    $query_per="select * from librarian_registration where email='$admin_email'";
    $run_query_per=mysqli_query($con,$query_per);
    while($row_query_per=mysqli_fetch_array($run_query_per))
    {
         $admin_permission=$row_query_per['permission'];                     
    } 
    $subject=explode(",",$admin_permission);
    if(in_array($paga,$subject))
    {
        $error_book_name="";
        $error_cat="";
        $error_isbn="";
        $error_image="";
        $error_author="";
        $error_publication="";
        $error_date="";
        $error_price="";
        $error_qty="";
        $errorresult=true;
if(isset($_POST['submit'])){

    if(name($_POST['book_name']))
    {
        $error_book_name = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_book_name = "";
    }
    if(empty($_POST['book_category']))
    {
        $error_cat = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_cat = "";
    }
    if(isbn($_POST['book_isbn']))
    {
        $error_isbn = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_isbn = "";
    }
    $test_img2=$_FILES['book_img']['name'];
                
    if(images($test_img2))
    {   
        $error_image="JPEG or PNG file.";
        $errorresult=false;
    }
    else{
        $error_image="";
    }
    
    if(name($_POST['books_author_name']))
    {
        $error_author = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_author = "";
    }    
    if(name($_POST['books_publication_name']))
    {
        $error_publication = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_publication = "";
    }  
    if(empty($_POST['books_purchase_date']))
    {
        $error_date = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_date = "";
    }
    if(number($_POST['books_price']))
    {
        $error_price = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_price = "";
    }
    if(number($_POST['books_quantity']))
    {
        $error_qty = "Required..";
        $errorresult=false;
    }
    else
    {
        $error_qty = "";
    }
    
    if($errorresult==false)
    {
        goto end;
    }
    $book_name=$_POST['book_name'];
    $book_category=$_POST['book_category'];
    $book_author_name=$_POST['books_author_name'];
    $book_img = $_FILES['book_img']['name'];
    $temp_name1 = $_FILES['book_img']['tmp_name'];
    $book_isbn=$_POST['book_isbn'];
    move_uploaded_file($temp_name1,"book_images/$book_img");
    $books_publication_name=$_POST['books_publication_name'];
    $books_purchase_date=$_POST['books_purchase_date'];
    $books_price=$_POST['books_price'];
    $books_quantity=$_POST['books_quantity'];

    $insert_product = "insert into add_books(books_name,cat_id,books_image,books_isbn,books_author_name,books_publication_name,books_publication_date,books_date,books_price,books_qty,available_qty,librarian_username,status) values('$book_name','$cat_id','$book_img','$books_isbn','$book_author_name','$books_publication_name','$books_purchase_date',NOW(),'$books_price','$books_quantity','$books_quantity','$admin_email','yes')";
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){
        ?>
        <script>
            swal({
                title:"Your New book Has Been Inserted.",
                text: "",
                icon: "success",
                buttons: [,"OK"],
                successMode: true,
               
        })
        .then((willDelete) => {
                if (willDelete) {
                    window.open('view-book.php','_self');
                } 
                else {
                }
        });
    </script>
    
    <?php     
    }
    
}
end :
?>
            <!-- ========== Left Sidebar Start ========== -->
    

<div class="main-content">
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Add Book</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       <form class="custom-validation" method="POST" action="" enctype="multipart/form-data"> 
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Books name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Books name" name="book_name"  id="example-text-input" required data-parsley-pattern="/^[A-Za-z ]*$/"> 
                                    <span style="color: red;"><?php echo $error_book_name;?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-md-3 col-form-label">Category</label>
                                <div class="col-md-9">
                                <select class="form-control select2" name="book_category" required>
                                <span style="color: red;"><?php echo $error_cat; ?></span>
                                        <option disabled selected value>Select</option>
                                        <?php 
                              
                                                $get_p_cats = "select * from category where status='yes'";
                                                $run_p_cats = mysqli_query($con,$get_p_cats);
                                                
                                                while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                                    
                                                    $cat_id = $row_p_cats['id'];
                                                    $cat_name = $row_p_cats['cat_name'];

                                                ?>
                                                    <option value='<?php echo $cat_id ?>'><?php echo  $cat_name; ?></option>
                                                    
                                                    <?php
                                                    
                                                }
                                    
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-form-label">Books ISBN</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Books ISBN" name="book_isbn"  id="example-text-input" required data-parsley-pattern="/[A-Za-z ][0-9]*$/">
                                    <span style="color: red;"><?php echo $error_isbn; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-tel-input" class="col-md-3 col-form-label">Book Image</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="book_img" class="custom-file-input" id="customFilewas" accept=".jpg,.jpeg,.png" required>
                                            <span style="color: red;"><?php echo $error_image; ?></span>
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
                                <label for="example-password-input" class="col-md-3 col-form-label">Books Author name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Books Author name" id="example-password-input" name="books_author_name" required data-parsley-pattern="/^[A-Za-z ]*$/">
                                    <span style="color: red;"><?php echo $error_author; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Books Publication name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Books Publication name" id="example-password-input" name="books_publication_name" required data-parsley-pattern="/^[A-Za-z ]*$/">
                                    <span style="color: red;"><?php echo $error_publication; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Books Publication date</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="date" placeholder="Books Publication date" id="example-password-input" name="books_purchase_date" required>
                                    <span style="color: red;"><?php echo $error_date; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Books Price</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" placeholder="Books Price" id="example-password-input" name="books_price" required data-parsley-pattern="/^[0-9]*$/">
                                    <span style="color: red;"><?php echo $error_price; ?></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Books Quantity</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="number" placeholder="Books Quantity" id="example-password-input" name="books_quantity" required data-parsley-pattern="/^[0-9]*$/">
                                    <span style="color: red;"><?php echo $error_qty; ?></span>
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
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- select 2 plugin -->
        <script src="assets/libs/select2/js/select2.min.js"></script>
        <script src="assets/js/pages/ecommerce-select2.init.js"></script>
        <script src="assets/libs/parsleyjs/parsley.min.js"></script>
        <script src="assets/js/pages/form-validation.init.js"></script>
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
                            window.open('add-book.php','_self');
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