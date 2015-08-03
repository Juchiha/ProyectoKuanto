<?php while($fila = mysql_fetch_array($presupuesto)){ ?>    
    <tr id="<?php echo $fila['mat_id'];?>">
        <td style="text-align:justify;" class="col-md-1">MATR</td>
        <td style="text-align:justify;" class="col-md-1"><?php echo $fila['mat_clave'];?></td>
        <td style="text-align:justify;" class="col-md-4"><?php echo $fila['mat_descripcion'];?></td>
        <td style="text-align:justify;" class="col-md-1">Un</td>
        <td style="text-align:justify;" class="col-md-1"><?php echo $fila['mat_cantidad'];?></td>
        <td style="text-align:justify;" class="col-md-1"></td>
        <td style="text-align:justify;" class="col-md-1"><?php echo " 100 $";//$fila['acum_nombre'];?></td>
        <td style="text-align:justify;" class="col-md-3">
            <div class="btn-group">
                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">
                    <i class="fa fa-plus"></i>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="#" class="btninsumoC" padre="<?php echo $fila['mat_id'];?>" data-toggle="modal">I Compuesto</a></li>
                    <li><a href="#" class="btninsumoB" padre="<?php echo $fila['mat_id'];?>" data-toggle="modal">I Basico</a></li>
                </ul>
            </div>
            <button title="editar" class="btn btn-success btn-mini editar" ids="<?php echo $fila['mat_id'];?>" ><i class="fa fa-edit"></i></button>
            <button title="eliminar" class="btn btn-danger btn-mini eliminar" ids="<?php echo $fila['mat_id'];?>" ><i class="fa fa-trash-o"></i></button>   
           
        </td>
    </tr>
<?php } ?>