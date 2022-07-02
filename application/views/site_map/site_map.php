<?php



















// for($k = 0 ; $k < 1 ; $k++){
$this->db->where('uri_string_in_meta !=','0');
echo 'uri_string_in_meta !=0 -- '. $count2 = $this->db->get('all_india_po_list')->num_rows();
echo '<br>';
$this->db->where('uri_string_in_meta','0');
echo 'uri_string_in_meta = 0 --'. $count1 = $this->db->get('all_india_po_list')->num_rows();
echo '<br>';

$this->db->limit(1000);
$this->db->where('uri_string_in_meta','0');
$this->db->order_by('sl_no','asc');
// $this->db->where('statename_slug !=','0');
// $this->db->where('Districtname_slug !=','0');

$this->db->select(array('sl_no','uri_string'));
$result = $this->db->get('all_india_po_list')->result_array();
// var_dump($result);

foreach($result as $re){
echo '<br>';
echo $uri_string = $re['uri_string'];
echo '<br>';
echo $sl_no = $re['sl_no'];
echo '<br>';
$this->meta_model->run_meta_for_all_given($uri_string);
    $this->meta_model->meta_for_uri_string_fm($sl_no,$uri_string);
    
    $data1 = array(
        'uri_string_in_meta' => 1,
    );
    $this->db->where('sl_no',$sl_no);
    $this->db->update('all_india_po_list',$data1);
}


$this->db->where('uri_string_in_meta !=','0');
echo 'uri_string_in_meta !=0 -- '. $count2 = $this->db->get('all_india_po_list')->num_rows();
echo '<br>';
$this->db->where('uri_string_in_meta','0');
echo 'uri_string_in_meta = 0 --'. $count1 = $this->db->get('all_india_po_list')->num_rows();
echo '<br>';