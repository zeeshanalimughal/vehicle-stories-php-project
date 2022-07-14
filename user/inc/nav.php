<div class="header-wrapper">
    <!--start header -->
    <?php
    $selectProfile = "SELECT avatar FROM users WHERE username = '{$_SESSION['logged_in']}'";
    $resProfile = mysqli_query($conn, $selectProfile);
    if (mysqli_num_rows($resProfile) > 0) {
        $avatar = mysqli_fetch_assoc($resProfile);
    }
    ?>
    <header>
        <div class="topbar d-flex align-items-center">
            <nav class="navbar navbar-expand">
                <div class="topbar-logo-header">
                    <div class="">
                        <img src="../img/vs1.png" class="logo-icon" style="object-fit: cover;" alt="logo icon">
                    </div>
                    <div class="">
                        <h4 class="logo-text">Vehicles Stories</h4>
                    </div>
                </div>
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
                <div class="search-bar flex-grow-1">
                    <div class="position-relative search-bar-box">
                        <input type="text" class="form-control search-control" placeholder="Type to search...">
                        <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                        <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                    </div>
                </div>
                <div class="top-menu ms-auto">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item mobile-search-icon">
                            <a class="nav-link" href="#"> <i class='bx bx-search'></i>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="user-box dropdown">
                    <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">


                        <?php
                        if ($avatar['avatar'] == "") {
                        ?>
                            <img src="https://www.sdgpakistan.pk/uploads/team/head-659652__3401.png" class="user-img" alt="user avatar">
                        <?php  } else { ?>
                            <img src="./uploads/<?php echo $avatar['avatar']; ?>" class="user-img" alt="user avatar">
                        <?php  } ?>


                        <div class="user-info ps-3">
                            <p class="user-name mb-0"><?php echo $_SESSION['logged_in'] ?></p>
                            <!-- <p class="designattion mb-0">Web Designer</p> -->
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
                        </li>
                        <li>
                            <div class="dropdown-divider mb-0"></div>
                        </li>
                        <li><a class="dropdown-item" href="../logout.php"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--end header -->
    <!--navigation-->

    <div class="nav-container">
        <div class="mobile-topbar-header">
            <div>
                <img src="../img/vs1.png" class="logo-icon" style="object-fit: cover;" alt="logo icon">
            </div>

            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
            </div>
        </div>
        <nav class="topbar-nav">
            <ul class="metismenu" id="menu">
                <li>
                    <a class="<?php if ($page == 'index') { ?> active <?php } else { ?> <?php  } ?>  ?>" href="index.php">
                        <div class="parent-icon"><i class="bi bi-badge-ad-fill"></i>
                        </div>
                        <div class="menu-title">Vehicles</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="parent-icon"><i class="bi bi-pie-chart-fill"></i>
                        </div>
                        <div class="menu-title">Other</div>
                    </a>
                </li>
                <li>
                    <a href="../index.php">
                        <div class="parent-icon"><i class="bi bi-pie-chart-fill"></i>
                        </div>
                        <div class="menu-title">Homepage</div>
                    </a>
                </li>
                <li>
                    <a href="../logout.php">
                        <div class="parent-icon"><i class="bi bi-box-arrow-right"></i>

                        </div>
                        <div class="menu-title">Logout</div>
                    </a>
                </li>


            </ul>


        </nav>
    </div>
    <!--end navigation-->
</div>