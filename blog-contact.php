<?php 
include "admin/include/database.php";
include "admin/include/contact.php";
include "admin/include/user.php";
include "admin/include/count.php";


$database = new database;
$db = $database->connect();
$user = new user($db);
$contact = new blog_contact($db);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_REQUEST['frm'] == 'add'){
        $contact->contact_name = $_REQUEST['contact_name'];
        $contact->contact_email = $_REQUEST['contact_email'];
        $contact->contact_message = $_REQUEST['contact_message'];
        if($contact->add()){
        }
    }
    header('Location: blog-contact.php');
}


$stm = $user->read_all();
$stmt = $contact->read_all();

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
  </head>
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<?php include 'include/menu.php' ?> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section contact-section">
	      <div class="container">
	        <div class="row d-flex mb-5 contact-info">
	          <div class="col-md-12 mb-4">
	            <h2 class="h4 font-weight-bold">Contact Information</h2>
	          </div>
	          <?php 
						$num = 1;
						while($num < 2){
							$row = $stm->fetch();
						 ?>		
	          <div class="w-100"></div>
	          <div class="col-md-3">
	            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
	          </div>
	          <div class="col-md-3" style="max-width: 20%;">
	            <p><span>Phone:</span> <a href="<?php echo 'tell://'.$row['user_phone']; ?>"><?php echo "+ ".$row['user_phone']; ?></a></p>
	          </div>
	          <div class="col-md-3" style="flex: 2;">
	            <p><span>Email:</span > <a href="<?php echo 'mailto:'.$row['user_email']; ?>"><?php echo $row['user_email']; ?></a></p>
	          </div>
	          <div class="col-md-3">
	            <p><span>Website</span> <a href="#">yoursite.com</a></p>
	          </div>
	        </div>
	        <?php 
					$num++;
					}
					 ?>
	        <div class="row block-9">
	          <div class="col-md-6 order-md-last pr-md-5">
	            <form action="blog-contact.php" method="POST" name="frm_edit">
	              <div class="form-group">
	                <input type="text" name="contact_name" class="form-control" placeholder="Your Name">
	              </div>
	              <div class="form-group">
	                <input type="email" name="contact_email" class="form-control" placeholder="Your Email">
	              </div>
	              <div class="form-group">
	                <textarea name="contact_message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
	              </div>
	              <div class="form-group">
	              	<input type="hidden" name="frm" value="add">
	                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
	              </div>
	            </form>
	          
	          </div>

	          <div class="col-md-6">
	          	<div id="map"><iframe style="width: 100%; height: 100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6051334155277!2d106.67081527475138!3d10.76488448938312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ee10a99ee19%3A0xa24c4b785ce479b!2zMzMgxJAuIFbEqW5oIFZp4buFbiwgUGjGsOG7nW5nIDIsIFF14bqtbiAxMCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1684408547577!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
	          </div>
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