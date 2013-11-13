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

	// Lista categorias
	public function categoria($categoria = NULL)
	{	
		$_categoria = $this->uri->segment(3);

		$this->load->library('mybreadcrumb');

		// Dados
		$dados['bread'] 		= $this->mybreadcrumb->bread_restaurante($_categoria);
		$dados['conteudos'] 	= $this->entretenimento->listar_resultados($_categoria);
		$dados['pub_top'] 		= $this->entretenimento->get_publicidade('top', 'entretenimento');
		$dados['pub_bottom'] 	= $this->entretenimento->get_publicidade('bottom', 'entretenimento');	

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
			array('name' => 'og:title', 'content' => 'entretenimentos | Guia Saiba Mais', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('entretenimento'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteudo
		$this->load->view('entretenimento/listar', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}

	// Filtrar
	public function filtrar()
	{
		$bairro 	= $this->uri->segment(3);
		$adaptado 	= $this->uri->segment(4);

		if ($bairro == 'all') { $bairro = ''; }
		if ($adaptado == 'all') { $adaptado = ''; }

		// Lista os bairros do recife
		$dados['bairros'] = $this->entretenimento->get_bairros('5406');

		// Conteudo
		$dados['conteudos'] = $this->entretenimento->filtrar_entretenimentos($bairro, $adaptado);

		// Publicidade top
		$dados['pub_top'] = $this->entretenimento->get_publicidade('top', 'entretenimento');

		// Publicidade conteudo bottom
		$dados['pub_bottom'] = $this->entretenimento->get_publicidade('bottom', 'entretenimento');

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
			array('name' => 'og:title', 'content' => 'Restaurantes | Guia Saiba Mais', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('restaurante'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteúdo
		$this->load->view('entretenimento/listar', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}































}