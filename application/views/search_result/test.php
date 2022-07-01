<?php

// $dt = $this->db->get('district_id')->result_array();
// // var_dump($dt);
// foreach($dt as $d){
//   $id = $d['district_id'];
//   // echo '<br>'.$id;
//   $this->db->where('district_id',$id);
//   $this->db->from('all_india_po_list');
//   $this->db->limit(1);
//   $select = array('district_id','Districtname','state_id','statename');
//   $this->db->select($select);
//   $op = $this->db->get()->result_array();
//   var_dump($op[0]);
//   $data = $op[0];
//   $this->db->insert('district_state_id',$data);
// }
//-----------------------------------------------------
$st = $this->db->get('district_state_id')->result_array();
// var_dump($st);
 foreach($st as $state){
  var_dump($state);
  $slug = $statename = $state['statename'];
$slug = str_replace('&', 'and', $slug);
$slug = ucwords(strtolower($slug));
$slug = str_replace(' ', '-', $slug);

$slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
$slug = str_replace('--', '-', $slug);
echo $slug;
echo $state_id = $state['district_id'];
$data = array('statename_slug' => $slug);
$this->db->where('district_id',$state_id);
$this->db->update('district_state_id',$data);
 }
// -------------------------------------------------------------

