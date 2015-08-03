<table class="table table-striped table-bordered table-hover" style="margin:0 auto 0;">

<!--	<thead class="widget-header">
			<tr>
				<th style="text-align:center;" class="col-sd-1"></th>
				<th style="text-align:center;" class="col-sd-1" >CLAVE</th>
				<th style="text-align:center;" class="col-sd-5" >DESCRIPCI&Oacute;N</th>
				<th style="text-align:center;" class="col-sd-1" >UNIDAD</th>
				<th style="text-align:center;" class="col-sd-1" >Cantidad</th>
				<th style="text-align:center;" class="col-sd-1" >PRESIO</th>
				<th style="text-align:center;" class="col-sd-2"></th>
			</tr>
	</thead> -->
	<tbody>
	<?php
		while ($fila = mysql_fetch_array($matrices)){ ?>		
		
		<tr style="color: #0000FF;">
			<td class="presupuesto" style="text-align: center;">
				<i class="fa fa-caret-square-o-right"></i>
			</td>
			<td class="col-sd-1" ><? echo $fila['mat_clave']; ?></td>
			<td class="col-sd-5" ><? echo $fila['mat_descripcion']; ?></td>
			<td style="text-align:center;" class="col-sd-1" ></td>
			<td style="text-align:center;" class="col-sd-1" ><? echo $fila['mat_cantidad']; ?></td>
			<td style="text-align:center;" class="col-sd-1" ></td>
			<td class="col-sd-2" style="text-align:center;">

			</td>
		</tr>
		
	<?php } ?>
	</tbody>
</table>
