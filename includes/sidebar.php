<?php
 
 if(!isset($_SESSION['admin_email']))
 {
     echo "<script>window.open('auth-login.php','_self')</script>";
 } 
 else{
     ?>
<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Dashboard</li>

            <li>
                <a href="index.php" class="waves-effect">
                <i class="bx bx-home-circle"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-title">Student Information</li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-store"></i>
                    <span>Student Information</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-student.php">Add Student</a></li>
                    <li><a href="view-studnet.php">View Student</a></li>
                </ul>
            </li>
            <li class="menu-title">Books</li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-receipt"></i>
                    <span>Book</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-book.php">Add book</a></li>
                    <li><a href="view-book.php">View book</a></li>
                </ul>
            </li>

            <li class="menu-title">Issue Books</li>
            <li>
                <a href="issue_books.php" >
                    <i class="bx bx-task"></i>
                    <span>Issue Books</span>
                </a>
            </li>
            
            <li class="menu-title">Return Books</li>
            <li>
                <a href="return_book.php" >
                    <i class="bx bx-task"></i>
                    <span>Return Books</span>
                </a>
            </li>
            <li class="menu-title">Messages</li>
            <li>
                <a href="messages.php" >
                    <i class="bx bx-task"></i>
                    <span>Messages</span>
                </a>
            </li>
            <li class="menu-title">Sub User</li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-receipt"></i>
                    <span>Sub User</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="add-user.php">Add Sub User</a></li>
                    <li><a href="view-user.php">View Sub User</a></li>
                </ul>
            </li>

          <!--  <li class="menu-title">Components</li>-->

           

        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<?php
 
 }?>