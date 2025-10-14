<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
<div>
        <ul class="breadcrumb">
            <li>
                <a href="<?=base_url('main');?>">Home</a>
            </li>
            <li>
                <a href="#">Reservation</a>
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
    <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-home"></i> Booking List</h2>

            <div class="box-icon">
                <!-- <a href="#" class="btn btn-setting btn-round btn-default" data-toggle="modal" data-target="#ManagePackage" title="Add New Package"><i class="glyphicon glyphicon-plus"></i></a> -->
                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">    
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
            <thead>
            <tr>                
                <th>Reservation #</th>
                <th>Client Name</th>                            
                <th>Arrival Date</th> 
                <th>Departure Date</th>
                <th>Room</th>
                <th>No. of Guest</th>
                <th>Status</th> 
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($booked as $room){                        
                       
                        echo "<tr>";                            
                            echo "<td>$room[res_id]</td>";                            
                            echo "<td>$room[res_fullname]</td>";                                                        
                            echo "<td>";
                                echo date('m/d/Y',strtotime($room['res_date_arrive']));
                            echo "</td>";
                            echo "<td>";
                                echo date('m/d/Y',strtotime($room['res_date_depart']));
                            echo "</td>";
                            echo "<td>";
                                echo $room['room_type']." ".$room['room_color'];
                            echo "</td>";
                            echo "<td>";
                                echo $room['res_no_guest'];
                            echo "</td>";
                            echo "<td>";
                                echo $room['res_status'];
                            echo "</td>";
                            ?>
                            <td width="13%">
                                <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-primary"><i class="glyphicon glyphicon-th-list"></i> Menu <span
                                                class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?=base_url('print_reg_form/'.$room['res_id']);?>" target="_blank">Registration Form</a></li>
                                            <li><a href="<?=base_url('print_voucher/'.$room['res_id']);?>" target="_blank">Reservation Voucher</a></li>
                                            <li><a href="#">Check In</a></li>
                                            <!-- <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">One more separated link</a></li> -->
                                        </ul>
                                    </li>                                    
                                </ul>
                            </td>
                            <?php
                        echo "</tr>";
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
    <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-home"></i> Check in List</h2>

            <div class="box-icon">
                <!-- <a href="#" class="btn btn-setting btn-round btn-default" data-toggle="modal" data-target="#ManagePackage" title="Add New Package"><i class="glyphicon glyphicon-plus"></i></a> -->
                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">    
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
            <thead>
            <tr>                
                <th>Reservation #</th>
                <th>Client Name</th>                            
                <th>Arrival Date</th> 
                <th>Departure Date</th>
                <th>Room</th>
                <th>No. of Guest</th>
                <th>Status</th> 
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($checkedin as $room){                        
                       
                        echo "<tr>";                            
                            echo "<td>$room[res_id]</td>";                            
                            echo "<td>$room[res_fullname]</td>";                                                        
                            echo "<td>";
                                echo $room['res_date_arrive'];
                            echo "</td>";
                            echo "<td>";
                                echo $room['res_date_depart'];
                            echo "</td>";
                            echo "<td>";
                                echo $room['room_type']." ".$room['room_color'];
                            echo "</td>";
                            echo "<td>";
                                echo $room['res_no_guest'];
                            echo "</td>";
                            echo "<td>";
                                echo $room['res_status'];
                            echo "</td>";
                            ?>
                            <td width="13%">
                            
                            </td>
                            <?php
                        echo "</tr>";
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
    <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-home"></i> Checkout List</h2>

            <div class="box-icon">
                <!-- <a href="#" class="btn btn-setting btn-round btn-default" data-toggle="modal" data-target="#ManagePackage" title="Add New Package"><i class="glyphicon glyphicon-plus"></i></a> -->
                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">    
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
            <thead>
            <tr>                
                <th>Reservation #</th>
                <th>Client Name</th>                            
                <th>Arrival Date</th> 
                <th>Departure Date</th>
                <th>Room</th>
                <th>No. of Guest</th>
                <th>Status</th> 
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($checkedout as $room){                        
                       
                        echo "<tr>";                            
                            echo "<td>$room[res_id]</td>";                            
                            echo "<td>$room[res_fullname]</td>";                                                        
                            echo "<td>";
                                echo $room['res_date_arrive'];
                            echo "</td>";
                            echo "<td>";
                                echo $room['res_date_depart'];
                            echo "</td>";
                            echo "<td>";
                                echo $room['room_type']." ".$room['room_color'];
                            echo "</td>";
                            echo "<td>";
                                echo $room['res_no_guest'];
                            echo "</td>";
                            echo "<td>";
                                echo $room['res_status'];
                            echo "</td>";
                            ?>
                            <td width="13%">
                            
                            </td>
                            <?php
                        echo "</tr>";
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
    <!--/span-->
</div><!--/row-->