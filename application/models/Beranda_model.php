<?php

class Beranda_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_desc()
    {
        $get_desc = $this->db
            ->select('*')
            ->from('tbl_desc')
            ->get();
        if ($get_desc->num_rows() > 0) {
            return $get_desc->result();
        } else {
            return false;
        }
    }

    public function get_profile($username)
    {
        if ($username == 'admin' || $username == 'kepegawaian') {
            $get_user = $this->db->query("SELECT
                            image_url,
                            username AS nama
                        FROM
                            tbl_login
                        WHERE
                            username = '$username'")->result();
        } else {
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
                                tbl_login.username = '$username' UNION
                            SELECT
                                tbl_login.image_url,
                                tbl_ta.nama_lengkap 
                            FROM
                                tbl_login
                                JOIN tbl_ta ON tbl_login.username = tbl_ta.nik 
                            WHERE
                                tbl_login.username = '$username'")->result();
        }
        return $get_user;
    }

    public function edit_password($id)
    {
        $this->db->select("*");
        $this->db->from("tbl_login");
        $this->db->where("username", $id);
        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }

    public function update_password($data)
    {
        return $this->db->update('tbl_login', $data, array('username' => $data['username']));
    }
}
