<?php if ( ! defined('BASEPATH'))exit('No direct script access allowed');
class Articulos extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function articulos_balnco_h(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->Model("Articulos_model");
            $unidades = $this->Articulos_model->getUnidades();
            $clases = $this->Articulos_model->getClasesInsumo();
            $datosVista = array('unidades' => $unidades, 'clases' => $clases );
            $this->load->view('Productos/articulo_blanco_h', $datosVista);
        }
    }

    public function articulos_balnco_l(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->Model("Articulos_model");
            $unidades = $this->Articulos_model->getUnidades();
            $datosVista = array('unidades' => $unidades, 'clases' => $clases );
            $this->load->view('Productos/articulo_blanco_l', $datosVista);
        }
    }
    
    public function mis_articulos(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->Model('Articulos_model');
            $row = $this->Articulos_model->getMisArticulos($this->session->userdata('userId'));
            $misaru = $this->Articulos_model->getMisaticulosCount($this->session->userdata('userId'), '11');
            $compuesto = $this->Articulos_model->getMisArticulosCompuestos($this->session->userdata('userId'));
            $misarC = $this->Articulos_model->getMisaticulosCount($this->session->userdata('userId'), '10');
            $datos_vista = array('misInsumos' => $row, 'count' => $misaru, 'compuesto' => $compuesto, 'cantidadConpuestos' => $misarC);
            $this->load->view('Productos/Mis_Insumos_view', $datos_vista); 
        }
    }


    public function insertarArticuloBlanco(){
        $artDescrip = $_POST['descripcion'];
        $artPrecio  = $_POST['precio'];
        $artStok    = $_POST['stok'];
        $artImage   = null;
        $unidad     = $_POST['unidad'];
        $cantidad   = $_POST['cantidad'];
        $procedencia = $_POST['procedencia'];
        $categoria = $_POST['categoria'];

        $this->load->Model("Articulos_model");
      
        $idUser = $this->session->userdata('userId');
        $target_path = "/home/kefrensantiago/public_html/Images/Articulos/";
        $target_path = $target_path . 'Articulos_Blanco'.$idUser."_".basename($_FILES['imgInsumo']['name']); 
        $target_path = str_replace(' ', '', $target_path);
     
        copy($_FILES['imgInsumo']['tmp_name'], $target_path);
        $fileName =   'Articulos_Blanco'.$idUser."_".basename($_FILES['imgInsumo']['name']);
        $fileName = str_replace(' ', '', $fileName);

        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $dring = mdate($datestring);
       // ,,,,,,,,,,, , in_url, 
        $datos = array(
                'in_ctc_id' => 12,
                'in_descripcion' => $artDescrip,
                'in_unidad'      => $unidad,
                'in_cantidad'    => $artStok,
                'in_precio'      => $artPrecio,
                'in_estado_'     => 1,
                'in_fecha_'      => $dring,
                'in_img'         => $fileName,
                'in_emp_id'      => $this->session->userdata('userId'),
                'in_publicado'   => 0,
                'in_cl_id'       => $categoria
               );
        
        if($this->Articulos_model->insert($datos)){    
           
            $this->load->model('Articulos_model');
            $homeinsumos = $this->Articulos_model->getArticulos_HomePage($this->session->userdata('ciudad'), 'A');
            $datos_vista = array('rs_articulos'=> $homeinsumos, 'alert' => 'Insumo creado con Exito');
            $this->load->view('Home/HomePage_view', $datos_vista);
        }else{
            $unidades = $this->Articulos_model->getUnidades();
            $clases = $this->Articulos_model->getClasesInsumo();
            $datosVista = array('unidades' => $unidades, 'alert' => 'No se pudo insertar el insumo');
            $this->load->view('Productos/articulos_balnco_h', $datosVista); 
        }
    }
    
    public function insertarArticuloBlanco_l(){
        $artDescrip = $_POST['descripcion'];
        $unidad     = $_POST['unidad'];
        $cantidad   = $_POST['cantidad'];
         $categoria = $_POST['categoria'];

        $this->load->Model("Articulos_model");
      
        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $dring = mdate($datestring);
       // ,,,,,,,,,,, , in_url, 
        $datos = array(
                'in_ctc_id' => 12,
                'in_descripcion' => $artDescrip,
                'in_unidad'      => $unidad,
                'in_estado_'     => 1,
                'in_fecha_'      => $dring,
                'in_emp_id'      => $this->session->userdata('userId'),
                'in_publicado'   => 0,
                'in_cl_id'       => $categoria
               );
        
        if($this->Articulos_model->insert($datos)){
               
            $this->load->model('Articulos_model');
            $insumos = $this->Articulos_model->getArticulos_LandPage('A');
            $datos_vista = array('rs_articulos' => $insumos, 'alert' => 'Insumo creado con Exito');
            $this->load->view('Home/LandPage_view', $datos_vista);      
        }else{
            $unidades = $this->Articulos_model->getUnidades();
            $clases = $this->Articulos_model->getClasesInsumo();
            $datosVista = array('unidades' => $unidades, 'alert' => 'No se pudo insertar el insumo');
            $this->load->view('Productos/articulos_balnco_l', $datosVista);
        }
    }

    public function create(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->Model("Articulos_model");
            $unidades = $this->Articulos_model->getUnidades();
            $clases = $this->Articulos_model->getClasesInsumo();
            $datosVista = array('unidades' => $unidades, 'clases' => $clases);
            $this->load->view('Productos/Create_Insumo', $datosVista);
        }
    }
    
    public function editar($id){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->Model("Articulos_model");
            $row = $this->Articulos_model->getInsumobyId($id);
			$unidades = $this->Articulos_model->getUnidades();
            $clases = $this->Articulos_model->getClasesInsumo();
			$clas = $this->Articulos_model->getClasesInsumo();
            $uni = $this->Articulos_model->getUnidades();
            $datosVista = array("Insumo" => $row, 'unidades' => $unidades, 'clases' => $clases, 'uni' => $uni, 'clasesos' => $clas);
            $this->load->view('Productos/Edit_Insumo', $datosVista);
        }
    }
    
    public function insertarArticulo(){
        $artDescrip = $_POST['descripcion'];
        $artPrecio  = $_POST['precio'];
        $artStok    = $_POST['stok'];
        $artImage   = null;
        $unidad     = $_POST['unidad'];
        $categoria   = $_POST['categoria'];
        $tienda     = $this->session->userdata('ciudad');
		$urlEntrada = $_POST['url'];
        $clave      = null;
        
        $this->load->Model("Articulos_model");
        $ultimoId = $this->generateCodeProduct($this->session->userdata('userId'), $this->session->userdata('codeuser'));
        if($ultimoId != "Maximo_alcanzado"){
            $clave = $ultimoId;
            //echo $clave;
        }else{
            $unidades = $this->Articulos_model->getUnidades();
            $clases = $this->Articulos_model->getClasesInsumo();
            $datosVista = array('unidades' => $unidades, 'clases' => $clases, 'alert' => 'Maximo de productos alcanzado');
            $this->load->view('Productos/Create_Insumo', $datosVista); 
        }
    
        $idUser = $this->session->userdata('userId');
		$target_path = "/home/kefrensantiago/public_html/Images/Articulos/";
        $target_path = $target_path . 'Articulos_'.$idUser."_".basename($_FILES['imgInsumo']['name']); 
        $target_path = str_replace(' ', '', $target_path);

        copy($_FILES['imgInsumo']['tmp_name'], $target_path);
        $fileName =   'Articulos_'.$idUser."_".basename($_FILES['imgInsumo']['name']);
        $fileName = str_replace(' ', '', $fileName);

        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $dring = mdate($datestring);
       // ,,,,,,,,,,, , in_url, 
        $datos = array(
                'in_ctc_id' => 11,
                'in_descripcion' => $artDescrip,
                'in_unidad'      => $unidad,
                'in_cantidad'    => $artStok,
                'in_precio'      => $artPrecio,
                'in_estado_'     => 1,
                'in_fecha_'      => $dring,
                'in_tienda_'     => $tienda,
                'in_img'         => $fileName,
                'in_clave'       => $clave,
                'in_cl_id'       => $categoria,
                'in_emp_id'      => $this->session->userdata('userId'),
                'in_publicado'   => 0,
		'in_url'	 => $urlEntrada
               );
        
        if($this->Articulos_model->insert($datos)){
            //echo 'aja';
            redirect('articulos/mis_articulos', 'refresh');
        }else{
            $unidades = $this->Articulos_model->getUnidades();
            $clases = $this->Articulos_model->getClasesInsumo();
            $datosVista = array('unidades' => $unidades, 'clases' => $clases, 'alert' => 'No se pudo insertar el insumo');
            $this->load->view('Productos/Create_Insumo', $datosVista); 
        }
    }


   function editarArticulo(){
	   $artDescrip = $_POST['descripcion'];
        $artPrecio  = $_POST['precio'];
        $artStok    = $_POST['stok'];
        $artImage   = $_POST['artimage'];
        $unidad     = $_POST['unidad'];
        $categoria   = $_POST['categoria'];
        $tienda     = $this->session->userdata('ciudad');
	    $urlEntrada = $_POST['url'];
        $id = $_POST['artId'];
	    $idUser = $this->session->userdata('userId');
	    $target_path = "/home/kefrensantiago/public_html/Images/Articulos/";
        $target_path = $target_path . 'Articulos_'.$idUser."_".basename($_FILES['imgInsumo']['name']); 
        $target_path = str_replace(' ', '', $target_path);

        copy($_FILES['imgInsumo']['tmp_name'], $target_path);
        $fileName =   'Articulos_'.$idUser."_".basename($_FILES['imgInsumo']['name']);
        $fileName = str_replace(' ', '', $fileName);
        
        if($fileName == null){
		$fileName  = $artImage;
	}

        $datos = array(
                'in_ctc_id' => 11,
                'in_descripcion' => $artDescrip,
                'in_unidad'      => $unidad,
                'in_cantidad'    => $artStok,
                'in_precio'      => $artPrecio,
                'in_estado_'     => 1,
                'in_tienda_'     => $tienda,
                'in_img'         => $fileName,
                'in_cl_id'       => $categoria,
                'in_publicado'   => 0,
		        'in_url'	     => $urlEntrada
               );
	$this->load->Model("Articulos_model");
	if($this->Articulos_model->editDatos($datos, $id)){
            redirect('articulos/mis_articulos', 'refresh');
        }else{
            $this->editar($id); 
        }

   }
    
    function getUltimoId($_idUsuario){
        $max = null;
        $Lsql = "SELECT MAX(in_clave) AS Ultimo FROM mp_insumos where in_emp_id= ".$_idUsuario." and in_estado_ = 1";
        $row = mysql_query($Lsql);
        while($result = mysql_fetch_array($row)){
            if($result['Ultimo'] > 0){
                $max = $result['Ultimo'];
            }else{
                $max = 0;
            }
        }
        return $max;
    }
    
    function getCodeCity($idUser){
        $lsql = "select city_codigo from mp_ciudades join mp_empresa on emp_ciudad = city_id where emp_id =".$idUser;
        $row = mysql_query($lsql);
        $res =null;
        while($result = mysql_fetch_array($row)){
            $res = $result['city_codigo'];
        }
        return $res;
    }
    
    
    function generateCodeProduct($userID, $usucode){
        $cityCode = $this->getCodeCity($userID);
        $ultimoId = $this->getUltimoId($userID) + 1;
        $clave = null;
        if($this->getTotalArticulos($userID)){
            return "Maximo_alcanzado";
        }else{
            if(mb_strlen($ultimoId) == 1){
                $ultimoId = "00".$ultimoId;
            }else if(mb_strlen($ultimoId) == 2){
                $ultimoId = "0".$ultimoId;
            }
             
            
            if($ultimoId == "001"){
                $clave = $cityCode.$usucode.$ultimoId;
            }else{
                $clave = $ultimoId;
            }
            
            if(mb_strlen($clave) == 8){
                $clave = "00".$clave;
            }else if(mb_strlen($clave) == 9){
                $clave = "0".$clave;
            }else  if(mb_strlen($clave) == 4 ){
                $clave = "000000".$clave;
            }
            return $clave;
           // echo $clave;
        }        
    }
    
    function getTotalArticulos($id){
        $this->load->Model("Articulos_model");
        $row = $this->Articulos_model->getTotalProd($id);
        $bolean = FALSE;
        while($rsult = mysql_fetch_array($row)){
            $total = $rsult['total'];
            
            if($total >= 100){
                $bolean = TRUE;
            }
        }
        
        return $bolean;
    }
    
    function eliminar($id){
		
		$datos = array('in_estado_'=> 0);
		$this->load->Model("Articulos_model");
		if($this->Articulos_model->editDatos($datos, $id)){
            redirect("articulos/mis_articulos","refresh");
        }else{
            return "NO"; 
        }
		
	}
	
	function publicar($id){
		
		$datos = array('in_publicado'=> 1);
		$this->load->Model("Articulos_model");
		if($this->Articulos_model->editDatos($datos, $id)){
            redirect("articulos/mis_articulos","refresh");
        }else{
            return "NO"; 
        }
		
	}
	
	function despublicar($id){
		
		$datos = array('in_publicado'=> 0);
		$this->load->Model("Articulos_model");
		if($this->Articulos_model->editDatos($datos, $id)){
            redirect("articulos/mis_articulos","refresh");
        }else{
            return "NO"; 
        }
		
	}

    function mover(){
        $id = $_POST['id'];
        $categoria = $_POST['categoria'];

        $datos = array('in_cl_id'=> $categoria);
        $this->load->Model("Articulos_model");
        if($this->Articulos_model->editDatos($datos, $id)){
            $respuesta  = array('success' => 1 );
            echo json_encode($respuesta);
        }else{
           $respuesta  = array('success' => 0 );
           echo json_encode($respuesta);
        }
        
    }

   public function createInsumoC(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->Model("Articulos_model");
            $unidades = $this->Articulos_model->getUnidades();
          //  $clases = $this->Articulos_model->getClasesInsumo();
            $datosVista = array('unidades' => $unidades);
            $this->load->view('Productos/Create_Insumo_C', $datosVista);
        }
    }

    public function insertarinsumoC(){
        $artDescrip = $_POST['descripcion'];
        $unidad     = $_POST['unidad'];
        $artStok    = $_POST['stok'];
        $this->load->Model("Articulos_model");

    //    $ultimoId = $this->generateCodeProduct($this->session->userdata('userId'), $this->session->userdata('codeuser'));
    
    
        $idUser = $this->session->userdata('userId');


        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $dring = mdate($datestring);
       // ,,,,,,,,,,, , in_url, 
        $datos = array(
                'in_ctc_id' => 10,
                'in_descripcion' => $artDescrip,
                'in_unidad'      => $unidad,
                'in_cantidad'    => $artStok,
                'in_estado_'     => 1,
                'in_fecha_'      => $dring,
                'in_emp_id'      => $this->session->userdata('userId'),
                'in_publicado'   => 0
               );
        
        if($this->Articulos_model->insert($datos)){
            //echo 'aja';
            redirect('articulos/mis_articulos', 'refresh');
        }else{
            $unidades = $this->Articulos_model->getUnidades();
            $datosVista = array('unidades' => $unidades, 'alert' => 'No se pudo insertar el insumo');
            $this->load->view('Productos/Create_Insumo_C', $datosVista); 
        }
    }
    

    public function agregarInsumos($compuesto){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->Model("Articulos_model");
            $comuetso = $this->Articulos_model->getInsumobyxCompbyPadre($compuesto);
            $insumosMios  = $this->Articulos_model->getMisArticulos($this->session->userdata('userId'));
            $row = $this->Articulos_model->getMisArticulos($this->session->userdata('userId'));
            $datosVista = array('articulos' => $row, 'insumos' => $comuetso,  'insumosMios' => $insumosMios, 'ests' => $compuesto);
            $this->load->view('Productos/agregarInsumos', $datosVista);
        }
    }

    public function Insumoscompuestos($compuesto){
        $this->load->Model("Articulos_model");
        $comuetso = $this->Articulos_model->getInsumobyxCompbyPadre($compuesto);
        $datosVista = array('insumos' => $comuetso);
        $this->load->view('Productos/agregarInsumos2', $datosVista);
    }

    public function editarinsumo($id){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->Model("Articulos_model");
            $row = $this->Articulos_model->getInsumobyId($id);
            $unidades = $this->Articulos_model->getUnidades();
            $datosVista = array("Insumo" => $row, 'unidades' => $unidades);
            $this->load->view('Productos/Edit_InsumoC', $datosVista);
        }
    }

    public function editarinsumoC(){
        $artDescrip = $_POST['descripcion'];
        $unidad     = $_POST['unidad'];
        $artStok    = $_POST['stok'];
        $this->load->Model("Articulos_model");

    //    $ultimoId = $this->generateCodeProduct($this->session->userdata('userId'), $this->session->userdata('codeuser'));
    
    
        $idUser = $this->session->userdata('userId');


        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $dring = mdate($datestring);
       // ,,,,,,,,,,, , in_url, 
        $datos = array(
                'in_ctc_id' => 10,
                'in_descripcion' => $artDescrip,
                'in_unidad'      => $unidad,
                'in_cantidad'    => $artStok,
                'in_estado_'     => 1,
                'in_fecha_'      => $dring,
                'in_emp_id'      => $this->session->userdata('userId'),
                'in_publicado'   => 0
               );
        
        if($this->Articulos_model->editDatos($datos, $_POST['id'])){
            //echo 'aja';
            redirect('articulos/mis_articulos', 'refresh');
        }else{
            $unidades = $this->Articulos_model->getUnidades();
            $datosVista = array('unidades' => $unidades, 'alert' => 'No se pudo insertar el insumo');
            $this->load->view('Productos/Create_Insumo_C', $datosVista); 
        }
    }

    public function ingresarArtComp(){
        $id = $_POST['id'];
        $padre = $_POST['padre'];
        $cantidad = $_POST['cantidad'];
        $datos = array(
                'com_padre'             => $padre,
                'com_insumo'            => $id,
                'com_cantidad'          => $cantidad
               );
        $this->load->Model("Articulos_model");
        if($this->Articulos_model->insertC($datos)){
            //echo 'aja';
            $dat = array();
            $dat["success"] = 1;
            $dat["message"] = "Insertado correctamente";
            echo json_encode($dat);
        }else{
            $dat = array();
            $dat["success"] = 2;
            $dat["message"] = "No seiInserto correctamente";
            echo json_encode($dat);
        }

    }
}