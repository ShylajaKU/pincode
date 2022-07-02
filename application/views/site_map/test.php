<?php
set_time_limit(500);
$this->db->where('set_in_pincode_list','0');
$count = $this->db->get('all_india_po_list')->num_rows();
echo $count;
echo '<br>';
// $count = 100;
$array_size = 1000;

echo $how_many_runs = ceil($count/$array_size);

for($i=0 ;$i <= $how_many_runs ; $i++){

$select = array('sl_no','pincode');
$this->db->select($select);
$this->db->where('set_in_pincode_list','0');
$skip = $array_size * $i;
$this->db->limit($array_size,$skip);
$op = $this->db->get('all_india_po_list')->result_array();
// var_dump($op);

for($j=0; $j < $array_size; $j++ ){
echo $pincode = $op[$j]['pincode'];
echo '<br>';
$value = $pincode;
$value_col_name = 'pincode';
$table_name = 'pincode_list';
$present = $this->get_model->check_a_value_present_fm($value,$value_col_name,$table_name);
if(!$present){
$data = array(
    'pincode' => $pincode,
);
// $this->db->insert('pincode_list',$data);

}
// $uri_string = $pincode;
// $this->meta_model->run_meta_for_all_given($uri_string);
// $this->meta_model->meta_for_pincodes_fm($pincode);

}
$data1 = array(
    'set_in_pincode_list' => 1,
);
$this->db->where('pincode',$pincode);

$this->db->update('all_india_po_list',$data1);

}



// set_in_pincode_list boolean in all_india_po_list

?>


<?php 

// $query = $this->db->get('all_india_po_list');
// echo $num_of_rows = $query->num_rows();
// echo '<br>';
// $array_size = 10;
// echo $no_of_runs = ceil($num_of_rows/$array_size);
// echo '<br>';

// $this->db->from('pincode_list');
// $this->db->select('sl_no');
// $this->db->limit(1);
// $this->db->order_by('sl_no','desc');
// $last_insert_id = $this->db->get()->result_array();
// var_dump( $last_insert_id);
// if(empty($last_insert_id)){
//     $last_id = 0;
// }else{
// echo $last_id = $last_insert_id[0]['sl_no'];
// }
// echo '<br>';
// echo $insert_id = $last_id +1;

// for ($t = 0; $t < $no_of_runs; $t++) {
//   $this->db->from('all_india_po_list');
//   $select = array('sl_no','pincode');
//   $this->db->order_by('pincode','asc');
//   $this->db->limit($array_size,$t*$array_size);
//   $this->db->select($select);
//   $results = $this->db->get()->result_array();
//   var_dump($results);
  
//   $data = array();
//   for ($i = 0; $i < count($results); $i++) {
//       $row = $results[$i];
//       if(!in_array($row['pincode'] ,$data)){
//         if(!empty($row['pincode'])){
//       $data[$i] = $row['pincode'];}
//     }
//       // $data[$i]['username'] = $row['username'];
//   }
// break;

//   // var_dump(json_encode($data));
//   // var_dump($data);
  
//   $e = implode(',',$data);
//   // echo $e;
//   $ex = explode(',',$e);
//   // var_dump($ex);
//   $c = count($ex);
//   // $insert_id = 1;

//   for ($i = 0; $i < $c; $i++) {
//     $state_id = $insert_id;
//     $state = $ex[$i];
//     $arr[$i] = array(
//       'district_id' => $state_id,
//       'Districtname' => $state,
//     );
//     $arra =  array(
//       'district_id' => $state_id,
//       'Districtname' => $state,
//     );
//     $this->db->where('Districtname',$state);
//     echo $nm_rows = $this->db->get('district_id')->num_rows();
//     if($nm_rows==0){
//   $this->db->insert('district_id',$arra);
//   $insert_id++;
//     }
//     // var_dump($arr);
//   }
  
//   var_dump($arr);
//   // $this->db->insert('state_id',$arr);
  
// }





// $this->db->where('meta_desc_len',null);
// $res = $this->db->get('meta')->result_array();
// var_dump($res);

// foreach($res as $r){
//     $sl_no = $r['sl_no'];
//     $this->db->where('sl_no',$sl_no);
//     $data = array(
//         'visibility' => 0,
//     );
//     $this->db->update('meta',$data);
// }

// echo base_url();

// $base_url = 'https://www.pincodes.ind.in/';

// $data = array(
//             'base_url' => $base_url,
//         );
//         $this->db->update('meta',$data);

