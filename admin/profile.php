<?php 
include "include/check_login.php";
include "include/database.php";
include "include/user.php";

$database = new database();
$db = $database->connect();
$user = new user($db);


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_REQUEST['frm'] == 'update'){
            $user->user_id = $_REQUEST['user_id'];
            $user->read();
            $user->user_name = $_REQUEST['user_name'];
            $user->user_email = $_REQUEST['user_email'];
            $user->user_phone = $_REQUEST['user_phone'];
            $user->user_password = sha1($_REQUEST['user_password']);
            $path = "upload/img_profile/";
            if(!empty($_FILES['user_image']['name'])){
                if($user->user_image != ""){
                    unlink($path.$user->user_image);
                }
                $user->user_image = $_FILES['user_image']['name'];
                move_uploaded_file($_FILES['user_image']['tmp_name'], $path . $_FILES['user_image']['name']);
            }
            if($user->update()){
                $status = "Add success";
            }
        }
        header("Location: profile.php");
    }
// kiểm tra thư mục có ảnh hay không
$folderPath = 'upload/img_profile';

$files = scandir($folderPath);

// Loại bỏ thư mục cha (..) và thư mục hiện tại (.)
$files = array_diff($files, array('..', '.'));
// echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";

$user_ss = $_SESSION['user_id'];

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
    <title>Forms</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
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
    <style>
        td .btn {
            width: auto;
            font-size: 16px; 
            padding: 5px 10px;
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
            <?php 
                    $user->user_id = $user_ss;
                    $user->read();
                    $path = "upload/img_profile/"
                    ?>
            <?php include 'include/header.php' ?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    
                    <div class="container-fluid">
                        <div class="row" style="justify-content: center;">
                            <img style="width: 200px; height: 200px; object-fit:cover;" src="<?php if(empty($files)){echo "upload/img-none/none.jfif";} else{echo $path.$user->user_image;} ?>" class="img-thumbnail" alt="...">
                        </div>
                        <div class="row">
                            
                            <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        
                                        <tr class="success">
                                            <td><?php echo $user->user_name ?></td>
                                            <td><?php echo $user->user_email ?></td>
                                            <td class="user_password">**********</td>
                                            <td><?php echo $user->user_phone ?></td>
                                            <td><button class="btn btn-danger" data-toggle="modal" data-target="<?php echo '#updateModal'.$user->user_id ?>">Sửa</button>
                                            </td>
                                        </tr>

                                        <!-- modal  Update-->
                                        <div class="modal fade" id="<?php echo 'updateModal'.$user->user_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="profile.php" method="POST" name="frm_update" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Modal title Here</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <!-- id để req -->
                                                            <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $user->user_id ?>">
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="user_name">
                                                                <label>User Name</label>
                                                                <input class="form-control" name="user_name" value="<?php echo $user->user_name ?>" id="user_name">
                                                            </div>
                                                            <div class="user_image">
                                                                <label>Your Avatar</label>
                                                                <input type="file" class="form-control" name="user_image" id="user_image">
                                                            </div>
                                                             <div class="user_email">
                                                                <label>Email</label>
                                                                <input class="form-control" name="user_email" value="<?php echo $user->user_email ?>" id="user_email">
                                                            </div>
                                                            <div>
                                                                <label>New Password</label>
                                                                <input class="form-control" name="user_password" value="" id="user_password">
                                                            </div>
                                                            <div>
                                                                <label>Phone</label>
                                                                <input class="form-control" name="user_phone" value="<?php echo $user->user_phone ?>" id="user_phone">
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
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
