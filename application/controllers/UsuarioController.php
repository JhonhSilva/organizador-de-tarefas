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
		$nome = $this->input->post("nome");
	    $email = $this->input->post("email");
	    $senha = $this->input->post("senha");
	    
	    if(isset($nome) and isset($email) and isset($senha)) {
	    	$usuario = new Usuario($nome, $email, $senha);
	    	$this->Usuario_model->insert($usuario);
	    }
	    else {
	    	echo '<h1>Error</h1>';
	    }
    }
}
