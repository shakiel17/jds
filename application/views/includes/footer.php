
<script src="<?=base_url('design/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>

<!-- library for cookie management -->
<script src="<?=base_url('design/js/jquery.cookie.js');?>"></script>
<!-- calender plugin -->
<script src='<?=base_url('design/bower_components/moment/min/moment.min.js');?>'></script>
<script src='<?=base_url('design/bower_components/fullcalendar/dist/fullcalendar.min.js');?>'></script>
<!-- data table plugin -->
<script src='<?=base_url('design/js/jquery.dataTables.min.js');?>'></script>

<!-- select or dropdown enhancer -->
<script src="<?=base_url('design/bower_components/chosen/chosen.jquery.min.js');?>"></script>
<!-- plugin for gallery image view -->
<script src="<?=base_url('design/bower_components/colorbox/jquery.colorbox-min.js');?>"></script>
<!-- notification plugin -->
<script src="<?=base_url('design/js/jquery.noty.js');?>"></script>
<!-- library for making tables responsive -->
<script src="<?=base_url('design/bower_components/responsive-tables/responsive-tables.js');?>"></script>
<!-- tour plugin -->
<script src="<?=base_url('design/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js');?>"></script>
<!-- star rating plugin -->
<script src="<?=base_url('design/js/jquery.raty.min.js');?>"></script>
<!-- for iOS style toggle switch -->
<script src="<?=base_url('design/js/jquery.iphone.toggle.js');?>"></script>
<!-- autogrowing textarea plugin -->
<script src="<?=base_url('design/js/jquery.autogrow-textarea.js');?>"></script>
<!-- multiple file upload plugin -->
<script src="<?=base_url('design/js/jquery.uploadify-3.1.min.js');?>"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="<?=base_url('design/js/jquery.history.js');?>"></script>
<!-- application script for Charisma demo -->
<script src="<?=base_url('design/js/charisma.js');?>"></script>

<script>
    $('.addUser').click(function(){
        document.getElementById('user_id').value='';
        document.getElementById('user_fullname').value='';
        document.getElementById('user_name').value='';
        document.getElementById('user_password').value='';
        document.getElementById('user_dept').value = '';
    });
    $('.editUser').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('user_id').value=id[0];
        document.getElementById('user_fullname').value=id[3];
        document.getElementById('user_name').value=id[1];
        document.getElementById('user_password').value=id[2];
        document.getElementById('user_dept').value=id[4];
        
    });

    $('.addDepartment').click(function(){
        document.getElementById('department_id').value='';
        document.getElementById('department_description').value='';
    });
    $('.editDepartment').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');        
        document.getElementById('department_id').value=id[0];
        document.getElementById('department_description').value=id[1];
    });
   $('.editRoom').click(function(){
		var data=$(this).data('id');	        
        var id=data.split('_');
		
		document.getElementById('room_id').value=id[0];
        document.getElementById('room_color').value=id[1];
        document.getElementById('room_type').value=id[2];
        document.getElementById('room_rate_weekday').value=id[3];
        document.getElementById('room_rate_weekend').value=id[4];
        document.getElementById('room_excess').value=id[5];
        document.getElementById('room_inclusion').value=id[6];
	});

    $('.addRoomImage').click(function(){
        var id=$(this).data('id');
        document.getElementById("room_image_id").value=id;
    });
    $('.addRoom').click(function(){
        document.getElementById('room_id').value='';
        document.getElementById('room_color').value='';
        document.getElementById('room_type').value='';
        document.getElementById('room_rate_weekday').value='';
        document.getElementById('room_rate_weekend').value='';
        document.getElementById('room_excess').value='';
        document.getElementById('room_inclusion').value='';
    });
    $('.addPackage').click(function(){
        document.getElementById('pack_id').value='';
        document.getElementById('pack_description').value='';
        document.getElementById('pack_rate').value='';        
        document.getElementById('pack_inclusion').value='';
    });
    $('.editPackage').click(function(){
		var data=$(this).data('id');	        
        var id=data.split('_');
		document.getElementById('pack_id').value=id[0];
        document.getElementById('pack_description').value=id[1];
        document.getElementById('pack_rate').value=id[2];        
        document.getElementById('pack_inclusion').value=id[3];
	});
    $('.bookRoom').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('book_arrival_date').value = id[0];
        document.getElementById('book_depart_date').value = id[0];
        document.getElementById('book_room_id').value = id[1];
        document.getElementById('book_room_type').innerHTML = id[2];
    });
    $('.changeRoomStatus').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');        
        document.getElementById('room_status_id').value=id[0];
        document.getElementById('room_status_type').innerHTML = id[1];
        document.getElementById('room_status').value = id[2];
    });
    $('.editReservation').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');        
        document.getElementById('edit_book_id').value=id[0];
        document.getElementById('edit_book_customer').value = id[1];
        document.getElementById('edit_book_address').value = id[2];
        document.getElementById('edit_book_contactno').value = id[3];
        document.getElementById('edit_book_email').value = id[4];
        document.getElementById('edit_book_nationality').value = id[5];
        document.getElementById('edit_book_arrival_date').value = id[6];
        document.getElementById('edit_book_depart_date').value = id[7];
        document.getElementById('edit_book_adult').value = id[8];
        document.getElementById('edit_book_child').value = id[9];
        document.getElementById('edit_book_source').value = id[10];
        document.getElementById('edit_book_downpayment').value = id[11];
        document.getElementById('edit_book_paymentmode').value = id[12];
    });
     $('.addCharges').click(function(){
        var id=$(this).data('id');
        document.getElementById("charged_refno").value=id;
    });
    $('.deleteCharges').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');        
        document.getElementById('delete_charge_refno').value=id[0];
        document.getElementById('delete_charge_id').value = id[1];        
    });
    $('.editStocks').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');        
        document.getElementById('stock_code').value=id[0];
        document.getElementById('stock_description').value = id[1];        
        document.getElementById('stock_quantity').value = id[2];        
        document.getElementById('stock_sellingprice').value = id[3];        
        document.getElementById('stock_department').value = id[4];        
        document.getElementById('stock_category').value = id[5];        
    });
    $('.addStocks').click(function(){      
        document.getElementById('stock_code').value='';
        document.getElementById('stock_description').value = '';        
        document.getElementById('stock_quantity').value = '';        
        document.getElementById('stock_sellingprice').value = '';        
        document.getElementById('stock_dept').value = '';        
        document.getElementById('stock_category').value = '';        
    });
    $('.addStockQty').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');        
        document.getElementById('add_stock_code').value=id[0];
        document.getElementById('add_stock_refno').value = id[1];        
        document.getElementById('add_stock_description').innerHTML = id[2];
    });
    $('.addStockImage').click(function(){
        var id=$(this).data('id');
        document.getElementById("stock_image_code").value=id;
    });
</script>


</body>
</html>
