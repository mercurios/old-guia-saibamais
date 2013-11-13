<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Locais extends CI_Controller {

	/**
	 * local
	 */

	/* Construtor
	=========================================================== */
	public function __construct()
	{
		parent::__construct();

		// Carrega o model locais
		$this->load->model('Locais_model', 'locais');
	}


	public function index()
	{	
		redirect('lazer/');
	}


	/* Lista locais
	=========================================================== */
	public function categoria($categoria = NULL)
	{	
		$_categoria = $this->uri->segment(3);

		if (isset($_categoria)) {
			$dados['locais'] = $this->locais->search_locais($_categoria);
		}
		else {
			$dados['locais'] = $this->locais->get_locais();
		}

		// Titulo da página
		$seo['titulopag'] = "Locais | Guia Saiba Mais";

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
			array('name' => 'og:title', 'content' => 'Locais | Guia Saiba Mais', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('local'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		$dados['pub_top']		= $this->locais->get_publicidade('top', 'local');
		$dados['pub_bottom'] 	= $this->locais->get_publicidade('bottom', 'local');

		// Lista os bairros do recife
		$dados['bairros'] = $this->locais->get_bairros('5406');

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteúdo
		$this->load->view('locais/listar', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}

	/* Detalhe do local
	=========================================================== */
	public function detalhe($id = NULL) 
	{	
		// Pega a id do cliente
		$id 	= $this->uri->segment(4);
		$slug 	= $this->uri->segment(3);

		// Caso o id não for informado, ele pega o slug e faz uma pesquisa
		if (empty($id)) {

			if (empty($slug)) {
				redirect('lazer/');
			}
			else {
				// Salva o slug em uma variável
				$search = $slug;

				// Retira os traços
				$search = str_replace('-', ' ', $search);	
			}
		}
		else {

			$dados['conteudo'] 		= $this->locais->get_local($id);
			$dados['fotos'] 		= $this->locais->listar_fotos($id);
			$dados['promocoes']     = $this->locais->listar_promocao($id);
			$dados['pub_top']		= $this->locais->get_publicidade('top', 'local');
			$dados['pub_bottom'] 	= $this->locais->get_publicidade('bottom', 'local');
			$_titulo 				= $dados['conteudo'][0]->nome_local;
			$_descri 				= $dados['conteudo'][0]->desc_local;
			$_imagem 				= $dados['conteudo'][0]->logo_local;
			$_latitu 				= $dados['conteudo'][0]->lati_local;
			$_longit 				= $dados['conteudo'][0]->long_local;

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
				array('name' => 'og:url', 'content' => base_url('local'), 'type' => 'property'),
				array('name' => 'og:image', 'content' => base_url('tim.php?src=uploads/logos/'.$_imagem.''), 'type' => 'property'),
			);

			// Carrega o topo
			$this->load->view('includes/header', $seo);

			// Carrega o conteudo
			$this->load->view('locais/detalhe', $dados);

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

		// Breadcrumb
		$this->load->library('mybreadcrumb');
		$dados['bread'] = $this->mybreadcrumb->bread_restaurante('teste');

		// Lista os bairros do recife
		$dados['bairros'] = $this->locais->get_bairros('5406');

		// Listar seguindo os parametros
		$dados['locais'] = $this->locais->filtrar_locais($filter_local, $filter_defic, $filter_catco, $filter_ordem);

		// Publicidade top
		$dados['pub_top'] = $this->locais->get_publicidade('top', 'local');

		// Publicidade conteudo bottom
		$dados['pub_bottom'] = $this->locais->get_publicidade('bottom', 'local');

		// Lista os bairros do recife
		$dados['bairros'] = $this->locais->get_bairros('5406');

		// Titulo da página
		$seo['titulopag'] = "Locais | Guia Saiba Mais";

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
		$this->load->view('locais/listar', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */