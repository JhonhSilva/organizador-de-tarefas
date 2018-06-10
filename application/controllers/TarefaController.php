<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TarefaController extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Tarefa_model');
	}


	public function verificar_sessao()
	{
		if (!$this->session->userdata('logado'))
		{
			redirect('usuario/logar');
		}
	}
	
	public function Get()
	{
		$this->verificar_sessao();
		
    	$usuario_id = $this->session->userdata('usuario_id');
    	$tabela = "tarefa";
    	
    	$dados['tarefas'] = $this->Tarefa_model->getTarefas($usuario_id, $tabela);
    	
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('Tarefa', $dados);
		$this->load->view('includes/footer');
	}
}
