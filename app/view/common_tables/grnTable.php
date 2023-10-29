<!----------------------------------------------------------------------- GRN Table Start -------------------------------------------------------------------------------------------------->
<div class="table-responsive">
    <div id="grnTbReload">
        <!------------------------------------- GRN TABLE LOADING -------------------------------------->
        <table id="grnTable" class="table nowrap table-striped text-center" width="100%">
            <thead>
                <tr class="tb-head-style">
                    <th scope="col">Id</th>
                    <th scope="col">Reference Id</th>
                    <th scope="col">Total Paid(Rs.)</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                $grnResult = $stockObj->getAllGrn();
                while ($row = $grnResult->fetch_assoc()) {
                    $buttonActive = (($row['grn_status'] == 0) ? 'inline' : 'none');
                    $buttonInActive = (($row['grn_status'] == 1) ? 'inline' : 'none');
                    $count++;
                ?>
                    <tr scope="row">
                        <td><?php echo $count; ?></td>
                        <td>
                            <?php echo $row['grn_ref_id']; ?>
                        </td>
                        <td>
                            <?php echo number_format($row['grn_price'], 2); ?>
                        </td>

                        <td>
                            <?php
                            if($row['grn_payment_status'] == 1){
                            ?>
                        
                            <select id="grnSel" class="form-control" data-style="text-success" onchange="setGrnPaySel('<?php echo base64_encode($row['grn_id']); ?>',this.value)">
                                <?php 
                                if($row['grn_payment_status'] == 0){
                                    echo '<option value="1" class="text-success" data-icon="fas fa-certificate">Paid</option>
                                    <option value="0" class="text-danger" data-icon="fas fa-times-circle" selected>Not Paid</option>';
                                }else{
                                    echo '<option value="1" class="text-success" data-icon="fas fa-certificate" selected>Paid</option>
                                    <option value="0" class="text-danger" data-icon="fas fa-times-circle">Not Paid</option>'; 
                                }
                                ?>
                                
                                
                            </select>
                            <?php
                            }else{
                            ?>
                            <select id="grnSel" class="form-control" data-style="text-danger" onchange="setGrnPaySel('<?php echo base64_encode($row['grn_id']); ?>',this.value)">
                                <?php 
                                if($row['grn_payment_status'] == 0){
                                    echo '<option value="1" class="text-success" data-icon="fas fa-certificate">Paid</option>
                                    <option value="0" class="text-danger" data-icon="fas fa-times-circle" selected>Not Paid</option>';
                                }else{
                                    echo '<option value="1" class="text-success" data-icon="fas fa-certificate" selected>Paid</option>
                                    <option value="0" class="text-danger" data-icon="fas fa-times-circle">Not Paid</option>'; 
                                }
                                ?>
                                
                                
                            </select>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                        <?php 
                                if($row['grn_payment_status'] == 1){
                                    echo '<div class="text-success"><i class="fas fa-certificate"></i> Paid</div>';
                                    
                                }else{
                                    echo '<div class="text-danger"><i class="fas fa-times-circle"></i> Unpaid</div>';
                                }
                                ?>
                        </td>
                        <td>

                            <a href="editGrnModal.php?id=<?php echo base64_encode($row['grn_id']); ?>" class="btn btn-outline-info li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-edit"></i>&nbsp;Edit</a>

                            <a href="viewGrnModal.php?id=<?php echo base64_encode($row['grn_id']); ?>" class="btn btn-outline-secondary li-modal crud-btn" data-toggle="modal" data-backdrop="static" data-target="#myModal"><i class="far fa-eye"></i>&nbsp;View</a>

                        </td>
                        <td>
                            <!-------------Active------------------>
                            <button href="javaScript:void(0)" onclick="activeInactiveGrn('<?php echo base64_encode($row['grn_id']); ?>',0)" class="btn btn-outline-success crud-btn" style="display:<?php echo $buttonInActive; ?>;width: 110px;"><i class="fas fa-toggle-on"></i>&nbsp;Active</button>
                            <!--------------Inactive------------------->
                            <button href="javaScript:void(0)" onclick="activeInactiveGrn('<?php echo base64_encode($row['grn_id']); ?>',1)" class="btn btn-outline-danger crud-btn" style="display:<?php echo $buttonActive; ?>;width: 110px;"><i class="fas fa-toggle-off"></i>&nbsp;Deactive</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-------------------------------------------------------------------------------- STOCK Table End ----------------------------------------------------------------------------------------->