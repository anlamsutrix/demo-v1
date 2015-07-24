<?php
class Category_model extends CI_Model {

        public $name;
        public $active;
        public $date;

        public function __construct()
        {
                // Call the CI_Model constructor
                $this->load->database();
                parent::__construct();
        }

        public function get_cate()
        {

            $query = $this->db->get('pro_cate');
            return $query->result();
        }
        public function get_cate_by_id($id)
        {
            $this->db->where('id', $id);
            $q = $this->db->get('pro_cate')->row();
            return $q;
        }
        public function insert_cate($data)
        {
            $this->db->insert('pro_cate', $data);
        }

        public function update_cate($data,$id)
        {
            $this->db->update('pro_cate', $data, array('id' => $id));
        }

}