<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>KUANTO.INFO | Mis Cotizaciones</title>
        <meta content='width=device-width, initial-scale=1, -scale=1maximum, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?PHP echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?PHP echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
         
        <!-- Ionicons -->
        <link href="<?PHP echo base_url(); ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?PHP echo base_url(); ?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?PHP echo base_url(); ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?PHP echo base_url(); ?>css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>css/alertify.core.css" rel="stylesheet"/>
        <link href="<?php echo base_url(); ?>css/alertify.default.css" rel="stylesheet"/>
        <link href="<?php echo base_url(); ?>css/table-responsive.css" rel="stylesheet"/>

        <link rel="shortcut icon" href="<?php echo base_url();?>img/k_icon1.png"/>
        
         <!-- jQuery 2.0.2 -->
        <script src="<?PHP echo base_url(); ?>js/Jquery2.1.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style>
			.presupuesto{
					cursor: pointer;
			}
        </style>
    </head>
    <body class="pace-done skin-blue fixed">
        <!-- header logo: style can be found in header.less -->
	<?php $this->load->view('header'); ?>
	<!-- fin del Header -->
        
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
					<!-- Sidebar user panel -->
                    <?php $this->load->view('sidebar_user'); ?>                    
                    <!-- fin del user panel -->
                    <!-- search form -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>home/landpage">
                                <i class="fa fa-th-list"></i> <span>Global</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>home/homePage">
                                <i class="fa fa-th-list"></i><span>Local</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>blog/">
                                <i class="fa fa-rss"></i><span>Blog</span>
                            </a>
                        </li>
                        <li class="treeview active">
                            <a href="#">
                                <i class="fa fa-dashboard"></i>
                                <span>Control</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li ><a href="<?php echo base_url(); ?>articulos/mis_articulos" ><i class="fa fa-angle-double-right"></i> Mis Articulos</a></li>
                                <li class="active"><a href="<?php echo base_url(); ?>cotizaciones/mis_cotizaciones"><i class="fa fa-angle-double-right"></i> Mis Cotizaciones</a></li>
                                <li><a href="<?php echo base_url(); ?>presupuestos/mis_presupuestos" ><i class="fa fa-angle-double-right"></i> Mis Presupuestos</a></li>
                            </ul>
                        </li>
                        <?php if($this->session->userdata('tipo_user') == 'Administrador' || $this->session->userdata('tipo_user') == 'Direccion'){ ?>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-bar-chart-o"></i>
                                        <span>Administrador</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url(); ?>reporteador/getProducts" ><i class="fa fa-angle-double-right"></i> Articulos</a></li>
                                    <li><a href="<?php echo base_url(); ?>reporteador/getUsers"><i class="fa fa-angle-double-right"></i> Usuarios</a></li>
                                    <li><a href="<?php echo base_url(); ?>prospectos" ><i class="fa fa-angle-double-right"></i> Prospectos</a></li>
                                    <li><a href="<?php echo base_url(); ?>reporteador/estadisticas"><i class="fa fa-angle-double-right"></i> Estadisticas</a></li>
                                    <li><a href="<?php echo base_url(); ?>reporteador/mensagero" ><i class="fa fa-angle-double-right"></i> Mensajero</a></li>
                                    <li><a href="<?php echo base_url(); ?>blog/verentradas"><i class="fa fa-rss"></i><span>Admin Blog</span></a></li>
                                </ul>
                            </li> 
                        <?php } ?>
                        <?php if($this->session->userdata('tipo_user') == 'Direccion' ){ ?>                     
                            <li>
                                <a href="<?php echo base_url(); ?>opciones">
                                    <i class="fa  fa-gears"></i><span>Dirección</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
						Cotizaciones
                        <small>Mis Cotizaciones</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Cotizaciones</a></li>
                        <li class="active">Mis Cotizaciones</li>
                    </ol>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#Cotizaciones_Res" data-toggle="tab">
                                    Cotizaciones Recibidas
                                </a>
                            </li>
                            <li>
                                <a href="#Cotizaciones_Env" data-toggle="tab">   
                                    Cotizaciones Enviadas
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="Cotizaciones_Res">
                                <div class="box">
                                    <div class="box-header">
                                                                     
                                    </div><!-- /.box-header -->
                                    <section id="no-more-tables">
                                        <table id="tablamispresupuestos" class="table table-striped table-bordered table-hover table-condensed cf" style="margin:0 auto 0;">
                                            <thead class="widget-header">
                                                    <tr>
                                                            <th class="col-sm-1" style="text-align:center;">CLASE</th>
                                                            <th class="col-sm-1" style="text-align:center;">CLAVE</th>
                                                            <th class="col-sm-4" style="text-align:center;">DESCRIPCIÓN</th>
                                                            <th class="col-sm-1" style="text-align:center;">UNIDAD</th>
                                                            <th class="col-sm-2" style="text-align:center;">RECIBIDO</th>
                                                            <th style="text-align:center;">LOG</th>
                                                            <th style="text-align:center;">CANT</th>
                                                            <th class="col-sm-1" style="width:10%; text-align:center;">PRECIO $</th>
                                                            <th class="col-sm-1" style="width:10%; text-align:center;">PRECIO R</th>
                                                            <th class="col-sm-1" style="text-align:center;">TOTAL</th>
                                                            <th class="col-sm-1" style="text-align:center;"></th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                while ($fila = mysql_fetch_array($arrayvista)){
                                                    $imagenUsuario ="<img src='".base_url()."Images/users/".$fila['emp_imagen']."' alt='PERFIL/AVATAR' width='161' height='161'/>";
                                                    $popover = 'class="imagenAvatar" title="'.$fila['nombres'].'" data-content="'.$imagenUsuario.'"';
                                                    $respondido = getRespondidos($fila['cot_id']);
                                                    if($respondido != 0){
                                            ?>      
                                                        <tr>
                                                            <td data-title='CLASE' class="col-sm-1"><?php echo $fila['cl_nombre']; ?></td>
                                                            <td data-title='CLAVE' class="col-sm-1" ><?php echo $fila['in_clave']; ?></td>
                                                            <td data-title='DESCRIPCIÓN' class="col-sm-4" ><?php echo getLongitudString($fila['in_descripcion']); ?></td>
                                                            <td data-title='UNIDAD' class="col-sm-1" ><?php echo $fila['uni_sigla']; ?></td>
                                                            <td data-title='FECHA' class="col-sm-2" ><?php echo $fila['cot_fecha']; ?></td>
                                                            <td data-title='LOG' style="text-align:center;"><div <?php echo $popover; ?> style="text-align:center;"><img src='<?php echo base_url(); ?>Images/users/<?php echo $fila['emp_imagen']; ?>' alt='AVATAR' width='30' height='30' /></div></td>
                                                            <td data-title='CANT' style="text-align:center;"><?php echo $fila['cot_cantidad']; ?></td>
                                                            <td data-title='PRECIO' class="col-sm-1" style="text-align:center;"><?php echo $fila['in_precio']; ?></td>
                                                            <td data-title='PRECIO R' class="col-sm-1" style="text-align:center;"><?php echo $respondido; ?></td>
                                                            <td data-title='TOTAL' class="col-sm-1" id="Total_'.<?php echo $fila['cot_id']; ?>.'"> <?php echo ($fila['cot_cantidad'] * $respondido); ?></td>
                                                            <td class="col-sm-1" style="text-align:center;">
                                                                <!--<button class="btn btn-success btn-sm" data-placement="left" title="Remitente: <?php //echo $fila['nombres']; ?>"><i class="fa fa-mail-forward"></i></button>-->
                                                            </td>                                
                                                        </tr>
                                            <?php   
                                                    }else{
                                                        if($fila['cot_es_respuesta'] == 'S'){
                                            ?>          
                                                    
                                                            <tr>
                                                                <td data-title='CLASE' class="col-sm-1"><?php echo $fila['cl_nombre']; ?></td>
                                                                <td data-title='CLAVE' class="col-sm-1" ><?php echo $fila['in_clave']; ?></td>
                                                                <td data-title='DESCRIPCIÓN' class="col-sm-4" ><?php echo getLongitudString($fila['in_descripcion']); ?></td>
                                                                <td data-title='UNIDAD' class="col-sm-1" ><?php echo $fila['uni_sigla']; ?></td>
                                                                <td data-title='FECHA' class="col-sm-2" ><?php echo $fila['cot_fecha']; ?></td>
                                                                <td data-title='LOG' style="text-align:center;"><div <?php echo $popover; ?> style="text-align:center;"><img src='<?php echo base_url(); ?>Images/users/<?php echo $fila['emp_imagen']; ?>' alt='AVATAR' width='30' height='30' /></div></td>
                                                                <td data-title='CANT' style="text-align:center;"><?php echo $fila['cot_cantidad']; ?></td>
                                                                <td data-title='PRECIO' class="col-sm-1" style="text-align:center;"><?php echo $fila['in_precio']; ?></td>
                                                                <td data-title='PRECIO R' class="col-sm-1" ><input disabled type="text" name="txtRespuesta" class="col-sm-12" id="IdRespuesta_<?php echo $fila['cot_id']; ?>" totalTr="Total_<?php echo $fila['cot_id']; ?>" type="text" name="tatCuerpoMensaje" Placeholder="Respuesta" user="<?php echo $fila['cot_id_remitente']; ?>" asunto="<?php echo $fila['nombres'];?>'" insumo="<?php echo $fila['in_id']; ?>" cantidad="<?php echo $fila['cot_cantidad']; ?>" cotre="<?php echo $fila['cot_id']; ?>" value="<?php echo $fila['in_precio']; ?>">  </td>
                                                                <td data-title='TOTAL' class="col-sm-1" id="Total_'.<?php echo $fila['cot_id']; ?>.'"> <?php echo ($fila['cot_cantidad'] * $fila['cot_resp_val']); ?></td>
                                                                <td class="col-sm-1" style="text-align:center;">
                                                                    <!--<button class="btn btn-success btn-sm" data-placement="left" title="Remitente: <?php ///echo $fila['nombres']; ?>"><i class="fa fa-mail-forward"></i></button>-->
                                                                </td>                                
                                                            </tr>
                                            
                                            <?php           
                                                        }else{
                                                            
                                            ?>
                                                            <tr>
                                                                <td data-title='CLASE' class="col-sm-1"><?php echo $fila['cl_nombre']; ?></td>
                                                                <td data-title='CLAVE' class="col-sm-1" ><?php echo $fila['in_clave']; ?></td>
                                                                <td data-title='DESCRIPCIÓN'class="col-sm-4" ><?php echo getLongitudString($fila['in_descripcion']); ?></td>
                                                                <td data-title='UNIDAD' class="col-sm-1" ><?php echo $fila['uni_sigla']; ?></td>
                                                                <td data-title='FECHA' class="col-sm-2" ><?php echo $fila['cot_fecha']; ?></td>
                                                                <td data-title='LOG' style="text-align:center;"><div <?php echo $popover; ?> style="text-align:center;"><img src='<?php echo base_url(); ?>Images/users/<?php echo $fila['emp_imagen']; ?>' alt='AVATAR' width='30' height='30' /></div></td>
                                                                <td data-title='CANT' style="text-align:center;"><?php echo $fila['cot_cantidad']; ?></td>
                                                                <td data-title='PRECIO' class="col-sm-1" style="text-align:center;"><?php echo $fila['in_precio']; ?></td>
                                                                <td data-title='PRECIO R' class="col-sm-1" ><input type="text" name="txtRespuesta" class="col-sm-12 tatCuerpoMensaje" id="IdRespuesta_<?php echo $fila['cot_id']; ?>" totalTr="Total_<?php echo $fila['cot_id']; ?>" type="text" name="tatCuerpoMensaje" Placeholder="Respuesta" user="<?php echo $fila['cot_id_remitente']; ?>" asunto="<?php echo $fila['nombres'];?>'" insumo="<?php echo $fila['in_id']; ?>" cantidad="<?php echo $fila['cot_cantidad']; ?>" cotre="<?php echo $fila['cot_id']; ?>">    </td>
                                                                <td data-title='TOTAL' class="col-sm-1" id="Total_<?php echo $fila['cot_id']; ?>"><?php echo ($fila['cot_cantidad'] * $respondido); ?></td>
                                                                <td class="col-sm-1" style="text-align:center;">
                                                                    <button class="btn btn-success btn-sm abrirResponder" data-placement="left"  IdRespuesta ="IdRespuesta_<?php echo $fila['cot_id']; ?>" title="responder a : <?php echo $fila['nombres']; ?>"><i class="fa fa-mail-forward"></i></button>
                                                                </td>                                
                                                            </tr>
                                            <?php               
                                                            
                                                        }
                                                    }
                                                    
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </section>
                                </div>
                            </div>   

                            <div class="tab-pane" id="Cotizaciones_Env">
                                <div class="box">
                                    <div class="box-header">
                                                                     
                                    </div><!-- /.box-header -->
                                    <section id="no-more-tables">
                                        <table id="tablamispresupuestos2" class="table table-striped table-bordered table-hover table-condensed cf" style="margin:0 auto 0;">
                                            <thead class="widget-header">
                                                    <tr>
                                                            <th class="col-sm-1" style="text-align:center;">CLASE</th>
                                                            <th class="col-sm-1" style="text-align:center;">CLAVE</th>
                                                            <th class="col-sm-4" style="text-align:center;">DESCRIPCIÓN</th>
                                                            <th class="col-sm-1" style="text-align:center;">UNIDAD</th>
                                                            <th class="col-sm-2" style="text-align:center;">ENVIADO</th>
                                                            <th style="text-align:center;">LOG</th>
                                                            <th style="text-align:center;">CANT</th>
                                                            <th class="col-sm-1" style="width:10%; text-align:center;">PRECIO $</th>
                                                            <th class="col-sm-1" style="width:10%; text-align:center;">PRECIO R</th>
                                                            <th class="col-sm-1" style="text-align:center;">TOTAL</th>
                                                            <th class="col-sm-1" style="text-align:center;"></th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                while ($fila = mysql_fetch_array($mias)){
                                                    $imagenUsuario ="<img src='".base_url()."Images/users/".$fila['emp_imagen']."' alt='PERFIL/AVATAR' width='161' height='161'/>";
                                                    $popover = 'class="imagenAvatar" title="'.$fila['nombres'].'" data-content="'.$imagenUsuario.'"';
                                                    $respondido = getRespondidos($fila['cot_id']);
                                                    if($respondido != 0){
                                            ?>      
                                                        <tr>
                                                            <td data-title='CLASE' class="col-sm-1"><?php echo $fila['cl_nombre']; ?></td>
                                                            <td data-title='CLAVE' class="col-sm-1" ><?php echo $fila['in_clave']; ?></td>
                                                            <td data-title='DESCRIPCIÓN' class="col-sm-4" ><?php echo getLongitudString($fila['in_descripcion']); ?></td>
                                                            <td data-title='UNIDAD' class="col-sm-1" ><?php echo $fila['uni_sigla']; ?></td>
                                                            <td data-title='FECHA' class="col-sm-2" ><?php echo $fila['cot_fecha']; ?></td>
                                                            <td data-title='LOG' style="text-align:center;"><div <?php echo $popover; ?> style="text-align:center;"><img src='<?php echo base_url(); ?>Images/users/<?php echo $fila['emp_imagen']; ?>' alt='AVATAR' width='30' height='30' /></div></td>
                                                            <td data-title='CANT' style="text-align:center;"><?php echo $fila['cot_cantidad']; ?></td>
                                                            <td data-title='PRECIO' class="col-sm-1" style="text-align:center;"><?php echo $fila['in_precio']; ?></td>
                                                            <td data-title='PRECIO R' class="col-sm-1" style="text-align:center;"><?php echo $respondido; ?></td>
                                                            <td data-title='TOTAL' class="col-sm-1" id="Total_'.<?php echo $fila['cot_id']; ?>.'"> <?php echo ($fila['cot_cantidad'] * $respondido); ?></td>
                                                            <td class="col-sm-1" style="text-align:center;">
                                                                <!--<button class="btn btn-success btn-sm" data-placement="left" title="Remitente: <?php //echo $fila['nombres']; ?>"><i class="fa fa-mail-forward"></i></button>-->
                                                            </td>                                
                                                        </tr>
                                            <?php   
                                                    }else{
                                            ?>           
                                                            <tr>
                                                                <td data-title='CLASE' class="col-sm-1"><?php echo $fila['cl_nombre']; ?></td>
                                                                <td data-title='CLAVE' class="col-sm-1" ><?php echo $fila['in_clave']; ?></td>
                                                                <td data-title='DESCRIPCIÓN'class="col-sm-4" ><?php echo getLongitudString($fila['in_descripcion']); ?></td>
                                                                <td data-title='UNIDAD' class="col-sm-1" ><?php echo $fila['uni_sigla']; ?></td>
                                                                <td data-title='FECHA' class="col-sm-2" ><?php echo $fila['cot_fecha']; ?></td>
                                                                <td data-title='LOG' style="text-align:center;"><div <?php echo $popover; ?> style="text-align:center;"><img src='<?php echo base_url(); ?>Images/users/<?php echo $fila['emp_imagen']; ?>' alt='AVATAR' width='30' height='30' /></div></td>
                                                                <td data-title='CANT' style="text-align:center;"><?php echo $fila['cot_cantidad']; ?></td>
                                                                 <td data-title='PRECIO' class="col-sm-1" style="text-align:center;"><?php echo $fila['in_precio']; ?></td>
                                                                <td data-title='PRECIO R' class="col-sm-1" >Esparando... </td>
                                                                <td data-title='TOTAL' class="col-sm-1" id="Total_<?php echo $fila['cot_id']; ?>">Esperando...</td>
                                                                <td class="col-sm-1" style="text-align:center;">
                                                                    <button class="btn btn-success btn-sm reenviar" data-placement="left" usuario="<?php echo $fila['cot_id_destino']; ?>" insumo="<?php echo $fila['in_id']; ?>" cantidad="<?php echo $fila['cot_cantidad']; ?>"  IdRespuesta ="IdRespuesta_<?php echo $fila['cot_id']; ?>" title="reenviar a : <?php echo $fila['nombres']; ?>"><i class="fa fa-mail-forward"></i></button>
                                                                </td>                                
                                                            </tr>
                                            <?php               
                                                    }
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ESCCENAs ATICULOS PROPIOS -->
                </section><!-- /.content -->
                <div class="row">
                    <div class="col-md-11" style="text-align:right; cursor:pointer;">
                       
                    </div>
                    <div class="col-md-1" style="text-align:right;">
                         
                    </div>
                </div>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <div class="modal fade" id="email-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Nuevo Mensaje</h4>
                    </div>
                    <form id="enviomensaje" method ="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">CC:</span>
                                    <input name="subject" type="text" id="textsubject" class="form-control" placeholder="Email Subject">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <textarea name="mensaje" id="email_message" class="form-control" placeholder="Mensage" style="height: 120px;"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

                            <button type="button" id="envioMensaje" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Enviar Mensaje</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
       
        <!-- jQuery UI 1.10.3 -->
        <!-- Bootstrap -->
        <script src="<?PHP echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?PHP echo base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?PHP echo base_url(); ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
  
        <script src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script> 
        <script src="<?php echo base_url(); ?>js/dataTables.bootstrap.js"></script>
		<script src="<?php echo base_url();?>js/alertify.js"></script>
        
        
        
        <?php
            function getLongitudString($cadena){
                $longitudString = strlen($cadena);
                if($longitudString > 80){
                    $cadena = substr($cadena, 0, 80);
                    $cadena .= "..."; 
                }
                return $cadena;
            }
            
            function getRespondidos($id){
				$res = 0;
				$ci = &get_instance();
				$ci->load->Model('Cotizacion_model');
				$res = $ci->Cotizacion_model->getCotizacionesRespondidas($id);		  
				return $res;
			}
        ?>
	<script type="text/javascript">	
            
            cotizacion = {
                enviarrespuestabuton: function(){
					$(".abrirResponder").click(function(){
						    var textRespuesta = $("#" +$(this).attr("idRespuesta"));
						    var destino = textRespuesta.attr('user');;
							//var asunto = $(this).attr('asunto');
							var msg = textRespuesta.val();
							var cantidad = textRespuesta.attr("cantidad");
							var insumo = textRespuesta.attr("insumo");
							var cotre = textRespuesta.attr("cotre");
						    var id = $(this);
							var trId = $('#' + textRespuesta.attr("TotalTr"));
							
							$.ajax({
									url:"<?php echo base_url();?>cotizaciones/EnviarMensaggeRespuesta",
									type:"POST",
									data:"destino="+destino+"&cantidad="+cantidad+"&respuestaId="+msg+"&insumo="+insumo+"&Remitente="+cotre,
									success:function(data){
										if(data === "LISTO"){											
											
										   // $("#Reponder").hide();
											textRespuesta.attr("title", "Cotizacion respondida");
											textRespuesta.attr("disabled","disabled");
											trId.html(cantidad * msg);
											id.attr("disabled","disabled");	
											alertify.success('Tu respuesta ha sido enviada con exito');
											return false;
										}

									}
							});                    
					});
				},
				
				enviarrespuestatext:function(){
					$(".tatCuerpoMensaje").keypress(function(e){
						//alert("Me has presionado");
						var code = e.keyCode || e.which;
						if(code === 13) { //Enter keycode
							var destino = $(this).attr('user');;
							//var asunto = $(this).attr('asunto');
							var msg = $(this).val();
							var cantidad = $(this).attr("cantidad");
							var insumo = $(this).attr("insumo");
							var cotre = $(this).attr("cotre");
							var id = $(this);
							var trId = $(this).attr("TotalTr");

							$.ajax({
									url:"<?php echo base_url();?>cotizaciones/EnviarMensaggeRespuesta",
									type:"POST",
									data:"destino="+destino+"&cantidad="+cantidad+"&respuestaId="+msg+"&insumo="+insumo+"&Remitente="+cotre,
									success:function(data){
											if(data === "LISTO"){
												alertify.success('Tu respuesta ha sido enviada con exito');
											   // $("#Reponder").hide();
												id.attr("title", "Cotizacion respondida");
												id.attr("disabled","disabled");
												$("#"+trId).html(cantidad * msg);
												return false;
											}

									}
							});
						}

					});
					
				},

                reenviarCotizacion : function(){
                    $(".reenviar").click(function(){
                        var destino = $(this).attr('usuario');;
                        var cantidad = $(this).attr("cantidad");
                        var insumo = $(this).attr("insumo");
                        var id = $(this);
                        $.ajax({
                            url : "<?php echo base_url(); ?>home/cotizar",
                            type: "POST",
                            data:{destino: destino, insumo:insumo, cantidad:cantidad},
                            success:function(data){
                                if(data === 'INSERTADO'){
                                    alertify.success("Hemos Reenviado tu cotizacion!!!");
                                    
                                }else{
                                    alertify.error("No logramos reenviar la cotizacion, lo sentimos!!!");
                                }
                            }
                        });

                             
                    });
                }
            }
            
            $(function(){
                $('#tablamispresupuestos').dataTable({
                    "oLanguage": {
                        "sLengthMenu": "_MENU_ registros por pagina",
                        "sZeroRecords": "0 resultados en el criterio de busqueda",
                        "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
                        "sInfoFiltered": "(Filtrado de _MAX_ total registros)",
                        "sSearch": "Buscar:"
                    },
                    "aoColumns": [{ "bSortable": false },{ "bSortable": false },  null, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false } ] ,
					"fnDrawCallback": function (oSettings, json) {
                            $(".imagenAvatar").popover({trigger: 'hover','placement': 'left', html:true});
                            cotizacion.enviarrespuestabuton();
                            cotizacion.enviarrespuestatext();
                    },
                    "iDisplayLength": 20,
                    "aLengthMenu": [[20, 40, 60, -1], [20, 40, 60, 100]]
                 });
                     
                $('#tablamispresupuestos2').dataTable({
                    "oLanguage": {
                        "sLengthMenu": "_MENU_ registros por pagina",
                        "sZeroRecords": "0 resultados en el criterio de busqueda",
                        "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
                        "sInfoFiltered": "(Filtrado de _MAX_ total registros)",
                        "sSearch": "Buscar:"
                    },
                    "aoColumns": [{ "bSortable": false },{ "bSortable": false },  null, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false }, { "bSortable": false },{ "bSortable": false },  { "bSortable": false }, { "bSortable": false } ] ,
                    "fnDrawCallback": function (oSettings, json) {
                            $(".imagenAvatar").popover({trigger: 'hover','placement': 'left', html:true});
                            cotizacion.reenviarCotizacion();
                    },
                    "iDisplayLength": 20,
                    "aLengthMenu": [[20, 40, 60, -1], [20, 40, 60, 100]]
                });
                 $(".presupuesto").click(function(){
						var tr = $('#' + $(this).attr('mostrar'));
						var i  = $('#' + $(this).attr('myclass'));
						var id = $(this).attr('valor');
						
						if(tr.is(":hidden")){
							tr.show();
							i.removeClass('fa-chevron-circle-right'); 
							i.addClass('fa-chevron-circle-down');
						}else{
							tr.hide();
							i.removeClass('fa-chevron-circle-down'); 
							i.addClass('fa-chevron-circle-right');
						}
						
				 });	
                 
                 $("#envioMensaje").click(function(){
                    $.ajax({
                        url : "<?php echo base_url(); ?>mensajes/createMensajesAdmin",
                        type:"POST",
                        data:{ subject: $("#textsubject").val(), mensaje: $("#email_message").val()},
                        success:function(data){
                            $("#email-modal").modal('hide');
                            alertify.success(data);
                        }
                    });

                });   	

            });
	</script>


    </body>
</html>


