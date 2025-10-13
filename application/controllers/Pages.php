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
}
?>
