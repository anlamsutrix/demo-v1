<?php
class Lang_controller extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    function language() {
        $language = isset($_POST['data']) ? $_POST['data'] : "english";
        $this->load->library('session');
        $this->session->set_userdata('is_bo', TRUE);

        redirect(base_url());
    }
}

