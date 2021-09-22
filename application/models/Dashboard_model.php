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
            COUNT(DISTINCT(nama_matkul)) as total_matkul, 
            COUNT(DISTINCT(nama)) as total_dosen, 
            COUNT(DISTINCT(id_plot)) as total_kelas')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->where("keterangan !=", null)
            ->where("upload !=", null)
            ->where("media_pembelajaran !=", null)
            ->group_by("id_fakultas")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_all_total_berlangsung()
    {
        $get_data   = $this->db
            ->select('COUNT(DISTINCT(id_fakultas)) as total_fakultas, 
            COUNT(DISTINCT(id_prodi)) as total_prodi, 
            COUNT(DISTINCT(nama_matkul)) as total_matkul, 
            COUNT(DISTINCT(nama)) as total_dosen, 
            COUNT(DISTINCT(id_plot)) as total_kelas')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->where("keterangan !=", null)
            ->where("upload", null)
            ->where("media_pembelajaran !=", null)
            ->group_by("id_fakultas")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }
    public function get_all_total_belum_mulai()
    {
        $get_data   = $this->db
            ->select('COUNT(DISTINCT(id_fakultas)) as total_fakultas, 
            COUNT(DISTINCT(id_prodi)) as total_prodi, 
            COUNT(DISTINCT(nama_matkul)) as total_matkul, 
            COUNT(DISTINCT(nama)) as total_dosen, 
            COUNT(DISTINCT(id_plot)) as total_kelas')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->where("keterangan", null)
            ->where("upload", null)
            ->where("media_pembelajaran", null)
            ->group_by("id_fakultas")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_all_total_kelas()
    {
        $get_data   = $this->db
            ->select('kelas,id_fakultas')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            // ->group_by("id_fakultas")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_kelas_belum_mulai()
    {
        $get_data   = $this->db
            ->select('kelas,id_fakultas')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->where('media_pembelajaran', null)
            ->where('keterangan', null)
            ->where('upload', null)
            // ->group_by("id_fakultas")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }
    public function get_kelas_berlangsung()
    {
        $get_data   = $this->db
            ->select('kelas,id_fakultas')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->where('media_pembelajaran !=', null)
            ->where('keterangan !=', null)
            ->where('upload', null)
            // ->group_by("id_fakultas")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }
    public function get_kelas_selesai()
    {
        $get_data   = $this->db
            ->select('kelas,id_fakultas')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->where('media_pembelajaran !=', null)
            ->where('keterangan !=', null)
            ->where('upload !=', null)
            // ->group_by("id_fakultas")
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
            COUNT(DISTINCT(nama_matkul)) as total_matkul, 
            COUNT(DISTINCT(nama)) as total_dosen, 
            COUNT(DISTINCT(id_plot)) as total_kelas,
            id_fakultas')
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
            COUNT(DISTINCT(nama_matkul)) as matkul, 
            COUNT(DISTINCT(nama)) as dosen,
            COUNT(id_plot) as kelas,
            id_fakultas')
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

    public function count_get_absen_perkampus_thl_ta()
    {
        $get_data   = $this->db
            ->select('count( id_thl ) as total, nama_satker')
            ->from('tbl_thl')
            ->group_by("nama_satker")
            ->get();
        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_absen_perkampus_thl_ta()
    {
        $get_data = $this->db->query("SELECT
            count( absensi.id_absen ) AS jumlah_hadir,
        CASE
                WHEN absensi.jns_user = 30 THEN
                'THL dan TA' ELSE '' 
            END AS role,
            tbl_thl.nama_satker 
        FROM
            tbl_thl
            JOIN tbl_login ON tbl_login.username = tbl_thl.username
            JOIN absensi ON absensi.username = tbl_thl.username 
        WHERE
            tbl_login.role ='30' 
            AND absensi.tgl = '" . date('Y-m-d') . "' 
            AND absensi.STATUS = 'Pulang' 
            AND absensi.waktu_pulang != '' 
        GROUP BY
            tbl_thl.nama_satker")->result();
        return $get_data;
    }

    public function count_get_absen_perkampus_dosen()
    {
        $get_data   = $this->db
            ->select('count( id ) as total, CONCAT( \'IPDN KAMPUS \', tbl_dosen_pddikti.kampus ) AS kampus')
            ->from('tbl_dosen_pddikti')
            ->group_by("kampus")
            ->get();
        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_absen_perkampus_dosen()
    {
        $get_data = $this->db->query("SELECT
            count( absensi.id_absen ) AS jumlah_hadir,
        CASE
                WHEN absensi.jns_user = 22 THEN
                'Dosen' ELSE '' 
            END AS role,
            CONCAT( 'IPDN KAMPUS ', tbl_dosen_pddikti.kampus ) AS kampus 
        FROM
            tbl_dosen_pddikti
            JOIN tbl_login ON tbl_login.username = tbl_dosen_pddikti.nip
            JOIN absensi ON absensi.username = tbl_dosen_pddikti.nip 
        WHERE
            tbl_login.role = '22' 
            AND absensi.tgl = '" . date('Y-m-d') . "' 
            AND absensi.STATUS = 'Pulang' 
            AND absensi.waktu_pulang != '' 
        GROUP BY
            tbl_dosen_pddikti.kampus")->result();
        return $get_data;
    }

    public function count_get_absen_perkampus_pns()
    {
        $get_data   = $this->db
            ->select('count( no ) as total, bagian')
            ->from('tbl_pns')
            ->group_by("bagian")
            ->get();
        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_absen_perkampus_pns()
    {
        $get_data = $this->db->query("SELECT
            count( absensi.id_absen ) AS jumlah_hadir,
        CASE
                WHEN absensi.jns_user = 23 THEN
                'PNS' ELSE '' 
            END AS role,
            bagian
        FROM
            tbl_pns
            JOIN tbl_login ON tbl_login.username = tbl_pns.nip
            JOIN absensi ON absensi.username = tbl_pns.nip 
        WHERE
            tbl_login.role = '23' 
            AND absensi.tgl = '" . date('Y-m-d') . "' 
            AND absensi.STATUS = 'Pulang' 
            AND absensi.waktu_pulang != '' 
        GROUP BY
        tbl_pns.bagian")->result();
        return $get_data;
    }

    public function count_get_absen_perkampus_pns_dosen()
    {
        $get_data   = $this->db
            ->select('count( no ) as total, bagian')
            ->from('tbl_pns')
            ->group_by("bagian")
            ->get();
        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_absen_perkampus_pns_dosen()
    {
        $get_data = $this->db->query("SELECT
            count( absensi.id_absen ) AS jumlah_hadir,
        CASE
                WHEN absensi.jns_user = 29 THEN
                'PNS dan DOSEN' ELSE '' 
            END AS role,
            bagian
        FROM
            tbl_pns
            JOIN tbl_login ON tbl_login.username = tbl_pns.nip
            JOIN absensi ON absensi.username = tbl_pns.nip 
        WHERE
            tbl_login.role = '29' 
            AND absensi.tgl = '" . date('Y-m-d') . "' 
            AND absensi.STATUS = 'Pulang' 
            AND absensi.waktu_pulang != '' 
        GROUP BY
        tbl_pns.bagian")->result();
        return $get_data;
    }

    public function get_absen_perkampus_pns_dosen_masuk()
    {
        $get_data = $this->db->query("SELECT
            count( absensi.id_absen ) AS jumlah_hadir,
        CASE
                WHEN absensi.jns_user = 29 THEN
                'PNS dan DOSEN' ELSE '' 
            END AS role,
            bagian
        FROM
            tbl_pns
            JOIN tbl_login ON tbl_login.username = tbl_pns.nip
            JOIN absensi ON absensi.username = tbl_pns.nip 
        WHERE
            tbl_login.role = '29' 
            AND absensi.tgl = '" . date('Y-m-d') . "' 
            AND absensi.STATUS = 'Masuk' 
        GROUP BY
        tbl_pns.bagian")->result();
        return $get_data;
    }

    public function get_absen_perkampus_pns_masuk()
    {
        $get_data = $this->db->query("SELECT
            count( absensi.id_absen ) AS jumlah_hadir,
        CASE
                WHEN absensi.jns_user = 23 THEN
                'PNS' ELSE '' 
            END AS role,
            bagian
        FROM
            tbl_pns
            JOIN tbl_login ON tbl_login.username = tbl_pns.nip
            JOIN absensi ON absensi.username = tbl_pns.nip 
        WHERE
            tbl_login.role = '23' 
            AND absensi.tgl = '" . date('Y-m-d') . "' 
            AND absensi.STATUS = 'Masuk' 
        GROUP BY
        tbl_pns.bagian")->result();
        return $get_data;
    }

    public function get_absen_perkampus_dosen_masuk()
    {
        $get_data = $this->db->query("SELECT
            count( absensi.id_absen ) AS jumlah_hadir,
        CASE
                WHEN absensi.jns_user = 22 THEN
                'Dosen' ELSE '' 
            END AS role,
            CONCAT( 'IPDN KAMPUS ', tbl_dosen_pddikti.kampus ) AS kampus 
        FROM
            tbl_dosen_pddikti
            JOIN tbl_login ON tbl_login.username = tbl_dosen_pddikti.nip
            JOIN absensi ON absensi.username = tbl_dosen_pddikti.nip 
        WHERE
            tbl_login.role = '22' 
            AND absensi.tgl = '" . date('Y-m-d') . "' 
            AND absensi.STATUS = 'Masuk' 
        GROUP BY
            tbl_dosen_pddikti.kampus")->result();
        return $get_data;
    }
    
    public function get_absen_perkampus_thl_ta_masuk()
    {
        $get_data = $this->db->query("SELECT
            count( absensi.id_absen ) AS jumlah_hadir,
        CASE
                WHEN absensi.jns_user = 30 THEN
                'THL dan TA' ELSE '' 
            END AS role,
            tbl_thl.nama_satker 
        FROM
            tbl_thl
            JOIN tbl_login ON tbl_login.username = tbl_thl.username
            JOIN absensi ON absensi.username = tbl_thl.username 
        WHERE
            tbl_login.role ='30' 
            AND absensi.tgl = '" . date('Y-m-d') . "' 
            AND absensi.STATUS = 'Masuk' 
        GROUP BY
            tbl_thl.nama_satker")->result();
        return $get_data;
    }
}
