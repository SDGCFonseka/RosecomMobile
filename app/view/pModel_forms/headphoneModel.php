<div class="col-md-12" id="phoneModel">

    <div class="form-row">
        <div class="form-group text-center col-md">
            <h2>Add Headphone Model</h2>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            
                <div class="custom-control custom-switch">
                    <label class="pr-5 text-danger font-weight-bold" for="hdTAreaSwitch">Select</label>
                    <input type="checkbox" class="custom-control-input" id="hdTAreaSwitch" name="hdTAreaSwitch" />
                    <label class="custom-control-label text-danger font-weight-bold" for="hdTAreaSwitch">TextArea</label>
                </div>
            
        </div>
    </div>
    <form name="hdPhoneModelForm" id="hdPhoneModelForm" enctype="multipart/form-data">
        <!--action="../controller/productController.php?status=addProduct" method="post"-->

        <?php
        $productViewResult4 = $productObj->getProductBy_id_fromProduct($productId);
        while ($viewRow = $productViewResult4->fetch_assoc()) {
            $brandId = $viewRow['brand_brand_id'];
            $productViewResult5 = $productObj->getBrandBy_id_fromBrand($brandId);
            $viewRow2 = $productViewResult5->fetch_assoc();
            $categoryId = $viewRow['category_category_id'];
            $productViewResult6 = $productObj->getCategoryBy_id_fromCategory($categoryId);
            $viewRow3 = $productViewResult6->fetch_assoc();
        ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Product Name</label>
                    <input type="text" class="form-control" id="prodDisName" name="prodDisName" value="<?php echo $viewRow['product_name']; ?>" readonly>
                    <span id="prodNameIcon"></span>
                    <span class="text-danger error-msg" id="prodNamErr"></span>
                </div>
                <div class="form-group col-md-6">
                    <label>Product Brand</label>
                    <select class="form-control" name="hdModelBrand" id="hdModelBrand">
                        <?php
                        $brandImg = $viewRow2['brand_image'];
                        echo "<option data-left='../../img/brand_images/$brandImg' value=" . $viewRow2['brand_id'] . ">" . "&nbsp;&nbsp;&nbsp;" . $viewRow2['brand_name'] . "</option>";
                        ?>
                    </select>
                </div>
            </div>
        <?php
        }
        ?>




        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Model Name</label>
                <input type="text" class="form-control" id="hdModelName" name="hdModelName" placeholder="Product Model Name / Number" oninput="validateHdModelName()" maxlength="50">
                <span id="hdModelNmIcon"></span>
                <span class="text-danger error-msg" id="hdModelNmErr"></span>
            </div>

            <div class="form-group col-md-6">

                <label>Product Category</label>
                <select class="form-control" name="hdModelCat" id="hdModelCat">
                    <?php
                    $categoryImg = $viewRow3['category_image'];
                    echo "<option data-left='../../img/category_images/$categoryImg' value=" . $viewRow3['category_id'] . ">" . "&nbsp;&nbsp;&nbsp;" . $viewRow3['category_name'] . "</option>";
                    ?>
                </select>

            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Model Price</label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rs.</div>
                    </div>
                    <input type="number" class="form-control" id="hdModPrice" name="hdModPrice" oninput="validateHdPhoneModPrice()" placeholder="35000.00">
                </div>
                <span id="hdModelPricIcon"></span>
                <span class="text-danger error-msg" id="hdModelPricErr"></span>

            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <input type="hidden" class="form-control" value="<?php echo $productId; ?>" id="hdProdId" name="hdProdId" readonly>
            </div>
        </div>



        <div id="hdTextFields">
            <!------------------------------ Field Heading start ---------------------------------->

            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Appearance</div>
                </div>
            </div>

            <!------------------------------ Field Heading end ---------------------------------->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Headphone Type</label>
                    <select class="form-control" name="headphType" id="headphType">
                        <option value="">Select a HeadPhone Type</option>
                        <?php
                        $fResult = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 63) {
                                if ($fRow['feature_status'] == 1) {
                                    echo '<option value="' . $fRow["feature_name"] . '">' . $fRow["feature_name"] . '</option>';
                                    
                                }
                            }
                        }

                        ?>

                    </select>

                </div>

                <div class="form-group col-md-6">
                    <label>Colors</label>
                    <select class="form-control" name="headphColor" id="headphColor">
                        <option value="">Select Available Colors</option>
                        <?php
                        $fResult = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 52) {
                                if ($fRow['feature_status'] == 1) {
                                    echo '<option value="' . $fRow["feature_name"] . '">' . $fRow["feature_name"] . '</option>';
                                }
                            }
                        }

                        ?>

                    </select>

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Styles</label>
                    <select class="form-control" name="headphStyle" id="headphStyle">
                        <option value="">Select Available Styles</option>
                        <?php
                        $fResult = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 53) {
                                if ($fRow['feature_status'] == 1) {
                                    echo '<option value="' . $fRow["feature_name"] . '">' . $fRow["feature_name"] . '</option>';
                                }
                            }
                        }

                        ?>

                    </select>

                </div>
                <div class="form-group col-md-6">
                    <!-- EMPTY COL -->
                </div>

            </div>
            <!------------------------------ Field Heading start ---------------------------------->

            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Body</div>
                </div>
            </div>

            <!------------------------------ Field Heading end ---------------------------------->

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Dimension</label>
                    <select class="form-control" name="headphDimen" id="headphDimen">
                        <option value="">Select a Dimension</option>
                        <?php
                        $fResult = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 54) {
                                if ($fRow['feature_status'] == 1) {
                                    echo '<option value="' . $fRow["feature_name"] . '">' . $fRow["feature_name"] . '</option>';
                                }
                            }
                        }

                        ?>

                    </select>

                </div>

                <div class="form-group col-md-6">
                    <label>Material</label>
                    <select class="form-control" name="headphMaterial" id="headphMaterial">
                        <option value="">Select Available Materials</option>
                        <?php
                        $fResult = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 55) {
                                if ($fRow['feature_status'] == 1) {
                                    echo '<option value="' . $fRow["feature_name"] . '">' . $fRow["feature_name"] . '</option>';
                                }
                            }
                        }

                        ?>

                    </select>

                </div>
            </div>

            <!------------------------------ Field Heading start ---------------------------------->

            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Frequency Operated</div>
                </div>
            </div>

            <!------------------------------ Field Heading end ---------------------------------->

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Frequency Response</label>
                    <select class="form-control" name="headphFresponse" id="headphFresponse">
                        <option value="">Select Frequency Response</option>
                        <?php
                        $fResult = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 56) {
                                if ($fRow['feature_status'] == 1) {
                                    echo '<option value="' . $fRow["feature_name"] . '">' . $fRow["feature_name"] . '</option>';
                                }
                            }
                        }

                        ?>

                    </select>

                </div>

                <div class="form-group col-md-6">
                    <label>Frequency Response (Active)</label>
                    <select class="form-control" name="headphFresponseA" id="headphFresponseA">
                        <option value="">Select Frequency Response (Active)</option>
                        <?php
                        $fResult = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 57) {
                                if ($fRow['feature_status'] == 1) {
                                    echo '<option value="' . $fRow["feature_name"] . '">' . $fRow["feature_name"] . '</option>';
                                }
                            }
                        }

                        ?>

                    </select>

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Frequency Response (BT Communication)</label>
                    <select class="form-control" name="headphFresponseBt" id="headphFresponseBt">
                        <option value="">Select BT Communication</option>
                        <?php
                        $fResult = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 58) {
                                if ($fRow['feature_status'] == 1) {
                                    echo '<option value="' . $fRow["feature_name"] . '">' . $fRow["feature_name"] . '</option>';
                                }
                            }
                        }

                        ?>

                    </select>

                </div>

                <div class="form-group col-md-6">
                    <label>Sensitivities</label>
                    <select class="form-control" name="headphSensivity" id="headphSensivity">
                        <option value="">Select Available Sensitivities</option>
                        <?php
                        $fResult = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 59) {
                                if ($fRow['feature_status'] == 1) {
                                    echo '<option value="' . $fRow["feature_name"] . '">' . $fRow["feature_name"] . '</option>';
                                }
                            }
                        }

                        ?>

                    </select>

                </div>
            </div>

            <!------------------------------ Field Heading start ---------------------------------->

            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Comms</div>
                </div>
            </div>

            <!------------------------------ Field Heading end ---------------------------------->

            <div class="form-row">


                <div class="form-group col-md-6">
                    <label>NFC</label>
                    <select class="form-control" name="headphNfc" id="headphNfc">
                        <option value="">Select NFC feature</option>
                        <?php
                        $fResult = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 59) {
                                if ($fRow['feature_status'] == 1) {
                                    echo '<option value="' . $fRow["feature_name"] . '">' . $fRow["feature_name"] . '</option>';
                                }
                            }
                        }

                        ?>

                    </select>

                </div>

                <div class="form-group col-md-6">
                    <label>Bluetooth</label>
                    <select class="form-control" name="headphBt" id="headphBt">
                        <option value="">Select BT Communication</option>
                        <?php
                        $fResult = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 60) {
                                if ($fRow['feature_status'] == 1) {
                                    echo '<option value="' . $fRow["feature_name"] . '">' . $fRow["feature_name"] . '</option>';
                                }
                            }
                        }

                        ?>

                    </select>

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Wifi</label>
                    <select class="form-control" name="headphWifi" id="headphWifi">
                        <option value="">Select Wifi Feature</option>
                        <?php
                        $fResult = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 61) {
                                if ($fRow['feature_status'] == 1) {
                                    echo '<option value="' . $fRow["feature_name"] . '">' . $fRow["feature_name"] . '</option>';
                                }
                            }
                        }

                        ?>

                    </select>

                </div>
            </div>


        </div>

        <div class="form-row" id="textEdit">
            <div class="form-group col-md-12">
                <label>Product Description</label>
                <textarea class="form-control" id="hdModDescrip" name="hdModDescrip"></textarea>
                <span id="hdModDesIcon"></span>
                <span class="text-danger error-msg" id="contactErr1"></span>

            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <div class="prod-field-head">Product Model Images</div>
            </div>
        </div>
        <div class="form-row">
            <div class="file-upload">
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )"><i class="fas fa-plus-circle"></i> Add Images</button>

                <div class="image-upload-wrap">
                    <input class="file-upload-input" type='file' id="hdModImg" name="hdModelImg[]" oninput="hdModImgValidate()" accept="image/*" multiple />
                    <div class="drag-text">
                        <h3>Drag and drop a file or select add Image</h3>
                        <div class="h4 text-danger font-weight-bold" id="phModImgErr"></div>
                    </div>
                </div>
                <div class="container">

                    <div class="file-upload-content row">

                    </div>

                </div>
            </div>
        </div>

        <input type="hidden" class="form-control" value="<?php echo date('Y-m-d'); ?>" id="regDate" name="regDate" readonly>
        <div class="form-row">
            <div class="form-group col-md-12 text-right">
                <button type="button" class="btn btn-outline-primary userform-button" id="hpModel-form-submit"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
                <button type="reset" class="btn btn-outline-secondary userform-button" id="hpModel-form-reset"><i class="fas fa-undo"></i>&nbsp;Clear</button>
            </div>
        </div>
    </form>


</div>
<script>
    CKEDITOR.replace('hdModDescrip');
    CKEDITOR.instances['hdModDescrip'].setReadOnly(true);
</script>