<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>KUANTO.INFO | Mi Perfil</title>
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
        <link href="<?php echo base_url(); ?>css/alertify.default.css" rel="stylesheet"/>
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
                                <li><a href="<?php echo base_url(); ?>articulos/mis_articulos" ><i class="fa fa-angle-double-right"></i> Mis Articulos</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> Mis Cotizaciones</a></li>
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
                        Mi Perfil
                        <small>Editar</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- ESCCENAS Perfil -->
 
                    <div>&nbsp;</div>
                    <?=form_open_multipart('users/editarDatos'); ?>
			
            			<?php while($fila = mysql_fetch_array($datosArray)){ ?>
            			<input type="hidden" name="idUser" value ="<?php echo $fila['emp_id']; ?>">
            			<input type="hidden" name="imagen" value ="<?php echo $fila['emp_imagen']; ?>">
                        <div class="row">
                            <div class="col-md-1">&nbsp;</div>
                            <div class="col-md-4" style="text-align: center;">
                                <img id="imagen" alt="Imagen de Perfil" width="200" height="200" id="imagen" src="<?php echo base_url();?>Images/users/<?php echo $fila['emp_imagen']?>"/>
                                <div class="form-group">
                                    <label for="imgInsumo"></label>
                                    <input type="file" class="form-control" id="imgInsumo" name="imgInsumo">
                                </div>
                                <div class="form-group" style="text-align:left;">
                                    <h3>Datos Fiscales</h3>
                                </div>
                                <div class="form-group" style="text-align:left;">
                                    <label for="rfc">RFC</label>
                                    <input type="text" id="rfc" name="rfc" value="<?php echo $fila['emp_RFC'];?>" class="form-control" required placeholder="RFC">
                                </div> 
                                <div class="form-group" style="text-align:left;">
                                    <label for="razonsoc">Razon Social</label>
                                    <input type="text" id="razonsoc" name="razonsoc" value="<?php echo $fila['emp_razon_social'];?>" class="form-control"  placeholder="Razon Social">
                                </div> 
                                <div class="form-group" style="text-align:left;">
                                    <label for="telefono">Telefono de Contacto</label>
                                    <input type="text" id="telefono" name="emp_telefono" value="<?php echo $fila['emp_telefono'];?>" class="form-control"  placeholder="Telefono de contacto">
                                </div> 
                                <div class="form-group" style="text-align:left;">
                                    <label for="direFiscal">Direccion Fiscal</label>
                                    <input type="text" id="direFiscal" name="emp_direFiscal" value="<?php echo $fila['emp_direccion_f'];?>" class="form-control"  placeholder="Direccion fiscal">
                                </div> 
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h3>Datos Generales</h3>
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" id="nombre" value="<?php echo $fila['emp_nombre'];?>" name="nombre" placeholder="Nombres" class="form-control" required>
                                        </div>
					                    <div class="form-group">
                                            <label for="Apellidos">Apellidos</label>
                                            <input type="text" id="apellidos" value="<?php echo $fila['emp_apellido'];?>" placeholder="Apellidos" name="apellidos" class="form-control" required>
                                        </div>
					                   <div class="form-group">
                                            <label for="mail">Email</label>
                                            <input type="email" id="email" name="email" value="<?php echo $fila['emp_correo'];?>" class="form-control" required placeholder="Email" readonly>
                                        </div>
					                    <div class="form-group">
                                            <label for="pais">Pais</label>
                                            <select class="form-control" id="pais" name="pais">
                        						<?php
                        						 while($pais = mysql_fetch_array($paises)){ 
                        							if($pais['pa_id'] == $fila['emp_pais']){
                        							 echo '<option value="'.$pais['pa_id'].'">'.$pais['pa_nombre'].'</option>';								
                        							}
                        						 }
                        						 while($paise = mysql_fetch_array($paises)){ 
                        							if($paise['pa_id'] != $fila['emp_pais']){
                        							 echo '<option value="'.$paise['pa_id'].'">'.$paise['pa_nombre'].'</option>';								
                        							}
                        						 }								

                        						 ?>
                        					    </select>
                                        </div>
					                    <div class="form-group">
                                            <label for="Ciudad">Ciudad</label>
                                            <select class="form-control" id="ciudad" name="ciudad">
                    						<?php
                    						 while($ciudad = mysql_fetch_array($ciudades)){
                    							if($fila['emp_ciudad'] == $ciudad['city_id']){
                    							  echo '<option value="'.$ciudad['city_id'].'">'.$ciudad['city_nombre'].'</option>';
                    							}else{
                    							  echo '<option value="'.$ciudad['city_id'].'">'.$ciudad['city_nombre'].'</option>';						
                    							}
                    						 } ?>
                    					    </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                         &nbsp;  
                                    </div>
                                    <div class="col-md-6" style="text-align: right;">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">&nbsp;</div>
                        </div>
		    <?php } ?>
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
	<script src="<?php echo base_url();?>js/alertify.js"></script>
        <script>
            $(function(){

		$("#pais").change(function(){
                    $.ajax({
                        url :"<?php echo base_url();?>registro/getCiudades",
                        type:"POST",
                        data:{paisId:$(this).val()},
                        success:function(data){
                                $("#ciudad").html("<option value='0'>Seleccione su ciudad</option>" + data);
                        }
                    });
                });		

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
                    var result= e.target.result;
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

