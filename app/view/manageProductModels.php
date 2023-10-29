<?php
session_start();
include_once '../model/productModel.php';
$productObj = new product();
$productId = base64_decode($_REQUEST['id']);
$productModRes = $productObj->getAllPhoneModelById($productId);
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
    <link rel="stylesheet" type="text/css" href="../../resources/bootstrap-select/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../../resources/selectator/css/fm.selectator.jquery.css" />
    <link rel="stylesheet" type="text/css" href="../../resources/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">

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
                <li>
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
                <li class="active">
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
                <li>
                    <span>
                        <a href="../controller/loginController.php?status=logout" class="btn btn-outline-success log-out-btn"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
                    </span>
                </li>
            </ul>
        </nav>
        <!-- side bar end -->

        <!-- Filter bar start  -->

        <nav class="filterbar" id="filterbar">
            <div class="filter-box">
                <div class="filterbar-header">
                    Filter Table
                </div>
                <div class="filter-form">
                    <form name="filterModelForm" id="filterModelForm">

                        <div class="form-row">
                            <div class="form-group col-md">
                                <div class="filter-field-head">Visible Columns</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md">
                                <select id="column_name2" name="column_name2" class="form-control selectpicker" multiple>
                                    <option value="0">Id</option>
                                    <option value="1">Model Image</option>
                                    <option value="2">Model Name / Number</option>
                                    <option value="3">Action</option>
                                    <option value="4">Status</option>
                                </select>
                            </div>
                        </div>
                        <!--------------------------- product status filter Start -------------------------->
                        <div class="form-row">
                            <div class="form-group col-md">
                                <div class="filter-field-head">Status</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="pModstateF1" name="pModstate" value="" checked>
                                <label class="form-check-label" for="pStateF1">All Products</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="pModstate2" name="pModstate" value="1">
                                <label class="form-check-label" for="pModstate2">Visible Products</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="pModstate3" name="pModstate" value="0">
                                <label class="form-check-label" for="pModstate3">Hidden Products</label>
                            </div>
                        </div>

                        <!--------------------------- product status filter End -------------------------->

                        <div class="form-row">
                            <div class="form-group col-md">
                                <button type="button" class="btn btn-success filter-btn" id="filter-button2">Filter</button>
                                <button type="reset" class="btn btn-secondary filter-btn" id="filter-reset2">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div>
                <a class="filter-toogle btn btn-success" id="filterbar-collapse-btn" type="button" data-toggle="tooltip" data-placement="left" title="Filter">
                    <i class="fa fa-filter"></i>
                </a>
            </div>
            <div>
        </nav>


        <!-- Filter bar end -->


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
                   
                    <a href="#" class="navbar-brand">Product Management</a>
                    
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
                <nav>
                    <ol class="breadcrumb breadcrumb-color rounded-0">
                        <li class="breadcrumb-item"><a href="productManagement.php">Product Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Product Models</li>
                    </ol>
                </nav>
            </div>

            <!---------------------- Main Content start ----------------------->
            <div class="main-content">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="addProductModelModal.php?id=<?php echo base64_encode($productId); ?>" class="btn btn-success li-modal btn-size" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-plus-square"></i>&nbsp;Add Model</a>
                                <a href="manageFeatures.php?id=<?php echo base64_encode($productId); ?>" class="btn btn-success card-btn btn-size"><i class="fas fa-tasks"></i>&nbsp;Manage Features</a>


                            </div>
                            <div class="card-header">
                                <?php
                                if (isset($_REQUEST['response'])) { ?>
                                    <div class="alert alert-success error-msg2">
                                        <?php //display the error message from login process page
                                        echo base64_decode($_REQUEST['response']);
                                        ?>
                                    </div>
                                <?php  } ?>

                            </div>
                            <div class="card-content">
                                <div><input type="hidden" name="proId" id="proId" value="<?php echo base64_encode($productId); ?>"></div>
                                <!----------------------------------------------------------------------- Product Model Table Start -------------------------------------------------------------------------------------------------->
                                <div class="table-responsive">
                                    <div id="productModelTbReload">
                                        <?php
                                        $productModRes2 = $productObj->getProductBy_id_fromProduct($productId);
                                        if ($row2 = $productModRes2->fetch_assoc()) {
                                            $categoryId = $row2['category_category_id'];
                                            $productModRes3 = $productObj->getCategoryBy_id_fromCategory($categoryId);
                                            $row3 = $productModRes3->fetch_assoc();

                                            if ($row3['category_name'] == "phone" | $row3['category_name'] == "Phone") {

                                                include('common_tables/phoneModelTb.php'); // Phone Models Table

                                            } else if ($row3['category_name'] == "headphone" | $row3['category_name'] == "Headphone") {

                                                include('common_tables/headPhModelTb.php'); // HeadPhone Models Table

                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-------------------------------------------------------------------------------- Product Model Table End ----------------------------------------------------------------------------------------->
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
<script src="../../resources/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="../../resources/selectator/js/fm.selectator.jquery.js"></script>
<script src="../../resources/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
<!-------ck editor js file START---------->
<script src="../../resources/ckeditor 4/ckeditor.js"></script>
<!-------ck editor js file END---------->
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
<script type="text/javascript" src="../../js/validation.js"></script>
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

            /*===================================================================
                                  Filterbar toogling start
            ===================================================================*/

            $("#filterbar-collapse-btn").on('click', function() {
                $('.filterbar').toggleClass('active');
                $('.filter-toogle').toggleClass('active');

            });

            $('#content').click(function(e) {
                $('.filterbar').removeClass('active');
                $('.filter-toogle').removeClass('active');
            });

            /*===================================================================
                                   Filterbar toogling end
            ===================================================================*/

            $('[data-toggle="tooltip"]').tooltip();

            $('#column_name2').selectpicker();
            

            

        });
    </script>


</body>

</html>