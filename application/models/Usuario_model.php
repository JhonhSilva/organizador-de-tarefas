<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
    
    /* Realiza o login do usuário com base no login e senhaID

       Gabriel Craveiro
    */
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
    
    // função de inserção de usuário
    // Jhonathan Silva
    public function insert($usuario) {
        $this->db->insert($usuario->getClassName(), $usuario->toArray());
    }
}
