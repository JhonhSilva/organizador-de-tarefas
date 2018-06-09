<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginDao extends CI_Model {
    public function getUser($email,$senha){
            $this->db->where('email',$email);
		    $this->db->where('senha',$senha);
		    
		    $usr = $this->db->get('Usuario');
		    
		    require_once APPPATH."models/usuario_model.php";
		    if ($usr->num_rows()>0){
		        $usuario = $usr->result()[0];
		        $id = $usuario->id;
		        $emailUsu = $usuario->email;
		        $senhaUsu = $usuario->senha;
		        return new Usuario($nome,$emailUsu,$id);
            }else{
                return null;
            }
    }
}