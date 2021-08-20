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

        public function get_profile($username) {
            $get_user = $this->db->query("SELECT
                            -- tbl_login.username,
                            -- tbl_login.PASSWORD,
                            tbl_login.image_url,
                            tbl_dosen_pddikti.nama 
                        FROM
                            tbl_login
                            JOIN tbl_dosen_pddikti ON tbl_login.username = tbl_dosen_pddikti.nip 
                        WHERE
                            tbl_login.username = '$username' UNION
                        SELECT
                            tbl_login.image_url,
                            tbl_pns.nama_lengkap AS nama 
                        FROM
                            tbl_login
                            JOIN tbl_pns ON tbl_login.username = tbl_pns.nip 
                        WHERE
                            tbl_login.username = '$username' UNION
                        SELECT
                            tbl_login.image_url,
                            tbl_thl.nama 
                        FROM
                            tbl_login
                            JOIN tbl_thl ON tbl_login.username = tbl_thl.username 
                        WHERE
                            tbl_login.username = '$username'")->result();
            return $get_user;
        }
    }
?>