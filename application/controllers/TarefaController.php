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
	
	/*
		Conclui uma tarefa pegando a id da tarefa e seu status, 
		tornando a tarefa ativa ou desativada.
	*/
	public function concluir()
	{
		$this->verificar_sessao();

		$id = $this->uri->segment(3);
		$status_id = $this->uri->segment(4) == 1 ? 2 : 1;

		$tabela = "tarefa";

		$dados = array(
			'status_id' => $status_id
		);

		$this->Tarefa_model->atualizarStatusTarefa($id, $tabela, $dados);
		
		redirect('usuario/tarefas');
	}
	
	/*
		Função para retornar a página de tarefas.
		Ao abrir a view retorna todas as tarefas do usuário
	
	*/
	public function Get()
	{
		$this->verificar_sessao();
		
    	$usuario_id = $this->session->userdata('usuario_id');
    	$tabela = "tarefa";
    	
    	$arrayTarefas['tarefas'] = $this->Tarefa_model->getTarefas($usuario_id, $tabela);
    	
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('Tarefa', $arrayTarefas);
		$this->load->view('includes/footer');
	}
}