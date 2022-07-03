<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_controller extends CI_Controller {

//--------------------------------------------------
public function contact_fc(){
    $this->load->view('home/header');
    $this->load->view('contact/contact');
    $this->load->view('home/footer');
}
//--------------------------------------------------
public function privacy_policy_fc(){
    $this->load->view('home/header');
    $this->load->view('privacy/privacy_policy');
    $this->load->view('home/footer');
}//--------------------------------------------------
public function list_fc(){
    $this->db->select('headoffice_name');
    $data['headoffice_list'] = $this->db->get('headoffice_list')->result_array();
    $this->db->select('suboffice_name');
    $data['suboffice_list'] = $this->db->get('suboffice_list')->result_array();
    $this->db->select('pincode');
    $data['pincode_list'] = $this->db->get('pincode_list')->result_array();
    $this->load->view('home/header');
        $this->load->view('home/home');
    $this->load->view('home/list',$data);

}
//--------------------------------------------------
public function terms_fc(){
    $this->load->view('home/header');
    $this->load->view('privacy/terms');
    $this->load->view('home/footer');
}//--------------------------------------------------
public function home_fc(){

    
    $this->form_validation->set_rules('pincode','Pincode','required');
        if(!$this->form_validation->run()){
        $this->load->view('home/header');
        $this->load->view('home/home');
        $this->load->view('home/content');
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
    $this->load->view('home/header');
    $this->load->view('home/home');
    $this->load->view('search_result/search_result',$data);
    $this->load->view('home/content');
    $this->load->view('home/footer');
}else{
    $data['valid_pincode'] = true;
    $table_rows = $this->get_model->get_specific_rows_fm($value,$value_col_name,$table_name);
    $data['table_rows'] = $table_rows;
    // var_dump($table_rows);
    $this->load->view('home/header');
    $this->load->view('home/home');
    $this->load->view('search_result/search_result',$data);
    $this->load->view('home/content');
    $this->load->view('home/footer');
}
}else{
    $pincode = $this->input->post('pincode');
    redirect($pincode);
}
}
//--------------------------------------------------
public function search_by_place_fc(){

    $table_name = 'state_id';
    $select = array('state_id','statename');
    $state_names = $this->get_model->get_selected_data_fm($table_name,$select);
    // var_dump($state_names);
    $data['state_names'] = $state_names;
    $this->form_validation->set_rules('state_id','State Name','required');
    if(!$this->form_validation->run()){
    $this->load->view('home/header');
    $this->load->view('home/search_by_place',$data);
    $this->load->view('home/content');
    $this->load->view('home/footer');
    }else{
        $state_id = $this->input->post('state_id');
        $table_name = 'state_id';
    $known_value = $state_id;
    $known_value_col_name = 'state_id';    
    $op_value_col_name = 'statename_slug';    
    $statename = $this->get_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
    // echo $statename;
    // redirect($statename);
    }

}
//--------------------------------------------------
public function state_entered(){
echo    $state_id = $this->input->post('state_id');
$table_name = 'state_id';
$known_value = $state_id;
$known_value_col_name = 'state_id';    
$op_value_col_name = 'statename_slug';    
echo $statename_slug = $this->get_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
    redirect($statename_slug);

}
//--------------------------------------------------
public function state_in_url_fc(){
    $table_name = 'state_id';
    $select = array('state_id','statename');
    $state_names = $this->get_model->get_selected_data_fm($table_name,$select);
    // var_dump($state_names);
    $data['state_names'] = $state_names;

$value = $state_slug = $this->uri->segment(1);
$value_col_name = 'statename_slug';
$table_name = 'state_id';
$is_true = $this->get_model->check_a_value_present_fm($value,$value_col_name,$table_name);
if(!$is_true){redirect('search-by-place');}

$table_name = 'state_id';
$known_value = $state_slug;
$known_value_col_name = 'statename_slug';    
$op_value_col_name = 'state_id';    
$state_id = $this->get_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
$data['state_id'] = $state_id;

$table_name = 'state_id';
$known_value = $state_id;
$known_value_col_name = 'state_id';    
$op_value_col_name = 'statename_slug';    
$statename = $this->get_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);

