<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>KUANTO.INFO | Mis Productos</title>
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
                                <li><a href="<?php echo base_url(); ?>articulos/mis_articulos" ><i class="fa fa-angle-double-right"></i> Mis Articulos</a></li>
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
                        Local
                        <small>Detalles del  Insumo</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>home/homePage"><i class="fa fa-th-list"></i>Local</a></li>
                        <li><a href="#">Detalle del Insumo</a></li>
                    </ol>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- ESCCENAs ATICULOS A EDITAR -->
                    <?php
                        while ($fila = mysql_fetch_array($articulos)){
                    ?>
                    <div style="text-align: left;" class="content-header">
                        <?php 
                            $url_Ak = null;
                            if($page == 'H'){
                                echo '<a href="'.base_url().'home/homePage" class="btn btn-primary bg-light-blue" title="Volver"><i class="fa fa-arrow-circle-left"></i>Volver</a>';
                            }else if($page == 'L'){
                                echo '<a href="'.base_url().'home/landpage" class="btn btn-primary bg-light-blue" title="Volver"><i class="fa fa-arrow-circle-left"></i>Volver</a>';    
                            }
                        ?>  
                    </div>
                    <div>&nbsp;</div>
                    <input type="hidden" id="artId" name="artId" value = "<?php echo $fila['in_id']; ?>" >
                    <input type="hidden" id="artIdDuenio"cname="artIdDuenio" value = "<?php echo $fila['in_emp_id']; ?>" >
                    <input type="hidden" id="rutas" value="Images/Articulos/<?php echo $fila['in_img']; ?>"> 
                    <div class="row">
                        <div class="col-md-1">&nbsp;</div>
                        <div class="col-md-4" style="text-align: center;">
                            <img id="imagen" src='<?php echo base_url();?>Images/Articulos/<?php echo $fila['in_img']; ?>' alt="Image Insumo" width="300" height="300"/>
                            <label for="txtfecha">Fecha de Publicacion <?php echo $fila['in_fecha_'];?></label>

                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion</label>
                                        <textarea  name="descripcion" disabled id="descripcion" class="form-control"><?php echo $fila['in_descripcion']; ?></textarea>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="precio">Precio</label>
                                        <input type="text" name="precio" disabled class="form-control" id="precio" value="<?php echo $fila['in_precio'];?>" placeholder="Precio">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input  type="text" id="stok" name="stok" disabled class="form-control" value="<?php echo $fila['in_cantidad'];?>" placeholder="Stok">
                                    </div>    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="unidad">Unidad</label>
                                        <input type="text" class="form-control" id="unidades" disabled value="<?php echo $fila['sigla'];?>">
                                    </div>    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="categoria">Categoria</label>
                                        <input type="text" class="form-control" id="categoria"  disabled value="<?php echo $fila['cl_descripcion'];?>">
                                    </div> 
                                </div>
                            </div>
			                <div class="row">
                                <div class="col-md-12" style="text-align:center;">
                                    <div class="form-group">
                                        <a href="http://<?php echo $fila['in_url']; ?>">Ficha tecnica</a>
                                    </div> 
                                </div>
                            </div>
                            <?php 
                                if($fila['in_emp_id'] != $this->session->userdata('userId')){
                                    echo '<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="txtCotizacion">Cantidad a cotizar</label>
                                                    <input type="text" placeholder="Digita la cantidad a cotizar" class="form-control" value="" id="txtCotizacion">
                                                </div>
                                                    
                                            </div>
                                            <div class="col-md-6" style="text-align: center;">
                                                <a class="btn btn-app" id="btnCotizar">
                                                    <i class="fa fa-envelope"></i> Cotizar
                                                </a>

                                                <a  class="btn btn-app" id="btnComprar">
                                                    <i class="fa fa-shopping-cart"></i> Comprar
                                                </a>
                                            </div>
                                        </div>';
                                }
                            ?>
                            <div class="row">
                                <div class="col-md-12" style="text-align:center;">
                                    <div class="form-group">
                                        <a target='_blank' href='http://twitter.com/share?url=http://www.kuanto.info/home/detalles/<?php echo $fila['in_id'];?>/H&text="<?php echo $fila['in_descripcion'];?>"' alt='Compartir en Twitter' class='compartirClass' valuePost='<?php echo $fila['in_id'];?>'><i class='fa fa-twitter'></i></a>&nbsp;&nbsp;
                                        <a target='_blank' href='http://www.facebook.com/sharer.php?s=100&p[url]=http://www.kuanto.info/home/detalles/<?php echo $fila['in_id'];?>/H&p[title]=<?php echo $fila['in_descripcion'];?>&p[images][0]=http://www.kuanto.info/Images/Articulos/<?php echo $fila['in_img']; ?>' alt='Compartir en Facebook' class='compartirClass' ><i class='fa fa-facebook'></i></a>&nbsp;&nbsp;
                                        <a target='_blank' href='https://plus.google.com/share?url=www.kuanto.info/home/detalles/<?php echo $fila['in_id'];?>/H' alt='Compartir en  Google Plus' class='compartirClass' valuePost='<?php echo $fila['in_id'];?>'><i class='fa fa-google-plus'></i></a>
                                        <?php if($this->session->userdata('tipo_user') == 'Administrador' || $this->session->userdata('tipo_user') == 'Direccion'){ ?>
                                            <a style="cursor:pointer;" title="Compartir en el blog de Kuanto.Info" id="compartirblog"><i class='fa fa-share'></i></a>
                                        <?php } ?>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">&nbsp;</div>
                    </div>
		   </form>
                    <?php
                        }
                    ?>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
   
        <div class="modal fade" id="compra-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-money"></i> Datos de la Compra</h4>
                    </div>
                    <form id="enviomensaje" method ="POST">
                        <div class="modal-body">                            
                            <div class="form-group">
                                <textarea name="mensaje" id="descripcion_articulo" class="form-control" placeholder="Descripcion" disabled ></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6"> 
                                    <label for="txtUnidad">Unidad</label>
                                     <input type="text" id="unidad2" class="form-control" disabled >
                                </div>
                                <div class="col-md-6"> 
                                    <label for="totalPrecio">Tipo de Producto</label>
                                    <input type="text" id="tipoPro" class="form-control" disabled >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"> 
                                    <label for="txtCantidad">Cantidad a comprar</label>
                                    <input type="number" class="form-control" id="txtCantidad" min="1" max="" placeHolder="Cantidad"> 
                                </div>
                                <div class="col-md-6"> 
                                    <label for="totalPrecio">Total</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input  class="form-control" required="" id="totalPrecio" placeholder="Total" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"> 
                                    <label for="txtCantidad">Banco</label>
                                    <select  class="form-control" id="cmbBancos">
                                        <option value="BV">Bancomer (BBVA)</option>
                                        <option value="BM">Banamex</option>
                                        <option value="SM">Santander</option>
                                        <option value="OX">Oxxo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>

                            <button type="button" id="comprar" class="btn btn-primary pull-left"><i class="fa fa-money"></i> Comprar</button>
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
	    <script src="<?php echo base_url(); ?>js/alertify.min.js"></script>
        <script src="<?php echo base_url(); ?>js/blockui.js"></script>
       <script>
            cotizar = {
                enviarCotizacion:function(destinoX, insumoX, cantidadX){
                    $.ajax({
                        url : "<?php echo base_url(); ?>home/cotizar",
                        type: "POST",
                        data:{destino:destinoX, insumo:insumoX, cantidad:cantidadX },
                        success:function(data){
                            if(data === 'INSERTADO'){
                                alertify.success("Cotizacion enviada!!!");
                                $("#txtCotizacion").attr('disabled', true);
                            }else{
                                alertify.error("No logramos enviar la cotizacion, lo sentimos!!!");
                            }
                        }
                    });
                },

                getBancosByCountry : function(){
                    $.ajax({
                        type  : 'GET',
                        url   : '<?php echo base_url();?>astropay/get_banks_by_country',
                        dataType:'json',
                        success : function(data){
                            var x = '';
                            $.each(data, function(key, val){
                                // Agregamos la opcion selected
                                x += '<option value="'+val['code']+'">'+val['name']+'</option>';
                            });

                            $("#cmbBancos").html(x);
                        }
                    })
                }
            }
            $(function(){
                cotizar.getBancosByCountry();

                $("#btnComprar").click(function(){
                   $("#compra-modal").modal();
      
                });

                $("#comprar").click(function(){
                    var t = $("#totalPrecio").val();
                    var banco = $("#cmbBancos").val();
                    var descripcion = $("#descripcion_articulo").val();
                    var orden = aleatorio(1000, 10000);
                    $.ajax({
                        type     : 'GET',
                        url      : '<?php echo base_url();?>astropay/create/'+orden+'/'+t+'/<?php echo $this->session->userdata("userId");?>/'+banco+'/MX/MXN/'+descripcion+'/1143231494/1/kuanto.info/kuanto.info/json',
                        dataType : 'Json',
                        beforeSend :function(){
                            $.blockUI({ 
                                message: 'Espere un momento por favor....',
                                css: { 
                                    border: 'none', 
                                    padding: '15px', 
                                    backgroundColor: '#000', 
                                    '-webkit-border-radius': '10px', 
                                    '-moz-border-radius': '10px', 
                                    opacity: .5, 
                                    color: '#fff' 
                                } 
                            });
                        },
                        success  : function(dta){
                            if(dta.status == 'OK'){
                                window.location.href = dta.link;
                            }else{
                                alert(dta.desc);
                            }
                        },
                        complete : function(){
                             $.unblockUI();
                        }
                    });
                });

                $("#txtCantidad").attr('max',$("#stok").val());
                $("#descripcion_articulo").val($("#descripcion").val());
                $("#unidad2").val($("#unidades").val());
                $("#tipoPro").val($("#categoria").val());

                $("#txtCantidad").focusout(function(){
                    if($(this).val() > $("#stok").val() ){
                        $(this).val($("#stok").val());
                    }
                    var total = Number($("#precio").val()) * Number($(this).val());
                    $("#totalPrecio").val(total);
                });

                $("#imgInsumo").change(function(e) {
                    addImage2(e); 
                   // alert("Hola Cambie" + e.target.files[0]);
                });

                $("#btnCotizar").click(function(){
                    if($("#txtCotizacion").val() < 1){
                         alertify.error("Por favor inserta un valor a cotizar");
                    }else{
                        var destino = $("#artIdDuenio").val();
                        var articulo = $("#artId").val();
                        var total = $("#txtCotizacion").val();
                        cotizar.enviarCotizacion(destino, articulo, total);    
                    }
                    
                });

                function addImage2(e){
                    var file = e.target.files[0],
                    imageType = /image.*/;

                    if (!file.type.match(imageType))
                        return;

                    var reader = new FileReader();
                    reader.onload = fileOnload2;
                    reader.readAsDataURL(file);
                }

                function fileOnload2(e) {
                    var result=e.target.result;
                    $('#imagen').attr("src",result);
                }

                function aleatorio(min, max) {
                    var num = Math.floor(Math.random()*(Number(max)-Number(min)+1)) + Number(min); 
                    return num; 
                }

                $("#compartirblog").click(function(){
                    $.ajax({
                        url   : "<?php echo base_url();?>blog/createPostCompartdo",
                        type  : "POST",
                        data  : {titulo:  "Articulos Kuanto.info", Descripcion: $("#descripcion").val() , imagens: $("#rutas").val(), editor1: $("#descripcion").val()+"</p> URL para ir al articulo : <a href='http://www.kuanto.info/home/detalles/"+ $("#artId").val() +"/H'>http://www.kuanto.info/home/detalles/"+ $("#artId").val() +"/H</a>  </p>"},
                        success: function(dta){
                            alertify.success("Hemos compartido tu post en el blog de Kuanto.info!!");
                            $("#compartirblog").hide();
                        }
                    });
                });
            });
            
        </script>
    </body>
</html>

