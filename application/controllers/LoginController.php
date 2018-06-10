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
	
	public function Logar() {
		$login = $this->input->post("login");
        $senha = $this->input->post("senha");

        $tabela = "usuario";

        $dadosLogin = $this->Usuario_model->login($login, $senha, $tabela);

        if (empty($dadosLogin))
        {
            $this->session->userdata('Email ou senha inválidos');
            redirect('usuario/logar');
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
	
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('usuario/logar');
    }
	
	public function Cadastrar() {
		$user_login = $this->input->post("login");
        $user_password = $this->input->post("senha");
        
        if($user_login != null and $user_password != null) {
        	echo $user_login;
			echo $user_password;
        }
        else
	        redirect('usuario/logar', true);
        	// $this->load->view('LoginView');
	}
}
