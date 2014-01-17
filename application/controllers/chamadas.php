<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chamadas extends CI_Controller {

	/*************************************************
	 * 
	 * Chamadas construtor
	 * Carrega as funções do CI e o model Chamadas
	 * 
	**************************************************/
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Chamada_model', 'chamada');
	}

	/*************************************************
	 * 
	 * Método index
	 * Redireciona o usuário a página inicial
	 * 
	**************************************************/
	public function index()
	{	
		redirect('home');
	}

	/*************************************************
	 * 
	 * Método Detalhe
	 * Pega os dados passado por id
	 * 
	**************************************************/
	public function detalhe($_id)
	{
		$_dados['chamada'] = $this->chamada->get_chamada($_id);

		$this->load->view('chamadas/detalhe', $_dados);
	}
}