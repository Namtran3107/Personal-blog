<?php 
include "include/check_login.php";
include "include/database.php";
include "include/contact.php";
include "include/user.php";

$database = new database();
$db = $database->connect();
$blog_contact = new blog_contact($db);
$user = new user($db);


$user_ss = $_SESSION['user_id'];
$user->user_id = $user_ss;
$user->read();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_REQUEST['frm'] == 'delete'){
        $blog_contact->contact_id = $_REQUEST['contact_id'];
        if($blog_contact->delete()){
            $status = "Add success";
        }
    }
    header('Location: blog-contact.php');
}

$stmt = $blog_contact->read_all();
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Calendar</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- FullCalendar -->
    <link href='vendor/fullcalendar-3.10.0/fullcalendar.css' rel='stylesheet' media="all" />

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="css/edit.css">
    <style type="text/css">
         td {
            width: calc(100% / 5);
            height: 47px !important;
        }
        .change_color{
            color: #4272d7;
        }
    </style>

</head>

<!-- animsition overrides all click events on clickable things like a,
      since calendar doesn't add href's be default,
      it leads to odd behaviors like loading 'undefined'
      moving the class to menus lead to only the menu having the effect -->
<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include 'include/header-mobile.php' ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php include 'include/menu.php' ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include 'include/header.php' ?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            
                            <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name Sender</th>
                                            <th>Email Sender</th>
                                            <th>Message Sender</th>
                                            <th>Date Send</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    $num = 1;
                                    while ($row = $stmt->fetch()) {
                                    
                                     ?>
                                    <tbody>
                                        
                                        <tr class="success">
                                            <td><?php echo $row['contact_name'] ?></td>
                                            <td><?php echo $row['contact_email'] ?></td>
                                            <td class="blog_content"><?php echo $row['contact_message'] ?></td>
                                            <td><?php echo $row['contact_date'] ?></td>
                                            <td><button class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#deleteModal'.$row['contact_id'] ?>">Xoá</button>
                                                <button class="btn" data-toggle="modal" data-target="<?php echo '#see'.$row['contact_id'] ?>" style="background-color: #ccc;">Xem</button>
                                            </td>
                                        </tr>
                                        <!-- modal  Delete-->
                                        <div class="modal fade" id="<?php echo 'deleteModal'.$row['contact_id'] ?>" tabindex="-1" role="dialog" aria-h3ledby="myModalh3" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="blog-contact.php" method="POST" name="frm_delete">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalh3">Modal title Here</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <input type="hidden" class="form-control" name="contact_id" id="contact_id" value="<?php echo $row['contact_id'] ?>">
                                                        </div>
                                                        <p style="margin: 0 auto;">Ban co muon xoa</p>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="frm" value="delete">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End MODAL -->
                                        <!-- modal  see-->
                                        <div class="modal fade" id="<?php echo 'see'.$row['contact_id'] ?>" tabindex="-1" role="dialog" aria-h3ledby="myModalh3" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="blog-post.php" method="POST" name="frm_update" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalh3">Modal title Here</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="contact_name">
                                                                <h3 class="change_color">Name Sender</h3>
                                                                <p><?php echo $row['contact_name'] ?></p>
                                                            </div>
                                                            
                                                             <div class="contact_email">
                                                                <h3 class="change_color">Email Sender</h3>
                                                                <p><?php echo $row['contact_email'] ?></p>
                                                            </div>
                                                            <div class="">
                                                                <h3 class="change_color">Message Sender</h3>
                                                                <p><?php echo $row['contact_message'] ?></p>
                                                            </div>
                                                            <div class="blog_recomment">
                                                                <h3 class="change_color">Date Send</h3>
                                                                <p><?php echo $row['contact_date'] ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End see -->
                                        <?php
                                        $num++; 
                                        }
                                         ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>

    <!-- full calendar requires moment along jquery which is included above -->
    <script src="vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
    <script src="vendor/fullcalendar-3.10.0/fullcalendar.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

    <script type="text/javascript">
$(function() {
  // for now, there is something adding a click handler to 'a'
  var tues = moment().day(2).hour(19);

  // build trival night events for example data
  var events = [
    {
      title: "Special Conference",
      start: moment().format('YYYY-MM-DD'),
      url: '#'
    },
    {
      title: "Doctor Appt",
      start: moment().hour(9).add(2, 'days').toISOString(),
      url: '#'
    }

  ];

  var trivia_nights = []

  for(var i = 1; i <= 4; i++) {
    var n = tues.clone().add(i, 'weeks');
    console.log("isoString: " + n.toISOString());
    trivia_nights.push({
      title: 'Trival Night @ Pub XYZ',
      start: n.toISOString(),
      allDay: false,
      url: '#'
    });
  }

  // setup a few events
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listWeek'
    },
    events: events.concat(trivia_nights)
  });
});
    </script>


</body>

</html>
<!-- end document-->
