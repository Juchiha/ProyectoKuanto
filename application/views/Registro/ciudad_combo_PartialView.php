<?php 
    while ($fila = mysql_fetch_array($datosCiudad)){ 
?>
        <option value='<?php echo $fila['city_id']; ?>'><?php echo $fila['city_nombre']; ?></option>
<?php  } ?>