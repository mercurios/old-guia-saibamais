<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lazer extends CI_Controller {

	/**
	 * lazer
	 */

	/* Construtor
	=========================================================== */
	public function __construct()
	{
		parent::__construct();

		// Carrega o model cinema
		$this->load->model('Lazer_model', 'lazer');
	}

	public function index()
	{	
		// Titulo da página
		$seo['titulopag'] = "lazers | Guia Saiba Mais";

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
			array('name' => 'og:title', 'content' => 'lazers | Guia Saiba Mais', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('lazer'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		// Lista os bairros do recife
		$dados['bairros'] = $this->lazer->get_bairros('5406');

		// Publicidade top
		$dados['pub_top'] = $this->lazer->get_publicidade('top', 'lazer');

		// Chamadas lazers pequena top
		$dados['chamada_p_top'] = $this->lazer->get_chamada('pequena', 'lazer', 3);

		// Chamadas lazers pequena top
		$dados['chamada_p_bot'] = $this->lazer->get_chamada('pequena', 'lazer', 2, 3);

		// Chamadas lazers Slider default
		$dados['chamada_laz_s'] = $this->lazer->get_chamada('slider', 'lazer', 3);

		// Chamadas lazers média
		$dados['chamada_laz_m'] = $this->lazer->get_chamada('media', 'lazer', 4);

		// Chamadas lazers Slider full
		$dados['chamada_laz_s_f'] = $this->lazer->get_chamada('slider-full', 'lazer', 3);

		// Chamadas lazers média plus
		$dados['chamada_laz_m_p'] = $this->lazer->get_chamada('media-plus', 'lazer', 4);

		// Chamadas lazers média Full
		$dados['chamada_laz_m_f'] = $this->lazer->get_chamada('media-full', 'lazer', 1);

		// Publicidade conteudo bottom
		$dados['pub_contentbot'] = $this->lazer->get_publicidade('conteudo-bottom', 'lazer');

		// Chamadas lazers média
		$dados['chamada_laz_m_2'] = $this->lazer->get_chamada('media', 'lazer', 4, 4);

		// Publicidade conteudo bottom
		$dados['pub_bottom'] = $this->lazer->get_publicidade('bottom', 'lazer');

		// Publicidade conteudo bottom
		$dados['pub_sidebar'] = $this->lazer->get_publicidade('sidebar', 'lazer');

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteudo
		$this->load->view('lazer/inicial-lazer', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}

	/* Lista lazers
	=========================================================== */
	public function categoria($categoria = NULL)
	{	
		$_categoria = $this->uri->segment(3); 

		if (isset($_categoria)) {
			$dados['lazers'] = $this->lazer->search_lazers($_categoria);
		}
		else {
			$dados['lazers'] = $this->lazer->get_lazers();
		}

		// Titulo da página
		$seo['titulopag'] = "lazers | Guia Saiba Mais";

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
			array('name' => 'og:title', 'content' => 'lazers | Guia Saiba Mais', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('lazer'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteúdo
		$this->load->view('lazer/listar', $dados);

		// Carrega o rodape
			$this->load->view('includes/footer');
	}

	/* Detalhe do lazer
	=========================================================== */
	public function detalhe($id = NULL) 
	{	
		// Pega a id do cliente
		$id = $this->uri->segment(4);
		$slug = $this->uri->segment(3);

		// Caso o id não for informado, ele pega o slug e faz uma pesquisa
		if (empty($id)) {

			if (empty($slug)) {
				redirect('lazer');
			}
			else {
				// Salva o slug em uma variável
				$search = $slug;

				// Retira os traços
				$search = str_replace('-', ' ', $search);	
			}
		}
		else {

			$dados['conteudo'] 		= $this->lazer->get_lazer($id);
			$dados['fotos'] 		= $this->lazer->listar_fotos($id);
			$dados['p_principal']	= $this->lazer->listar_prato_principal($id);
			$dados['p_normal']		= $this->lazer->listar_pratos($id);
			$dados['lazers']		= $this->lazer->listar_lazers($id);
			$dados['promocoes']     = $this->lazer->listar_promocao($id);

			$_titulo = $dados['conteudo'][0]->nome_lazer;
			$_descri = $dados['conteudo'][0]->desc_lazer;
			$_imagem = $dados['conteudo'][0]->logo_lazer;
			$_latitu = $dados['conteudo'][0]->lati_lazer;
			$_longit = $dados['conteudo'][0]->long_lazer;

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
				array('name' => 'og:url', 'content' => base_url('lazer'), 'type' => 'property'),
				array('name' => 'og:image', 'content' => base_url('tim.php?src=uploads/logos/'.$_imagem.''), 'type' => 'property'),
			);

			// Carrega o topo
			$this->load->view('includes/header', $seo);

			// Carrega o conteudo
			$this->load->view('lazer/detalhe', $dados);

			// Carrega o rodape
			$this->load->view('includes/footer');
		}
	}

	// Filtragem de resultados
	public function filtrar()
	{
		// Parametros de filtragem
		$filter_local 		= $this->uri->segment(4);
		$filter_defic 		= $this->uri->segment(3);
		$filter_ordem 		= $this->uri->segment(5);

		if ($filter_local == 'all')
		{
			$filter_local = '';
		}

		if ($filter_defic == 'all')
		{
			$filter_defic = '';
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
		$dados['bairros'] = $this->lazer->get_bairros('5406');

		// Publicidade top
		$dados['pub_top'] = $this->lazer->get_publicidade('top', 'lazer');

		// Publicidade conteudo bottom
		$dados['pub_bottom'] = $this->lazer->get_publicidade('bottom', 'lazer');

		// Lista os bairros do recife
		$dados['bairros'] = $this->lazer->get_bairros('5406');

		// Lista os bairros do recife
		$dados['resultados'] = $this->lazer->get_filtro($filter_defic, $filter_local, $filter_ordem);

		// Titulo da página
		$seo['titulopag'] = "Passeio e Lazer | Guia Saiba Mais";

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
		$this->load->view('lazer/listar', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}
}