<div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Dashboard</h4>
                                </div>
                                
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                        <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-soft-primary">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome Back !</h5>
                                                    <p>Skote Dashboard</p>
                                                </div>
                                            </div>

                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">

                                            </div>
                                            <div class="col-sm-8">
                                                <div class="pt-4">

                                                    <div class="row">
                                                        <div class="col-12">
                                                        <p class="text-muted mb-2">Enrollment</p>
                                                            <h5><?php echo $admin_email; ?></h5>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Issue books</p>
                                                        <?php
                                                        $rows=0;
                                                        $select_order_cancel='select * from issue_books where books_return_date="" and student_enrollment='.$admin_email.'  order by id';
                                                        $query_num_cancel=mysqli_query($con,$select_order_cancel);
                                                        $rows=mysqli_num_rows($query_num_cancel);
                                                        ?>
                                                        <h4 class="mb-0"><?php echo $rows; ?></h4>
                                                    </div>

                                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="bx bx-archive-in font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                   
                                </div>
                                <!-- end row -->

                                
                            </div>
                        </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
               
            </div>