<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public function cekLogin($tabel, $kriteria)
    {
        //return $this->db->query("SELECT * FROM $tabel WHERE username = '$username' AND password = '$password'");
        return $this->db->get_where($tabel, $kriteria)->num_rows();
    }

    public function get_user($kriteria) {
        $get_desc = $this->db
                    ->select('*')
                    ->from('tbl_login')
                    ->where($kriteria)
                    ->get();
        if($get_desc->num_rows() > 0) {
            return $get_desc->result();
        } else {
            return false;
        }
    }
}

?>