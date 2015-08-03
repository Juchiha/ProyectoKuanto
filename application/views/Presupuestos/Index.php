<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>KUANTO.INFO | Mis Presupuestos</title>
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
        <style>
			.presupuesto{
				cursor: pointer;
                background-color: #819FF7
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
                                <li><a href="<?php echo base_url(); ?>articulos/mis_articulos" ><i class="fa fa-angle-double-right"></i> Mis Articulos</a></li>
                                <li><a href="<?php echo base_url(); ?>cotizaciones/mis_cotizaciones"><i class="fa fa-angle-double-right"></i> Mis Cotizaciones</a></li>
                                <li class="active"><a href="<?php echo base_url(); ?>presupuestos/mis_presupuestos" ><i class="fa fa-angle-double-right"></i> Mis Presupuestos</a></li>
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
                        Presupuestos
                        <small>Mis Presupuestos</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Presupuestos</a></li>
                        <li class="active">Mis Presupuestos</li>
                    </ol>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- ESCCENAs ATICULOS PROPIOS -->
					<div class="box">
                        <div class="box-header">
                            <h3 class="box-title">LISTADO DE MIS PROYECTOS</h3>                                    
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">

                            <div style="text-align:right;">
                                <a data-target="#proyectAdd" data-toggle="modal" id="addplus" class="btn btn-app">
                                    <i class="fa fa-plus"></i> proyecto
                                </a>
                            </div>                            
                            <table id="UsersTable" class="table table-striped table-bordered table-hover" style="margin:0 auto 0;">
                                <thead class="widget-header">
                                    <tr>
                                        <th style="text-align:center;" class="col-md-1" >CLAVE</th>
                                        <th style="text-align:center;" class="col-md-4" >NOMBRE DEL PROYECTO</th>
                                        <th style="text-align:center;" class="col-md-6">DESCRIPCIÓN</th>
                                        <th style="text-align:center;" class="col-md-6">TOTAL</th>
                                        <th style="text-align:center;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($fila = mysql_fetch_array($proyectos)){ ?>
                                        <tr>
                                            <td style="text-align:center;" class="col-md-1" ><?php echo $fila['proyect_clave'];?></td>
                                            <td style="text-align:center;" class="col-md-4" ><?php echo $fila['proyect_name'];?></td>
                                            <td style="text-align:center;" class="col-md-6"><?php echo $fila['proyect_descripcion'];?></td>
                                            <td style="text-align:center;" class="col-md-6"><?php echo "100 USD";?></td>
                                            <td style="text-align:center;">
                                                <a href="<?php echo base_url();?>presupuestos/getVista/<?php echo $fila['proyect_id'];?>" class="btn btn-success btn-mini presupuestoHoja" data-toggle="button"><i class="fa fa-sign-in"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>    
                        </div>
                    </div>    
                   
                </section><!-- /.content -->
                <div class="row">
                    <div class="col-md-11" style="text-align:right; cursor:pointer;">
                       
                    </div>
                    <div class="col-md-1" style="text-align:right;">
                         
                    </div>
                </div>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <div class="modal fade" id="proyectAdd" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Nuevo Proyecto</h4>
                    </div>
                    <form action="<?PHP echo base_url(); ?>presupuestos/insertarProyecto" method="post" id="FormEnvio">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="namePro" id="txtproyecto" placeholder="Nombre del proyecto" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="clavePro" id="txtclavepro" placeholder="Clave del proyecto" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="descripcionPro" id="descripcionPro" placeholder="Descripcion del proyecto" class="form-control"></textarea>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer clearfix">

                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

                        <button type="button" id="GuardarProyecto" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Guardar</button>
                    </div>
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
        ?>
	<script type="text/javascript">	

            presupuestos = {
                GuardarProyecto:function(){
                    if($("#txtproyecto").val().length < 1){
                        alertify.error("El nombre del proyecto es obligatorio!!");
                    }else if($("#descripcionPro").val().length < 1){
                        alertify.error("la descripicion es obligatoria!!!");
                    }else if($("#txtclavepro").val().length < 1){
                        alertify.error("La clave del proyecto es obligatoria!!!");
                    }else{
                        $("#FormEnvio").submit();
                    }
                }
            }
            
            $(function(){

                <?php if(isset($error)){ ?>
                    alertify.error(<?php echo $error; ?>);
                <?php } ?>

                $("#UsersTable").dataTable({
                    "oLanguage": {
                         "sLengthMenu": "_MENU_ registros por pagina",
                         "sZeroRecords": "No hay registros!!",
                         "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                         "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
                         "sInfoFiltered": "(Filtrado de _MAX_ total registros)",
                         "sSearch": "Buscar:"
                    },
                    "aoColumns": [null, null, { "bSortable": false }, null, { "bSortable": false }]
               });

                $("#GuardarProyecto").click(function(){
                    presupuestos.GuardarProyecto();
                });

                $(".presupuestoHoja").click(function(){
                    window.location.href = $(this).attr('href');
                });

            });
	</script>


    </body>
</html>

