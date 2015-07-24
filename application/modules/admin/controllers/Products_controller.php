
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Products_model');
        $this->load->model('Category_model');
        $this->load->helper("url");
        $this->load->library('pagination');
    }
    public function index()
    {
        echo $this->config->item('path_lang') . "en/app_lang.php";
        $config = array();
        $config['base_url'] = base_url().'index.php/admin/products';
        $config['total_rows'] = $this->Products_model->record_count();
        $config['per_page'] = 2;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] =  $this->pagination->create_links();
        $data['query'] = $this->Products_model->get_products($config["per_page"], $page);

        $this->load->view('admin/products/index', $data);
    }
    public function add()
    {
       if($this->input->post("submit")){
            $img['images'] = $this->Products_model->do_upload();
            $value = array(
                    'cate_id' => $this->input->post('cate'),
                    'name' => $this->input->post('name'),
                    'image' => $img['images'][0]['thumb_url'],
                    'date' => time(),
                    'content' => $this->input->post('content'),
            );
            $this->Products_model->insert_product($value);
            $data['message'] = 'Data Inserted Successfully';
       }
       $data['query_cate'] = $this->Category_model->get_cate();
       $this->load->view('admin/products/add', $data);
    }
    public function update($id)
    {
       $data['query_cate'] = $this->Category_model->get_cate();
       $data['query'] = $this->Products_model->get_product_by_id($id);
       if($this->input->post('submit')){
           if(!empty($_FILES['img']['name'])){
                $img['images'] = $this->Products_model->do_upload();
                $image = $img['images'][0]['thumb_url'];
           }  else {
               $image = $data['query']->image;
           }
           $value = array(
                    'cate_id' => $this->input->post('cate'),
                    'name' => $this->input->post('name'),
                    'image' => $image,
                    'date' => time(),
                    'content' => $this->input->post('content'),
            );
           $this->Products_model->update_product($value, $id);
           $data['message'] = 'Data Updated Successfully';
           $this->load->helper('url');
           redirect('admin/products', 'refresh');
       }
       $this->load->view('admin/products/update', $data);
    }
}