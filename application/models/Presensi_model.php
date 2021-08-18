<?php 

	class Presensi_model extends CI_Model {

        public function get_entries($username)
        {
            if($username == 'admin'){
                $get_data   = $this->db
                            ->select('*')
                            ->from('tbl_plot_dosen')
                            ->get();
            }else{
                $get_data   = $this->db
                ->select('*')
                ->from('tbl_plot_dosen')
                ->where("nip", $username)
                ->get();
            }
            if($get_data->num_rows() > 0) {
                return $get_data->result();
            } else {
                return false;
            }
        }

        public function insert_entry($data)
        {
            return $this->db->insert('tbl_plot_dosen', $data);
        }

        public function delete_entry($id){
        	return $this->db->delete('tbl_plot_dosen', array('id_plot' => $id));
           }

        public function edit_entry($id){
        	$this->db->select("*");
        	$this->db->from("tbl_plot_dosen");
        	$this->db->where("id_plot", $id);
        	$query = $this->db->get();
        	if (count($query->result()) > 0) {
        		return $query->row();
        	}
        }

        public function update_entry($data)
        {
            return $this->db->update('tbl_plot_dosen', $data, array('id_plot' => $data['id_plot']));
        }

}