<?php
class Banners_model extends CI_Model{
	function __construct()
    {
        parent::__construct();
    }

    function getBanners(){
   		$Lsql = "SELECT * FROM mp_baners"; 	
    	return mysql_query($Lsql);
    }


    function getbannersbycity($city_id){
    	$Lsql = "SELECT * FROM mp_baners WHERE ban_city_id = ".$city_id;
    	return mysql_query($Lsql);
    }

    function insert($datos){
    	return $this->db->insert('mp_baners',$datos);
    }

    function update($id, $datos){
    	$this->db->where('ban_id', $id);
    	return $this->db->update->('mp_baners', $datos);
    }

}