<?php




























// create meta for each state/district/officename_only



// officename_only is unique

// create slugs in all_india_po_list
// statename_slug
// for($k = 0 ; $k < 1 ; $k++){
$this->db->where('uri_string !=','0');
echo 'uri_string !=0 -- '. $count2 = $this->db->get('all_india_po_list')->num_rows();
echo '<br>';
$this->db->where('uri_string','0');
echo 'uri_string = 0 --'. $count1 = $this->db->get('all_india_po_list')->num_rows();
echo '<br>';

$this->db->limit(1000);
$this->db->where('uri_string','0');
$this->db->order_by('sl_no','asc');
// $this->db->where('statename_slug !=','0');
// $this->db->where('Districtname_slug !=','0');

$this->db->select(array('sl_no','statename_slug','Districtname_slug','officename_only_slug'));
$result = $this->db->get('all_india_po_list')->result_array();
// var_dump($result);

foreach($result as $re){
echo '<br>';
echo    $sl_no = $re['sl_no'];
echo '<br>';
echo    $statename_slug = $re['statename_slug'];
echo '<br>';

echo    $Districtname_slug = $re['Districtname_slug'];
echo '<br>';

echo    $officename_only_slug = $re['officename_only_slug'];
echo '<br>';

$uri_string = $statename_slug.'/'.$Districtname_slug.'/'.$officename_only_slug;

if(!$statename_slug){
    $uri_string = '0';
}
echo $uri_string;
$data = array(
    'uri_string' => $uri_string,
);
// var_dump($data);

$this->db->where('sl_no',$sl_no);
$this->db->update('all_india_po_list',$data);


}
$this->db->where('uri_string !=','0');
echo 'uri_string !=0 -- '. $count2 = $this->db->get('all_india_po_list')->num_rows();
echo '<br>';
$this->db->where('uri_string','0');
echo 'uri_string = 0 --'. $count1 = $this->db->get('all_india_po_list')->num_rows();
echo '<br>';
// }
