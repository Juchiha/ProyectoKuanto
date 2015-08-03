<?php
    $colores = array("#FA58F4", "#9FF781", "#5882FA", "#FA5858", "#2EFE9A" , "#FFFF00", "#8A4B08", "#5F04B4", "#8A0829", "#0B610B", "#01DF01", "#FF8000");
?>


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

            #acumuladores { list-style-type: none; margin: 0; padding: 0; width: 100%; }
            #acumuladores li {
                margin: 3px;
                padding: 4px;
                font-size: 1.2em;
                height: 35px;
                color: #333333 !important;
                border: 1px solid #cacaca;
                background-color: white;
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, white), color-stop(100%, gainsboro));
                background: -webkit-linear-gradient(top, white 0%, gainsboro 100%);
                background: -moz-linear-gradient(top, white 0%, gainsboro 100%);
                background: -ms-linear-gradient(top, white 0%, gainsboro 100%);
                background: -o-linear-gradient(top, white 0%, gainsboro 100%);
                background: linear-gradient(to bottom, white 0%, gainsboro 100%);
            }

            #acumuladoresLevel2 { list-style-type: none; margin: 0; padding: 0; width: 100%; }
            #acumuladoresLevel2 li {
                margin: 4px 1px 5px 20px;
                padding: 4px;
                font-size: 1.2em;
                height: 35px;
                color: #333333 !important;
                border: 1px solid #cacaca;
                background-color: white;
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, white), color-stop(100%, gainsboro));
                background: -webkit-linear-gradient(top, white 0%, gainsboro 100%);
                background: -moz-linear-gradient(top, white 0%, gainsboro 100%);
                background: -ms-linear-gradient(top, white 0%, gainsboro 100%);
                background: -o-linear-gradient(top, white 0%, gainsboro 100%);
                background: linear-gradient(to bottom, white 0%, gainsboro 100%);
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
                        <a data-target="#acumulador-modal" data-toggle="modal" id="addplus" class="btn btn-app">
                            <i class="fa fa-plus"></i> Agregar
                        </a>                        
                    </div>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Hoja de presupuesto</h3>                                    
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12" id="contenido">
                                    <table id="UsersTable" class="table table-bordered " style="margin:0 auto 0;">
                                        <thead class="widget-header">
                                            <tr>
                                                <th style="text-align:center;"  >NIVEL</th>
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
                                            <?php while($fila = mysql_fetch_array($acordeon)){ 
                                                
                                                $color_usar = '';
                                                $coloresAleatorios = '';
                                                $coloresAleatorios = array_rand($colores, 2);
                                                $color_usar = $colores[$coloresAleatorios[0]];
                                                
                                            ?>
                                                
                                                <tr style="color: #190707;" id="<?php echo $fila['acum_id'];?>">
                                                    <td style="text-align:justify;" class="col-md-1">I</td>
                                                    <td style="text-align:justify;" class="col-md-1"><?php echo $fila['acum_sigla'];?></td>
                                                    <td style="text-align:justify;" class="col-md-4"><?php echo $fila['acum_descripcion'];?></td>
                                                    <td style="text-align:justify;" class="col-md-1">Un</td>
                                                    <td style="text-align:justify;" class="col-md-1">1</td>
                                                    <td style="text-align:justify;" class="col-md-1"></td>
                                                    <td style="text-align:justify;" class="col-md-1"><?php echo " 100 $";//$fila['acum_nombre'];?></td>
                                                    <td style="text-align:justify;" class="col-md-3">
                                                        <div class="btn-group">
                                                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">
                                                                <i class="fa fa-plus"></i>
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul role="menu" class="dropdown-menu">
                                                                <li><a href="#"  class="btnPadreAgrup" padre="<?php echo $fila['acum_id'];?>" color="#00BFFF"  nivel="II" data-toggle="modal" id="addplus" >Agrupador</a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="#" class="btnPadreMAtrix" padre="<?php echo $fila['acum_id'];?>" color="#00BFFF"  nivel="II" data-toggle="modal">Matriz</a></li>
                                                            </ul>
                                                        </div>
                                                        <button title="editar" class="btn btn-success btn-mini editar" ids="<?php echo $fila['acum_id'];?>" ><i class="fa fa-edit"></i></button>
                                                        <button title="eliminar" class="btn btn-danger btn-mini eliminar" proyect ="<?php echo $valueProyects;?>" ids="<?php echo $fila['acum_id'];?>" ><i class="fa fa-trash-o"></i></button>
                                                        
                                                        
                                                    </td>
                                                </tr>
                                            <?php 

                                                $ci = &get_instance();
                                                $ci->load->Model('Presupuestos_model');  
                                                $row = $ci->Presupuestos_model->getAgrupadores($fila['acum_id']);
                                                $datos_vista = Array('acordeon' => $row , 'color_usar' => $color_usar);
                                                $this->load->view('Presupuestos/agrupador', $datos_vista );  

                                                $row2 = $ci->Presupuestos_model->getMatrix($fila['acum_id']);
                                                $datos_vista2 = Array('presupuesto' => $row2);
                                                $this->load->view('Presupuestos/verMatriz', $datos_vista2 ); 
                                            } 
                                            ?>
                                        </tbody>
                                    </table>    
                                   
                                </div>
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

        

        <div class="modal fade" id="acumulador-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Nuevo acumulador</h4>
                    </div>
                    
                        <div class="modal-body">
                            <input type="hidden"  id = "proyectId" value="<?php echo $valueProyects;?>">
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



        <!-- Estos son los modales que llenan las opciones -->
        <div class="modal fade" id="acumulador2-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> Nuevo acumulador</h4>
                    </div>
                    
                        <div class="modal-body">
                            <input type="hidden"  id = "proyectIdAgrupador" value="<?php echo $valueProyects;?>">
                            <input type="hidden" id="padreIDAgr" value="0">
                            <input type="hidden" id = "idAgr"  name="id" value="0">
                            <input type="hidden" id="colorAgru" value="0">
                            <input type="hidden" id = "nivelagru"  name="id" value="0">
                            <div class="form-group">
                                <input type="text" name="nameAgru" id="nameAgru2" placeholder="Nombre del agrupador" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="claveAgr" id="txtSiglaacum2" placeholder="Clave del agrupador" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="descripcionagru" id="txtdescacum2" placeholder="Descripcion del agrupador" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

                            <button type="button" id="GuardaragrupadorHijo" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Guardar</button>
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
                            <input type="hidden"  id = "proyectIdMatriz" value="<?php echo $valueProyects;?>">
                            <input type="hidden" id="padreIDMatriz" value="0">
                            <input type="hidden" id = "idMatriz"  name="id" value="0">
                            <div class="form-group">
                                <input type="text" name="Numero" id="Numero" placeholder="Cantidad" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="ClaveMat" id="ClaveMat" placeholder="Clave de la Matriz" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="Descripcion" id="DescripcionMat" placeholder="Descripción de la matriz" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

                            <button type="button" id="GuardarMatriz" class="btn btn-primary pull-left"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                   
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <div class="modal fade" id="agregar-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="box">
                        <div class="box-body">
                            <button class="btn btn-default btn-block" id="btnagrupador">Agrupador</button>
                            <button class="btn btn-default btn-block" id="btnmatris">Matris</button>
                            <button class="btn btn-default btn-block" id="btninsumocomp">Insumo Compuesto</button>
                            <button class="btn btn-default btn-block" id="btninsumobasi">Insumo Basico</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <!-- jQuery UI 1.10.3 -->
        <!-- Bootstrap -->
        <script src="<?PHP echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?PHP echo base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?PHP echo base_url(); ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
  
        <script src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script> 
        <script src="<?php echo base_url(); ?>js/dataTables.bootstrap.js"></script>
	    <script src="<?php echo base_url();?>js/alertify.js"></script>
        <script src="<?php echo base_url();?>js/numeric.js"></script>
        
        
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

                eliminar: function(x, y, ids){
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

                                $("#"+x).hide();

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

            
                $("#Numero").numeric();
                $(".btnPadreAgrup").click(function(){
                    $("#padreIDAgr").val($(this).attr('padre'));
                    $("#colorAgru").val($(this).attr('color'));
                    $("#nivelagru").val($(this).attr('nivel'));
                    $("#acumulador2-modal").modal();
                });

                $(".btnPadreMAtrix").click(function(){
                    $("#padreIDMatriz").val($(this).attr('padre'));
                    console.log("HOla");
                    $("#matriz-modal").modal();
                });
                

                $(".editar").click(function(){
                    Operaciones.getdatos($(this).attr('ids'));
                });
                $(".eliminar").click(function(){
                    Operaciones.eliminar($(this).attr('ids'), $(this).attr('proyect'));
                });
                $(".presupuestoHoja").click(function(e){
                    e.preventDefault();
                    window.location.href=  $(this).attr("href");
                });


                $("#Guardaragrupador").click(function(){

                    $.ajax({
                        type    : "POST",
                        url     : "<?php echo base_url(); ?>presupuestos/insertarAgrupador",
                        data    : { nameAgru: $("#nameAgru").val() , 
                                    descripcionagru: $("#txtdescacum").val(), 
                                    padre: '0' , 
                                    claveAgr: $("#txtSiglaacum").val() , 
                                    proyectId: $("#proyectId").val() , 
                                    id : $("#id").val(),
                                    color : '#190707',
                                    nivel : 'I'
                                },
                        dataType: "json",
                        success : function(data){
                            if(data.success == 1){
                                $("#nameAgru").val("");
                                $("#txtdescacum").val("");
                                $("#txtSiglaacum").val("");
                                $('#UsersTable tr:last').after(data.resultado);
                                $(".btnPadreAgrup").click(function(){
                                    $("#padreIDAgr").val($(this).attr('padre'));
                                    $("#colorAgru").val($(this).attr('color'));
                                    $("#nivelagru").val($(this).attr('nivel'));
                                    $("#acumulador2-modal").modal();
                                });

                                $(".btnPadreMAtrix").click(function(){
                                    $("#padreIDMatriz").val($(this).attr('padre'));
                                    console.log("HOla");
                                    $("#matriz-modal").modal();
                                });

                                $("#acumulador-modal").modal('hide');
                            }else{
                                alertify.error(data.resultado);
                            }
                           
                        }
                    });
                });
               
                $("#GuardaragrupadorHijo").click(function(){
                    var padresTr = $("#padreIDAgr").val();
                    $.ajax({
                        type    : "POST",
                        url     : "<?php echo base_url(); ?>presupuestos/insertarAgrupadorHijo",
                        data    : { nameAgru: $("#nameAgru2").val() , 
                                    descripcionagru: $("#txtdescacum2").val(), 
                                    padre: $("#padreIDAgr").val() , 
                                    claveAgr: $("#txtSiglaacum2").val() , 
                                    proyectId: $("#proyectIdAgrupador").val() , 
                                    id : $("#idAgr").val(),
                                    color : $("#colorAgru").val(),
                                    nivel : $("#nivelagru").val()
                        },
                        dataType: "json",
                        success : function(data){
                            if(data.success == 1){
                                $("#nameAgru2").val("");
                                $("#txtdescacum2").val("");
                                $("#txtSiglaacum2").val("");
                                $("#nivelagru").val('0');
                                $("#colorAgru").val('0');
                                $("#idAgr").val('0');
                                $("#padreIDAgr").val('0');

                                $("#"+padresTr ).closest( "tr" ).after(data.resultado);

                                $(".btnPadreAgrup").click(function(){
                                    $("#padreIDAgr").val($(this).attr('padre'));
                                    $("#colorAgru").val($(this).attr('color'));
                                    $("#nivelagru").val($(this).attr('nivel'));
                                    $("#acumulador2-modal").modal();
                                });

                                $(".btnPadreMAtrix").click(function(){
                                    $("#padreIDMatriz").val($(this).attr('padre'));
                                    $("#matriz-modal").modal();
                                });

                                $("#acumulador2-modal").modal('hide');
                            }else{
                                alertify.error(data.resultado);
                            }
                           
                        }
                    });
                });

                $("#GuardarMatriz").click(function(){
                    var padresTr = $("#padreIDMatriz").val();
                    $.ajax({
                        type    : "POST",
                        url     : "<?php echo base_url(); ?>presupuestos/InsertarMatriz",
                        data    : { Descripcion: $("#DescripcionMat").val(), padre: $("#padreIDMatriz").val() , Numero: $("#Numero").val() , ClaveMat: $("#ClaveMat").val() , id : $("#idMatriz").val()},
                        dataType: "json",
                        success : function(data){
                            if(data.success == 1){
                                $("#Numero").val("");
                                $("#DescripcionMat").val("");
                                $("#ClaveMat").val("");
                                $("#"+padresTr ).closest( "tr" ).after(data.resultado);
                                $("#matriz-modal").modal('hide');
                            }else{
                                alertify.error(data.resultado);
                            }
                           
                        }
                    });

                });

            });
	   </script>


    </body>
</html>

