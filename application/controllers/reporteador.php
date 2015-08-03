<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reporteador
 *
 * @author JOSE
 */
class Reporteador extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
    
    function getProducts(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->model('Articulos_model');
            $homeinsumos = null;
            if($this->session->userdata('tipo_user') == "Direccion"){
                $homeinsumos = $this->Articulos_model->getArticulos();
            }else{
                $homeinsumos = $this->Articulos_model->getArticulos_fromCity($this->session->userdata('ciudad'));
            }
            
            $codigo = $this->getcityCode();
            $datos_vista = array('home_articulos'=> $homeinsumos, 'cityCode' => $codigo);
            $this->load->view('Reporteador/Reporteador_view', $datos_vista);
        }
    }
    
    function getUsers(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->model('Users_Model');
            $usuarios = null;
            if($this->session->userdata('tipo_user') == "Direccion"){
                $usuarios = $this->Users_Model->getUsers();
            }else{
                $usuarios = $this->Users_Model->getUsersByCity($this->session->userdata('ciudad'));
            }
            $codigo = $this->getcityCode();
            $code = $this->getcity();
            $datos_vista = array('usuarios_ciudad'=> $usuarios, 'cityCode' => $codigo , 'code' => $code);
            $this->load->view('Reporteador/Usuarios_city', $datos_vista);
        }
    }
    
    function mensagero(){
		if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
			$this->load->Model('mensajes_model');
            $row = $this->mensajes_model->getMensajesResividos($this->session->userdata('userId'));
            $datos_vista = array('resividos' => $row);
            $this->load->view('Reporteador/mensegero', $datos_vista);
        }
	}
    
    
    function estadisticas(){
		if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->model('Estadisticas_model');
            $rows = $this->Estadisticas_model->getEstadisticas();
            $paises = $this->Estadisticas_model->getciudadesPaiesestadistica();
            $articulos = $this->Estadisticas_model->getArticulosporCiudad();
            $prospectos = $this->Estadisticas_model->getProspectosporCiudad();
            $datos = array('usuarios_ciudad' => $rows, 'paises_ciudad' => $paises, 'articulos_city' => $articulos, 'prospectos_city' => $prospectos);
            $this->load->view('Reporteador/Estadisticas', $datos);
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
    
    function getcity(){
        $Lsql = "SELECT city_codigo FROM mp_ciudades where city_id = ".$this->session->userdata('ciudad');
        $row = mysql_query($Lsql);
        while($fila= mysql_fetch_array($row)){
            $max = $fila['city_codigo'];
        }
        return $max;
    }


    function detalles($id){
        $this->load->Model("Articulos_model");
        $datos = $this->Articulos_model->getInsumobyId($id);
        $dato = array('articulos' => $datos);
        $this->load->view('Reporteador/DetallesArticulos', $dato);
            
       
    }
    
}
