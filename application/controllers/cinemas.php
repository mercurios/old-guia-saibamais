<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cinemas extends CI_Controller {

	/* Construtor
	=========================================================== */
	public function __construct()
	{
		parent::__construct();

		// Carrega o model cinema
		$this->load->model('Cinema_model', 'cinemas');
	}

	public function index()
	{	
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
		$dados['conteudo'] = $this->cinemas->listar_cinemas();

		// Chama o header
		$this->load->view('includes/header', $seo);

		// Chama a página de conteúdo
		$this->load->view('cinema/listar', $dados);

		// Chama o footer
		$this->load->view('includes/footer');
	}

	// Detalha o cinema
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

			// Pega o cinema
			$dados['conteudo'] 		= $this->cinemas->get_cinema($id);
			$dados['fotos'] 		= $this->cinemas->listar_fotos($id);
			$dados['filmes']		= $this->cinemas->listar_filmes($id);
			$dados['pub_top']		= $this->cinemas->get_publicidade('top', 'cinema');
			$dados['pub_bottom'] 	= $this->cinemas->get_publicidade('bottom', 'cinema');

			$_titulo = $dados['conteudo'][0]->nome_cinema;
			$_descri = $dados['conteudo'][0]->desc_cinema;
			$_imagem = $dados['conteudo'][0]->logo_cinema;
			$_latitu = $dados['conteudo'][0]->lati_cinema;
			$_longit = $dados['conteudo'][0]->long_cinema;

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
			$this->load->view('cinema/detalhe', $dados);

			// Carrega o rodape
			$this->load->view('includes/footer');
		}
	}



















}