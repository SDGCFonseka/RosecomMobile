<?php
session_start();
include_once '../../model/productModel.php'; //include product model
$productObj = new product();
$productId = base64_decode($_REQUEST['id']);
$slideResult = $productObj->getProductImages_ById($productId);


?>

<div class="modal-body prod-mod-body">

    <!----------------------------- owl carousel START -------------------------------->

    <div class="slider-92911">

        <div class="owl-carousel slide-one-item">
            <?php

            while ($row = $slideResult->fetch_assoc()) {


                $productImg = $row['product_image_name'];
                echo "<div class='d-md-flex testimony-29101 align-items-stretch'><img class='image' src='../../img/product_images/products/$productImg'></div>";
            }


            ?>
        </div>

        <div class="my-5 text-center">
            <ul class="thumbnail">
                <?php
                $slideResult2 = $productObj->getProductImages_ById($productId);
                $count = 0;
                while ($row = $slideResult2->fetch_assoc()) {

                    $count++;
                    if ($count == 1) {
                        $productImg = $row['product_image_name'];
                        echo "<li class='active'><a href='#'><img src='../../img/product_images/products/$productImg' alt='Image' class='img-fluid'></a></li>";
                    } else if ($count > 1) {

                        $productImg2 = $row['product_image_name'];
                        echo "<li><a href='#'><img src='../../img/product_images/products/$productImg2' alt='Image' class='img-fluid'></a></li>";
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