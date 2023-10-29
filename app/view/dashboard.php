<?php
session_start();
// print_r($_SESSION["user"]);
// echo $_SESSION["user"][base64_encode("userFname")];
// echo base64_decode($_SESSION["user"][base64_encode("userFname")]);
if(!isset($_SESSION["user"])){
    $msg = "please login first !";
    $msg = base64_encode($msg);
    header("Location: ../view/userLogin.php?response=$msg");
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../../resources/bootstrap/css/bootstrap.min.css" />
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
                <li class="active">
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
                <li>
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
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div id="card-one" class="card card-stats card_one">
                            <div class="card-header">
                                <div class="icon icon-warning">
                                    <span class="material-icons">person</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Users</strong></p>
                                <h3 class="card-title" id="totalUsers">0</h3>
                            <div class="category2">Active <i class="fas fa-user"></i> : <span style="color:black" id="activeUsers">0</span></div>
                            <div class="category3">Deactive <i class="fas fa-user"></i> : <span style="color:black" id="deactiveUsers">0</span></div>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-info">info</i>
                                    <a href="#">See detailed report</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-rose">
                                    <span class="material-icons">shopping_cart</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Orders</strong></p>
                                <h3 class="card-title">102</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-info">local_offer</i>
                                    product-wise sales
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-success">
                                    <span class="material-icons">attach_money</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Revenue</strong></p>
                                <h3 class="card-title">$23,100</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-info">date_range</i>
                                    Weekly Sales
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header">
                                <div class="icon icon-info">
                                    <span class="material-icons">phone_iphone</span>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Products</strong></p>
                                <h3 class="card-title" id="totalProducts">0</h3>
                                <div class="category2">Visible <i class="fas fa-mobile-alt"></i> : <span style="color:black" id="visiProduct">0</span></div>
                                <div class="category3">Hidden <i class="fas fa-mobile-alt"></i> : <span style="color:black" id="hidenProduct">0</span></div>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-info">update</i>
                                    just updated
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-------------------------------------- row-second --------------------------------->
                <div class="row">
                    <div class="col-lg-7 col-md-12">
                        <div class="card" style="min-height:485px">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">Stock Stats</h4>
                                <p class="category">New Stocks on 15th December, 2020</p>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table nowrap table-hover">
                                        <thead class="text-primary">
                                            <tr>
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Redmi Note 9</td>
                                                <td>Phones</td>
                                                <td>40</td>
                                                <td>39,000</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Redmi Note 8</td>
                                                <td>Phones</td>
                                                <td>41</td>
                                                <td>40,000</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Redmi Note 8</td>
                                                <td>Phones</td>
                                                <td>41</td>
                                                <td>40,000</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Redmi Note 8</td>
                                                <td>Phones</td>
                                                <td>41</td>
                                                <td>40,000</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Redmi Note 8</td>
                                                <td>Phones</td>
                                                <td>41</td>
                                                <td>40,000</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Redmi Note 8</td>
                                                <td>Phones</td>
                                                <td>41</td>
                                                <td>40,000</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Redmi Note 8</td>
                                                <td>Phones</td>
                                                <td>41</td>
                                                <td>40,000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-12">
                        <div class="card" style="min-height:485">
                            <div class="card-header card-header-text">
                                <h4 class="card-title">activities</h4>
                            </div>

                            <div class="card-content">
                                <div class="steamline">
                                    <div class="sl-item sl-primary">
                                        <div class="sl-content">
                                            <small class="text-muted">5 min Ago</small>
                                            <p>Supun has just ordered a Redmi note 9</p>
                                        </div>
                                    </div>

                                    <div class="sl-item sl-danger">
                                        <div class="sl-content">
                                            <small class="text-muted">25 min Ago</small>
                                            <p>Supun has just ordered a Redmi note jbl headset</p>
                                        </div>
                                    </div>

                                    <div class="sl-item sl-success">
                                        <div class="sl-content">
                                            <small class="text-muted">25 min Ago</small>
                                            <p>Supun has just ordered a Redmi note 9</p>
                                        </div>
                                    </div>

                                    <div class="sl-item sl-success">
                                        <div class="sl-content">
                                            <small class="text-muted">58 min Ago</small>
                                            <p>Supun has just ordered a Redmi note 8</p>
                                        </div>
                                    </div>

                                    <div class="sl-item sl-warning">
                                        <div class="sl-content">
                                            <small class="text-muted">3 min Ago</small>
                                            <p>Supun has just ordered a Redmi note 8 pro</p>
                                        </div>
                                    </div>

                                    <div class="sl-item">
                                        <div class="sl-content">
                                            <small class="text-muted">36 min Ago</small>
                                            <p>Supun has just ordered a Redmi note 9 pro</p>
                                        </div>
                                    </div>
                                </div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script src="../../resources/sweetalert.min.js"></script>
    <!-- <script src="../../resources/jquery-3.5.1.slim.min.js"></script> -->
    <script src="../../resources/popper.min.js"></script>
    <script src="../../resources/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../resources/jquery-3.6.js"></script>
    <script type="text/javascript" src="../../js/validation.js"></script>
    <script type="text/javascript" src="../../js/dashboard.js"></script>
    <script type="text/javascript" src="../../js/dateTime.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

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

        });
    </script>

    <!-- //cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css -->
    <!-- //cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js -->
</body>

</html>