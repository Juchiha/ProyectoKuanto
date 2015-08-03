<?php
class Articulos_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function getArticulos_LandPage($claveNombre){
        $lsql = "SELECT uni_descripcion, in_descripcion, in_unidad, in_cantidad, in_precio, (in_cantidad * in_precio) AS total, city_nombre as ti_nombre, in_clave, in_fecha_, in_log, ctc_nombre, in_id, Upper(uni_sigla) as sigla, cl_nombre,in_img, emp_imagen , in_url, in_emp_id, Upper(emp_nombre) as nombres, Upper(emp_apellido) as apellidos";
        $lsql .= " FROM mp_insumos"; 
        $lsql .= " JOIN mp_unidades ON uni_id = in_unidad";        
        $lsql .= " LEFT JOIN mp_clases ON cl_id = in_cl_id";
        $lsql .= " LEFT JOIN mp_categoriaclave ON ctc_id = in_ctc_id";
        $lsql .= " LEFT JOIN mp_empresa ON emp_id = in_emp_id";
        $lsql .= " JOIN mp_ciudades ON emp_ciudad = city_id ";
        $lsql .= "  WHERE in_estado_ = 1  and in_publicado = 1 AND cl_nombre = '".$claveNombre."'  order by in_fecha_ DESC";

        return mysql_query($lsql);
    }

    function getArticulos_HomePage($ciudad, $claveNombre){
        $lsql = "SELECT uni_descripcion, in_descripcion, in_unidad, in_cantidad, in_precio, (in_cantidad * in_precio) AS total, city_nombre as ti_nombre, in_clave, in_fecha_, in_log, ctc_nombre, in_id, Upper(uni_sigla) as sigla, cl_nombre , in_img, emp_imagen, in_url, in_emp_id, Upper(emp_nombre) as nombres, Upper(emp_apellido) as apellidos, emp_tienda, emp_id";
        $lsql .= " FROM mp_insumos"; 
        $lsql .= " JOIN mp_unidades ON uni_id = in_unidad";
        $lsql .= " LEFT JOIN mp_clases ON cl_id = in_cl_id";
        $lsql .= " LEFT JOIN mp_categoriaclave ON ctc_id = in_ctc_id";
        $lsql .= " JOIN mp_empresa ON emp_id= in_emp_id";
        $lsql .= " JOIN mp_ciudades ON emp_ciudad = city_id ";
        $lsql .= " WHERE city_id = ".$ciudad." AND in_estado_ = 1 AND in_publicado = 1 AND cl_nombre = '".$claveNombre."' order by in_fecha_ DESC";
   
        return 	mysql_query($lsql);
    }

    function getArticulos_fromUser($iduser){
        $lsql = "SELECT uni_descripcion, in_descripcion, in_unidad, in_cantidad, in_precio, (in_cantidad * in_precio) AS total, city_nombre as ti_nombre, in_clave, in_fecha_, in_log, ctc_nombre, in_id, Upper(uni_sigla) as sigla, cl_nombre , in_img, emp_imagen, in_url, in_emp_id, Upper(emp_nombre) as nombres, Upper(emp_apellido) as apellidos, emp_tienda, emp_id";
        $lsql .= " FROM mp_insumos"; 
        $lsql .= " JOIN mp_unidades ON uni_id = in_unidad";
        $lsql .= " LEFT JOIN mp_clases ON cl_id = in_cl_id";
        $lsql .= " LEFT JOIN mp_categoriaclave ON ctc_id = in_ctc_id";
        $lsql .= " JOIN mp_empresa ON emp_id= in_emp_id";
        $lsql .= " JOIN mp_ciudades ON emp_ciudad = city_id ";
        $lsql .= " WHERE in_estado_ = 1 AND in_publicado = 1 AND emp_id =".$iduser." order by in_fecha_ DESC";

        return mysql_query($lsql);
    }

    function getArticulos_fromCity($ciudad){
        $lsql = "SELECT uni_descripcion, in_descripcion, in_unidad, in_cantidad, in_precio, (in_cantidad * in_precio) AS total, city_nombre as ti_nombre, in_clave, in_fecha_, in_log, ctc_nombre, in_id, Upper(uni_sigla) as sigla, cl_nombre , cl_descripcion, in_img, emp_imagen, in_url, in_emp_id, Upper(emp_nombre) as nombres, Upper(emp_apellido) as apellidos, in_cl_id";
        $lsql .= " FROM mp_insumos"; 
        $lsql .= " JOIN mp_unidades ON uni_id = in_unidad";
        $lsql .= " LEFT JOIN mp_clases ON cl_id = in_cl_id";
        $lsql .= " LEFT JOIN mp_categoriaclave ON ctc_id = in_ctc_id";
        $lsql .= " JOIN mp_empresa ON emp_id= in_emp_id";
        $lsql .= " JOIN mp_ciudades ON emp_ciudad = city_id ";
        $lsql .= " WHERE city_id = ".$ciudad." AND in_ctc_id = 11  AND in_estado_ = 1 AND in_publicado = 1 order by in_fecha_ DESC";

        return 	mysql_query($lsql);
    }

    function getArticulos(){
        $lsql = "SELECT uni_descripcion, in_descripcion, in_unidad, in_cantidad, in_precio, (in_cantidad * in_precio) AS total, city_nombre as ti_nombre, in_clave, in_fecha_, in_log, ctc_nombre, in_id, Upper(uni_sigla) as sigla, cl_nombre , cl_descripcion, in_img, emp_imagen, in_url, in_emp_id, Upper(emp_nombre) as nombres, Upper(emp_apellido) as apellidos";
        $lsql .= " FROM mp_insumos"; 
        $lsql .= " JOIN mp_unidades ON uni_id = in_unidad";
        $lsql .= " LEFT JOIN mp_clases ON cl_id = in_cl_id";
        $lsql .= " LEFT JOIN mp_categoriaclave ON ctc_id = in_ctc_id";
        $lsql .= " JOIN mp_empresa ON emp_id= in_emp_id";
        $lsql .= " JOIN mp_ciudades ON emp_ciudad = city_id ";
        $lsql .= " WHERE city_estado = 1 AND in_ctc_id = 11  AND in_estado_ = 1 AND in_publicado = 1 order by in_fecha_ DESC";

        return  mysql_query($lsql);
    }
    
    
    function getDetalleInsumo($insumoId){
        $lsql = "SELECT uni_descripcion, in_descripcion, in_unidad, in_cantidad, in_precio, (in_cantidad * in_precio) AS total, city_nombre as ti_nombre, in_clave, in_fecha_, in_log, ctc_nombre, in_id, Upper(uni_sigla) as sigla, cl_nombre , in_img, emp_imagen, in_url, in_emp_id, Upper(emp_nombre) as nombres, Upper(emp_apellido) as apellidos";
        $lsql .= " FROM mp_insumos"; 
        $lsql .= " JOIN mp_unidades ON uni_id = in_unidad";
        $lsql .= " LEFT JOIN mp_clases ON cl_id = in_cl_id";
        $lsql .= " LEFT JOIN mp_categoriaclave ON ctc_id = in_ctc_id";
        $lsql .= " JOIN mp_empresa ON emp_id= in_emp_id";
        $lsql .= " JOIN mp_ciudades ON emp_ciudad = city_id ";
        $lsql .= " WHERE in_id = ".$insumoId." AND in_estado_ = 1 AND in_publicado = 1";

        return 	mysql_query($lsql);
    }


    function getMisArticulos($usu_id){
        $lsql = "SELECT uni_descripcion, in_publicado, in_descripcion, in_unidad, in_cantidad, in_precio, (in_cantidad * in_precio) AS total, city_nombre as ti_nombre, in_clave, in_fecha_, in_log, ctc_nombre, in_id, Upper(uni_sigla) as sigla, cl_nombre , in_img, emp_imagen, in_url, in_emp_id, Upper(emp_nombre) as nombres, Upper(emp_apellido) as apellidos";
        $lsql .= " FROM mp_insumos"; 
        $lsql .= " JOIN mp_unidades ON uni_id = in_unidad";
        $lsql .= " LEFT JOIN mp_clases ON cl_id = in_cl_id";
        $lsql .= " LEFT JOIN mp_categoriaclave ON ctc_id = in_ctc_id";
        $lsql .= " JOIN mp_empresa ON emp_id= in_emp_id";
        $lsql .= " JOIN mp_ciudades ON emp_ciudad = city_id ";
        $lsql .= "  WHERE in_ctc_id = 11  AND in_estado_ = 1 AND in_emp_id = ".$usu_id." order by in_id DESC";

        return mysql_query($lsql);
    }


    function getMisArticulosCompuestos($usu_id){
        $lsql = "SELECT uni_descripcion, in_publicado, in_descripcion, in_unidad, in_cantidad, city_nombre as ti_nombre, in_fecha_, in_log, ctc_nombre, in_id, Upper(uni_sigla) as sigla, emp_imagen, in_emp_id, Upper(emp_nombre) as nombres, Upper(emp_apellido) as apellidos";
        $lsql .= " FROM mp_insumos"; 
        $lsql .= " JOIN mp_unidades ON uni_id = in_unidad";
        $lsql .= " LEFT JOIN mp_categoriaclave ON ctc_id = in_ctc_id";
        $lsql .= " JOIN mp_empresa ON emp_id= in_emp_id";
        $lsql .= " JOIN mp_ciudades ON emp_ciudad = city_id ";
        $lsql .= "  WHERE in_ctc_id = 10 AND in_estado_ = 1 AND in_emp_id = ".$usu_id." order by in_id DESC";

        return mysql_query($lsql);
    }
    
    
    function getMisaticulosCount($id, $clave){
		$arreglo = array('in_emp_id' => $id, 'in_estado_' => 1, 'in_ctc_id' => $clave);
		$this->db->where($arreglo);
		$this->db->from('mp_insumos');
		return $this->db->count_all_results();
	}
    
    
    function getInsumobyxCompbyPadre($padre){
        $lsql = "SELECT uni_descripcion, in_descripcion, in_unidad, com_cantidad  as in_cantidad, in_precio, (in_cantidad * in_precio) AS total, city_nombre as ti_nombre, in_clave, in_fecha_, in_log, ctc_nombre, in_id, Upper(uni_sigla) as sigla, cl_nombre , cl_descripcion, in_img, emp_imagen, in_url, in_emp_id, Upper(emp_nombre) as nombres, Upper(emp_apellido) as apellidos, in_cl_id";
        $lsql .= " FROM mp_insumos"; 
        $lsql .= " JOIN mp_unidades ON uni_id = in_unidad";
        $lsql .= " LEFT JOIN mp_clases ON cl_id = in_cl_id";
        $lsql .= " LEFT JOIN mp_categoriaclave ON ctc_id = in_ctc_id";
        $lsql .= " JOIN mp_empresa ON emp_id= in_emp_id";
        $lsql .= " JOIN mp_ciudades ON emp_ciudad = city_id ";
        $lsql .= " JOIN mp_compuestos ON com_insumo = in_id ";
        $lsql .= " WHERE com_padre = ".$padre;

        return  mysql_query($lsql);
    }

    function getInsumobyId($insumoId){
        $lsql = "SELECT uni_descripcion, in_descripcion, in_unidad, in_cantidad, in_precio, (in_cantidad * in_precio) AS total, city_nombre as ti_nombre, in_clave, in_fecha_, in_log, ctc_nombre, in_id, Upper(uni_sigla) as sigla, cl_nombre , cl_descripcion, in_img, emp_imagen, in_url, in_emp_id, Upper(emp_nombre) as nombres, Upper(emp_apellido) as apellidos, in_cl_id";
        $lsql .= " FROM mp_insumos"; 
        $lsql .= " JOIN mp_unidades ON uni_id = in_unidad";
        $lsql .= " LEFT JOIN mp_clases ON cl_id = in_cl_id";
        $lsql .= " LEFT JOIN mp_categoriaclave ON ctc_id = in_ctc_id";
        $lsql .= " JOIN mp_empresa ON emp_id= in_emp_id";
        $lsql .= " JOIN mp_ciudades ON emp_ciudad = city_id ";
        $lsql .= " WHERE in_id = ".$insumoId;

        return 	mysql_query($lsql);
    }
    
    function getUnidades(){
        $lsql ="select uni_id, uni_sigla, uni_descripcion from mp_unidades";
        
        return mysql_query($lsql);
    }
    
    function getClasesInsumo(){
        $lsql = "SELECT cl_id, cl_nombre, cl_descripcion FROM mp_clases where cl_estado = 1";
        
        return mysql_query($lsql);
    }
    
    function getTotalProd($user){
        $Lsql = "select count(in_id) as total from mp_insumos where in_emp_id = ".$user." and in_estado_ = 1 and in_publicado = 1";
       
        return mysql_query($Lsql);
    }
    
    function insert($data){
            return $this->db->insert('mp_insumos', $data);
    }

   function editDatos($data, $id){
	    $this->db->where('in_id', $id);
            return $this->db->update('mp_insumos', $data);
   }

   function insertC($data){
            return $this->db->insert('mp_compuestos', $data);
    }

   function editDatosC($data, $id){
        $this->db->where('in_id', $id);
            return $this->db->update('mp_insumos', $data);
   }
}
