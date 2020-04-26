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
     $paga=4;
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

if(isset($_GET['book_id'])){
    
    $edit_p_cat_id = $_GET['book_id'];
    
    $edit_p_cat_query = "select * from add_books where id='$edit_p_cat_id'";
    
    $run_edit = mysqli_query($con,$edit_p_cat_query);
    
    $row_edit = mysqli_fetch_array($run_edit);
    
    $book_name = $row_edit['books_name'];
    $book_imgs=$row_edit['books_image'];
    $book_author_name = $row_edit['books_author_name'];
    $book_publication_name=$row_edit['books_publication_name'];
    $book_purchase_date=$row_edit['books_purchase_date'];
    $books_price=$row_edit['books_price'];
    $books_qty=$row_edit['books_qty'];
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
                                <label for="example-text-input" class="col-md-3 col-form-label">Books name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Books name" name="book_name" value="<?php echo $book_name; ?>"  id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-tel-input" class="col-md-3 col-form-label">Book Image</label>
                                <div class="col-md-9">
                                <div class="custom-file">
                                            <input type="file" name="book_img" class="custom-file-input" id="customFilewas">
                                            <label class="custom-file-label" id="customFileswas">Choose file</label>
                                            <br>
                                            <br/>
                                            <img   width="70" height="70" src="book_images/<?php echo$book_imgs ?>" alt="<?php echo $book_imgs; ?>">  
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
                                <label for="example-password-input" class="col-md-3 col-form-label">Books Author name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Books Author name" value="<?php echo $book_author_name; ?>" id="example-password-input" name="books_author_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Books Publication name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Books Publication name"  value="<?php echo $book_publication_name; ?>" id="example-password-input" name="books_publication_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Books Purchase date</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="date" placeholder="Books Purchase date" id="example-password-input" value="<?php echo $book_purchase_date; ?>" name="books_purchase_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Books Price</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Books Price" value="<?php echo $books_price; ?>" id="example-password-input" name="books_price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-password-input" class="col-md-3 col-form-label">Books Quantity <span class="badge badge-pill badge-soft-success font-size-12" ><?php echo $books_qty; ?></span></label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="Books Quantity" id="example-password-input" value="0" name="books_quantity">
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
              $books_id=$_GET['book_id'];
            $books_name=$_POST['book_name'];
            $books_author_name=$_POST['books_author_name'];
            $books_img = $_FILES['book_img']['name'];
            $books_publication_name=$_POST['books_publication_name'];
            $books_purchase_date=$_POST['books_purchase_date'];
            $books_price=$_POST['books_price'];
            $books_quantity=$_POST['books_quantity'];
            $statuss=$_POST['customRadios'];
            if(!($books_img==""))
            {
            $temp_name1 = $_FILES['book_img']['tmp_name'];
            move_uploaded_file($temp_name1,"book_images/$books_img");
                $update_p_cat = "update add_books set books_name='$books_name',books_image='$books_img',books_author_name='$books_author_name',books_publication_name='$books_publication_name',books_purchase_date='$books_purchase_date',books_price='$books_price',books_qty=books_qty+'$books_quantity',available_qty=available_qty+'$books_quantity',status='$statuss' where id='$books_id'";
              
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
                              window.open('view-book.php','_self');
                          } 
                          else {
                          }
                  });
              </script>
                    <?php
              
              }
            }
              else{
                $update_p_cat = "update add_books set books_name='$books_name',books_author_name='$books_author_name',books_publication_name='$books_publication_name',books_purchase_date='$books_purchase_date',books_price='$books_price',books_qty=books_qty+'$books_quantity',available_qty=available_qty+'$books_quantity',status='$statuss' where id='$books_id'";
              
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
                              window.open('view-book.php','_self');
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