<?php
date_default_timezone_set('Asia/Manila');
    class General_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        public function authenticate($username,$password,$dept){
            if($dept=="admin"){
                $result=$this->db->query("SELECT * FROM `admin` WHERE username='$username' AND `password`='$password'");
            }else{
                $result=$this->db->query("SELECT * FROM `user` WHERE username='$username' AND `password`='$password' AND dept='$dept'");
            }
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function getAllDepartment(){
            $result=$this->db->query("SELECT * FROM department ORDER BY `description` ASC");
            return $result->result_array();
        }
    }
?>