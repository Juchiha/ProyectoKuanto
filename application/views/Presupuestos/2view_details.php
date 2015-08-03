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
                    <? $this->load->view('sidebar_user'); ?>                    
                    <!-- fin del user panel -->
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>home/landpage">
                                <i class="fa fa-th-list"></i> <span>LandPage</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>home/homePage">
                                <i class="fa fa-th-list"></i><span>HomePage</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
									<span>Reportes</span>
								<i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>reporteador/getProducts" ><i class="fa fa-angle-double-right"></i> Articulos</a></li>
                                <li><a href="<?php echo base_url(); ?>reporteador/getUsers"><i class="fa fa-angle-double-right"></i> Usuarios</a></li>
                                <li><a href="<?php echo base_url(); ?>prospectos" ><i class="fa fa-angle-double-right"></i> Prospectos</a></li>
                                <li><a href="<?php echo base_url(); ?>reporteador/estadisticas"><i class="fa fa-angle-double-right"></i> Estadisticas</a></li>
                                <li><a href="<?php echo base_url(); ?>reporteador/mensagero" ><i class="fa fa-angle-double-right"></i> Mensajero</a></li>
                            </ul>
                        </li>                       
                        <li class="treeview active">
                            <a href="#">
                                <i class="fa fa-dashboard"></i>
                                <span>DashBoard</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>articulos/mis_articulos" ><i class="fa fa-angle-double-right"></i> Mis Articulos</a></li>
                                <li><a href="<?php echo base_url(); ?>cotizaciones/mis_cotizaciones"><i class="fa fa-angle-double-right"></i> Mis Cotizaciones</a></li>
                                <li class="active"><a href="<?php echo base_url(); ?>presupuestos/mis_presupuestos" ><i class="fa fa-angle-double-right"></i> Mis Presupuestos</a></li>
                            </ul>
                        </li>
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
                        <small>Detalles</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Presupuestos</a></li>
                        <li>Mis Presupuestos</li>
                        <li class="active">Detalles</li>
                    </ol>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- ESCCENAs ATICULOS PROPIOS -->
                    <div style="text-align: left;" class="content-header">
						 <a href="<? echo base_url();?>presupuestos/mis_presupuestos" data-rel="button" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Volver</a>
                    </div>
                    <div>&nbsp;</div>
                    <table id="tablamispresupuestos" class="table table-striped table-bordered table-hover" style="margin:0 auto 0;">
						
                        <thead class="widget-header">
                                <tr>
									<th style="text-align:center;" class="col-sd-1"></th>
									<th style="text-align:center;" class="col-sd-1" >CLAVE</th>
									<th style="text-align:center;" class="col-sd-4" >DESCRIPCI&Oacute;N</th>
									<th style="text-align:center;" class="col-sd-1" >UNIDAD</th>
									<th style="text-align:center;" class="col-sd-1" >STOCK</th>
									<th style="text-align:center;" class="col-sd-2" >PRESIO</th>
									<th style="text-align:center;" class="col-sm-3"></th>
                                </tr>
                        </thead>
                        <tbody>
                        <?php
                            while ($fila = mysql_fetch_array($acumuladores)){
                                
                        ?>		
                            <tr>
								<td class="col-sd-1 presupuesto" style="text-align:center;">
									<i class="fa fa-caret-square-o-right"></i>
								</td>
                                <td class="col-sd-1" ><? echo $fila['acum_sigla']; ?></td>
                                <td class="col-sd-4" ><? echo $fila['acum_nombre']; ?></td>
                                <td style="text-align:center;" class="col-sd-1" ></td>
								<td style="text-align:center;" class="col-sd-1" ></td>
								<td style="text-align:center;" class="col-sd-2" ></td>
                                <td class="col-sm-3" style="text-align:center;">

                                </td>
                            </tr>
                        <?php	
                            }
                        ?>
                        </tbody>
                    </table>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

      

        <!-- jQuery UI 1.10.3 -->
        <!-- Bootstrap -->
        <script src="<?PHP echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?PHP echo base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?PHP echo base_url(); ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
  
        <script src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script> 
        <script src="<?php echo base_url(); ?>js/dataTables.bootstrap.js"></script>
	    <script src="<?php echo base_url();?>js/alertify.js"></script>
        
        
	<script type="text/javascript">	
            
            presupuestos = {
                
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
                        "aoColumns": [{ "bSortable": false }, null, null, { "bSortable": false }, { "bSortable": false }, { "bSortable": false },{ "bSortable": false }] ,
        
                        "iDisplayLength": 20,
                        "aLengthMenu": [[20, 40, 60, -1], [20, 40, 60, 100]]
                     });	
                     
                     
				 $(".presupuesto").click(function(){
					// Obtenemos el numero de filas (td) que tiene la primera columna
					// (tr) del id "tabla"
					var tds =$("#tablamispresupuestos tr:first td").length;
					;
					// Obtenemos el total de columnas (tr) del id "tabla"
					var trs=$("#tablamispresupuestos tr").length;
					var nuevaFila="<tr>";
	
					// Añadimos una columna con el numero total de columnas.
					// Añadimos uno al total, ya que cuando cargamos los valores para la
					// columna,s todavia no esta añadida
					nuevaFila+="<td class='col-sd-1 presupuesto' colspan='7'> columnas</td>";
					nuevaFila+="</tr>";
					$("#tablamispresupuestos").append(nuevaFila);
				});						
            });
	</script>


    </body>
</html>


