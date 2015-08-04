<?php
	
	$ci = &get_instance();
	$ci->load->Model('Blog_model');

	while($fila = mysql_fetch_array($datos)){

		$urlMostrar = '';
		$urlMostrar = "<a href='".base_url()."blog/verentrada/".$fila['pos_id']."'> Ver mas</a>";
		$contenido = $fila['pos_descripcion'];
		$imagen = '';
		$contenido = getLongitudString($contenido, $urlMostrar);
		if($fila['pos_articulo'] == 1){
			$imagen = "<a class='fancybox' href='".base_url().$fila['pos_imagen']."'><img src=".base_url().$fila['pos_imagen']." class='imagenblog' ></a>";
		}else{
			$imagen = "<a class='fancybox' href='".base_url()."Images/post/".$fila['pos_imagen']."'><img src=".base_url()."Images/post/miniaturas/".$fila['pos_imagen']." class='imagenblog' ></a>";
		}
		
		$Lsql = "<div class='row-fluid sombra' background-color:#E5E5E5;>
					<div class='col-md-12'>
						<p>".$fila['pos_fecha']."</p>
						<p><h1><a href='".base_url()."blog/verentrada/".$fila['pos_id']."'>".$fila['pos_titulo']."</a></h1></p>
						<p style='text-align:justify;'>".$contenido."</p>
						<p><b>Autor : ".$fila['emp_nombre']." ".$fila['emp_apellido']."</b></p>
						".$imagen."
					</div>
				</div>
				<div>&nbsp;</div>		
				<div class='row-fluid'>
					<div class='col-md-12'>
						<a target='_blank' href='http://twitter.com/share?url=http://www.kuanto.info/blog/verentrada/".$fila['pos_id']."&text=".$fila['pos_titulo']."' alt='Compartir en Twitter' class='compartirClass' valuePost='".$fila['pos_id']."'><i class='fa fa-share'></i> <i class='fa fa-twitter'></i></a>&nbsp;&nbsp;
						<a target='_blank' href='http://www.facebook.com/sharer.php?u=http://www.kuanto.info/blog/verentrada/".$fila['pos_id']."&t=".$fila['pos_titulo']."' alt='Compartir en Facebook' class='compartirClass' valuePost='".$fila['pos_id']."'><i class='fa fa-facebook'></i></a>&nbsp;&nbsp;
						<a target='_blank' href='https://plus.google.com/share?url=www.kuanto.info/blog/verentrada/".$fila['pos_id']."' alt='Compartir en  Google Plus' class='compartirClass' valuePost='".$fila['pos_id']."'><i class='fa fa-google-plus'></i></a>
						&nbsp;&nbsp;";

		if($this->session->userdata('login_ok')){
			$res = $ci->Blog_model->getlikemio($fila['pos_id'], $ci->session->userdata('userId'));
			$Count = $ci->Blog_model->getCountLikes($fila['pos_id']);
			if($res == 0){
				$Lsql .= "<a class='likeClass' style='cursor:pointer; ' valuePost='".$fila['pos_id']."' id='megusta_".$fila['pos_id']."' otro='nomegusta_".$fila['pos_id']."' alt='Me gusta'><i class='fa fa-thumbs-o-up'></i></a>";
				$Lsql .= "<a style='cursor:pointer; display:none; color: red;' class='NolikeClass' valuePost='".$fila['pos_id']."' id='nomegusta_".$fila['pos_id']."' otro='megusta_".$fila['pos_id']."' alt='te gusta esto'><i class='fa fa-thumbs-o-up'></i></a>";
				$Lsql .= "&nbsp;&nbsp;<a id='countLikes_".$fila['pos_id']."' alt='Total likes'>".$Count."</a>";
			}else{
				$Lsql .= "<a style='cursor:pointer; color: red;' class='NolikeClass' valuePost='".$fila['pos_id']."' id='nomegusta_".$fila['pos_id']."' otro='megusta_".$fila['pos_id']."' alt='te gusta esto'><i class='fa fa-thumbs-o-up'></i></a>";
				$Lsql .= "<a class='likeClass' style='cursor:pointer; display:none;' valuePost='".$fila['pos_id']."' id='megusta_".$fila['pos_id']."' otro='nomegusta_".$fila['pos_id']."'' alt='Me gusta'><i class='fa fa-thumbs-o-up'></i></a>";
				$Lsql .= "&nbsp;&nbsp;<a id='countLikes_".$fila['pos_id']."' alt='Total likes'>".$Count."</a>";
			}	
		}else{
			$Lsql .= '<a href="'.base_url().'login/index/blog" >Login a tu cuenta!</a>';
		}
					
		$comantarios = $ci->Blog_model->getcomentsByPost($fila['pos_id']);	
		$datas = '';
		while($filax = mysql_fetch_array($comantarios)){
			$datas .= '<p>
							<label>
								<a href="#">
									<img src="'.base_url().'Images/users/'.$filax['emp_imagen'].'" class="img-circle" width="30" height="30" alt="User Image" />&nbsp;'.$filax['usuario'].' :
								</a>
							</label>
							'.$filax['com_descripcion'].'
						</p>';
		
						
		}	

		$Lsql .= " </div>
				</div>
				<div>&nbsp;</div>
				<div class='row-fluid'>
					<div class='col-md-12' id='cajacoments_".$fila['pos_id']."'>
						".$datas."
					</div>
				</div>";

		if($this->session->userdata('login_ok')){
			$Lsql .= "<div class='row-fluid'>
					<div class='col-md-12'>
						<input type='text' class='comentarText form-control' valuePost='".$fila['pos_id']."' placeholder='Comentar.......'>
					</div>
				</div>";
		}
				
		$Lsql .= "<div>&nbsp;</div><div>&nbsp;</div>";
		echo $Lsql;
	}

	
    function getLongitudString($cadena, $url){
        $longitudString = strlen($cadena);
        
        $cosa = '';
        if($longitudString > 200){
            $cosa = substr($cadena, 0, 200);
            $cosa .= "... ".$url."</p>"; 
        }
        return $cosa;
    }

?>

