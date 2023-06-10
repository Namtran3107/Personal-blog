<?php 
$path = "/FE/admin/";
 ?>
<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/logo/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
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
                    </ul>
                </nav>
            </div>
        </aside>