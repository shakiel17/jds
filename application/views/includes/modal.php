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