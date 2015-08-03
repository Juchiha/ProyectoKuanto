<?php
class Presupuestos_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
 

 	function insertProyects($datos, $tabla){
 		return $this->db->insert($tabla,$datos);
 	}

 	function updateproyects($id, $id_tabla, $tabla, $datos ){
 		$this->db->where($id_tabla, $id);
 		return $this->db->update($tabla, $datos);
 	}

	function getProyects($userID){
		$lsql = "SELECT proyect_id, proyect_name, proyect_clave, proyect_descripcion FROM mp_proyectos WHERE ";
		$lsql .= " proyect_emp_id = ".$userID." AND proyect_estado_id = 1 order by proyect_fecha DESC";
		return mysql_query($lsql);
	}
	
	function getSecondLevel($id){
		$lsql = "SELECT acum_id,acum_nombre, acum_descripcion, acum_sigla, acum_padre_id, acum_fecha, acum_estado_id, acum_proyect_id FROM mp_acumuladores WHERE acum_estado_id = 1 AND acum_proyect_id = ". $id . " and acum_padre_id = 0";
		return mysql_query($lsql);
	}
	
	
	function getAgrupadores($id){
		$lsql = "SELECT acum_id,acum_nombre, acum_descripcion, acum_sigla, acum_padre_id, acum_fecha, acum_estado_id, acum_proyect_id FROM mp_acumuladores WHERE acum_estado_id = 1 AND acum_padre_id = ".$id;
		return mysql_query($lsql);
	}
	
	function getMatrix($id){
		$Lsql = "SELECT mat_id, mat_descripcion, mat_cantidad, mat_clave FROM mp_matrizes WHERE mat_estado_ = 1 and mat_acum_id = ".$id;
        return mysql_query($Lsql);
	}

	function getDatosAgrupadorbyId($id){
		$lsql = "SELECT acum_id,acum_nombre, acum_descripcion, acum_sigla, acum_padre_id, acum_fecha, acum_estado_id, acum_proyect_id FROM mp_acumuladores WHERE acum_id = ".$id;
		return mysql_query($lsql);
	}
	

	function getDatosAgrupadordats($fecha, $clave, $padre){
		$lsql = "SELECT acum_id,acum_nombre, acum_descripcion, acum_sigla, acum_padre_id, acum_fecha, acum_estado_id, acum_proyect_id FROM mp_acumuladores WHERE acum_sigla='".$clave."' AND acum_padre_id=".$padre." AND acum_fecha = '".$fecha."' ";
		return mysql_query($lsql);
	}

	function getDatosMatrizdats($fecha, $clave, $padre){
		$lsql = "SELECT mat_id, mat_descripcion, mat_cantidad, mat_clave FROM mp_matrizes WHERE mat_clave='".$clave."' AND mat_acum_id=".$padre." AND mat_fecha_ = '".$fecha."' ";
		return mysql_query($lsql);
	}
}
