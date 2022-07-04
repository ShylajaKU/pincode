<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

//--------------------------------------------------
public function login(){
    $this->form_validation->set_rules('admin_pass','Key','required');
    if($this->form_validation->run() == false){
    $this->load->view('home/header');
    $this->load->view('admin/login');
    $this->load->view('home/footer');
    }else{
        $pass = $this->input->post('admin_pass');
        $query = $this->db->where('pass',$pass)
                ->from('super_admin')
                ->get();
        $num_rows = $query->num_rows();
        if($num_rows == 1){
            $this->session->set_userdata('admin','1');
            redirect('admin');
        }else{
            $this->session->set_userdata('admin','0');
            redirect(base_url());
        }
    }
}
//--------------------------------------------------
public function admin(){
    $admin = $this->session->userdata('admin');
    if(!$admin){redirect(base_url());}

    $this->load->view('home/header');
    $this->load->view('admin/admin');
    $this->load->view('home/footer');
}
//--------------------------------------------------
public function add_gk(){
    if(!$this->session->userdata('admin')){redirect(base_url());}
    // $this->form_validation->set_rules('question','Q','required');
    $this->form_validation->set_rules('answer','A','required');

    if($this->form_validation->run() == false){
        $this->db->order_by('sl_no','desc');
        $this->db->limit(10);
        $data['qa'] = $this->db->get('gk_qa')->result_array();
    $this->load->view('home/header');
    $this->load->view('admin/add_gk',$data);
    $this->load->view('home/footer');
    }else{
        $question = $this->input->post('question');
        $answer = $this->input->post('answer');
        echo $random_no = rand(1,20);
        $data = array(
            'random_no' => $random_no,
            'question' => $question,
            'answer' => $answer,
        );
        $this->db->insert('gk_qa',$data);
        redirect('add-gk-qa');
    }
}
//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------



}