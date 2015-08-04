<?php
class Blog_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function insert($data){
    	return $this->db->insert('mp_post', $data);
    }

    function update($data, $id){
        $this->db->where('pos_id', $id);
        return $this->db->update('mp_post', $data);
    }

    function likes($datos){
        return $this->db->insert('mp_likes', $datos);
    }

    function noLikes($postid, $empid, $datos){
        $this->db->where('lik_pos_id', $postid);
        $this->db->where('lik_emp_id', $empid);
        return $this->db->update('mp_likes', $datos);
    }


    function comentar($datos){
        return $this->db->insert('mp_comentarios', $datos);
    }

    function updateComent($datos, $id){
        $this->db->where('com_id', $id);
        return $this->db->update('mp_comentarios', $datos);
    }

    function getmisentradas($id){
        $Lsql = "SELECT * FROM mp_post WHERE pos_estado_id = 1 AND pos_emp_id = ".$id." ORDER BY pos_fecha DESC";
        return mysql_query($Lsql);
    }

    function getentradas(){
        $Lsql = "SELECT * FROM mp_post JOIN mp_empresa ON emp_id = pos_emp_id  WHERE pos_estado_id = 1  ORDER BY pos_fecha DESC";
        return mysql_query($Lsql);
    }

    function getentradasbyId($id){
        $Lsql = "SELECT * FROM mp_post JOIN mp_empresa ON emp_id = pos_emp_id WHERE pos_estado_id = 1  ANd pos_id = ".$id;
        return mysql_query($Lsql);
    }


    function getcomentsByPost($idpos){
        $Lsql = "SELECT com_id, com_pos_id, com_descripcion, CONCAT(emp_nombre,' ',emp_apellido) AS usuario, emp_imagen, com_fecha
                FROM mp_comentarios
                JOIN mp_empresa ON emp_id = com_user_id
                WHERE com_pos_id =".$idpos." AND com_estado_id = 1";
        return mysql_query($Lsql);
    }

    function getPostImpares($inicio, $fin){
    	$Lsql = "SELECT * FROM mp_post JOIN mp_empresa ON emp_id = pos_emp_id WHERE pos_estado_id = 1 AND mod(pos_id, 2) <> 0 order by pos_id DESC limit ".$inicio.", ".$fin;
    	return mysql_query($Lsql);
    }

    function getPostPares($inicio, $fin){
    	$Lsql = "SELECT * FROM mp_post JOIN mp_empresa ON emp_id = pos_emp_id WHERE pos_estado_id = 1 AND mod(pos_id, 2) = 0  order by pos_id DESC limit ".$inicio.", ".$fin;
    	return mysql_query($Lsql);
    }

    function getlikemio($idpost, $iduser){
        $Lsql = "SELECT * FROM mp_likes WHERE  lik_estado_id = 1 AND lik_emp_id = ".$iduser." AND lik_pos_id = ".$idpost;
        $cossulta = mysql_query($Lsql);
        return mysql_num_rows($cossulta);
    }

    function getCountLikes($idpost){
        $Lsql = "SELECT * FROM mp_likes WHERE lik_pos_id = ".$idpost." AND lik_estado_id = 1";
        $cossulta = mysql_query($Lsql);
        return mysql_num_rows($cossulta);
    }

   
}
 ?>