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
                                    <li class="active"><a href="<?php echo base_url(); ?>reporteador/getProducts" ><i class="fa fa-angle-double-right"></i> Articulos</a></li>
                                    <li><a href="<?php echo base_url(); ?>reporteador/getUsers"><i class="fa fa-angle-double-right"></i> Usuarios</a></li>
                                    <li><a href="<?php echo base_url(); ?>prospectos" ><i class="fa fa-angle-double-right"></i> Prospectos</a></li>
                                    <li><a href="<?php echo base_url(); ?>reporteador/estadisticas"><i class="fa fa-angle-double-right"></i> Estadisticas</a></li>
                                    <li><a href="<?php echo base_url(); ?>reporteador/mensagero" ><i class="fa fa-angle-double-right"></i> Mensajero</a></li>
                                    <li><a href="<?php echo base_url(); ?>blog/verentradas"><i class="fa fa-rss"></i><span>Admin Blog</span></a></li>>
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
                        <li class="active">Productos</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- ESCCENASSS POR SERVICIO Y CATEGORIA -->
					<div class="box">
							<div class="box-header">
								<h3 class="box-title">LISTA DE INSUMOS <?php echo $cityCode;?></h3>                                    
							</div><!-- /.box-header -->
							<div class="box-body table-responsive">
                                <section id="no-more-tables">
    								<table id="ListaInsumos" class="table table-striped table-condensed cf" style="margin:0 auto 0;">
    									<thead class="widget-header">
    										<tr>
    											<th style="text-align:center;" class="col-md-1" >CLASE</th>
    											<th style="text-align:center;" class="col-md-1" >CLAVE</th>
    											<th style="text-align:center;" class="col-md-4" >DESCRIPCIÓN</th>
    											<th style="text-align:center;">UNIDAD</th>
    											<th style="text-align:center;">STOK</th>
    											<th style="text-align:center;">PRECIO</th>
    											<th style="text-align:center;" class="col-md-2" >FECHA</th>
    											<th style="text-align:center;" class="col-sm-1" >LOG</th>
    											<th style="text-align:center;" class="col-sm-1" >IMG</th>
    											<th style="text-align:center;" class="col-sm-1" >MOVER A</th>
                                                <th style="text-align:center;" class="col-sm-1" ></th>

    									</tr>
    									</thead>
    									<tbody>
    									<?php
    									while ($fila = mysql_fetch_array($home_articulos)){
    											$urlenvio = null;
    											if($fila['in_url'] != null){
    													$urlenvio = "Http://".$fila['in_url'];
    											}else{
    													$urlenvio = "#";
    											}
    											$imagen = null;
    											if($fila['in_img'] != null || $fila['in_img'] != ""){
    												$imagen = "<a href='". $urlenvio."' target='_blank'> <img src='". base_url()."Images/Articulos/".$fila['in_img']."' alt='ARTI' width='30' height='30' /></a>";
    											}else{
    												$imagen = "NO";
    											}

    											$imagenUsuario ="<img src='". base_url()."Images/users/".$fila['emp_imagen']."' alt='PERFIL/AVATAR' width='161' height='161'/>";
    											$popover = 'class="imagenAvatar" title="'.$fila['nombres']." ".$fila['apellidos'].'" data-content="'.$imagenUsuario.'"';
    									?>		
    										<tr>
    											<td data-title='CLASE' class="col-md-1"><?php echo $fila['cl_descripcion']; ?></th>
    											<td data-title='CLAVE' class="col-md-1" ><?php echo $fila['in_clave']; ?></td>
    											<td data-title='DESCRIPCIÓN' class="col-md-4" ><div class='tooltip-success'  data-rel='popover'  data-placement='top' title='Descripcion' data-content='<?php echo $fila['in_descripcion']; ?>'><?php echo getLongitudString($fila['in_descripcion']); ?></div></td>
    											<td data-title='UNIDAD' style='text-align:center;'><?php echo $fila['sigla']; ?></td>
    											<td data-title='STOK' style='text-align:left;'><?php echo $fila['in_cantidad']; ?></td>
    											<td data-title='PRECIO' style='text-align:right;'>$ <?php echo $fila['in_precio']; ?></td>
    											<td data-title='FECHA' class="col-md-2" ><?php echo $fila['in_fecha_']; ?></td>
    											<td data-title='LOG'class="col-sd-1" ><div style="text-align:center;" <?php echo $popover; ?>><img src='<?php echo base_url(); ?>Images/users/<?php echo $fila['emp_imagen']; ?>' alt='AVATAR' width='30' height='30' /></div></td>
    											<td data-title='IMG' class="col-sd-1" style="text-align:center;" ><?php echo $imagen;?> </td>
    											<td data-title='MOVER A' style='text-align:center;' class="col-sm-1"  >
    												<select class="selCambio" idProd="<?php echo $fila['in_id']; ?>">
    													<option value="0"></option>
    													<option value="1">Materiales</option>
    													<option value="2">Herramientas</option>
    													<option value="3">Equipos</option>
    													<option value="4">Maquinaria</option>
    													<option value="5">Servicios</option>
                                                        <option value="6">Indirectos</option>
    												</select>
    											</td>
                                                <td data-title='' style='text-align:center;' class="col-sm-1"  >
                                                    <a  role="button" class='btn btn-primary btn-sm LaunchModalDetails' href="<?php echo base_url();?>reporteador/detalles/<?php echo $fila['in_id']; ?>" >
                                                        <i class='fa fa-sign-in'></i>
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
                        "aoColumns": [{ "bSortable": false },{ "bSortable": false },  null, { "bSortable": false },{ "bSortable": false }, { "bSortable": false },null,{ "bSortable": false },{ "bSortable": false }, { "bSortable": false }, { "bSortable": false }] ,
                        "fnDrawCallback": function (oSettings, json) {
                            $(".imagenAvatar").popover({trigger: 'hover','placement': 'left', html:true});
                        },
                       "iDisplayLength": 20,
                       "aLengthMenu": [[20, 40, 60, -1], [20, 40, 60, 100]]
                    });	
							

                    $(".selCambio").change(function(){
                        $.ajax({
                            url      : "<?php echo base_url();?>articulos/mover",
                            type     : "post",
                            data     : {id : $(this).attr('idProd'), categoria :$(this).val()},
                            dataType : 'json',
                            success  : function(data){
                                    if(data.success == 1){
                                        window.location.reload();
                                    }
                            }
                        });
                    });
		});
	</script>

	
    </body>
</html>
