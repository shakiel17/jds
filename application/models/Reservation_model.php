<?php
    date_default_timezone_set('Asia/Manila');
    class Reservation_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        public function getReservation($status){
            $result=$this->db->query("SELECT r.*,rm.room_type,rm.room_color FROM reservation r LEFT JOIN room rm ON rm.id=r.res_room_id WHERE r.res_status='$status' ORDER BY r.res_date_arrive ASC");
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
    }
?>
