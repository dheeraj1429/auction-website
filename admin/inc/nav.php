<header class="admin-header">
    <a href="#" class="sidebar-toggle" data-toggleclass="sidebar-open" data-target="body"> 
    </a>
    <nav class=" mr-auto my-auto">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <a class="nav-link" data-target="#siteSearchModal" data-toggle="modal" href="#"> <i class=" mdi mdi-magnify mdi-24px align-middle"></i> </a>
            </li>
        </ul>
    </nav>
    <nav class=" ml-auto">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <div class="dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-24px mdi-bell-outline"></i> <span class="notification-counter"></span> </a>
                    <div class="dropdown-menu notification-container dropdown-menu-right">
                        <div class="d-flex p-all-15 bg-white justify-content-between border-bottom ">
                             <span class="h5 m-0">Notifications</span>
                        </div>
                        <div class="notification-events bg-gray-300">
                            <div class="text-overline m-b-5">today</div>
                            <a href="#" class="d-block m-b-10">
                                <div class="card">
                                    <div class="card-body"> <i class="mdi mdi-circle text-success"></i> All systems operational.</div>
                                </div>
                            </a>
                            <a href="#" class="d-block m-b-10">
                                <div class="card">
                                    <div class="card-body"> <i class="mdi mdi-upload-multiple "></i> File upload successful.</div>
                                </div>
                            </a>
                            <a href="#" class="d-block m-b-10">
                                <div class="card">
                                    <div class="card-body"> <i class="mdi mdi-cancel text-danger"></i> Your holiday has been denied</div>
                                </div>
                            </a>
                            <div class="text-center" >    
                                <a href="notification.php"> All Notifications </a> 
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online"> 
                        <span class="avatar-title rounded-circle bg-dark">A</span></div>
                </a>
                <div class="dropdown-menu dropdown-menu-right"> 
                    <a class="dropdown-item" href="profile.php"> Profile </a> 
                    <a class="dropdown-item" href="reset-pass.php"> Reset Password</a> 
                    <a class="dropdown-item" href="feedback.php"> Feedback </a>
                    <div class="dropdown-divider"></div> 
                    <a class="dropdown-item" href="logout.php"> Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</header>