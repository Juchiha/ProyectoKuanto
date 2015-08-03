<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->load->view('Home/LandingPage');
    }

    public function landPage(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
            //echo "No estas logueado";
        }else{
            $this->load->model('Articulos_model');
            $insumos = $this->Articulos_model->getArticulos_LandPage('A');
            $insumosHerramientas = $this->Articulos_model->getArticulos_LandPage('B'); 
            $insumosEquipos = $this->Articulos_model->getArticulos_LandPage('C'); 
            $insumosMaquinaria = $this->Articulos_model->getArticulos_LandPage('D'); 
            $insumosServicios = $this->Articulos_model->getArticulos_LandPage('E'); 
            $insumosIndirectos = $this->Articulos_model->getArticulos_LandPage('F'); 

            $datos_vista = array('rs_articulos' => $insumos,
                                'servicios' => $insumosServicios, 
                                'equipos' => $insumosEquipos , 
                                'maquinaria' => $insumosMaquinaria , 
                                'herramientas' => $insumosHerramientas , 
                                'indirectos' => $insumosIndirectos);
            
            $this->load->view('Home/LandPage_view', $datos_vista);
        }
    }

    public function condiciones(){
        $this->load->view('Home/condiciones');
    }


    

    public function politicas(){
        $this->load->view('Home/politicas');
    }



    public function homePage(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->model('Articulos_model');
            $homeinsumos = $this->Articulos_model->getArticulos_HomePage($this->session->userdata('ciudad'), 'A');
            $insumosHerramientas = $this->Articulos_model->getArticulos_HomePage($this->session->userdata('ciudad'), 'B'); 
            $insumosEquipos = $this->Articulos_model->getArticulos_HomePage($this->session->userdata('ciudad'), 'C'); 
            $insumosMaquinaria = $this->Articulos_model->getArticulos_HomePage($this->session->userdata('ciudad'), 'D'); 
            $insumosServicios = $this->Articulos_model->getArticulos_HomePage($this->session->userdata('ciudad'), 'E'); 
            $insumosIndirectos = $this->Articulos_model->getArticulos_HomePage($this->session->userdata('ciudad'), 'F'); 

            $datos_vista = array('rs_articulos'=> $homeinsumos, 
                                'servicios' => $insumosServicios, 
                                'equipos' => $insumosEquipos , 
                                'maquinaria' => $insumosMaquinaria , 
                                'herramientas' => $insumosHerramientas , 
                                'indirectos' => $insumosIndirectos);
            $this->load->view('Home/HomePage_view', $datos_vista);
        }
    }

    function tienda($id){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->model('Articulos_model');
            $homeinsumos = $this->Articulos_model->getArticulos_fromUser($id);

            $this->load->model('Users_model');
            $result = $this->Users_model->getUsersById($id);
            $nombres= null;
            while($fila = mysql_fetch_array($result)){  
                $nombres = $fila['emp_nombre']." ".$fila['emp_apellido'];
            }



            $datos_vista = array('rs_articulos'=> $homeinsumos, 'nombre' => $nombres);
            $this->load->view('Home/Tienda', $datos_vista);
        }
    }

    function cotizar(){
        $this->load->model('Cotizacion_model');
        $data = array(
                    'cot_id_remitente' => $this->session->userdata('userId'),
                    'cot_id_destino'   => $_POST['destino'],
                    'cot_asunto'       => "Cotizacion de insumos",
                    'cot_in_id'        => $_POST['insumo'],
                    'cot_cantidad'     => $_POST['cantidad'],
                    'cot_estado_id'    => 1,
                    'cot_visto'        => 'N',
                    'cot_tipo_men'     => 'COTIZACION',
                    'cot_es_respuesta' => 'N'
                    ); 
        if($this->Cotizacion_model->enviar_Cotizacion($data)){
            echo "INSERTADO";
        }else{
            echo "NOINSERTADO";
        }
    }

    function insumo_Detalle(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->model('Articulos_model');
            $detallesInsumos = $this->Articulos_model->getDetalleInsumo($_POST['insumoId']);
            $datos_vista = array('detalle_Articulo'=> $detallesInsumos);
            $this->load->view('Home/detalles_PartialView', $datos_vista);
        }		
    }

    function insumos_By_Categoria(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->model('Articulos_model');
            $insumos = $this->Articulos_model->getArticulos_LandPage($_POST['categoria']);
            $datos_vista = array('rs_articulos' => $insumos, 'idTabla' => $_POST['TablaId']);
            $this->load->view('Home/insumosByCategoria_PartialView', $datos_vista);
        }	
    }

    function insumos_By_Categoria_Home(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->model('Articulos_model');
            $insumos = $this->Articulos_model->getArticulos_HomePage($this->session->userdata('ciudad'), $_POST['categoria']);
            $datos_vista = array('rs_articulos' => $insumos, 'idTabla' => $_POST['TablaId']);
            $this->load->view('Home/insumosByCategoria_PartialView2', $datos_vista);
        }	
    }

    function detalles($id, $page){
        $this->load->Model("Articulos_model");
        $datos = $this->Articulos_model->getInsumobyId($id);
        $dato = array('articulos' => $datos, 'page' => $page);
        if(!$this->session->userdata('login_ok')){
            if($page == 'A'){
                $this->load->view('Reporteador/DetallesArticulos', $dato);
            }else{
                $this->load->view('Home/DetallesArticulosL', $dato);
            }
           
        }else{
            $this->load->view('Home/DetallesArticulos', $dato);
        }
       
    }
}
?>
