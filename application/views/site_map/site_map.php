<?php

// for($i = 1; $i <= 36; $i++){
// echo $i;
// $this->db->where('state_id',$i);
// $this->db->where('total_segments','3');
// // $this->db->where('meta_desc_len != ',null);

//     $this->db->limit(2);
//     $result = $this->db->get('meta')->result_array();
// var_dump($result);
// }

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
// echo $ip = $this->input->ip_address();


// $this->session->set_userdata('hi','dgafhd');
// $this->session->set_userdata('hisdfsd','sdfsdfsd dsfsdfsdfds dsf fd ds d  dfdsfsdfsdfejhrgfhjbwejkgiuetrjikewigfewuf begyufgsduhfvghwegdyufg43y6783 u34784yur yufgsyuhf fuygfhujdsgfyudsgfhjdsgfyusf yufsgyudsfgdsuyfgdsuyfgdsuyfs d8ydsfyusdjfgdsjfgusyfd usdhus dgafhdsdfsdfsdfsdfsdfsdfsdfsdfsd asfsadfasd sdfsadfasdfsdfdsfdsfsdfsdfsdfdsf');
// $this->session->set_userdata('hisdfsdfdsfcsd','sdfsdfsd dsfsdfsdfds dsf fd ds d  dfdsfsdfsdfejhrgfhjbwejkgiuetrjikewigfewuf begyufgsduhfvghwegdyufg43y6783 u34784yur yufgsyuhf fuygfhujdsgfyudsgfhjdsgfyusf yufsgyudsfgdsuyfgdsuyfgdsuyfs d8ydsfyusdjfgdsjfgusyfd usdhus dgafhdsdfsdfsdfsdfsdfsdfsdfsdfsd asfsadfasd sdfsadfasdfsdfdsfdsfsdfsdfsdfdsf');

// var_dump($this->session->userdata());

// $this->db->limit(10);
// $res = $this->db->get('all_india_po_list')->result_array();
// // var_dump($res);
// $sl_no_array = array(); 
// foreach($res as $r){
//     $sl_no = $r['sl_no'];
//     $sl_no_array[] = $sl_no;
// }
// var_dump($sl_no_array);
// // $sl_no_array = array('1','2');

// foreach($sl_no_array as $sl_no){
//     $this->db->where('sl_no',$sl_no);
//     $this->db->select('visiter_count');
//     $visiter_count = $this->db->get('all_india_po_list')->result_array()[0]['visiter_count'];
    
//     $data = array(
//         'visiter_count' => $visiter_count + 1,
//     );
//     $this->db->where('sl_no',$sl_no);
//     $this->db->update('all_india_po_list',$data);
// }

$this->db->where('random_h','0');
$query = $this->db->get('all_india_po_list');
echo $no = $query->num_rows();

$run = ceil($no/10000);
for($j = 0; $j < $run ;$j++){
    $this->db->limit(1000);
$this->db->select('sl_no');
$this->db->where('random_h','0');
$query = $this->db->get('all_india_po_list');
$result = $query->result_array();
foreach($result as $res){
    $sl_no = $res['sl_no'];
    $data = array(
        'random_h' => rand(159,1352),
    );
    $this->db->where('sl_no',$sl_no);
    $this->db->update('all_india_po_list',$data);
}

}
