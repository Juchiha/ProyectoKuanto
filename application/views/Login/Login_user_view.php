<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>KUANTO.INFO | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?PHP echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?PHP echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?PHP echo base_url(); ?>css/AdminLTEBody.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>css/alertify.core.css" rel="stylesheet"/>
        <link href="<?php echo base_url(); ?>css/alertify.default.css" rel="stylesheet"/>
        <link rel="shortcut icon" href="<?php echo base_url();?>img/k_icon1.png"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body style="background-color:#428bca;">

        <div class="form-box" id="login-box">
            <div class="header">ENTRAR</div>
            <form action="<?PHP echo base_url(); ?>login/logwraw" method="post" id="formLogin">
                <input type="hidden" name="ruta" value="<?php if(isset($blog)){ echo $blog;}else{ echo 'normal';}?>">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="email" name="mail" value="<?php if(isset($mail)){ echo $mail; } ?>" class="form-control" placeholder="Mail" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" value="<?php if(isset($password)){ echo $password; }?>" class="form-control" placeholder="Password" required/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Recuerdame
                    </div>

                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Adelante</button>  
                    
                    <p><a href="#" data-target="#recuperar-modal"  data-toggle="modal">Olvide mi contrase&ntilde;a</a></p>
                    
                    <a href="<?PHP echo base_url(); ?>registro" class="text-center">Registrarse</a>
                </div>
            </form>

            <div style="color:#FFFFFF;" class="margin text-center">
                <span>Entrar usando tus cuentas de</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>
        <div class="modal fade" id="recuperar-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="recpass" action="<?php echo base_url();?>login/recuperarPassword" method="POST">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-bullhorn"></i> Recuperar Contraseña </h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="email" name="mail" class="form-control" placeholder="Correo" required/>
                            </div>
                        </div>
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                            <button type="submit" class="btn btn-submit"><i class="fa fa-times"></i> Enviar</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->   


        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url(); ?>js/Jquery2.1.js"></script>
        <!--Bootstrap -->
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>   
        <script src="<?php echo base_url();?>js/jquery.validate.js"></script>
        <script src="<?php echo base_url();?>js/alertify.js"></script>
        <script type="text/javascript">
            $.validator.setDefaults({
                submitHandler: function() { 
                     $("#formLogin").submit();
                }
            });
            $(function(){
               <?php 
                if(isset($MSG)){
               ?>
                  alertify.error("<?php echo $MSG; ?>");     
               <?php        
                }else if(isset($MSG2)){

               ?>
                  alertify.success("<?php echo $MSG2; ?>");     
               <?php    
                }
               ?>
            });
        </script>
    </body>
</html>
