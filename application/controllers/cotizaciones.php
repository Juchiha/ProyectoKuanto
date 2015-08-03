<?php if ( ! defined('BASEPATH'))exit('No direct script access allowed');
class Cotizaciones extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function mis_cotizaciones(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->Model('Cotizacion_model');
            $row = $this->Cotizacion_model->getMisCotizaciones($this->session->userdata('userId'));
            $mios = $this->Cotizacion_model->getMisCotizacionesenviadas($this->session->userdata('userId'));
            $datosVista = array('arrayvista'=> $row, 'mias' => $mios);
            $this->load->view('Cotizaciones/mis_cotizaciones_view', $datosVista);
        }
    }
    
    function EnviarMensaggeRespuesta(){
		$IdRemitente = $this->session->userdata('userId'); 
		$IdDestinatario = $_POST['destino'];
		$cantidad = $_POST['cantidad'];
		$insumo = $_POST['insumo'];
		$respuesta = $_POST['respuestaId'];
		$respondera = $_POST['Remitente'];
		$this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $dring = mdate($datestring);
        
		$datos = array(
					'cot_id_remitente' => $IdRemitente,
					'cot_id_destino'   => $IdDestinatario,
					'cot_asunto'	   => 'Respuesta Cotizacion Insumos',
					'cot_in_id'		   => $insumo,
					'cot_cantidad'	   => $cantidad,
					'cot_estado_id'	   => 1,
					'cot_visto'		   => 'N',
					'cot_fecha'		   => $dring,
					'cot_tipo_men'	   => 'RESPUESTA',
					'cot_resp_val'     => $respuesta,
					'cot_es_respuesta' => 'S',
					'cot_respondido_a' =>  $respondera
				);
		
		$this->load->Model('Cotizacion_model');
		if($this->Cotizacion_model->enviar_Cotizacion($datos)){
			 $this->setVistos($respondera);
			 echo 'LISTO';    
		}else{
			 echo 'NO LISTO';
		}
	}
		
		
	function setVistos($id){
		$setvisto = null;
		$datos= array('cot_visto' => 'S');
		
		$this->load->Model('Cotizacion_model');
		if($this->Cotizacion_model->updtate_Cotizacion($datos, $id)){
			$setvisto = "LISTO";
		}else{
			$setvisto = "NO";
		}
		return $setvisto;
	}


	function setNoVistos($id){
		$setvisto = null;
		$datos= array('cot_visto' => 'N');
		
		$this->load->Model('Cotizacion_model');
		if($this->Cotizacion_model->updtate_Cotizacion($datos, $id)){
			$setvisto = "LISTO";
		}else{
			$setvisto = "NO";
		}
		return $setvisto;
	}
	
	
	function mensages(){
		$id = $this->session->userdata('userId'); 
		$this->load->Model('Cotizacion_model');
		$coun = $this->Cotizacion_model->getCountMsg($id);
		$msgs = $this->Cotizacion_model->getMesages($id);
		$datosvista = array('totalMensajes' => $coun, 'mensajes' => $msgs);
		$this->load->view('Cotizaciones/mensajes', $datosvista);
	}
}
?>
