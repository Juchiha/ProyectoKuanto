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
       <link href="<?php echo base_url(); ?>css/alertify.core.css" rel="stylesheet"/>
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
                        <li class="treeview active">
                            <a href="#">
                                <i class="fa fa-dashboard"></i>
                                <span>Control</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active"><a href="<?php echo base_url(); ?>articulos/mis_articulos" ><i class="fa fa-angle-double-right"></i> Mis Articulos</a></li>
                                <li><a href="<?php echo base_url(); ?>cotizaciones/mis_cotizaciones"><i class="fa fa-angle-double-right"></i> Mis Cotizaciones</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Mis Presupuestos</a></li>
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
                        Insumos
                        <small>Crear Insumo</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Insumos</a></li>
                        <li><a href="<?php echo base_url(); ?>articulos/mis_articulos">Mis Insumos</a></li>
                        <li class="active">Nuevo Insumo</li>
                    </ol>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- ESCCENAs ATICULOS PROPIOS -->
                    <div style="text-align: left;" class="content-header">
                        <a href="<?php echo base_url(); ?>articulos/mis_articulos" class="btn btn-primary bg-light-blue" title="Volver"><i class="fa fa-arrow-circle-left"></i>Volver</a>
                    </div>
                    <div>&nbsp;</div>
                    <?=form_open_multipart('articulos/insertarArticulo'); ?>
                        <div class="row">
                            <div class="col-md-1">&nbsp;</div>
                            <div class="col-md-4" style="text-align: center;">
                                <img id="imagen" alt="Image Insumo" width="200" height="200" id="imagen"/>
                                <div class="form-group">
                                    <label for="imgInsumo"></label>
                                    <input type="file" class="form-control" id="imgInsumo" name="imgInsumo" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
                                        </div> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="precio">Precio</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" name="precio" class="form-control" required id="precio" placeholder="Precio">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="stok">Stok</label>
                                            <input  type="text" id="stok" name="stok" class="form-control" required placeholder="Stok">
                                        </div>    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="unidad">Unidad</label>
                                            <select  id="unidad" class="form-control" name="unidad" required>
                                                <option>Seleccione unidad</option>
                                                <?php while ($unidad = mysql_fetch_array($unidades)){ ?>
                                                <option value="<?php echo $unidad['uni_id']; ?>"><?php echo $unidad['uni_sigla']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>    
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="categoria">Categoria</label>
                                            <select  id="categoria" class="form-control"  name="categoria" required>
                                                <option>Seleccione Cetegoria</option>
                                                <?php while ($clas = mysql_fetch_array($clases)){ ?>
                                                <option value="<?php echo $clas['cl_id']; ?>"><?php echo $clas['cl_descripcion']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div> 
                                    </div>
                                </div>
				<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="Url">Url</label>
                                            <input type="text" id="url" name="url" placeholder="URL" class="form-control">
                                        </div> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        &nbsp;    
                                    </div>
                                    <div class="col-md-6" style="text-align: right;">
                                        <button type="submit" class="btn btn-primary    ">Insertar insumo</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">&nbsp;</div>
                        </div>
                    </form>
                   
                    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
   

        <!-- jQuery UI 1.10.3 -->
        <!-- Bootstrap -->
        <script src="<?PHP echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?PHP echo base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?PHP echo base_url(); ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>js/jquery.validate.js"></script>
        <script src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url();?>js/alertify.min.js"></script>
        <script>
            $(function(){
                $("#imgInsumo").change(function(e) {
                    addImage2(e); 
                   // alert("Hola Cambie" + e.target.files[0]);
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
            });
            
            $.validator.setDefaults({
                submitHandler: function() { 
                    $("#createArticles").submit();
                }
            });
        </script>
    </body>
</html>

