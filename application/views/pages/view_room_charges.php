<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('main');?>">Home</a>
        </li>        
        <li>
            <a href="<?=base_url('room_charges');?>">FBS Request</a>
        </li>
        <li>
            FBS Request Details (<?=$reserve_id;?> | <?=$fullname;?>)
        </li>
    </ul>
</div>
<?php
if($this->session->flashdata('success')){
    echo "<div class='alert alert-success'>".$this->session->flashdata('success')."</div>";
}
if($this->session->flashdata('failed')){
    echo "<div class='alert alert-danger'>".$this->session->flashdata('failed')."</div>";
}
?>
<div class="row">
    <div class="box col-12">
        <?=form_open('track_invoice_search');?>
        <table width="100%" border="0">
            <tr>
                <td width="8%"><b>Select Date:</b></td>
                <td width="15%"><input type="date" name="datearray" class="form-control" value="<?=date('Y-m-d');?>"></td>
                <td><input type="submit" class="btn btn-primary btn-sm" value="Search"></td>
            </tr>
        </table>
        <?=form_close();?>                    
    </div>
    <div class="box col-md-12">                            
        <div class="box-inner">            
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-shopping-cart"></i> Requested Item List (<?=$refno;?>)</h2>                                
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>   
                        <th style="text-align:center;">No.</th>
                        <th style="text-align:center;">Item Code</th>         
                        <th style="text-align:center;">Description</th>
                        <th style="text-align:center;">Qty</th>                        
                        <th style="text-align:center;">Price</th>
                        <th style="text-align:center;">Total</th>
                        <th style="text-align:center;" width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($charges as $item){  
                            $total=$item['quantity']*$item['sellingprice'];                          
                            echo "<tr>";
                                echo "<td style='text-align:center;'>$x.</td>";
                                echo "<td style='text-align:center;'>$item[code]</td>";                           
                                echo "<td style='text-align:left;'>$item[description]</td>";                                
                                echo "<td style='text-align:center;'>$item[quantity]</td>";
                                echo "<td style='text-align:right;'>".number_format($item['sellingprice'],2)."</td>";
                                echo "<td style='text-align:right;'>".number_format($total,2)."</td>";                                
                                ?>
                                <td>
                                   
                                </td>
                                <?php
                            echo "</tr>";
                            $x++;
                        }
                        ?>
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>