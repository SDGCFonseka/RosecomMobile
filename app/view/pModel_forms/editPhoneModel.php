<div class="col-md-12">

    <form name="editPhoneModelForm" id="editPhoneModelForm" enctype="multipart/form-data">
        <!--action="../controller/productController.php?status=addProduct" method="post"-->
        <div class="form-row">
            <div class="form-group text-center col-md">
                <h2>Edit Phone Model</h2>
            </div>
        </div>
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
                    <select class="form-control" name="phoneModelBrand" id="phoneModelBrand">
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
        <?php

        $phoneModEditView = $productObj->getPhoneModABy_id_fromgetphoneModA($modelId);
        while ($viewRow4 = $phoneModEditView->fetch_assoc()) {
        ?>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Model Name</label>
                    <input type="text" class="form-control" id="phoneModelName" name="phoneModelName" value="<?php echo $viewRow4['phone_model_a_name']; ?>" placeholder="Product Model Name / Number" oninput="validatePhoneModelName()" maxlength="50">
                    <span id="phModelNmIcon"></span>
                    <span class="text-danger error-msg" id="phModelNmErr"></span>
                    <span class="text-danger error-msg" id="phModelNmErr2"></span>
                </div>

                <div class="form-group col-md-6">

                    <label>Product Category</label>
                    <select class="form-control" name="phoneModelCat" id="phoneModelCat">
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
                        <input type="number" class="form-control" id="phoneModPrice" name="phoneModPrice" oninput="validatePhoneModPrice()" value="<?php echo $viewRow4['phone_model_a_price']; ?>" placeholder="350000">
                    </div>
                    <span id="phModelPricIcon"></span>
                    <span class="text-danger error-msg" id="phModelPricErr"></span>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="hidden" class="form-control" value="<?php echo $productId; ?>" id="productId" name="productId" readonly>
                </div>
                <div class="form-group col-md-6">
                    <input type="hidden" class="form-control" value="<?php echo $modelId; ?>" id="phoneModAid" name="phoneModAid" readonly>
                </div>
            </div>
            <!------------------------------ Field Heading start ---------------------------------->
            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Network</div>
                </div>
            </div>
            <!------------------------------ Field Heading end ---------------------------------->

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Technology</label>
                    <select class="form-control" name="phoneModTech" id="phoneModTech">
                        <option value="">Select a Technology</option>
                        <?php
                        $fResult = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 3) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_technology'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>

                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>2G Bands</label>
                    <select class="form-control" name="band2g" id="band2g">
                        <option value="">Select a 2G Band</option>
                        <?php
                        $fResult2 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult2->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 4) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_2gbands'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }
                        ?>
                    </select>

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>3G Bands</label>
                    <select class="form-control" name="band3g" id="band3g">
                        <option value="">Select a 3G Band</option>
                        <?php
                        $fResult3 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult3->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 5) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_3gbands'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }


                        ?>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>4G Bands</label>
                    <select class="form-control" name="band4g" id="band4g">
                        <option value="">Select a 4G Band</option>
                        <?php
                        $fResult4 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult4->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 6) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_4gbands'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>5G Bands</label>
                    <select class="form-control" name="band5g" id="band5g">
                        <option value="">Select a 5G Band</option>
                        <?php
                        $fResult5 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult5->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 7) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_5gbands'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Speed</label>
                    <select class="form-control" name="phoneModSpeed" id="phoneModSpeed">
                        <option value="">Select a Speed</option>
                        <?php
                        $fResult45 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult45->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 64) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_speed'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
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
                    <div class="prod-field-head">Launched</div>
                </div>
            </div>
            <!------------------------------ Field Heading end ---------------------------------->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Announced</label>
                    <select class="form-control" name="phoneModAnnounce" id="phoneModAnnounce">
                        <option value="">Select Announced Date</option>
                        <?php
                        $fResult46 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult46->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 8) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_announced'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>

                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Status</label>
                    <select class="form-control" name="phoneModState" id="phoneModState">
                        <option value="">Select Status</option>
                        <?php
                        $fResult6 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult6->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 9) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_state'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Body</div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Dimension</label>
                    <select class="form-control" name="phoneModDimen" id="phoneModDimen">
                        <option value="">Select a Dimension</option>
                        <?php
                        $fResult7 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult7->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 10) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_dimension'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Weight</label>
                    <select class="form-control" name="phoneModWeight" id="phoneModWeight">
                        <option value="">Select a Weight</option>
                        <?php
                        $fResult8 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult8->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 11) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_weight'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>SIM</label>
                    <select class="form-control" name="phoneModSim" id="phoneModSim">
                        <option value="">Select a SIM</option>
                        <?php
                        $fResult9 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult9->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 12) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_sim'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
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

            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Display</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Type</label>
                    <select class="form-control" name="phoneModType" id="phoneModType">
                        <option value="">Select a Type</option>
                        <?php
                        $fResult10 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult10->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 13) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_type'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Size</label>
                    <select class="form-control" name="phoneModSize" id="phoneModSize">
                        <option value="">Select a Size</option>
                        <?php
                        $fResult11 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult11->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 14) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_size'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Resolution</label>
                    <select class="form-control" name="phoneModResolution" id="phoneModResolution">
                        <option value="">Select a Resolution</option>
                        <?php
                        $fResult12 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult12->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 15) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_resolution'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Protection</label>
                    <select class="form-control" name="phoneModProtect" id="phoneModProtect">
                        <option value="">Select a Protection</option>
                        <?php
                        $fResult13 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult13->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 16) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_protection'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Platform</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>OS</label>
                    <select class="form-control" name="phoneModOs" id="phoneModOs">
                        <option value="">Select a OS</option>
                        <?php
                        $fResult14 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult14->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 17) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_os'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Chipset</label>
                    <select class="form-control" name="phoneModChip" id="phoneModChip">
                        <option value="">Select a Chipset</option>
                        <?php
                        $fResult15 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult15->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 18) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_chipset'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>CPU</label>
                    <select class="form-control" name="phoneModCpu" id="phoneModCpu">
                        <option value="">Select a CPU</option>
                        <?php
                        $fResult16 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult16->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 19) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_cpu'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>GPU</label>
                    <select class="form-control" name="phoneModGpu" id="phoneModGpu">
                        <option value="">Select a GPU</option>
                        <?php
                        $fResult17 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult17->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 20) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_gpu'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Memory</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Card Slot</label>
                    <select class="form-control" name="phoneModMem" id="phoneModMem">
                        <option value="">Select a CardSlot</option>
                        <?php
                        $fResult18 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult18->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 1) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_cardslot'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Internal</label>
                    <select class="form-control" name="phoneModInternal" id="phoneModInternal">
                        <option value="">Select a Internal</option>
                        <?php
                        $fResult19 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult19->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 2) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_internal'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Main Camera</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Camera Setup</label>
                    <select class="form-control" name="phoneModMcamSetup" id="phoneModMcamSetup">
                        <option value="">Select Camera Setup / No. of Cam Modules</option>
                        <?php
                        $fResult20 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult20->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 21) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_m_cam_setup'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Camera Pixel</label>
                    <select class="form-control" name="phoneModMcamPixel" id="phoneModMcamPixel">
                        <option value="">Select Camera Pixel</option>
                        <?php
                        $fResult21 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult21->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 22) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow4['phone_model_a_m_cam_pixel'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>

            </div>
        <?php
        }
        ?>

        <?php
        $phoneModEditView2 = $productObj->getPhoneModbBy_id_fromgetphoneModB($modelId);
        while ($viewRow5 = $phoneModEditView2->fetch_assoc()) {
        ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Features</label>
                    <select class="form-control" name="phoneModMcamFeatures" id="phoneModMcamFeatures">
                        <option value="">Select a Feature</option>
                        <?php
                        $fResult22 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult22->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 23) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_m_cam_feature'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Video</label>
                    <select class="form-control" name="phoneModMcamVid" id="phoneModMcamVid">
                        <option value="">Select a Video Spec.</option>
                        <?php
                        $fResult23 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult23->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 24) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_m_cam_vid'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Selfie Camera</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Camera Setup</label>
                    <select class="form-control" name="phoneModScamSetup" id="phoneModScamSetup">
                        <option value="">Select Camera Setup / No. of Cam Modules</option>
                        <?php
                        $fResult24 = $productObj->getAllFeatures(); //get all features
                        while ($fRow = $fResult24->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 25) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_s_cam_setup'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Camera Pixels</label>
                    <select class="form-control" name="phoneModScamPixel" id="phoneModScamPixel">
                        <option value="">Select Camera Pixels</option>
                        <?php
                        $fResult25 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult25->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 26) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_s_cam_pixel'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">

                    <label>Features</label>
                    <select class="form-control" name="phoneModScamFeature" id="phoneModScamFeature">
                        <option value="">Select a Feature</option>
                        <?php
                        $fResult26 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult26->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 27) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_s_cam_feature'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Video</label>
                    <select class="form-control" name="phoneModScamVid" id="phoneModScamVid">
                        <option value="">Select a Video Spec.</option>
                        <?php
                        $fResult27 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult27->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 28) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_s_cam_vid'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Sound</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Loudspeaker</label>
                    <select class="form-control" name="phoneModLspeaker" id="phoneModLspeaker">
                        <option value="">Select Yes / No</option>
                        <?php
                        $fResult28 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult28->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 45) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_l_speaker'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>

                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>3.5mm Jack</label>
                    <select class="form-control" name="phoneModJack" id="phoneModJack">
                        <option value="">Select Yes / No</option>
                        <?php
                        $fResult28 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult28->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 46) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_jack'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>

                    </select>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Comms</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>WLAN</label>
                    <select class="form-control" name="phoneModWlan" id="phoneMeodWlan">
                        <option value="">Select a WLAN</option>
                        <?php
                        $fResult28 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult28->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 29) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_wlan'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Bluetooth</label>
                    <select class="form-control" name="phoneModBt" id="phoneModBt">
                        <option value="">Select a Bluetooth</option>
                        <?php
                        $fResult29 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult29->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 30) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_bt'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>GPS</label>
                    <select class="form-control" name="phoneModGps" id="phoneModGps">
                        <option value="">Select a GPS</option>
                        <?php
                        $fResult30 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult30->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 31) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_gps'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>NFC</label>
                    <select class="form-control" name="phoneModNfc" id="phoneModNfc">
                        <option value="">Select a NFC</option>
                        <?php
                        $fResult31 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult31->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 32) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_nfc'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Infrared Port</label>
                    <select class="form-control" name="phoneModIr" id="phoneModIr">
                        <option value="">Select Infrared Port</option>
                        <?php
                        $fResult32 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult32->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 33) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_ir'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Radio</label>
                    <select class="form-control" name="phoneModRadio" id="phoneModRadio">
                        <option value="">Select a radio</option>
                        <?php
                        $fResult33 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult33->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 34) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_radio'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>

                    </select>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>USB</label>
                    <select class="form-control" name="phoneModUsb" id="phoneModUsb">
                        <option value="">Select Usb type</option>
                        <?php
                        $fResult34 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult34->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 35) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_usb'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
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

            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Features</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Sensors</label>
                    <select class="form-control" name="phoneModSensor" id="phoneModSensor">
                        <option value="">Select a sensor category</option>
                        <?php
                        $fResult35 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult35->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 36) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_sensor'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
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

            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Battery</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Type</label>
                    <select class="form-control" name="phoneModBtype" id="phoneModBtype">
                        <option value="">Select a battery type</option>
                        <?php
                        $fResult36 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult36->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 37) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_bat_type'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>

                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Charging</label>
                    <select class="form-control" name="phoneModBCharge" id="phoneModBCharge">
                        <option value="">Select a Charging</option>
                        <?php
                        $fResult36 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult36->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 38) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_bat_charge'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Misc</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Colors</label>
                    <select class="form-control" name="phoneModColor" id="phoneModColor">
                        <option value="">Select Colors</option>
                        <?php
                        $fResult37 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult37->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 47) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_color'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Models</label>
                    <select class="form-control" name="phoneModels" id="phoneModels">
                        <option value="">Select a model</option>
                        <?php
                        $fResult38 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult38->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 48) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_models'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>SAR</label>
                    <select class="form-control" name="phoneModSar" id="phoneModSar">
                        <option value="">Select a SAR</option>
                        <?php
                        $fResult39 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult39->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 49) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_sar'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>SAR EU</label>
                    <select class="form-control" name="phoneModSarEu" id="phoneModSarEu">
                        <option value="">Select a SAR EU</option>
                        <?php
                        $fResult40 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult40->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 50) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_sar_eu'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="prod-field-head">Tests</div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Display</label>
                    <select class="form-control" name="phoneModTdisp" id="phoneModTdisp">
                        <option value="">Select a display test</option>
                        <?php
                        $fResult41 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult41->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 41) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_t_display'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Camera</label>
                    <select class="form-control" name="phoneModTcam" id="phoneModTcam">
                        <option value="">Select a camera test</option>
                        <?php
                        $fResult42 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult42->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 42) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_t_cam'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Loudpspeaker</label>
                    <select class="form-control" name="phoneModLspeakerT" id="phoneModLspeakerT">
                        <option value="">Select a loudspeaker test</option>
                        <?php
                        $fResult43 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult43->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 43) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_lspeakert'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>

                </div>
                <div class="form-group col-md-6">
                    <label>Battery Life</label>
                    <select class="form-control" name="phoneModTbattery" id="phoneModTbattery">
                        <option value="">Select a battery life</option>
                        <?php
                        $fResult44 = $productObj->getAllFeatures(); // get all features
                        while ($fRow = $fResult44->fetch_assoc()) {
                            if ($fRow['feature_type_feature_type_id'] == 44) {
                                if ($fRow['feature_status'] == 1) {
                                    $selected = $fRow['feature_name'] == $viewRow5['phone_model_b_t_battery'] ? ' selected' : '';
                                    echo "<option value='" . $fRow['feature_name'] . "'" . $selected . ">" . $fRow['feature_name'] . "</option>";
                                }
                            }
                        }

                        ?>
                    </select>
                </div>

            </div>

        <?php
        }
        ?>
        <div class="form-row">
            <div class="form-group col-md-12">
                <div class="prod-field-head">Product Model Images</div>
            </div>
        </div>

        <div class="form-row" id="phImgPrevImg">

            <!-------------Removing Images LOADING------------------>
            <div class="col-md-12">
                <h6 class="text-danger mb-4">*You Can Remove Existing Phone Model Images Here</h6>
            </div>

            <?php
            $phoneModEditImgView = $productObj->getPhoneModelImages_ById($modelId);
           
            while ($imgRow = $phoneModEditImgView->fetch_assoc()) {
               
            ?>

                <div class="col-md-4">
                    <div class="text-center mb-5">
                        <span title="remove" data-toggle="tooltip" data-placement="right" class="imgBtn delImgBtn1" data-imgId="<?php echo $imgRow["phone_model_image_id"]; ?>" data-imgName="<?php echo $imgRow["phone_model_image_name"]; ?>">
                            <i class="fas fa-times-circle fa-2x text-danger"></i>
                        </span>
                        <img class="w-75" src="../../img/product_images/product_models/phone_models/<?php echo $imgRow["phone_model_image_name"]; ?>" alt="phone_model_image">
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <h6 class="text-danger mt-4">*Add More Phone Model Images Here</h6>
            </div>
        </div>

        <div class="form-row">
            <div class="file-upload">
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )"><i class="fas fa-plus-circle"></i> Add More Images</button>

                <div class="image-upload-wrap">
                    <input class="file-upload-input" type='file' id="phModImg" name="phoneModelImg[]" accept="image/*" oninput="phoneModImgValidate()" multiple />
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

        <div class="form-row">
            <div class="form-group col-md-12 text-right">
                <button type="button" class="btn btn-outline-primary userform-button" id="phone-model-form-edit"><i class="far fa-edit"></i>&nbsp;Update</button>
                <button type="button" class="btn btn-outline-secondary userform-button" id="phone-model-form-reset2"><i class="fas fa-undo"></i>&nbsp;Reset</button>

            </div>
        </div>
    </form>


</div>