<?php

for($i = 1; $i <= 36; $i++){
echo $i;
$this->db->where('state_id',$i);
$this->db->where('total_segments','3');
// $this->db->where('meta_desc_len != ',null);

    $this->db->limit(2);
    $result = $this->db->get('meta')->result_array();
var_dump($result);
}

// $result = $this->db->get('state_id')->result_array();


// // var_dump($result);

// foreach($result as $state){
//     echo $statename_slug = $state['statename_slug'];
//     echo $state_id = $state['state_id'];


//     $this->db->where('segment_1',$statename_slug);
//     $data = array(
//         'state_id' => $state_id,
//     );
//     $this->db->update('meta',$data);


// }


