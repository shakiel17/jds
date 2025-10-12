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
        public function save_department(){
            $id=$this->input->post('id');
            $description=$this->input->post('description');
            $check=$this->db->query("SELECT * FROM department WHERE `description`='$description' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO department(`description`) VALUES('$description')");
                }else{
                    $result=$this->db->query("UPDATE department SET `description`='$description' WHERE id='$id'");
                }
                if($result){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function delete_department($id){
            $result=$this->db->query("DELETE FROM department WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function getAllUsers(){
            $result=$this->db->query("SELECT * FROM user ORDER BY `fullname` ASC");
            return $result->result_array();
        }
        public function save_users(){
            $id=$this->input->post('id');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $fullname=$this->input->post('fullname');
            $department=$this->input->post('department');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $check=$this->db->query("SELECT * FROM user WHERE `username`='$username' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO user(`username`,`password`,`fullname`,`dept`,datearray,timearray) VALUES('$username','$password','$fullname','$department','$date','$time')");
                }else{
                    $result=$this->db->query("UPDATE user SET `username`='$username',`password`='$password',fullname='$fullname',dept='$department' WHERE id='$id'");
                }
                if($result){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function delete_users($id){
            $result=$this->db->query("DELETE FROM user WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }
?>