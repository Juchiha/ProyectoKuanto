<?php
    class Users_Model extends CI_Model{
        function __construct()
        {
            parent::__construct();
        }

        function insertUsers($data){
            return $this->db->insert('mp_empresa', $data);
        }

		function updateUsers($data, $id){
			$this->db->where('emp_id', $id);
			return $this->db->update('mp_empresa', $data);
		}

        function updatepais($array, $id){
            $this->db->where('pa_id', $id);
            return $this->db->update('mp_paises', $array);
        }

        function updatecity($array, $id){
            $this->db->where('city_id', $id);
            return $this->db->update('mp_ciudades', $array);
        }

        function createPais($array){
            return $this->db->insert('mp_paises', $array);
        }

        function createCity($array){
            return $this->db->insert('mp_ciudades', $array);
        }

        function getUsersById($id){
            $Lsql = 'SELECT emp_id , emp_nombre , emp_RFC , emp_direccion_f,  emp_pais, emp_ciudad, emp_telefono ,emp_razon_social, emp_correo , emp_password , emp_apellido , emp_imagen';
            $Lsql .= ' FROM mp_empresa where emp_estado_id = 1 and emp_id = '.$id;
	   // echo $Lsql;
            return mysql_query($Lsql);
        }
        
        function getUsersByCity($city){
            $Lsql = 'SELECT emp_id , emp_nombre , emp_user_type, emp_RFC , emp_direccion_f, emp_pais, emp_ciudad, emp_telefono , emp_correo , emp_password , emp_apellido , emp_imagen, emp_razon_social, emp_tienda, emp_rol_usuario ';
            $Lsql .= 'FROM mp_empresa where emp_estado_id = 1 and emp_ciudad = '.$city;
            
            return mysql_query($Lsql);
        }

        function getUsers(){
            $Lsql = 'SELECT emp_id , emp_nombre , emp_user_type, emp_RFC , emp_direccion_f,  emp_pais, emp_ciudad, emp_telefono , emp_correo , emp_password , emp_apellido , emp_imagen, emp_razon_social, emp_tienda , emp_rol_usuario ';
            $Lsql .= 'FROM mp_empresa where emp_estado_id = 1';
            
            return mysql_query($Lsql);
        }

		function getPaises(){
		   $lsql = "select pa_id, pa_nombre from mp_paises where pa_estado = 1";
		   return mysql_query($lsql);
		}

		function getCiudad($pais){
		   $lsql = "SELECT city_id, city_nombre, city_codigo from mp_ciudades where city_estado = 1 and city_pais_id = ".$pais;
		   return mysql_query($lsql);
		}

        function getCiudades(){
           $lsql = "SELECT city_id, city_nombre, city_codigo from mp_ciudades where city_estado = 1";
           return mysql_query($lsql);
        }

        function getCiudadbyId($city){
           $lsql = mysql_query("SELECT city_id, city_nombre, city_codigo, city_pais_id from mp_ciudades where city_estado = 1 and city_id = ".$city);
           $pais = 0;
           while($fila = mysql_fetch_array($lsql)){
                $pais = $fila['city_pais_id'];
           }
           return $pais;
        }

        function getadminCity($pais){
            $Lsql ="SELECT concat( emp_nombre, ' ', emp_apellido ) as admin, emp_id , emp_RFC , emp_pais, emp_ciudad, emp_telefono , emp_correo , emp_imagen, emp_user_code FROM mp_empresa WHERE emp_user_code = '0001' AND emp_estado_id =1 AND emp_ciudad = ".$pais; 
             return mysql_query($Lsql);
        }

        function getdatosUsuario($code){
            $lsql = "SELECT emp_id from mp_empresa where emp_estado_id = 3 and emp_segure_code = '" . $code ."'";
            return mysql_query($lsql);
        }

        function getCorreoUsuarioAdmin(){
            $lsql = "SELECT emp_correo from mp_empresa where emp_user_code = '0001' AND emp_estado_id =1";
            return mysql_query($lsql);
        }

        function getdatosUsuarioMail($mail){
            $lsql = "SELECT COUNT(emp_id) as total from mp_empresa where emp_estado_id = 1 and emp_correo = '" . $mail ."'";
            return mysql_query($lsql);
        }

        function getdatosUsuarioMail2($mail){
            $lsql = "SELECT COUNT(emp_id) as total from mp_empresa where emp_correo = '" . $mail ."'";
            return mysql_query($lsql);
        }

    }
?>
