<?php if ( ! defined('BASEPATH'))exit('No direct script access allowed');
class Mensajes extends CI_Controller{
	
    public function __construct()
    {
        parent::__construct();
    }

    function createMensajes(){
        $mail = $_POST['email_to'];
        $subject = $_POST['subject'];
        $message = $_POST['mensaje'];
    	$this->load->Model('mensajes_model');
    	$this->load->helper('date');
        $datestring = "%Y-%m-%d %H-%s-%i";
        $dring = mdate($datestring);
    	$array = array('men_remitente_id' => $this->session->userdata('userId'),
    				   'men_destino_id'   => $_POST['destinatario'],
    				   'men_subject'	  => $subject,
    				   'men_descripcion'  => $message,
    				   'men_fecha'		  => $dring,
    				   'men_estado'		  => 'NOLEIDO');
    	if($this->mensajes_model->insert($array)){
            $this->EnvioMensajesal($mail, $subject, $message);
    		redirect ("Reporteador/getUsers");
    	}else{
    		echo "No pude ennviar el mensaje";
    	}
    }


    function createMensajesAdmin(){

        $admin = $this->getAdmin($this->session->userdata('ciudad'));
        $correo = $this->getmailAdmin($admin);
       
        $subject = $_POST['subject'];
        $message = $_POST['mensaje'];
        $this->load->Model('mensajes_model');
        $this->load->helper('date');
        $datestring = "%Y-%m-%d %H-%s-%i";
        $dring = mdate($datestring);
        $array = array('men_remitente_id' => $this->session->userdata('userId'),
                       'men_destino_id'   => $admin,
                       'men_subject'      => $subject,
                       'men_descripcion'  => $message,
                       'men_fecha'        => $dring,
                       'men_estado'       => 'NOLEIDO');
        if($this->mensajes_model->insert($array)){
            echo "Tu mensaje a sido enviado con éxito";
        }else{
            echo "No he enviado tu mensaje";
        }
    }

    function getAdmin($city){
        $Lsql = "select emp_id from mp_empresa where emp_user_code = '0001' AND emp_ciudad = ".$city;
        $row = mysql_query($Lsql);
        $code = 0;
        while($fila = mysql_fetch_array($row)){
            $code = $fila['emp_id'];
        }
        return $code;
    }

    function getmailAdmin($adminId){
        $Lsql = "select emp_correo from mp_empresa where emp_id = ".$adminId;
        $row = mysql_query($Lsql);
        $code = 0;
        while($fila = mysql_fetch_array($row)){
            $code = $fila['emp_correo'];
        }
        return $code;
    }

    function EnvioMensajes(){

        $mail = $_POST['email_to'];
        $email_subject = $_POST['email_cc'];
        $email_message = $_POST['message'];
    
        
        $email_to = $mail;
        //modificar por el correo desde donde se envia
        $email_from = "kuanto@kuanto.info";

        // Ahora se envía el e-mail usando la función mail() de PHP
        $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);
        redirect ("Reporteador/mensagero");
    }

    function EnvioMensajesProspectosIndividual(){

        $mail = $_POST['email_to'];
        $email_subject = $_POST['email_cc'];
        $email_message = $_POST['message'];
    
        
        $email_to = $mail;
        //modificar por el correo desde donde se envia
        $email_from = "kuanto@kuanto.info";

        // Ahora se envía el e-mail usando la función mail() de PHP
        $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);
        echo "Mensaje Enviado";
        
    }

    function EnvioMensajesProspectosIndividualEfren(){

        $mail = $_POST['email_to'];
        $email_subject = $_POST['email_cc'];
        $email_message = $_POST['message'];
    
        
        $email_to = $mail;
        //modificar por el correo desde donde se envia
        $email_from = "construccion@kuanto.info";

        // Ahora se envía el e-mail usando la función mail() de PHP
        $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);
        echo "Mensaje Enviado";
        
    }

    function EnvioMensajesal( $mail, $email_subject,$email_message  ){
    
        
        $email_to = $mail;
        //modificar por el correo desde donde se envia
        $email_from = "notificaciones@kuanto.info";

        // Ahora se envía el e-mail usando la función mail() de PHP
        $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);
    }

    function EnvioMensajesalEfren( $mail, $email_subject,$email_message  ){
    
        
        $email_to = $mail;
        //modificar por el correo desde donde se envia
        $email_from = "construccion@kuanto.info";

        // Ahora se envía el e-mail usando la función mail() de PHP
        $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);
    }
}


?>
