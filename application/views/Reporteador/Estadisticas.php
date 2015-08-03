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
                            <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-bar-chart-o"></i>
                                        <span>Administrador</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="<?php echo base_url(); ?>reporteador/getProducts" ><i class="fa fa-angle-double-right"></i> Articulos</a></li>
                                    <li><a href="<?php echo base_url(); ?>reporteador/getUsers"><i class="fa fa-angle-double-right"></i> Usuarios</a></li>
                                    <li><a href="<?php echo base_url(); ?>prospectos" ><i class="fa fa-angle-double-right"></i> Prospectos</a></li>
                                    <li class="active"><a href="<?php echo base_url(); ?>reporteador/estadisticas"><i class="fa fa-angle-double-right"></i> Estadisticas</a></li>
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
                        Reporteador
                        <small>Manejo de la aplicación</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Reporteador</a></li>
                        <li class="active">Estadisticas</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                   

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Line chart -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Ciudades por pais</h3>
                                </div>
                                <div class="box-body">
                                    <div id="line-chart" style="height: 400px;"></div>
                                </div><!-- /.box-body-->
                            </div><!-- /.box -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Area chart -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Articulos por ciudad</h3>
                                </div>
                                <div class="box-body">
                                    <div id="area-chart" style="height: 400px;" ></div>
                                </div><!-- /.box-body-->
                            </div><!-- /.box -->

                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Bar chart -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Usuarios registrados por ciudad</h3>
                                </div>
                                <div class="box-body">
                                    <div id="bar-chart" style="height: 300px;"></div>
                                </div><!-- /.box-body-->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Bar chart -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Prospectos por ciudad</h3>
                                </div>
                                <div class="box-body">
                                    <div id="xd-chart" style="height: 300px;"></div>
                                </div><!-- /.box-body-->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
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
		
		<!-- FLOT CHARTS -->
        <script src="<?php echo base_url();?>js/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
        <script src="<?php echo base_url();?>js/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
        <script src="<?php echo base_url();?>js/plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
        <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
        <script src="<?php echo base_url();?>js/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
		<!-- Page script -->
        <script type="text/javascript">

            $(function() {

               


                /*
                 * LINE CHART
                 * ----------
                 */
                //LINE randomly generated data

                var sin = [], cos = [];
                for (var i = 0; i < 14; i += 0.5) {
                    sin.push([i, Math.sin(i)]);
                    cos.push([i, Math.cos(i)]);
                }
                var line_data1 = {
                    data: sin,
                    color: "#3c8dbc"
                };
                var line_data2 = {
                    data: cos,
                    color: "#00c0ef"
                };
                $.plot("#line-chart", [line_data1, line_data2], {
                    grid: {
                        hoverable: true,
                        borderColor: "#f3f3f3",
                        borderWidth: 1,
                        tickColor: "#f3f3f3"
                    },
                    series: {
                        shadowSize: 0,
                        lines: {
                            show: true
                        },
                        points: {
                            show: true
                        }
                    },
                    lines: {
                        fill: false,
                        color: ["#3c8dbc", "#f56954"]
                    },
                    yaxis: {
                        show: true,
                    },
                    xaxis: {
                        show: true
                    }
                });
                //Initialize tooltip on hover
                $("<div class='tooltip-inner' id='line-chart-tooltip'></div>").css({
                    position: "absolute",
                    display: "none",
                    opacity: 0.8
                }).appendTo("body");
                $("#line-chart").bind("plothover", function(event, pos, item) {

                    if (item) {
                        var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);

                        $("#line-chart-tooltip").html(item.series.label + " of " + x + " = " + y)
                                .css({top: item.pageY + 5, left: item.pageX + 5})
                                .fadeIn(200);
                    } else {
                        $("#line-chart-tooltip").hide();
                    }

                });
                /* END LINE CHART */


                /*
                 * BAR CHART
                 * ---------                 
                 */

                <?php

                    
                    $x  = 0;
                    $valorx = mysql_num_rows($paises_ciudad);
                    echo 'var bar_datax = {
                             data: [';
                    while($filax = mysql_fetch_array($paises_ciudad)){
                        $x++;
                        if($x == $valorx ){
                           echo '["'.$filax["pa_nombre"].'", '.$filax["total"].']';
                        }else{
                           echo '["'.$filax["pa_nombre"].'", '.$filax["total"].'],'; 
                        }
                    }
                    echo '],
                        color: "#3c8dbc"};';
                    echo '$.plot("#line-chart", [bar_datax], {
                            grid: {
                                borderWidth: 1,
                                borderColor: "#f3f3f3",
                                tickColor: "#f3f3f3"
                            },
                            series: {
                                bars: {
                                    show: true,
                                    barWidth: 0.5,
                                    align: "center"
                                }
                            },
                            xaxis: {
                                mode: "categories",
                                tickLength: 0
                            }
                        });';



                    $i  = 0;
                    $valor = mysql_num_rows($usuarios_ciudad);
                    echo 'var bar_data = {
                             data: [';
                    while($fila = mysql_fetch_array($usuarios_ciudad)){
                        $i++;
                        if($i == $valor ){
                           echo '["'.$fila["city_nombre"].'", '.$fila["total"].']';
                        }else{
                           echo '["'.$fila["city_nombre"].'", '.$fila["total"].'],'; 
                        }
                    }
                    echo '],
                        color: "#3c8dbc"};';
                    echo '$.plot("#bar-chart", [bar_data], {
                            grid: {
                                borderWidth: 1,
                                borderColor: "#f3f3f3",
                                tickColor: "#f3f3f3"
                            },
                            series: {
                                bars: {
                                    show: true,
                                    barWidth: 0.5,
                                    align: "center"
                                }
                            },
                            xaxis: {
                                mode: "categories",
                                tickLength: 0
                            }
                        });';

                    $q = 0;
                    $valorq = mysql_num_rows($articulos_city);
                    echo 'var bar_dataq = {
                             data: [';
                    while($filaq = mysql_fetch_array($articulos_city)){
                        $q++;
                        if($q == $valorq ){
                           echo '["'.$filaq["city_nombre"].'", '.$filaq["total"].']';
                        }else{
                           echo '["'.$filaq["city_nombre"].'", '.$filaq["total"].'],'; 
                        }
                    }
                    echo '],
                        color: "#3c8dbc"};';
                    echo '$.plot("#area-chart", [bar_dataq], {
                            grid: {
                                borderWidth: 1,
                                borderColor: "#f3f3f3",
                                tickColor: "#f3f3f3"
                            },
                            series: {
                                bars: {
                                    show: true,
                                    barWidth: 0.5,
                                    align: "center"
                                }
                            },
                            xaxis: {
                                mode: "categories",
                                tickLength: 0
                            }
                        });';


                    $qx = 0;
                    $valorqx = mysql_num_rows($prospectos_city);
                    echo 'var bar_dataqx = {
                             data: [';
                    while($filaq = mysql_fetch_array($prospectos_city)){
                        $qx++;
                        if($qx == $valorqx ){
                           echo '["'.$filaq["city_nombre"].'", '.$filaq["total"].']';
                        }else{
                           echo '["'.$filaq["city_nombre"].'", '.$filaq["total"].'],'; 
                        }
                    }
                    echo '],
                        color: "#3c8dbc"};';
                    echo '$.plot("#xd-chart", [bar_dataqx], {
                            grid: {
                                borderWidth: 1,
                                borderColor: "#f3f3f3",
                                tickColor: "#f3f3f3"
                            },
                            series: {
                                bars: {
                                    show: true,
                                    barWidth: 0.5,
                                    align: "center"
                                }
                            },
                            xaxis: {
                                mode: "categories",
                                tickLength: 0
                            }
                        });';

                ?>

                /*var bar_data = {
                    data: [["January", 10], ["February", 8], ["March", 4], ["April", 13], ["May", 17], ["June", 9]],
                    color: "#3c8dbc"
                };*/

                

                /*
                 * DONUT CHART
                 * -----------
                 */

                var donutData = [
                    {label: "Series2", data: 30, color: "#3c8dbc"},
                    {label: "Series3", data: 20, color: "#0073b7"},
                    {label: "Series4", data: 50, color: "#00c0ef"}
                ];
                $.plot("#donut-chart", donutData, {
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            innerRadius: 0.5,
                            label: {
                                show: true,
                                radius: 2 / 3,
                                formatter: labelFormatter,
                                threshold: 0.1
                            }

                        }
                    },
                    legend: {
                        show: false
                    }
                });
                /*
                 * END DONUT CHART
                 */

            });

            /*
             * Custom Label formatter
             * ----------------------
             */
            function labelFormatter(label, series) {
                return "<div style='font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;'>"
                        + label
                        + "<br/>"
                        + Math.round(series.percent) + "%</div>";
            }
        </script>
    </body>
</html>

