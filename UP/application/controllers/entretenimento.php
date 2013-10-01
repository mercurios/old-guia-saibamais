<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entretenimento extends CI_Controller {

	/**
	 * Entretenimento
	 */

	/* Construtor
	=========================================================== */
	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		// Titulo da página
		$seo['titulopag'] = "Entretenimentos | Guia Saiba Mais";

		// Meta tags
		$seo['meta'] = array(
			array('name' => 'language', 'content' => 'pt-br'),
			array('name' => 'description', 'content' => 'Descrição de lanchonetes'),
			array('name' => 'keywords', 'content' => 'Key, key'),
			array('name' => 'author', 'content' => 'Mercurios'),
			array('name' => 'googlebot', 'content' => 'ALL'),
			array('name' => 'robots', 'content' => 'ALL'),
			array('name' => 'viewport', 'content' => 'width=device-width; initial-scale=1.0')
		);

		// Meta tags facebook
		$seo['metaface'] = array(
			array('name' => 'og:title', 'content' => 'lanchonetes | Guia Saiba Mais', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('lanchonete'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteudo
		$this->load->view('entretenimento/inicial-entretenimento');

		// Carrega o rodape
		$this->load->view('includes/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */