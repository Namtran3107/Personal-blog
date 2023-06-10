<?php 


$database = new database;
$db = $database->connect();
$user = new user($db);

$stm = $user->read_all();

 ?>
<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container px-md-5">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Category</h2>
              <ul class="list-unstyled categories">
                <li><a href="#">Photography <span>(6)</span></a></li>
                <li><a href="#">Fashion <span>(8)</span></a></li>
                <li><a href="#">Technology <span>(2)</span></a></li>
                <li><a href="#">Travel <span>(2)</span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Archives</h2>
              <ul class="list-unstyled categories">
              	<li><a href="#">October 2018 <span>(6)</span></a></li>
                <li><a href="#">September 2018 <span>(6)</span></a></li>
                <li><a href="#">August 2018 <span>(8)</span></a></li>
                <li><a href="#">July 2018 <span>(2)</span></a></li>
                <li><a href="#">June 2018 <span>(7)</span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
                  <?php 
                  $num = 1;
                  while($num < 2){
                    $row = $stm->fetch();
                   ?> 
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="<?php echo 'tell://'.$row['user_phone']; ?>"><span class="icon icon-phone"></span><span class="text"><?php if(empty($row['user_phone'])){echo "+84 123456789";}else{echo "+84 ".$row['user_phone'];} ?></span></a></li>
	                <li><a href="<?php echo 'mailto:'.$row['user_email']; ?>"><span class="icon icon-envelope"></span><span class="text"><?php if(empty($row['user_email'])){echo "email123@gmail.com";}else{echo $row['user_email'];} ?></span></a></li>
                  <?php 
                  $num++;
                  }
                   ?>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->