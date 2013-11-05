<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entretenimentos extends CI_Controller {

	/**
	 * entretenimento
	 */

	/* Construtor
	=========================================================== */
	public function __construct()
	{
		parent::__construct();

		// Carrega o model cinema
		$this->load->model('Entretenimento_model', 'entretenimento');
	}

	public function index()
	{	
		// Titulo da página
		$seo['titulopag'] = "entretenimentos | Guia Saiba Mais";

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
			array('name' => 'og:title', 'content' => 'entretenimentos | Guia Saiba Mais', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('entretenimento'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		// Publicidade top
		$dados['pub_top'] = $this->entretenimento->get_publicidade('top', 'entretenimento');

		// Chamadas entretenimentos pequena top
		$dados['chamada_p_top'] = $this->entretenimento->get_chamada('pequena', 'entretenimento', 3);

		// Chamadas entretenimentos pequena top
		$dados['chamada_p_bot'] = $this->entretenimento->get_chamada('pequena', 'entretenimento', 2, 3);

		// Chamadas entretenimentos Slider default
		$dados['chamada_entre_s'] = $this->entretenimento->get_chamada('slider', 'entretenimento', 3);

		// Chamadas entretenimentos média
		$dados['chamada_entre_m'] = $this->entretenimento->get_chamada('media', 'entretenimento', 4);

		// Chamadas entretenimentos Slider full
		$dados['chamada_entre_s_f'] = $this->entretenimento->get_chamada('slider-full', 'entretenimento', 3);

		// Chamadas entretenimentos média plus
		$dados['chamada_entre_m_p'] = $this->entretenimento->get_chamada('media', 'entretenimento', 4, 4);

		// Chamadas entretenimentos média Full
		$dados['chamada_entre_m_f'] = $this->entretenimento->get_chamada('media', 'entretenimento', 1, 8);

		// Publicidade conteudo bottom
		$dados['pub_contentbot'] = $this->entretenimento->get_publicidade('conteudo-bottom', 'entretenimento');

		// Chamadas entretenimentos média
		$dados['chamada_entre_m_2'] = $this->entretenimento->get_chamada('media', 'entretenimento', 4, 9);

		// Publicidade conteudo bottom
		$dados['pub_bottom'] = $this->entretenimento->get_publicidade('bottom', 'entretenimento');

		// Publicidade conteudo bottom
		$dados['pub_sidebar'] = $this->entretenimento->get_publicidade('sidebar', 'entretenimento');

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteudo
		$this->load->view('entretenimento/inicial-entretenimento', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}
}