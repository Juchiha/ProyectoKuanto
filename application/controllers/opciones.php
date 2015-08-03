<?php if ( ! defined('BASEPATH'))exit('No direct script access allowed');
require_once APPPATH.'controllers/registro.php';

class Opciones extends Registro{
	
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
    	 $this->load->model('Users_Model');
    	 $row = $this->Users_Model->getPaises();
    	 $data  = array('paises' =>  $row );
    	 $this->load->view('Opciones/paises', $data);
    }

    public function getcity($idPais){
    	$this->load->model('Users_Model');
    	$row = $this->Users_Model->getCiudad($idPais);
    	$data  = array('paises' =>  $row, 'idpais' => $idPais );
    	$this->load->view('Opciones/ciudades', $data);
    }

    public function editar(){
        $id = $_POST['idPais'];
        $nombre = $_POST['nombre'];
        $array = array('pa_nombre' => $nombre);
        $this->load->model('Users_Model');
        if($this->Users_Model->updatepais($array, $id)){
            redirect('opciones', 'refresh');
        }else{
            echo 'A ocurrido un error';
        }

    }

    public function eliminar($id){
        $array = array('pa_estado' => 2);
        $this->load->model('Users_Model');
        if($this->Users_Model->updatepais($array, $id)){
            redirect('opciones', 'refresh');
        }else{
            echo 'A ocurrido un error';
        }

    }

    public function createPais(){
        $datos = array('pa_nombre' => $_POST['nombre'], 'pa_estado' => 1);
        $this->load->model('Users_Model');
        if($this->Users_Model->createPais($datos)){
            redirect('opciones', 'refresh');
        }else{
            echo 'A ocurrido un error';
        }
    }


    function getUltimoCode(){
        $Lsql = mysql_query("select MAX(city_codigo) as maximo from mp_ciudades");
        $maximo = 0;
        while($row= mysql_fetch_array($Lsql)){
            $maximo = ($row['maximo'] + 1);

        }

        if(mb_strlen($maximo) == 1){
            $maximo = "00".$maximo;
        }else if(mb_strlen($maximo) == 2){
            $maximo = "0".$maximo;
        }

        return $maximo;
    }

    public function createCiudad(){
        $cosde = $this->getUltimoCode();
        $pais = $_POST['idPais'];
        $datos = array('city_nombre' => $_POST['nombre'], 'city_codigo' => $cosde ,'city_estado' => 1, 'city_pais_id' => $pais);
        $this->load->model('Users_Model');
        if($this->Users_Model->createCity($datos)){
           redirect ('opciones/getcity/'.$pais, 'refresh');
        }else{
            echo 'A ocurrido un error';
        }
    }

    public function editarcity(){
        
        $id = $_POST['idcity'];
        $idpais = $_POST['idPais']; 
        $nombre = $_POST['nombre'];
        $array = array('city_nombre' => $nombre);
        $this->load->model('Users_Model');
        if($this->Users_Model->updatecity($array, $id)){
           redirect ('opciones/getcity/'.$idpais, 'refresh');

        }else{
            echo 'A ocurrido un error';
        }

    }

    public function eliminarcity($id, $idpais){
        $array = array('city_estado' => 2);
        $this->load->model('Users_Model');
        if($this->Users_Model->updatecity($array, $id)){
           redirect ('opciones/getcity/'.$idpais, 'refresh');
        }else{
            echo 'A ocurrido un error';
        }

    }

    public function getAdmins($cityId){
        $this->load->model('Users_Model');
        $row = $this->Users_Model->getadminCity($cityId);
        $pais = $this->Users_Model->getCiudadbyId($cityId);
        $numrow = mysql_num_rows($this->Users_Model->getadminCity($cityId));

        $data = array('admin' => $row, 'rows' => $numrow, 'ciudad' => $cityId, 'pais' => $pais);
        return $this->load->view('Opciones/adminUsers',$data);
    }

    public function createAdmins(){
        $usercode = $this->getEmp_user_code($_POST['ciudad']);
        $verificacion  = $this->RandomString(8, true, true);
        $correo = $_POST['email'];
        $val = $this->esUser($correo);
        $this->load->model('Users_Model');

        if($val == "FALSE"){
            $this->load->helper('date');
            $datestring = "%Y-%m-%d";
            $dring = mdate($datestring);

            $datos = array(
                        'emp_nombre' => $_POST['nombre'],
                        'emp_apellido' => $_POST['apellidos'],
                        'emp_correo' => $_POST['email'],
                        'emp_password' => md5('123456'),
                        'emp_telefono' => $_POST['telefono'],
                        'emp_ciudad' => $_POST['ciudad'],
                        'emp_pais'  => $_POST['pais'],
                        'emp_RFC' => $_POST['rfc'],
                        'emp_fecha'   => $dring,
                        'emp_user_code' => '0001',
                        'emp_rol_usuario' => 2,
                        'emp_imagen' => 'nofoto.jpg',
                        'emp_estado_id' => 1,
                        'emp_segure_code' => $verificacion
                    );

              
            if($this->Users_Model->insertUsers($datos)){
                $final = explode('@', $correo);

                $email_subject = "Bienvenido a Kuanto.info";
                
                $email_message = "Bienvenido \n";
                $email_message .= "Esperamos la pases bien y disfrutes de tu comunidad de construccion http://kuanto.info ... \n";
                $email_message .= "Atentamente \n";
                $email_message .= "Teknocom S de RL de CV.\n";

                $this->EnvioMensajesal($correo, $email_subject, $email_message);
                redirect ('opciones/getAdmins/'.$_POST['ciudad'], 'refresh');
            }else{
                $row = $this->Users_Model->getadminCity($cityId);
                $pais = $this->Users_Model->getCiudadbyId($cityId);
                $numrow = mysql_num_rows($this->Users_Model->getadminCity($cityId));

                $data = array('admin' => $row, 'rows' => $numrow, 'ciudad' => $cityId, 'pais' => $pais);
                $this->load->view('Opciones/adminUsers', $data);
            }
        }else{
            $data = array('adminError' => 'Este correo ya esta registrado');
            $this->load->view('Opciones/adminUsers', $data);
        }
    }
}
?>