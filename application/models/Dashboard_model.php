<?php

class Dashboard_model extends CI_Model
{

    public function get_count_status_prodi()
    {
        $get_data   = $this->db
            ->select('COUNT(DISTINCT( id_prodi )) As TotalProdi, 
             CASE WHEN keterangan is null and upload is null and media_pembelajaran is null THEN \'Belum Mulai\' 
             WHEN media_pembelajaran is NOT null and keterangan is NOT null and upload is null THEN \'Sedang Berlangsung\' 
             WHEN keterangan is NOT null and upload is NOT null and media_pembelajaran is not null THEN \'Telah Selesai\'END AS StatusMonitoring')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->group_by("StatusMonitoring")
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
            COUNT(nama_matkul) as total_matkul, 
            COUNT(nama) as total_dosen, 
            COUNT(DISTINCT(id_plot)) as total_kelas,
            id_fakultas')
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
            COUNT(nama_matkul) as total_matkul, 
            COUNT(nama) as total_dosen, 
            COUNT(DISTINCT(id_plot)) as total_kelas,
            id_fakultas')
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
            COUNT(nama_matkul) as total_matkul, 
            COUNT(nama) as total_dosen, 
            COUNT(DISTINCT(id_plot)) as total_kelas,
            id_fakultas')
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
            COUNT(nama_matkul) as total_matkul, 
            COUNT(nama) as total_dosen, 
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

    public function count_get_absen_perkampus_dosen_masuk()
    {
        $get_data = $this->db->query("SELECT
            count( tbl_dosen_pddikti.id ) AS total,
            CONCAT(
                'IPDN KAMPUS', tbl_dosen_pddikti.kampus ) AS kampus
                FROM
                tbl_dosen_pddikti
                JOIN absensi ON tbl_dosen_pddikti.nip = absensi.username
                WHERE
                absensi.tgl = '" . date('Y-m-d') . "' 
                AND absensi.STATUS = 'Masuk' 
            GROUP BY
            tbl_dosen_pddikti.kampus")->result();
        return $get_data;
    }

    public function count_get_absen_perkampus_dosen_pulang()
    {
        $get_data = $this->db->query("SELECT
            count( tbl_dosen_pddikti.id ) AS total,
            CONCAT(
                'IPDN KAMPUS', tbl_dosen_pddikti.kampus ) AS kampus
                FROM
                tbl_dosen_pddikti
                JOIN absensi ON tbl_dosen_pddikti.nip = absensi.username
                WHERE
                    absensi.tgl = '" . date('Y-m-d') . "' 
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

    public function count_get_absen_perkampus_pns_masuk()
    {
        $get_data = $this->db->query("SELECT
            count( tbl_pns.no ) AS total,
            tbl_pns.bagian
                FROM
                tbl_pns
                JOIN absensi ON tbl_pns.nip = absensi.username
                WHERE
                absensi.tgl = '" . date('Y-m-d') . "' 
                AND absensi.STATUS = 'Masuk' 
            GROUP BY
            tbl_pns.bagian")->result();
        return $get_data;
    }

    public function count_get_absen_perkampus_pns_pulang()
    {
        $get_data = $this->db->query("SELECT
            count( tbl_pns.no ) AS total,
            tbl_pns.bagian
                FROM
                    tbl_pns
                JOIN absensi ON tbl_pns.nip = absensi.username
                WHERE
                    absensi.tgl = '" . date('Y-m-d') . "' 
                    AND absensi.STATUS = 'Pulang' 
                    AND absensi.waktu_pulang != '' 
            GROUP BY
            tbl_pns.bagian")->result();
        return $get_data;
    }

    public function count_get_absen_perkampus_thl()
    {
        $get_data   = $this->db
            ->select("count( id_thl ) as total, nama_satker")
            ->from("tbl_thl")
            ->group_by("nama_satker")
            ->get();
        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function count_get_absen_perkampus_thl_masuk()
    {
        $get_data = $this->db->query("SELECT
            count( tbl_thl.id_thl ) AS total,
            tbl_thl.nama_satker
                FROM
                    tbl_thl
                JOIN absensi ON tbl_thl.username = absensi.username
                WHERE
                absensi.tgl = '" . date('Y-m-d') . "' 
                AND absensi.STATUS = 'Masuk' 
            GROUP BY
            tbl_thl.nama_satker")->result();
        return $get_data;
    }

    public function count_get_absen_perkampus_thl_pulang()
    {
        $get_data = $this->db->query("SELECT
            count( tbl_thl.id_thl ) AS total,
            tbl_thl.nama_satker
                FROM
                    tbl_thl
                JOIN absensi ON tbl_thl.username = absensi.username
                WHERE
                    absensi.tgl = '" . date('Y-m-d') . "' 
                    AND absensi.STATUS = 'Pulang' 
                    AND absensi.waktu_pulang != '' 
            GROUP BY
            tbl_thl.nama_satker")->result();
        return $get_data;
    }

    public function count_get_absen_perkampus_ta()
    {
        $get_data   = $this->db
            ->select("count( no ) as total, penugasan")
            ->from("tbl_ta")
            ->where("status", "Aktif")
            ->group_by("penugasan")
            ->get();
        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function count_get_absen_perkampus_ta_masuk()
    {
        $get_data = $this->db->query("SELECT
            count( tbl_ta.no ) AS total,
            tbl_ta.penugasan
                FROM
                    tbl_ta
                JOIN absensi ON tbl_ta.nik = absensi.username
                WHERE
                absensi.tgl = '" . date('Y-m-d') . "' 
                AND absensi.STATUS = 'Masuk' 
                AND tbl_ta.status = 'Aktif'
            GROUP BY
            tbl_ta.penugasan")->result();
        return $get_data;
    }

    public function count_get_absen_perkampus_ta_pulang()
    {
        $get_data = $this->db->query("SELECT
            count( tbl_ta.no ) AS total,
            tbl_ta.penugasan
                FROM
                    tbl_ta
                JOIN absensi ON tbl_ta.nik = absensi.username
                WHERE
                    absensi.tgl = '" . date('Y-m-d') . "' 
                    AND absensi.STATUS = 'Pulang' 
                    AND absensi.waktu_pulang != '' 
                    AND tbl_ta.status = 'Aktif'
            GROUP BY
            tbl_ta.penugasan")->result();
        return $get_data;
    }

    public function fetchkelastotal()
    {
        $get_data = $this->db->query("SELECT
            nama,
            nama_matkul,
            jam,
            kelas,
            id_prodi,
            id_fakultas,
            angkatan,
            tingkatan 
        FROM
            `tbl_plot_dosen` 
        WHERE
        tanggal = '" . date('Y-m-d') . "'")->result();
        return $get_data;
    }

    public function fetchkelas_belum_mulai()
    {
        $get_data = $this->db->query("SELECT
            nama,
            nama_matkul,
            jam,
            kelas,
            id_prodi,
            id_fakultas,
            angkatan,
            tingkatan 
        FROM
            `tbl_plot_dosen` 
        WHERE
        tanggal = '" . date('Y-m-d') . "' and media_pembelajaran is null and keterangan is null and upload is null")->result();
        return $get_data;
    }

    public function fetchkelas_berlangsung()
    {
        $get_data = $this->db->query("SELECT
            nama,
            nama_matkul,
            jam,
            kelas,
            id_prodi,
            id_fakultas,
            angkatan,
            tingkatan 
        FROM
            `tbl_plot_dosen` 
        WHERE
        tanggal = '" . date('Y-m-d') . "' and media_pembelajaran is not null and keterangan is not null and upload is null")->result();
        return $get_data;
    }

    public function fetchkelas_selesai()
    {
        $get_data = $this->db->query("SELECT
            nama,
            nama_matkul,
            jam,
            kelas,
            id_prodi,
            id_fakultas,
            angkatan,
            tingkatan 
        FROM
            `tbl_plot_dosen` 
        WHERE
        tanggal = '" . date('Y-m-d') . "' and media_pembelajaran is not null and keterangan is not null and upload is not null")->result();
        return $get_data;
    }
}
