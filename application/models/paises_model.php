<?php
class Paises_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    function getPaises(){
        $lsql = "Select pa_id, pa_nombre from mp_paises where pa_estado = 1 AND pa_id != 0";
        return mysql_query($lsql);
    }

    function getCiudades($paisId){
        $Lsql ="select city_id, city_nombre from mp_ciudades where city_estado = 1 AND city_pais_id = ".$paisId;
        return mysql_query($Lsql);
    }


    
}
?>