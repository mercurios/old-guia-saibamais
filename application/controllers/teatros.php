<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teatros extends CI_Controller {

	/* Construtor
	=========================================================== */
	public function __construct()
	{
		parent::__construct();

		// Carrega o model teatro
		$this->load->model('teatro_model', 'teatros');
	}

	public function index()
	{	
		// Titulo da página
		$seo['titulopag'] = "teatros | Guia Saiba Mais";

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
			array('name' => 'og:title', 'content' => 'esportes | Guia Saiba Mais', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('teatros'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		// Lista todos os teatros
		$dados['conteudo'] 		= $this->teatros->listar_teatros();
		$dados['pub_top']		= $this->teatros->get_publicidade('top', 'teatro');
		$dados['pub_bottom'] 	= $this->teatros->get_publicidade('bottom', 'teatro');

		// Chama o header
		$this->load->view('includes/header', $seo);

		// Chama a página de conteúdo
		$this->load->view('teatro/listar', $dados);

		// Chama o footer
		$this->load->view('includes/footer');
	}

	// Detalha o teatro
	public function detalhe($id = NULL) 
	{	
		// Pega a id do cliente
		$id 	= $this->uri->segment(4);
		$slug 	= $this->uri->segment(3);

		// Caso o id não for informado, ele pega o slug e faz uma pesquisa
		if (empty($id)) {

			if (empty($slug)) {
				redirect('entretenimento');
			}
			else {
				// Salva o slug em uma variável
				$search = $slug;

				// Retira os traços
				$search = str_replace('-', ' ', $search);	
			}
		}
		else {

			// Pega o teatro
			$dados['conteudo'] 		= $this->teatros->get_teatro($id);
			$dados['fotos'] 		= $this->teatros->listar_fotos($id);
			$dados['pecas']			= $this->teatros->listar_pecas($id);
			$dados['pub_top']		= $this->teatros->get_publicidade('top', 'teatro');
			$dados['pub_bottom'] 	= $this->teatros->get_publicidade('bottom', 'teatro');

			$_titulo = $dados['conteudo'][0]->nome_teatro;
			$_descri = $dados['conteudo'][0]->desc_teatro;
			$_imagem = $dados['conteudo'][0]->logo_teatro;
			$_latitu = $dados['conteudo'][0]->lati_teatro;
			$_longit = $dados['conteudo'][0]->long_teatro;

			// Inicializa o mapa
			$config['center'] = "$_latitu, $_longit";
			$config['zoom'] = '15';
			$this->googlemaps->initialize($config);

			$marker = array();
			$marker['position'] = "$_latitu, $_longit";
			$this->googlemaps->add_marker($marker);

			// Instacia o mapa
			$seo['map'] = $this->googlemaps->create_map();

			// Titulo da página
			$seo['titulopag'] = "$_titulo | Guia Saiba Mais";

			// Meta tags
			$seo['meta'] = array(
				array('name' => 'language', 'content' => 'pt-br'),
				array('name' => 'description', 'content' => "$_descri"),
				array('name' => 'keywords', 'content' => "Guia saiba mais, $_titulo"),
				array('name' => 'author', 'content' => 'Mercurios'),
				array('name' => 'googlebot', 'content' => 'ALL'),
				array('name' => 'robots', 'content' => 'ALL'),
				array('name' => 'viewport', 'content' => 'width=device-width; initial-scale=1.0')
			);

			// Meta tags facebook
			$seo['metaface'] = array(
				array('name' => 'og:title', 'content' => "$_titulo | Guia Saiba Mais", 'type' => 'property'),
				array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
				array('name' => 'og:url', 'content' => base_url('estadia'), 'type' => 'property'),
				array('name' => 'og:image', 'content' => base_url('tim.php?src=uploads/logos/'.$_imagem.''), 'type' => 'property'),
			);

			// Carrega o topo
			$this->load->view('includes/header', $seo);

			// Carrega o conteudo
			$this->load->view('teatro/detalhe', $dados);

			// Carrega o rodape
			$this->load->view('includes/footer');
		}
	}

	public function filtrar()
	{
		// Parametros
		$local 		= $this->uri->segment(3);
		$adaptado 	= $this->uri->segment(4);
		$ordem 		= $this->uri->segment(5);

		if ($local == 'all')
		{
			$local = '';
		}

		if ($adaptado == 'all')
		{
			$adaptado = '';
		}

		if ($ordem == 'a-z')
		{
			$ordem = 'ASC';
		}
		else
		{
			$ordem = 'DESC';
		}

		// Titulo da página
		$seo['titulopag'] = "Cinemas | Guia Saiba Mais";

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
			array('name' => 'og:title', 'content' => 'esportes | Guia Saiba Mais', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('cinemas'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		// Lista todos os cinemas
		$dados['conteudo'] = $this->teatros->filtrar_cinema($local, $adaptado, $ordem);

		// Lista os bairros do recife
		$dados['bairros'] = $this->teatros->get_bairros('5406');

		// Publicidade top
		$dados['pub_top'] = $this->teatros->get_publicidade('top', 'teatro');

		// Publicidade conteudo bottom
		$dados['pub_bottom'] = $this->teatros->get_publicidade('bottom', 'teatro');

		// Chama o header
		$this->load->view('includes/header', $seo);

		// Chama a página de conteúdo
		$this->load->view('teatro/listar', $dados);

		// Chama o footer
		$this->load->view('includes/footer');	
	}


















}