<?php
session_start();
include_once '../../model/productModel.php'; //include product model
$productObj = new product();
$modelId = base64_decode($_REQUEST['id']);
$slideResult = $productObj->getHeadphoneModelImages_ById($modelId);


?>

<div class="modal-body prod-mod-body">

    <!----------------------------- owl carousel START -------------------------------->

    <div class="slider-92911">

        <div class="owl-carousel slide-one-item">
            <?php

            while ($row = $slideResult->fetch_assoc()) {


                $hPhoneModImg = $row['headphone_model_image_name'];
                echo "<div class='d-md-flex testimony-29101 align-items-stretch'><img class='image' src='../../img/product_images/product_models/headphone_models/$hPhoneModImg'></div>";
            }


            ?>
        </div>

        <div class="my-5 text-center">
            <ul class="thumbnail">
                <?php
                $slideResult2 = $productObj->getHeadphoneModelImages_ById($modelId);
                $count = 0;
                while ($row2 = $slideResult2->fetch_assoc()) {

                    $count++;
                    if ($count == 1) {
                        $hPhoneModImg = $row2['headphone_model_image_name'];
                        echo "<li class='active'><a href='#'><img src='../../img/product_images/product_models/headphone_models/$hPhoneModImg' alt='Image' class='img-fluid'></a></li>";
                    } else if ($count > 1) {

                        $hPhoneModImg = $row2['headphone_model_image_name'];
                        echo "<li><a href='#'><img src='../../img/product_images/product_models/headphone_models/$hPhoneModImg' alt='Image' class='img-fluid'></a></li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <!----------------------------- owl carousel END -------------------------------->
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>


<script type="text/javascript" src="../../js/slider_carousel.js"></script>