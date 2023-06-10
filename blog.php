<?php 
include "admin/include/database.php";
include "admin/include/post.php";
include "admin/include/topic.php";
include "admin/include/user.php";
include "admin/include/count.php";


$database = new database;
$db = $database->connect();
$blog_post = new blog_post($db);
$user = new user($db);
$topics = new topic($db);

// $path = "admin/upload/img_profile/";

// kiểm tra thư mục có ảnh hay không
$folderPath = 'admin/upload/img_profile';

$files = scandir($folderPath);

// Loại bỏ thư mục cha (..) và thư mục hiện tại (.)
$files = array_diff($files, array('..', '.'));


$stmt = $blog_post->read_all();
$st = $topics->read_all();
$stm = $user->read_all();

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Elen - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    	.col-md-6{
    		height: 813px;
    	}
    </style>
  </head>
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<?php include 'include/menu.php' ?>
		 <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<?php include 'include/header.php' ?>
			<section class="ftco-section">
				<div class="container" style="margin-bottom: 50px; opacity: 1;"> Lọc Blog 
					<select id="topic-check" name="" id="" style="width: 200px; height: 30px;" onchange="filterBlog()">
						<option value="">Select</option>
						<?php 
						$num=1;
						while($row = $st->fetch()){
						 ?>
						<option value="<?php echo $row['topic_name'] ?>"><?php echo $row['topic_name'] ?></option>
						<?php 
						$num++;
						}
						 ?>
					</select>
				</div>
	    	<div class="container">
	    		<div class="row">
	    			<div class="col-lg-8">
	    				<div class="row">


	    					<?php 
			    			$rows = array(); // Khởi tạo mảng để lưu trữ các hàng

								while($row = $stmt->fetch()) {
									$rows[] = $row; // Thêm hàng vào mảng
								}
								$rows = array_reverse($rows);


			    			foreach($rows as $row) {

			    			 ?>

			    			<div class="col-md-6" style="display: none;">
			    				<div class="blog-entry ftco-animate">
			    					<?php 
			    					$string = $row['blog_content'];
										$string = str_replace(' ', '-', $string);
			    					 ?>
										<a href="<?php echo 'blog-detail.php?blog='.$row['blog_post_id']."/".$string; ?>" class="img img-2" style="background-image: url(<?php echo 'admin/upload/blog_post/'.$row['blog_image_topic_random']; ?>);"></a>
										<div class="text text-2 pt-2 mt-3">
											<span class="category mb-3 d-block"><a href="<?php echo 'blog-detail.php?blog='.$row['blog_post_id']."/".$string; ?>" class="blog-need-filter"><?php echo $row['blog_topic'] ?></a></span>
				              <h3 class="mb-4"><a href="<?php echo 'blog-detail.php?blog='.$row['blog_post_id']."/".$string; ?>"><?php echo $row['blog_content'] ?></a></h3>
				              <p class="mb-4"><?php echo $row['blog_recomment'] ?></p>
				              <div class="author mb-4 d-flex align-items-center">
				            		<a href="<?php echo 'blog-detail.php?blog='.$row['blog_post_id']."/".$string; ?>" class="img" style="background-image: url(<?php echo 'admin/upload/blog_post/'.$row['blog_avatar_topic_random']; ?>);"></a>
				            		<div class="ml-3 info">
				            			<span>Written by</span>
				            			<h3><a href="<?php echo 'blog-detail.php?blog='.$row['blog_post_id']."/".$string; ?>"><?php echo $row['blog_name_owner'] ?></a>, <span><?php echo $row['blog_date'] ?></span></h3>
				            		</div>
				            	</div>
				              <div class="meta-wrap align-items-center">
				              	<div class="half order-md-last">
					              	<p class="meta">
					              		<span><i class="icon-heart"></i>3</span>
					              		<span><i class="icon-eye"></i>100</span>
					              		<span><i class="icon-comment"></i>5</span>
					              	</p>
				              	</div>
				              	<div class="half">
					              	<p><a href="<?php echo 'blog-detail.php?blog='.$row['blog_post_id']."/".$string; ?>" class="btn py-2">Continue Reading <span class="ion-ios-arrow-forward"></span></a></p>
				              	</div>
				              </div>
				            </div>
									</div>
			    			</div>

			    			<?php } ?>

			    			
			    		</div><!-- END-->

			    		<div class="row mt-5">
					          <div class="col">
					            <div class="block-27">
					              <ul>
					                <li><a href="<?php if (isset($_GET['page'])) 
					                									{
					                										if($_GET['page']==1)
					                											{
					                												$pre = 1;
					                											}else{$pre = $_GET['page']-1;}
					                									}else{$pre = 1;} 
					                									echo "blog.php?page=".$pre ?>"><
					                	</a></li>
					                <?php 
					                $number_page = count($rows);
					                $total_page = round(($number_page / 3) + 0.3);

					                for ($i = 1; $i <= $total_page; $i++) {
					                	
					                 ?>
					                <li class="<?php if (isset($_GET['page'])) {if($_GET['page'] == $i){echo 'active';}} 
					                								if(!isset($_GET['page']) && $i == 1){echo 'active';} ?>"><a href="<?php echo '?page='.$i ?>"><?php echo $i ?></a></li>
					              	<?php } ?>
					                <li><a href="<?php if (isset($_GET['page'])) 
					                									{
					                										if($_GET['page']==$total_page)
					                										{
					                											$next = $total_page;

					                										}else
					                										{$next = $_GET['page']+1;}
						                								}else{$next = 2;}
						                								echo "blog.php?page=".$next ?>">>
					                	</a></li>
					              </ul>
					            </div>
					         </div>
					    	</div>
			    	</div>
	    			<div class="col-lg-4 sidebar ftco-animate">
	            <div class="sidebar-box">
	              <form action="#" class="search-form">
	                <div class="form-group">
	                  <span class="icon icon-search"></span>
	                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
	                </div>
	              </form>
	            </div>
	            <div class="sidebar-box ftco-animate">
	            	<h3 class="sidebar-heading">Categories</h3>
	              <ul class="categories">
	                <li><a href="#">blog <span>(6)</span></a></li>
	                <li><a href="#">Technology <span>(8)</span></a></li>
	                <li><a href="#">Travel <span>(2)</span></a></li>
	                <li><a href="#">Food <span>(2)</span></a></li>
	                <li><a href="#">Photography <span>(7)</span></a></li>
	              </ul>
	            </div>

	            <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Popular Articles</h3>
	              <div class="block-21 mb-4 d-flex">
	                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
	                <div class="text">
	                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
	                  <div class="meta">
	                    <div><a href="#"><span class="icon-calendar"></span> Oct. 04, 2018</a></div>
	                    <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
	                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
	                  </div>
	                </div>
	              </div>
	              <div class="block-21 mb-4 d-flex">
	                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
	                <div class="text">
	                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
	                  <div class="meta">
	                    <div><a href="#"><span class="icon-calendar"></span> Oct. 04, 2018</a></div>
	                    <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
	                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
	                  </div>
	                </div>
	              </div>
	              <div class="block-21 mb-4 d-flex">
	                <a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
	                <div class="text">
	                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control</a></h3>
	                  <div class="meta">
	                    <div><a href="#"><span class="icon-calendar"></span> Oct. 04, 2018</a></div>
	                    <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
	                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
	                  </div>
	                </div>
	              </div>
	            </div>

	            <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Tag Cloud</h3>
	              <ul class="tagcloud">
	                <a href="#" class="tag-cloud-link">animals</a>
	                <a href="#" class="tag-cloud-link">human</a>
	                <a href="#" class="tag-cloud-link">people</a>
	                <a href="#" class="tag-cloud-link">cat</a>
	                <a href="#" class="tag-cloud-link">dog</a>
	                <a href="#" class="tag-cloud-link">nature</a>
	                <a href="#" class="tag-cloud-link">leaves</a>
	                <a href="#" class="tag-cloud-link">food</a>
	              </ul>
	            </div>

							<div class="sidebar-box subs-wrap img" style="background-image: url(images/bg_1.jpg);">
								<div class="overlay"></div>
								<h3 class="mb-4 sidebar-heading">Newsletter</h3>
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia</p>
	              <form action="#" class="subscribe-form">
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Email Address">
	                  <input type="submit" value="Subscribe" class="mt-2 btn btn-white submit">
	                </div>
	              </form>
	            </div>

	            <div class="sidebar-box ftco-animate">
	            	<h3 class="sidebar-heading">Archives</h3>
	              <ul class="categories">
	              	<li><a href="#">October 2018 <span>(10)</span></a></li>
	                <li><a href="#">September 2018 <span>(6)</span></a></li>
	                <li><a href="#">August 2018 <span>(8)</span></a></li>
	                <li><a href="#">July 2018 <span>(2)</span></a></li>
	                <li><a href="#">June 2018 <span>(7)</span></a></li>
	                <li><a href="#">May 2018 <span>(5)</span></a></li>
	              </ul>
	            </div>


	            <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Paragraph</h3>
	              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut.</p>
	            </div>
	          </div><!-- END COL -->
	    		</div>
	    	</div>
	    </section>
	    <?php include 'include/footer.php' ?>
	  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
	  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	          </div>
	        </div>
	      </div>
	    </footer>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/main.js"></script>
  <script src="js/blog.js"></script>
    
  </body>
</html>