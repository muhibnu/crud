<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	*
	*/
	class Mymodel extends CI_Model{
		public function GetMahasiswa($table){
			$res=$this->db->get($table);
			return $res->result_array();
		}
	
		public function Insert($table,$data){
			$res = $this->db->insert($table,$data);
			return $res;
		}

		public function Update($table, $where, $data){
			$this->db->where('no_induk', $where);
			$this->db->update($table, $data);
		}

		public function Delete($table, $where){
			$res = $this->db->delete($table, $where);
			return $res;
		}
	}
?>		

