<?php if ( ! defined('BASEPATH'))exit('No direct script access allowed');
class Opciones extends CI_Controller{
	
    public function __construct()
    {
        parent::__construct();
    }

    public function getpaises(){
    	 $this->load->model('Users_Model');
    	 $row = $this->Users_Model->getPaises();
    	 $data  = array('paises' =>  $row );
    	 $this->load->view('Opciones/paises', $data);
    }
}
?>