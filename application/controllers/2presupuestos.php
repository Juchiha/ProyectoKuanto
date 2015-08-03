<?php if ( ! defined('BASEPATH'))exit('No direct script access allowed');

class Presupuestos extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function  mis_presupuestos(){
		if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->Model('Presupuestos_model');
            $row = $this->Presupuestos_model->getProyects($this->session->userdata('userId'));
            $datos_vista = array('datos' => $row);
            $this->load->view('Presupuestos/Mis_Presupuestos_view', $datos_vista);
        }
	} 
	
	function getSecondNivel($id){
		if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->Model('Presupuestos_model');
			$row = $this->Presupuestos_model->getSecondLevel($id);
			$datos_vista = Array('acumuladores' => $row);
			$this->load->view('Presupuestos/view_details', $datos_vista);
        }
	}
    
}

