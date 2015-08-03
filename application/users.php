<?php
class Users extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function perfil($id){
        if($this->session->userdata('login_ok')){
            $this->load->model('Users_Model');
            $row = $this->Users_Model->getUsersById($id);
            $paisak = null;
            while($pa =mysql_fetch_array($row)){
		$paisak = $pa['emp_pais'];
            }
	   // echo $row;
	    $row = $this->Users_Model->getUsersById($id);
	    $paises = $this->Users_Model->getPaises();
            $ciudad = $this->Users_Model->getCiudad($paisak);
            $datosPage = Array('datosArray' => $row, 'paises' => $paises, 'ciudades' => $ciudad);
            $this->load->view('Users/user_view',$datosPage);
       }else{ 
            $this->load->view('Login_user_view');
        }
    }

    function editarDatos(){
	$idUser = $_POST['idUser'];
	$imagen = $_POST['imagen'];	
	$target_path = "/opt/lampp/htdocs/kuantoInfo/Images/Articulos/";
        $target_path = $target_path . 'User_'.$idUser."_".basename($_FILES['imgInsumo']['name']); 

        copy($_FILES['imgInsumo']['tmp_name'], $target_path);
        $fileName =  'Articulo_'.$_SESSION['USERID']."_".basename($_FILES['imgInsumo']['name']);

	if($fileName == null){
           $fileName = $imagen;
        }
            
	$datos = array(
		'emp_nombre' => $_POST['nombre'],
		'emp_apellido' => $_POST['apellidos'],
		'emp_RFC' => $_POST['rfc'],
		'emp_pais' => $_POST['pais'],
		'emp_ciudad' => $_POST['ciudad'],
	        'emp_imagen' => $fileName	
		);

	$this->load->model('Users_Model');
	if($this->Users_Model->updateUsers($datos, $idUser)){
	   $this->perfil($idUser);
	}else{
	   echo "nada";
	}

    }
}
?>
