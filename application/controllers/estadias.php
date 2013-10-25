<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadias extends CI_Controller {

	/* Construtor
	=========================================================== */
	public function __construct()
	{
		parent::__construct();

		// Carrega o model cinema
		$this->load->model('Estadia_model', 'estadia');
	}


	public function index()
	{	
		// Titulo da página
		$seo['titulopag'] = "Estadias | Guia Saiba Mais";

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
			array('name' => 'og:title', 'content' => 'estadias | Guia Saiba Mais', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('estadia'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		// Publicidade top
		$dados['pub_top'] = $this->estadia->get_publicidade('top', 'estadia');

		// Chamadas estadias pequena top
		$dados['chamada_p_top'] = $this->estadia->get_chamada('pequena', 'estadia', 3);

		// Chamadas estadias pequena top
		$dados['chamada_p_bot'] = $this->estadia->get_chamada('pequena', 'estadia', 2, 3);

		// Chamadas estadias Slider default
		$dados['chamada_est_s'] = $this->estadia->get_chamada('slider', 'estadia', 3);

		// Chamadas estadias média
		$dados['chamada_est_m'] = $this->estadia->get_chamada('media', 'estadia', 4);

		// Chamadas estadias Slider full
		$dados['chamada_est_s_f'] = $this->estadia->get_chamada('slider-full', 'estadia', 3);

		// Chamadas estadias média plus
		$dados['chamada_est_m_p'] = $this->estadia->get_chamada('media-plus', 'estadia', 4);

		// Chamadas estadias média Full
		$dados['chamada_est_m_f'] = $this->estadia->get_chamada('media-full', 'estadia', 1);

		// Publicidade conteudo bottom
		$dados['pub_contentbot'] = $this->estadia->get_publicidade('conteudo-bottom', 'estadia');

		// Chamadas estadias média
		$dados['chamada_est_m_2'] = $this->estadia->get_chamada('media', 'estadia', 4, 4);

		// Publicidade conteudo bottom
		$dados['pub_bottom'] = $this->estadia->get_publicidade('bottom', 'estadia');

		// Publicidade conteudo bottom
		$dados['pub_sidebar'] = $this->estadia->get_publicidade('sidebar', 'estadia');

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteudo
		$this->load->view('estadia/inicial-estadia', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}

	/* Lista estadias
	=========================================================== */
	public function categoria($categoria = NULL)
	{	
		$_categoria = $this->uri->segment(3);

		$this->load->library('mybreadcrumb');

		// Breadcrumb
		/*$dados['bread'] = $this->mybreadcrumb->bread_estadia($_categoria);*/

		if (isset($_categoria)) {
			$dados['estadias'] = $this->estadia->search_estadias($_categoria);
		}
		else {
			$dados['estadias'] = $this->estadia->get_estadias();
		}

		// Titulo da página
		$seo['titulopag'] = "estadias | Guia Saiba Mais";

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
			array('name' => 'og:title', 'content' => 'estadias | Guia Saiba Mais', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('estadia'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteúdo
		$this->load->view('estadia/listar', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}

	/* Detalhe do estadia
	=========================================================== */
	public function detalhe($id = NULL) 
	{	
		// Pega a id do cliente
		$id 	= $this->uri->segment(4);
		$slug 	= $this->uri->segment(3);

		// Caso o id não for informado, ele pega o slug e faz uma pesquisa
		if (empty($id)) {

			if (empty($slug)) {
				redirect('estadia');
			}
			else {
				// Salva o slug em uma variável
				$search = $slug;

				// Retira os traços
				$search = str_replace('-', ' ', $search);	
			}
		}
		else {

			$dados['conteudo'] 		= $this->estadia->get_estadia($id);
			$dados['fotos'] 		= $this->estadia->listar_fotos($id);
			$dados['acomodacoes']	= $this->estadia->listar_acomodacoes($id);
			$dados['promocoes']     = $this->estadia->listar_promocao($id);
			$dados['pub_top']		= $this->estadia->get_publicidade('top', 'estadia');

			// Publicidade conteudo bottom
			$dados['pub_bottom'] = $this->estadia->get_publicidade('bottom', 'estadia');

			$_titulo = $dados['conteudo'][0]->nome_estadia;
			$_descri = $dados['conteudo'][0]->desc_estadia;
			$_imagem = $dados['conteudo'][0]->logo_estadia;
			$_latitu = $dados['conteudo'][0]->lati_estadia;
			$_longit = $dados['conteudo'][0]->long_estadia;

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
			$this->load->view('estadia/detalhe', $dados);

			// Carrega o rodape
			$this->load->view('includes/footer');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */