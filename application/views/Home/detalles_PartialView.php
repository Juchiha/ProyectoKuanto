<?php
	while ($fila = mysql_fetch_array($detalle_Articulo)){
?>
		<table class="table table-striped table-bordered table-hover ">
			<tr>
				<td style="width: 20%;">
                                    <img src="<?php echo base_url(); ?>Images/Articulos/<?php echo $fila['in_img']; ?>" alt='ARTI' width='100px' height='100px' />
				</td>
				<td>
					<table style="width:100%;">
						<tr>
							<th>DESCRIPCIÓN</th>
						<tr>
						<tr>
							<td><?php echo $fila['in_descripcion']; ?></td>
						<tr>
					</table>
					<table style="width:100%;">
						<tr>
							<th>CLAVE</th>
							<th>UNIDAD</th>
							<th>STOCK</th>
							<th>PRECIO</th>
						<tr>
						<tr>
							<td><?php echo $fila['in_clave']; ?></td>
							<td><?php echo $fila['sigla']; ?></td>
							<td><?php echo $fila['in_cantidad']; ?></td>
							<td>$ <?php echo $fila['in_precio']; ?></td>
						<tr>
					</table>
				</td>
			</tr>
		</table>
<?php
	}
?>	