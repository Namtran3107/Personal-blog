<?php 
$path = "/FE/";
 ?>

<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
			<h1 id="colorlib-logo"><a href="index.php">NAM TRAN<span>.</span></a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li class="<?php if($_SERVER['PHP_SELF'] == $path.'index.php'){echo 'colorlib-active';} ?>"><a href="index.php">Home</a></li>
					<li class="<?php if($_SERVER['PHP_SELF'] == $path.'blog.php'){echo 'colorlib-active';} ?>"><a href="blog.php"><a href="blog.php">Blog</a></li>
					<li class="<?php if($_SERVER['PHP_SELF'] == $path.'about.php'){echo 'colorlib-active';} ?>"><a href="about.php"><a href="about.php">About</a></li>
					<li class="<?php if($_SERVER['PHP_SELF'] == $path.'blog-contact.php'){echo 'colorlib-active';} ?>"><a href="blog-contact.php"><a href="blog-contact.php">Contact</a></li>
				</ul>
			</nav>

			<div class="colorlib-footer">
				<ul>
					<li><a href="#"><i class="icon-facebook"></i></a></li>
					<li><a href="#"><i class="icon-twitter"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
					<li><a href="#"><i class="icon-linkedin"></i></a></li>
				</ul>
			</div>
		</aside> <!-- END COLORLIB-ASIDE -->