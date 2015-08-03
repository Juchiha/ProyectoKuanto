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
        <link href="<?PHP echo base_url(); ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
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
    <body>
        <form action="<?php echo base_url();?>registro/validarCode" method="POST" id="enviodatos">
            <div class="form-box" id="login-box">
                <div class="header">Verificación</div>
               
                <div class="body bg-gray">
                    <input type="hidden" id="correo" name="correo" value="<?php echo $mail; ?>"/>
                    <input type="hidden" id="server" name="server" value="<?php echo $server; ?>"/>
                    <div class="form-group">
                        <input type="text" name="valida" id ="validar" value="<?php if(isset($code)){ echo $code; } ?>" class="form-control" placeholder="Codigo de verificación" required/>
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" id="envioDatosBtn" class="btn bg-olive btn-block">Adelante</button>  
                </div>
            </div>
         </form>


        <!-- jQuery 2.0.2 -->
        <script src="<?PHP echo base_url(); ?>js/Jquery2.1.js"></script>
        <!-- Bootstrap -->
        <script src="<?PHP echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>     
        <script src="<?php echo base_url();?>js/jquery.validate.js"></script>
        <script src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url();?>js/alertify.js"></script>
        <script type="text/javascript">
            $.validator.setDefaults({
                submitHandler: function() { 
                     $("#enviodatos").submit();
                }
            });
            $(function(){

               /* $("#envioDatosBtn").click(function(){
                    
                    $.ajax({
                        url   : "<?php echo base_url();?>registro/validarCode",
                        type  : "POST",
                        data  : {correo :$("#correo").val(), server : $("#server").val(), valida : $("#validar").val()},
                        success : function(data){
                            alert(data);
                        }
                    });
                }); */
               <?php 
                if(isset($MSG)){
               ?>
                  alertify.error("<?php echo $MSG; ?>");     
               <?php        
                }
               ?>
            });
        </script>

    </body>
</html>
