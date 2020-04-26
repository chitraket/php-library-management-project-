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
                <a href="view-student.php" >
                    <i class="bx bx-task"></i>
                    <span>Student Information</span>
                </a>
            </li>
            <li class="menu-title">Issue Books</li>
            <li>
                <a href="view-book.php" >
                    <i class="bx bx-task"></i>
                    <span>Issue Books</span>
                </a>
            </li>
            <li class="menu-title">Messages</li>
            <li>
                <a href="messages.php" >
                    <i class="bx bx-task"></i>
                    <span>Messages</span>
                </a>
            </li>
           

          <!--  <li class="menu-title">Components</li>-->

           

        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<?php
 
 }?>