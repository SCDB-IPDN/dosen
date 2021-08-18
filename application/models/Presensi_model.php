<?php 

	class Presensi_model extends CI_Model {

        public function get_entries()
        {
                $query = $this->db->get('tbl_plot_dosen');
                // if (count( $query->result() ) > 0) {
                	return $query->result();
                // }
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