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
    public function insert(Usuario $usuario) {
        $this->db->insert($usuario->getClassName(), $usuario->toArray());
        return $this->db->insert_id();
    }
    
    // função de seleção de usuário
    // Jhonathan Silva
    public function select($id) {
        $this->db->select('*');
        $this->db->from(Usuario::getClassName());
        $this->db->where('usuario_id', $id);
        
        $query = $this->db->get();

        if ( $query->num_rows() > 0 ) {
            $row = $query->row_array();
            return $row;
        }
    }
    
    // função de atualização de usuário
    // Jhonathan Silva
    public function update(Usuario $usuario) {
        $this->db->set('usuario_nome', $usuario->getNome());
        $this->db->set('usuario_senha', $usuario->getSenha());
        $this->db->where('usuario_id', $usuario->getId());
        return $this->db->update(Usuario::getClassName());
    }
}
