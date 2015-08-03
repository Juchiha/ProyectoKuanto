<div class="box">
    <div class="box-body table-responsive">
            <table id="<?php echo $idTabla; ?>" class="table table-striped  table-condensed cf dragable" style="margin:0 auto 0;">					
                <thead class="widget-header">
                   <tr>
                       <th style="text-align:center;" class="col-md-1" >CLAVE</th>
                       <th style="text-align:center;" class="col-md-4" >DESCRIPCIÓN</th>
                       <th style="text-align:center;" class="col-sd-1" >UNIDAD</th>
                       <th style="text-align:center;" class="col-sd-1" >STOK</th>
                       <th style="text-align:center;" class="col-sd-1" >PRECIO</th>
                       <th style="text-align:center;" class="col-sd-3" ></th>
                   </tr>
                </thead>
                <tbody>
           <?php
                   while ($fila = mysql_fetch_array($rs_articulos)){
                      
               ?>		
                   <tr>
                        <td data-title='CLAVE' class="col-md-1"  style='text-align:justify;' ><?php echo $fila['in_clave']; ?></td>
                        <td data-title='DESCRIPCIÓN' class="col-md-4"  style='text-align:justify;' ><?php echo getLongitudString($fila['in_descripcion']); ?></td>
                        <td data-title='UNIDAD' style='text-align:justify;' class="col-md-1"><?php echo $fila['sigla']; ?></td>
                        <td data-title='STOK' style='text-align:justify;' class="col-md-1"><?php echo $fila['in_cantidad']; ?></td>
                        <td data-title='PRECIO' style='text-align:justify;' class="col-md-1">$ <?php echo $fila['in_precio']; ?></td>
                        
                        <td style='text-align:justify;' class="col-md-3">
                           
                        </td>
                   </tr>
               <?php	
                       }
               ?>
               </tbody>
           </table>
    </div>
</div>



