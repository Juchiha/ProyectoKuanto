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
        <link href='//fonts.googleapis.com/css?family=Sansita+One' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?PHP echo base_url(); ?>fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?PHP echo base_url(); ?>fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
         <!-- jQuery 2.0.2 -->
        <script src="<?PHP echo base_url(); ?>js/Jquery2.1.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style>

             @media all and (min-width: 50em){
                #publicidad{
                    display: none;
                }

                .hed{
                    text-align:center;
                    font-family: 'Sansita One', cursive; 
                    font-size:25px; 
                    color:#019CDE;
                    margin-top: -9px;
                }
            }

			#publicidad{
				position: fixed;
                width: 200px;
                height: 510px;
                top:7%;
                right: 15%;
                border: solid 1px #FFF000;
			}

            .imagenblog{
                height: 100%;
                width: 100%;
                text-align: center;
                border: solid 3px #FFF;
		box-shadow: 2px 2px 5px #888888;
		-webkit-box-shadow: 2px 2px 5px #888888;
		-moz-box-shadow: 2px 2px 5px #888888;
            }

            .comentar{
                display: none;
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

            .hed{
                text-align:right;
                font-family: 'Sansita One', cursive; 
                font-size:21px; 
                color:#019CDE;
                margin-top: -9px;
            }

            .hed2{
                text-align:center;
                font-family: 'Sansita One', cursive; 
                font-size:25px; 
                color:#019CDE;
                margin-top: -9px;
            }

            .login {
                text-align:right; padding-top: 0px;
            }

            .registro{
                text-align:left; padding-top: 0px;
            }
        </style>
    </head>
    <body class="pace-done skin-blue fixed" >
            <header class="header" style="background-color: #f5f5f5;">
                <div class="row-fluid">
                    <div class="col-md-12" >&nbsp;</div>
                </div>
                <div class="row-fluid" style="background-color: #f5f5f5 !important;">
                    <div class="col-md-4 hed" id="nombresitio">
                        <a href="<?php echo base_url();?>">
                            <img src="<?php echo base_url();?>img/k40.png" alt="Kuanto.info" style="margin-top: -12px;"> Blog Kuanto.info
                        </a>
                    </div>
                    <div class="col-md-4" >
                        &nbsp;
                    </div>
                    <div class="col-md-3">
                        <div class="row" style="text-align:center;">
                            <div class="col-md-2"></div>
                            <div class="col-md-4 login" id="login">
                                <a href="<?php echo base_url();?>login/index/blog" >Login a tu cuenta! </a>
                            </div>
                            <div class="col-md-6 registro" id="registro" >
                                <a href="<?php echo base_url();?>registro" >Crear una cuenta</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                
            </header>
	       <!-- fin del Header -->
        
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->

                <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">
                        <!-- Sidebar user panel -->       
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
                                <a href="<?php echo base_url(); ?>registro">
                                    <i class="fa fa-th-list"></i> <span>Global</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url(); ?>registro">
                                    <i class="fa fa-th-list"></i><span>Local</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>registro/">
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
                                    <li><a href="<?php echo base_url(); ?>registro" ><i class="fa fa-angle-double-right"></i> Mis Articulos</a></li>
                                    <li><a href="<?php echo base_url(); ?>registro"><i class="fa fa-angle-double-right"></i> Mis Cotizaciones</a></li>
                                    <li><a href="<?php echo base_url(); ?>registro"><i class="fa fa-angle-double-right"></i> Mis Presupuestos</a></li>
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
						Entradas Recientes
                        <small>Blog Kuanto.info</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- ESCCENAs ATICULOS PROPIOS -->
                    
                    <div class="row" >
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-1">&nbsp;</div>
                                <div class="col-md-5" id="mesagesPares" style="text-align:justify; ">
                                    <?php 
                                        $datos = array('datos' => $datosImpares );
                                        $this->load->view('Blog/cargarBlog', $datos );
                                    ?>
                                </div>
                                <div class="col-md-5" id="mesagesinPares" style="text-align:justify;">
                                    <?php
                                        $data = array('datos' => $datosPares);
                                        $this->load->view('Blog/cargarBlog', $data);  
                                    ?>
                                </div>
                                <div class="col-md-1">&nbsp;</div>   
                            </div>
                        </div>
                        <div class="col-md-2">
                       
                        </div>
                    </div>
                    
                    <div class="row">&nbsp;</div>
                </section><!-- /.content -->
                <div class="row">
                    <div class="col-md-12" >
                        <!--<a title="Web Analytics" href="http://clicky.com/100793037">
                            <img alt="Web Analytics" src="//static.getclicky.com/media/links/badge.gif" border="0" />
                        </a>-->
                        <script src="//static.getclicky.com/js" type="text/javascript"></script>
                        <script type="text/javascript">try{ clicky.init(100793037); }catch(e){}</script>
                        <noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/100793037ns.gif" /></p></noscript>
                    </div>
                </div>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <?php
            function getLongitudString($cadena, $url){
                $longitudString = strlen($cadena);
                if($longitudString > 500){
                    $cadena = substr($cadena, 0, 500);
                    $cadena .= "... ".$url; 
                }
                return $cadena;
            }
        ?>
       
        <!-- jQuery UI 1.10.3 -->
        <!-- Bootstrap -->
        <script src="<?PHP echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?PHP echo base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?PHP echo base_url(); ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?PHP echo base_url(); ?>fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

        <!-- Optionally add helpers - button, thumbnail and/or media -->
        
        <script type="text/javascript" src="<?PHP echo base_url(); ?>fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="<?PHP echo base_url(); ?>fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

        <link rel="stylesheet" href="<?PHP echo base_url(); ?>fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
        <script type="text/javascript" src="<?PHP echo base_url(); ?>fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
  
        <script type="text/javascript">
            var Inicio = 11;
            var Limite = 10;
            $(function(){
                if($(window).width() < 500){
                    $("#nombresitio").removeClass('hed');  
                    $("#nombresitio").addClass('hed2'); 
                    $("#login").removeClass('login');  
                    $("#registro").removeClass('registro'); 
                }else{
                    $("#nombresitio").removeClass('hed2');  
                    $("#nombresitio").addClass('hed');
                }

                $("#nombresitio").resize(function(){
                    if($(window).width() < 500){
                        $(this).removeClass('hed');  
                        $(this).addClass('hed2'); 
                    }else{
                        $(this).removeClass('hed2');  
                        $(this).addClass('hed');
                    }
                });

                $("#login").resize(function(){
                    if($(window).width() < 500){
                        $(this).removeClass('login');  
                    }else{  
                        $(this).addClass('login');
                    }
                });

                $("#registro").resize(function(){
                    if($(window).width() < 500){
                        $(this).removeClass('registro');  
                    }else{
                        $(this).addClass('registro');
                    }
                });

                $(".fancybox").fancybox();
                $(".compartirClass").click(function(e){
                    e.preventDefault();
                    window.open($(this).attr('href'),'_blank', "toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=500, height=500");
                });


                $(window).scroll(function(){
                    if ($(window).scrollTop() == $(document).height() - $(window).height()){
                        cargardatospar();
                        cargardatosimpar();

                        Inicio += Limite;
                    }                  
                });


            });

            function cargardatospar(){
                $.post("<?php echo base_url();?>blog/cagarDatos", { inicio: Inicio, fin : Limite , tipo: "PAR"}, function(data){
                    if (data != "") {
                        $("#mesagesPares").append(data); 
                    }
                });              
            }

            function cargardatosimpar(){
                $.post("<?php echo base_url();?>blog/cagarDatos", { inicio: Inicio, fin : Limite , tipo: "IMPAR"}, function(data){
                    if (data != "") {
                        $("#mesagesinPares").append(data); 
                    }
                });              
            }
        </script>
    

    </body>
</html>


