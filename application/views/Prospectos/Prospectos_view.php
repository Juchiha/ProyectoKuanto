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
                                    <li><a href="<?php echo base_url(); ?>reporteador/getUsers"><i class="fa fa-angle-double-right"></i> Usuarios</a></li>
                                    <li class="active"><a href="<?php echo base_url(); ?>prospectos" ><i class="fa fa-angle-double-right"></i> Prospectos</a></li>
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
                        Reporteador
                        <small>Manejo de la aplicación</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Reporteador</a></li>
                        <li class="active">Prospectos</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- ESCCENASSS POR SERVICIO Y CATEGORIA -->
                    <div style="text-align: left;" class="content-header">
						<a href="<?php echo base_url(); ?>prospectos/create" class="btn btn-primary bg-light-blue" title="Agregar Prospecto"><i class="fa fa-plus-circle"></i> Agregar Prospecto</a> 
                        <!--<a  class="btn btn-primary bg-light-blue" title="Enviar correo a mis prospectos" id="envioCorreoMultiple"><i class="fa fa-envelope-o"></i> Enviar Correo Masivo</a> -->
                    </div>
                    <div>&nbsp;</div>
					<div class="box">
							<div class="box-header">
								<h3 class="box-title">PROSPECTOS CIUDAD DE <?php echo $ciudad;?></h3>                                    
							</div><!-- /.box-header -->
							<div class="box-body table-responsive">
                                <section id="no-more-tables">
    								<table id="ListaInsumos" class="table table-striped table-condensed cf" style="margin:0 auto 0;">
    									<thead class="widget-header">
    										<tr>
    											<th style="text-align:center;" class="col-md-2" >NOMBRES</th>
                                                <th style="text-align:center;" class="col-md-1" >CARGO</th>
    											<th style="text-align:center;" class="col-md-2" >CORREO</th>
    											<th style="text-align:center;" class="col-md-1" >TELEFONO</th>
    											<th style="text-align:center;" class="col-sm-1">FECHA</th>
    											<th style="text-align:center;" class="col-sm-1">EMPRESA</th>
                                                <th style="text-align:center;" class="col-sm-1">ESPECIALIDAD</th>
    											<th style="text-align:center;" class="col-sm-2"></th>
    									</tr>
    									</thead>
    									<tbody>
    									<?php
    									while ($fila = mysql_fetch_array($prospectos)){?>		
    										<tr>
    											<td  data-title='NOMBRES' class="col-md-2"><?php echo $fila['pro_nombres']." ".$fila['pro_apellidos'] ; ?></td>
                                                <td  data-title='CARGO' class="col-md-1" ><?php echo $fila['pro_cargo']; ?></td>
    											<td  data-title='CORREO' class="col-md-2" ><?php echo $fila['pro_correo']; ?></td>
    											<td  data-title='TELEFONO' class="col-md-1" ><?php echo $fila['pro_telefono']; ?></td>
    											<td  data-title='FECHA' style='text-align:center;' class="col-sm-1"><?php echo $fila['pro_fecha']; ?></td>
    											<td  data-title='EMPRESA' style='text-align:left;' class="col-sm-1"><?php echo $fila['pro_empresa']; ?></td>
                                                <td  data-title='ESPECIALIDAD' style='text-align:left;' class="col-sm-1"><?php echo $fila['pro_tipo_empresa']; ?></td>
    											<td style='text-align:center;' class="col-sm-2"  >
    								                <a href="<?php echo base_url();?>prospectos/edit/<?php echo $fila['pro_id'];?>" role="button" title="Editar" class='btn btn-success btn-sm'>
                                                        <i class='fa fa-cog'></i>
                                                    </a>
                                                    <a title="Eliminar" class='btn btn-danger btn-sm btneliminar' href="<?php echo base_url();?>prospectos/delete/<?php echo $fila['pro_id'];?>">
                                                            <i class='fa fa-trash-o'></i>
                                                    </a>
                                                    <a title="Mail" class='btn btn-primary btn-sm btnEmail' correo ="<?php echo $fila['pro_correo']; ?>">
                                                        <i class='fa fa-envelope-o'></i>
                                                    </a>
    											</td>
    										</tr>
    									<?php	
    									}
    									?>
    									</tbody>
    								</table>
                                </section>
							</div>
						</div>    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
        <!-- add new calendar event modal -->
         <div class="modal fade" id="email-modal-solo" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <span class="input-group-addon">Asunto:</span>
                                    <input name="subject" type="text" id="textsubject" class="form-control" placeholder="Asunto">
                                </div>
                            </div>
                            <input type="hidden" name="correo" id="correoSky" value="0">
                            <div class="form-group">
                                <textarea name="mensaje" id="email_messageNojoda" class="form-control" placeholder="Mensage" style="height: 120px;"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

                            <button type="button" id="envioMensaje2" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Enviar Mensaje</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


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
		<script type="text/javascript">
		Reporteador = {
           enviarCorreo : function(){
                $.ajax({
                    url : "<?php echo base_url(); ?>mensajes/EnvioMensajesProspectosIndividual",
                    type:"POST",
                    data:{ email_cc: $("#textsubject").val(), message: $("#email_message").val(), email_to: $("#correoSky").val()},
                    success:function(data){
                        $("#textsubject").val("");
                        $("#email_message").val("");
                        $("#correo").val("");

                        $("#email-modal").modal('hide');
                        alertify.success(data);
                    }
                });
           }
		}
		
		$(function(){
            $('#ListaInsumos').dataTable({
                "oLanguage": {
                    "sLengthMenu": "_MENU_ registros por pagina",
                    "sZeroRecords": "0 resultados en el criterio de busqueda, solicita lo que buscas mediante un articulo en blanco a nuestros proveedores ",
                    "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
                    "sInfoFiltered": "(Filtrado de _MAX_ total registros)",
                    "sSearch": "Buscar:"
                },                            
                "aoColumns": [{ "bSortable": false },null, { "bSortable": false },  { "bSortable": false }, { "bSortable": false },{ "bSortable": false }, null, { "bSortable": false }] ,
                "fnDrawCallback": function (oSettings, json) {
                    $(".btnEmail").click(function(){
                        $("#correoSky").val($(this).attr('correo'));
                        $("#email-modal-solo").modal();
                    });
                },
               "iDisplayLength": 20,
               "aLengthMenu": [[20, 40, 60, -1], [20, 40, 60, 100]]
            });	

            <?php if(isset($error)){ ?>
                alertify.error('<?php echo $error; ?>');
            <?php } ?>

            $("#envioMensaje2").click(function(){

                if($("#textsubject").val().length < 1){
                    alertify.error("Estas seguro de enviar este correo sin un asunto!");
                    $("#textsubject").focus();
                }else if($("#email_messageNojoda").val().length < 1){
                    alertify.error("Estas seguro de enviar este correo sin un mensaje!");
                    $("#email_messageNojoda").focus();
                    
                }else{
                    $.ajax({
                        url : "<?php echo base_url(); ?>mensajes/EnvioMensajesProspectosIndividual",
                        type:"POST",
                        data:{ email_cc: $("#textsubject").val(), message: $("#email_message").val(), email_to: $("#correoSky").val()},
                        success:function(data){
                            $("#textsubject").val("");
                            $("#email_message").val("");
                            $("#correoSky").val("0");

                            $("#email-modal-solo").modal('hide');
                            alertify.success(data);
                        }
                    });
                }
               
            });
            
            $("#envioCorreoMultiple").click(function(){
                $("#correoSky").val('0');
                $("#email-modal-solo").modal();
            });
			
		});
	</script>

	
    </body>
</html>

