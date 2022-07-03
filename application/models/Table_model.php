<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table_model extends CI_Model
{
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------

// USE THESE LINES TO RUN THE BELOW CODES

// $this->table_model->add_district_names_to_district_id_table_fm();
// $this->table_model->add_district_id_to_all_india_pincode_table_fm();

// $this->table_model->add_state_names_to_state_id_table_fm();
// $this->table_model->add_state_id_to_all_india_pincode_table_fm();
// ------------------------------------------------------
// ------------------------------------------------------
public function get_a_single_column_and_add_unique_values_to_another_table_fm(
    $source_table_name,
    $select,
    $source_ordered_by,$source_asc_or_desc, 
    $array_lenth, 
    $col_name_of_value_to_get,
    $destination_table_name,
    $unique_no_col_name,
    $col_name_of_value_to_add
    ){
// $unique_no similar to sl_no but me inserted like state_id
$num_of_rows_in_source = $this->db->get($source_table_name)->num_rows();
// how many times do we need to run this code
echo $run_count = ceil($num_of_rows_in_source/$array_lenth);

$this->db->from($destination_table_name);
$this->db->select($unique_no_col_name);
$this->db->order_by($unique_no_col_name,'desc');
$this->db->limit(1);
$query = $this->db->get();
$array_count = $query->num_rows();
if(!$array_count){
    $last_unique_id = 0;
}else{
$array = $query->result_array();
$last_unique_id = $array[0][$unique_no_col_name];
}
$new_unique_id = $last_unique_id + 1;
// $run_count = 1;
for($i = 0; $i < $run_count; $i++){
    $this->db->order_by($source_ordered_by , $source_asc_or_desc);
    $this->db->limit($array_lenth, $i * $array_lenth);
    $this->db->select($select);
    $results = $this->db->get($source_table_name)->result_array();

    // var_dump($results);

        $data = array();
            for($j = 0; $j < count($results); $j++){
                $single_row = $results[$j];
                $value_from_source = $single_row[$col_name_of_value_to_get];
                // echo '<br>';

                    if(!in_array($value_from_source , $data)){
                        if(!empty($value_from_source)){
                            $data[$j] = $value_from_source;
                        }
                    }
                    
            }

        

            
// var_dump($data);
$implode = implode(',',$data);
// var_dump($implode);

$explode = explode(',',$implode);
// var_dump($explode);

        for($k = 0; $k < count($explode); $k++){
            // $unique_no_col_name = $new_unique_id;
            // $col_name_of_value_to_add = $explode[$k];

            $data = array(
                $unique_no_col_name => $new_unique_id,
                $col_name_of_value_to_add => $explode[$k],
            );
            // var_dump($data);
            $this->db->where($col_name_of_value_to_add,$explode[$k]);
            $query = $this->db->get($destination_table_name);
            $num = $query->num_rows();
            if($num ==0){
                $this->db->insert($destination_table_name, $data);
                $new_unique_id++;
            }
            var_dump($data);

        }


    }
}













// ------------------------------------------------------
// ------------------------------------------------------

public function add_district_names_to_district_id_table_fm(){
    
$query = $this->db->get('all_india_po_list');
echo $num_of_rows = $query->num_rows();
echo '<br>';

echo $times = ceil($num_of_rows/5000);
echo '<br>';

$this->db->from('district_id');
$this->db->select('district_id');
$this->db->limit(1);
$this->db->order_by('district_id','desc');
$last_insert_id = $this->db->get()->result_array();
// var_dump( $last_insert_id);
echo $last_id = $last_insert_id[0]['district_id'];
echo '<br>';
$insert_id = $last_id +1;

for ($t = 0; $t < $times; $t++) {

  $this->db->from('all_india_po_list');
  $select = array('sl_no','Districtname');
  $this->db->order_by('statename','asc');
  $this->db->limit(5000,$t*5000);
  $this->db->select($select);
  $results = $this->db->get()->result_array();
  
  
  $data = array();
  for ($i = 0; $i < count($results); $i++) {
      $row = $results[$i];
      if(!in_array($row['Districtname'] ,$data)){
        if(!empty($row['Districtname'])){
      $data[$i] = $row['Districtname'];}
    }
      // $data[$i]['username'] = $row['username'];
  }
  // var_dump(json_encode($data));
  // var_dump($data);
  
  $e = implode(',',$data);
  // echo $e;
  $ex = explode(',',$e);
  // var_dump($ex);
  $c = count($ex);
  // $insert_id = 1;

  for ($i = 0; $i < $c; $i++) {
    $state_id = $insert_id;
    $state = $ex[$i];
    $arr[$i] = array(
      'district_id' => $state_id,
      'Districtname' => $state,
    );
    $arra =  array(
      'district_id' => $state_id,
      'Districtname' => $state,
    );
    $this->db->where('Districtname',$state);
    echo $nm_rows = $this->db->get('district_id')->num_rows();
    if($nm_rows==0){
  $this->db->insert('district_id',$arra);
  $insert_id++;
    }
    // var_dump($arr);
  }
  
  var_dump($arr);
  // $this->db->insert('state_id',$arr);
  
}
}
// ------------------------------------------------------
public function add_district_id_to_all_india_pincode_table_fm(){
    
$query = $this->db->get('all_india_po_list');
echo $num_of_rows = $query->num_rows();
echo $times = ceil($num_of_rows/5000);

for ($t = 1; $t <= $times; $t++) {

$this->db->from('all_india_po_list');
$select = array('sl_no','Districtname');
$this->db->select($select);
// $this->db->order_by('sl_no','desc');
$this->db->where('district_id','0');

$this->db->limit(5000);
$result = $this->db->get()->result_array();
// var_dump($result);

foreach($result as $state){
  echo '<br>';
  $sl_no = $state['sl_no'];
  echo  $statename = $state['Districtname'];
  echo '<br>';

  if($statename != null){
  $this->db->where('Districtname' , $statename);
  $this->db->select('district_id');
  $query = $this->db->get('district_id');
  $result = $query->result_array();

  echo $district_id = $result[0]['district_id'];
  $this->db->where('sl_no',$sl_no);
  $array = array(
    'district_id' => $district_id,
  );
  $this->db->update('all_india_po_list',$array);
}}
echo 'hi';
}
}

// ------------------------------------------------------
// ------------------------------------------------------
public function add_state_names_to_state_id_table_fm(){
    $query = $this->db->get('all_india_po_list');
echo $num_of_rows = $query->num_rows();
echo '<br>';

echo $times = ceil($num_of_rows/5000);
echo '<br>';

$this->db->from('state_id');
$this->db->select('state_id');
$this->db->limit(1);
$this->db->order_by('state_id','desc');
$last_insert_id = $this->db->get()->result_array();
// var_dump( $last_insert_id);
echo $last_id = $last_insert_id[0]['state_id'];
echo '<br>';
$insert_id = $last_id +1;

for ($t = 0; $t < $times; $t++) {

  $this->db->from('all_india_po_list');
  $select = array('sl_no','statename');
  $this->db->order_by('statename','asc');
  $this->db->limit(5000,$t*5000);
  $this->db->select($select);
  $results = $this->db->get()->result_array();
  
  
  $data = array();
  for ($i = 0; $i < count($results); $i++) {
      $row = $results[$i];
      if(!in_array($row['statename'] ,$data)){
        if(!empty($row['statename'])){
      $data[$i] = $row['statename'];}
    }
      // $data[$i]['username'] = $row['username'];
  }
  // var_dump(json_encode($data));
  // var_dump($data);
  
  $e = implode(',',$data);
  // echo $e;
  $ex = explode(',',$e);
  // var_dump($ex);
  $c = count($ex);
  // $insert_id = 1;

  for ($i = 0; $i < $c; $i++) {
    $state_id = $insert_id;
    $state = $ex[$i];
    $arr[$i] = array(
      'state_id' => $state_id,
      'statename' => $state,
    );
    $arra =  array(
      'state_id' => $state_id,
      'statename' => $state,
    );
    $this->db->where('statename',$state);
    echo $nm_rows = $this->db->get('state_id')->num_rows();
    if($nm_rows==0){
  $this->db->insert('state_id',$arra);
  $insert_id++;
    }
    // var_dump($arr);
  }
  
  var_dump($arr);
  // $this->db->insert('state_id',$arr);
  
}
}
// ------------------------------------------------------
public function add_state_id_to_all_india_pincode_table_fm(){
    
$query = $this->db->get('all_india_po_list');
echo $num_of_rows = $query->num_rows();
echo $times = ceil($num_of_rows/5000);
for ($t = 1; $t <= $times; $t++) {
$this->db->from('all_india_po_list');
$select = array('sl_no','statename');
$this->db->select($select);
// $this->db->order_by('statename','asc');
$this->db->where('state_id','0');

$this->db->limit(5000);
$result = $this->db->get()->result_array();
// var_dump($result);

foreach($result as $state){
  echo '<br>';
  $sl_no = $state['sl_no'];
  echo  $statename = $state['statename'];

  if($statename != null){
  $this->db->where('statename' , $statename);
  $this->db->select('state_id');
  $query = $this->db->get('state_id');
  $result = $query->result_array();

  echo $state_id = $result[0]['state_id'];
  $this->db->where('sl_no',$sl_no);
  $array = array(
    'state_id' => $state_id,
  );
  $this->db->update('all_india_po_list',$array);
}}
}
}
// ------------------------------------------------------
public function district_state_id_fm(){
  $dt = $this->db->get('district_id')->result_array();
// var_dump($dt);
foreach($dt as $d){
  $id = $d['district_id'];
  // echo '<br>'.$id;
  $this->db->where('district_id',$id);
  $this->db->from('all_india_po_list');
  $this->db->limit(1);
  $select = array('district_id','Districtname','state_id','statename');
  $this->db->select($select);
  $op = $this->db->get()->result_array();
  var_dump($op[0]);
  $data = $op[0];
  $this->db->insert('district_state_id',$data);
}
}
// ------------------------------------------------------
public function g(){
  // for setting pincode in pincode_list table and setting set_in_pincode_list in all_india_po_list table
  
for($run = 0 ; $run <=1; $run++){
  echo '<br>';
  $this->db->where('set_in_pincode_list',1);
  echo $count1 = $this->db->get('all_india_po_list')->num_rows();
  echo '<br>';
  
  $this->db->where('set_in_pincode_list',0);
  echo $count = $this->db->get('all_india_po_list')->num_rows();
  echo '<br>';
  echo '<br>';
  
  
  $select = array('sl_no','pincode','set_in_pincode_list');
  $this->db->select($select);
  $this->db->where('set_in_pincode_list','0');
  $this->db->limit(10000);
  $op = $this->db->get('all_india_po_list')->result_array();
  
  // var_dump($op);
  foreach($op as $opt){
  $pincode = $opt['pincode'];
  echo '<br>';
  
  $value = $pincode;
  $value_col_name = 'pincode';
  $table_name = 'pincode_list';
  $present = $this->get_model->check_a_value_present_fm($value,$value_col_name,$table_name);
  if(!$present){
      $data = array(
          'pincode' => $pincode,
      );
      $this->db->insert('pincode_list',$data);
      echo 'pincode added to pincode_list';
      }else{
          $data = array(
              'set_in_pincode_list' => 1,
          );
          $this->db->where('pincode',$pincode);
          $this->db->update('all_india_po_list',$data);
          // echo 'all_india_po_list updated';
      }
  }
  
  
  }
  
  
}
// ------------------------------------------------------



}