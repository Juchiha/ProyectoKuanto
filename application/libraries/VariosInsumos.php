<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VariosInsumos
 *
 * @author JOSE
 */
class VariosInsumos {
    function getLongitudString($cadena){
        $longitudString = strlen($cadena);
        if($longitudString > 100){
            $cadena = substr($cadena, 0, 100);
            $cadena .= "..."; 
        }
        return $cadena;
    }
    
    function getUltimoId($_idUsuario){
        $max = null;
        $Lsql = "SELECT MAX(in_clave) AS Ultimo FROM mp_insumos where in_emp_id= ".$_idUsuario.";";
        $row = mysql_query($Lsql);
        while($result = mysql_fetch_array($row)){
            if($result['Ultimo'] > 0){
                $max = $result['Ultimo'];
            }else{
                $max = 0;
            }
        }
        return $max;
    }
    
    function getCodeCity($idUser){
        $code = 0;
        $lsql = "select city_codigo from mp_ciudades join mp_empresa on emp_ciudad = city_id where emp_id =".$idUser;
        $row = mysql_query($lsql);
        $res =null;
        while($result = mysql_fetch_array($row)){
            $res = $result['Ultimo'];
        }
        return $res;
    }
    
    
    function generateCodeProduct($userID){
        $cityCode = $this->getCodeCity($userID);
        $ultimoId = $this->getUltimoId($userID) + 1;
        $clave = null;
        if($this->getTotalArticulos($userID)){
            return "Maximo_alcanzado";
        }else{
            if(mb_strlen($ultimoId) == 1){
                $ultimoId = "00".$ultimoId;
            }else if(mb_strlen($ultimoId) == 2){
                $ultimoId = "0".$ultimoId;
            }
            if($ultimoId == "001"){
                $clave = $cityCode.$userID.$ultimoId;
            }else{
                $clave = $ultimoId;
            }
            if(mb_strlen($clave) == 8){
                $clave = "00".$clave;
            }else if(mb_strlen($clave) == 9){
                $clave = "0".$clave;
            }
            return $clave;
        }        
    }
    
    function getTotalArticulos($id){
        $this->load->Model("Articulos_model");
        $row = $this->Articulos_model->getTotalProd($id);
        $bolean = FALSE;
        while($rsult = mysql_fetch_array($row)){
            $total = $rsult['total'];
            
            if($total >= 100){
                $bolean = TRUE;
            }
        }
        
        return $bolean;
    }
}
