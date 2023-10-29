<div class="col-md-12">

    <table width="100%" id="viewHpTable" class="display nowrap modelTb table-striped table-dark">
        <!--action="../controller/productController.php?status=addProduct" method="post"-->
        <div class="form-row">
            <div class="form-group text-center col-md">
                <h2>Model Specification</h2>
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

            <tr>
                <td width="25%">
                    <div class="h5 font-weight-bold pl-4">Model Details</div>
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Product Name</div>
                </td>
                <td><?php echo $viewRow['product_name']; ?></td>
            </tr>
            <tr>
                <td>
                    <!--empty---->
                </td>
                <td>
                    <div class="font-weight-bold">Product Brand</div>
                </td>
                <?php $brandImg = $viewRow2['brand_image']; ?>
                <td><?php echo '<img style="width:auto;height:30px;" src="../../img/brand_images/' . $brandImg . ' ">' ?></td>
            </tr>
        <?php
        }
        ?>
        <?php

        $hPhoneModView = $productObj->getHphoneModBy_id_fromHphoneMod($modelId);
        while ($viewRow4 = $hPhoneModView->fetch_assoc()) {
        ?>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td>
                    <div class="font-weight-bold">Model Name</div>
                </td>
                <td><?php echo $viewRow4['headphone_model_name']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <div class="font-weight-bold">Model Category</div>
                </td>
                <?php $categoryImg = $viewRow3['category_image']; ?>
                <td><?php echo '<img style="width:auto;height:30px;" src="../../img/category_images/' . $categoryImg . ' ">' . '&nbsp;&nbsp;' . $viewRow3['category_name']; ?></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <div class="font-weight-bold">Model Price</div>
                </td>
                
                <td><?php echo "Rs. ".$viewRow4['headphone_model_price']; ?></td>
            </tr>

            <tr>
                <td style="background-color:white;" colspan="3"></td>
            </tr>
    </table>
    <table width="100%" id="viewHpTable2" class="display nowrap modelTb table-striped table-dark">
        <tr>
            <td width="25%">
                <div class="h5 font-weight-bold pl-4">Appearance</div>
            </td>
            <td width="22%">
                <div class="font-weight-bold">Type</div>
            </td>
            <td><?php echo $viewRow4['headphone_model_type']; ?></td>
        </tr>

        <tr>
            <td>
                <!--empty---->
            </td>
            <td width="22%">
                <div class="font-weight-bold">Colors</div>
            </td>
            <td><?php echo $viewRow4['headphone_model_colors']; ?></td>
        </tr>

        <tr>
            <td>
                <!--empty---->
            </td>
            <td width="22%">
                <div class="font-weight-bold">Style</div>
            </td>
            <td><?php echo $viewRow4['headphone_model_style']; ?></td>
        </tr>


        <tr>
            <td style="background-color:white;" colspan="3"></td>
        </tr>

        <tr>
            <td width="25%">
                <div class="h5 font-weight-bold pl-4">Body</div>
            </td>
            <td width="22%">
                <div class="font-weight-bold">Dimension</div>
            </td>
            <td><?php echo $viewRow4['headphone_model_dimension']; ?></td>
        </tr>
        <tr>
            <td>
                <!--empty---->
            </td>
            <td width="22%">
                <div class="font-weight-bold">Material</div>
            </td>
            <td><?php echo $viewRow4['headphone_model_material']; ?></td>
        </tr>
        <tr>
            <td style="background-color:white;" colspan="3"></td>
        </tr>

        <tr>
            <td width="25%">
                <div class="h5 font-weight-bold pl-4">Frequency Operated</div>
            </td>
            <td width="22%">
                <div class="font-weight-bold">Frequency Response</div>
            </td>
            <td><?php echo $viewRow4['headphone_model_fResponse']; ?></td>
        </tr>

        <tr>
            <td>
                <!--empty---->
            </td>
            <td width="22%">
                <div class="font-weight-bold">Frequency Response (Active)</div>
            </td>
            <td><?php echo $viewRow4['headphone_model_fResponseA']; ?></td>
        </tr>

        <tr>
            <td>
                <!--empty---->
            </td>
            <td width="22%">
                <div class="font-weight-bold">Frequency Response (BT Communication)</div>
            </td>
            <td><?php echo $viewRow4['headphone_model_fResponseBt']; ?></td>
        </tr>

        <tr>
            <td>
                <!--empty---->
            </td>
            <td width="22%">
                <div class="font-weight-bold">Sensitivities</div>
            </td>
            <td><?php echo $viewRow4['headphone_model_sensivity']; ?></td>
        </tr>


        <tr>
            <td style="background-color:white;" colspan="3"></td>
        </tr>

        <tr>
            <td width="25%">
                <div class="h5 font-weight-bold pl-4">Comms</div>
            </td>
            <td width="22%">
                <div class="font-weight-bold">NFC</div>
            </td>
            <td><?php echo $viewRow4['headphone_model_nfc']; ?></td>
        </tr>
        <tr>
            <td>
                <!--empty---->
            </td>
            <td width="22%">
                <div class="font-weight-bold">Bluetooth</div>
            </td>
            <td><?php echo $viewRow4['headphone_model_bt']; ?></td>
        </tr>
        <tr>
            <td>
                <!--empty---->
            </td>
            <td width="22%">
                <div class="font-weight-bold">Wifi</div>
            </td>
            <td><?php echo $viewRow4['headphone_model_wifi']; ?></td>
        </tr>





    </table>




</div>

<div class="col-md-12">
    <div class="form-row" id="textView">
        <div class="form-group col-md-12">
            <textarea class="form-control" id="vwHdModDescrip" name="vwHdModDescrip" disabled><?php echo $viewRow4['headphone_model_descrip']; ?></textarea>
            <span id="hdModDesIcon"></span>
            <span class="text-danger error-msg" id="contactErr1"></span>

        </div>
    </div>
</div>
<?php
        }
?>

<script>
    CKEDITOR.replace('vwHdModDescrip');
    CKEDITOR.instances['vwHdModDescrip'].setReadOnly(true);
</script>
<script>
    $(document).ready(function() {
        $(function() {
            let textarea = document.getElementById('vwHdModDescrip');
            if (textarea.value != "") {
                $('#textView').show();
                $('#viewHpTable2').hide();

            } else {
                $('#textView').hide()
                $('#viewHpTable2').show();

            }
        });
    });
</script>