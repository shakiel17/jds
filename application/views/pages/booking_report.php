<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('main');?>">Home</a>
        </li>        
        <li>
            Reservation Report
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
    <div class="box col-lg-4 col-sm-12 col-md-6">                            
        <div class="box-inner">            
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-book"></i> Reservation Report</h2>                                
            </div>
            <?=form_open('generate_booking_report',array('target'=>'_blank'));?>
            <div class="box-content">
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" name="startdate" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" name="enddate" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Report Type</label>
                    <select name="type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="booked">Booking</option>
                        <option value="checkedin">Check In</option>
                        <option value="checkedout">Check Out</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Generate">
                </div>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>