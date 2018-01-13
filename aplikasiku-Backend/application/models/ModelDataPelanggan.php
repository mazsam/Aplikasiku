<?php
    class ModelDataPelanggan extends CI_Model {
       
        public function __construct(){
            $this->load->database();
        }

         public function getuser($code){  
        
            $this->db->select('*');
            $this->db->from('data_pelanggan');
            $this->db->where('code',$code);
            $query = $this->db->get();

            return $query;
        } 

        public function getPelanggan($table){
            $query = $this->db->get($table);
            return $query->result_array();
        }

        public function getPelangganEdit($table,$where){
            return $this->db->get_where($table, $where);
        }

        public function insertPelanggan($table,$data){
            $query = $this->db->insert($table, $data);
            return $query; 
        }
     
        public function updatePelanggan($table, $data, $where){
            $query = $this->db->update($table, $data, $where);
            return $query;
        }
     
        public function deletePelanggan($table, $where){
            $query = $this->db->delete($table, $where);
            return $query;
        }
      
    }
?>