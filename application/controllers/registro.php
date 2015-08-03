<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'controllers/mensajes.php';

class Registro extends Mensajes{
	
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index(){
        $this->load->model("Paises_model");
        $datos = $this->Paises_model->getPaises();
        $datos_enviados = array("datos" => $datos);
        $this->load->view('Registro/Registro_user_view', $datos_enviados);
    }
		
		
    function getCiudades(){
        $this->load->model("Paises_model");
        $row = $_POST['paisId'];
        $datos = $this->Paises_model->getCiudades($row);
        $datosVista = Array("datosCiudad" => $datos);
        $this->load->view("Registro/ciudad_combo_PartialView", $datosVista);
    }

    function getEmp_user_code($city){
        $Lsql = "Select MAX(emp_user_code) as maximo from mp_empresa where emp_ciudad = ".$city;
        
        $row = mysql_query($Lsql);
        $res =null;
        if(mysql_num_rows($row) != 0){
            while($result = mysql_fetch_array($row)){
                $res = ($result['maximo'] + 1);
            }    
        }else{
            $res = '0001';
        }
        

        if(mb_strlen($res) == 1){
            $res = "000".$res;
        }else if(mb_strlen($res) == 2){
            $res = "00".$res;
        }else if(mb_strlen($res) == 3){
            $res = "0".$res;
        } 

        //echo $res;
        return $res; 
    }
		
    function esUser($correo){
        $this->load->model('Users_Model');
        $res = $this->Users_Model->getdatosUsuarioMail($correo);
        $count = 0;
        $tod = "FALSE";
        while ($fila = mysql_fetch_array($res)) {
            if($fila['total'] > 0){
                $tod = 'TRUE';
            }
        }
        return $tod;
    }

    function registrar_users(){
        $usercode = $this->getEmp_user_code($_POST['ciudad']);
        $verificacion  = $this->RandomString(8, true, true);
        $correo = $_POST['mail'];
        $this->load->model('Users_Model');
        $val = $this->esUser($correo);
        if($val == "FALSE"){
            $this->load->helper('date');
            $datestring = "%Y-%m-%d";
            $dring = mdate($datestring);
            
            $datos = array(
                    'emp_nombre' => $_POST['name'],
                    'emp_apellido' => $_POST['lastname'],
                    'emp_correo' => $correo,
                    'emp_password' => md5($_POST['password']),
                    'emp_pais' => $_POST['pais'],
                    'emp_ciudad' => $_POST['ciudad'],
                    'emp_user_code' => $usercode,
                    'emp_fecha'   => $dring,
                    'emp_rol_usuario' => 1,
                    'emp_imagen' => 'nofoto.jpg',
                    'emp_estado_id' => 3,
                    'emp_segure_code' => $verificacion
            );

            
            if($this->Users_Model->insertUsers($datos)){

                $final = explode('@', $correo);

                $email_subject = "Bienvenido a Kuanto.info";
                
                $email_message = "Felicidades!!!  \n";
                $email_message .= "Estas a punto de completar tu registro, por favor: \n";
                $email_message .= "   1. Has click en el siguiente enlace (si no abre automaticamente, solo copialo y pegalo en tu navegador) \n ";
                $email_message .= "http://kuanto.info/registro/validaregistro/".$final[0]."/".$final[1]."/".$verificacion." \n";
                $email_message .= "   2. Ingresa a tu cuenta usando tu correo y el pasword proporcionado. \n";
                $email_message .= "Bienvenido \n";
                $email_message .= "Esperamos la pases bien y disfrutes de tu comunidad de construccion http://kuanto.info ... \n";
                $email_message .= "Atentamente \n";
                $email_message .= "Teknocom S de RL de CV.\n";


                $this->EnvioMensajesal($correo, $email_subject, $email_message);
                redirect('login', 'refresh');
            }else{
                $this->load->view('Registro/Registro_user_view', $datos);
            }

        }else{
            $this->load->model("Paises_model");
            $dat = $this->Paises_model->getPaises();
            $datos = array(
                    'emp_nombre' => $_POST['name'],
                    'emp_apellido' => $_POST['lastname'],
                    'emp_correo' => $correo,
                    'emp_password' => md5($_POST['password']),
                    'emp_pais' => $_POST['pais'],
                    'emp_ciudad' => $_POST['ciudad'],
                    'error' => 'este correo ya esta registrado!!',
                    "datos" => $dat
            );

            $this->load->view('Registro/Registro_user_view', $datos);
        }       
    }

    function RandomString($length=8,$uc=TRUE,$n=TRUE)
    {
        $source = 'abcdefghijklmnopqrstuvwxyz';
        if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if($n==1) $source .= '1234567890';
        if($length>0){
            $rstr = "";
            $source = str_split($source,1);
            for($i=1; $i<=$length; $i++){
                mt_srand((double)microtime() * 1000000);
                $num = mt_rand(1,count($source));
                $rstr .= $source[$num-1];
            }
     
        }
        return $rstr;
    }


    function validaregistro($mail, $proxi, $verificacion){
        //$data = array('mail' => $mail, "server" => $proxi);
        //return $this->load->view('Registro/validaregistro', $data);
        $this->load->model('Users_Model');
       
        $validar = $verificacion;
        $email = $mail;
        $server = $proxi;
        $email = $email . "@" . $server;

        $res = $this->Users_Model->getdatosUsuarioMail2($email);
        
        if(mysql_num_rows($res) != 0){
           
            $row = $this->Users_Model->getdatosUsuario($validar);
            if(mysql_num_rows($row) != 0){
                while ($fila = mysql_fetch_array($row)) {
                    $array = array ('emp_estado_id' => 1);
                    if($this->Users_Model->updateUsers($array, $fila['emp_id'])){
                        $data = array("mail"=>  $email, "MSG2" =>"Felicitaciones ya puedes ingresar a nuestra plataforma!!!" );
                        $this->load->view('Login/Login_user_view', $data);
                    }else{
                        echo 'no se pudo';
                    }
                }
            }
        }
    }


    function validarCode(){
        $validar = $_POST['valida'];
        $email = $_POST['correo'];
        $server = $_POST['server'];
        $email = $email . "@" . $server;
        //echo 'hay registros => '.$email." ".$validar;

        $this->load->model('Users_Model');
        $res = $this->Users_Model->getdatosUsuarioMail2($email);

        if(mysql_num_rows($res) != 0){
           
            $row = $this->Users_Model->getdatosUsuario($validar);
            if(mysql_num_rows($row) != 0){
                while ($fila = mysql_fetch_array($row)) {
                    $array = array ('emp_estado_id' => 1);
                    if($this->Users_Model->updateUsers($array, $fila['emp_id'])){
                        $data = array("mail"=>  $email, "MSG2" =>"Felicitaciones ya puedes ingresar a nuestra plataforma!!!" );
                        $this->load->view('Login/Login_user_view', $data);
                    }else{
                        echo 'no se pudo';
                    }
                }
            }else{
                $data = array("code" => $validar,  "server" => $server, 'mail' => $email, "MSG" =>"Ups!! codigo incorrecto" );
                return $this->load->view('Registro/validaregistro', $data);
            }
        }else{
            $data = array("code" => $validar, "server" => $server , 'mail' => $email, "MSG" => "Ups!!, correo incorrecto!!" );
            return $this->load->view('Registro/validaregistro', $data);
        }
        
    }
	
}
?>
