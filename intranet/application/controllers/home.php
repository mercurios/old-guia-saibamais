<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		// Construtor
		parent::__construct();

		// Verifica se o usuario esta logado
		if (!$this->session->userdata('session_id') || !$this->session->userdata('logado'))
        {
                redirect('users');
        }
	}

	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('home/home');
		$this->load->view('includes/footer'); 
	}
}