<?php

class Presensi_model extends CI_Model
{

    public function get_entries($username)
    {
        if ($username == 'admin') {
            $get_data   = $this->db
                ->select('*')
                ->from('tbl_plot_dosen')
                ->where("tanggal", date('Y-m-d'))
                ->get();
        } elseif ($username == 'UtamaMP') {
            $get_data   = $this->db
                ->select('*')
                ->from('tbl_plot_dosen')
                ->where("id_fakultas", "FMP")
                ->where("tingkatan", "Praja Utama")
                ->where("tanggal", date('Y-m-d'))
                ->get();
        } elseif ($username == 'UtamaPM') {
            $get_data   = $this->db
                ->select('*')
                ->from('tbl_plot_dosen')
                ->where("id_fakultas", "FHTP")
                ->where("tingkatan", "Praja Utama")
                ->where("tanggal", date('Y-m-d'))
                ->get();
        } elseif ($username == 'UtamaPP') {
            $get_data   = $this->db
                ->select('*')
                ->from('tbl_plot_dosen')
                ->where("id_fakultas", "FPP")
                ->where("tingkatan", "Praja Utama")
                ->where("tanggal", date('Y-m-d'))
                ->get();
        } elseif ($username == 'MadyaMP') {
            $get_data   = $this->db
                ->select('*')
                ->from('tbl_plot_dosen')
                ->where("id_fakultas", "FMP")
                ->where("tingkatan", "Madya Praja")
                ->where("tanggal", date('Y-m-d'))
                ->get();
        } elseif ($username == 'MadyaPM') {
            $get_data   = $this->db
                ->select('*')
                ->from('tbl_plot_dosen')
                ->where("id_fakultas", "FHTP")
                ->where("tingkatan", "Madya Praja")
                ->where("tanggal", date('Y-m-d'))
                ->get();
        } elseif ($username == 'MadyaPP') {
            $get_data   = $this->db
                ->select('*')
                ->from('tbl_plot_dosen')
                ->where("id_fakultas", "FPP")
                ->where("tingkatan", "Madya Praja")
                ->where("tanggal", date('Y-m-d'))
                ->get();
        } elseif ($username == 'MudaMP') {
            $get_data   = $this->db
                ->select('*')
                ->from('tbl_plot_dosen')
                ->where("id_fakultas", "FMP")
                ->where("tingkatan", "Muda Praja")
                ->where("tanggal", date('Y-m-d'))
                ->get();
        } elseif ($username == 'MudaPM') {
            $get_data   = $this->db
                ->select('*')
                ->from('tbl_plot_dosen')
                ->where("id_fakultas", "FHTP")
                ->where("tingkatan", "Muda Praja")
                ->where("tanggal", date('Y-m-d'))
                ->get();
        } elseif ($username == 'MudaPP') {
            $get_data   = $this->db
                ->select('*')
                ->from('tbl_plot_dosen')
                ->where("id_fakultas", "FPP")
                ->where("tingkatan", "Muda Praja")
                ->where("tanggal", date('Y-m-d'))
                ->get();
        } else {
            $get_data   = $this->db
                ->select('*')
                ->from('tbl_plot_dosen')
                ->where("nip", $username)
                ->where("tanggal", date('Y-m-d'))
                ->get();
        }

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }


