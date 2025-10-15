<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Log me out!</h3>
            </div>
            <div class="modal-body">
                <img  src="<?=base_url('design/img/logout.jpg');?>">
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">No, I will stay</a>
                <a href="<?=base_url('logout');?>" class="btn btn-primary">Yes, Log me out</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ManageDepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_department');?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="department_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Department</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" name="description" class="form-control" required id="department_description">
                </div>                                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ManageUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_users');?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="user_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage User</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" name="fullname" class="form-control" required id="user_fullname">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Department</label>
                    <select name="department" class="form-control" required id="user_dept">
                        <option value="">Select Department</option>
                        <?php
                        $department=$this->General_model->getAllDepartment();
                        foreach($department as $dept){
                            echo "<option value='$dept[description]'>$dept[description]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" required id="user_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Passwod</label>
                    <input type="password" name="password" class="form-control" required id="user_password">
                    <input type="checkbox" onclick="user_password.type =  checked ? 'text' : 'password'"> Show Password
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ManageLogo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_logo');?>" method="POST" enctype="multipart/form-data">                
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Logo</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Logo</label>
                    <input type="file" name="file" class="form-control" required accept="image/*">
                </div>                                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ManageRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_room');?>" method="POST">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Room</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="room_id">
                <div class="form-group">
                    <label for="exampleInputEmail1">Color</label>
                    <input type="text" name="room_color" class="form-control" required id="room_color">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Type</label>
                    <input type="text" name="room_type" class="form-control" required id="room_type">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Rate (Mon-Thu)</label>
                    <input type="text" name="room_rate_weekday" class="form-control" required id="room_rate_weekday">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Rate (Fri-Sun)</label>
                    <input type="text" name="room_rate_weekend" class="form-control" required id="room_rate_weekend">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Excess</label>
                    <input type="text" name="room_excess" class="form-control" required id="room_excess">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Inclusions (Separate with comma ',')</label>
                    <textarea name="room_inclusion" class="form-control" rows="4" id="room_inclusion"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ManageRoomImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_room_image');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="id" id="room_image_id">               
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Room Image</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Room Image</label>
                    <input type="file" name="file" class="form-control" required accept="image/*">
                </div>                                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ManagePackage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_package');?>" method="POST">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Package</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="pack_id">
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" name="description" class="form-control" required id="pack_description">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Rate</label>
                    <input type="text" name="rate" class="form-control" required id="pack_rate">
                </div>                
                <div class="form-group">
                    <label for="exampleInputEmail1">Inclusions (Separate with comma ',')</label>
                    <textarea name="package_inclusion" class="form-control" rows="4" id="pack_inclusion"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="BookRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_reservation');?>" method="POST">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Book a Room</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" name="room_id" id="book_room_id">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input list="fullname" name="fullname" id="browser" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getExistingClient();
                    ?>
                    <datalist id="fullname">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_fullname]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input list="address" name="address" id="browser" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getClientAddress();
                    ?>
                    <datalist id="address">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_address]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Contact No.</label>
                    <input list="contactno" name="contactno" id="browser" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getContactNumber();
                    ?>
                    <datalist id="contactno">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_contactno]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input list="emailadd" name="email" id="browser" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getEmailAddress();
                    ?>
                    <datalist id="emailadd">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_email]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nationality</label>
                    <input list="nationality" name="nationality" id="browser" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getNationality();
                    ?>
                    <datalist id="nationality">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_nationality]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Room Type</label>
                    <p id="book_room_type"></p>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Arrival Date</label>
                    <input type="date" name="arrival_date" class="form-control" required id="book_arrival_date">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Departure Date</label>
                    <input type="date" name="departure_date" class="form-control" required id="book_depart_date">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No of Adult</label>
                    <select name="adult" class="form-control" required>
                        <option value="">Select No. of Adult</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No of Child</label>
                    <select name="child" class="form-control" required>
                        <option value="">Select No. of Child</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Source</label>
                    <select name="source" class="form-control" required>
                        <option value="">Select Source</option>
                        <option value="Walk in">Walk in</option>
                        <option value="Phone call">Phone Call</option>
                        <option value="Messenger">Messenger</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Downpayment</label>
                    <input type="text" name="downpayment" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Payment Mode</label>
                    <select name="paymentmode" class="form-control" required>
                        <option value="">Select Payment Mode</option>
                        <option value="cash">Cash Payment</option>
                        <option value="gcash">GCash</option>
                        <option value="credit">Debit/Credit Payment</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ChangeRoomStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('change_room_hk_status');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="id" id="room_status_id">               
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Status</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Room</label>
                    <p id="room_status_type"></p>
                </div>                                
                <div class="form-group">
                    <label for="exampleInputEmail1">Room Status</label>
                    <select name="status" class="form-control" required id="room_status">
                        <option value="clean">Clean</option>
                        <option value="dirty">Dirty</option>
                        <option value="for inspection">For Inspection</option>
                        <option value="for renovation">For Renovation</option>
                    </select>
                </div>                                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditReservation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('update_reservation');?>" method="POST">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Update Reservation</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="edit_book_id">                
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input list="fullname" name="fullname" id="edit_book_customer" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getExistingClient();
                    ?>
                    <datalist id="fullname">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_fullname]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input list="address" name="address" id="edit_book_address" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getClientAddress();
                    ?>
                    <datalist id="address">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_address]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Contact No.</label>
                    <input list="contactno" name="contactno" id="edit_book_contactno" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getContactNumber();
                    ?>
                    <datalist id="contactno">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_contactno]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input list="emailadd" name="email" id="edit_book_email" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getEmailAddress();
                    ?>
                    <datalist id="emailadd">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_email]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nationality</label>
                    <input list="nationality" name="nationality" id="edit_book_nationality" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getNationality();
                    ?>
                    <datalist id="nationality">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_nationality]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Room Type</label>
                    <p id="book_room_type"></p>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Arrival Date</label>
                    <input type="date" name="arrival_date" class="form-control" required id="edit_book_arrival_date">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Departure Date</label>
                    <input type="date" name="departure_date" class="form-control" required id="edit_book_depart_date">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No of Adult</label>
                    <select name="adult" class="form-control" required id="edit_book_adult">
                        <option value="">Select No. of Adult</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No of Child</label>
                    <select name="child" class="form-control" required id="edit_book_child">
                        <option value="">Select No. of Child</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Source</label>
                    <select name="source" class="form-control" required id="edit_book_source">
                        <option value="">Select Source</option>
                        <option value="Walk in">Walk in</option>
                        <option value="Phone call">Phone Call</option>
                        <option value="Messenger">Messenger</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Downpayment</label>
                    <input type="text" name="downpayment" class="form-control" required id="edit_book_downpayment">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Payment Mode</label>
                    <select name="paymentmode" class="form-control" required id="edit_book_paymentmode">
                        <option value="">Select Payment Mode</option>
                        <option value="cash">Cash Payment</option>
                        <option value="gcash">GCash</option>
                        <option value="credit">Debit/Credit Payment</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>