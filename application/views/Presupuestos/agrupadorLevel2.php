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
                        <li><a href="<?php echo base_url(); ?>presupuestos/mis_presupuestos"><i class="fa fa-dashboard"></i> Presupuestos</a></li>
                        <li class="active">Mis Presupuestos</li>
                    </ol>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- ESCCENAs ATICULOS PROPIOS -->
                    <div style="text-align: left;" class="content-header">
						 
                    </div>
                    <div>&nbsp;</div>
					<?php //echo $acordeon;?>
                    <div style="text-align:right;">

                        <div class="btn-group">
                            <button class="btn btn-app" type="button" disabled>Agregar</button>
                            <button data-toggle="dropdown" class="btn btn-app dropdown-toggle" type="button">
                                <i class="fa fa-plus"></i>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="#" data-target="#acumulador-modal" data-toggle="modal" id="addplus" >Agrupador</a></li>
                                <li class="divider"></li>
                                <li><a href="#" data-target="#matriz-modal" data-toggle="modal">Matriz</a></li>
                            </ul>
                        </div>


                    </div>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Agrupadores</h3>                                    
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12" id="contenido">
                                    <table id="UsersTable" class="table table-bordered " style="margin:0 auto 0;">
                                        <thead class="widget-header">
                                            <tr>
                                                <th style="text-align:center;"  >CLAVE</th>
                                                <th style="text-align:center;"  >DESCRIPCIÓN</th>
                                                <th style="text-align:center;"  >UNIDAD</th>
                                                <th style="text-align:center;"  >CANTIDAD</th>
                                                <th style="text-align:center;"  >PRECIO</th>
                                                <th style="text-align:center;"  >TOTAL</th>
                                                <th style="text-align:center;"  ></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($fila = mysql_fetch_array($acordeon)){ ?>
                                                <tr>
                                                    <td style="text-align:justify;" class="col-md-1" ><?php echo $fila['acum_sigla'];?></td>
                                                    <td style="text-align:justify;" class="col-md-4"><?php echo $fila['acum_descripcion'];?></td>
                                                    <td style="text-align:justify;" class="col-md-1" >Un</td>
                                                    <td style="text-align:justify;" class="col-md-1">1</td>
                                                    <td style="text-align:justify;" class="col-md-1"><?php echo " 100 $";//$fila['acum_nombre'];?></td>
                                                    <td style="text-align:justify;" class="col-md-1"><?php echo " 100 $";//$fila['acum_nombre'];?></td>
                                                    <td style="text-align:justify;" class="col-md-3">
                                                        <button class="btn btn-success btn-mini editar" ids="<?php echo $fila['acum_id'];?>" ><i class="fa fa-edit"></i></button>
                                                        <button class="btn btn-danger btn-mini eliminar" proyect ="<?php echo $padre;?>" ids="<?php echo $fila['acum_id'];?>" ><i class="fa fa-trash-o"></i></button>
                                                        <a href="<?php echo base_url();?>presupuestos/getagrupador/<?php echo $fila['acum_id'];?>" class="btn btn-warning btn-mini presupuestoHoja" data-toggle="button"><i class="fa fa-sign-in"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>    
                                    <?php  
                                       /*// $ci = &get_instance();
                                        $ci->load->Model('Presupuestos_model');                                                  
                                        while($fila = mysql_fetch_array($acordeon)){
                                            echo "<li value='' id='agrup_".$fila['acum_id']."' ><label><input type='radio' name='agrupadores' value='".$fila['acum_id']."'></label>&nbsp;&nbsp;<label>".$fila['acum_nombre']."</label></li>";
                                            
                                            $row = $ci->Presupuestos_model->getAgrupadores($fila['acum_id']);
                                            $datos_vista = Array('acumuladores' => $row);
                                            $this->load->view('Presupuestos/agrupadorLevel2', $datos_vista );   
                                        }*/
                                    ?>
                                </div>
                            </div>
                            <div class="box-header">
                                <h3 class="box-title">Matrizes</h3>                                    
                            </div><!-- /.box-header -->
                            <div class="row">
                                <div class="col-md-12" id="contenidoMat">

                                    
                                    <?php 
                                        while($fila = mysql_fetch_array($Matriz)){ ?>
                                            <table id="TableMatriz" class="table table-bordered table-hover matrix" style="margin:0 auto 0;">
                                                <thead class="widget-header">  
                                                    <tr>
                                                        <th style="text-align:justify;" class="col-md-1" ><?php echo $fila['mat_clave'];?></th>
                                                        <th style="text-align:justify;" class="col-md-4"><?php echo$fila['mat_descripcion'];?></th>
                                                        <th style="text-align:justify;" class="col-md-1" >Un</th>
                                                        <th style="text-align:justify;" class="col-md-1" ><?php echo$fila['mat_cantidad'];?></th>
                                                        <th style="text-align:justify;" class="col-md-1"> 0 $</th>
                                                        <th style="text-align:justify;" class="col-md-1"> 100 $</th>
                                                        <th style="text-align:justify;" class="col-md-3">
                                                            <button class="btn btn-primary btn-mini agregarElementos" ids="<?php echo $fila['mat_id'];?>" >
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="joseDavid">
                                                    <tr>
                                                        <th style="text-align:justify;" class="col-md-1" ></td>
                                                        <td style="text-align:justify;" class="col-md-4"></td>
                                                        <td style="text-align:justify;" class="col-md-1" ></td>
                                                        <td style="text-align:justify;" class="col-md-1" ></td>
                                                        <td style="text-align:justify;" class="col-md-1"> </td>
                                                        <td style="text-align:justify;" class="col-md-1"> </td>
                                                        <td style="text-align:justify;" class="col-md-3">
                                                            
                                                        </td>
                                                    <tr>
                                                </tbody>
                                            </table>
                                    <?php
                                        }
                                    ?>
                                        
                                </div>
                            </div>
                        </div>
                    </div>    


                    <div class="box-header">
                        <h3 class="box-title">Insumos Locales</h3>                                    
                    </div><!-- /.box-header -->
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#materiales_Tab" data-toggle="tab">
                                    <img src="<?php echo base_url();?>img/kuanto_materiales.png" alt="imagen" width="30px" height="30px">
                                    MATERIALES
                                </a>
                            </li>
                            <li>
                                <a href="#herramientas_Tab" data-toggle="tab">
                                    <img src="<?php echo base_url();?>img/kuanto_herrammientas.png" alt="imagen" width="30px" height="30px">    
                                    HERRAMIENTAS</a>
                            </li>
                            <li>
                                <a href="#equipos_Tab" data-toggle="tab">
                                    <img src="<?php echo base_url();?>img/kuanto_equipos.png" alt="imagen" width="30px" height="30px">
                                    EQUIPOS &nbsp;&nbsp;
                                </a>
                            </li>
                            <li>
                                <a href="#maquinaria_Tab" data-toggle="tab">
                                    <img src="<?php echo base_url();?>img/kuanto_maquinaria.png" alt="imagen" width="30px" height="30px">
                                    MAQUINARIA</a>
                            </li>
                            <li>
                                <a href="#servicios_Tab" data-toggle="tab">
                                    <img src="<?php echo base_url();?>img/kuanto_servicios.png" alt="imagen" width="30px" height="30px">
                                    SERVICIOS
                                </a>
                            </li>
                            <li>
                                <a href="#indirectos_Tab" data-toggle="tab">
                                    <img src="<?php echo base_url();?>img/kuanto_indirectos.png" alt="imagen" width="30px" height="30px">
                                    INDIRECTOS
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="materiales_Tab">
                                <div class="box">
                                    
                                    <div class="box-body table-responsive">
                                        
                                            <table id="tablaInsumosGlobal" class="table table-striped table-condensed cf dragable" style="margin:0 auto 0;">
                                                <thead class="widget-header">
                                                    <tr>
                                                       <th style="text-align:center;" class="col-md-1" >CLAVE</th>
                                                       <th style="text-align:center;" class="col-md-4" >DESCRIPCIÓN</th>
                                                       <th style="text-align:center;" class="col-sd-1" >UNIDAD</th>
                                                       <th style="text-align:center;" class="col-sd-1" >STOK</th>
                                                       <th style="text-align:center;" class="col-sd-1" >PRECIO</th>
                                                       <th style="text-align:center;" class="col-sd-3" ></th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                while ($fila = mysql_fetch_array($rs_articulos)){
                                                 
                                                        
                                                       
                                                ?>      
                                                    <tr>
                                                        <td data-title='CLAVE' class="col-md-1"  style='text-align:justify;' ><?php echo $fila['in_clave']; ?></td>
                                                        <td data-title='DESCRIPCIÓN' class="col-md-4"  style='text-align:justify;' ><?php echo getLongitudString($fila['in_descripcion']); ?></td>
                                                        <td data-title='UNIDAD' style='text-align:justify;' class="col-md-1"><?php echo $fila['sigla']; ?></td>
                                                        <td data-title='STOK' style='text-align:justify;' class="col-md-1"><?php echo $fila['in_cantidad']; ?></td>
                                                        <td data-title='PRECIO' style='text-align:justify;' class="col-md-1">$ <?php echo $fila['in_precio']; ?></td>
                                                        
                                                        <td style='text-align:justify;' class="col-md-3">
                                                           
                                                        </td>
                                                   </tr>
                                                <?php   
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                    </div>
                                </div>    
                            </div>

                            <div class="tab-pane" id="herramientas_Tab">
                                <?php 

                                    $arrayHerramientas = array('rs_articulos' => $herramientas, 'idTabla' => 'tablaHerramientas');
                                    $this->load->view('Presupuestos/insumosByCategoria_PartialView2', $arrayHerramientas);
                                ?>
                            </div>

                            <div class="tab-pane" id="equipos_Tab">
                                <?php 
                                    $Arrayequipos = array('rs_articulos' => $equipos, 'idTabla' => 'tablaEquipos');
                                    $this->load->view('Presupuestos/insumosByCategoria_PartialView2', $Arrayequipos);
                                ?>
                            </div>

                            <div class="tab-pane" id="maquinaria_Tab">
                                <?php 
                                    $arrayMaquinaria = array('rs_articulos' => $maquinaria, 'idTabla' => 'tablaMaquinaria');
                                    $this->load->view('Presupuestos/insumosByCategoria_PartialView2', $arrayMaquinaria);
                                ?>
                            </div>

                            <div class="tab-pane" id="servicios_Tab">
                                <?php 
                                    $arrayservicios = array('rs_articulos' => $servicios, 'idTabla' => 'tablaServicios');
                                    $this->load->view('Presupuestos/insumosByCategoria_PartialView2', $arrayservicios);
                                ?>
                            </div>

                            <div class="tab-pane" id="indirectos_Tab">
                                <?php 
                                    $arrayindirectos = array('rs_articulos' => $indirectos, 'idTabla' => 'tablaIndirectos');
                                    $this->load->view('Presupuestos/insumosByCategoria_PartialView2', $arrayindirectos);
                                ?>
                            </div>
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



        <!-- Estos son los modales que llenan las opciones -->
        <div class="modal fade" id="acumulador-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Nuevo acumulador</h4>
                    </div>
                    
                        <div class="modal-body">
                            <input type="hidden"  id = "proyectId" value="<?php echo $valueProyects;?>">
                            <input type="hidden" id="padreID" value="<?php echo $padre; ?>">
                            <input type="hidden" id = "id"  name="id" value="0">
                            <div class="form-group">
                                <input type="text" name="nameAgru" id="nameAgru" placeholder="Nombre del agrupador" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="claveAgr" id="txtSiglaacum" placeholder="Clave del agrupador" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="descripcionagru" id="txtdescacum" placeholder="Descripcion del agrupador" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

                            <button type="button" id="Guardaragrupador" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                   
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <div class="modal fade" id="matriz-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Nueva Matriz</h4>
                    </div>
                    
                        <div class="modal-body">
                            <input type="hidden"  id = "proyect" value="<?php echo $valueProyects;?>">
                            <input type="hidden" id="padre" value="<?php echo $padre; ?>">
                            <input type="hidden" id = "id"  name="id" value="0">
                            <div class="form-group">
                                <input type="text" name="Numero" id="Numero" placeholder="Cantidad" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="ClaveMat" id="ClaveMat" placeholder="Clave de la Matriz" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="Descripcion" id="Descripcion" placeholder="Descripción de la matriz" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

                            <button type="button" id="GuardarMatriz" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                   
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- fin modales -->

        <!-- aqui empiesan los agrupadores a ver -->



        <!-- -->

        <!-- jQuery UI 1.10.3 -->
        <!-- Bootstrap -->
        <script src="<?PHP echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?PHP echo base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?PHP echo base_url(); ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
  
        <script src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script> 
        <script src="<?php echo base_url(); ?>js/dataTables.bootstrap.js"></script>
	    <script src="<?php echo base_url();?>js/alertify.js"></script>

        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        
        
        
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
            Operaciones = {
                getdatos:function(x){
                    $.ajax({
                        type  : "POST",
                        url   : "<?php echo base_url();?>presupuestos/getDatosAgrupadorbyId/" + x,
                        dataType : "json",
                        success : function(data){
                            $("#nameAgru").val(data.acum_nombre);
                            $("#txtdescacum").val(data.acum_descripcion);
                            $("#txtSiglaacum").val(data.acum_sigla);
                            $("#id").val(data.acum_id);
                            $("#acumulador-modal").modal('show');
                        }
                    });
                },

                eliminar: function(x, y){
                    $.ajax({
                        type  : "POST",
                        url   : "<?php echo base_url();?>presupuestos/eliminarAgrupador",
                        dataType : "json",
                        data : {id : x, proyectId : y},
                        success : function(data){
                            if(data.success == 1){
                                $("#nameAgru").val("");
                                $("#txtdescacum").val("");
                                $("#txtSiglaacum").val("");

                                $("#contenido").html(data.resultado);

                                $("#UsersTablese").dataTable({
                                    "oLanguage": {
                                         "sLengthMenu": "_MENU_ registros por pagina",
                                         "sZeroRecords": "No hay registros!!",
                                         "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                                         "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
                                         "sInfoFiltered": "(Filtrado de _MAX_ total registros)",
                                         "sSearch": "Buscar:"
                                    },
                                    "aoColumns": [null, null, null, null, null, null, { "bSortable": false }],
                                    "fnDrawCallback": function (oSettings, json) {
                                        $(".editar").click(function(){
                                            Operaciones.getdatos($(this).attr('ids'));
                                        });
                                        $(".eliminar").click(function(){
                                            Operaciones.eliminar($(this).attr('ids'), $(this).attr('proyect'));
                                        });
                                    },
                                });
                                $("#acumulador-modal").modal('hide');
                            }else{
                                alertify.error(data.resultado);
                            }
                        }
                    });
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
                    "aoColumns": [null, null, null, null, null, null, { "bSortable": false }],
                    "fnDrawCallback": function (oSettings, json) {
                            $(".editar").click(function(){
                                Operaciones.getdatos($(this).attr('ids'));
                            });
                            $(".eliminar").click(function(){
                                Operaciones.eliminar($(this).attr('ids'), $(this).attr('proyect'));
                            });
                    },
               });

                $("#Guardaragrupador").click(function(){

                    $.ajax({
                        type    : "POST",
                        url     : "<?php echo base_url(); ?>presupuestos/insertarAgrupadorHijo",
                        data    : {nameAgru: $("#nameAgru").val() , descripcionagru: $("#txtdescacum").val(), padre: $("#padreID").val() , claveAgr: $("#txtSiglaacum").val() , proyectId: $("#proyectId").val() , id : $("#id").val()},
                        dataType: "json",
                        success : function(data){
                            if(data.success == 1){
                                $("#nameAgru").val("");
                                $("#txtdescacum").val("");
                                $("#txtSiglaacum").val("");

                                $("#contenido").html(data.resultado);

                                $("#UsersTables").dataTable({
                                    "oLanguage": {
                                         "sLengthMenu": "_MENU_ registros por pagina",
                                         "sZeroRecords": "No hay registros!!",
                                         "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                                         "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
                                         "sInfoFiltered": "(Filtrado de _MAX_ total registros)",
                                         "sSearch": "Buscar:"
                                    },
                                    "aoColumns": [null, null, null, null, null, null, { "bSortable": false }],
                                    "fnDrawCallback": function (oSettings, json) {
                                        $(".editar").click(function(){
                                            Operaciones.getdatos($(this).attr('ids'));
                                        });
                                        $(".eliminar").click(function(){
                                            Operaciones.eliminar($(this).attr('ids'), $(this).attr('proyect'));
                                        });
                                    },
                                });
                                $("#acumulador-modal").modal('hide');
                            }else{
                                alertify.error(data.resultado);
                            }
                           
                        }
                    });
                });

                $("#GuardarMatriz").click(function(){
                    $.ajax({
                        type    : "POST",
                        url     : "<?php echo base_url(); ?>presupuestos/InsertarMatriz",
                        data    : { Descripcion: $("#Descripcion").val(), padre: $("#padre").val() , Numero: $("#Numero").val() , ClaveMat: $("#ClaveMat").val() , id : $("#id").val()},
                        dataType: "json",
                        success : function(data){
                            if(data.success == 1){
                                $("#Numero").val("");
                                $("#Descripcion").val("");
                                $("#ClaveMat").val("");

                                $("#contenidoMat").html(data.resultado);

                                
                                $("#matriz-modal").modal('hide');
                            }else{
                                alertify.error(data.resultado);
                            }
                           
                        }
                    });

                });
               

                $('#tablaInsumosGlobal').dataTable({
                        "oLanguage": {
                            "sLengthMenu": "_MENU_ reg x pag",
                            "sZeroRecords": "0 resultados en el criterio de busqueda, solicita lo que buscas mediante un articulo en blanco a nuestros proveedores ",
                            "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
                            "sInfoFiltered": "(Filtrado de _MAX_ total registros)",
                            "sSearch": "Buscar:"
                        },
                        "aoColumns": [null, null, null, null,null,{ "bSortable": false }] ,
                        "fnDrawCallback": function (oSettings, json) {
                           $(".imagenAvatar").popover({trigger: 'hover','placement': 'left', html:true});
                        },
                   "iDisplayLength": 10,
                   "aLengthMenu": [[10, 20, 60, -1], [10, 20, 60, 100]]
                }); 

                $('#tablaHerramientas').dataTable({
                        "oLanguage": {
                            "sLengthMenu": "_MENU_ reg x pag",
                            "sZeroRecords": "0 resultados en el criterio de busqueda, solicita lo que buscas mediante un articulo en blanco a nuestros proveedores ",
                            "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
                            "sInfoFiltered": "(Filtrado de _MAX_ total registros)",
                            "sSearch": "Buscar:"
                        },
                        "aoColumns": [null, null, null, null,null,{ "bSortable": false }] ,
                        "fnDrawCallback": function (oSettings, json) {
                           $(".imagenAvatar").popover({trigger: 'hover','placement': 'left', html:true});
                        },
                   "iDisplayLength": 10,
                   "aLengthMenu": [[10, 20, 60, -1], [10, 20, 60, 100]]
                });

                $('#tablaIndirectos').dataTable({
                        "oLanguage": {
                            "sLengthMenu": "_MENU_ reg x pag",
                            "sZeroRecords": "0 resultados en el criterio de busqueda, solicita lo que buscas mediante un articulo en blanco a nuestros proveedores ",
                            "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
                            "sInfoFiltered": "(Filtrado de _MAX_ total registros)",
                            "sSearch": "Buscar:"
                        },
                        "aoColumns": [null, null, null, null,null,{ "bSortable": false }] ,
                        "fnDrawCallback": function (oSettings, json) {
                           $(".imagenAvatar").popover({trigger: 'hover','placement': 'left', html:true});
                        },
                   "iDisplayLength": 10,
                   "aLengthMenu": [[10, 20, 60, -1], [10, 20, 60, 100]]
                });

                $('#tablaServicios').dataTable({
                        "oLanguage": {
                            "sLengthMenu": "_MENU_ reg x pag",
                            "sZeroRecords": "0 resultados en el criterio de busqueda, solicita lo que buscas mediante un articulo en blanco a nuestros proveedores ",
                            "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
                            "sInfoFiltered": "(Filtrado de _MAX_ total registros)",
                            "sSearch": "Buscar:"
                        },
                        "aoColumns": [null, null, null, null,null,{ "bSortable": false }] ,
                        "fnDrawCallback": function (oSettings, json) {
                           $(".imagenAvatar").popover({trigger: 'hover','placement': 'left', html:true});
                        },
                   "iDisplayLength": 10,
                   "aLengthMenu": [[10, 20, 60, -1], [10, 20, 60, 100]]
                });

                $('#tablaMaquinaria').dataTable({
                        "oLanguage": {
                            "sLengthMenu": "_MENU_ reg x pag",
                            "sZeroRecords": "0 resultados en el criterio de busqueda, solicita lo que buscas mediante un articulo en blanco a nuestros proveedores ",
                            "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
                            "sInfoFiltered": "(Filtrado de _MAX_ total registros)",
                            "sSearch": "Buscar:"
                        },
                        "aoColumns": [null, null, null, null,null,{ "bSortable": false }] ,
                        "fnDrawCallback": function (oSettings, json) {
                           $(".imagenAvatar").popover({trigger: 'hover','placement': 'left', html:true});
                        },
                   "iDisplayLength": 10,
                   "aLengthMenu": [[10, 20, 60, -1], [10, 20, 60, 100]]
                });

                $('#tablaEquipos').dataTable({
                        "oLanguage": {
                            "sLengthMenu": "_MENU_ reg x pag",
                            "sZeroRecords": "0 resultados en el criterio de busqueda, solicita lo que buscas mediante un articulo en blanco a nuestros proveedores ",
                            "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
                            "sInfoFiltered": "(Filtrado de _MAX_ total registros)",
                            "sSearch": "Buscar:"
                        },
                        "aoColumns": [null, null, null, null,null,{ "bSortable": false }] ,
                        "fnDrawCallback": function (oSettings, json) {
                           $(".imagenAvatar").popover({trigger: 'hover','placement': 'left', html:true});
                        },
                   "iDisplayLength": 10,
                   "aLengthMenu": [[10, 20, 60, -1], [10, 20, 60, 100]]
                });

                $( ".dragable tr" ).draggable({
                      appendTo: "body",
                      helper: "clone"
                });

                $( "#TableMatriz tbody" ).droppable({
                    activeClass: "ui-state-default",
                    hoverClass: "ui-state-hover",
                    accept: ":not(.ui-sortable-helper)",
                    drop: function( event, ui ) {
                        //$( this ).find( ".joseDavid" ).remove();
                        $("#TableMatriz .joseDavid").append(ui.draggable);
                       // $( "<tr><td></td></tr>" ).text( ui.draggable.text() ).appendTo( this );
                    }
                }).sortable({
                    items: "li:not(.joseDavid)",
                    sort: function() {
                    // gets added unintentionally by droppable interacting with sortable
                    // using connectWithSortable fixes this, but doesn't allow you to customize active/hoverClass options
                        $( this ).removeClass( "ui-state-default" );
                    }
                });

                /*$("#tablaServicios tr:gt(0)").draggable({
                    revert: 'invalid'
                });
                $("#TableMatriz").droppable({
                    drop: function (event, ui) {
                        $("#TableMatriz .joseDavid").append(ui.draggable);
                    }
                });*/
                            
            });

             
	   </script>


    </body>
</html>

