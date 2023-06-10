<header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="<?php if($_SERVER['PHP_SELF'] == $path.'index.php'){echo 'active';} ?>">
                            <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="<?php if($_SERVER['PHP_SELF'] == $path.'blog-topic.php'){echo 'active';} ?>">
                            <a href="blog-topic.php">
                                <i class="fas fa-chart-bar"></i>Blog Topics</a>
                        </li>
                        <li class="<?php if($_SERVER['PHP_SELF'] == $path.'blog-post.php'){echo 'active';} ?>">
                            <a href="blog-post.php">
                                <i class="fas fa-table"></i>Blog Posts</a>
                        </li>
                        <li class="<?php if($_SERVER['PHP_SELF'] == $path.'blog-contact.php'){echo 'active';} ?>">
                            <a href="blog-contact.php">
                                <i class="fas fa-calendar-alt"></i>Blog Contact</a>
                        </li>
                        <li >
                            <a href="../admin/profile.php">
                                <i class="zmdi zmdi-account"></i>Profile</a>
                        </li>
                        <li>
                            <a href="logout.php">
                                <i class="zmdi zmdi-power"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>