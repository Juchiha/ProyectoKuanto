<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>KUANTO.INFO | HomePage</title>
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
                                <i class="fa fa-th-list"></i> <span>Global</span>
                            </a>
                        </li>
                        <li class="active">
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
                                    <li><a href="<?php echo base_url(); ?>blog/create"><i class="fa fa-rss"></i><span>Add Entrada</span></a></li>
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
                        ARTICULOS
                        <small>De <?php  echo strtoupper($nombre); ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li>HomePage</li>
                        <li class="active">Filtro</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- ESCCENASSS POR SERVICIO Y CATEGORIA -->
                    <div class="box">
                        <div class="box-body table-responsive">
                            <table id="tablaInsumosGlobal" class="table table-striped" style="margin:0 auto 0;">
                                <thead class="widget-header">
                                    <tr>
                                        <th style="text-align:center;" class="col-md-1" >CLASE</th>
                                        <th style="text-align:center;" class="col-md-1" >CLAVE</th>
                                        <th style="text-align:center;" class="col-md-2" >DESCRIPCI&Oacute;N</th>
                                        <th style="text-align:center;">UNIDAD</th>
                                        <th style="text-align:center;">STOK</th>
                                        <th style="text-align:center;">PRECIO</th>
                                        <th style="text-align:center;" class="col-md-1" >FECHA</th>
                                        <th style="text-align:center;" class="col-md-1" >CIUDAD</th>
                                        <th style="text-align:center;" class="col-sd-1" >LOG</th>
                                        <th style="text-align:center;" class="col-sd-1" >IMG</th>
                                        <th style="text-align:center;" class="col-md-1">COTIZAR</th>
                                        <th style="text-align:center;" class="col-sm-2" ></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($fila = mysql_fetch_array($rs_articulos)){
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

                                        $imagenTienda = null;

                                       

                                        $imagenTienda = "<img src='".base_url()."Images/users/".$fila['emp_imagen']."' alt='AVATAR' width='30' height='30' />"; 
                                        
                                        $imagenUsuario ="<img src='". base_url()."Images/users/".$fila['emp_imagen']."' alt='PERFIL/AVATAR' width='161' height='161'/>";
                                        $popover = 'class="imagenAvatar" title="'.$fila['nombres']." ".$fila['apellidos'].'" data-content="'.$imagenUsuario.'"';
                                ?>		
                                    <tr>
                                        <td class="col-md-1"><?php echo $fila['cl_nombre']; ?></td>
                                        <td class="col-md-1" ><?php echo $fila['in_clave']; ?></td>
                                        <td class="col-md-2" ><div class='tooltip-success'  data-rel='popover'  data-placement='top' title='Descripcion' data-content='<?php echo $fila['in_descripcion']; ?>'><?php echo getLongitudString($fila['in_descripcion']); ?></div></td>
                                        <td style='text-align:center;'><?php echo $fila['sigla']; ?></td>
                                        <td style='text-align:left;'><?php echo $fila['in_cantidad']; ?></td>
                                        <td style='text-align:right; font-size: 11px;'>$ <?php echo $fila['in_precio']; ?></td>
                                        <td class="col-md-1" ><?php echo $fila['in_fecha_']; ?></td>
                                        <td class="col-md-1" ><?php echo $fila['ti_nombre']; ?></td>
                                        <td class="col-sd-1" ><div style="text-align:center;" <?php echo $popover; ?>><?php echo $imagenTienda; ?></div></td>
                                        <td class="col-sd-1" style="text-align:center;" ><?php echo $imagen;?> </td>
                                        <td style='text-align:center;' class="col-md-1" ><input type='text' class="col-md-12" id='txtId_<?php echo $fila['in_clave']; ?>' remit='<?php echo $fila['in_emp_id']; ?>'></td>
                                        <td style='text-align:center;' class="col-sm-2"  >
                                            <button class='btn btn-primary btn-sm btnMatriz' idmio='<?php echo $fila['in_id']; ?>' idTexbox='txtId_<?php echo $fila['in_clave']; ?>'>
                                                <i class='fa fa-envelope'></i>
                                            </button>
                                            <a data-target="#compose-modal" role="button" class='btn btn-primary btn-sm LaunchModalDetails' data-toggle="modal" idInsumo="<?php echo $fila['in_id']; ?>" >
                                                <i class='fa fa-sign-in'></i>
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
                <div class="row">
                    <div class="col-md-5" style="text-align:center; cursor:pointer;">
                        <a data-toggle="modal" data-target="#blanco-modal">
                            <i class='fa fa-plus'></i> 
                            No encuentras lo que buscas, crea un articulo en blanco
                        </a>   
                    </div>
                    <div class="col-md-6" style="text-align:right; cursor:pointer;">
                          
                    </div>
                    <div class="col-md-1" style="text-align:right;">
                         
                    </div>
                </div>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- details of insumos -->
        <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Detalles del Insumo</h4>
                    </div>
                    <div class="modal-body" id="InsumosDetails">
                            
                        
                    </div>
                    <div class="modal-footer clearfix">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- add new calendar event modal -->


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

         <div class="modal fade" id="blanco-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Nuevo Mensaje</h4>
                    </div>
                    <form id="enviomensaje" method ="POST">
                        <div class="modal-body">                            
                            <div class="form-group">
                                <textarea name="mensaje" id="email_message" class="form-control" placeholder="Describe el producto que necesitas" style="height: 120px;"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

                            <button type="button" id="envioMensaje" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Crear Producto</button>
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
        <script src="<?php echo base_url();?>js/analitics.js"></script>
        
        
        
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
		cotizar = {
			enviarCotizacion:function(destinoX, insumoX, cantidadX){
				$.ajax({
					url : "<?php echo base_url(); ?>home/cotizar",
					type: "POST",
					data:{destino:destinoX, insumo:insumoX, cantidad:cantidadX },
					success:function(data){
                                            if(data === 'INSERTADO'){
                                                alertify.success("Cotizacion enviada!!!");
                                            }else{
                                                alertify.error("No logramos enviar la cotizacion, lo sentimos!!!");
                                            }
					}
				});
			},
			
			LaunchModalDetails:function(idInsumo){
				$("#InsumosDetails").html("");
				$.ajax({
					url: "<?php echo base_url();?>home/insumo_Detalle",
					type:"POST",
					data: {insumoId:idInsumo},
					success: function(data){
                                            $("#InsumosDetails").html(data);
					}
				});
			},
			
			getInsumosByCategoria:function(categoria, div, tablaId){
				$.ajax({
					url  : "<?php echo base_url();?>home/insumos_By_Categoria_Home",
					type : "POST",
					data : {categoria: categoria, TablaId: tablaId},
					success: function(data){
						div.html(data);
                                                var id = $("#"+tablaId);
                                                var clase = $("."+tablaId);
                                                id.dataTable({
                                                        "oLanguage": {
                                                            "sLengthMenu": "_MENU_ registros por pagina",
                                                            "sZeroRecords": "0 resultados en el criterio de busqueda, solicita lo que buscas mediante un articulo en blanco a nuestros proveedores ",
                                                            "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                                                            "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
                                                            "sInfoFiltered": "(Filtrado de _MAX_ total registros)",
                                                            "sSearch": "Buscar:"
                                                        },
                                                        "aoColumns": [{ "bSortable": false },{ "bSortable": false },  null, { "bSortable": false },{ "bSortable": false }, { "bSortable": false },null,{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false }, { "bSortable": false }] ,
                                                        "fnDrawCallback": function (oSettings, json) {
                                                           $(".imagenAvatar").popover({trigger: 'hover','placement': 'left', html:true});
                                                           clase.click(function(){
                                                                        var insumoid = $(this).attr('idmio');
                                                                        var textBox = $("#"+$(this).attr('idTexbox')+"");
                                                                        var cantidad = textBox.val();
                                                                        var destino = textBox.attr('remit');
                                                                        cotizar.enviarCotizacion(destino, insumoid, cantidad);
                                                                        textBox.val("");
                                                                        //alert(destino + "," + insumoid +"," + cantidad);
                                                                });

                                                                $(".LaunchModalDetails").click(function(){
                                                                        cotizar.LaunchModalDetails($(this).attr('idInsumo'));
                                                                });
                                                        },
                                                   "iDisplayLength": 20,
                                                   "aLengthMenu": [[20, 40, 60, -1], [20, 40, 60, 100]]
                                                });
					}
				});
			}
		}
		
		$(function(){
                    $('#tablaInsumosGlobal').dataTable({
                        "oLanguage": {
                            "sLengthMenu": "_MENU_ registros por pagina",
                            "sZeroRecords": "0 resultados en el criterio de busqueda, solicita lo que buscas mediante un articulo en blanco a nuestros proveedores ",
                            "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando de 0 a 0 de 0 registros",
                            "sInfoFiltered": "(Filtrado de _MAX_ total registros)",
                            "sSearch": "Buscar:"
                        },
                        "aoColumns": [{ "bSortable": false },{ "bSortable": false },  null, { "bSortable": false },{ "bSortable": false }, { "bSortable": false },null,{ "bSortable": false },{ "bSortable": false },{ "bSortable": false },{ "bSortable": false }, { "bSortable": false }] ,
                        "fnDrawCallback": function (oSettings, json) {
                           $(".imagenAvatar").popover({trigger: 'hover','placement': 'left', html:true});
                           $(".btnMatriz").click(function(){
                                    var insumoid = $(this).attr('idmio');
                                    var textBox = $("#"+$(this).attr('idTexbox')+"");
                                    var cantidad = textBox.val();
                                    var destino = textBox.attr('remit');
                                    if(textBox.val() === ""){
                                        alertify.error("El valor a cotizar esta vacio.");
                                    }else{
                                        cotizar.enviarCotizacion(destino, insumoid, cantidad);
                                    }
                                    textBox.val("");
                                        //alert(destino + "," + insumoid +"," + cantidad);
                                });

                                $(".LaunchModalDetails").click(function(){
                                        cotizar.LaunchModalDetails($(this).attr('idInsumo'));
                                });
                        },
                   "iDisplayLength": 20,
                   "aLengthMenu": [[20, 40, 60, -1], [20, 40, 60, 100]]
                });	
							
    		cotizar.getInsumosByCategoria('B', $("#herramientas_Tab"), "tablaCategoriaH");
    		cotizar.getInsumosByCategoria('C', $("#equipos_Tab"), "tablaCategoriaE");
    		cotizar.getInsumosByCategoria('D', $("#maquinaria_Tab"), "tablaCategoriaM");
    		cotizar.getInsumosByCategoria('E', $("#servicios_Tab"), "tablaCategoriaS");
    		cotizar.getInsumosByCategoria('F', $("#indirectos_Tab"), "tablaCategoriaI");
			
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
