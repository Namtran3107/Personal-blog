<?php 
include "admin/include/database.php";
include "admin/include/post.php";
include "admin/include/count.php";
include "admin/include/user.php";

$database = new database;
$db = $database->connect();
$blog_post = new blog_post($db);

if (isset($_GET['blog'])) {
    $blog = $_GET['blog'];
}



// $stmt = $blog_post->read_all();

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
    <link rel="stylesheet" type="text/css" href="admin/themify-icons-font/themify-icons/themify-icons.css">
    <style>
    	.img_avatar{
				border-radius: 0 !important;
				width: 150px;
				height: 150px;
			}
			.social-icons{
				padding: 0;
				display: flex;
				margin-top: 15px	;
				margin-right: -10px;
			}
			.social-icons li{
				list-style-type: none;
				margin-right: 10px;
			}
			.sidebar-section{
				display: flex;
				flex-direction: column;
				align-items: center;
			}
    </style>
  </head>
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<?php include 'include/menu.php' ?>
		 <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section">
	    	<div class="container">
	    		<div class="row">
	    			<?php 
	    			$blog_post->blog_post_id = $blog;
						$blog_post->read(); 
						?>
	    			<div class="col-lg-8 ftco-animate">
	            <h2 class="mb-3 font-weight-bold"><?php echo $blog_post->blog_content ?></h2>
	            <p><?php echo $blog_post->blog_recomment ?></p>
	            <p>
	              <img src="<?php echo 'admin/upload/blog_post/'.$blog_post->blog_image_topic_random ?>" alt="" class="img-fluid">
	            </p>
	            <p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>
	            <div class="tag-widget post-tag-container mb-5 mt-5">
	              <div class="tagcloud">
	                <a href="#" class="tag-cloud-link">Life</a>
	                <a href="#" class="tag-cloud-link">Sport</a>
	                <a href="#" class="tag-cloud-link">Tech</a>
	                <a href="#" class="tag-cloud-link">Travel</a>
	              </div>
	            </div>
	            
	            

	            <div class="pt-5 mt-5">
	              <h3 class="mb-5 font-weight-bold">6 Comments</h3>
	              <ul class="comment-list">
	                <li class="comment">
	                  <div class="vcard bio">
	                    <img src="images/person_1.jpg" alt="Image placeholder">
	                  </div>
	                  <div class="comment-body">
	                    <h3>John Doe</h3>
	                    <div class="meta">October 03, 2018 at 2:21pm</div>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	                    <p><a href="#" class="reply">Reply</a></p>
	                  </div>
	                </li>

	                <li class="comment">
	                  <div class="vcard bio">
	                    <img src="images/person_1.jpg" alt="Image placeholder">
	                  </div>
	                  <div class="comment-body">
	                    <h3>John Doe</h3>
	                    <div class="meta">October 03, 2018 at 2:21pm</div>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	                    <p><a href="#" class="reply">Reply</a></p>
	                  </div>

	                  <ul class="children">
	                    <li class="comment">
	                      <div class="vcard bio">
	                        <img src="images/person_1.jpg" alt="Image placeholder">
	                      </div>
	                      <div class="comment-body">
	                        <h3>John Doe</h3>
	                        <div class="meta">October 03, 2018 at 2:21pm</div>
	                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	                        <p><a href="#" class="reply">Reply</a></p>
	                      </div>


	                      <ul class="children">
	                        <li class="comment">
	                          <div class="vcard bio">
	                            <img src="images/person_1.jpg" alt="Image placeholder">
	                          </div>
	                          <div class="comment-body">
	                            <h3>John Doe</h3>
	                            <div class="meta">October 03, 2018 at 2:21pm</div>
	                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	                            <p><a href="#" class="reply">Reply</a></p>
	                          </div>

	                            <ul class="children">
	                              <li class="comment">
	                                <div class="vcard bio">
	                                  <img src="images/person_1.jpg" alt="Image placeholder">
	                                </div>
	                                <div class="comment-body">
	                                  <h3>John Doe</h3>
	                                  <div class="meta">October 03, 2018 at 2:21pm</div>
	                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	                                  <p><a href="#" class="reply">Reply</a></p>
	                                </div>
	                              </li>
	                            </ul>
	                        </li>
	                      </ul>
	                    </li>
	                  </ul>
	                </li>

	                <li class="comment">
	                  <div class="vcard bio">
	                    <img src="images/person_1.jpg" alt="Image placeholder">
	                  </div>
	                  <div class="comment-body">
	                    <h3>John Doe</h3>
	                    <div class="meta">October 03, 2018 at 2:21pm</div>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	                    <p><a href="#" class="reply">Reply</a></p>
	                  </div>
	                </li>
	              </ul>
	              <!-- END comment-list -->
	              
	              <div class="comment-form-wrap pt-5">
	                <h3 class="mb-5">Leave a comment</h3>
	                <form action="#" class="p-3 p-md-5 bg-light">
	                  <div class="form-group">
	                    <label for="name">Name *</label>
	                    <input type="text" class="form-control" id="name">
	                  </div>
	                  <div class="form-group">
	                    <label for="email">Email *</label>
	                    <input type="email" class="form-control" id="email">
	                  </div>
	                  <div class="form-group">
	                    <label for="website">Website</label>
	                    <input type="url" class="form-control" id="website">
	                  </div>

	                  <div class="form-group">
	                    <label for="message">Message</label>
	                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
	                  </div>
	                  <div class="form-group">
	                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
	                  </div>

	                </form>
	              </div>
	            </div>
	          </div> <!-- .col-md-8 -->
	    			<div class="col-lg-4 sidebar ftco-animate">
	            
	            <div class="sidebar-section about-author center-text">
								<div class="author-image"><img src="<?php echo 'admin/upload/blog_post/'.$blog_post->blog_avatar_topic_random ?>" alt="Autohr Image" class="img_avatar"></div>

								<ul class="social-icons">
									<li><a href="#"><i class="ti-facebook"></i></a></li>
									<li><a href="#"><i class="ti-twitter"></i></a></li>
									<li><a href="#"><i class="ti-instagram"></i></a></li>
									<li><a href="#"><i class="ti-vimeo"></i></a></li>
									<li><a href="#"><i class="ti-pinterest"></i></a></li>
								</ul><!-- right-area -->

								<h4 class="author-name"><b class="light-color"><?php echo $blog_post->blog_name_owner ?></b></h4>
								<p style="line-height: 1.6;font-size: 1.05em;font-family: 'Maven Pro', sans-serif;font-weight: 400;color: #555;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
									dolore magnam aliquam quaerat voluptatem.</p>

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
    
  </body>
</html>