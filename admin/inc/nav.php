<div class="header-wrapper">
            <!--start header -->
            <header>
                <div class="topbar d-flex align-items-center">
                    <nav class="navbar navbar-expand">
                        <div class="topbar-logo-header">
                            <div class="">
                                <img src="../img/vs1.png" class="logo-icon" alt="logo icon">
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
                                <img src="../img/Alfa_Romeo_Alfa_156_1.jpg" class="user-img" alt="user avatar">
                                <div class="user-info ps-3">
                                    <p class="user-name mb-0"><?php echo "Administrator";  ?></p>
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
                                <li><a class="dropdown-item" href="logout.php"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
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
                        <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                    </div>
                    <div>
                        <h4 class="logo-text">Rukada</h4>
                    </div>
                    <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                    </div>
                </div>
                <nav class="topbar-nav">
                    <!-- <ul class="metismenu" id="menu">
					<li>
						<a href="javascript:;" class="has-arrow">
							<div class="parent-icon"><i class='bx bx-home-circle'></i>
							</div>
							<div class="menu-title">Dashboard</div>
						</a>
						<ul>
						<li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Default</a>
						</li>
						<li> <a href="dashboard-eCommerce.html"><i class="bx bx-right-arrow-alt"></i>eCommerce</a>
						</li>
						<li> <a href="dashboard-analytics.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
						</li>
						<li> <a href="dashboard-digital-marketing.html"><i class="bx bx-right-arrow-alt"></i>Digital Marketing</a>
						</li>
						<li> <a href="dashboard-human-resources.html"><i class="bx bx-right-arrow-alt"></i>Human Resources</a>
						</li>
					</ul>
					</li>
				</ul> -->





                    <ul class="metismenu" id="menu">
                         <li class="list-items">
                         <a class="<?php if($page === 'dashboard'){ ?> active <?php }else {?> <?php  } ?>  ?>" href="dashboard.php">
                                <div class="parent-icon"><i class="bi bi-badge-ad-fill"></i>
                                </div>
                                <div class="menu-title">User Accounts</div>
                            </a>
                        </li>
                         <li class="list-items">
                         <a class="<?php if($page === 'allVehicles'){ ?> active <?php }else {?> <?php  } ?>  ?>" href="allVehicles.php">
                                <div class="parent-icon"><i class="bi bi-badge-ad-fill"></i>
                                </div>
                                <div class="menu-title">Vehicles</div>
                            </a>
                        </li>
                         <li class="list-items">
                            <a href="#">
                                <div class="parent-icon"><i class="bi bi-gear-fill"></i>
                                </div>
                                <div class="menu-title">Slider Config</div>
                            </a>
                        </li>
                         <li class="list-items">
                            <a class="<?php if($page === 'advertizement'){ ?> active <?php }else {?> <?php  } ?>  ?>" href="Advertisements.php">
                                <div class="parent-icon"><i class="bi bi-badge-ad-fill"></i>
                                </div>
                                <div class="menu-title ">Advertisements</div>
                            </a>
                        </li>
                         <li class="list-items">
                            <a href="#">
                                <div class="parent-icon"><i class="bi bi-list-ul"></i>
                                </div>
                                <div class="menu-title">List Elements</div>
                            </a>
                        </li>
                         <li class="list-items">
                            <a href="#">
                                <div class="parent-icon"><i class="bi bi-envelope-fill"></i>
                                </div>
                                <div class="menu-title">EmailTemplates</div>
                            </a>
                        </li>
                         <li class="list-items">
                         <a class="<?php if($page === 'statistics'){ ?> active <?php }else {?> <?php  } ?>  ?>" href="statistics.php">
                                <div class="parent-icon"><i class="bi bi-badge-ad-fill"></i>
                                </div>
                                <div class="menu-title">Statistics</div>
                            </a>
                        </li>
                         <li class="list-items">
                            <a href="#">
                                <div class="parent-icon"><i class="bi bi-pie-chart-fill"></i>
                                </div>
                                <div class="menu-title">Other</div>
                            </a>
                        </li>

                         <li class="list-items">
                         <a class="<?php if($page === 'messages'){ ?> active <?php }else {?> <?php  } ?>  ?>" href="messages.php">
                                <div class="parent-icon"><i class="bi bi-badge-ad-fill"></i>
                                </div>
                                <div class="menu-title">Messages</div>
                            </a>
                        </li>
                         <li class="list-items">
                            <a href="logout.php">
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