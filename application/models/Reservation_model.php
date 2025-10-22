<?php
    date_default_timezone_set('Asia/Manila');
    class Reservation_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        public function getReservation($status){
            $result=$this->db->query("SELECT r.*,rm.room_type,rm.room_color,p.description FROM reservation r LEFT JOIN room rm ON rm.id=r.res_room_id LEFT JOIN package p ON p.id=r.res_room_id WHERE r.res_status='$status' ORDER BY r.res_date_arrive ASC");
            return $result->result_array();
        }
        public function getExistingClient(){
            $result=$this->db->query("SELECT res_fullname FROM reservation GROUP BY res_fullname");
            return $result->result_array();
        }
        public function getNationality(){
            $result=$this->db->query("SELECT res_nationality FROM reservation GROUP BY res_nationality");
            return $result->result_array();
        }
        public function getEmailAddress(){
            $result=$this->db->query("SELECT res_email FROM reservation GROUP BY res_email");
            return $result->result_array();
        }
        public function getContactNumber(){
            $result=$this->db->query("SELECT res_contactno FROM reservation GROUP BY res_contactno");
            return $result->result_array();
        }
        public function getClientAddress(){
            $result=$this->db->query("SELECT res_address FROM reservation GROUP BY res_address");
            return $result->result_array();
        }
        public function save_reservation(){
            $refno=date('YmdHis');
            $room_id=$this->input->post('room_id');
            $fullname=$this->input->post('fullname');
            $address=$this->input->post('address');
            $contactno=$this->input->post('contactno');
            $email=$this->input->post('email');
            $nationality=$this->input->post('nationality');
            $arrival_date=$this->input->post('arrival_date');
            $departure_date=$this->input->post('departure_date');
            $adult=$this->input->post('adult');
            $child=$this->input->post('child');
            $no_guest=$adult." Adult/ ".$child." Child";
            $source=$this->input->post('source');
            $downpayment=$this->input->post('downpayment');
            $paymentmode=$this->input->post('paymentmode');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $arrival_time="14:00:00";
            $departure_time="11:00:00";
            $datetime1 = new DateTime($arrival_date);
            $datetime2 = new DateTime($departure_date);
            $interval = $datetime1->diff($datetime2);
            $no_night=$interval->days;
            $loginuser=$this->session->fullname;
            $query=$this->db->query("SELECT * FROM room WHERE id='$room_id'");
            $r=$query->row_array();
            if(date('w',strtotime($arrival_date)) >= 1 && date('w',strtotime($arrival_date)) <= 4){
                $room_rate=$r['room_rate_weekday'];
            }else if(date('w',strtotime($arrival_date)) == 5 || date('w',strtotime($arrival_date)) == 6 || date('w',strtotime($arrival_date)) == 0){
                $room_rate=$r['room_rate_weekend'];
            }else{
                $room_rate=0;
            }
            $result=$this->db->query("INSERT INTO reservation SET res_id='$refno',res_fullname='$fullname',res_address='$address',res_contactno='$contactno',res_email='$email',res_nationality='$nationality',res_date_arrive='$arrival_date',res_time_arrive='$arrival_time',res_date_depart='$departure_date',res_time_depart='$departure_time',res_book_date='$date',res_book_time='$time',res_no_nights='$no_night',res_no_guest='$no_guest',res_room_id='$room_id',res_room_rate='$room_rate',res_downpayment='$downpayment',res_status='booked',res_user='$loginuser',res_source='$source',res_mode_payment='$paymentmode'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function save_reservation_package(){
            $refno=date('YmdHis');
            $room_id=$this->input->post('room_id');
            $fullname=$this->input->post('fullname');
            $address=$this->input->post('address');
            $contactno=$this->input->post('contactno');
            $email=$this->input->post('email');
            $nationality=$this->input->post('nationality');
            $arrival_date=$this->input->post('arrival_date');
            $departure_date=$this->input->post('departure_date');
            $pax=$this->input->post('pax');            
            $no_guest=$pax;
            $source=$this->input->post('source');
            $downpayment=$this->input->post('downpayment');
            $paymentmode=$this->input->post('paymentmode');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $arrival_time="14:00:00";
            $departure_time="11:00:00";
            $datetime1 = new DateTime($arrival_date);
            $datetime2 = new DateTime($departure_date);
            $interval = $datetime1->diff($datetime2);
            $no_night=$interval->days;
            $loginuser=$this->session->fullname;
            $query=$this->db->query("SELECT * FROM package WHERE id='$room_id'");
            $r=$query->row_array();           
            $room_rate=$r['rate'];
            $result=$this->db->query("INSERT INTO reservation SET res_id='$refno',res_fullname='$fullname',res_address='$address',res_contactno='$contactno',res_email='$email',res_nationality='$nationality',res_date_arrive='$arrival_date',res_time_arrive='$arrival_time',res_date_depart='$departure_date',res_time_depart='$departure_time',res_book_date='$date',res_book_time='$time',res_no_nights='$no_night',res_no_guest='$no_guest',res_room_id='$room_id',res_room_rate='$room_rate',res_downpayment='$downpayment',res_status='booked',res_user='$loginuser',res_source='$source',res_mode_payment='$paymentmode'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function checkAvailableRoom($id,$book_date){
            $result=$this->db->query("SELECT * FROM reservation WHERE res_room_id='$id' AND (res_date_arrive = '$book_date' OR (res_date_depart > '$book_date' AND res_date_arrive < '$book_date')) AND (res_status='booked' OR res_status='checkedin')");
            return $result->result_array();
        }
        public function getSingleReservation($id){
            $result=$this->db->query("SELECT r.*,rm.room_type,rm.room_color,p.description FROM reservation r LEFT JOIN room rm ON rm.id=r.res_room_id LEFT JOIN package p ON p.id=r.res_room_id WHERE r.res_id='$id'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function change_room_hk_status(){
            $room_id=$this->input->post('id');
            $status=$this->input->post('status');
            $result=$this->db->query("UPDATE room SET room_hk_status='$status' WHERE id='$room_id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function update_reservation(){
            $refno=$this->input->post('id');            
            $fullname=$this->input->post('fullname');
            $address=$this->input->post('address');
            $contactno=$this->input->post('contactno');
            $email=$this->input->post('email');
            $nationality=$this->input->post('nationality');
            $arrival_date=$this->input->post('arrival_date');
            $departure_date=$this->input->post('departure_date');
            $adult=$this->input->post('adult');
            $child=$this->input->post('child');
            $no_guest=$adult." Adult/ ".$child." Child";
            $source=$this->input->post('source');
            $downpayment=$this->input->post('downpayment');
            $paymentmode=$this->input->post('paymentmode');
            $date=date('Y-m-d');
            $time=date('H:i:s');            
            $loginuser=$this->session->fullname;
            $result=$this->db->query("UPDATE reservation SET res_fullname='$fullname',res_address='$address',res_contactno='$contactno',res_email='$email',res_nationality='$nationality',res_date_arrive='$arrival_date',res_time_arrive='$arrival_time',res_date_depart='$departure_date',res_time_depart='$departure_time',res_no_guest='$no_guest',res_downpayment='$downpayment',res_status='booked',res_user='$loginuser',res_source='$source',res_mode_payment='$paymentmode' WHERE res_id='$refno'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function update_reservation_package(){
            $refno=$this->input->post('id');            
            $fullname=$this->input->post('fullname');
            $address=$this->input->post('address');
            $contactno=$this->input->post('contactno');
            $email=$this->input->post('email');
            $nationality=$this->input->post('nationality');
            $arrival_date=$this->input->post('arrival_date');
            $departure_date=$this->input->post('departure_date');
            $adult=$this->input->post('pax');
            $no_guest=$adult;
            $source=$this->input->post('source');
            $downpayment=$this->input->post('downpayment');
            $paymentmode=$this->input->post('paymentmode');
            $date=date('Y-m-d');
            $time=date('H:i:s');            
            $loginuser=$this->session->fullname;
            $result=$this->db->query("UPDATE reservation SET res_fullname='$fullname',res_address='$address',res_contactno='$contactno',res_email='$email',res_nationality='$nationality',res_date_arrive='$arrival_date',res_time_arrive='$arrival_time',res_date_depart='$departure_date',res_time_depart='$departure_time',res_no_guest='$no_guest',res_downpayment='$downpayment',res_status='booked',res_user='$loginuser',res_source='$source',res_mode_payment='$paymentmode' WHERE res_id='$refno'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function cancel_reservation($id){
            $result=$this->db->query("UPDATE reservation SET res_status='cancelled' WHERE res_id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function check_in($id){
            $result=$this->db->query("UPDATE reservation SET res_status='checkedin' WHERE res_id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function check_out($id){
            $result=$this->db->query("UPDATE reservation SET res_status='checkedout' WHERE res_id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllCharges($id){
            $result=$this->db->query("SELECT * FROM charged_item WHERE res_id='$id' ORDER BY datearray DESC");
            return $result->result_array();
        }
        public function getAllChargesItem(){
            $result=$this->db->query("SELECT * FROM charges GROUP BY `description`");
            return $result->result_array();
        }
        public function save_charges(){
            $refno=$this->input->post('refno');
            $description=$this->input->post('description');
            $amount=$this->input->post('amount');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $result=$this->db->query("INSERT INTO charged_item SET res_id='$refno',`description`='$description',amount='$amount',datearray='$date',timearray='$time'");
            $check=$this->db->query("SELECT * FROM charges WHERE `description` = '$description'");
            if($check->num_rows() > 0){
                
            }else{
                $this->db->query("INSERT INTO charges SET `description`='$description'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function checkUser($username,$password){
            $result=$this->db->query("SELECT * FROM user WHERE username='$username' AND `password`='$password' AND Access='1'");
            if($result->num_rows()>0){
                return true;
            }else{
                return false;
            }
        }
        public function delete_charges(){            
            $id=$this->input->post('id');            
            $result=$this->db->query("DELETE FROM charged_item WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getPayment($refno){
            $result=$this->db->query("SELECT * FROM reservation_details WHERE res_id='$refno'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function bill_payment(){
            $refno=$this->input->post('refno');
            $totalamount=$this->input->post('totalamount');
            $amount=$this->input->post('amount');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $fullname=$this->session->fullname;
            $result=$this->db->query("INSERT INTO reservation_details SET res_id='$refno',res_amount_due='$totalamount',res_amount_paid='$amount',datearray='$date',timearray='$time',loginuser='$fullname'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }
?>
