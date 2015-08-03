<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'controllers/mensajes.php';

/**o
 * Description of reporteador
 *
 * @author JOSE
 */
class Prospectos extends Mensajes {
    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Prospectos_model');
    }
    
    function index(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
			
			$row = null;
			if($this->session->userdata('tipo_user') == "Direccion"){
				$row = $this->Prospectos_model->getProspectos();
				$codigo = $this->getcityCode();

				$this->load->model('Users_Model');
    			$rowse = $this->Users_Model->getCiudades();


				$datos = array('prospectos' => $row, 'ciudad' => $codigo , "ciudades" => $rowse);
	            $this->load->view('Prospectos/Prospectos_view2', $datos);
			}else{
				$row = $this->Prospectos_model->getProspectosByusers($this->session->userdata('userId'));
				$codigo = $this->getcityCode();
				$datos = array('prospectos' => $row, 'ciudad' => $codigo);
	            $this->load->view('Prospectos/Prospectos_view', $datos);
			}
			
        }
    }
    
    function create(){
		if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->view('Prospectos/create');
        }	
	}
	
	function createProspecto(){
		
		$id = $this->session->userdata('userId');
		$this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $dring = mdate($datestring);
        
        
		$datos =array(
				'pro_nombres'   	=> $_POST['name'],
				'pro_apellidos' 	=> $_POST['lastname'],
				'pro_cargo'			=> $_POST['txtCargo'],
				'pro_correo'    	=> $_POST['mail'],
				'pro_telefono'  	=> $_POST['telefono'],
				'pro_fecha'     	=> $dring,
				'pro_estado_id' 	=> 1,
				'pro_empresa'		=> $_POST['empresa'],
				'pro_tipo_empresa'  => $_POST['tipoEmpresa'],
				'pro_id_agregado'   => $id
		);
		
		
		if($this->Prospectos_model->insertUsers($datos)){
			redirect ('prospectos/index', 'refresh');
		}else{
			$datosvista = array('datos' => $datos, 'error' => 'a ocurrido un error, durante la operacion vuelve a intentarlo');
			$this->load->view('Prospectos/create', $datosvista);
		}
		
	}

	function edit($id){
		if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
        	$row = $this->Prospectos_model->getProspectosbyId($id);
        	$datos = array("prospecto" => $row);
            $this->load->view('Prospectos/edit', $datos);
        }	
	}
    
    function editProspecto(){

        
		$datos =array(
				'pro_nombres'   	=> $_POST['name'],
				'pro_apellidos' 	=> $_POST['lastname'],
				'pro_cargo'			=> $_POST['txtCargo'],
				'pro_correo'    	=> $_POST['mail'],
				'pro_telefono'  	=> $_POST['telefono'],
				'pro_empresa'		=> $_POST['empresa'],
				'pro_tipo_empresa'  => $_POST['tipoEmpresa']
		);
		
		
		if($this->Prospectos_model->updatetUsers( $datos, $_POST['id'])){
			redirect ('prospectos/index', 'refresh');
		}else{
			$datosvista = array('datos' => $datos, 'error' => 'a ocurrido un error, durante la operacion vuelve a intentarlo');
			$this->load->view('Prospectos/edit', $datosvista);
		}
		
	}

	function delete($id){

        
		$datos =array(
			'pro_estado_id'		=> 2,
		);
		
		
		if($this->Prospectos_model->updatetUsers( $datos, $id)){
			redirect ('prospectos/index', 'refresh');
		}else{
			$row = null;
			if($this->session->userdata('tipo_user') == "Direccion"){
				$row = $this->Prospectos_model->getProspectos();
			}else{
				$row = $this->Prospectos_model->getProspectosByusers($this->session->userdata('userId'));
			}
			
			$codigo = $this->getcityCode();
			$datos = array('prospectos' => $row, 'ciudad' => $codigo, "error" => "No se pudo eliminar el prospecto!!");
            $this->load->view('Prospectos/Prospectos_view', $datos);
		}
		
	}

    function getcityCode(){
        $Lsql = "SELECT city_nombre FROM mp_ciudades where city_id = ".$this->session->userdata('ciudad');
        $row = mysql_query($Lsql);
        while($fila= mysql_fetch_array($row)){
            $max = $fila['city_nombre'];
        }
        return $max;
    }

    function envioMaxivo(){
    	if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
			
			$row = null;
			if($this->session->userdata('tipo_user') == "Direccion"){
				$row = $this->Prospectos_model->getProspectos();
			}else{
				$row = $this->Prospectos_model->getProspectosByusers($this->session->userdata('userId'));
			}
			$count =0;
			$mail = "";
	        $email_subject = $_POST['email_cc'];
	        $email_message = $_POST['message'];

			while($fila =mysql_fetch_array($row)){
				$correo = $fila['pro_correo'];
				$this->EnvioMensajesal($correo, $email_subject, $email_message);
				$count++;
			}

			echo "Se enviaron ".$count." Mensajes satisfactoriamente!";
        }
    }

    function envioMaxivoEfren(){
		if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
			
			$count =0;
			$mail = "";
			$ciudad = $_POST['ciudad'];
	        $email_subject = $_POST['email_cc'];
	        $email_message = $_POST['message'];


	        if($ciudad == '0'){
	        	$row = $this->Prospectos_model->getProspectos();
	        	while($fila =mysql_fetch_array($row)){
					$correo = $fila['pro_correo'];
					$this->EnvioMensajesalEfren($correo, $email_subject, $email_message);
					$count++;
				}

	        }else{
	        	$row = $this->Prospectos_model->getProspectosbyCity($ciudad);
	        	while($fila =mysql_fetch_array($row)){
					$correo = $fila['pro_correo'];
					$this->EnvioMensajesalEfren($correo, $email_subject, $email_message);
					$count++;
				}
	        }
			
			echo "Se enviaron ".$count." Mensajes satisfactoriamente!";
        }

    }
    
}
