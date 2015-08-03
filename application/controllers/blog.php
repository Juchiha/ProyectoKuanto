<?php if ( ! defined('BASEPATH'))exit('No direct script access allowed');
require_once APPPATH.'controllers/mensajes.php';

class Blog extends Mensajes{
	
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){

        $this->load->Model("Blog_model");
        $Lsql = $this->Blog_model->getPostpares();
        $Isql = $this->Blog_model->getPostImpares();
        $datos = array('datosImpares' => $Isql, 'datosPares' => $Lsql); 
       
        if(!$this->session->userdata('login_ok')){
           $this->load->view('Blog/blogOffLogin', $datos);
        }else{
            $this->load->view('Blog/blogOnLogin', $datos);
        }
    }


    public function verEntrada($id, $donde = null){
        $this->load->Model("Blog_model");
        $Lsql = $this->Blog_model->getentradasbyId($id);
        if($donde != null){
            $this->load->model("Notificaciones_model");
            $dat = array('not_estado' => 0);
            $this->Notificaciones_model->update($dat, $donde);
        }
        $datos = array('entrada' => $Lsql);
        if(!$this->session->userdata('login_ok')){
           $this->load->view("Blog/verblogOffline", $datos);
        }else{
            $this->load->view("Blog/verblog", $datos);
        }

    }


    public function verentradas(){
        if(!$this->session->userdata('login_ok')){
            redirect('login', 'refresh');
        }else{
            $this->load->model('Blog_model');
            $blogEntradas = null;
            if($this->session->userdata('tipo_user') == "Direccion"){
                $blogEntradas = $this->Blog_model->getentradas();
            }else{
                $blogEntradas = $this->Blog_model->getmisentradas($this->session->userdata('userId'));
            }
            $data = array('blogPost' => $blogEntradas);
            $this->load->view('Blog/entradas', $data);
        }
    }

    public function editar($id){
        $Lsql = mysql_query("SELECT * FROM mp_post WHERE pos_estado_id = 1 and pos_id = ".$id);
        $datos = array('datos' => $Lsql); 
        $this->load->view('Blog/editEntrada', $datos);
    }


    public function create(){
        $this->load->view('Blog/addEntrada');
    }


    public function createPostCompartdo(){
        $titulo      = $_POST['titulo'];
        $descripcion = $_POST['Descripcion'];
        $imagen      = $_POST['imagens'];
        $post        = $_POST['editor1'];

        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $dring = mdate($datestring);

        $idUser = $this->session->userdata('userId');

        $fileName = str_replace(' ', '', $imagen);

        $datos = array( 'pos_titulo'        => $titulo,
                        'pos_descripcion'   => $descripcion,
                        'pos_contenido'     => $post,
                        'pos_imagen'        => $fileName,
                        'pos_fecha'         => $dring,
                        'pos_estado_id'     => 1,
                        'pos_articulo'      => 1,
                        'pos_emp_id'        => $this->session->userdata('userId')
                     );
        $this->load->model('Blog_model');
        if($this->Blog_model->insert($datos)){
            echo "ok";
        }
    }

    public function createPost(){
        $titulo      = $_POST['titulo'];
        $descripcion = $_POST['Descripcion'];
        //$imagen      = $_POST['filaInput'];
        $post        = $_POST['editor1'];

        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $dring = mdate($datestring);

        $idUser = $this->session->userdata('userId');
        $target_path = "/home/kefrensantiago/public_html/Images/post/";
        $target_path = $target_path . 'Post'.$idUser."_".basename($_FILES['filaInput']['name']); 
        $target_path = str_replace(' ', '', $target_path);

        copy($_FILES['filaInput']['tmp_name'], $target_path);
        $fileName =   'Post'.$idUser."_".basename($_FILES['filaInput']['name']);
        $fileName = str_replace(' ', '', $fileName);

        $datos = array( 'pos_titulo'        => $titulo,
                        'pos_descripcion'   => $descripcion,
                        'pos_contenido'     => $post,
                        'pos_imagen'        => $fileName,
                        'pos_fecha'         => $dring,
                        'pos_estado_id'     => 1,
                        'pos_emp_id'        => $this->session->userdata('userId')
                     );
        $this->load->model('Blog_model');
        if($this->Blog_model->insert($datos)){
            $this->load->model('Users_Model');


            $email_subject = "Nuevos Post en el Blog de Kuanto.info";
                
            $email_message = "Hola, esperemos estes bien!!!  \n";
            $email_message .= "Te enviamos este correo para comunicarte que varios usuarios crearon nuevas entradas en nuestro blog. \n";
            $email_message .= "  y queremos que te enteres de las ultimas noticias en el sector de la construcción \n ";
            $email_message .= " Sigue atento a nuestras publicaciones, para que estes al tanto.\n";
            $email_message .= " http://Kuanto.info/blog.\n";
            $email_message .= "Saludos \n";
            $email_message .= "Esperamos la pases bien y disfrutes de tu comunidad de construccion http://kuanto.info ... \n";
            $email_message .= "Atentamente \n";
            $email_message .= "Teknocom S de RL de CV.\n";

            $rows = $this->Users_Model->getCorreoUsuarioAdmin();
            while($fila = mysql_fetch_array($rows)){
                $this->EnvioMensajesal($fila['emp_correo'], $email_subject, $email_message);
            }
            redirect('blog/verentradas', 'refresh');
        }
    }

    public function editPost(){
        $titulo      = $_POST['titulo'];
        $descripcion = $_POST['Descripcion'];
        //$imagen      = $_POST['filaInput'];
        $post        = $_POST['editor1'];

        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $dring = mdate($datestring);

        $idUser = $this->session->userdata('userId');

    
        $target_path = "/home/kefrensantiago/public_html/Images/post/";
        $target_path = $target_path . 'Post'.$idUser."_".basename($_FILES['filaInput']['name']); 
        $target_path = str_replace(' ', '', $target_path);
        $datos = null;
        if($_POST['imagen'] == "NO"){
            $datos = array( 'pos_titulo'        => $titulo,
                            'pos_descripcion'   => $descripcion,
                            'pos_contenido'     => $post,
                            'pos_fecha'         => $dring,
                            'pos_estado_id'     => 1,
                            'pos_emp_id'        => $this->session->userdata('userId')
                         );
        }else{
            copy($_FILES['filaInput']['tmp_name'], $target_path);
            $fileName =   'Post'.$idUser."_".basename($_FILES['filaInput']['name']);
            $fileName = str_replace(' ', '', $fileName);

            if($fileName == null){
               $fileName = $imagen;
            }
           

            $datos = array( 'pos_titulo'        => $titulo,
                            'pos_descripcion'   => $descripcion,
                            'pos_contenido'     => $post,
                            'pos_imagen'        => $fileName,
                            'pos_fecha'         => $dring,
                            'pos_estado_id'     => 1,
                            'pos_emp_id'        => $this->session->userdata('userId')
                         );
        }
        
        $this->load->model('Blog_model');
        if($this->Blog_model->update($datos, $_POST['id'])){
            redirect('blog/verentradas', 'refresh');
        }
    }

    function eliminarPost($id){
        $this->load->model('Blog_model');
        $datos = array('pos_estado_id' => 2);
        if($this->Blog_model->update($datos, $id)){
            redirect('blog/verentradas', 'refresh');
        }    
    }

    function _create_thumbnail($filename){
        $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = "/home/kefrensantiago/public_html/Images/post/".$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $config['new_image']='/home/kefrensantiago/public_html/Images/post/thumbs/';
        $config['width'] = 250;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }


    function like(){
        $idPost = $_POST['id'];
        $user = $this->session->userdata('userId');
        $nombres = $this->session->userdata('nombres');
        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $dring = mdate($datestring);

        $datestring1 = "%Y-%m-%d %H-%s-%i";
        $dring1 = mdate($datestring1);

        $datos = array('lik_emp_id' => $user, 'lik_pos_id' => $idPost, 'lik_fecha' => $dring, 'lik_estado_id' => 1);
        $this->load->model("Blog_model");
        if($this->Blog_model->likes($datos)){

            //aca inserto la notificación de que alguien a dado like a su post.
            $this->load->model('Notificaciones_model');
            $notificacion = array(
                    'not_emp_id'        => $user,
                    'not_descripcion'   => 'A '.$nombres.' le gusta tu publicaci&oacute;n',
                    'not_estado'        => 1,
                    'not_pos_id'        => $idPost,
                    'not_fecha'         => $dring1
                );
            $this->Notificaciones_model->insert($notificacion);

            //si la respuesta es true, debuelve un mensaje de correcto.
            $respuests = array();
            $respuests['success'] = 1;
            $respuests['msg'] = 'Like!!!';
            echo json_encode($respuests);
        }else{
            $respuests = array();
            $respuests['success'] = 0;
            $respuests['msg'] = 'Lo siento ocurrio un error, intentalo de nuevo mas tarde';
            echo json_encode($respuests);
        }
    }

    function nolike(){
        $idPost = $_POST['id'];
        $user = $this->session->userdata('userId');
        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $dring = mdate($datestring);

        $datos = array('lik_estado_id' => 2);
        $this->load->model("Blog_model");
        if($this->Blog_model->noLikes($idPost,$user, $datos)){
            $respuests = array();
            $respuests['success'] = 1;
            $respuests['msg'] = 'Des Like!!!';
            echo json_encode($respuests);
        }else{
            $respuests = array();
            $respuests['success'] = 0;
            $respuests['msg'] = 'Lo siento ocurrio un error, intentalo de nuevo mas tarde';
            echo json_encode($respuests);
        }
    }

    public function comentar(){
        $idPost = $_POST['id'];
        $user = $this->session->userdata('userId');
        $nombres = $this->session->userdata('nombres');
        $post = $_POST['post'];

        $this->load->helper('date');
        $datestring = "%Y-%m-%d";
        $dring = mdate($datestring);

        $datestring1 = "%Y-%m-%d %H-%s-%i";
        $dring1 = mdate($datestring1);
        
        $datos = array('com_user_id' => $user, 'com_pos_id' => $idPost, 'com_descripcion' => $post, 'com_fecha' => $dring, 'com_estado_id' => 1);
        $this->load->model("Blog_model");
        if($this->Blog_model->comentar($datos)){

            $this->load->model('Notificaciones_model');
            $notificacion = array(
                    'not_emp_id'        => $user,
                    'not_descripcion'   => $nombres.' a comentado tu publicaci&oacute;n',
                    'not_estado'        => 1,
                    'not_pos_id'        => $idPost,
                    'not_fecha'         => $dring1
                );
            $this->Notificaciones_model->insert($notificacion);

            $respuests = array();
            $respuests['success'] = 1;
            $respuests['msg'] = 'Comentado!!!';
            echo json_encode($respuests);
        }else{
            $respuests = array();
            $respuests['success'] = 0;
            $respuests['msg'] = 'Lo siento ocurrio un error, intentalo de nuevo mas tarde';
            echo json_encode($respuests);
        }

    }

    function comentarios($id){
        $this->load->Model('Blog_model');
        $comentarios = $this->Blog_model->getcomentsByPost($id);
        $datos = array('post' => $comentarios, 'id' => $id);
        $this->load->view('Blog/comentarios', $datos);
    }


    function eliminarComentario($id, $post){
        $this->load->Model('Blog_model');
        $datos = array('com_estado_id' => 2);
        if($this->Blog_model->updateComent($datos, $id)){
            redirect('blog/comentarios/'.$post, 'redirect');
        }else{
            redirect('blog/comentarios'.$post, 'redirect');   
        }
    }

    function getLikes(){
        $posId = $_POST['id'];
        $this->load->Model('Blog_model');
        $Count = $this->Blog_model->getCountLikes($posId);
        $respuesta =  array('response' => $Count );
        echo json_encode($respuesta);
    }

    function getNotificaciones(){
        $this->load->Model("Notificaciones_model");
        $res = $this->Notificaciones_model->getNotificaciones($this->session->userdata('userId'));
        $totla = $this->Notificaciones_model->countNotificaciones($this->session->userdata('userId'));
        $coun  = array('notificaciones' => $res, 'totalMensajes' => $totla );
        $this->load->view("Blog/notificaciones", $coun);
    }
}
?>