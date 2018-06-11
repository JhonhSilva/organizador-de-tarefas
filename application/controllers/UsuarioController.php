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
}
