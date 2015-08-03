<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'controllers/mensajes.php';
    
class Login extends Mensajes {

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index($blog = FALSE)
    {

        if($this->session->userdata('login_ok')){
            redirect('home/landPage', 'refresh');
        }else{
            $varBlog = 'NOBLOG';
            if($blog != false){
                $varBlog = 'BLOG';
            }
            $dat = array('blog' => $varBlog);
            $this->load->view('Login/Login_user_view', $dat);
        }
    }


    function logwraw()
    {
        /* @var $_POST type */
        if (isset($_POST['mail'])){
            $mail = $_POST['mail'];
            $ruta = $_POST['ruta'];
            $contrasena = md5($_POST['password']);
            $this->load->model('Autenticacion_Model');
            if ($this->Autenticacion_Model->verificaUsuario($mail, $contrasena)){
                    $row = $this->Autenticacion_Model->getdatosUsuario($mail);
                    $datasession=null;
                    while($fila = mysql_fetch_array($row)){
                        $datasession = array(
                                            'correo'  => $mail,
                                            'ciudad'  => $fila['emp_ciudad'],
                                            'nombres' => $fila['nombres'],
                                            'userId'  => $fila['emp_id'],
                                            'imagen'  => $fila['emp_imagen'],
                                            'tipo_user' => $fila['rol_descripcion'], 
                                            'codeuser'  => $fila['emp_user_code'],
                                            'fechaRegistro' => $fila['emp_fecha'],
                                            'identificacion' => $fila['emp_RFC'],
                                            'login_ok' => TRUE
                                            );	
                    }					
                    $this->session->set_userdata($datasession);
                    if( $ruta == 'BLOG'){
                        redirect('blog', 'refresh');
                    }else{
                        redirect('home/landPage', 'refresh');
                    }
                   
            } else {
                    //$this->session->set_flashdata('error', 'El usuario o contraseña son incorrectos.');
                    //return "NO";2
                    $data = array("blog" =>  $_POST['ruta'], "mail"=> $_POST['mail'], "password"=> $_POST['password'], "MSG" =>"Ups!! Mail y/o Password incorrecto" );
                    $this->load->view('Login/Login_user_view', $data);
            }
        } else {
            //$this->load->view('Login/Login_user_view');
        }
    }

    public function salir(){
        $this->session->sess_destroy();
        //redirect('Home', 'refresh');
        header("Location: http://kuanto.info");
    }

    public function recuperarPassword(){
        $mail = $_POST['mail']; 
        $final = explode('@', $mail);

        $email_subject = "Solicitud de cambio de contraseña";
        
        $email_message = "Por favor  has click en el siguiente enlace, en el podras modificar tus credenciales de acceso al sitio \n";
        $email_message .= "   Has click en el siguiente enlace (si no abre automaticamente, solo copialo y pegalo en tu navegador) \n ";
        $email_message .= "http://kuanto.info/login/modificar/".$final[0]."/".$final[1]." \n";
        $email_message .= "Esperamos la estes pasando bien y disfrutes de tu comunidad de construccion http://kuanto.info ... \n";
        $email_message .= "Atentamente \n";
        $email_message .= "Teknocom S de RL de CV.\n";


        $this->EnvioMensajesal($mail, $email_subject, $email_message);
        redirect('login', 'refresh');
    }

    public function modificar($mail, $proxi){
        $datos = array('email' => $mail."@".$proxi);
        return $this->load->view('Login/changePassword', $datos);
    }

    public function recuperarPasss(){
        $mail = $_POST['mail'];
        $this->load->model('Autenticacion_Model');
        $password  = $_POST['password'];
        //echo $mail;
        $row = $this->Autenticacion_Model->getdatosUsuario($mail);
        while($fila = mysql_fetch_array($row)){
            //echo $fila['emp_id'];
            $this->load->model('Users_Model');
            $datos = array( 'emp_password' => md5($password));
            if($this->Users_Model->updateUsers($datos, $fila['emp_id'])){
                $data = array("mail"=>  $mail, "MSG2" =>"Felicitaciones, tu contraseña se ha modificado exitosamente!!!" );
                $this->load->view('Login/Login_user_view', $data);
            }
               
        }

    }
}
?>