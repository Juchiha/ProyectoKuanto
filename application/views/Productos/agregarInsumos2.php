<thead class="widget-header">
    <tr>
            <th style="text-align:center;" class="col-sd-1" >CLASE</th>
            <th style="text-align:center;" class="col-sd-1" >CLAVE</th>
            <th style="text-align:center;" class="col-sd-4" >DESCRIPCIÓN</th>
            <th style="text-align:center;" >UNIDAD</th>
            <th style="text-align:center;" >STOK</th>
            <th style="text-align:center;" >PRECIO</th>
             <th style="text-align:center;" >TOTAL</th>
            <th style="text-align:center;" class="col-md-1" >FECHA</th>
            <th style="text-align:center;" class="col-sd-1" >CIUDAD</th>
            <th style="text-align:center;" class="col-sd-1" >LOG</th>
            <th style="text-align:center;" class="col-sd-1" >IMG</th>
            <th style="text-align:center;" class="col-sd-3" ></th>
    </tr>
</thead>
<tbody>
<?php
while ($fila = mysql_fetch_array($insumos)){
        $urlenvio = null;
        if($fila['in_url'] != null){
                $urlenvio = "Http://".$fila['in_url'];
        }else{
                $urlenvio = "#";
        }

        $imagenUsuario ="<img src='".base_url()."Images/users/".$fila['emp_imagen']."' alt='PERFIL/AVATAR' width='161' height='161'/>";
        $popover = 'class="imagenAvatar" title="'.$fila['nombres']." ".$fila['apellidos'].'" data-content="'.$imagenUsuario.'"';
?>		
<tr>
    <td data-title='CLASE' class="col-sd-1"><?php echo $fila['cl_nombre']; ?></th>
    <td data-title='CLAVE' class="col-sd-1" ><?php echo $fila['in_clave']; ?></td>
    <td data-title='DESCRIPCIÓN' class="col-sd-4" ><div class='tooltip-success'  data-rel='popover'  data-placement='top' title='Descripcion' data-content='<?php echo $fila['in_descripcion']; ?>'><?php echo getLongitudString($fila['in_descripcion']); ?></div></td>
    <td data-title='UNIDAD' style='text-align:center;'  ><?php echo $fila['sigla']; ?></td>
    <td data-title='STOK' style='text-align:center;'  ><?php echo $fila['in_cantidad']; ?></td>
    <td data-title='PRECIO' style='text-align:center; ' >$ <?php echo $fila['in_precio']; ?></td>
    <td data-title='TOTAL' style='text-align:center; ' >$ <?php echo ($fila['in_cantidad'] * $fila['in_precio']); ?></td>
    <td data-title='FECHA' style='width:70px;' class="col-md-1" ><?php echo $fila['in_fecha_']; ?></td>
    <td data-title='CIUDAD' class="col-sd-1" ><?php echo $fila['ti_nombre']; ?></td>
    <td data-title='LOG' class="col-sd-1" ><div <?php echo $popover; ?> style="text-align:center;"><img src='<?php echo base_url(); ?>Images/users/<?php echo $fila['emp_imagen']; ?>' alt='AVATAR' width='30' height='30' /></div></td>
    <td data-title='IMG' class="col-sd-1" style="text-align:center;"><a href='<?php echo $urlenvio; ?>' target='_blank'> <img src='<?php echo base_url(); ?>Images/Articulos/<?php echo $fila['in_img']; ?>' alt='ARTI' width='30' height='30' /></a></td>
    <td style='text-align:center;' class="col-sd-3"  >
			
            <a title="Eliminar" class='btn btn-danger btn-sm btneliminar' href="<?php echo base_url();?>articulos/eliminar/<?php echo $fila['in_id'];?>">
                    <i class='fa fa-trash-o'></i>
            </a>
            <a href="<?php echo base_url();?>articulos/editar/<?php echo $fila['in_id'];?>" role="button" title="Editar" class='btn btn-success btn-sm'>
                    <i class='fa fa-edit'></i>
            </a>
           
    </td>
</tr>
<?php	
}
?>
</tbody>




<?php
    function getLongitudString($cadena){
        $longitudString = strlen($cadena);
        if($longitudString > 80){
            $cadena = substr($cadena, 0, 80);
            $cadena .= "..."; 
        }
        return $cadena;
    }
?>