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
		$this->load->view('includes/menu', $arrayTarefas);
		$this->load->view('Tarefa', $arrayTarefas);
		$this->load->view('includes/footer');
		
	}
	
	/*
		Função para retornar a página de cadastro.

	*/
	public function GetCadastrar()
	{
		$this->verificar_sessao();

    	$usuario_id = $this->session->userdata('usuario_id');
    	$tabela = "tarefa";
    	
    	$arrayTarefas['tarefas'] = $this->Tarefa_model->getTarefas($usuario_id, $tabela);

		$this->load->view('includes/header');
		$this->load->view('includes/menu', $arrayTarefas);
		$this->load->view('CriarTarefa', $arrayTarefas);
		$this->load->view('includes/footer');
		
	}
		
	/*
		Filtra tarefas com base no status_id da tarefa,
		o status é passado pelo dropdown da pagina de tarefas
		
		Gabriel Craveiro
	*/
	public function filtrarTarefas() {
		$this->verificar_sessao();
		
		$usuario_id = $this->session->userdata('usuario_id');
		$tipoFiltragem = $this->uri->segment(3);
		
		$tabela = "tarefa";
		
		
		if ($tipoFiltragem == 0) {
			$arrayTarefas['tarefas'] = $this->Tarefa_model->getTarefas($usuario_id, $tabela);
		} else {
			$arrayTarefas['tarefas'] = $this->Tarefa_model->filtrarTarefas($usuario_id, $tabela, $tipoFiltragem);
		}

		$this->load->view('includes/header');
		$this->load->view('includes/menu', $arrayTarefas);
		$this->load->view('Tarefa', $arrayTarefas);
		$this->load->view('includes/footer');
	}
	/*
		Deleta uma tarefa após confirmação,
		é feito a deleção com base na id da tarefa
		
		Gabriel Craveiro
	*/
	public function deletarTarefa() {
		$this->verificar_sessao();

		$tarefa_id = $this->uri->segment(3);

		$tabela = "tarefa";

		$this->Tarefa_model->deletarTarefa($tarefa_id, $tabela);
		
		redirect('usuario/tarefas');
	}
	
	/*
		Cadastra uma tarefa com base na descrição e datas passadas
		
		Gabriel Craveiro
	*/
	
	public function cadastrarTarefa() {
		$this->verificar_sessao();
		
		$usuario_id = $this->session->userdata('usuario_id');
		$nome = $this->input->post("nomeTarefa");
        $dataEntrega = $this->input->post("dataEntrega");
        
		$dataCriacao = date('Y-m-d');
		
		$tabela = "tarefa";
		
		$dados = array(
			'usuario_id' => $usuario_id,
			'tarefa_descricao' => $nome,
			'tarefa_data_termino' => $dataEntrega,
			'status_id' => 2,
			'tarefa_data_de_criacao' => $dataCriacao
		);

		$this->Tarefa_model->criarTarefa($tabela, $dados);
		
		redirect('usuario/tarefas');
	}
	
	/*
		Função para retornar a página de cadastro.

	*/
	public function GetEditar()
	{
		$this->verificar_sessao();

    	$usuario_id = $this->session->userdata('usuario_id');
    	$tarefa_id = $this->uri->segment(3);
    	$tarefa_nome = $this->uri->segment(4);
    	$tabela = "tarefa";
    	
    	$arrayTarefas['tarefas'] = $this->Tarefa_model->getTarefas($usuario_id, $tabela);
    	$arrayTarefas['tarefa_id'] = $tarefa_id;
    	$arrayTarefas['tarefa_nome'] = $tarefa_nome;

		$this->load->view('includes/header');
		$this->load->view('includes/menu', $arrayTarefas);
		$this->load->view('EditarTarefa', $arrayTarefas);
		$this->load->view('includes/footer');
		
	}
	
	
	/*
		Edita uma tarefa com base na id passada pela view de tarefas
		
		Gabriel Craveiro
	*/
	
	public function editarTarefa() {
		$this->verificar_sessao();
		
		$usuario_id = $this->session->userdata('usuario_id');
		$tarefa_id = $this->uri->segment(3);
		$nome = $this->input->post("nomeTarefa");
        $dataEntrega = $this->input->post("dataEntrega");
        
		$dataCriacao = date('Y-m-d');
		
		$tabela = "tarefa";
		
		$dados = array(
			'usuario_id' => $usuario_id,
			'tarefa_descricao' => $nome,
			'tarefa_data_termino' => $dataEntrega,
			'status_id' => 2,
			'tarefa_data_de_criacao' => $dataCriacao
		);

		$this->Tarefa_model->editarTarefa($tabela, $dados, $tarefa_id);
		
		redirect('usuario/tarefas');
	}
}
