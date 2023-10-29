
 <!----------------------------------------------------------------------- STOCK Table Start -------------------------------------------------------------------------------------------------->
 <div class="table-responsive">
 <div id="stockTbNReload">
                                            <!------------------------------------- STOCK TABLE Null LOADING -------------------------------------->
    <table id="outStockTable" class="table nowrap table-striped text-center" width="100%">
    <thead>
        <tr class="tb-head-style">
            <th scope="col">Id</th>
            <th scope="col">Stock Image</th>
            <th scope="col">Stock Name</th>
            <th scope="col">Received Price(Rs.)</th>
            <th scope="col">Selling Price(Rs.)</th>
            <th scope="col">Stock count(Pcs.)</th>
            <th scope="col">Action</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        $stockResult = $stockObj->getAllStocksNull();
        while ($row = $stockResult->fetch_assoc()) {
            $buttonActive = (($row['stock_status'] == 0) ? 'inline' : 'none');
            $buttonInActive = (($row['stock_status'] == 1) ? 'inline' : 'none');
            $count++;
        ?>
            <tr scope="row">
                <td><?php echo $count; ?></td>
                <td>
                    <?php 
                     $modelId = $row['product_model_id'];
                     if($row['category_category_id'] == 1){
                        $stockImgResult2 = $stockObj->getHeadphoneModelImages_ById($modelId);
                        if($row2 = $stockImgResult2->fetch_assoc()){
                            $hPhoneModImg = $row2['headphone_model_image_name'];
                             echo "<img src='../../img/product_images/product_models/headphone_models/$hPhoneModImg' width='80px' height='80px'>";
                        }
                     }else if($row['category_category_id'] == 2){
                        $stockImgResult3 = $stockObj->getPhoneModelImages_ById($modelId);
                        if($row2 = $stockImgResult3->fetch_assoc()){
                            $phoneModImg = $row2['phone_model_image_name'];
                            echo "<img src='../../img/product_images/product_models/phone_models/$phoneModImg' width='80px' height='80px'>";
                        }
                     }
                    ?>
                </td>
                <td>
                    <?php 
                    $modelId = $row['product_model_id'];
                    if($row['category_category_id'] == 1){
                        $stockResult2 = $stockObj->getHphoneModBy_id_fromHphoneMod($modelId);
                        if($row2 = $stockResult2->fetch_assoc()){
                            echo $row2['headphone_model_name'];
                        }
                    }else if($row['category_category_id'] == 2){
                        $stockResult3 = $stockObj->getPhoneModABy_id_fromgetphoneModA($modelId);
                        if($row3 = $stockResult3->fetch_assoc()){
                            echo $row3['phone_model_a_name'];
                        }
                    }
                    //-------------------------------------------------
                    ?>
                </td>
                <td><?php echo number_format($row['stock_cost_per_unit'],2); ?></td>
                <td><?php echo number_format($row['stock_product_reg_price'],2); ?></td>
                <td><?php echo number_format($row['stock_currentCount']); ?></td>
                <td>
                    
                       <a href="viewStockModal.php?id=<?php echo base64_encode($row['stock_id']); ?>" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>
                       <button href="javaScript:void(0)" onclick="deleteStock('<?php echo base64_encode($row['stock_id']); ?>')" class="btn btn-outline-danger crud-btn"><i class="fas fa-trash-alt"></i>&nbsp;Active</button>
                </td>
               
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script>

$('#stockTableN').DataTable();

</script>
                                    </div>
                                </div>

                                <!-------------------------------------------------------------------------------- STOCK Table End ----------------------------------------------------------------------------------------->