<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    }

	public function Get()
	{
		$this->load->view('includes/header');
		$this->load->view('LoginView');
		$this->load->view('includes/footer');
	}
	
    /* 
      Função para realizar o login passando os dados do formulário
       da view usuario/login para a model

       Gabriel Craveiro
    */
	
	public function Logar() {
		$login = $this->input->post("login");
        $senha = $this->input->post("senha");

        $tabela = "usuario";

        $dadosLogin = $this->Usuario_model->login($login, $senha, $tabela);

        if (empty($dadosLogin))
        {
            $this->session->userdata('Email ou senha inválidos');
            redirect('usuario/home');
        } else
        {
            $dados = array(
                'logado' => TRUE,
                'nome' => $dadosLogin['usuario_nome'],
                'usuario_id' => $dadosLogin['usuario_id']
            );

            $this->session->set_userdata($dados);

            redirect('usuario/tarefas');
        }
    
	}
	
	/* 
	    Função para deslogar removendo a session do usuário e redirecionando para a home
	    
	    Gabriel Craveiro
	*/
    public function Logout()
    {
        $this->session->sess_destroy();
        redirect('usuario/home','refresh'); 
    }
}
