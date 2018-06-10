<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarefa_model extends CI_Model {

    /*
        Retorna todas as tarefas com base na id do usuário
    
    */
    public function getTarefas($usuario_id, $tabela)
    {
        if (isset($usuario_id) && isset($tabela))
        {
            $this->db->where('usuario_id', $usuario_id); 
            $this->db->order_by('tarefa_id desc');
            
            $query = $this->db->get($tabela);

            if ($query->num_rows() > 0)
            {
                return $query->result_array();
            } else
            {
                return NULL;
            }
        }
        return FALSE;
    }
}
