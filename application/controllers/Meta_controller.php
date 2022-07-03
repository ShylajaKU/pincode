<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meta_controller extends CI_Controller {

//--------------------------------------------------
public function site_map_fc(){
    $this->load->view('home/header');
    $this->load->view('site_map/site_map');



    // $this->meta_model->run_meta_for_all_given($uri_string);
    // $this->meta_model->meta_for_pincodes_fm($pincode);
}
//--------------------------------------------------

//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------

}