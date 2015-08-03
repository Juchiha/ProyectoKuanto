<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>KUANTO.INFO | Landing</title>
        <meta content='width=device-width, initial-scale=1, -scale=1maximum, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?PHP echo base_url(); ?>css/responsive.css" rel="stylesheet" type="text/css" />
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
        <link href='http://fonts.googleapis.com/css?family=Sansita+One' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="<? echo base_url();?>img/k_icon1.png"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style>
			.parrafo{
				padding-left:  32px;
				padding-top: 20px;
			}
			.carousel-inner { text-align: center; }
			.carousel .item > img { display: inline-block; }
        </style>
    </head>
    <body class="pace-done skin-blue fixed">
		<header class="header">
			<div class="row">
				<div class="col-md-12" style="background-color: #f5f5f5;">&nbsp;</div>
			</div>
			<div class="row" style="background-color: #f5f5f5;">,
				<div class="col-md-3" style="text-align:right;font-family: 'Sansita One', cursive; font-size:25px; color:#019CDE;">
					<a href="<? echo base_url();?>"><img src="<? echo base_url();?>img/k40.png" alt="Kuanto.info"> Kuanto.info</a>
				</div>
				<div class="col-md-5" >
				</div>
				<div class="col-md-2">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4" style="text-align:right; padding-top: 6px;">
							<a href="<? echo base_url();?>login" >Acceder</a>
						</div>
						<div class="col-md-4" style="text-align:left;">
							<a href="<? echo base_url();?>registro" data-rel="button" class="btn btn-primary">Crear una cuenta</a>
						</div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row">
				<div class="col-md-12" style="background-color: #f5f5f5;">&nbsp;</div>
			</div>
		</header>
		
		<div class="row">
			<div class="row">
				<div class="col-md-12" style="background-color: #f5f5f5;">&nbsp;</div>
			</div>
			<div class="row">
				<div class="col-md-12" style="background-color: #f5f5f5;">&nbsp;</div>
			</div>
			<div class="row">
				<div class="col-md-12" style="background-color: #f5f5f5;">&nbsp;</div>
			</div>
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					<li data-target="#carousel-example-generic" data-slide-to="3"></li>
					<li data-target="#carousel-example-generic" data-slide-to="4"></li>
					<li data-target="#carousel-example-generic" data-slide-to="5"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<img src="<? echo base_url();?>img/kuanto 1.jpg" alt="Image">
						<div class="carousel-caption">
							 <h3>Jack Daniels Huge Pack</h3>
						</div>
					</div>
					<div class="item">
						<img src="<? echo base_url();?>img/kuanto 2.jpg" alt="Image Alternative text" title="iPhone 5 iPad mini iPad 3" />
						<div class="carousel-caption countdown-caption">
							<h3>Apple Big Deal</h3>
						</div>
					</div>
					<div class="item">
						<img src="<? echo base_url();?>img/kuanto 3.jpg" alt="Image Alternative text" title="the best mode of transport here in maldives" />
						<div class="carousel-caption countdown-caption">
							<h3>Finshing in Maldives</h3>
						</div>
					</div>
					<div class="item">
						<img src="<? echo base_url();?>img/kuanto 4.jpg" alt="Image Alternative text" title="the best mode of transport here in maldives" />
						<div class="carousel-caption countdown-caption">
							<h3>Finshing in Maldives</h3>
						</div>
					</div>
					<div class="item">
						<img src="<? echo base_url();?>img/kuanto 5.jpg" alt="Image Alternative text" title="the best mode of transport here in maldives" />
						<div class="carousel-caption countdown-caption">
							<h3>Finshing in Maldives</h3>
						</div>
					</div>
					<div class="item">
						<img src="<? echo base_url();?>img/kuanto 6.jpg" alt="Image Alternative text" title="the best mode of transport here in maldives" />
						<div class="carousel-caption countdown-caption">
							<h3>Finshing in Maldives</h3>
						</div>
					</div>
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">&nbsp;</div>
		</div>

		<div class="row">
			<div class="col-md-12" style="text-align:center; font-family: 'Open Sans Condensed', sans-serif; font-size: 27px; padding-top: 12px;">
			Todos estamos construyendo algo Kuanto.info
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" >&nbsp;</div>
		</div>
		<div class="row">
			<div class="col-md-12" >&nbsp;</div>
		</div>
		<div class="row">
			<div class="col-md-12" >&nbsp;</div>
		</div>
		
		<div class="row">
			
			<div class="col-md-12" >
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-5">
						<div class="row">
							<div class="col-md-4">
								<img src="<? echo base_url();?>img/kuanto_materiales.png" alt="imagen" width="184px" height="184px">
							</div>
							<div class="col-md-8 parrafo">
								<b>MATERIALES</b><br>
								Encuentra los materiales que necesites  para  construir 
								desde alguna mejora en casa hasta un rascacielos.
								<a href="<? echo base_url();?>registro">Compruébalo entrando ahora…</a>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="row">
							<div class="col-md-4">
								<img src="<? echo base_url();?>img/kuanto_servicios.png" alt="imagen" width="184px" height="184px">
							</div>
							<div class="col-md-8 parrafo">
								<b>SERVICIOS</b><br>
								Promociona tus servicios profesionales en el mercado de la construcción, 
								así como servicios conocidos como indirectos pero  indispensables en un presupuesto
								<a href="<? echo base_url();?>registro">Publica ahora , es gratis…</a>
							</div>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
				
				<div class="row">
					<div class="col-md-12">&nbsp;</div>
				</div>
				
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-5">
						<div class="row">
							<div class="col-md-4">
								<img src="<? echo base_url();?>img/kuanto_herrammientas.png" alt="imagen" width="184px" height="184px">
							</div>
							<div class="col-md-8 parrafo">
								<b>HERRAMIENTAS</b><br>
								Descubre las mas novedosas herramientas de  marcas
								reconocidas del mercado, a los mejores precios.
								<a href="<? echo base_url();?>registro">Regístrate en un paso…</a>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="row">
							<div class="col-md-4">
								<img src="<? echo base_url();?>img/kuanto_indirectos.png" alt="imagen" width="184px" height="184px">
							</div>
							<div class="col-md-8 parrafo">
								<b>ARTICULOS INDIRECTOS</b><br>
								Encuentra  productores, distribuidores  y detallistas
								de un sin numero de artículos de oficina, así como equipos y papelería.
								<a href="<? echo base_url();?>registro">Rápido y Fácilmente…</a>
							</div>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
				
				<div class="row">
					<div class="col-md-12">&nbsp;</div>
				</div>
		
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-5">
						<div class="row">
							<div class="col-md-4">
								<img src="<? echo base_url();?>img/kuanto_equipos.png" alt="imagen" width="184px" height="184px">
							</div>
							<div class="col-md-8 parrafo">
								<b>EQUIPO</b><br>
								Obtén acceso a los proveedores de equipos para la construcción de tu 
								localidad y proveedores de todo el mundo.
								<a href="<? echo base_url();?>registro">Creando una cuenta…</a>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="row">
							<div class="col-md-4">
								<img src="<? echo base_url();?>img/kuanto_maquinaria.png" alt="imagen" width="184px" height="184px">
							</div>
							<div class="col-md-8 parrafo">
								<b>MAQUINARIA</b><br>
								Encuentra la maquinaria que buscas en las mejores condiciones para tu proyecto.
								<a href="<? echo base_url();?>registro">En línea en todo momento…</a>
							</div>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" >&nbsp;</div>
		</div>
		<div class="row">
			<div class="col-md-12" >&nbsp;</div>
		</div>
		<footer>
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-2"><a href="#">Politicas de Privacidad</a></div>
				<div class="col-sm-2"><a href="#">Condiciones del Servicio</a></div>
				<div class="col-md-6" style="text-align:right;"><a href="#">@Copyright 2014 Teknocom S de RL de CV  All rights  Reserved.</a></div>
				<div class="col-sm-1"></div>
			</div>
			<div class="row">
				<div class="col-md-12" >&nbsp;</div>
			</div>
		</footer>

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

    </body>
</html>

