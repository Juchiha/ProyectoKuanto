<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>KUANTO.INFO | Paises</title>
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
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
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
                            <li class="active">
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
                        Opciones
                        <small>Manejo de la aplicación</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Opciones</a></li>
                        <li class="active">Paises</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- ESCCENASSS POR SERVICIO Y CATEGORIA -->
                    <div class="row">
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6">
                            <div style="text-align: right;" class="content-header">
                                <a  data-target="#add-modal" data-toggle="modal"  class='btn btn-primary bg-light-blue' title="editar" role="button">
                                    <i class='fa fa-plus'></i>
                                    Crear Pais
                                </a>
                            </div>
                        </div>
                    </div>
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">LISTA DE PAISES REGISTRADOS</h3>                                    
						</div><!-- /.box-header -->
						<div class="box-body table-responsive">
							<table id="UsersTable" class="table table-striped" style="margin:0 auto 0;">
								<thead class="widget-header">
									<tr>
										<th style="text-align:center;" class="col-md-1" >PAIS NOMBRE</th>
										<th style="text-align:center;" class="col-sd-2" >OPCIONES</th>
								</tr>
								</thead>
								<tbody>
								<?php
								while ($fila = mysql_fetch_array($paises)){ ?>
								
									<tr>
										<td class="col-md-9"><?php echo $fila['pa_nombre']; ?></td>
										<td class="col-sm-3"  style="text-align: center;">
											<a href='<?php echo base_url();?>opciones/getcity/<?php echo $fila['pa_id'];?>' class='btn btn-primary btn-sm ' title="ver Ciudades" role="button">
												<i class='fa  fa-gears'></i>
											</a>
                                            <a  data-target="#update-modal" data-toggle="modal"  class='btn btn-success btn-sm modales' title="editar" role="button" idPa="<?php echo $fila['pa_id'];?>" nombre="<?php echo $fila['pa_nombre'];?>">
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <a href='<?php echo base_url();?>opciones/eliminar/<?php echo $fila['pa_id'];?>' class='btn btn-danger btn-sm ' title="Eliminar" role="button">
                                                <i class='fa fa-trash-o'></i>
                                            </a>
										</td>
										
									</tr>
								<?php	
								}
								?>
								</tbody>
							</table>
						</div>
					</div>    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

         
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
        <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Editar nombre del pais</h4>
                    </div>
                    <?=form_open_multipart('opciones/editar');?>
                        <input type="hidden" name="idPais" id="idPais">
                        <div class="modal-body">                          
                            <div class="form-group">
                                <input type="text" name="nombre" id="editarPais" class="form-control" placeholder="Nombre pais"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

                            <button type="submit" id="envioMensaje" class="btn btn-primary pull-left"><i class="fa fa-edit"></i> Editar</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->   

        <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Crear pais</h4>
                    </div>
                    <?=form_open_multipart('opciones/createPais');?>
                    
                        <div class="modal-body">                          
                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre Pais"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

                            <button type="submit" id="envioMensaje" class="btn btn-primary pull-left"><i class="fa fa-edit"></i> Guardar</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

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
        
		<script type="text/javascript">
			$(function(){
			   $("#UsersTable").dataTable({
				"oLanguage": {
					 "sLengthMenu": "_MENU_ registros por pagina",
					 "sZeroRecords": "No funciona - Lo sentimos!",
					 "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
					 "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
					 "sInfoFiltered": "(Filtrado de _MAX_ total registros)",
					 "sSearch": "Buscar:"
				 }
			   });

                $(".modales").click(function(){
                    $("#idPais").val($(this).attr('idPa'));
                    $("#editarPais").val($(this).attr('nombre'));
                });
               
			});
		</script>

	
    </body>
</html>
