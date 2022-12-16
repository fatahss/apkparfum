<?php class Datacart_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

        public function getDatacart()
        {
            $query = $this->db->query("SELECT * FROM cart WHERE username = 'username' => $this->session->userdata('username'");

            foreach ($query->result() as $row)
            {
                echo $row->customers;
            }

        }