<?php
session_start();
include_once '../model/stockModel.php';
$stockObj = new stock();
/*=============== set date max and min START ==============*/
$ctid = time();
$max = date("Y-m-d", $ctid);
$sec60 = (60 * 60 * 24 * 365 * 60) + 60 * 60 * 24 * 15;
$pptid = $ctid - $sec60;
$min = Date("Y-m-d", $pptid);
/*=============== set date max and min END ==============*/
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
    <link rel="stylesheet" href="../../resources/toastr/build/toastr.min.css" />

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
                    <a href="#">
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

                <li class="active">
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

                    <a href="#" class="navbar-brand">Stock Management</a>

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
                        <li class="breadcrumb-item"><a href="stockManagement.php">Stock Management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Stock</li>
                    </ol>
                </nav>
            </div>

            <!---------------------- Main Content start ----------------------->
            <div class="main-content">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">


                            <div class="card-content">
                                <div class="container-fluid">

                                    <!---------------------- Feature Form start ----------------------->
                                    <form name="stockForm" id="stockForm" enctype="multipart/form-data">
                                        <!-- action="../controller/stockController.php?status=addStockGrn_Checkin" method="post"  -->
                                        <div class="form-row">
                                            <div class="form-group col-md">
                                                <h2>Add Stocks(GRN)</h2>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md" id="stockCheckinResp">

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <?php
                                            $grnIdDisplay = $stockObj->getGrn_id_toDisplay(); //get latest id field value from grn   
                                            while ($grnIdView = $grnIdDisplay->fetch_assoc()) {

                                            ?>
                                                <div class="form-group col-md-2"><label for="grnId">GRN Id. *</label></div>
                                                <div class="form-group col-md-4"><input type="text" value="<?php echo $grnIdView['AUTO_INCREMENT']; ?>" class="form-control" name="grnId" id="grnId" readonly /></div>
                                            <?php
                                            }
                                            ?>
                                            <div class="form-group col-md-2"><label for="refId">Ref Id. *</label></div>
                                            <div class="form-group col-md-4">
                                                <input type="text" class="form-control" name="refId" id="refId" oninput="grnReferenceId()" placeholder="Reference ID of GRN" />
                                                <span id="stockRfIcon"></span>
                                                <span class="text-danger error-msg" id="stockRfErr"></span>
                                            </div>

                                        </div>
                                        <div class="form-row">

                                            <div class="form-group col-md-2"><label for="resDate">Received date *</label></div>
                                            <div class="form-group col-md-4">
                                                <input type="date" class="form-control" max="<?php echo $max; ?>" min="<?php echo $min; ?>" name="resDate" id="resDate" oninput="stockRecDate()" />

                                                <span class="text-danger error-msg" id="resDateErr"></span>
                                            </div>
                                            <div class="form-group col-md-2"><label for="supplierId">Supplier *</label></div>
                                            <div class="form-group col-md-4">
                                                <select class="form-control" name="supplierId" id="supplierId" onchange="supplierSt()">
                                                    <option value="">Please Select a Supplier</option>
                                                    <?php
                                                    $suppResult = $stockObj->getAllSupplier();
                                                    while ($row = $suppResult->fetch_assoc()) {
                                                        if ($row['supplier_status'] == 1) {

                                                            echo "<option data-left='../../img/interface_images/supplier.png'  value=" . $row['supplier_id'] . ">" . $row['company_name'] . "&nbsp;" . "(" . $row['supplier_name'] . ")" . "</option>";
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                                <span id="supplierStIcon"></span>
                                                <span class="text-danger error-msg" id="supplierStErr"></span>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-2"><label for="stockCat2">Category *</label></div>
                                            <div class="form-group col-md-4">
                                                <select class="form-control" name="stockCat2" id="stockCat2" onchange="showSelection3(this.value),categoryValid()">
                                                    <option value="">Please First Select a Product Category</option>
                                                    <?php
                                                    $productCatResult2 = $stockObj->getAllCategory();
                                                    while ($row = $productCatResult2->fetch_assoc()) {
                                                        if ($row['category_status'] == 1) {
                                                            $categoryImg = $row['category_image'];
                                                            echo "<option data-left='../../img/category_images/$categoryImg' value=" . $row['category_id'] . ">" . "&nbsp;&nbsp;&nbsp;" . $row['category_name'] . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <span class="text-danger error-msg" id="categoryErr"></span>
                                            </div>
                                            <div class="form-group col-md-2"><label>Brand *</label></div>
                                            <div id="loadSelection3" class="form-group col-md-4">
                                                <select class="form-control" name="stockBrand2" id="stockBrand2" onchange="brandValid()" readonly>
                                                    <option value="">Please Select a Product Brand</option>
                                                </select>
                                                <span id="productBrIcon"></span>
                                                <span class="text-danger error-msg" id="brandErr"></span>
                                            </div>
                                        </div>
                                        <div class="form-row">

                                            <div class="form-group col-md-2"><label for="grnId">Product Name *</label></div>
                                            <div id="loadSelection4" class="form-group col-md-4">
                                                <select class="form-control" name="stockNm2" id="stockNm2" onchange="productValid()" readonly>
                                                    <option value="">Please Select a Product </option>
                                                </select>
                                                <span class="text-danger error-msg" id="stockNmErr"></span>
                                            </div>
                                            <div class="form-group col-md-2"><label for="grnId">Model Name *</label></div>
                                            <div id="loadSelection5" class="form-group col-md-4">
                                                <select class="form-control" name="stockModel2" id="stockModel2" onchange="modelValid()" readonly>
                                                    <option value="">Please Select a Product Model</option>
                                                </select>
                                                <span id="productNmIcon"></span>
                                                <span class="text-danger error-msg" id="stockModErr"></span>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-2"><label for="colorPick">Color Picker *</label></div>
                                            <div class="form-group inline col-md-2"><input type="color" class="form-control" name="colorPick" id="colorPick" value="#ffffff" oninput="colorPickImgVal()" /></div>
                                            <div class="form-group col-md-1">
                                                <div class="text-center"><button class="btn btn-info" type="button" id="defCol"><i class="fas fa-undo"></i></button></div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <div class="text-center"><b>OR</b></div>
                                            </div>
                                            <div class="form-group col-md-2"><label for="colorImg">Color Image *</label></div>
                                            <div class="form-group col-md-2">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" accept="image/*" name="colorImg" id="colorImg" oninput="colorPicValid(),colorPickImgVal()">
                                                    <label class="custom-file-label" id="colImgInput">Choose file</label>
                                                    <span id="colImgIcon"></span>
                                                </div>
                                                <span class="text-danger error-msg" id="colorImgErr"></span>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <img id="prev_colorImg" width="80px" height="80px" src="../../img/interface_images/formDefaultImg.jpg" style="border-radius:5%;" />
                                            </div>
                                        </div>
                                        <div class="form-row">
                                        <div class="form-group col-md-2">
                                            
                                        </div>
                                        <div class="form-group col-md-10">
                                            <span class="text-danger error-msg" id="colorImgPickErr"></span>
                                        </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-2"><label>Received Quantity *</label></div>
                                            <div class="form-group col-md-2">
                                                <div class="input-group mb-2">
                                                    <input type="number" class="form-control price-control" id="stockQty" name="stockQty" placeholder="Stock Qty." oninput="stockQtyValidate()">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">Pcs.</div>
                                                    </div>
                                                </div>
                                                <span id="stockQtyIcon"></span>
                                                <span class="text-danger error-msg" id="stockQtyErr"></span>
                                            </div>
                                            <div class="form-group col-md-2"><label>Cost Per Unit *</label></div>
                                            <div class="form-group col-md-2">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Rs.</div>
                                                    </div>
                                                    <input type="number" class="form-control price-control" id="costPerUnit" name="costPerUnit" placeholder="Cost Per Unit" oninput="sCostPunitValidate()">

                                                </div>
                                                <span id="costPunitIcon"></span>
                                                <span class="text-danger error-msg" id="costPunitErr"></span>
                                            </div>
                                            <div class="form-group col-md-2"><label>Amount Payed *</label></div>
                                            <div class="form-group col-md-2">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Rs.</div>
                                                    </div>
                                                    <input type="number" class="form-control" id="amountPaid" value="0.00" name="amountPaid" placeholder="Amount Payed" readonly>

                                                </div>
                                                <span id="amoPaidIcon"></span>
                                                <span class="text-danger error-msg" id="amoPaidErr"></span>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-2"><label>Regular Price*</label></div>
                                            <div class="form-group col-md-2">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Rs.</div>
                                                    </div>
                                                    <input type="number" class="form-control" id="regPrice" name="regPrice" placeholder="Regular Price" oninput="regPriceValidate()">

                                                </div>
                                                <span id="regPriceIcon"></span>
                                                <span class="text-danger error-msg" id="regPriceErr"></span>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12 text-right">
                                                <button type="button" class="btn btn-outline-primary userform-button" id="stock-form-addTb"><i class="fas fa-plus"></i>&nbsp;Add</button>
                                                <button type="button" class="btn btn-outline-secondary userform-button" id="stock-form-reset"><i class="fas fa-undo"></i>&nbsp;Clear</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="card" id="stockTbCal">
                            <div class="card-content">

                                <form action="../controller/stockController.php?status=addStockGrn" id="stockCart" name="stockCart" class="stockCart" method="post" enctype="multipart/form-data">
                                    <table id="stockCalTb" class="table table-striped table-responsive-sm table-responsive-md" width="100%">
                                        <thead>
                                            <tr class="tb-head-style">
                                                <th scope="col"><i class="fas fa-times"></i></th>
                                                <th scope="col">GRN Id</th>
                                                <th scope="col">Ref Id</th>
                                                <th scope="col">Model Image</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Model Name</th>
                                                <th scope="col">Received date</th>
                                                <th scope="col">Supplier</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Brand</th>
                                                <th scope="col">Color</th>
                                                <th scope="col">Cost Per Unit</th>
                                                <th scope="col">Regular Price</th>
                                                <th scope="col">Received Qty.</th>
                                                <th scope="col">Amount Payed</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>

                                        <tbody id="stBodyload">


                                            <?php

                                            $final_tot = 0;
                                            if (!empty($_SESSION['cart'])) {
                                                $count = 0;
                                                foreach ($_SESSION['cart'] as $key => $value) {
                                                    $count++;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td><input type="text" name="grnId2[]" id="grnId2" value="<?php echo base64_decode($value[base64_encode('grn_id')]); ?>" readonly /></td>
                                                        <td><input type="text" name="refId2" id="refId2" value="<?php echo base64_decode($value[base64_encode('ref_id')]); ?>" readonly /></td>
                                                        <td>
                                                            <?php
                                                            if (base64_decode($value[base64_encode('category_id')]) == 1) {
                                                                $modelId = base64_decode($value[base64_encode('model_id')]);
                                                                $stockModImgRes = $stockObj->getHeadphoneModelImages_ById($modelId);
                                                                if ($viewRow = $stockModImgRes->fetch_assoc()) {
                                                                    $hpImage = $viewRow['headphone_model_image_name'];
                                                                    echo '<img src="../../img/product_images/product_models/headphone_models/' . $hpImage . '" width="auto" height="60px" />';
                                                                }
                                                            } else if (base64_decode($value[base64_encode('category_id')]) == 2) {
                                                                $modelId =  base64_decode($value[base64_encode('model_id')]);
                                                                $stockModImgRes = $stockObj->getPhoneModelImages_ById($modelId);
                                                                if ($viewRow = $stockModImgRes->fetch_assoc()) {
                                                                    $phImage = $viewRow['phone_model_image_name'];
                                                                    echo '<img src="../../img/product_images/product_models/phone_models/' . $phImage . '" width="auto" height="60px" />';
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <?php
                                                        $productId = base64_decode($value[base64_encode('product_id')]);
                                                        $stockProdRes = $stockObj->getProductBy_id_fromProduct($productId);
                                                        if ($viewRow = $stockProdRes->fetch_assoc()) {
                                                        ?>
                                                            <td>
                                                                <input type="hidden" name="productId2[]" id="productId2" value="<?php echo base64_decode($value[base64_encode('product_id')]); ?>" readonly />
                                                                <div><?php echo $viewRow['product_name']; ?></div>
                                                            </td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <td>
                                                            <input type="hidden" name="modelId2[]" id="modelId2" value="<?php echo base64_decode($value[base64_encode('model_id')]); ?>" readonly />
                                                            <?php
                                                            if (base64_decode($value[base64_encode('category_id')]) == 1) {
                                                                $modelId = base64_decode($value[base64_encode('model_id')]);
                                                                $stockModNmRes = $stockObj->getHphoneModBy_id_fromHphoneMod($modelId);
                                                                if ($viewRow = $stockModNmRes->fetch_assoc()) {
                                                                    echo $viewRow['headphone_model_name'];
                                                                }
                                                            } else if (base64_decode($value[base64_encode('category_id')]) == 2) {
                                                                $modelId = base64_decode($value[base64_encode('model_id')]);
                                                                $stockModNmRes = $stockObj->getPhoneModABy_id_fromgetphoneModA($modelId);
                                                                if ($viewRow = $stockModNmRes->fetch_assoc()) {
                                                                    echo $viewRow['phone_model_a_name'];
                                                                }
                                                            }

                                                            ?>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="resDate2[]" id="resDate2" value="<?php echo base64_decode($value[base64_encode('res_date')]); ?>" readonly />
                                                            <input type="hidden" name="resDate3" id="resDate3" value="<?php echo base64_decode($value[base64_encode('res_date')]); ?>" readonly />
                                                        <td><input type="text" name="supplierId2" id="supplierId2" value="<?php echo base64_decode($value[base64_encode('supplier_id')]); ?>" readonly /></td>
                                                        <td><input type="text" name="categoryId2[]" id="categoryId2" value="<?php echo base64_decode($value[base64_encode('category_id')]); ?>" readonly /></td>
                                                        <td><input type="text" name="brandId2[]" id="brandId2" value="<?php echo base64_decode($value[base64_encode('brand_id')]); ?>" readonly /></td>
                                                        <td><input type="text" name="color[]" id="color2" value="<?php echo base64_decode($value[base64_encode('color')]); ?>" readonly /></td>
                                                        <td><input type="text" name="costPunit2[]" id="costPunit2" value="<?php echo base64_decode($value[base64_encode('cost_p_unit')]); ?>" readonly /></td>
                                                        <td><input type="text" name="regPrice2[]" id="regPrice2" value="<?php echo base64_decode($value[base64_encode('reg_price')]); ?>" readonly /></td>
                                                        <td><input type="number" name="stockQty2[]" id="stockQty2" value="<?php echo base64_decode($value[base64_encode('stock_qty')]); ?>" readonly /></td>
                                                        <td><input type="text" name="amoPaid2[]" id="amoPaid2" value="<?php echo base64_decode($value[base64_encode('amount_paid')]); ?>" readonly /></td>
                                                        <td><button type="button" onclick="removeScrtItem('<?php echo base64_encode(base64_decode($value[base64_encode('model_id')])); ?>')" class="btn btn-danger"><i class="fas fa-minus fa-1x"></i></button></td>
                                                    </tr>

                                            <?php

                                                    $final_tot = $final_tot + base64_decode($value[base64_encode('amount_paid')]);
                                                }

                                                //active button
                                                $output = '';
                                                $output .= '<button type="button" class="btn btn-outline-primary userform-button" id="stock-cart-paySave" onclick="submitScart()"><i class="fas fa-save"></i>&nbsp;Save & Pay</button>';
                                                $output .= '<button type="button" class="btn btn-outline-danger userform-button" id="stock-cart-clear" onclick="removeAllScrtItem()"><i class="fas fa-undo"></i>&nbsp;Clear</button>';
                                            } else {
                                                //disabled button
                                                $output = '';
                                            }

                                            ?>


                                        </tbody>

                                    </table>
                                    <div class="col-md-12">
                                        <div class="text-right"><b>Total Price (Rs.):</b><span id="totalPrice"></span><input style="border:none;background:none;" type="text" id="sTotalPrice" name="sTotalPaid" value="<?php echo number_format($final_tot, 2) ?>" readonly /></div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-12">
                                <div class="text-right m-3" id="stockCrtBtn">
                                    <?php
                                    echo $output; //button display
                                    ?>
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
    <script src="../../resources/toastr/build/toastr.min.js"></script>
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