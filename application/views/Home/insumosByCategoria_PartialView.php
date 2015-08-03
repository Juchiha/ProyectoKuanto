<div class="box">
    <div class="box-header">
        <h3 class="box-title">INSUMOS EN ESTA CATEGORIA</h3>                                    
    </div><!-- /.box-header -->
 
    <div class="box-body table-responsive">
        <section id="no-more-tables">
            <table id="<?php echo $idTabla; ?>" class="table table-striped  table-hover" style="margin:0 auto 0;">					
                <thead class="widget-header">
                   <tr>
                       <th style="text-align:center;" class="col-md-6" >DESCRIPCIÓN</th>
                       <th style="text-align:center;" class="col-sd-1" >UNIDAD</th>
                       <th style="text-align:center;" class="col-sd-1" >CIUDAD</th>
                       <th style="text-align:center;" class="col-sd-1" >PRECIO</th>
                       <th style="text-align:center;" class="col-sd-1" >LOG</th>
                       <th style="text-align:center;" class="col-sd-1" >IMG</th>
                   </tr>
                </thead>
                <tbody>
           <?php
                   while ($fila = mysql_fetch_array($rs_articulos)){
                       $urlenvio = null;
                       if($fila['in_url'] != null){
                               $urlenvio = "Http://".$fila['in_url'];
                       }else{
                               $urlenvio = "#";
                       }
                       $imagen = null;
                       if($fila['in_img'] != null || $fila['in_img'] != ""){
                          $imagen = "<a href='". $urlenvio."' target='_blank'> <img src='". base_url()."Images/Articulos/".$fila['in_img']."' alt='ARTI' width='30' height='30' /></a>";
                          $oterimagen = "<img src='". base_url()."Images/Articulos/".$fila['in_img']."' alt='ARTI' width='161' height='161' />";
                          $popoverImeg = 'class="imagenAvatar" data-content="'.$oterimagen.'"';
                       }else{
                           $imagen = "NO";
                       }
                       $imagenUsuario ="<img src='". base_url()."Images/users/".$fila['emp_imagen']."' alt='PERFIL/AVATAR' width='161' height='161'/>";
                       $popover = 'class="imagenAvatar" title="'.$fila['nombres']." ".$fila['apellidos'].'" data-content="'.$imagenUsuario.'"';
               ?>		
                   <tr>
                       <td data-title='DESCRIPCIÓN' class="col-md-6" ><div class='tooltip-success'  data-rel='popover'  data-placement='top' title='Descripcion' data-content='<?php echo $fila['in_descripcion']; ?>'><?php echo getLongitudString($fila['in_descripcion']); ?></div></td>
                       <td data-title='UNIDAD' class="col-sd-1" style='text-align:center;'><?php echo $fila['sigla']; ?></td>
                       <td data-title='STOK' class="col-sd-1" style='text-align:center;'><?php echo $fila['ti_nombre']; ?></td>
                       <td data-title='PRECIO' class="col-sd-1" style='text-align:center;'>$ <?php echo $fila['in_precio']; ?></td>
                       <td data-title='LOG' class="col-sd-1" ><div style="text-align:center;" <?php echo $popover; ?>><img src='<?php echo base_url(); ?>Images/users/<?php echo $fila['emp_imagen']; ?>' alt='AVATAR' width='30' height='30' /></div></td>
                       <td data-title='IMG' class="col-sd-1" style="text-align:center;" ><div style="text-align:center;" <?php if($popoverImeg != 'NO') echo $popoverImeg; ?>><?php echo $imagen;?></div></td>
                      <!-- <td style='text-align:center;' class="col-sd-1" >
                           <a href="#myModal" role="button" class='btn btn-primary btn-sm LaunchModalDetails' data-toggle="modal" idInsumo="<?php echo $fila['in_id']; ?>" >
                               <i class='fa fa-sign-in'></i>
                           </a>
                       </td>-->
                   </tr>
               <?php	
                       }
               ?>
               </tbody>
           </table>
        </section>
    </div>
</div>

