<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>KUANTO.INFO | Registro</title>
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
            <div class="header">Registrar nuevo usuario</div>
            <form action="<?php echo base_url();?>registro/registrar_users" method="post" id="formRegistro">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombres" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Apellidos" required/>
                    </div>
                    <div class="form-group">
                        <select id="pais" name="pais" class="form-control" required>
                                <option value=0>Seleccione su pais de residencia</option>
                       <?php while($data = mysql_fetch_array($datos)){?>
                               <option value="<?php echo $data['pa_id'];?>"><?php echo $data['pa_nombre'];?></option>		
                       <?php }?>
                       </select>
                    </div>
                    <div class="form-group">
                        <select id="ciudad" name="ciudad" class="form-control" required>
                                <option>Seleccione su ciudad</option>
                       </select>
                    </div>
                    <div class="form-group">
                        <input type="email" name="mail" id="mail" class="form-control" placeholder="Mail" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password2" id="password2" class="form-control" placeholder="Repite password"/>
                    </div>
                    <div class="form-group">
                        <label><input type="checkbox" required> Acepto las <a style="cursor:pointer;" class="popup" ref="<?php echo base_url();?>home/politicas">Politicas </a> y <a style="cursor:pointer;" class="popup" ref="<?php echo base_url();?>home/condiciones">Condiciones del Sitio</a></label>
                    </div>
                </div>
                <div class="footer">                    

                    <button type="submit" class="btn bg-olive btn-block">Registrarme!!</button>

                    <a href="<?php echo base_url();?>login" class="text-center">Ya soy usuario</a>
                </div>
            </form>

            <div class="margin text-center">
                <span>Registrarme con mis redes sociales</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="<?PHP echo base_url(); ?>js/Jquery2.1.js"></script>
        <!-- Bootstrap -->
        <script src="<?PHP echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>js/jquery.validate.js"></script>
        <script src="<?php echo base_url();?>js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url();?>js/alertify.js"></script>
        <script src="<?php echo base_url();?>js/analitics.js"></script>
        <script type="text/javascript">
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
            });
            
            $.validator.setDefaults({
                submitHandler: function() { 
                    $("#formRegistro").submit();
                }
            });

            <?php if(isset($error)){?>
                alertify.error('<?php echo $error; ?>');
            <?php } ?>
        </script>
         <script type="text/javascript">
            $(function(){
                $(".popup").click(function(){
                    window.open($(this).attr('ref'),'Kuanto.info','scrollbars=1,width=1000, height=600');
                });
            });
        </script>
    </body>
</html>
