
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        echo "asda";exit;
        $this->load->view('admin/dasboard_view');
    }
}