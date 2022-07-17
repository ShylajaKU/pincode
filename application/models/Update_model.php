<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_model extends CI_Model
{
// ------------------------------------------------------
public function visiter_counter_all_india_po_list_fm($sl_no_array){

foreach($sl_no_array as $sl_no){
    $this->db->where('sl_no',$sl_no);
    $this->db->select('visiter_count');
    $visiter_count = $this->db->get('all_india_po_list')->result_array()[0]['visiter_count'];
    
    $data = array(
        'visiter_count' => $visiter_count + 1,
    );
    $this->db->where('sl_no',$sl_no);
    $this->db->update('all_india_po_list',$data);
}


}
// ------------------------------------------------------
public function insert_data_fm($table_name,$data){
    $this->db->insert($table_name,$data);
    return $this->db->insert_id();
}
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
}