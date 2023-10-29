<?php
session_start();
include_once '../model/stockModel.php';
$stockObj = new stock();
$stockId = base64_decode($_REQUEST['id']);

// print_r($stockId);
?>

<?php
$stockResult = $stockObj->getStocksById($stockId);
while ($row = $stockResult->fetch_assoc()) {

?>
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
            <span>&times;</span>
        </a>
    </div>
   <div class="modal-body">
        <table class="table table-borderless table-reponsive-*">

            <tr>
                <th class="col-sm-6">Stock Image :</th>
                <td class="col-sm-6">
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
            </tr>
            <tr>
                <th scope="col">Name :</th>
                <td scope="row">
                <?php
                            $modelId = $row['product_model_id'];
                            if ($row['category_category_id'] == 1) {
                                $stockResult2 = $stockObj->getHphoneModBy_id_fromHphoneMod($modelId);
                                if ($row2 = $stockResult2->fetch_assoc()) {
                                    echo $row2['headphone_model_name'];
                                }
                            } else if ($row['category_category_id'] == 2) {
                                $stockResult3 = $stockObj->getPhoneModABy_id_fromgetphoneModA($modelId);
                                if ($row3 = $stockResult3->fetch_assoc()) {
                                    echo $row3['phone_model_a_name'];
                                }
                            }
                            //-------------------------------------------------
                            ?>  
                </td>
            </tr>
            <tr>
                <th scope="col">Stock Received Date:</th>
                <td scope="row"><?php echo date('jS F Y', strtotime($row['stock_res_date']));?></td>
            </tr>
            <tr>
                <th scope="col">Stock Color :</th>
                <td scope="row">
                    <?php
                    $color_name = $row['stock_color'];
                    if (strpos($color_name, '#') !== false){
                       echo '<div style="display:inline;padding:20px 30px 20px 30px;background-color:'.$color_name.';"></div>';
                    }else{
                        echo '<img src="../../img/stock/stock_color_img/'.$row["stock_color"].'" height="80px" height="80px" />';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th scope="col">Stock Added Count :</th>
                <td scope="row"><?php echo $row['stock_count'].' Pcs'; ?></td>
            </tr>
            <tr>
                <th scope="col">Stock Current count :</th>
                <td scope="row"><?php echo $row['stock_currentCount'].' Pcs'; ?></td>
            </tr>
            <tr>
                <th scope="col">Stock Cost Per Unit :</th>
                <td scope="row"><?php echo 'Rs. '.number_format($row['stock_cost_per_unit'],2); ?></td>
            </tr>
            <tr>
                <th scope="col">Amount payed :</th>
                <td scope="row"><?php echo 'Rs. '.number_format($row['stock_amount_paid'],2); ?></td>
            </tr>
            <tr>
                <th scope="col">Regular Price :</th>
                <td scope="row"><?php echo 'Rs. '.number_format($row['stock_product_reg_price'],2); ?></td>
            </tr>
            <tr>
                <th scope="col">Category :</th>
                <td scope="row">
                    <?php 
                    $categoryId = $row['category_category_id'];
                    $stockResult4 = $stockObj->getCategoryBy_id_fromCategory($categoryId);
                    if ($row2 = $stockResult4->fetch_assoc()) {
                        echo $row2['category_name'];
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th scope="col">Grn Reference Id :</th>
                <td scope="row">
                <?php 
                    $grnId = $row['grn_grn_id'];
                    $stockResult5 = $stockObj->getGrnInfo_by_grnId($grnId);
                    if ($row3 = $stockResult5->fetch_assoc()) {
                        echo $row3['grn_ref_id'];
                    }
                ?>
                </td>
            </tr>
           

        </table>
    </div>
<?php
}
?>
<!-- Modal window end -->