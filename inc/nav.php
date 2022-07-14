<nav class="navbar navbar-expand-lg navbar-light bg-light px-0 px-sm-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./img/vs1.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sort</a>
                </li>
                <?php
                if (isset($_SESSION['logged_in'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Only show vehicles with announcement</a>
                    </li>
                <?php  } ?>
            </ul>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-decoration-none text-muted" href="contact-us.php" tabindex="-1">Contact</a>
                </li>
                <?php
                if (!isset($_SESSION['logged_in'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link text-decoration-none text-muted" href="login.php" tabindex="-1">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-decoration-none text-muted" href="login.php" tabindex="-1">Register</a>
                    </li>
                <?php } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link text-decoration-none text-muted" href="<?php
                         echo $BASE_URL_NAME ?>/user/index.php" tabindex="-1"><?php echo $_SESSION['logged_in']; ?></a>
                    </li>

                <?php  }  ?>
                <?php
                if (isset($_SESSION['logged_in'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php  } ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-decoration-none text-muted " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Others
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">News</a></li>
                        <li><a class="dropdown-item" href="#">Rules</a></li>
                        <li><a class="dropdown-item" href="#">Rodo</a></li>
                        <li><a class="dropdown-item" href="#">Cookie consent</a></li>
                        <li><a class="dropdown-item" href="#">About</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>