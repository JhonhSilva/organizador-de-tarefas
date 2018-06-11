<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioController extends CI_Controller {
    
    // construtor do controller
    // Jhonathan Silva
    function __construct()
	{
		parent::__construct();
		$this->load->model('Tarefa_model');
	}
	
	// função para renderização da página de cadastro de usuário
    // Jhonathan Silva
	public function Get()
	{
	    $this->load->view('includes/header');
		$this->load->view('UsuarioCadastrarView');
		$this->load->view('includes/footer');
	}
}
