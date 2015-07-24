<?php
class Welcome_model extends CI_Model {

        public $name;
        public $address;
        public $date;

        public function __construct()
        {
                // Call the CI_Model constructor
                $this->load->database();
                parent::__construct();
        }

        public function get_last_ten_entries()
        {

            $query = $this->db->get('entries', 10);
            return $query->result();
        }

        public function insert_entry($data)
        {

            $this->db->insert('entries', $data);
        }

        public function update_entry()
        {
            $this->name   = $_POST['title'];
            $this->address  = $_POST['content'];
            $this->date     = time();

            $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

}