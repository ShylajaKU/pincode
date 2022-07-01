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
public function get_selected_data_fm($table_name,$select){
    $this->db->select($select);
    return $this->db->get($table_name)->result_array();
}
// ------------------------------------------------------
public function get_single_value_fm($table_name,$known_value,$known_value_col_name,$op_value_col_name){
    $this->db->from($table_name);
    $this->db->where($known_value_col_name,$known_value);
    $this->db->select($op_value_col_name);
    $result = $this->db->get()->result_array()[0][$op_value_col_name];
    return $result;
}
// ------------------------------------------------------
public function get_row_fm($table_name,$known_value,$known_value_col_name){
    $this->db->where($known_value_col_name,$known_value);
    return $this->db->get($table_name)->result_array();
}
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------

}