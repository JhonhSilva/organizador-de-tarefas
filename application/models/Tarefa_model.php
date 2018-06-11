<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarefa_model extends CI_Model {

    /* Retorna todas as tarefas com base no ID

       Gabriel Craveiro
    */
    public function getTarefas($usuario_id, $tabela) {
        if (isset($usuario_id) && isset($tabela))
        {
            $this->db->where('usuario_id', $usuario_id); 
            $this->db->order_by('tarefa_id desc');
            $this->db->order_by('status_id desc');
            
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
    
    /* 
        Retorna total de tarefas
    */
    
    public function getCount($usuario_id, $tabela) {
        if (isset($usuario_id) && isset($tabela))
        {
            $select =   array(
                '*',
                'count(tarefa_id) as total'
            );  
            $this->db->select($select);
            $this->db->where('usuario_id', $usuario_id); 

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
    
    /* Retorna uma tarefa com base no ID

       Gabriel Craveiro
    */
    
    public function getTarefaIndividual($tarefa_id, $tabela) {
        if (isset($tarefa_id) && isset($tabela))
        {
            $this->db->where('$tarefa_id', $tarefa_id); 

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
    
    /* Pega os dados da tarefa do controller e realiza
       um update na base, atualizando o status entre 1 ou 2.
    
       Gabriel Craveiro
    */
    
    public function atualizarStatusTarefa($id, $tabela, $dados)
    {
        if (isset($id) && isset($tabela) && is_array($dados))
        {
            $this->db->where('tarefa_id', $id);
            return $this->db->update($tabela, $dados);
        }
        return FALSE;
    }
    
    /* 
        Filtrar tarefas da home,
            1 - Todas
            2 - Em progresso
            3 - Concluidas
            
        Gabriel Craveiro
    */
    public function filtrarTarefas($usuario_id, $tabela, $filtragem) {
        if (isset($usuario_id) && isset($tabela) && isset($filtragem))
        {
            $array = array('usuario_id' => $usuario_id, 'status_id' => $filtragem);

            $this->db->where($array);
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
    
    /* 
        Remove tarefa com base no id da mesma
    
        Gabriel Craveiro
    */
    
    public function deletarTarefa($tarefa_id, $tabela) {
        if (isset($tarefa_id) && isset($tabela))
        {
            $this->db->where('tarefa_id', $tarefa_id);

            return $query = $this->db->delete($tabela);; 
        }
        return FALSE;
    }
    
	/*
		Cria uma tarefa com base na descrição e datas passadas
		
		Gabriel Craveiro
	*/
	
	public function criarTarefa($tabela, $dados) {
        if (isset($tabela) && is_array($dados))
        {
            return $this->db->insert($tabela, $dados);
        }
        return FALSE;
	}
}
