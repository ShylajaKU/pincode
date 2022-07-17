<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Treasure_controller extends CI_Controller {

//-------------------------------------------
public function enter_your_email_fc(){
    $this->form_validation->set_rules('email','Email','required');
    if(!$this->form_validation->run()){
        $this->load->view('home/header');
        $this->load->view('treasure/treasure_home');
    }else{
        $email = $this->input->post('email');
        echo $email .'<br>';
        $ip = $this->input->ip_address();
        echo $ip .'<br>';

        $data = array(
            'email' => $email,
            'ip' => $ip,
            'timestamp' => now('asia/calcutta'),
        );
        $this->db->where('email',$email);
        $this->db->order_by('sl_no','desc');
        $query = $this->db->get('treasure_hunt');
        $num = $query->num_rows();
        $res = $query->result_array();
        if($num != 0){
        echo $ts = $res[0]['timestamp'];
        echo '<br>';
        echo $hour = $ts + 3;
        echo '<br>';
        echo $cur = now('asia/calcutta');
        echo '<br>';
            if($cur > $hour){
                // 1 hour expired
        echo $sl_no = $this->update_model->insert_data_fm('treasure_hunt',$data);
        $this->session->set_userdata('sl_no',$sl_no);
        var_dump($this->session->userdata());
            }

        }else{
        echo $sl_no = $this->update_model->insert_data_fm('treasure_hunt',$data);
        $this->session->set_userdata('sl_no',$sl_no);
        var_dump($this->session->userdata());
        // $table_name = 'treasure_hunt';
        // $known_value = $this->session->userdata('sl_no');
        // $known_value_col_name = 'sl_no';
        // $op_value_col_name = 'timestamp';
        // echo $timestamp = $this->get_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
        // echo $cur = now('asia/calcutta');
        }
    }
}
//-------------------------------------------
//-------------------------------------------
//-------------------------------------------
//-------------------------------------------
//-------------------------------------------
//-------------------------------------------
//-------------------------------------------
//-------------------------------------------

}