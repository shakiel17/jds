<?php
if($this->session->dept=="admin"){
    $dashboard="";
    $reservation="";
    $housekeeping="";
    $fbs="";
    $reports="";
    $settings="";
    $addqty="";
}
if($this->session->dept=="FRONT OFFICE"){
    $dashboard="";
    $reservation="";
    $housekeeping="style='display:none;'";
    $fbs="style='display:none;'";
    $reports="style='display:none;'";
    $settings="style='display:none;'";
    $addqty="style='display:none;'";
}
if($this->session->dept=="CAFE" || $this->session->dept=="FOOD KIOSK" || $this->session->dept=="SOUVENIR"){
    $dashboard="style='display:none;'";
    $reservation="style='display:none;'";
    $housekeeping="style='display:none;'";
    $fbs="";
    $addqty="style='display:none;'";
    $reports="style='display:none;'";
    $settings="style='display:none;'";
}
if($this->session->dept=="HOUSEKEEPING"){
    $dashboard="style='display:none;'";
    $reservation="style='display:none;'";
    $housekeeping="";
    $fbs="style='display:none;'";
    $reports="style='display:none;'";
    $settings="style='display:none;'";
    $addqty="style='display:none;'";
}
?>
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li <?=$dashboard;?>><a class="ajax-link" href="<?=base_url('main');?>"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>                        
                        <li <?=$reservation;?>><a class="ajax-link" href="<?=base_url('manage_reservation');?>"><i class="glyphicon glyphicon-book"></i><span> Reservation</span></a>
                        </li>
                        <li <?=$housekeeping;?>><a class="ajax-link" href="<?=base_url('manage_housekeeping');?>"><i class="glyphicon glyphicon-tasks"></i><span> Housekeeping</span></a>
                        </li>
                        <?php
                            $charges=$this->Sales_model->getAllRoomCharges();
                            $pen="";
                            if(count($charges)>0){
                                $pen="(".count($charges).")";
                            }
                        ?>
                        <li class="accordion" <?=$fbs;?>>
                             <a href="#"><i class="glyphicon glyphicon-shopping-cart"></i><span> Food and Beverages <?=$pen;?></span></a>
                             <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?=base_url('point_of_sale');?>">Point of Sales</a></li>
                                <li><a href="<?=base_url('room_charges');?>">Room Charges <?=$pen;?></a></li>
                                <li><a href="<?=base_url('track_invoice');?>">Track Invoice</a></li>
                                <li <?=$addqty;?>><a href="<?=base_url('manage_stock_quantity');?>">Stock Quantity</a></li>                                
                            </ul>
                        </li>
                        <li class="accordion" <?=$reports;?>>
                             <a href="#"><i class="glyphicon glyphicon-file"></i><span> Reports <?=$pen;?></span></a>
                             <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?=base_url('sales_report');?>">Sales Report</a></li>                              
                            </ul>
                        </li>
                        <li class="accordion" <?=$settings;?>>
                            <a href="#"><i class="glyphicon glyphicon-cog"></i><span> Settings</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?=base_url('manage_room');?>">Rooms</a></li>
                                <li><a href="<?=base_url('manage_package');?>">Packages</a></li>
                                <li><a href="<?=base_url('manage_department');?>">Department</a></li>
                                <li><a href="<?=base_url('manage_stocks');?>">Stocks</a></li>
                                <li><a href="<?=base_url('manage_users');?>">Users</a></li>
                                <li><a href="<?=base_url('manage_info');?>">Company Info</a></li>                                
                            </ul>
                        </li>                        
                    </ul>                    
                </div>
            </div>
        </div>
        <!--/span-->