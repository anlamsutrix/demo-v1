<?php
class Products_model extends CI_Model {

    public $cate_id;
    public $name;
    public $image;
    public $date;
    public $content;
    protected $_gallery_path = "";
    protected $_gallery_url = "";

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
        //get url of folder upload images
        $this->load->helper(array('form', 'url'));
        $this->_gallery_url = base_url()."uploads/";
        $this->_gallery_path = realpath(APPPATH. "../uploads");
    }
    // Count all record of table "contact_info" in database.
    public function record_count() {
        return $this->db->count_all("products");
    }
    public function get_products($limit, $start)
    {
        $this->db->select('products.id, products.cate_id,products.image, products.date,products.content, products.name as pro_name, pro_cate.name as cate_name'); // Select field
        $this->db->from('products'); // from Table1
        $this->db->join('pro_cate','products.cate_id = pro_cate.id','Left'); // Join table1 with table2 based on the foreign key
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
    //hàm thực hiện công việc upload và resize lại hình ảnh
    public function do_upload(){
        $config = array('upload_path'   => $this->_gallery_path,
                        'allowed_types' => 'gif|jpg|png|jpeg',
                        'max_size'      => '2000');
        $this->load->library("upload",$config);
        if(!$this->upload->do_upload("img")){
            $error = array($this->upload->display_errors());
            echo "<pre>";
            print_r($error);
        }else{
            $image_data = $this->upload->data();
        }
        //kết thúc công đoạn upload hình ảnh
        $config = array("source_image" => $image_data['full_path'],
                        "new_image" => $this->_gallery_path . "/thumbs",
                        "maintain_ration" => true,
                        "width" => '150',
                        "height" => "100");
        $this->load->library("image_lib",$config);
        $this->image_lib->resize();
        $images[] = array("url"        => $this->_gallery_url . $image_data['file_name'],
                              "thumb_url" => $this->_gallery_url . "thumbs/" . $image_data['file_name']);
        return $images;
    }
    public function get_product_by_id($id)
    {
        $this->db->where('id', $id);
        $q = $this->db->get('products')->row();
        return $q;
    }
    public function insert_product($data)
    {
        $this->db->insert('products', $data);
    }

    public function update_product($data,$id)
    {
        $this->db->update('products', $data, array('id' => $id));
    }

}