<?php
class Mensajes_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function insert($array){
		return $this->db->insert('mp_mensajes',$array);
	}
	
	function update($array, $id){
		$this->db->where('men_id', $id);
		return $this->db->update('mp_mensajes', $array);
	}
	
	function getMensajesResividos($userId){
		$lsql = "SELECT men_id, men_remitente_id, men_destino_id, men_subject, men_descripcion, men_fecha, men_estado, men_tipoMensaje, men_respuesta_a";
		$lsql .= " FROM mp_mensajes WHERE men_destino_id = ".$userId;
		return mysql_query($lsql);
	}
	
	function getMensajesEnviados($userId){
		$lsql = "SELECT men_id, men_remitente_id, men_destino_id, men_subject, men_descripcion, men_fecha, men_estado, men_tipoMensaje, men_respuesta_a";
		$lsql .= " FROM mp_mensajes WHERE men_remitente_id = ".$userId;
		return mysql_query($lsql);
	}
	
	function getMensajesEliminados($userId){
		$lsql = "SELECT men_id, men_remitente_id, men_destino_id, men_subject, men_descripcion, men_fecha, men_estado, men_tipoMensaje, men_respuesta_a";
		$lsql .= " FROM mp_mensajes WHERE en_estado = 'ELIMINADO' AND men_destino_id = ".$userId." or men_remitente_id = ".$userId;
		return mysql_query($lsql);
	}
	
	function getMesajeById($id){
		$lsql = "SELECT men_id, men_remitente_id, men_destino_id, men_subject, men_descripcion, men_fecha, men_estado, men_tipoMensaje, men_respuesta_a";
		$lsql .= " FROM mp_mensajes WHERE men_id = ".$id;
		return mysql_query($lsql);
	}
}
?>
