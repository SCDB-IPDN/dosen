<?php

    class Beranda_model extends CI_Model {
        
	    public function __construct() {
            // if($this->session->userdata('status') != "login"){
            // 	redirect(base_url(""));
            // }
            $this->load->database();
            $this->load->library('session');
        }

        public function get_desc() {
            $get_desc = $this->db
                        ->select('*')
                        ->from('tbl_desc')
                        ->get();
            if($get_desc->num_rows() > 0) {
                return $get_desc->result();
            } else {
                return false;
            }
        }
    }
?>