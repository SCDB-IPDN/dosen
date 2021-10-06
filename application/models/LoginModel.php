<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public function cekLogin($tabel, $kriteria)
    {
        //return $this->db->query("SELECT * FROM $tabel WHERE username = '$username' AND password = '$password'");
        // return $this->db->get_where($tabel, $kriteria)->num_rows();
        
        $cekLogin = $this->db
                    ->select('id')
                    ->from($tabel)
                    ->where($kriteria)
                    ->where_in('role',[1,22,23,29,30,31,32,33,34,35,36,37,38,39,40])
                    ->get();
        if($cekLogin->num_rows() > 0) {
            return $cekLogin->num_rows();
        } else {
            $cekLogin = $this->db
                        ->select('id')
                        ->from($tabel)
                        ->where($kriteria)
                        ->get();
            if($cekLogin->num_rows() > 0) {
                return 'Role username anda tidak diperuntukkan untuk aplikasi ini';
            } else {
                return 'Username dan Password anda salah';
            }
        }
    }

    public function get_user($kriteria) {
        $get_user = $this->db
                    ->select('*')
                    ->from('tbl_login')
                    ->where($kriteria)
                    ->get();
        if($get_user->num_rows() > 0) {
            return $get_user->result();
        } else {
            return false;
        }
    }
}

?>