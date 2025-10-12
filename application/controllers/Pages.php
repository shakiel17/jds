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
        
}
?>
