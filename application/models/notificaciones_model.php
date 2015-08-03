<?php
class Notificaciones_model extends CI_Model{
	function __construct()
    {
        parent::__construct();
    }


    function insert($data){
    	return $this->db->insert('mp_notificaciones', $data);
    }

    function update($data, $id){
        $this->db->where('not_id', $id);
        return $this->db->update('mp_notificaciones', $data);
    }

    function getNotificaciones($userId){
        $Lsql = "SELECT * FROM mp_notificaciones";
        $Lsql .= " JOIN mp_post ON not_pos_id = pos_id";
        $Lsql .= " JOIN mp_empresa ON emp_id = pos_emp_id";
        $Lsql .= " WHERE not_estado = 1 AND emp_id = ".$userId." LIMIT 0,6" ; 
        return mysql_query($Lsql);
    }

    function countNotificaciones($userId){
        $Lsql = "SELECT  COUNT(*) as total FROM mp_notificaciones";
        $Lsql .= " JOIN mp_post ON not_pos_id = pos_id";
        $Lsql .= " JOIN mp_empresa ON emp_id = pos_emp_id";
        $Lsql .= " WHERE not_estado = 1 AND emp_id = ".$userId; 
        return mysql_query($Lsql);
    }


 }

 ?>