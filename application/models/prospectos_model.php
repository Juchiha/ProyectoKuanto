<?php
    class Prospectos_model extends CI_Model{
        function __construct()
        {
            parent::__construct();
        }

        function insertUsers($data){
            return $this->db->insert('mp_prospectos', $data);
        }
        
		function updatetUsers($data, $id){
            $this->db->where('pro_id',$id);
            return $this->db->update('mp_prospectos', $data);
        }
        
        function getProspectos(){
			$lsql = "SELECT pro_id, pro_nombres, pro_apellidos, pro_cargo, pro_correo, pro_telefono, pro_fecha, pro_estado_id, pro_empresa, pro_tipo_empresa, pro_id_agregado, concat( emp_nombre, ' ', emp_apellido ) as admin FROM mp_prospectos JOIN mp_empresa ON emp_id = pro_id_agregado WHERE pro_estado_id = 1;";
			return mysql_query($lsql);
		}

        function getProspectosByusers($id){
            $lsql = "SELECT pro_id, pro_nombres, pro_apellidos, pro_cargo, pro_correo, pro_telefono, pro_fecha, pro_estado_id, pro_empresa, pro_tipo_empresa, pro_id_agregado FROM mp_prospectos WHERE pro_estado_id = 1 AND pro_id_agregado = ".$id;
            return mysql_query($lsql);
        }

        function getProspectosbyId($id){
            $lsql = "SELECT pro_id, pro_nombres, pro_apellidos, pro_cargo, pro_correo, pro_telefono, pro_fecha, pro_estado_id, pro_empresa, pro_tipo_empresa, pro_id_agregado FROM mp_prospectos WHERE pro_estado_id = 1 AND pro_id =".$id;
            return mysql_query($lsql);
        }

        function getProspectosbyCity($city){
            $lsql = "SELECT pro_id, pro_nombres, pro_apellidos, pro_cargo, pro_correo, pro_telefono, pro_fecha, pro_estado_id, pro_empresa, pro_tipo_empresa, pro_id_agregado FROM mp_prospectos JOIN mp_empresa ON emp_id = pro_id_agregado WHERE pro_estado_id = 1 AND emp_ciudad =".$city;
            return mysql_query($lsql);
        }
    }
?>
