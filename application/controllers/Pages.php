<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit','2048M');
date_default_timezone_set('Asia/Manila');
    class Pages extends CI_Controller{

        public function index(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->user_login){
                redirect(base_url('main'));
            }
            $this->load->view('pages/'.$page);                 
        }  
        public function authenticate(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $dept=$this->input->post('dept');
            $data=$this->General_model->authenticate($username,$password,$dept);
            if($data){
                $userdata=array(
                    'username' => $username,
                    'fullname' => $data['fullname'],
                    'dept' => $dept,
                    'user_login' => true
                );
                $this->session->set_userdata($userdata);
                redirect(base_url('main'));
            }else{
                $this->session->set_flashdata('error','Invalid Username and password!');
                redirect(base_url());
            }
        }
        public function logout(){
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('dept');
            $this->session->unset_userdata('user_login');
            redirect(base_url());
        }
        public function main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            if($this->input->post('month')=="" && $this->input->post('year')==""){
                $data['month'] = date('m');
                $data['year'] = date('Y');
            }else{
                $data['month'] = $this->input->post('month');
                $data['year'] = $this->input->post('year');
            }
            
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        } 
        public function manage_department(){
            $page = "manage_department";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['department'] = $this->General_model->getAllDepartment();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_department(){
            $save=$this->General_model->save_department();
            if($save){
                $this->session->set_flashdata('success','Department details successfull saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save department details!');
            }
            redirect(base_url('manage_department'));
        }
        public function delete_department($id){
            $save=$this->General_model->delete_department($id);
            if($save){
                $this->session->set_flashdata('success','Department details successfull deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete department details!');
            }
            redirect(base_url('manage_department'));
        }
        public function manage_users(){
            $page = "manage_users";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['users'] = $this->General_model->getAllUsers();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_users(){
            $save=$this->General_model->save_users();
            if($save){
                $this->session->set_flashdata('success','User details successfull saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save user details!');
            }
            redirect(base_url('manage_users'));
        }
        public function delete_users($id){
            $save=$this->General_model->delete_users($id);
            if($save){
                $this->session->set_flashdata('success','User details successfull deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete user details!');
            }
            redirect(base_url('manage_users'));
        }
        public function manage_info(){
            $page = "manage_info";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['info'] = $this->General_model->getSettings();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_info(){
            $save=$this->General_model->save_info();
            if($save){
                $this->session->set_flashdata('success','Company details successfull saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save company details!');
            }
            redirect(base_url('manage_info'));
        }
        public function save_logo(){
            $save=$this->General_model->save_logo();
            if($save){
                $this->session->set_flashdata('success','Company logo successfull saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save company logo!');
            }
            redirect(base_url('manage_info'));
        }
        public function manage_room(){
            $page = "manage_room";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['rooms'] = $this->General_model->getRooms();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_room(){
            $save=$this->General_model->save_room();
            if($save){
                $this->session->set_flashdata('success','Room details successfull saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save room details!');
            }
            redirect(base_url('manage_room'));
        }
        public function fetchRoom(){
            $id=$this->input->post('id');
            $data=$this->General_model->fetchRoom($id);            
            echo json_encode($data);            
        }
        public function save_room_image(){
            $save=$this->General_model->save_room_image();
            if($save){
                $this->session->set_flashdata('success','Room Picture successfull updated!');
            }else{
                $this->session->set_flashdata('failed','Unable to update room picture!');
            }
            redirect(base_url('manage_room'));
        }
        public function delete_room($id){
            $save=$this->General_model->delete_room($id);
            if($save){
                $this->session->set_flashdata('success','Room details successfull deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete room details!');
            }
            redirect(base_url('manage_room'));
        }
        public function manage_package(){
            $page = "manage_package";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['packages'] = $this->General_model->getPackages();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_package(){
            $save=$this->General_model->save_package();
            if($save){
                $this->session->set_flashdata('success','Package details successfull saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save package details!');
            }
            redirect(base_url('manage_package'));
        }
        public function delete_package($id){
            $save=$this->General_model->delete_package($id);
            if($save){
                $this->session->set_flashdata('success','Package details successfull deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete package details!');
            }
            redirect(base_url('manage_package'));
        }
        public function view_available($date){
            $page = "view_available";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['rooms'] = $this->General_model->getRooms();
            $data['packages'] = $this->General_model->getPackages();
            $data['datearray'] = $date;
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_reservation(){
            $date=$this->input->post('arrival_date');
            $save=$this->Reservation_model->save_reservation();
            if($save){
                redirect(base_url('manage_reservation'));   
            }else{
                $this->session->set_flashdata('failed','Unable to save reservation details!');
                redirect(base_url('view_available/'.$date));
            }
        }
        public function manage_reservation(){
            $page = "manage_reservation";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['booked'] = $this->Reservation_model->getReservation('booked');
            $data['checkedin'] = $this->Reservation_model->getReservation('checkedin');
            $data['checkedout'] = $this->Reservation_model->getReservation('checkedout');

            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function print_reg_form($id){
            $page = "print_reg_form";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['info'] = $this->General_model->getSettings();
            $data['reserve'] = $this->Reservation_model->getSingleReservation($id);                  
            $this->load->view('pages/'.$page,$data);                           
        }
        public function print_voucher($id){
            $page = "print_voucher";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['info'] = $this->General_model->getSettings();
            $data['reserve'] = $this->Reservation_model->getSingleReservation($id);                  
            $this->load->view('pages/'.$page,$data);                           
        }
        public function manage_housekeeping(){
            $page = "manage_housekeeping";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['rooms'] = $this->General_model->getRooms();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function change_room_hk_status(){
            $save=$this->Reservation_model->change_room_hk_status();
            if($save){
                $this->session->set_flashdata('success','Room HK status successfull updated!');
            }else{
                $this->session->set_flashdata('failed','Unable to update room HK status!');
            }
            redirect(base_url('manage_housekeeping'));
        }
        public function update_reservation(){
            $date=$this->input->post('arrival_date');
            $save=$this->Reservation_model->update_reservation();
            if($save){
                $this->session->set_flashdata('success','Reservation details successfully updated!');                   
            }else{
                $this->session->set_flashdata('failed','Unable to update reservation details!');                
            }
            redirect(base_url('manage_reservation'));
        }
        public function cancel_reservation($id){
            $save=$this->Reservation_model->cancel_reservation($id);
            if($save){
                $this->session->set_flashdata('success','Reservation successfull cancelled!');
            }else{
                $this->session->set_flashdata('failed','Unable to cancel reservation!');
            }
            redirect(base_url('manage_reservation'));
        }
        public function check_in($id){
            $save=$this->Reservation_model->check_in($id);
            if($save){
                $this->session->set_flashdata('success','Checked in successfully!');
            }else{
                $this->session->set_flashdata('failed','Unable to check in!');
            }
            redirect(base_url('manage_reservation'));
        }
        public function reservation_details($id){
            $page = "reservation_details";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}            
            $data['reserve'] = $this->Reservation_model->getSingleReservation($id);    
            $data['charges'] = $this->Reservation_model->getAllCharges($id);
            $data['refno'] = $id;
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
}
?>
