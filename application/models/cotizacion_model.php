<?php
class Cotizacion_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function enviar_Cotizacion($data){
        return $this->db->insert('mp_cotizaciones', $data);//inserta a la base de datos.
    }
    
    function updtate_Cotizacion($data, $id){
		$this->db->where('cot_id', $id);
        return $this->db->update('mp_cotizaciones', $data);//uptate a la base de datos.
    }

    function getMisCotizaciones($usuId){
        $Lsql = "SELECT CONCAT(emp_nombre, ' ', emp_apellido) AS nombres, cot_asunto, cot_fecha, cot_visto, cot_id, in_descripcion, in_clave, uni_sigla, cl_nombre, in_id, cot_cantidad, cot_tipo_men, cot_resp_val, in_precio, cot_es_respuesta, cot_id_remitente, in_img , in_url, emp_imagen FROM mp_empresa";
        $Lsql .= " LEFT JOIN  mp_cotizaciones ON cot_id_remitente = emp_id LEFT JOIN mp_insumos ON in_id = cot_in_id LEFT JOIN mp_clases ON cl_id = in_cl_id LEFT JOIN mp_unidades ON uni_id = in_unidad WHERE cot_estado_id = 1 AND cot_id_destino =".$usuId;
        $Lsql .= " ORDER BY cot_fecha DESC";
        return mysql_query($Lsql);
    }

    function getMisCotizacionesenviadas($usuId){
        $Lsql = "SELECT CONCAT(emp_nombre, ' ', emp_apellido) AS nombres, cot_id_destino, cot_asunto, cot_fecha, cot_visto, cot_id, in_descripcion, in_clave, uni_sigla, cl_nombre, in_id, cot_cantidad, cot_tipo_men, cot_resp_val, in_precio, cot_es_respuesta, cot_id_remitente, in_img , in_url, emp_imagen FROM mp_empresa";
        $Lsql .= " LEFT JOIN  mp_cotizaciones ON cot_id_destino = emp_id LEFT JOIN mp_insumos ON in_id = cot_in_id LEFT JOIN mp_clases ON cl_id = in_cl_id LEFT JOIN mp_unidades ON uni_id = in_unidad WHERE cot_estado_id = 1 AND cot_id_remitente =".$usuId;
        $Lsql .= " ORDER BY cot_fecha DESC";
        return mysql_query($Lsql);
    }
    
    function getCotizacionesRespondidas($id){
        $respuesta = 0;
        $lsql = "select cot_resp_val from mp_cotizaciones where cot_respondido_a = ".$id;
        $result = mysql_query($lsql);
        while ($fila = mysql_fetch_array($result)){
            if($fila['cot_resp_val'] != 0){
                $respuesta = $fila['cot_resp_val'];
            }
        }
        return $respuesta;
    }
    
    function getCountMsg($id){
		$Lsql = "SELECT COUNT(cot_id) AS Total FROM mp_cotizaciones WHERE cot_estado_id = 1 AND cot_visto = 'N' AND cot_id_destino = ". $id;
		return mysql_query($Lsql); 
	}
	
	function getMesages($id){
		$Lsql = "SELECT CONCAT(emp_nombre, ' ', emp_apellido) AS nombres, emp_imagen, cot_asunto, cot_fecha FROM mp_empresa";
		$Lsql .= " LEFT JOIN  mp_cotizaciones ON cot_id_remitente = emp_id WHERE cot_estado_id = 1 AND cot_visto ='N'  AND cot_id_destino =".$id;
		$Lsql .= " ORDER BY cot_fecha DESC LIMIT 0,5";
		
		return mysql_query($Lsql);
	}

}
?>
