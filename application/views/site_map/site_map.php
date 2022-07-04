<?php



$result = $this->db->get('state_id')->result_array();


// var_dump($result);

foreach($result as $state){
    echo $statename_slug = $state['statename_slug'];
    echo $state_id = $state['state_id'];


    $this->db->where('segment_1',$statename_slug);
    $data = array(
        'state_id' => $state_id,
    );
    $this->db->update('meta',$data);


}