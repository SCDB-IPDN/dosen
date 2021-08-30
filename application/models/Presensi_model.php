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
        } else {
            $get_data   = $this->db
                ->select('*')
                ->from('tbl_plot_dosen')
                ->where("nip", $username)
                ->get();
        }
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
        ->group_by(array("StatusMonitoring","nama","nama_matkul","id_prodi"))
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
                ->select('*')
                ->from('absensi')
                ->where("tgl", date('Y-m-d'))
                ->get();
        } else {
            $get_data   = $this->db
                ->select('*')
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
             CASE WHEN keterangan is null and upload is null THEN \'Belum Mulai\' 
             WHEN keterangan is NOT null and upload is null THEN \'Sedang Berlangsung\' 
             WHEN keterangan is NOT null and upload is NOT null THEN \'Telah Selesai\'END AS StatusMonitoring')
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
}
