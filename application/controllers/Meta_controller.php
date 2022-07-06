<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meta_controller extends CI_Controller {

//--------------------------------------------------
public function site_map_fc(){
    $this->load->view('home/header');
    $this->load->view('site_map/site_map');

    
// $this->load->library('calendar');
// echo $this->calendar->generate();

// echo $this->calendar->generate(2006, 6);

// $data = array(
//     3  => 'http://example.com/news/article/2006/06/03/',
//     7  => 'http://example.com/news/article/2006/06/07/',
//     13 => 'http://example.com/news/article/2006/06/13/',
//     26 => 'http://example.com/news/article/2006/06/26/'
// );

// echo $this->calendar->generate(2006, 6, $data);

// $prefs = array(
//     'start_day'    => 'saturday',
//     'month_type'   => 'long',
//     'day_type'     => 'short'
// );

// $this->load->library('calendar', $prefs);

// echo $this->calendar->generate();

// $prefs = array(
//     'show_next_prev'  => TRUE,
//     'next_prev_url'   => 'http://example.com/index.php/calendar/show/'
// );

// $this->load->library('calendar', $prefs);

// echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));




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