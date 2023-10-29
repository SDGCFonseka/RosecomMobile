<?php
session_start();
include_once '../model/productModel.php';
$productObj = new product();
$brandIdDisplay = $productObj->getBrand_id_toDisplay();
?>

        <div class="modal-header">
            <div class="modal-title modal-form-msg mt-2" id="brandFormResponse"></div>
            <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
                <span>&times;</span>
            </a>
        </div>

        <div class="modal-body">
            <div class="container">
                <div class="col-md-12">

                    <!------------------------------------------------------- Brand form start --------------------------------------------------------->
                    <form name="brandForm" id="brandForm" enctype="multipart/form-data">

                        <div class="form-row">
                            <div class="form-group text-center col-md">
                                <h2>Add Brand</h2>
                            </div>
                        </div>
                        <div class="form-row">
                            <?php

                            while ($brandIdView = $brandIdDisplay->fetch_assoc()) {

                            ?>
                                <div class="form-group col-md-6 col-sm-6">
                                    <label>Brand Id</label>
                                    <input type="text" class="form-control" value="<?php echo $brandIdView['AUTO_INCREMENT']; ?>" id="brandId" name="brandId" readonly>
                                </div>
                            <?php

                            }

                            ?>
                            <div class="form-group col-md-6 col-sm-6">
                                <label>Brand Name</label>
                                <input type="text" class="form-control" id="brandName" name="brandName" placeholder="Brand Name" oninput="brandNameValidate()">
                                <span id="brandNmIcon"></span>
                                <span class="text-danger error-msg" id="brandNamErr"></span>
                                <span class="text-danger error-msg" id="brandNamErr3"></span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-6">
                                <label>Brand Description</label>
                                <textarea class="form-control brandDes-textbox" id="brandDes" name="brandDes" placeholder="Brand Description" oninput="brandDesValidate()" rows="4" cols="5"></textarea>
                                <span id="brandDesIcon"></span>
                                <span class="text-danger error-msg" id="brandDesErr"></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <label>Brand Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="brandImg" name="brandImg" oninput="brandImgValidate()">
                                    <label class="custom-file-label" id="brandImgInput">Choose file</label>
                                    <span id="brandImgIcon"></span>
                                </div>
                                <span class="text-danger error-msg" id="brandImgErr"></span>
                            </div>
                        </div>
                        <label>Image Preview</label>
                        <div class="mt-2 ml-1">
                            <img id="prev_brandImg" width="auto" height="100px" src="../../img/interface_images/formDefaultImg.jpg" style="border-radius:5%;" />
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12 text-right">
                                <button type="button" class="btn btn-outline-primary userform-button" id="brand-form-submit"><i class="far fa-paper-plane"></i>&nbsp;Submit</button>
                                <button type="button" class="btn btn-outline-secondary userform-button" id="brand-form-reset"><i class="fas fa-undo"></i>&nbsp;Clear</button>
                            </div>
                        </div>
                    </form>
                    <!------------------------------------------------------- Brand form end --------------------------------------------------------->

                </div>
            </div>
        </div>
    

        <script type="text/javascript" src="../../js/validation.js"></script>
        <script type="text/javascript" src="../../js/validation2.js"></script>