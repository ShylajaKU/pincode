<?php

// create meta for each state/district/officename_only



// officename_only is unique

// create slugs in all_india_po_list
// statename_slug
for($k = 0 ; $k < 7 ; $k++){
$this->db->where('officename_only_slug !=','0');
echo $count2 = $this->db->get('all_india_po_list')->num_rows();
echo '<br>';
$this->db->where('officename_only_slug','0');
echo $count1 = $this->db->get('all_india_po_list')->num_rows();
echo '<br>';

$this->db->limit(1000);
$this->db->where('officename_only_slug','0');

// $this->db->where('statename !=',null);

$this->db->select(array('sl_no','officename_only','officename_only_slug'));
$result = $this->db->get('all_india_po_list')->result_array();
// var_dump($result);

foreach($result as $re){
    $sl_no = $re['sl_no'];
    $statename = $re['officename_only'];
if(!$statename){
    $statename = 0;
}else{

$slug = $statename;

$slug = str_replace('&', 'and', $slug);
$slug = str_replace('(', ' ', $slug);
$slug = str_replace(')', '', $slug);
$slug = ucwords(strtolower($slug));
$slug = str_replace(' ', '-', $slug);
$slug = str_replace('--', '-', $slug);

$slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);

echo $slug;
echo '<br>';
$data = array(
    'officename_only_slug' => $slug,
);
// var_dump($data);

$this->db->where('sl_no',$sl_no);
$this->db->update('all_india_po_list',$data);
}

}
$this->db->where('officename_only_slug !=','0');
echo $count2 = $this->db->get('all_india_po_list')->num_rows();
echo '<br>';
$this->db->where('officename_only_slug','0');
echo $count1 = $this->db->get('all_india_po_list')->num_rows();
echo '<br>';
}
