<table id="phoneModelTable" class="table nowrap table-striped text-center" width="100%">
    <thead>
        <tr class="tb-head-style">
            <th scope="col">Id</th>
            <th scope="col" width="10%">Model Image</th>
            <th scope="col">Model Name / Number</th>
            <th scope="col">Price(Rs.)</th>
            <th scope="col">Action</th>
            <th class="state" scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $productModRes = $productObj->getAllPhoneModelById($productId);
        $count = 0;
        while ($row = $productModRes->fetch_assoc()) {
            $modelId  = $row['phone_model_a_id']; // phone Model Id
            //     // $categoryId = $row['category_category_id'];
            //     // $productResult2 = $productObj->getCategoryBy_id_fromCategory($categoryId);
            $phoneModResult = $productObj->getPhoneModelImages_ById($modelId);
            //     // $row2 = $productResult2->fetch_assoc();

                  $buttonActive = (($row['phone_model_a_status'] == 0) ? 'inline' : 'none');
                  $buttonInActive = (($row['phone_model_a_status'] == 1) ? 'inline' : 'none');
            $count++;
        ?>
            <tr>
                <td>
                    <?php echo $count; ?>
                </td>
                <td>
                    <div class="align-prod-image">
                        <?php
                        if ($row3 = $phoneModResult->fetch_assoc()) {
                            $phoneModImg = $row3['phone_model_image_name'];
                            $encodeId = base64_encode($modelId);
                            echo "<div class='prod-img-container'><img src='../../img/product_images/product_models/phone_models/$phoneModImg' style='width:80px;height:80px;border-radius:5px;'/><div class='prod-img-overlay'><a title='Click to Zoom' href='pImagesPopupModals/phoneModelImagesModal.php?id=$encodeId' class='li-modal prod-Img-Btn' data-toggle='modal' data-backdrop='static' data-target='#myModal2'><i class='fas fa-search-plus'></i></a></div></div>";
                        }
                        ?>
                    </div>
                </td>
                <td><?php echo $row['phone_model_a_name']; ?></td>
                <td><?php echo number_format($row['phone_model_a_price'],2); ?></td>
                <td>
                    <a href="editProductModelModal.php?mid=<?php echo base64_encode($row['phone_model_a_id']); ?>&pid=<?php echo base64_encode($productId); ?>" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>
                    <a href="ViewProductModelModal.php?mid=<?php echo base64_encode($row['phone_model_a_id']); ?>&pid=<?php echo base64_encode($productId); ?>" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
                   
                </td>
                <td>
                   <div style="display:none;"><?php echo $row['phone_model_a_status']; ?></div>
                        <!-------------Active------------------>
                    <button href="javaScript:void(0)" onclick="activeInactivePhoneMod('<?php echo base64_encode($row['phone_model_a_id']); ?>',0,'<?php echo base64_encode($row['product_product_id']); ?>')" class="btn btn-outline-success crud-btn" style="display:<?php echo $buttonInActive; ?>;width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
                        <!--------------Inactive------------------->
                    <button href="javaScript:void(0)" onclick="activeInactivePhoneMod('<?php echo base64_encode($row['phone_model_a_id']); ?>',1,'<?php echo base64_encode($row['product_product_id']); ?>')" class="btn btn-outline-danger crud-btn" style="display:<?php echo $buttonActive; ?>;width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>

                </td>
            </tr>
        <?php
        }

        ?>
    </tbody>
</table>

    
    
   
