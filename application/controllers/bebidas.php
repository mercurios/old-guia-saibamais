<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bebidas extends CI_Controller {

	/**
	 * bebida
	 */

	/* Construtor
	=========================================================== */
	public function __construct()
	{
		parent::__construct();

		// Carrega o model cinema
		$this->load->model('Bebida_model', 'bebida');
	}

	public function index()
	{	
		// Titulo da página
		$seo['titulopag'] = "Bebidas | Guia Saiba Mais";

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
			array('name' => 'og:title', 'content' => 'bebidas | Guia Saiba Mais', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('bebida'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		// Lista os bairros do recife
		$dados['bairros'] = $this->bebida->get_bairros('5406');

		// Publicidade top
		$dados['pub_top'] = $this->bebida->get_publicidade('top', 'bebida');

		// Chamadas bebidas pequena top
		$dados['chamada_p_top'] = $this->bebida->get_chamada('pequena', 'bebida', 3);

		// Chamadas bebidas pequena top
		$dados['chamada_p_bot'] = $this->bebida->get_chamada('pequena', 'bebida', 2, 3);

		// Chamadas bebidas Slider default
		$dados['chamada_beb_s'] = $this->bebida->get_chamada('slider', 'bebida', 3);

		// Chamadas bebidas média
		$dados['chamada_beb_m'] = $this->bebida->get_chamada('media', 'bebida', 4);

		// Chamadas bebidas Slider full
		$dados['chamada_beb_s_f'] = $this->bebida->get_chamada('slider-full', 'bebida', 3);

		// Chamadas bebidas média plus
		$dados['chamada_beb_m_p'] = $this->bebida->get_chamada('media', 'bebida', 4, 4);

		// Chamadas bebidas média Full
		$dados['chamada_beb_m_f'] = $this->bebida->get_chamada('media', 'bebida', 1, 8);

		// Publicidade conteudo bottom
		$dados['pub_contentbot'] = $this->bebida->get_publicidade('conteudo-bottom', 'bebida');

		// Chamadas bebidas média
		$dados['chamada_beb_m_2'] = $this->bebida->get_chamada('media', 'bebida', 4, 9);
		
		// Publicidade conteudo bottom
		$dados['pub_bottom'] = $this->bebida->get_publicidade('bottom', 'bebida');

		// Publicidade conteudo bottom
		$dados['pub_sidebar'] = $this->bebida->get_publicidade('sidebar', 'bebida');

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteudo
		$this->load->view('bebida/inicial-bebida', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}

	/* Lista bebidas
	=========================================================== */
	public function categoria($categoria = NULL)
	{	
		$_categoria = $this->uri->segment(3); 

		if (isset($_categoria)) {
			$dados['bebidas'] = $this->bebida->search_bebidas($_categoria);
		}
		else {
			$dados['bebidas'] = $this->bebida->get_bebidas();
		}

		// Titulo da página
		$seo['titulopag'] = "bebidas | Guia Saiba Mais";

		// Lista os bairros do recife
		$dados['bairros'] = $this->bebida->get_bairros('5406');

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
			array('name' => 'og:title', 'content' => 'bebidas | Guia Saiba Mais', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('bebida'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		$dados['pub_top'] 	 = $this->bebida->get_publicidade('top', 'bebida');
		$dados['pub_bottom'] = $this->bebida->get_publicidade('bottom', 'bebida');

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteúdo
		$this->load->view('bebida/listar', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}

	/* Detalhe do bebida
	=========================================================== */
	public function detalhe($id = NULL) 
	{	
		// Pega a id do cliente
		$id = $this->uri->segment(4);
		$slug = $this->uri->segment(3);

		// Caso o id não for informado, ele pega o slug e faz uma pesquisa
		if (empty($id)) {

			if (empty($slug)) {
				redirect('bebida');
			}
			else {
				// Salva o slug em uma variável
				$search = $slug;

				// Retira os traços
				$search = str_replace('-', ' ', $search);	
			}
		}
		else {

			$dados['conteudo'] 		= $this->bebida->get_bebida($id);
			$dados['fotos'] 		= $this->bebida->listar_fotos($id);
			$dados['card_bebidas']	= $this->bebida->listar_bebidas($id);
			$dados['promocoes']     = $this->bebida->listar_promocao($id);
			$dadosp['card_bebidas'] = $this->bebida->get_bebidas_cardapio($id);

			$_titulo = $dados['conteudo'][0]->nome_bebida;
			$_descri = $dados['conteudo'][0]->desc_bebida;
			$_imagem = $dados['conteudo'][0]->logo_bebida;
			$_latitu = $dados['conteudo'][0]->lati_bebida;
			$_longit = $dados['conteudo'][0]->long_bebida;

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
				array('name' => 'og:url', 'content' => base_url('bebida'), 'type' => 'property'),
				array('name' => 'og:image', 'content' => base_url('tim.php?src=uploads/logos/'.$_imagem.''), 'type' => 'property'),
			);

			$dados['pub_top'] 	 = $this->bebida->get_publicidade('top', 'bebida');
			$dados['pub_bottom'] = $this->bebida->get_publicidade('bottom', 'bebida');

			// Carrega o topo
			$this->load->view('includes/header', $seo);

			// Carrega o conteudo
			$this->load->view('bebida/detalhe', $dados);

			// Carrega o rodape
			$this->load->view('includes/footer');
		}
	}

	// Filtragem de resultados
	public function filtrar()
	{
		// Parametros de filtragem
		$filter_local = $this->uri->segment(3);
		$filter_defic = $this->uri->segment(4);
		$filter_catco = $this->uri->segment(5);
		$filter_ordem = $this->uri->segment(6);

		if ($filter_local == 'all')
		{
			$filter_local = '';
		}

		if ($filter_defic == 'all')
		{
			$filter_defic = '';
		}

		if ($filter_catco == 'all')
		{
			$filter_catco = '';
		}

		if ($filter_ordem == 'a-z')
		{
			$filter_ordem = 'ASC';
		}
		else
		{
			$filter_ordem = 'DESC';
		}

		$this->load->library('mybreadcrumb');

		// Breadcrumb
		$dados['bread'] = $this->mybreadcrumb->bread_lanchonete('');

		// Lista os bairros do recife
		$dados['bairros'] = $this->bebida->get_bairros('5406');

		// Listar seguindo os parametros
		$dados['bebidas'] = $this->bebida->filtrar_lanchonetes($filter_local, $filter_defic, $filter_catco, $filter_ordem);

		// Publicidade top
		$dados['pub_top'] = $this->bebida->get_publicidade('top', 'restaurante');

		// Publicidade conteudo bottom
		$dados['pub_bottom'] = $this->bebida->get_publicidade('bottom', 'restaurante');

		// Lista os bairros do recife
		$dados['bairros'] = $this->bebida->get_bairros('5406');

		// Titulo da página
		$seo['titulopag'] = "Lanchonetes | Guia Saiba Mais";

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
		$this->load->view('bebida/listar', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}
}