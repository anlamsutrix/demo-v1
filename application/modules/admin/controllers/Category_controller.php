
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_controller extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->library('form_validation');
        $this->load->helper('language');
        $this->load->library('session');
    }
    public function index()
    {

        $data['query'] = $this->Category_model->get_cate();
        $this->load->view('admin/cate/index', $data);
    }
    public function add()
    {
        if($this->input->post('submit')){
            
            $this->form_validation->set_rules('name', 'name', 'required');
//            echo $data['requi'];exit;
            $value = array(
                    'name' => $this->input->post('name'),
                    'active' => 'Y',
                    'date' => time(),
            );
            if ($this->form_validation->run() == FALSE)
            {

                $this->load->view('admin/cate/add',$oops);
            }
            else
            {
                $this->Category_model->insert_cate($value);
                $this->load->view('admin/cate/add', $data);
                $data['message'] = 'Data Inserted Successfully';
            }

        }  else {
            $this->load->view('admin/cate/add');
        }

    }
    public function update($id)
    {
       $data['query'] = $this->Category_model->get_cate_by_id($id);
       if($this->input->post('name')){
           $value = array(
                    'name' => $this->input->post('name'),
                    'date' => time(),
            );
           $this->Category_model->update_cate($value, $id);
           $data['message'] = 'Data Updated Successfully';
           $this->load->helper('url');
           redirect('admin/dashboard', 'refresh');
       }
       $this->load->view('admin/cate/update', $data);
    }
}