<?php
date_default_timezone_set('Asia/Manila');
    class Sales_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        public function getAllStocks(){
            $dept=$this->session->dept;
            if($this->session->dept=="admin"){
                $result=$this->db->query("SELECT * FROM stocks ORDER BY `description` ASC");
            }else{
                $result=$this->db->query("SELECT * FROM stocks WHERE dept='$dept' ORDER BY `description` ASC");
            }
            return $result->result_array();
        }
        public function save_stocks(){
            $code=$this->input->post('code');
            $description=$this->input->post('description');
            $quantity=$this->input->post('quantity');
            $sellingprice=$this->input->post('sellingprice');
            $dept=$this->input->post('department');
            $category=$this->input->post('category');
            $check=$this->db->query("SELECT * FROM stocks WHERE `description`='$description' AND code <> '$code'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($code==""){
                    $code=date('YmdHis');
                    $result=$this->db->query("INSERT INTO stocks SET code='$code',`description`='$description',quantity='$quantity',sellingprice='$sellingprice',dept='$dept',category='$category'");
                }else{
                    $result=$this->db->query("UPDATE stocks SET `description`='$description',sellingprice='$sellingprice',dept='$dept',category='$category' WHERE code='$code'");
                }            
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllCategory(){
            $result=$this->db->query("SELECT category FROM stocks GROUP BY category");
            return $result->result_array();
        }
        public function delete_stocks($code){
            $result=$this->db->query("DELETE FROM stocks WHERE code='$code'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function add_stock_quantity(){
            $code=$this->input->post('code');
            $refno=$this->input->post('refno');
            $quantity=$this->input->post('quantity');
            $query=$this->db->query("SELECT * FROM stocks WHERE code='$code'");
            $row=$query->row_array();
            $itemqty=$row['quantity'];
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $newqty=$itemqty+$quantity;
            if($quantity > 0){                
                $addResult=$this->db->query("INSERT INTO stock_in SET code='$code',trans_id='$refno',quantity='$quantity',datearray='$date',timearray='$time'");
                if($addResult){
                    $result=$this->db->query("UPDATE stocks SET quantity='$newqty' WHERE code='$code'");
                    if($result){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }        

        }
        public function save_stock_image(){
            $code=$this->input->post('code');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("UPDATE stocks SET img='$imgContent' WHERE code='$code'");
                if($result){
                    return true;
                }else{
                    return false;
                }
            }else{
                    return false;
            }
        }
        public function getAllStocksByCategory(){
            $dept=$this->session->dept;
            if($this->session->dept=="admin"){
                $result=$this->db->query("SELECT * FROM stocks GROUP BY category ORDER BY category ASC");
            }else{
                $result=$this->db->query("SELECT * FROM stocks WHERE dept='$dept' GROUP BY category ORDER BY category ASC");
            }
            return $result->result_array();
        }
        public function getItemByCategory($category){
            $dept=$this->session->dept;
            if($this->session->dept=="admin"){
                $result=$this->db->query("SELECT * FROM stocks WHERE category='$category' ORDER BY `description` ASC");
            }else{
                $result=$this->db->query("SELECT * FROM stocks WHERE dept='$dept' aND category='$category' ORDER BY `description` ASC");
            }
            return $result->result_array();
        }
    }
?>