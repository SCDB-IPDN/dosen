<?php

class Dashboard_model extends CI_Model
{

    public function get_absen_pulang_perbulan_chart()
    {
        $get_data   = $this->db
            ->select('
                    count( id_absen ) AS jumlah_hadir,
                    MONTH ( tgl ) AS bulan,
                CASE
                        WHEN jns_user = 22 THEN
                        \'Dosen\' 
                        WHEN jns_user = 23 THEN
                        \'PNS\' 
                        WHEN jns_user = 29 THEN
                        \'PNS dan DOSEN\' ELSE \'\' 
                    END AS role ')
            ->from('absensi')
            ->where("YEAR ( `tgl` ) = date('Y')")
            ->where("status", "Pulang")
            ->where("waktu_pulang != ''")
            ->group_by("jns_user")
            ->group_by("YEAR ( `tgl` )")
            ->group_by("MONTH ( `tgl` )")
            ->order_by("bulan", "ASC")
            ->get();
        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_absen_masuk_perbulan_chart()
    {
        $get_data   = $this->db
            ->select('
                count( id_absen ) AS jumlah_hadir,
                MONTH ( tgl ) AS bulan,
            CASE
                    WHEN jns_user = 22 THEN
                    \'Dosen\' 
                    WHEN jns_user = 23 THEN
                    \'PNS\' 
                    WHEN jns_user = 29 THEN
                    \'PNS dan DOSEN\' ELSE \'\' 
                END AS role ')
            ->from('absensi')
            ->where("YEAR ( `tgl` ) = date('Y')")
            ->where("status", "Masuk")
            ->group_by("jns_user")
            ->group_by("YEAR ( `tgl` )")
            ->group_by("MONTH ( `tgl` )")
            ->order_by("bulan", "ASC")
            ->get();
        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }
}
