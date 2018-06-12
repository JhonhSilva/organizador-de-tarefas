<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioController extends CI_Controller {
    
    // construtor do controller
    // Jhonathan Silva
    function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model');
		require_once APPPATH."/models/Usuario.php";
	}
	
	// função para renderização da página de cadastro de usuário
    // Jhonathan Silva
	public function Get()
	{
	    $this->load->view('includes/header');
		$this->load->view('UsuarioCadastrarView');
		$this->load->view('includes/footer');
	}
	
	// função para cadastrar usuário
    // Jhonathan Silva
	public function Cadastrar() 
	{
		$this->load->library('form_validation');

		$nome = $this->input->post("nome");
	    $email = $this->input->post("email");
	    $senha = $this->input->post("senha");
	    

        $this->form_validation->set_rules('email', 'email', 'is_unique[usuario.usuario_email]');
	    
	    if (!$this->form_validation->run()) {
            $this->session->set_flashdata('msgErro', 'O email já existe');
            redirect('usuario/cadastro');
		} else {
	    	if(isset($nome) and isset($email) and isset($senha)) {
		    	$usuario = new Usuario($nome, $email, $senha);
		    	$this->Usuario_model->insert($usuario);
		    	
		    	$dados = array();
		    	$dados['login'] = $usuario->getEmail();
		    	$dados['senha'] = $usuario->getSenha();
		    	
		    	redirect('usuario/logar', $dados);
			}
	    }
    }
    
    // função para editar usuário
    // Jhonathan Silva
    public function Edicao() {
    	
    	$id = $this->session->userdata['usuario_id'];
    	
    	if(isset($id)) {
    		$usuario = $this->Usuario_model->select($id);
    		$dados = array();
    		$dados['nome'] = $usuario["usuario_nome"];
    		$dados['email'] = $usuario["usuario_email"];
    		
    		$this->load->view('includes/header');
			$this->load->view('UsuarioEditarView', $dados);
			$this->load->view('includes/footer');
    	}
    	else {
    		echo "<h1>Deu ruim!</h1>";
    	}
    }
}
