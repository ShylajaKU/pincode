<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_model extends CI_Model
{
// ------------------------------------------------------
public function check_a_value_present_fm($value,$value_col_name,$table_name){
    $this->db->where($value_col_name,$value);
    $query = $this->db->get($table_name);
    $num_rows = $query->num_rows();
    if(!$num_rows){
        return false;
    }else{
        return true;
    }
}
// ------------------------------------------------------
public function get_specific_rows_fm($value,$value_col_name,$table_name){
    $this->db->where($value_col_name,$value);
    $query = $this->db->get($table_name);
    return $result = $query->result_array();
}
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------

}