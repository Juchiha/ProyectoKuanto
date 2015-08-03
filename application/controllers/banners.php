<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of banners
 *
 * @author JOSE
 */
class banners extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
    }

    public function index(){
    	if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
        	$this->load->model('Banners_model');
        	$row = $this->Banners_model->getBanners();
        	$datos = array('banners' => $row);
        	$this->load->view('banners/index', $datos);
        }
    }
}