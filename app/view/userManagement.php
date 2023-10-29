<?php
session_start();
include_once '../model/userModel.php';
$userObj = new user();
$userResult = $userObj->getAllUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../resources/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../resources/datatables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="../../resources/datatables/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="../../resources/datatables/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="../../resources/datatables/css/buttons.bootstrap4.min.css" />
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../resources/fontawesome/css/all.css" />
</head>

<body>
    <!-- Navbar of Dashboard start -->
    <div class="wrapper">
        <div class="body-overlay"></div>
        <!-- Side bar start  -->
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h3><img src="../../img/logo/logo2.png" class="img-fluid" />
                    <p class="glow">Rosevilla &nbsp;&nbsp;Communication&nbsp;&reg;</p>
                </h3>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="dashboard.php" class="active"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
                </li>

                <div class="small-screen navbar-display">
                    <li class="dropdown d-lg-none d-md-block d-xl-none d-sm-block">
                        <a href="" id="homeSubmenu0" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <ul class="collapse list-unstyled menu" id="homeSubmenu0">
                                <li><a href="#">You have 5 new Messages</a></li>
                                <li><a href="#">You have 5 new Messages</a></li>
                                <li><a href="#">You have 5 new Messages</a></li>
                                <li><a href="#">You have 5 new Messages</a></li>
                            </ul>
                    </li>


                    <li class="d-lg-none d-md-block d-xl-none d-sm-block">
                        <a href="#"><i class="material-icons">person</i><span>User</span></a>
                    </li>


                </div>
                <li class="active">
                    <a href="userManagement.php"><i class="material-icons side-icon">account_box</i><span>User Management</span></a>
                </li>

                <li>
                    <a href="customerManagement.php">
                        <i class="material-icons">contacts</i><span>Customer Management</span></a>
                </li>
                <li>
                    <a href="supplierManagement.php">
                        <i class="material-icons">people</i><span>Supplier Management</span></a>
                </li>
                <li>
                    <a href="productManagement.php">
                        <i class="material-icons">shopping_basket</i><span>Product Management</span></a>
                </li>

                <li>
                    <a href="stockManagement.php">
                        <i class="material-icons">outbox</i><span>Stock Management</span></a>
                </li>

                <li>
                    <a href="#">
                        <i class="material-icons">featured_play_list</i><span>Order Management</span></a>
                </li>

                <li>
                    <a href="#">
                        <i class="material-icons">local_shipping</i><span>Delivery Management</span></a>

                </li>

                <li>
                    <a href="#">
                        <i class="material-icons">payments</i><span>Payment Management</span></a>

                </li>

                <li>
                    <a href="#">
                        <i class="material-icons">insert_chart</i><span>Report Management</span></a>
                </li>
                <li>
                    <a href="#"><i class="material-icons">message</i><span>Feedback Mangement</span></a>
                </li>
                <li class="">
                    <a href="#"><i class="material-icons">settings_backup_restore</i><span>Backup Management</span></a>
                </li>

            </ul>
        </nav>
        <!-- side bar end -->
        <!---------- page content--------->
        <div id="content">
            <!-- top navbar start -->
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div id="sidebar-collapse" class="d-xl-block d-lg-block d-md-none d-none">
                        <button type="button" id="sidebar-collapse-btn" class="toggle">
                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </button>
                    </div>

                    <a href="#" class="navbar-brand">User Management</a>

                    <div class="collapse navbar-collapse d-sm-none d-md-none d-none" id="navbarcollapse">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <div id="clock-disp" class="clock-disp">00:00:00 ..</div>

                            </li>
                            <li class="nav-item dropdown active m-2">
                                <a class="nav-link" href="#" data-toggle="dropdown">
                                    <span class="material-icons">notifications</span>
                                    <span class="notifications">4</span>
                                </a>
                                <ul class="dropdown-menu menu1">
                                    <li>
                                        <a href="#">You have 4 new Messages</a>
                                    </li>
                                    <li>
                                        <a href="#">You have 4 new Messages</a>
                                    </li>
                                    <li>
                                        <a href="#">You have 4 new Messages</a>
                                    </li>
                                    <li>
                                        <a href="#">You have 4 new Messages</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--------------Profile Image Section Start---------------->

                    <ul class="nav navbar-nav2 mr-auto">
                        <?php include('../../common/loginBar.php'); ?>
                    </ul>

                    <!--------------Profile Image Section End---------------->

                    <button class="ml-auto more-button d-sm-none" type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="toggle">
                        <span class="material-icons">more_vert</span>
                    </button>

                </nav>
            </div>
            <!---------------------- Main Content start ----------------------->
            <div class="main-content">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header m-1">
                                <a href="addUserModal.php" class="btn btn-success li-modal" data-toggle="modal" data-target="#myModal" data-backdrop="static"><i class="fas fa-plus"></i>&nbsp;Add User</a>

                            </div>
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php if (isset($_REQUEST['response'])) { ?>
                                            <div class="alert alert-success error-msg2">
                                                <?php //display the error message from login process page
                                                echo base64_decode($_REQUEST['response']);
                                                ?>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>

                            </div>
                            <div class="card-content">
                                <!----------------------------------------------------------------------- User Table Start -------------------------------------------------------------------------------------------------->
                                <div class="table-responsive">
                                    <div id="userTbReload">
                                        <table id="userTable" class="table nowrap table-striped text-center">
                                            <thead>
                                                <tr class="tb-head-style">
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">NIC No.</th>
                                                    <th scope="col">Position</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">E-mail Address</th>
                                                    <th scope="col">Action</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 0;
                                                while ($row = $userResult->fetch_assoc()) {
                                                    $buttonActive = (($row['user_status'] == 0) ? 'inline' : 'none');
                                                    $buttonInActive = (($row['user_status'] == 1) ? 'inline' : 'none');
                                                    $count++;
                                                ?>
                                                    <tr scope="row">
                                                        <td><?php echo $count; ?></td>
                                                        <td><img src="../../img/user_profile_images/<?php echo $row['user_profile_image']; ?>" style="width:50px;height:50px;border-radius:2px;" /></td>
                                                        <td><?php echo $row['user_first_name'] . ' ' . $row['user_last_name']; ?></td>
                                                        <td><?php echo $row['user_nic']; ?></td>
                                                        <td>
                                                            <?php
                                                            $roleId = $row['role_role_id'];
                                                            $viewRoleRes = $userObj->getUserRole_ById($roleId);
                                                            while ($viewInfo2 = $viewRoleRes->fetch_assoc()) {
                                                                echo $viewInfo2['role_name']; // get role name
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $row['user_address1'] . ' <br>' . $row['user_address2'] . ' <br>' . $row['user_city']; ?></td>
                                                        <td><?php echo $row['user_email_address']; ?></td>
                                                        <td>

                                                            <a href="editUserModal.php?id=<?php echo base64_encode($row['user_id']); ?>" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>

                                                            <a href="userViewModal.php?id=<?php echo base64_encode($row['user_id']); ?>" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>

                                                        </td>
                                                        <td>
                                                            <!-------------Active------------------>
                                                            <button href="javaScript:void(0)" onclick="activeInactiveUser('<?php echo base64_encode($row['user_id']); ?>',0)" class="btn btn-outline-success crud-btn" style="display:<?php echo $buttonInActive; ?>;width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
                                                            <!--------------Inactive------------------->
                                                            <button href="javaScript:void(0)" onclick="activeInactiveUser('<?php echo base64_encode($row['user_id']); ?>',1)" class="btn btn-outline-danger crud-btn" style="display:<?php echo $buttonActive; ?>;width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-------------------------------------------------------------------------------- User Table End ----------------------------------------------------------------------------------------->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!------ footer start -------->
            <?php include('../../common/footer.php'); ?>
            <!------ footer end -------->

        </div>
    </div>
    <!-----------------Modal Popup Start--------------->

    <?php include('../../common/modalPopup.php'); ?>

    <!-----------------Modal Popup Start--------------->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="../../resources/jquery-3.6.js"></script>
    <script src="../../resources/sweetalert.min.js"></script>
    <!-- <script src="../../resources/jquery-3.5.1.slim.min.js"></script> -->
    <script src="../../resources/popper.min.js"></script>
    <script src="../../resources/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../resources/datatables/js/dataTables.min.js"></script>
    <script src="../../resources/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../resources/datatables/js/dataTables.responsive.min.js"></script>
    <script src="../../resources/datatables/js/responsive.bootstrap.min.js"></script>
    <script src="../../resources/datatables/js/buttons.dataTables.min..js"></script>
    <script src="../../resources/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="../../resources/datatables/js/pdfmake.min.js"></script>
    <script src="../../resources/datatables/js/vfs_fonts.min.js"></script>
    <script src="../../resources/datatables/js/jszip.min.js"></script>
    <script src="../../resources/datatables/js/buttons.html5.min.js"></script>
    <script src="../../resources/datatables/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="../../js/validation2.js"></script>
    <script type="text/javascript" src="../../js/dateTime.js"></script>
    <script type="text/javascript" src="../../js/modalPopup.js"></script>
    <script type="text/javascript" src="../../js/dataTablesLoad.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            /*===================================================================
                                               sidebar toogling start
            ===================================================================*/

            $("#sidebar-collapse-btn").on('click', function() {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });

            $(".more-button,.body-overlay").on('click', function() {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });

            $('.toggle').click(function() {
                $('.toggle').toggleClass('active');
            });

            /*===================================================================
                                   sidebar toogling end
            ===================================================================*/



        });
    </script>
</body>

</html>