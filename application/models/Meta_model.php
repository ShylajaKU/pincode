<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meta_model extends CI_Model
{
// ------------------------------------------------------
public function meta_fm(){
    $uri_string = $this->uri->uri_string();
    $base_url = base_url();
    $this->meta_model->uri_checker_on_command_fm($base_url,$uri_string);
}
// ------------------------------------------------------
public function run_meta_for_all_given($uri_string){
    $base_url = base_url();
    $this->meta_model->uri_checker_on_command_fm($base_url,$uri_string);
}
// ------------------------------------------------------
public function uri_checker_on_command_fm($base_url,$uri_string){
    // every uri checked and if available in db then ok
    // else add it to db
        $this->db->where('uri_string', $uri_string);
        $this->db->where('base_url', $base_url);
        $query = $this->db->get('meta');
        $count = $query->num_rows();
        // split the uri string into segments by /
        $uri_string_array = explode('/', $uri_string);
        // print_r($uri_string_array);
        $total_segments = count($uri_string_array);
        // echo $total_segments;
    
        if($count == 0){
            // add to db
            $data = array(
                'base_url' => $base_url,
                'uri_string' => $uri_string,
                'total_segments' => $total_segments,
                );
            $this->db->insert('meta', $data);
            // $this->db->trans_start();
            // $this->db->trans_complete();
            // for multiple inserts
            $sl_no = $this->db->insert_id();
        // }
        
        // $this->db->where('uri_string', $uri_string);
        // $this->db->where('base_url', $base_url);
        // $query = $this->db->get('meta');
        // $sl_no = $query->result_array()[0]['sl_no'];
    
    $i = 1;
    while($i<=$total_segments){
        $seg_value = $uri_string_array[$i-1];
        $this->meta_model->create_column_fm($i);
        $this->meta_model->update_uri_segment_values_fm($i,$seg_value,$sl_no);
        $i++;
    // echo '<br>'.$seg_value.'<br>';
    }
}
    // switch($uri_string_array[0]){
    //     // this is $this->uri->segment(1)
    //     case 'view_shared':
    //         if(!empty($uri_string_array[1])){
    //             $post_id = $uri_string_array[1];
    //         $this->meta_model->meta_for_view_shared_fm($post_id,$sl_no);
    //         }
    //     break;
    // }

    // for pincodes

}
// ------------------------------------------------------
public function create_column_fm($i){
    $exists = $this->meta_model->check_column_exists_fm($i);
    if($exists){
        return true;
    }else{
        $segment_name = 'segment_'.$i;
        if($i == 1){
            $after = 'total_segments';
        }else{
            $after = 'segment_'.($i-1);
        }
        $this->load->dbforge();
        $fields = array(
            $segment_name => array(
                'type' => 'VARCHAR',
                'after' => $after,
                'constraint' => '256',
                // 'null' => false, null = no
                'null' => true,
                'collation' => 'utf8mb4_general_ci',
                )
        );
        $this->dbforge->add_column('meta', $fields);
    }
}
// ------------------------------------------------------
public function check_column_exists_fm($i){
    $segment_name = 'segment_'.$i;
if ($this->db->field_exists($segment_name , 'meta')){
    return true;
}else{
    return false;
}
}
// ------------------------------------------------------
public function update_uri_segment_values_fm($i,$seg_value,$sl_no){
    $segment_name = 'segment_'.$i;
    $data = array(
        $segment_name => $seg_value
    );
    $this->db->where('sl_no', $sl_no);
    $this->db->update('meta', $data);
    // return $sl_no;
}
// ------------------------------------------------------
// ------------------------------------------------------
public function meta_for_pincodes_fm($pincode){
    $this->db->where('pincode',$pincode);
$this->db->limit(1);
$this->db->from('all_india_po_list');
$op = $this->db->get()->result_array();

$array = $op[0];

$a = $officename_only = $array['officename_only'];
$b = $officename = $array['officename'];
$c = $pincode = $array['pincode'];
$d = $regionname = $array['regionname'];
$e = $circlename = $array['circlename'];
$f = $Taluk = $array['Taluk'];
$g = $Districtname = $array['Districtname'];
$h = $statename = $array['statename'];
$i = $Telephone = $array['Telephone'];


$desc = 
        'Pincode : '.$c
        .', PO name : '.$a
        .', Region :'.$d
        .', Circle :'.$e
        .', Taluk : '.$f
        .', District : '.$g
        .', State : '.$h;
    if($i != 'NA'){
        $desc = $desc.', tel : '.$i ;
    }

$desc;

$meta_title = $pincode;
$meta_description = $desc;
$meta_desc_length = strlen($meta_description);
$data = array(
    'meta_title' => $meta_title,
    'meta_description' => $meta_description,
    'meta_desc_len' => $meta_desc_length,
);

$this->db->where('segment_1',$pincode);
$this->db->update('meta',$data);


}
// ------------------------------------------------------
public function meta_for_uri_string_fm($sl_no){
    $this->db->where('sl_no',$sl_no);
// $this->db->limit(1);
$this->db->from('all_india_po_list');
$op = $this->db->get()->result_array();

$array = $op[0];

$a = $officename_only = $array['officename_only'];
$b = $officename = $array['officename'];
$c = $pincode = $array['pincode'];
$d = $regionname = $array['regionname'];
$e = $circlename = $array['circlename'];
$f = $Taluk = $array['Taluk'];
$g = $Districtname = $array['Districtname'];
$h = $statename = $array['statename'];
$i = $Telephone = $array['Telephone'];


$desc = 
        'Pincode : '.$c
        .', PO name : '.$a
        .', Region :'.$d
        .', Circle :'.$e
        .', Taluk : '.$f
        .', District : '.$g
        .', State : '.$h;
    if($i != 'NA'){
        $desc = $desc.', tel : '.$i ;
    }

$desc;

$meta_title = $pincode;
$meta_description = $desc;
$meta_desc_length = strlen($meta_description);
$data = array(
    'meta_title' => $meta_title,
    'meta_description' => $meta_description,
    'meta_desc_len' => $meta_desc_length,
);

$this->db->where('segment_1',$pincode);
$this->db->update('meta',$data);


}
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------

// ------------------------------------------------------
public function get_unique_pincodes_into_pincode_list_table(){
    // for setting pincode in pincode_list table
//   and setting set_in_pincode_list in all_india_po_list table
// purpose get all the pincodes to pincode_list table


for($run = 0 ; $run <=1; $run++){
    echo '<br>';
    $this->db->where('set_in_pincode_list',1);
    echo $count1 = $this->db->get('all_india_po_list')->num_rows();
    echo '<br>';
    
    $this->db->where('set_in_pincode_list',0);
    echo $count = $this->db->get('all_india_po_list')->num_rows();
    echo '<br>';
    echo '<br>';
    
    
    $select = array('sl_no','pincode','set_in_pincode_list');
    $this->db->select($select);
    $this->db->where('set_in_pincode_list','0');
    $this->db->limit(10000);
    $op = $this->db->get('all_india_po_list')->result_array();
    
    // var_dump($op);
    foreach($op as $opt){
    $pincode = $opt['pincode'];
    echo '<br>';
    
    $value = $pincode;
    $value_col_name = 'pincode';
    $table_name = 'pincode_list';
    $present = $this->get_model->check_a_value_present_fm($value,$value_col_name,$table_name);
    if(!$present){
        $data = array(
            'pincode' => $pincode,
        );
        $this->db->insert('pincode_list',$data);
        echo 'pincode added to pincode_list';
        }else{
            $data = array(
                'set_in_pincode_list' => 1,
            );
            $this->db->where('pincode',$pincode);
            $this->db->update('all_india_po_list',$data);
            echo 'all_india_po_list updated';
        }
    }
    
    
    }
    
    
}
// ------------------------------------------------------
public function set_meta_for_pincodes(){
// main use this
    for($k=0 ; $k < 30; $k++){
        $this->db->where('pincode_in_meta_table',1);
        echo $count1 = $this->db->get('pincode_list')->num_rows();
        echo '<br>';
        $this->db->where('pincode_in_meta_table',0);
        echo $count2 = $this->db->get('pincode_list')->num_rows();
        echo '<br>';
        echo '<br>';
        
        
        $this->db->order_by('pincode','asc');
        $this->db->limit(100);
        $this->db->where('pincode_in_meta_table',0);
        $result = $this->db->get('pincode_list')->result_array();
        // var_dump($result);
        
        foreach($result as $pin){
            echo $pincode = $pin['pincode'];
            echo '<br>';
        
            $value = $pincode;
        $value_col_name = 'segment_1';
        $table_name = 'meta';
        $present = $this->get_model->check_a_value_present_fm($value,$value_col_name,$table_name);
        if(!$present){
            echo 'not present';
        echo '<br>';
            $uri_string = $pincode;
        $this->meta_model->run_meta_for_all_given($uri_string);
        $this->meta_model->meta_for_pincodes_fm($pincode);
        
        
        
        $data = array(
            'pincode_in_meta_table' => 1,
        );
        $this->db->where('pincode',$pincode);
        $this->db->update('pincode_list',$data);
        echo '<br>'.'data updated';
        
        
        }else{
            echo 'present';
            $data = array(
                'pincode_in_meta_table' => 1,
            );
            $this->db->where('pincode',$pincode);
            $this->db->update('pincode_list',$data);
            echo '<br>'.'data updated';
        }
        }
        }
}
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
public function get_meta_title_fm($uri_string){
    $this->db->where('uri_string', $uri_string);
    $this->db->select('meta_title');
    $query = $this->db->get('meta');
    $row = $query->row();
    $row_value = $row->meta_title;
    $pattern = '/<a (.*?)href=[\"\'](.*?)\/\/(.*?)[\"\'](.*?)>(.*?)<\/a>/i';
    $new_content = preg_replace($pattern, '', $row_value);
    return $new_content;
    }
// ------------------------------------------------------
public function get_meta_description_fm($uri_string){
    $this->db->where('uri_string', $uri_string);
    $this->db->select('meta_description');
    $query = $this->db->get('meta');
    $row = $query->row();
    $row_value = $row->meta_description;
    $pattern = '/<a (.*?)href=[\"\'](.*?)\/\/(.*?)[\"\'](.*?)>(.*?)<\/a>/i';
    $new_content = preg_replace($pattern, '', $row_value);
    // $5 excludes the a tag description
    return $new_content;
}
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
public function create_statename_slug_in_all_india_po_list_table(){
    
// create slugs in all_india_po_list
// statename_slug
for($k = 0 ; $k < 10 ; $k++){
    $this->db->where('statename_slug','0');
    echo $count1 = $this->db->get('all_india_po_list')->num_rows();
    $this->db->limit(500);
    $this->db->where('statename_slug',0);
    
    $this->db->where('statename !=',null);
    
    $this->db->select(array('sl_no','statename'));
    $result = $this->db->get('all_india_po_list')->result_array();
    // var_dump($result);
    
    foreach($result as $re){
        $sl_no = $re['sl_no'];
        $statename = $re['statename'];
    
    
    $slug = $statename;
    
    $slug = str_replace('&', 'and', $slug);
    $slug = ucwords(strtolower($slug));
    $slug = str_replace(' ', '-', $slug);
    
    $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
    $slug = str_replace('--', '-', $slug);
    echo $slug;
    $data = array(
        'statename_slug' => $slug,
    );
    
    $this->db->where('statename',$statename);
    $this->db->update('all_india_po_list',$data);
    }
    
    
    }
}
// ------------------------------------------------------
// ------------------------------------------------------
public function office_name_only_slug_creater(){
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
        
}
// ------------------------------------------------------
// ------------------------------------------------------
public function best_to_add_slug(){
    
$dis = $this->db->get('district_id')->result_array();
var_dump($dis);

foreach($dis as $d){
echo     $Districtname_slug = $d['Districtname_slug'];
echo $district_id = $d['district_id'];
// echo 
$data = array(
    'Districtname_slug' => $Districtname_slug,
);
$this->db->where('district_id',$district_id);
$this->db->update('all_india_po_list',$data);

}

// $dis = $this->db->get('state_id')->result_array();
// // var_dump($dis);

// foreach($dis as $d){
// echo     $statename_slug = $d['statename_slug'];
// echo $state_id = $d['state_id'];
// // echo 
// $data = array(
//     'statename_slug' => $statename_slug,
// );
// $this->db->where('state_id',$state_id);
// $this->db->update('all_india_po_list',$data);

// }
}
// ------------------------------------------------------
public function make_and_update_uri_string(){
    


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

// $this->db->where('sl_no',$sl_no);
// $this->db->update('all_india_po_list',$data);


}
$this->db->where('uri_string !=','0');
echo 'uri_string !=0 -- '. $count2 = $this->db->get('all_india_po_list')->num_rows();
echo '<br>';
$this->db->where('uri_string','0');
echo 'uri_string = 0 --'. $count1 = $this->db->get('all_india_po_list')->num_rows();
echo '<br>';
// }

}
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------
// ------------------------------------------------------














}