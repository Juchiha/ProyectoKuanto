<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VariosCotizaciones
 *
 * @author JOSE
 */
class VariosCotizaciones {
    
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
    
    function setCotizacionesVistas($id){
        $resultado = null;
        $lsql = "UPDATE mp_cotizaciones SET cot_visto = 'S' where cot_id = ".$id;
        mysql_query($lsql);
        if(mysql_affected_rows() > 0){
            $resultado = "LISTO";
        }else{
            $resultado = "NO";
        }
        return $resultado;
    }


    function setCotizacionesNoVistas($id){
        $resultado = null;
        $lsql = "UPDATE mp_cotizaciones SET cot_visto = 'N' where cot_id = ".$id;
        mysql_query($lsql);
        if(mysql_affected_rows() > 0){
            $resultado = "LISTO";
        }else{
            $resultado = "NO";
        }
        return $resultado;
    }

    function DiferenciaFecha($date1,$date2){

        $diff = abs(strtotime($date2) - strtotime($date1)); 
        $years   = floor($diff / (365*60*60*24)); 
        $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
        $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $hours   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
        $minuts  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
        $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minuts*60)); 
        $total = 0;
        if($days > 0){
            $total = $days." D&iacute;as";
        }else{
            if($hours > 0){
                $total = $hours." Horas";
            }else{
                $total = "Hace unos Momentos";
            }
        }
        return $total;
    }    
    
    
}