$table_name = 'district_state_id';
$value = $state_id; $value_col_name = 'state_id';
$data['district_names'] = $this->get_model->get_specific_rows_fm($value,$value_col_name,$table_name);
// var_dump($data['district_names']);
$this->load->view('home/header');
$this->load->view('home/search_by_place',$data);
$this->load->view('home/footer');

}
//--------------------------------------------------
public function district_entered(){
    echo $uri1 = $this->uri->segment(1);
    echo $known_value = $district_id = $this->input->post('district_id');
    $known_value_col_name = $table_name = 'district_id';
    $op_value_col_name = 'Districtname_slug';
    echo $Districtname_slug = $this->get_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
    redirect($uri1.'/'.$Districtname_slug);
}
//--------------------------------------------------
public function district_in_url_fc(){
    $table_name = 'state_id';
    $select = array('state_id','statename');
    $state_names = $this->get_model->get_selected_data_fm($table_name,$select);
    // var_dump($state_names);
    $data['state_names'] = $state_names;

    
$value = $state_slug = $this->uri->segment(1);
$value_col_name = 'statename_slug';
$table_name = 'state_id';
$is_true = $this->get_model->check_a_value_present_fm($value,$value_col_name,$table_name);
if(!$is_true){redirect('search-by-place');}
$value = $Districtname_slug = $this->uri->segment(2);
$value_col_name = 'Districtname_slug';
$table_name = 'district_id';
$is_true = $this->get_model->check_a_value_present_fm($value,$value_col_name,$table_name);
if(!$is_true){redirect('search-by-place');}

$table_name = 'state_id';
$known_value = $state_slug;
$known_value_col_name = 'statename_slug';    
$op_value_col_name = 'state_id';    
$state_id = $this->get_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
$data['state_id'] = $state_id;

$table_name = 'district_state_id';
$value = $state_id;
$value_col_name = 'state_id';
$data['district_names'] = $this->get_model->get_specific_rows_fm($value,$value_col_name,$table_name);


$Districtname_slug = $this->uri->segment(2);

$table_name = 'district_id';
$known_value = $Districtname_slug;
$known_value_col_name = 'Districtname_slug';
$op_value_col_name = 'district_id';
$district_id = $this->get_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
$data['district_id'] = $district_id;

$value = $district_id;
$value_col_name = 'district_id';
$table_name = 'all_india_po_list';
$data['officenames'] = $this->get_model->get_specific_rows_fm($value,$value_col_name,$table_name);



$this->load->view('home/header');
$this->load->view('home/search_by_place',$data);
$this->load->view('home/footer');


}
//--------------------------------------------------
public function po_entered(){
    echo $uri1 = $this->uri->segment(1);
    echo $uri2 = $this->uri->segment(2);
    echo $known_value = $po_sl_no = $this->input->post('po_sl_no');
    // $this->session->set_userdata('po_sl_no',$po_sl_no);
    $table_name = 'all_india_po_list';
    $known_value_col_name = 'sl_no';
    $op_value_col_name = 'officename_only_slug';
    echo $officename_only_slug = $this->get_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);

    redirect($uri1.'/'.$uri2.'/'.$officename_only_slug);
}
//--------------------------------------------------
public function po_in_url_fc(){
    $table_name = 'state_id';
    $select = array('state_id','statename');
    $state_names = $this->get_model->get_selected_data_fm($table_name,$select);
    // var_dump($state_names);
    $data['state_names'] = $state_names;

    
$value = $state_slug = $this->uri->segment(1);
$value_col_name = 'statename_slug';
$table_name = 'state_id';
$is_true = $this->get_model->check_a_value_present_fm($value,$value_col_name,$table_name);
if(!$is_true){redirect('search-by-place');}
$value = $Districtname_slug = $this->uri->segment(2);
$value_col_name = 'Districtname_slug';
$table_name = 'district_id';
$is_true = $this->get_model->check_a_value_present_fm($value,$value_col_name,$table_name);
if(!$is_true){redirect('search-by-place');}
$value = $officename_only_slug = $this->uri->segment(3);
$value_col_name = 'officename_only_slug';
$table_name = 'all_india_po_list';
$is_true = $this->get_model->check_a_value_present_fm($value,$value_col_name,$table_name);
if(!$is_true){redirect('search-by-place');}


$table_name = 'state_id';
$known_value = $state_slug;
$known_value_col_name = 'statename_slug';    
$op_value_col_name = 'state_id';    
$state_id = $this->get_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
$data['state_id'] = $state_id;

$table_name = 'district_state_id';
$value = $state_id;
$value_col_name = 'state_id';
$data['district_names'] = $this->get_model->get_specific_rows_fm($value,$value_col_name,$table_name);


$Districtname_slug = $this->uri->segment(2);
$table_name = 'district_id';
$known_value = $Districtname_slug;
$known_value_col_name = 'Districtname_slug';
$op_value_col_name = 'district_id';
$district_id = $this->get_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
$data['district_id'] = $district_id;

$value = $district_id;
$value_col_name = 'district_id';
$table_name = 'all_india_po_list';
$data['officenames'] = $this->get_model->get_specific_rows_fm($value,$value_col_name,$table_name);


$officename_only_slug = $this->uri->segment(3);
$table_name = 'all_india_po_list';
$known_value = $officename_only_slug;
$known_value_col_name = 'officename_only_slug';
$op_value_col_name = 'sl_no';
$sl_no = $this->get_model->get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name);
$data['po_sl_no'] = $sl_no;
$po_sl_no = $sl_no;

// $po_sl_no = $this->session->userdata('po_sl_no');
// $data['po_sl_no'] = $po_sl_no;

$table_name = 'all_india_po_list';
$known_value = $po_sl_no;
$known_value_col_name = 'sl_no';

$pincode_row = $this->get_model->get_row_fm($table_name,$known_value,$known_value_col_name);
// var_dump($pincode_row);
$data['table_rows'] = $pincode_row;
$data['valid_pincode'] = true;


$this->load->view('home/header');
$this->load->view('home/search_by_place',$data);
// $table_rows  $valid_pincode for search result page
$this->load->view('search_result/search_result');
$this->load->view('home/content');
$this->load->view('home/footer');

}
//--------------------------------------------------
//--------------------------------------------------


}