<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>KUANTO.INFO | Reporteador</title>
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
        <link rel="shortcut icon" href="<?php echo base_url();?>img/k_icon1.png"/>
                <!-- jQuery 2.0.2 -->
        <script src="<?PHP echo base_url(); ?>js/Jquery2.1.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
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
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i>
                                <span>Control</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>articulos/mis_articulos"><i class="fa fa-angle-double-right"></i> Mis Articulos</a></li>
                                <li><a href="<?php echo base_url(); ?>cotizaciones/mis_cotizaciones"><i class="fa fa-angle-double-right"></i> Mis Cotizaciones</a></li>
                                <li><a href="<?php echo base_url(); ?>presupuestos/mis_presupuestos"><i class="fa fa-angle-double-right"></i> Mis Presupuestos</a></li>
                            </ul>
                        </li>

                         <?php if($this->session->userdata('tipo_user') == 'Administrador' || $this->session->userdata('tipo_user') == 'Direccion'){ ?>
                            <li class="treeview active">
	                            <a href="#">
	                                <i class="fa fa-bar-chart-o"></i>
										<span>Administrador</span>
									<i class="fa fa-angle-left pull-right"></i>
	                            </a>
	                            <ul class="treeview-menu">
	                                <li><a href="<?php echo base_url(); ?>reporteador/getProducts" ><i class="fa fa-angle-double-right"></i> Articulos</a></li>
	                                <li><a href="<?php echo base_url(); ?>reporteador/getUsers" ><i class="fa fa-angle-double-right"></i> Usuarios</a></li>
	                                <li><a href="<?php echo base_url(); ?>prospectos" ><i class="fa fa-angle-double-right"></i> Prospectos</a></li>
	                                <li><a href="<?php echo base_url(); ?>reporteador/estadisticas"><i class="fa fa-angle-double-right"></i> Estadisticas</a></li>
	                                <li class="active"><a href="<?php echo base_url(); ?>reporteador/mensagero" ><i class="fa fa-angle-double-right"></i> Mensajero</a></li>
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
                        Reporteador
                        <small>Manejo de la aplicación</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Reporteador</a></li>
                        <li class="active">Usuarios</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- ESCCENASSS POR SERVICIO Y CATEGORIA -->
					<div class="mailbox row">
						<div class="col-xs-12">
							<div class="box box-solid">
								<div class="box-body">
									<div class="row">
										<div class="col-md-3 col-sm-4">
											<!-- BOXES are complex enough to move the .box-header around.
												 This is an example of having the box header within the box body -->
											<div class="box-header">
												<i class="fa fa-inbox"></i>
												<h3 class="box-title">INBOX</h3>
											</div>
											<!-- compose message btn -->
											<a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> Nuevo Mensaje</a>
											<!-- Navigation - folders-->
											<div style="margin-top: 15px;">
												<ul class="nav nav-pills nav-stacked">
													<li class="header">Carpetas</li>
													<li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox (14)</a></li>
													<li><a href="#"><i class="fa fa-mail-forward"></i> Enviados</a></li>
													<li><a href="#"><i class="fa fa-star"></i> Marcados</a></li>
													<li><a href="#"><i class="fa fa-folder"></i> Eliminados</a></li>
												</ul>
											</div>
										</div><!-- /.col (LEFT) -->
										<div class="col-md-9 col-sm-8">
											<div class="row pad">
												<div class="col-sm-6">
													<label style="margin-right: 10px;">
														<input type="checkbox" id="check-all"/>
													</label>
													<!-- Action button -->
													<div class="btn-group">
														<button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
															Action <span class="caret"></span>
														</button>
														<ul class="dropdown-menu" role="menu">
															<li><a href="#">Marcar como leido</a></li>
															<li><a href="#">Marcar como no leido</a></li>
															<li class="divider"></li>
															<li><a href="#">Eliminar</a></li>
														</ul>
													</div>

												</div>
												<div class="col-sm-6 search-form">
													<form action="#" class="text-right">
														<div class="input-group">                                                            
															<input type="text" class="form-control input-sm" placeholder="Search">
															<div class="input-group-btn">
																<button type="submit" name="q" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
															</div>
														</div>                                                     
													</form>
												</div>
											</div><!-- /.row -->

											<div class="table-responsive">
												<!-- THE MESSAGES -->
												<?php $nu = mysql_num_rows($resividos);
												if( $nu == 0) {
													echo "<P class='alert alert-success' style='text-align:center;'>No hay Mensajes en la bandeja de entrada</p>";
												}else{ ?>
													<table class="table table-mailbox">
														<?php while ($fila = mysql_fetch_array($resividos)) { 
																if($fila['men_estado'] == 'NOLEIDO'){ ?>
																	<tr class="unread">
																		<td class="small-col"><input type="checkbox" /></td>
																		<td class="small-col"><i class="fa fa-star"></i></td>
																		<td class="name"><a href="#"><?php echo $fila['men_remitente_id']; ?></a></td>
																		<td class="subject"><a href="#"><?php echo $fila['men_subject']; ?></a></td>
																		<td class="time"><?php echo $fila['men_fecha']; ?></td>
																	</tr>

															<?	}else{ ?>
																
																	<tr>
																		<td class="small-col"><input type="checkbox" /></td>
																		<td class="small-col"><i class="fa fa-star"></i></td>
																		<td class="name"><a href="#"><?php echo $fila['men_remitente_id']; ?></a></td>
																		<td class="subject"><a href="#"><?php echo $fila['men_subject']; ?></a></td>
																		<td class="time"><?php echo $fila['men_fecha']; ?></td>
																	</tr>
															<?php  }
															} ?>
													</table>
												<?php } ?>
											</div><!-- /.table-responsive -->
										</div><!-- /.col (RIGHT) -->
									</div><!-- /.row -->
								</div><!-- /.box-body -->
								<div class="box-footer clearfix">
									<div class="pull-right">
										<small>Viendo 1-12/12</small>
										<button class="btn btn-xs btn-primary"><i class="fa fa-caret-left"></i></button>
										<button class="btn btn-xs btn-primary"><i class="fa fa-caret-right"></i></button>
									</div>
								</div><!-- box-footer -->
							</div><!-- /.box -->
						</div><!-- /.col (MAIN) -->
					</div>
					<!-- MAILBOX END -->

					<!-- COMPOSE MESSAGE MODAL -->
					<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title"><i class="fa fa-envelope-o"></i> Nuevo Mensaje</h4>
								</div>
								<?=form_open_multipart("mensajes/EnvioMensajes"); ?>
									<div class="modal-body">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">TO:</span>
												<input name="email_to" type="email" class="form-control" placeholder="Email TO">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">CC:</span>
												<input name="email_cc" type="text" class="form-control" placeholder="Email CC">
											</div>
										</div>
										
										<div class="form-group">
											<textarea name="message" id="email_message" class="form-control" placeholder="Message" style="height: 120px;"></textarea>
										</div>
									</div>
									<div class="modal-footer clearfix">

										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

										<button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Enviar Mensaje</button>
									</div>
								</form>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

        <!-- jQuery UI 1.10.3 
        <script src="<?PHP echo base_url(); ?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
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
        ?>
			
    </body>
</html>

