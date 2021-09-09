<?php

class Dashboard_model extends CI_Model
{

    public function get_absen_all()
    {
        $get_data   = $this->db
            ->select('
                    count( id ) as total')
            ->from('tbl_login')
            ->where("role", 22)
            ->or_where("role", 23)
            ->or_where("role", 29)
            ->or_where("role", 30)
            ->get();
        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

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
                        \'PNS dan DOSEN\' 
                        WHEN jns_user = 30 THEN
                        \'THL dan TA\' ELSE \'\' 
                    END AS role ')
            ->from('absensi')
            // ->where("YEAR ( `tgl` ) = date('Y')")
            ->where("YEAR ( `tgl` ) = date('Y-m-d')")
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

    public function get_absen_pulang_perbulan_chart_perhari()
    {
        $get_data   = $this->db
            ->select('
                    count( id_absen ) AS jumlah_hadir,
                CASE
                        WHEN jns_user = 22 THEN
                        \'Dosen\' 
                        WHEN jns_user = 23 THEN
                        \'PNS\' 
                        WHEN jns_user = 29 THEN
                        \'PNS dan DOSEN\' 
                        WHEN jns_user = 30 THEN
                        \'THL dan TA\' ELSE \'\' 
                    END AS role ')
            ->from('absensi')
            ->where("tgl", date('Y-m-d'))
            ->where("status", "Pulang")
            ->where("waktu_pulang != ''")
            ->group_by("jns_user")
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
                    \'PNS dan DOSEN\' 
                    WHEN jns_user = 30 THEN
                    \'THL dan TA\' ELSE \'\' 
                END AS role ')
            ->from('absensi')
            // ->where("YEAR ( `tgl` ) = date('Y')")
            ->where("YEAR ( `tgl` ) = date('Y-m-d')")
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

    public function get_absen_masuk_perbulan_chart_perhari()
    {
        $get_data   = $this->db
            ->select('
                count( id_absen ) AS jumlah_hadir,
            CASE
                    WHEN jns_user = 22 THEN
                    \'Dosen\' 
                    WHEN jns_user = 23 THEN
                    \'PNS\' 
                    WHEN jns_user = 29 THEN
                    \'PNS dan DOSEN\' 
                    WHEN jns_user = 30 THEN
                    \'THL dan TA\' ELSE \'\' 
                END AS role ')
            ->from('absensi')
            ->where("tgl", date('Y-m-d'))
            ->where("status", "Masuk")
            ->group_by("jns_user")
            ->get();
        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_count_fakultas()
    {
        $get_data   = $this->db
            ->select('id_fakultas, 
                COUNT( id_plot ) AS total_pembelajaran,
                COUNT( keterangan ) - count( upload ) AS proses_pembelajaran,
                COUNT( upload ) AS selesai_pembelajaran')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->group_by("id_fakultas")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_prodi_perfakultas($fakultas)
    {
        $get_data   = $this->db
            ->select('id_fakultas, 
                id_prodi,
                COUNT( id_plot ) AS total_pembelajaran,
                COUNT( keterangan ) - count( upload ) AS proses_pembelajaran,
                COUNT( upload ) AS selesai_pembelajaran')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->where("id_fakultas", $fakultas)
            ->group_by("id_fakultas")
            ->group_by("id_prodi")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_all_total_done()
    {
        $get_data   = $this->db
            ->select('COUNT(DISTINCT(id_fakultas)) as total_fakultas, 
            COUNT(DISTINCT(id_prodi)) as total_prodi, 
            COUNT(nama_matkul) as total_matkul, COUNT(DISTINCT(nama)) as total_dosen, 
            COUNT(DISTINCT(id_plot)) as total_kelas')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->where("keterangan !=", null)
            ->where("upload !=", null)
            ->group_by("id_fakultas")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_all_total()
    {
        $get_data   = $this->db
            ->select('COUNT(DISTINCT(id_fakultas)) as total_fakultas, 
            COUNT(DISTINCT(id_prodi)) as total_prodi, 
            COUNT(nama_matkul) as total_matkul, COUNT(DISTINCT(nama)) as total_dosen, 
            COUNT(DISTINCT(id_plot)) as total_kelas')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->group_by("id_fakultas")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_summary_fakultas_done()
    {
        $get_data   = $this->db
            ->select('id_fakultas,
            COUNT(DISTINCT(id_prodi)) as prodi, 
            COUNT(nama_matkul) as matkul, 
            COUNT(DISTINCT(nama)) as dosen,
            COUNT(id_plot) as kelas')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->where("keterangan !=", null)
            ->where("upload !=", null)
            ->group_by("id_fakultas")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_summary_fakultas()
    {
        $get_data   = $this->db
            ->select('id_fakultas,
            COUNT(DISTINCT(id_prodi)) as prodi, 
            COUNT(nama_matkul) as matkul, 
            COUNT(DISTINCT(nama)) as dosen,
            COUNT(id_plot) as kelas')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->group_by("id_fakultas")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }
}
