<?php
// --------------------------------------------
// ran this for meta of list-of-all-pincodes-state-wise/
foreach($state_names as $st){
    $statename =  ucwords(strtolower($st['statename']));
    $statename_slug =  $st['statename_slug'];
    echo '<br>';
    echo $uri_string = 'list-of-all-pincodes-state-wise/'.$statename_slug;
    echo '<br>';
    echo $meta_desc = 'List of all the pincodes and post offices of '.$statename;
    echo '<br>';
    echo $meta_title =  $statename.' - List of all post offices & pincodes.';


    $this->meta_model->run_meta_for_all_given($uri_string);
    $meta_desc_length = strlen($meta_desc);
$data = array(
    'meta_title' => $meta_title,
    'meta_description' => $meta_desc,
    'meta_desc_len' => $meta_desc_length,
);
    $this->db->where('uri_string',$uri_string);
    $this->db->update('meta',$data);
}
// --------------------------------------------
// --------------------------------------------
// --------------------------------------------
// --------------------------------------------
