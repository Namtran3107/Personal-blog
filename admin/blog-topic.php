<?php 
include "include/check_login.php";
include "include/database.php";
include "include/topic.php";
include "include/user.php";

$database = new database();
$db = $database->connect();
$topics = new topic($db);
$user = new user($db);


$user_ss = $_SESSION['user_id'];
$user->user_id = $user_ss;
$user->read();



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_REQUEST['frm'] == 'add'){
        $topics->topic_name = $_REQUEST['topic_name'];
        if($topics->add()){
        }
    }
    if($_REQUEST['frm'] == 'delete'){
        $topics->topic_id = $_REQUEST['topic_id'];
        $topics->read();
        if($topics->delete()){
            $status = "Add success";
        }
    }
    if($_REQUEST['frm'] == 'update'){
        $topics->topic_id = $_REQUEST['topic_id'];
        $topics->read();
        $topics->topic_name = $_REQUEST['topic_name'];
        if($topics->update()){

        }
    }
    header('Location: blog-topic.php');
}


// echo "<pre>";
$stmt = $topics->read_all();
// print_r($_REQUEST);
// $row = $stmt->fetchAll();
// print_r($row);
// echo "</pre>";
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
    <title>Charts</title>

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
    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="css/edit.css">
    <style type="text/css">
        td {
            width: calc(100% / 3);
        }
    </style>
</head>

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
                        <!-- MODAL ADD -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="blog-topic.php" method="POST" name="frm_edit" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Modal title Here</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="topic_name">
                                                <label>Name</label>
                                                <input class="form-control" name="topic_name" id="topic_name">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="frm" value="add">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end Modal -->
                        <div class="panel-heading">
                                <button class="btn btn-warning" data-toggle="modal" data-target="#addModal">Thêm</button>
                        </div>
                        <div class="row">
                            <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name Topic</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    $num = 1;
                                    while ($row = $stmt->fetch()) {
                                    
                                     ?>
                                    <tbody>
                                        
                                        <tr class="success">
                                            <td><?php echo $row['topic_id'] ?></td>
                                            <td><?php echo $row['topic_name'] ?></td>
                                            <td><button class="btn btn-primary" data-toggle="modal" data-target="<?php echo '#deleteModal'.$row['topic_id'] ?>">Xoá</button>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#updateModal'.$row['topic_id'] ?>">Sửa</button></td>
                                        </tr>
                                        <!-- modal  Delete-->
                                        <div class="modal fade" id="<?php echo 'deleteModal'.$row['topic_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="blog-topic.php" method="POST" name="frm_delete">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Modal title Here</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <input type="hidden" class="form-control" name="topic_id" id="topic_id" value="<?php echo $row['topic_id'] ?>">
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
                                        <!-- modal  Update-->
                                        <div class="modal fade" id="<?php echo 'updateModal'.$row['topic_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="blog-topic.php" method="POST" name="frm_update" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Modal title Here</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <!-- id để req -->
                                                            <input type="hidden" class="form-control" name="topic_id" id="topic_id" value="<?php echo $row['topic_id'] ?>">
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="topic_name">
                                                                <label>Name</label>
                                                                <input class="form-control" name="topic_name" id="topic_name" value="<?php echo $row['topic_name'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="frm" value="update">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End update -->
                                        <?php
                                        $num++; 
                                        }
                                         ?>


                                    </tbody>
                                </table>
                            </div>
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
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->

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
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script src="js/edit.js"></script>
</body>

</html>
<!-- end document-->