    public function get_status_belum_dimulai()
    {
        $get_data   = $this->db
            ->select('*')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->where('keterangan', null)
            ->where('media_pembelajaran', null)
            ->where('upload', null)
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_status_sedang_berlangsung()
    {
        $get_data   = $this->db
            ->select('*')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->where('keterangan !=', null)
            ->where('media_pembelajaran !=', null)
            ->where('upload', null)
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_status_telah_selesai()
    {
        $get_data   = $this->db
            ->select('*')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->where('keterangan !=', null)
            ->where('media_pembelajaran !=', null)
            ->where('upload !=', null)
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function get_detail_monitoring()
    {
        $get_data   = $this->db
            ->select('COUNT( id_plot ) As TotalMonitoring, nama,nama_matkul,id_prodi,
        CASE WHEN keterangan is null and upload is null THEN \'Belum Mulai\' 
        WHEN keterangan is NOT null and upload is null THEN \'Sedang Berlangsung\' 
        WHEN keterangan is NOT null and upload is NOT null THEN \'Telah Selesai\'END AS StatusMonitoring')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->group_by(array("StatusMonitoring", "nama", "nama_matkul", "id_prodi"))
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function insert_entry($data)
    {
        return $this->db->insert('tbl_plot_dosen', $data);
    }

    public function delete_entry($id)
    {
        return $this->db->delete('tbl_plot_dosen', array('id_plot' => $id));
    }

    public function single_entry($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_plot_dosen');
        $this->db->where('id_plot', $id);
        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }

    public function edit_entry($id)
    {
        $this->db->select("*");
        $this->db->from("tbl_plot_dosen");
        $this->db->where("id_plot", $id);
        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }

    public function update_entry($id, $data)
    {
        return $this->db->update('tbl_plot_dosen', $data, array('id_plot' => $id));
    }

    public function get_absen($username)
    {
        if ($username == 'admin') {
            $get_data   = $this->db
                ->select('*,
                CASE
                        WHEN waktu_pulang < \'16:00:00\' THEN
                        \'Sebelum Waktunya\' 
                        WHEN waktu_pulang > \'16:00:00\' THEN
                        \'Tepat Waktu\' ELSE \'\' 
                    END AS status_pulang')
                ->from('absensi')
                ->where("tgl", date('Y-m-d'))
                ->get();
        } else {
            $get_data   = $this->db
                ->select('*,
                CASE
                        WHEN waktu_pulang < \'16:00:00\' THEN
                        \'Pulang Sebelum Waktunya\' 
                        WHEN waktu_pulang > \'16:00:00\' THEN
                        \'Pulang Tepat Waktu\' ELSE \'\' 
                    END AS status_pulang')
                ->from('absensi')
                ->where("username", $username)
                ->where("tgl", date('Y-m-d'))
                ->get();
        }
        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    public function insert_entry_absen($data)
    {
        return $this->db->insert('absensi', $data);
    }

    public function update_entry_absen($username, $data_update)
    {
        return $this->db->update('absensi', $data_update, array('username' => $username, 'tgl' => date('Y-m-d')));
    }

    public function get_absen_masuk_chart()
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
                        \'PNS dan DOSEN\' ELSE \'\' 
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

    public function get_absen_pulang_chart()
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
                        \'PNS dan DOSEN\' ELSE \'\' 
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

    //count current monitoring /prodi
    public function get_count_monitoring_prodi()
    {
        $get_data   = $this->db
            ->select('count( id_plot ) As TotalMonitoring, id_prodi')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->group_by("id_prodi")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    //count current monitoring /dosen
    public function get_count_monitoring_dosen()
    {
        $get_data   = $this->db
            ->select('count( id_plot ) As TotalMonitoring, nama')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->group_by("nama")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    //count belum upload
    public function get_count_status_monitoring()
    {
        $get_data   = $this->db
            ->select('COUNT( id_plot ) As TotalMonitoring, 
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

    //count sudah upload
    public function get_count_sudah_upload()
    {
        $get_data   = $this->db
            ->select('count( id_plot ) As TotalMonitoring')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->where("upload !=", null)
            ->where("media_pembelajaran !=", null)
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    //count identitas kelas
    public function get_count_identitas_kelas()
    {
        $get_data   = $this->db
            ->select('count(id_plot) as total_kelas')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    //count identitas kelas detail   
    public function get_count_identitas_kelas_detail()
    {
        $get_data   = $this->db
            ->select('count(id_plot) as total_kelas,id_fakultas')
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

    //count identitas dosen
    public function get_count_dosen()
    {
        $get_data   = $this->db
            ->select('count(DISTINCT(nama)) as total_dosen')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    //count identitas dosen detail   
    public function get_count_dosen_detail()
    {
        $get_data   = $this->db
            ->select('nama,id_fakultas,COUNT(id_plot) as total_pembelajaran')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->group_by("nama")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    //count identitas matakuliah
    public function get_count_matakuliah()
    {
        $get_data   = $this->db
            ->select('count(id_plot) as total_kelas')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    //count identitas matakuliah detail   
    public function get_count_matakuliah_detail()
    {
        $get_data   = $this->db
            ->select('id_fakultas,COUNT(id_plot) as total_pembelajaran')
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

    //count identitas matakuliah lebih detail   
    public function get_count_matakuliah_lebih_detail()
    {
        $get_data   = $this->db
            ->select('nama_matkul,id_fakultas,COUNT(id_plot) as total_pembelajaran')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->group_by("nama_matkul,id_fakultas")
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    //count identitas matakuliah
    public function get_count_prodi()
    {
        $get_data   = $this->db
            ->select('COUNT(DISTINCT(id_prodi)) as total_prodi')
            ->from('tbl_plot_dosen')
            ->where("tanggal", date('Y-m-d'))
            ->get();

        if ($get_data->num_rows() > 0) {
            return $get_data->result();
        } else {
            return false;
        }
    }

    //count identitas matakuliah detail   
    public function get_count_prodi_detail()
    {
        $get_data   = $this->db
            ->select('id_fakultas,COUNT(id_plot) as total_pembelajaran')
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

    public function insert_entry_absen_auto()
    {
        if (date("H:i:s") >= "07:00:00" && date("H:i:s") <= "15:59:00") {
            $data_masuk = array(
                "0" => array(
                    "username" => "1105011207970006",
                    "jns_user" => "40",
                    "tgl" => date("Y-m-d"),
                    "waktu" => date("H:i:s"),
                    "via" => "Work From Office",
                    "kondisi" => "Sehat",
                    "status" => "Masuk",
                ),
                "1" => array(
                    "username" => "3209140904970009",
                    "jns_user" => "40",
                    "tgl" => date("Y-m-d"),
                    "waktu" => date("H:i:s"),
                    "via" => "Work From Office",
                    "kondisi" => "Sehat",
                    "status" => "Masuk",
                ),
                "2" => array(
                    "username" => "7314050409970001",
                    "jns_user" => "40",
                    "tgl" => date("Y-m-d"),
                    "waktu" => date("H:i:s"),
                    "via" => "Work From Office",
                    "kondisi" => "Sehat",
                    "status" => "Masuk",
                ),
                "3" => array(
                    "username" => "6106172907930001",
                    "jns_user" => "40",
                    "tgl" => date("Y-m-d"),
                    "waktu" => date("H:i:s"),
                    "via" => "Work From Office",
                    "kondisi" => "Sehat",
                    "status" => "Masuk",
                ),
                "4" => array(
                    "username" => "18121994470",
                    "jns_user" => "39",
                    "tgl" => date("Y-m-d"),
                    "waktu" => date("H:i:s"),
                    "via" => "Work From Office",
                    "kondisi" => "Sehat",
                    "status" => "Masuk",
                )
            );

            $usernamex = array('1105011207970006', '3209140904970009', '7314050409970001', '6106172907930001', '18121994470');
            $get_data   = $this->db
                ->select('*')
                ->from('absensi')
                ->where_in('username', $usernamex)
                ->where("tgl", date('Y-m-d'))
                ->get();
            if ($get_data->num_rows() > 0) {
                return true;
            } else {
                for ($i = 0; $i < 4; $i++) {
                    $this->db->insert('absensi', $data_masuk[$i]);
                }
                return true;
            }
        } elseif (date("H:i:s") >= "16:00:00" && date("H:i:s") <= "23:59:00") {
            $data_keluar = array(
                "0" => array(
                    "username" => "1105011207970006",
                    "jns_user" => "40",
                    "waktu_pulang" => date("H:i:s"),
                    "status" => "Pulang",
                ),
                "1" => array(
                    "username" => "3209140904970009",
                    "jns_user" => "40",
                    "waktu_pulang" => date("H:i:s"),
                    "status" => "Pulang",
                ),
                "2" => array(
                    "username" => "7314050409970001",
                    "jns_user" => "40",
                    "waktu_pulang" => date("H:i:s"),
                    "status" => "Pulang",
                ),
                "3" => array(
                    "username" => "6106172907930001",
                    "jns_user" => "40",
                    "waktu_pulang" => date("H:i:s"),
                    "status" => "Pulang",
                ),
                "4" => array(
                    "username" => "18121994470",
                    "jns_user" => "39",
                    "waktu_pulang" => date("H:i:s"),
                    "status" => "Pulang",
                )
            );

            $usernamex = array('1105011207970006', '3209140904970009', '7314050409970001', '6106172907930001', '18121994470');
            $get_data   = $this->db
                ->select('*')
                ->from('absensi')
                ->where_in('username', $usernamex)
                ->where("tgl", date('Y-m-d'))
                ->get();
            if ($get_data->num_rows() > 0) {
                for ($i = 0; $i < 4; $i++) {
                    $this->db->update('absensi', $data_keluar[$i], array('username' => $data_keluar[$i]['username'], 'tgl' => date('Y-m-d')));
                }
                return true;
            } else {
                return true;
            }
        }
    }
}

?>