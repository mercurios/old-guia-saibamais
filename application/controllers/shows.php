<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shows extends CI_Controller {

	/* Construtor
	=========================================================== */
	public function __construct()
	{
		parent::__construct();

		// Carrega o model show
		$this->load->model('show_model', 'shows');
	}

	public function index()
	{	
		// Titulo da página
		$seo['titulopag'] = "shows | Guia Saiba Mais";

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
			array('name' => 'og:url', 'content' => base_url('shows'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		// Lista todos os shows
		$dados['conteudo'] = $this->shows->listar_shows();

		// Lista os bairros do recife
		$dados['bairros'] = $this->shows->get_bairros('5406');

		// Publicidade top
		$dados['pub_top'] = $this->shows->get_publicidade('top', 'show');

		// Publicidade conteudo bottom
		$dados['pub_bottom'] = $this->shows->get_publicidade('bottom', 'show');

		// Chama o header
		$this->load->view('includes/header', $seo);

		// Chama a página de conteúdo
		$this->load->view('show/listar', $dados);

		// Chama o footer
		$this->load->view('includes/footer');
	}

	// Detalha o show
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

			// Pega o show
			$dados['conteudo'] 		= $this->shows->get_show($id);
			$dados['fotos'] 		= $this->shows->listar_fotos($id);
			$dados['pub_top']		= $this->shows->get_publicidade('top', 'show');
			$dados['pub_bottom'] 	= $this->shows->get_publicidade('bottom', 'show');

			$_titulo = $dados['conteudo'][0]->nome_show;
			$_descri = $dados['conteudo'][0]->desc_show;
			$_imagem = $dados['conteudo'][0]->logo_show;
			$_latitu = $dados['conteudo'][0]->lati_show;
			$_longit = $dados['conteudo'][0]->long_show;

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
			$this->load->view('show/detalhe', $dados);

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
		$seo['titulopag'] = "Feiras e eventos | Guia Saiba Mais";

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
		$dados['conteudo'] = $this->shows->filtrar_cinema($local, $adaptado, $ordem);

		// Lista os bairros do recife
		$dados['bairros'] = $this->shows->get_bairros('5406');

		// Publicidade top
		$dados['pub_top'] = $this->shows->get_publicidade('top', 'cinema');

		// Publicidade conteudo bottom
		$dados['pub_bottom'] = $this->shows->get_publicidade('bottom', 'cinema');

		// Chama o header
		$this->load->view('includes/header', $seo);

		// Chama a página de conteúdo
		$this->load->view('show/listar', $dados);

		// Chama o footer
		$this->load->view('includes/footer');	
	}
}