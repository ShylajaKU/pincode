<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_controller extends CI_Controller {

//--------------------------------------------------
public function home_fc(){
    $this->form_validation->set_rules('pincode','Pincode','required');
        if(!$this->form_validation->run()){
        $this->load->view('home/home');
        $this->load->view('home/footer');
        }else{
            $pincode = $this->input->post('pincode');
            // echo $pincode;
            redirect($pincode);
        }
}
//--------------------------------------------------
public function search_pincode_fc(){
    //  value is pincode
$value = $this->uri->segment(1);
$data['pincode'] = $value;
$value_col_name = 'pincode';
$table_name = 'all_india_po_list';
$is_pincode_true = $this->get_model->check_a_value_present_fm($value,$value_col_name,$table_name);
$this->form_validation->set_rules('pincode','Pincode','required');
if(!$this->form_validation->run()){

if(!$is_pincode_true){
    $data['valid_pincode'] = false;
    $this->load->view('home/home');
    $this->load->view('search_result/search_result',$data);
    $this->load->view('home/footer');
}else{
    $data['valid_pincode'] = true;
    $table_rows = $this->get_model->get_specific_rows_fm($value,$value_col_name,$table_name);
    $data['table_rows'] = $table_rows;
    // var_dump($table_rows);
    $this->load->view('home/home');
    $this->load->view('search_result/search_result',$data);
    $this->load->view('home/footer');
}
}else{
    $pincode = $this->input->post('pincode');
    redirect($pincode);
}
}
//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------


}