<?php if ( ! defined('BASEPATH'))exit('No direct script access allowed');

class Presupuestos extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function mis_presupuestos(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->Model('Presupuestos_model');
            $row = $this->Presupuestos_model->getProyects($this->session->userdata('userId'));
            $data_view = array('proyectos' => $row );
            $this->load->view('Presupuestos/Index', $data_view);
        }
    }

    public function  getVista($id){
		if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->Model('Presupuestos_model');
            $row = $this->Presupuestos_model->getSecondLevel($id);
            $datos_vista = array('acordeon' => $row, 'valueProyects' => $id);
            $this->load->view('Presupuestos/Mis_Presupuestos_view', $datos_vista);
        }
	} 
	
	function getSecondNivel($id, $proyect){
		if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
          $this->load->Model('Presupuestos_model');
			    $row = $this->Presupuestos_model->getAgrupadores($id);
          $row2 = $this->Presupuestos_model->getMatrix($id);

          $this->load->model('Articulos_model');
          $homeinsumos = $this->Articulos_model->getArticulos_HomePage($this->session->userdata('ciudad'), 'A');
          $insumosHerramientas = $this->Articulos_model->getArticulos_HomePage($this->session->userdata('ciudad'), 'B'); 
          $insumosEquipos = $this->Articulos_model->getArticulos_HomePage($this->session->userdata('ciudad'), 'C'); 
          $insumosMaquinaria = $this->Articulos_model->getArticulos_HomePage($this->session->userdata('ciudad'), 'D'); 
          $insumosServicios = $this->Articulos_model->getArticulos_HomePage($this->session->userdata('ciudad'), 'E'); 
          $insumosIndirectos = $this->Articulos_model->getArticulos_HomePage($this->session->userdata('ciudad'), 'F'); 

		      $datos_vista = Array('acordeon' => $row, 'padre' => $id,
                               'valueProyects' => $proyect, 'Matriz' => $row2, 
                                'rs_articulos'=> $homeinsumos, 
                                'servicios' => $insumosServicios, 
                                'equipos' => $insumosEquipos , 
                                'maquinaria' => $insumosMaquinaria , 
                                'herramientas' => $insumosHerramientas , 
                                'indirectos' => $insumosIndirectos);

			    $this->load->view('Presupuestos/agrupadorLevel2', $datos_vista);
        }
	}
	
	function getagrupador($id){
			$this->load->Model('Presupuestos_model');
			$row = $this->Presupuestos_model->getAgrupadores($id);
			$datos_vista = Array('agrupador' => $row);
			$this->load->view('Presupuestos/agrupador', $datos_vista);
	}
	
	function getMatrix($id){
			$this->load->Model('Presupuestos_model');
			$row = $this->Presupuestos_model->getMatrix($id);
			$datos_vista = Array('matrices' => $row);
			$this->load->view('Presupuestos/matrixes', $datos_vista);
	}
	
  function getDatosAgrupadorbyId($id){
      $this->load->Model('Presupuestos_model');
      $row = $this->Presupuestos_model->getDatosAgrupadorbyId($id);
      $datos_vista = array();
      while($f = mysql_fetch_array($row)){
          $datos_vista['acum_nombre'] = $f['acum_nombre'];
          $datos_vista['acum_descripcion'] = $f['acum_descripcion'];
          $datos_vista['acum_sigla'] = $f['acum_sigla'];
          $datos_vista['acum_id'] = $f['acum_id'];
      }
      echo json_encode($datos_vista);
  }
	
	//obtener los acumuladores de primer nivel
    function getAcumuladoresPadres($Proyect, $iDiv){
       
       $Lsql = "SELECT acum_id, acum_nombre, acum_descripcion, acum_sigla, acum_padre_id, acum_fecha";
       $Lsql .= " FROM mp_acumuladores";
       $Lsql .= " WHERE acum_padre_id = 0 AND acum_estado_id = 1 AND acum_proyect_id =".$Proyect;
       
       
       $row = mysql_query($Lsql);
       $array = null;
       
       while($q = mysql_fetch_array($row)){
           $array .= '<table class="table"><tr><td><div class="accordion-group">
                                <div class="accordion-heading">
                                  <a href="#collapse'.$q[0].'" data-parent="#'.$iDiv.'" data-toggle="collapse" class="accordion-toggle collapsed">
                                    <span style="float:left;">'.$q[3].'</span><span>&nbsp;</span>
                                    '.$q[1].'
                                        <spam style="float:right; width:134px;">
                                            <div class="btn-group dropup">
                                                <div class="hidden-phone visible-desktop btn-group">
                                                    <button  class="btn btn-sm btn-primary ButtonAdd" Mivalor="'. $q[0].'" Padre="'.$Proyect.'" XD = "ADDACUMPRO">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="hidden-phone visible-desktop btn-group">
                                                    <button  class="btn btn-sm btn-success ButtonUpdate" Mivalor="'. $q[0].'" XD = "EDITACUM">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </div>
                                                <div class="hidden-phone visible-desktop btn-group">
                                                    <button  class="btn btn-sm btn-danger ButtonMinus" Mivalor="'. $q[0] .'" XD = "DELETEACUM">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </spam>
                                        <spam style="position:absolute; Left:75%;">$ '.$this->getValorAgrupador($q[0],$Proyect).'</spam>
                                  </a>
                                </div>
                                <div class="accordion-body collapse" id="collapse'.$q[0].'">
                                  <div class="accordion-inner" id="collapseHP'.$q[0].'">
                                      '.$this->getAcumuladoresHijos($Proyect, $q[0], "collapseHP".$q[0]).'
                                      '.$this->getMatrizes($q[0], "collapseHP".$q[0]).'
                                  </div>
                                </div>
                              </div></td></tr></table>';
       }
      // $d->cerrarConex();
       
       return $array;
    }
    

    //obtener los acumuladores Hijos de otro
    function getAcumuladoresHijos($Proyect, $acumId, $idFather){
         
       $Lsql = "SELECT acum_id, acum_nombre, acum_descripcion, acum_sigla, acum_padre_id, acum_fecha";
       $Lsql .= " FROM mp_acumuladores";
       $Lsql .= " WHERE acum_padre_id = ".$acumId." AND acum_estado_id = 1 AND acum_proyect_id =".$Proyect;
       
       $row = mysql_query($Lsql);
   
       $array = null; 
       while($q = mysql_fetch_array($row)){
           $array .= '<table class="table"><tr><td><div class="accordion-group">
                                <div class="accordion-heading">
                                  <a href="#collapse'.$q[0].'" data-parent="#'.$idFather.'" data-toggle="collapse" class="accordion-toggle collapsed">
                                    <span style="float:left;">'.$q[2].'</span><span>&nbsp;</span>
                                    '.$q[1].'
                                    <spam style="float:right; width:118px;">
                                        <div class="btn-group dropup">
                                            <div class="hidden-phone visible-desktop btn-group">
                                                <button  class="btn btn-sm btn-primary ButtonAdd" Mivalor="'. $q[0].'" Padre="'.$Proyect.'" XD = "ADDACUMPRO">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="hidden-phone visible-desktop btn-group">
                                                <button  class="btn btn-sm btn-success ButtonUpdate" Mivalor="'. $q[0].'" XD = "EDITACUM">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                            <div class="hidden-phone visible-desktop btn-group">
                                                <button  class="btn btn-sm btn-danger ButtonMinus" Mivalor="'. $q[0] .'" XD = "DELETEACUM">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </spam>
                                    <spam style="position:absolute; Left:75%;">$ '.$this->getValorAgrupador($q[0],$Proyect).'</spam>
                                  </a>
                                </div>
                                <div class="accordion-body collapse" id="collapse'.$q[0].'">
                                  <div class="accordion-inner" id="Matrizes'.$q[0].'">
                                    '.$this->getAcumuladoresHijosSegundoLevel($Proyect, $q[0], "Matrizes".$q[0]).'
                                    '.$this->getMatrizes($q[0], "Matrizes".$q[0]).'
                                  </div>
                                </div>
                              </div></td></tr></table>';
       }
       //$d->cerrarConex();
       return $array;
    }
    

    //obtener los acumuladores Hijos de otro
    function getAcumuladoresHijosSegundoLevel($Proyect, $acumId, $idFather){
 
       $Lsql = "SELECT acum_id, acum_nombre, acum_descripcion, acum_sigla, acum_padre_id, acum_fecha";
       $Lsql .= " FROM mp_acumuladores";
       $Lsql .= " WHERE acum_padre_id = ".$acumId." AND acum_estado_id = 1 AND acum_proyect_id =".$Proyect;
       
       $row = mysql_query($Lsql);
   
       $array = null; 
       while($q = mysql_fetch_array($row)){
           $array .= '<table class="table"><tr><td><div class="accordion-group">
                                <div class="accordion-heading">
                                  
                                  <a href="#collapse'.$q[0].'" data-parent="#'.$idFather.'" data-toggle="collapse" class="accordion-toggle collapsed">
                                    <span style="float:left;">'.$q[2].'</span><span>&nbsp;</span>  
                                    '.$q[1].'
                                    <spam style="float:right; width:101px;">
                                        <div class="btn-group dropup">
                                            <div class="hidden-phone visible-desktop btn-group">
                                                <button  class="btn btn-sm btn-primary ButtonAdd" Mivalor="'. $q[0].'" Padre="'.$Proyect.'" XD = "ADDACUMPRO">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="hidden-phone visible-desktop btn-group">
                                                <button  class="btn btn-sm btn-success ButtonUpdate" Mivalor="'. $q[0].'" XD = "EDITACUM">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                            <div class="hidden-phone visible-desktop btn-group">
                                                <button  class="btn btn-sm btn-danger ButtonMinus" Mivalor="'. $q[0] .'" XD = "DELETEACUM">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </spam>
                                    <spam style="position:absolute; Left:75%;">$ '.$this->getValorAgrupador($q[0],$Proyect).'</spam>
                                  </a>
                                </div>
                                <div class="accordion-body collapse" id="collapse'.$q[0].'">
                                  <div class="accordion-inner" id="Matrizes'.$q[0].'">
                                    '.$this->getMatrizes($q[0], "Matrizes".$q[0]).'
                                  </div>
                                </div>
                              </div></td></tr></table>';
       }
       //$d->cerrarConex();
       return $array;
    }
    
    
    //obtener las Matrizes
    function getMatrizes($acumId, $idFather){
   
        $Lsql = "SELECT mat_id, mat_descripcion, mat_cantidad, mat_clave FROM mp_matrizes WHERE mat_estado_ = 1 and mat_acum_id = ".$acumId;
        
        $row = mysql_query($Lsql);
        
        $array = null;
        
        while ($q = mysql_fetch_array($row)){
            $array .= '<table class="table"><tr><td><div class="accordion-group">
                                <div class="accordion-heading">
                                  <a href="#collapse'.$q[0].'" data-parent="#'.$idFather.'" data-toggle="collapse" class="accordion-toggle collapsed">
                                    <span style="float:left;">'.$q[3].'</span><span>&nbsp;</span>
                                    '.$q[1].'
                                   
                                    <spam style="float:right; width:101px;">
                                        
                                        <div class="btn-group dropup">
                                            <div class="hidden-phone visible-desktop btn-group">
                                                <button  class="btn btn-sm btn-primary ButtonAdd" Mivalor="'. $q[0].'" XD = "ADDINSUMO">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="hidden-phone visible-desktop btn-group">
                                                <button  class="btn btn-sm btn-success ButtonUpdate" Mivalor="'. $q[0].'" XD = "EDITMAT">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                            <div class="hidden-phone visible-desktop btn-group">
                                                <button  class="btn btn-sm btn-danger ButtonMinus" Mivalor="'. $q[0] .'" XD = "DELETEMAT">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </spam>
                                    <spam style="position:absolute; Left:75%; width: 20px;">'.$q[2].'</spam>
                                    <spam style="position:absolute; Left:80%; width: 60px;">$ '.$this->getValorMatriz($q[0]).'</spam>
                                  </a>
                                </div>
                                <div class="accordion-body collapse" id="collapse'.$q[0].'">
                                  <div class="accordion-inner">
                                    '.$this->getValorInsumos($q[0], $acumId).'
                                  </div>
                                </div>
                              </div></td></tr></table>';
        }
   
        return $array;
    }

    
    //obtener el valor del los insumos
    function getValorInsumos($matriz){
      
        $Lsql = "SELECT in_descripcion, in_id, uni_sigla, mi_cantidad, in_precio, in_clave";
        $Lsql .= " FROM mp_insumos";
        $Lsql .= " JOIN mp_matins ON mi_in_id = in_id";
        $Lsql .= " JOIN mp_unidades ON uni_id= in_unidad";
        $Lsql .= " WHERE mi_mat_id = ".$matriz." AND in_estado_ = 1 ";
        
        $total = "<table style='width:100%;' class='table table-striped table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th style='width:5%;'>Clave</th>
                            <th style='width:35%;'>Descripcion</th>
                            <th style='width:10%;'>Unidad</th>
                            <th style='width:10%;'>Cantidad</th>
                            <th style='width:15%;'>Precio</th>
                            <th style='width:15%;'>Total</th>
                            <th style='width:10%;'></th>
                        </tr>
                    </thead>

                    <tbody>";
        
        $row = mysql_query($Lsql);
        
        while($q = mysql_fetch_array($row)){
             $total .= "<tr>
                            <td style='width:5%;'>".$q[5]."</td>
                            <td style='width:35%;'>".$q[0]."</td>
                            <td style='width:10%;'>".$q[2]."</td>
                            <td style='width:10%;'>".$q[3]."</td>
                            <td style='width:15%;'>$".$q[4]."</td>
                            <td style='width:15%;'>$".($q[3] * $q[4]) ."</td>
                            <td style='width:10%;'>
                                <div class='btn-group dropup'>
                                    <div class='hidden-phone visible-desktop btn-group'>
                                        <button  class='btn btn-mini btn-success ButtonUpdate' Mivalor='". $q[1] ."' XD = 'EDITMAT'>
                                            <i class='fa fa-edit'></i>
                                        </button>
                                    </div>
                                    <div class='hidden-phone visible-desktop btn-group'>
                                        <button  class='btn btn-mini btn-danger ButtonMinus' Mivalor='". $q[1] ."' XD = 'DELETEINS'>
                                            <i class='fa fa-trash-o'></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>";
        }
        
        return $total."</tbody></table>";
    }
    
    function getValorMatriz($MatId){
	   
	    $LSLQ = "SELECT SUM(mi_cantidad * in_precio) AS total FROM mp_insumos JOIN mp_matins ON mi_in_id = in_id WHERE in_estado_ = 1 AND mi_mat_id = ".$MatId." GROUP BY mi_mat_id";
        $row = mysql_query($LSLQ);
        $value = 0;
        while($q = mysql_fetch_array($row)){
			$value = $q[0];
		}
      
        return $value;
    }
    
    function getMatrixesByAcum($Acum){
        
        $Lsql = "SELECT mat_id, mat_cantidad";
        $Lsql .= " FROM mp_matrizes";
        $Lsql .= " WHERE mat_estado_ = 1 and mat_acum_id = ".$Acum.";";
        
     
        $row = mysql_query($Lsql);
		$total = 0;
        
        while ($q = mysql_fetch_array($row) ){
            $total = $total + ($this->getValorMatriz($q[0]) * $q[1]);
       
        }
      
        return $total;
    }
    
    function getValorAgrupador2($AgrupadorId, $Proyect){
       
       $Lsql = "SELECT acum_id, acum_descripcion, acum_sigla, acum_padre_id, acum_fecha";
       $Lsql .= " FROM mp_acumuladores";
       $Lsql .= " WHERE acum_padre_id = ".$AgrupadorId." AND acum_estado_id = 1 AND acum_proyect_id =".$Proyect;
       
       $row = mysql_query($Lsql);
       $total = 0;
       
       if(mysql_num_rows($row) > 0){
          while($d = mysql_fetch_array($row)){
           
            $total = $total + $this->getMatrixesByAcum($d[0]);
            
          } 
       }else{
           
          $total = $total + $this->getMatrixesByAcum($AgrupadorId);
       }
       
        return $total;
    }
    
    function getValorAgrupador($AgrupadorId, $Proyect){
     
       $Lsql = "SELECT acum_id, acum_descripcion, acum_sigla, acum_padre_id, acum_fecha";
       $Lsql .= " FROM mp_acumuladores";
       $Lsql .= " WHERE acum_padre_id = ".$AgrupadorId." AND acum_estado_id = 1 AND acum_proyect_id =".$Proyect;
       $row = mysql_query($Lsql);
       $total = 0;
       
       if( mysql_num_rows($row) > 0){
          while($d = mysql_fetch_array($row)){
           
            $total = $total + $this->getMatrixesByAcum($d[0]) + $this->getValorAgrupador2($d[0], $Proyect);
            
          } 
       }else{
           
          $total = $total + $this->getMatrixesByAcum($AgrupadorId);
       }
          $total = $total + $this->getMatrixesByAcum($AgrupadorId);
        return $total;
    }
    
    function getValorProyect($proyectId){
      
       $Lsql = "SELECT acum_id, acum_descripcion, acum_sigla, acum_padre_id, acum_fecha";
       $Lsql .= " FROM mp_acumuladores";
       $Lsql .= " WHERE acum_estado_id = 1 AND acum_padre_id = 0 and acum_proyect_id =".$proyectId;
       $row = mysql_query($Lsql);
       $total = 0;
       while($d = mysql_fetch_array($row)){
           $total = $total + $this->getValorAgrupador($d[0], $proyectId);
       }
       
       return $total;
    }



