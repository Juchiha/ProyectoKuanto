<?php
class Estadisticas_model extends CI_Model{
	function __construct()
    {
        parent::__construct();
    }


    function getEstadisticas(){
        $Lsql = "SELECT city_nombre, COUNT(emp_id) AS total FROM mp_ciudades JOIN mp_empresa ON emp_ciudad = city_id WHERE city_estado = 1 AND city_codigo != '000' AND emp_estado_id =1 GROUP BY city_nombre";
        return mysql_query($Lsql);
    }

    function getciudadesPaiesestadistica(){
        $Lsql = "SELECT pa_nombre, COUNT(city_id) AS total FROM mp_paises JOIN mp_ciudades ON city_pais_id = pa_id WHERE pa_estado  = 1 AND pa_id != 0 GROUP BY pa_nombre";
        return mysql_query($Lsql);
    }

    function getArticulosporCiudad(){
    	$Lsql = "SELECT city_nombre, COUNT(in_id) AS total FROM mp_ciudades ";
    	$Lsql .= "JOIN mp_empresa ON emp_ciudad = city_id ";
    	$Lsql .= "JOIN mp_insumos ON in_emp_id = emp_id ";
    	$Lsql .= "WHERE city_codigo != '000' AND emp_estado_id = 1 AND in_estado_ = 1 ";
    	$Lsql .= "GROUP BY city_nombre";

    	return mysql_query($Lsql);
    }

    function getProspectosporCiudad(){
       // SELECT pro_id, pro_nombres, pro_apellidos, pro_cargo, pro_correo, pro_telefono, pro_fecha, pro_estado_id, pro_empresa, pro_tipo_empresa, pro_id_agregado FROM mp_prospectos JOIN mp_empresa ON emp_id = pro_id_agregado WHERE pro_estado_id = 1 AND emp_ciudad =".$city;
        $Lsql = "SELECT city_nombre, COUNT(pro_id) AS total FROM mp_ciudades ";
        $Lsql .= "JOIN mp_empresa ON emp_ciudad = city_id ";
        $Lsql .= "JOIN mp_prospectos ON emp_id = pro_id_agregado ";
        $Lsql .= "WHERE emp_estado_id = 1 ";
        $Lsql .= "GROUP BY city_nombre";


        return mysql_query($Lsql);
    }
}

