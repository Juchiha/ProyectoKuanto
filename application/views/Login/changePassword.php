<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>KUANTO.INFO | Recuperar Contraseña</title>
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
    <body background="<?php echo base_url();?>img/kuantocecut1.jpg" style="background-attachment: fixed">

        <div class="form-box" id="login-box">
            <div class="header">Recuperar Contraseña</div>
            <form action="<?PHP echo base_url(); ?>login/recuperarPasss" method="post" id="formLogin">
                <input type="hidden" name="mail" value="<?php echo $email;?>">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="password" name="password" value="<?php if(isset($password)){ echo $password; }?>" class="form-control" placeholder="Contraseña" required/>
                    </div>     
                    <div class="form-group">|
                        <input type="password" name="passwordt" value="<?php if(isset($password)){ echo $password; }?>" class="form-control" placeholder="Repite la Contraseña" required/>
                    </div>          
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Modificar Contraseña</button>  
                </div>
            </form>
        </div>


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