//Funciones de insercion---  de datos
    function insertarProyecto(){

      if(isset($_POST['namePro']) && isset($_POST['clavePro']) && isset($_POST['descripcionPro'])){
        
        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $dring = mdate($datestring);

        $proyecto = array('proyect_name' => $_POST['namePro'],
                          'proyect_descripcion' => $_POST['descripcionPro'],
                          'proyect_clave' => $_POST['clavePro'],
                          'proyect_cat_id' => 1,
                          'proyect_fecha' => $dring,
                          'proyect_estado_id' => 1,
                          'proyect_emp_id' => $this->session->userdata('userId'));

        $this->load->Model('Presupuestos_model');
        if( $this->Presupuestos_model->insertProyects($proyecto, "mp_proyectos")){
           redirect('presupuestos/mis_presupuestos', 'refresh');
        }else{
          redirect('presupuestos/mis_presupuestos', 'refresh');
        }

      }else{
          $this->load->Model('Presupuestos_model');
          $row = $this->Presupuestos_model->getProyects($this->session->userdata('userId'));
          $data_view = array('proyectos' => $row , 'error' => 'Revisa bien, hace falta alguno de los campos!!');
          $this->load->view('Presupuestos/Index', $data_view);
      }
    }

    function eliminarAgrupador(){
        $datos = array('acum_estado_id' => 2);

        $this->load->Model('Presupuestos_model');
        $resultado = false;
        if($_POST['id'] != '0'){
            $resultado = $this->Presupuestos_model->updateproyects($_POST['id'], 'acum_id', "mp_acumuladores", $datos);
        }
        
        if( $resultado ){
              
 

              $table .="";
              $retir['success'] = "1";
              $retir['resultado'] = "Listo";
              echo json_encode($retir);

          }else{
              $retir = array();
              $retir['success'] = "0";
              $retir['resultado'] = "No se pudo insertar los datos, ocurrio un error!";
              echo json_encode($retir);
          }
    }


    function insertarAgrupador(){
        if(isset($_POST['nameAgru']) && isset($_POST['descripcionagru']) && isset($_POST['padre']) && isset($_POST['claveAgr']) && isset($_POST['proyectId'])){
            $this->load->helper('date');
            $datestring = "%Y-%m-%d";
            $dring = mdate($datestring);


            $datos = array('acum_nombre' => $_POST['nameAgru'],
                              'acum_descripcion' => $_POST['descripcionagru'],
                              'acum_sigla' => $_POST['claveAgr'],
                              'acum_padre_id' => $_POST['padre'],
                              'acum_fecha' => $dring,
                              'acum_estado_id' => 1,
                              'acum_proyect_id' => $_POST['proyectId']);

            $this->load->Model('Presupuestos_model');
            $resultado = false;
            if($_POST['id'] != '0'){
                $resultado = $this->Presupuestos_model->updateproyects($_POST['id'], 'acum_id', "mp_acumuladores", $datos);
            }else{
                $resultado = $this->Presupuestos_model->insertProyects($datos, "mp_acumuladores");
            }
            if( $resultado ){
                               $table="";
                $botones='';

                $row = $this->Presupuestos_model->getDatosAgrupadordats($dring, $_POST['claveAgr'], $_POST['padre']);
                while($fila = mysql_fetch_array($row)){ 
                    if($_POST['nivel'] == 'III'){
                        $botones = '<div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">
                                    <i class="fa fa-plus"></i>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#" class="btnPadreMAtrix"  color="'.$_POST['color'].'"  nivel="'.$_POST['nivel'].'" padre="'.$fila['acum_id'].'" data-toggle="modal">Matriz</a></li>
                                </ul>
                            </div>';
                    }else{
                        $botones = '<div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">
                                    <i class="fa fa-plus"></i>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#" class="btnPadreAgrup" color="'.$_POST['color'].'"  nivel="'.$_POST['nivel'].'" padre="'.$fila['acum_id'].'" data-toggle="modal" id="addplus" >Agrupador</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#" class="btnPadreMAtrix"  color="'.$_POST['color'].'"  nivel="'.$_POST['nivel'].'" padre="'.$fila['acum_id'].'" data-toggle="modal">Matriz</a></li>
                                </ul>
                            </div>';
                      
                    }
                    $table .= '<tr style="color: #190707;"  id="'.$fila['acum_id'].'">
                              <td style="text-align:justify;" class="col-md-1">'.$_POST['nivel'].'</td>
                              <td style="text-align:justify;" class="col-md-1">'.$fila['acum_sigla'].'</td>
                              <td style="text-align:justify;" class="col-md-4">'.$fila['acum_descripcion'].'</td>
                              <td style="text-align:justify;" class="col-md-1">Un</td>
                              <td style="text-align:justify;" class="col-md-1">1</td>
                              <td style="text-align:justify;" class="col-md-1">100 $</td>
                              <td style="text-align:justify;" class="col-md-1">100 $</td>
                              <td style="text-align:justify;" class="col-md-3">
                                  <button class="btn btn-success btn-mini editar" ids="'.$fila['acum_id'].'" ><i class="fa fa-edit"></i></button>
                                  <button class="btn btn-danger btn-mini eliminar" proyect ="'.$_POST['proyectId'].'" ids="'.$fila['acum_id'].'" ><i class="fa fa-trash-o"></i></button>   
                                  '.$botones.'
                              </td>
                          </tr>';
                }

                $retir['success'] = "1";
                $retir['resultado'] = $table;
                echo json_encode($retir);

            }else{
                $retir = array();
                $retir['success'] = "0";
                $retir['resultado'] = "No se pudo insertar los datos, ocurrio un error!";
                echo json_encode($retir);
            }
        }else{
            $retir = array();
            $retir['success'] = "0";
            $retir['resultado'] = "No se pudo insertar los datos, los campos son obligatorios!!";
            echo json_encode($retir);
        }
    }

    function insertarAgrupadorHijo(){
        if(isset($_POST['nameAgru']) && isset($_POST['descripcionagru']) && isset($_POST['padre']) && isset($_POST['claveAgr']) && isset($_POST['proyectId'])){
            $this->load->helper('date');
            $datestring = "%Y-%m-%d";
            $dring = mdate($datestring);


            $datos = array('acum_nombre' => $_POST['nameAgru'],
                              'acum_descripcion' => $_POST['descripcionagru'],
                              'acum_sigla' => $_POST['claveAgr'],
                              'acum_padre_id' => $_POST['padre'],
                              'acum_fecha' => $dring,
                              'acum_estado_id' => 1,
                              'acum_proyect_id' => $_POST['proyectId']);

            $this->load->Model('Presupuestos_model');
            $resultado = false;
            if($_POST['id'] != '0'){
                $resultado = $this->Presupuestos_model->updateproyects($_POST['id'], 'acum_id', "mp_acumuladores", $datos);
            }else{
                $resultado = $this->Presupuestos_model->insertProyects($datos, "mp_acumuladores");
            }
            if( $resultado ){
                
                $table="";
                $botones='';

                $row = $this->Presupuestos_model->getDatosAgrupadordats($dring, $_POST['claveAgr'], $_POST['padre']);
                while($fila = mysql_fetch_array($row)){ 
                    if($_POST['nivel'] == 'III'){
                        $botones = '<div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">
                                    <i class="fa fa-plus"></i>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#" class="btnPadreMAtrix"  color="'.$_POST['color'].'"  nivel="'.$_POST['nivel'].'" padre="'.$fila['acum_id'].'" data-toggle="modal">Matriz</a></li>
                                </ul>
                            </div>';
                    }else{
                        $botones = '<div class="btn-group">
                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">
                                    <i class="fa fa-plus"></i>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#" class="btnPadreAgrup" color="'.$_POST['color'].'"  nivel="'.$_POST['nivel'].'" padre="'.$fila['acum_id'].'" data-toggle="modal" id="addplus" >Agrupador</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#" class="btnPadreMAtrix"  color="'.$_POST['color'].'"  nivel="'.$_POST['nivel'].'" padre="'.$fila['acum_id'].'" data-toggle="modal">Matriz</a></li>
                                </ul>
                            </div>';
                      
                    }
                    $table .= '<tr style="color: '.$_POST['color'].';"  id="'.$fila['acum_id'].'">
                              <td style="text-align:justify;" class="col-md-1">'.$_POST['nivel'].'</td>
                              <td style="text-align:justify;" class="col-md-1">'.$fila['acum_sigla'].'</td>
                              <td style="text-align:justify;" class="col-md-4">'.$fila['acum_descripcion'].'</td>
                              <td style="text-align:justify;" class="col-md-1">Un</td>
                              <td style="text-align:justify;" class="col-md-1">1</td>
                              <td style="text-align:justify;" class="col-md-1">100 $</td>
                              <td style="text-align:justify;" class="col-md-1">100 $</td>
                              <td style="text-align:justify;" class="col-md-3">
                                  <button class="btn btn-success btn-mini editar" ids="'.$fila['acum_id'].'" ><i class="fa fa-edit"></i></button>
                                  <button class="btn btn-danger btn-mini eliminar" proyect ="'.$_POST['proyectId'].'" ids="'.$fila['acum_id'].'" ><i class="fa fa-trash-o"></i></button>   
                                  '.$botones.'
                              </td>
                          </tr>';
                }

                $retir['success'] = "1";
                $retir['resultado'] = $table;
                echo json_encode($retir);

            }else{
                $retir = array();
                $retir['success'] = "0";
                $retir['resultado'] = "No se pudo insertar los datos, ocurrio un error!";
                echo json_encode($retir);
            }
        }else{
            $retir = array();
            $retir['success'] = "0";
            $retir['resultado'] = "No se pudo insertar los datos, los campos son obligatorios!!";
            echo json_encode($retir);
        }

      }


    function eliminarAgrupadorHijo(){
        $datos = array('acum_estado_id' => 2);

        $this->load->Model('Presupuestos_model');
        $resultado = false;
        if($_POST['id'] != '0'){
            $resultado = $this->Presupuestos_model->updateproyects($_POST['id'], 'acum_id', "mp_acumuladores", $datos);
        }
        
        if( $resultado ){
             
              $table .=" </tbody></table>";
              $retir['success'] = "1";
              $retir['resultado'] = $table;
              echo json_encode($retir);

          }else{
              $retir = array();
              $retir['success'] = "0";
              $retir['resultado'] = "No se pudo insertar los datos, ocurrio un error!";
              echo json_encode($retir);
          }
      }

    function InsertarMatriz(){
        if(isset($_POST['Descripcion']) && isset($_POST['padre']) && isset($_POST['ClaveMat']) && isset($_POST['Numero'])){
            $this->load->helper('date');
            $datestring = "%Y-%m-%d";
            $dring = mdate($datestring);


            $datos = array(
                              'mat_descripcion' => $_POST['Descripcion'],
                              'mat_cantidad' => $_POST['Numero'],
                              'mat_acum_id' => $_POST['padre'],
                              'mat_fecha_' => $dring,
                              'mat_estado_' => 1,
                              'mat_clave' => $_POST['ClaveMat']);

            $this->load->Model('Presupuestos_model');
            $resultado = false;
            if($_POST['id'] != '0'){
                $resultado = $this->Presupuestos_model->updateproyects($_POST['id'], 'mat_id', "mp_matrizes", $datos);
            }else{
                $resultado = $this->Presupuestos_model->insertProyects($datos, "mp_matrizes");
            }
            if( $resultado ){
                $table = '';
                $row = $this->Presupuestos_model->getDatosMatrizdats($dring, $_POST['ClaveMat'],  $_POST['padre']);
                while($fila = mysql_fetch_array($row)){ 
                      $table .='<tr>
                                  <td style="text-align:justify;" class="col-md-1" >MATR</td>
                                  <td style="text-align:justify;" class="col-md-1" >'.$fila['mat_clave'].'</td>
                                  <td style="text-align:justify;" class="col-md-4">'.$fila['mat_descripcion'].'</td>
                                  <td style="text-align:justify;" class="col-md-1" >Un</td>
                                  <td style="text-align:justify;" class="col-md-1" >'.$fila['mat_cantidad'].'</td>
                                  <td style="text-align:justify;" class="col-md-1">0 $</td>
                                  <td style="text-align:justify;" class="col-md-1"> 100 $</td>
                                  <td style="text-align:justify;" class="col-md-3">
                                      <button class="btn btn-success btn-mini editar" ids="'.$fila['mat_id'].'" ><i class="fa fa-edit"></i></button>
                                      <button class="btn btn-danger btn-mini eliminar" ids="'.$fila['mat_id'].'" ><i class="fa fa-trash-o"></i></button>   
                                      <div class="btn-group">
                                          <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">
                                              <i class="fa fa-plus"></i>
                                              <span class="sr-only">Toggle Dropdown</span>
                                          </button>
                                          <ul role="menu" class="dropdown-menu">
                                              <li><a href="#" class="btninsumoC" padre="'.$fila['mat_id'].'" data-toggle="modal">I Compuesto</a></li>
                                              <li><a href="#" class="btninsumoB" padre="'.$fila['mat_id'].'" data-toggle="modal">I Basico</a></li>
                                          </ul>
                                      </div>
                                  </td>
                              </tr>';
                }

                
                $retir['success'] = "1";
                $retir['resultado'] = $table;
                echo json_encode($retir);

            }else{
                $retir = array();
                $retir['success'] = "0";
                $retir['resultado'] = "No se pudo insertar los datos, ocurrio un error!";
                echo json_encode($retir);
            }
        }else{
            $retir = array();
            $retir['success'] = "0";
            $retir['resultado'] = "No se pudo insertar los datos, los campos son obligatorios!!";
            echo json_encode($retir);
        }
    }  

}

