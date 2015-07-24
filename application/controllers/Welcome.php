<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index()
    {
        $this->load->model('Welcome_model');
        $data['query'] = $this->Welcome_model->get_last_ten_entries();
        //$this->load->view('admin/dashboard');
        $this->load->view('test/welcome_message', $data['query'][0]);
    }
    public function add()
    {
       $this->load->model('Welcome_model');

       $data = array(
                'name' => $this->input->post('dname'),
                'address' => $this->input->post('daddress'),
                'date' => time(),
        );
       $this->Welcome_model->insert_entry($data);
       $data['message'] = 'Data Inserted Successfully';
        //Loading View
        $this->load->view('test/welcome_message', $data);
    }
}
