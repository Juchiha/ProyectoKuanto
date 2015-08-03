<?php
class Autenticacion_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function verificaUsuario($mail, $contrasena){
        $this->db->select('emp_id, emp_correo');
        $this->db->where('emp_correo', $mail);
        $this->db->where('emp_password', $contrasena);
        $this->db->where('emp_estado_id', 1);
        $this->db->limit(1);
        $query = $this->db->get('mp_empresa');
        // si el resultado de la query es positivo
        if ($query->num_rows() > 0){
            // devolvemos TRUE
            return TRUE;
            // si el resultado de la query no es positivo
        } else {
            // devolvemos FALSE
            return FALSE;
        }
    }


    function getdatosUsuario($mail){
        $lsql = "select emp_id,emp_ciudad,emp_user_code,emp_rol_usuario,emp_imagen, concat(emp_nombre, ' ', emp_apellido) as nombres, emp_fecha, emp_RFC, rol_descripcion from mp_empresa JOIN mp_roles on rol_id = emp_rol_usuario where emp_estado_id =1 and emp_correo = '" . $mail ."'";
        return mysql_query($lsql);
    }


}

?>