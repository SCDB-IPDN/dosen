<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public function cekLogin($tabel, $kriteria)
    {
        //return $this->db->query("SELECT * FROM $tabel WHERE username = '$username' AND password = '$password'");
        return $this->db->get_where($tabel, $kriteria)->num_rows();
    }


    public function cekSession()
    {

        if (!empty($this->session)) 
        {
            $halaman = "home";
        } 
        else 
        {
            $halaman = "login";
        }

        return redirect(base_url("$halaman"));
    }
}

?>