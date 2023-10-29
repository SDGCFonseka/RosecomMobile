<div class="col-md-12">

    <table width="100%" class="table phoneModTb table-striped table-dark">
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

        $phoneModView = $productObj->getPhoneModABy_id_fromgetphoneModA($modelId);
        while ($viewRow4 = $phoneModView->fetch_assoc()) {
        ?>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td>
                    <div class="font-weight-bold">Model Name</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_name']; ?></td>
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
                
                <td><?php echo "Rs. ".$viewRow4['phone_model_a_price']; ?></td>
            </tr>
            <tr>
                <td style="background-color:white;" colspan="3"></td>
            </tr>

            <tr>
                <td width="25%">
                    <div class="h5 font-weight-bold pl-4">Network</div>
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Technology</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_technology']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">2G Bands</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_2gbands']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">3G Bands</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_3gbands']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">4G Bands</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_4gbands']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">5G Bands</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_5gbands']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Speed</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_speed']; ?></td>
            </tr>
            <tr>
                <td style="background-color:white;" colspan="3"></td>
            </tr>

            <tr>
                <td width="25%">
                    <div class="h5 font-weight-bold pl-4">Launched</div>
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Announced</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_announced']; ?></td>
            </tr>
            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Status</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_state']; ?></td>
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
                <td><?php echo $viewRow4['phone_model_a_dimension']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Weight</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_weight']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Sim</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_sim']; ?></td>
            </tr>

            <tr>
                <td style="background-color:white;" colspan="3"></td>
            </tr>
            
            <tr>
                <td width="25%">
                    <div class="h5 font-weight-bold pl-4">Display</div>
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Type</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_type']; ?></td>
            </tr>
            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Size</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_size']; ?></td>
            </tr>
            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Resolution</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_resolution']; ?></td>
            </tr>
            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Protection</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_protection']; ?></td>
            </tr>

            <tr>
                <td style="background-color:white;" colspan="3"></td>
            </tr>

            <tr>
                <td width="25%">
                    <div class="h5 font-weight-bold pl-4">Platform</div>
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Os</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_os']; ?></td>
            </tr>
            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Chipset</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_chipset']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Cpu</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_cpu']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Gpu</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_gpu']; ?></td>
            </tr>

            <tr>
                <td style="background-color:white;" colspan="3"></td>
            </tr>

            <tr>
                <td width="25%">
                    <div class="h5 font-weight-bold pl-4">Memory</div>
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Cardslot</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_cardslot']; ?></td>
            </tr>
               
            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Internal</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_internal']; ?></td>
            </tr>
           
            <tr>
                <td style="background-color:white;" colspan="3"></td>
            </tr>

            <tr>
                <td width="25%">
                    <div class="h5 font-weight-bold pl-4">Main Camera</div>
                </td>
                <td width="22%">
                    <div class="font-weight-bold">No. of Cam Modules</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_m_cam_setup']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Camera Pixels</div>
                </td>
                <td><?php echo $viewRow4['phone_model_a_m_cam_pixel']; ?></td>
            </tr>

            
           
<?php 
        }
?>
    
       <?php
        $phoneModEditView2 = $productObj->getPhoneModbBy_id_fromgetphoneModB($modelId);
        while ($viewRow5 = $phoneModEditView2->fetch_assoc()) {
        ?>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Features</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_m_cam_feature']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Video</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_m_cam_vid']; ?></td>
            </tr>

            <tr>
                <td style="background-color:white;" colspan="3"></td>
            </tr>
            
            <tr>
                <td width="25%">
                    <div class="h5 font-weight-bold pl-4">Selfie Camera</div>
                </td>
                <td width="22%">
                    <div class="font-weight-bold">No. of Cam Modules</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_s_cam_setup']; ?></td>
            </tr> 

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Camera Pixels</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_s_cam_pixel']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Features</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_s_cam_feature']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Video</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_s_cam_vid']; ?></td>
            </tr>
           
            <tr>
                <td style="background-color:white;" colspan="3"></td>
            </tr>

            <tr>
                <td width="25%">
                    <div class="h5 font-weight-bold pl-4">Sound</div>
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Loudspeaker</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_l_speaker']; ?></td>
            </tr> 

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">3.5mm Jack</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_jack']; ?></td>
            </tr>

            <tr>
                <td style="background-color:white;" colspan="3"></td>
            </tr>

            <tr>
                <td width="25%">
                    <div class="h5 font-weight-bold pl-4">Comms</div>
                </td>
                <td width="22%">
                    <div class="font-weight-bold">WLAN</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_wlan']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Bluetooth</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_bt']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">GPS</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_gps']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">NFC</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_nfc']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Infrared Port</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_ir']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Radio</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_radio']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">USB</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_usb']; ?></td>
            </tr>

            <tr>
                <td style="background-color:white;" colspan="3"></td>
            </tr>
            
            <tr>
                <td width="25%">
                    <div class="h5 font-weight-bold pl-4">Features</div>
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Sensors</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_sensor']; ?></td>
            </tr>
           
            <tr>
                <td style="background-color:white;" colspan="3"></td>
            </tr>

            <tr>
                <td width="25%">
                    <div class="h5 font-weight-bold pl-4">Battery</div>
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Type</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_bat_type']; ?></td>
            </tr>
            
            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Charging</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_bat_charge']; ?></td>
            </tr>

            <tr>
                <td style="background-color:white;" colspan="3"></td>
            </tr>

            <tr>
                <td width="25%">
                    <div class="h5 font-weight-bold pl-4">Misc</div>
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Colors</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_color']; ?></td>
            </tr>
               
            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Models</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_models']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">SAR</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_sar']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">SAR EU</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_sar_eu']; ?></td>
            </tr>
            
            <tr>
                <td style="background-color:white;" colspan="3"></td>
            </tr>
            
            <tr>
                <td width="25%">
                    <div class="h5 font-weight-bold pl-4">Tests</div>
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Display</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_t_display']; ?></td>
            </tr>   

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Camera</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_t_cam']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Loudpspeaker</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_lspeakert']; ?></td>
            </tr>

            <tr>
                <td>
                    <!--empty---->
                </td>
                <td width="22%">
                    <div class="font-weight-bold">Battery Life</div>
                </td>
                <td><?php echo $viewRow5['phone_model_b_t_battery']; ?></td>
            </tr>

         <?php
        }
        ?>
    </table>




</div>