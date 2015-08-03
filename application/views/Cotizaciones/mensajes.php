<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	<?php 
		$mensajesCoubt = 0;
		while ($co = mysql_fetch_array($totalMensajes)){ 
			if($co['Total'] > 0){
				$mensajesCoubt = $co['Total'];
	?>
				<i class="fa fa-envelope-o"></i>
				<span class="label label-success"><?php echo $co['Total']; ?></span>	
	<?php 		
			}else{
	?>		
				<i class="fa fa-envelope-o"></i>		
	<?php		
			}
		} 
	?>	
</a>
<ul class="dropdown-menu">
	<li class="header">Tienes <?php echo $mensajesCoubt; ?> Mensajes</li>
	<li>
		<!-- inner menu: contains the actual data -->
		<ul class="menu">
			<?php while($row = mysql_fetch_array($mensajes)) {?>
				<li><!-- start message -->
					<a href="<?php echo base_url();?>cotizaciones/mis_cotizaciones">
						<div class="pull-left">
							<img src="<?php echo base_url();?>Images/users/<?php echo $row['emp_imagen']; ?>" with='40' height='40' class="img-circle" alt="User Image"/>
						</div>
						<h4>
							<?php echo $row['nombres'];?>
							<small><i class="fa fa-clock-o"></i> <?php echo xfecha(getFecha(), $row['cot_fecha']); ?> </small>
						</h4>
						<p><?php echo $row['cot_asunto']; ?></p>
					</a>
				</li><!-- end message -->
			<?php } ?>
		</ul>
	</li>
	<li class="footer"><a href="<?php echo base_url();?>cotizaciones/mis_cotizaciones">Ver todos los mensajes</a></li>
</ul>


<?php
	
	function getFecha(){
		$ci = &get_instance();
		$ci->load->helper('date');
        $datestring = "%Y-%m-%d %h:%i:%a";
        $dring = mdate($datestring);
        return $dring;
	}

	function xfecha($date1,$date2){
		
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
?>