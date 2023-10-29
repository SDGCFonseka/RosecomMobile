<?php
session_start();
include_once '../model/productModel.php';
$productObj = new product();
$productId = base64_decode($_REQUEST['id']);
$productCatResult = $productObj->getAllCategory();
// print_r($productId);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../resources/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../resources/datatables/css/dataTables.min.css" />
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../resources/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../../resources/selectator/css/fm.selectator.jquery.css" />

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
                   
                    <a href="#" class="navbar-brand">Dashboard</a>
                   <div class="collapse navbar-collapse d-sm-none d-md-none d-none" id="navbarcollapse">
                        <ul class="nav navbar-nav ml-auto">
                            
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
                        <li class="breadcrumb-item"><a href="manageProductModels.php?id=<?php echo base64_encode($productId); ?>">Manage Product Models</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage Features</li>
                    </ol>
                </nav>
            </div>

            <!---------------------- Main Content start ----------------------->
            <div class="main-content">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="container">
                                    <!---------------------- Feature Form start ----------------------->
                                    <form name="featureForm" id="featureForm" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group text-center col-md">
                                                <h2>Add Feature</h2>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group text-center col-md">
                                                <div style="height:50px" id="featureFormResponse"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Product Category</label>
                                                <select class="form-control" name="fProductCat" id="fProductCat" onchange="fProductCatValid(),showSelection(this.value)">
                                                    <option value="">Please First Select a Product Category</option>
                                                    <?php
                                                    while ($row = $productCatResult->fetch_assoc()) {
                                                        if ($row['category_status'] == 1) {
                                                            $categoryImg = $row['category_image'];
                                                            echo "<option data-left='../../img/category_images/$categoryImg' value=" . $row['category_id'] . ">" . "&nbsp;&nbsp;&nbsp;" . $row['category_name'] . "</option>";
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                                <span class="text-danger error-msg" id="fProdCatErr"></span>

                                            </div>

                                            <div id="loadSelection" class="form-group col-md-6">
                                                <label>Feature Category</label>
                                                <select class="form-control" name="featureCat" id="featureCat" disabled>
                                                    <option value="">Please Select a Feature Category</option>
                                                    

                                                </select>
                                                <span id="featureCatIcon"></span>
                                                <span class="text-danger error-msg" id="featureCatErr"></span>

                                            </div>
                                        </div>
                                        <div class="form-row">

                                            <div id="loadSelection2" class="form-group col-md-6">

                                                <label>Feature Kind</label>
                                                <select class="form-control" name="featureType" id="featureType" disabled>
                                                    <option value="">Please Select a Specification</option>


                                                </select>
                                                <span id="featureTypeIcon"></span>
                                                <span class="text-danger error-msg" id="featureTypeErr"></span>
                                            </div>

                                            <div id="inputFeature" class="form-group col-md-6">
                                                <label>Feature Name</label>
                                                <textarea class="form-control" id="featureName" name="featureName" placeholder="Please type a feature name !" oninput="featureNameValidate()" rows="4" cols="5" disabled></textarea>
                                                <span id="featureNameIcon"></span>
                                                <span class="text-danger error-msg" id="featureNamErr"></span>
                                                <span class="text-danger error-msg" id="featureNamErr2"></span>

                                            </div>
                                        </div>





                                        <div class="form-row">
                                            <div class="form-group col-md-12 text-right">
                                                <button type="button" class="btn btn-outline-primary userform-button" id="feature-form-submit"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
                                                <button type="button" class="btn btn-outline-secondary userform-button" id="feature-form-reset"><i class="fas fa-undo"></i>&nbsp;Clear</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!---------------------- Feature Form end ----------------------->
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">

                                <div class="container-fluid">
                                    <form name="featureFilter" id="featureFilter">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <div class="pl-4 text-left">
                                                    <b>
                                                        <h3>Available Features
                                                    </b></h3>
                                                </div>
                                            </div>
                                            <div class="form-check col-md-1">
                                                <input type="radio" class="form-check-input" id="stateF1" name="stateF" oninput="stateFsearchAll(featureType.value)" disabled>
                                                <label class="form-check-label" for="stateF">Show All</label>
                                            </div>
                                            <div class="form-check col-md-1">
                                                <input type="radio" class="form-check-input" id="stateF2" name="stateF" value="1" oninput="stateFsearch(this.value,featureType.value)" disabled>
                                                <label class="form-check-label" for="stateF">Visible</label>
                                            </div>
                                            <div class="form-check col-md-1">
                                                <input type="radio" class="form-check-input" id="stateF3" name="stateF" value="0" oninput="stateFsearch(this.value,featureType.value)" disabled>
                                                <label class="form-check-label" for="stateF">Hidden</label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" name="searchFeature" id="searchFeature" placeholder="Search Feature >> Feature Specified" onkeyup="showFsearch(this.value,featureType.value)" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="card-content">
                                <!----------------------------------------------------------------------- Feature Table Start -------------------------------------------------------------------------------------------------->
                                <div class="table-responsive">
                                    <div id="featureTbReload">
                                        <!--------------------------------------- FEATURE TABLE LOADING ----------------------------------------->
                                    </div>
                                </div>
                                <!-------------------------------------------------------------------------------- Feature Table End ----------------------------------------------------------------------------------------->
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
    <script src="../../resources/selectator/js/fm.selectator.jquery.js"></script>
    <script type="text/javascript" src="../../js/validation.js"></script>
    <script type="text/javascript" src="../../js/validation2.js"></script>
    <script type="text/javascript" src="../../js/dateTime.js"></script>
    <script type="text/javascript" src="../../js/modalPopup.js"></script>

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