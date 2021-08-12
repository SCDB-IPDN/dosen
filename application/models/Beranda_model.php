<?php

    class Beranda_model extends CI_Model {
        
	    public function __construct() {
            $this->load->database();
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