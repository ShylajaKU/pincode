<?php


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

$base_url = 'https://www.pincodes.ind.in/';

$data = array(
            'base_url' => $base_url,
        );
        $this->db->update('meta',$data);

