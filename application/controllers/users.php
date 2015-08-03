<?php if ( ! defined('BASEPATH'))exit('No direct script access allowed');
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
            redirect('login', 'refresh');
        }
    }

    function editarDatos(){
    	$idUser = $_POST['idUser'];
    	$imagen = $_POST['imagen'];	
    	$target_path = "/home/kefrensantiago/public_html/Images/users/";
        $target_path = $target_path . 'User_'.$idUser."_".basename($_FILES['imgInsumo']['name']); 
        $target_path = str_replace(' ', '', $target_path);

        
        copy($_FILES['imgInsumo']['tmp_name'], $target_path);
        $fileName =  'User_'.$idUser."_".basename($_FILES['imgInsumo']['name']);
        $fileName = str_replace(' ', '', $fileName);

    	if($fileName == null){
               $fileName = $imagen;
            }
                
    	$datos = array(
    			'emp_nombre' => $_POST['nombre'],
    			'emp_apellido' => $_POST['apellidos'],
    			'emp_RFC' => $_POST['rfc'],
                'emp_direccion_f' => $_POST['emp_direFiscal'],
    			'emp_pais' => $_POST['pais'],
    			'emp_ciudad' => $_POST['ciudad'],
    	        'emp_imagen' => $fileName,
                'emp_razon_social' => $_POST['razonsoc'],
                'emp_telefono' => $_POST['emp_telefono']
    		);

    	$this->load->model('Users_Model');
    	if($this->Users_Model->updateUsers($datos, $idUser)){
    	   $this->perfil($idUser);
    	}else{
    	   echo "nada";
    	}

    }

    function activarTienda($id){
        
        $this->load->model('Users_Model');
        $datos = array('emp_tienda' => 1);
        
        if($this->Users_Model->updateUsers($datos, $id)){
            echo "ACTIVO";
        }else{
            echo "NOACTIVO";
        }
    }

    function desactivarTienda($id){
        
        $this->load->model('Users_Model');
        $datos = array('emp_tienda' => 2);
        
        if($this->Users_Model->updateUsers($datos, $id)){
            echo "ACTIVO";
        }else{
            echo "NOACTIVO";
        }
    }

    function desactivarUsuario($id){
        
        $this->load->model('Users_Model');
        $datos = array('emp_estado_id' => 2);
        
        if($this->Users_Model->updateUsers($datos, $id)){
            echo "borrado";
        }else{
            echo "noborrado";
        }
    }
}
?>
