<link href='//fonts.googleapis.com/css?family=Sansita+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<header class="header">
    <a href="<?php echo base_url();?>home/landpage" class="logo" style="font-family: 'Sansita One', cursive; font-size:21px;">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        <img src="<?php echo base_url();?>img/k40.png" alt="Kuanto.info" style="margin-top: -12px;"> Kuanto.info
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                  <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu" id="notificcaiones">
                    <!-- aqui las notificaciones -->
                </li>

                <li class="dropdown messages-menu" id="mensajes">
                    <!-- aqui los mensajes -->
                    
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" title="Necesitas ayuda"  data-target="#email-modal-propioq" data-toggle="modal">
                        <i class="fa fa-question-circle"></i>
                        <span class="label label-danger">?</span>
                    </a>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?php echo $this->session->userdata('nombres'); ?><i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="<?php echo base_url(); ?>Images/users/<?php echo $this->session->userdata("imagen"); ?>" class="img-circle" alt="User Image" />
                            <p>
                                <?php echo $this->session->userdata('correo'); ?>
                                <?php 
                                    $fecha = $this->session->userdata('fechaRegistro');
                                    $meses = array('Ene', 'Feb', 'marzo', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic');
                                    $otra = explode('-',$fecha);
                                    $num = $otra[1] - 1;
                                   
                                    echo "<small>Miembro desde ". $meses[$num]." ". $otra[0]."</small>";
                                ?>
                                
                            </p>
                        </li>
                        <!-- Menu Body -->
                       <!-- <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>-->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url();?>users/perfil/<?php echo $this->session->userdata('userId');?>" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url(); ?>login/salir" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div class="modal fade" id="email-modal-propioq" tabindex="-1" role="dialog" aria-hidden="true">
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

                    <button type="button" id="envioMensaje" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Enviar Mensaje</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   

<script>
	$(function(){
		$.ajax({
			url : '<?php echo base_url();?>cotizaciones/mensages',
			type: 'POST',
			success: function(data){
				$("#mensajes").html(data);
			}
		});

        $.ajax({
            url : '<?php echo base_url();?>blog/getNotificaciones',
            type: 'POST',
            success: function(data){
                $("#notificcaiones").html(data);
            }
        });

	});
</script>

