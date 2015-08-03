<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>KUANTO.INFO | Blog</title>
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
        <link rel="stylesheet" href="<?PHP echo base_url(); ?>fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?PHP echo base_url(); ?>fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style>
		
            @media screen and (max-width:500px){
                #publicidad{
                    display: none;
                }
            }
            .imagenblog{
                height: 300px;
                width: 100%;
                text-align: center;
                border: solid 3px #FFF;
		box-shadow: 2px 2px 5px #888888;
		-webkit-box-shadow: 2px 2px 5px #888888;
		-moz-box-shadow: 2px 2px 5px #888888;
            }

            .comentar{
                /*display: none;*/
            }

            .comentarLink{
                cursor: pointer;
            }

            .compartirLink{
                cursor: pointer;
            }

            .likeLink{
                cursor: pointer;
            }

            .sombra{
                background: #FFF;
                -webkit-box-shadow: 2px 2px 5px #999;
                -moz-box-shadow: 2px 2px 5px #999;
                filter: shadow(color=#999999, direction=135, strength=2);
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
                        <li class="active">
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
                                <li ><a href="<?php echo base_url(); ?>articulos/mis_articulos" ><i class="fa fa-angle-double-right"></i> Mis Articulos</a></li>
                                <li><a href="<?php echo base_url(); ?>cotizaciones/mis_cotizaciones"><i class="fa fa-angle-double-right"></i> Mis Cotizaciones</a></li>
                                <li><a href="<?php echo base_url(); ?>presupuestos/mis_presupuestos" ><i class="fa fa-angle-double-right"></i> Mis Presupuestos</a></li>
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
						Post
                        <small>Blog Kuanto.info</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>blog/"><i class="fa fa-dashboard"></i> Blog</a></li>
                        <li class="active">Entrada</li>
                    </ol>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- ESCCENAs ATICULOS PROPIOS -->
                    <div class="row">
                        <div class="col-md-6">
                            <div style="text-align: left;" class="content-header">
                                <a href="<?php echo base_url(); ?>blog/" class="btn btn-primary bg-light-blue" title="Volver"><i class="fa fa-arrow-circle-left"></i>ir al blog</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <?php 
                                $datos = array('datos' => $entrada );
                                $this->load->view('Blog/cargarEntrada', $datos );
                            ?>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </section>
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

         <!-- Add fancyBox -->
        
        <script type="text/javascript" src="<?PHP echo base_url(); ?>fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

        <!-- Optionally add helpers - button, thumbnail and/or media -->
        
        <script type="text/javascript" src="<?PHP echo base_url(); ?>fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="<?PHP echo base_url(); ?>fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

        <link rel="stylesheet" href="<?PHP echo base_url(); ?>fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
        <script type="text/javascript" src="<?PHP echo base_url(); ?>fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
        
                <script type="text/javascript">
            $(function(){
                $(".compartirClass").click(function(e){
                    e.preventDefault();
                    window.open($(this).attr('href'),'_blank', "toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=500, height=500");
                });

                $(".comentarText").keypress(function( event ) {
                    if ( event.which == 13 ) {
                        var esto =  $(this).attr("valuePost");
                        var yo = $(this);
                        $.ajax({
                            url    : '<?php echo base_url();?>blog/comentar',
                            type   : "POST",
                            data   : {id : $(this).attr("valuePost"), post : $(this).val() },
                            dataType : 'json',
                            success: function(data){
                                if(data.success == 1){
                                    $("#cajacoments_"+esto).append("<p><a href='#'><img src='<?php echo base_url(); ?>Images/users/<?php echo $this->session->userdata('imagen'); ?>' class='img-circle' width='30' height='30' alt='User Image' />&nbsp;<b><?php echo $this->session->userdata('nombres'); ?> :</b></a> "+ yo.val() +"</p>");
                                    yo.val("");
                                }else{
                                    alertify.error(data.msg);
                                }
                            }
                        });
                    }
                });


                $(".likeClass").click(function(){
                    var id = $(this).attr("otro");
                    var yo = $(this);
                    var Valores = $(this).attr("valuePost");
                    //alert(id);
                    $.ajax({
                        url    : '<?php echo base_url();?>blog/like',
                        type   : "POST",
                        data   : {id : Valores},
                        dataType : 'json',
                        success: function(data){
                            if(data.success == 1){
                                $("#"+id).show();
                                yo.hide();

                                $.ajax({
                                    url    : '<?php echo base_url();?>blog/getLikes',
                                    type   : "POST",
                                    data   : {id : Valores},
                                    dataType : 'json',
                                    success: function(data){
                                        $("#countLikes_"+Valores).html("");
                                        $("#countLikes_"+Valores).append('Total me gusta : '+ data.response +'');
                                    }
                                });

                            }else{
                                alertify.error(data.msg);
                            }
                        }
                    });

                    
                });


                $(".NolikeClass").click(function(){
                    var id = $(this).attr("otro");
                    var yo = $(this);
                    var Valores = $(this).attr("valuePost");
                    //alert(id);
                    $.ajax({
                        url    : '<?php echo base_url();?>blog/nolike',
                        type   : "POST",
                        data   : {id : Valores},
                        dataType : 'json',
                        success: function(data){
                            if(data.success == 1){
                                $("#"+id).show();
                                yo.hide();

                                $.ajax({
                                    url    : '<?php echo base_url();?>blog/getLikes',
                                    type   : "POST",
                                    data   : {id : Valores},
                                    dataType : 'json',
                                    success: function(data){
                                        $("#countLikes_"+Valores).html("");
                                        $("#countLikes_"+Valores).append('Total me gusta : '+ data.response +'');
                                    }
                                });
                            }else{
                                alertify.error(data.msg);
                            }
                        }
                    });

                });
            
                $(".fancybox").fancybox({
                    helpers:  {
                        overlay : null
                    }
                });
            });
        </script>
    </body>
</html>


