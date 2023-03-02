<?php 
 
class M_data extends CI_Model{
	function data($number,$offset){
		return $query = $this->db->get('parfum',$number,$offset)->result();		
	}
 
	function jumlah_data(){
		return $this->db->get('parfum')->num_rows();
	}
}