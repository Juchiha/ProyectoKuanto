<?php while($fila = mysql_fetch_array($acordeon)){ ?>    
    <tr style="color: #61210B;"  id="<?php echo $fila['acum_id'];?>">
        <td style="text-align:justify;" class="col-md-1">III</td>
        <td style="text-align:justify;" class="col-md-1"><?php echo $fila['acum_sigla'];?></td>
        <td style="text-align:justify;" class="col-md-4"><?php echo $fila['acum_descripcion'];?></td>
        <td style="text-align:justify;" class="col-md-1">Un</td>
        <td style="text-align:justify;" class="col-md-1">1</td>
        <td style="text-align:justify;" class="col-md-1"></td>
        <td style="text-align:justify;" class="col-md-1"><?php echo " 100 $";//$fila['acum_nombre'];?></td>
        <td style="text-align:justify;" class="col-md-3">
            <div class="btn-group">
                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">
                    <i class="fa fa-plus"></i>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="#" class="btnPadreMAtrix" padre="<?php echo $fila['acum_id'];?>" color="#61210B"  nivel="IV" data-toggle="modal">Matriz</a></li>
                </ul>
            </div>
            <button title="editar" class="btn btn-success btn-mini editar" ids="<?php echo $fila['acum_id'];?>" ><i class="fa fa-edit"></i></button>
            <button title="eliminar" class="btn btn-danger btn-mini eliminar" proyect ="<?php echo $valueProyects;?>" ids="<?php echo $fila['acum_id'];?>" ><i class="fa fa-trash-o"></i></button>   
            
        </td>
    </tr>
<?php 
    //aqui se traen los agrupadores de ese agrupador
    $ci = &get_instance();
    $ci->load->Model('Presupuestos_model');  
    $row = $ci->Presupuestos_model->getMatrix($fila['acum_id']);
    $datos_vista = Array('presupuesto' => $row);
    $this->load->view('Presupuestos/verMatriz', $datos_vista );  

    } 
?>