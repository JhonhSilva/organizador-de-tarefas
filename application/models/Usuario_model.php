<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	private $email, $senha, $id;
    
    public function Usuario($nome, $senha, $id=0){
        $this->nome = $nome;
        $this->senha = $senha;
        $this->id = $id;
    }
    
    public function toArray(){
        $aux = array();
        $aux["email"] = $this->email;
        $aux["senha"] = $this->senha;
        $aux["id"] = $this->id;
        return $aux;
    }
    
    public function login($login, $senha, $tabela)
    {
        if (isset($login) && isset($senha) && isset($tabela))
        {
            $this->db->where('usuario_email', $login);
            $this->db->where('usuario_senha', $senha);
            $query = $this->db->get($tabela);

            if ($query->num_rows() > 0)
            {
                return $query->row_array();
            }
            return NULL;
        }
        return FALSE;
    }
}
