<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lanchonetes extends CI_Controller {

	/**
	 * lanchonete
	 */

	/* Construtor
	=========================================================== */
	public function __construct()
	{
		parent::__construct();

		// Carrega o model cinema
		$this->load->model('Lanchonete_model', 'lanchonete');
	}

	public function index()
	{	
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
			array('name' => 'og:title', 'content' => 'lanchonetes | Guia Saiba Mais', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('lanchonete'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		// Publicidade top
		$dados['pub_top'] = $this->lanchonete->get_publicidade('top', 'lanchonete');

		// Chamadas lanchonetes pequena top
		$dados['chamada_p_top'] = $this->lanchonete->get_chamada('pequena', 'lanchonete', 3);

		// Chamadas lanchonetes pequena top
		$dados['chamada_p_bot'] = $this->lanchonete->get_chamada('pequena', 'lanchonete', 2, 3);

		// Chamadas lanchonetes Slider default
		$dados['chamada_lan_s'] = $this->lanchonete->get_chamada('slider', 'lanchonete', 3);

		// Chamadas lanchonetes média
		$dados['chamada_lan_m'] = $this->lanchonete->get_chamada('media', 'lanchonete', 4);

		// Chamadas lanchonetes Slider full
		$dados['chamada_lan_s_f'] = $this->lanchonete->get_chamada('slider-full', 'lanchonete', 3);

		// Chamadas lanchonetes média plus
		$dados['chamada_lan_m_p'] = $this->lanchonete->get_chamada('media-plus', 'lanchonete', 4);

		// Chamadas lanchonetes média Full
		$dados['chamada_lan_m_f'] = $this->lanchonete->get_chamada('media-full', 'lanchonete', 1);

		// Publicidade conteudo bottom
		$dados['pub_contentbot'] = $this->lanchonete->get_publicidade('conteudo-bottom', 'lanchonete');

		// Chamadas lanchonetes média
		$dados['chamada_lan_m_2'] = $this->lanchonete->get_chamada('media', 'lanchonete', 4, 4);

		// Publicidade conteudo bottom
		$dados['pub_bottom'] = $this->lanchonete->get_publicidade('bottom', 'lanchonete');

		// Publicidade conteudo bottom
		$dados['pub_sidebar'] = $this->lanchonete->get_publicidade('sidebar', 'lanchonete');

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteudo
		$this->load->view('lanchonete/inicial-lanchonete', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}

	/* Lista lanchonetes
	=========================================================== */
	public function categoria($categoria = NULL)
	{	
		$_categoria = $this->uri->segment(3); 

		if (isset($_categoria)) {
			$dados['lanchonetes'] = $this->lanchonete->search_lanchonetes($_categoria);
		}
		else {
			$dados['lanchonetes'] = $this->lanchonete->get_lanchonetes();
		}

		// Titulo da página
		$seo['titulopag'] = "lanchonetes | Guia Saiba Mais";

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

		// Carrega o conteúdo
		$this->load->view('lanchonete/listar', $dados);

		// Carrega o rodape
			$this->load->view('includes/footer');
	}

	/* Detalhe do lanchonete
	=========================================================== */
	public function detalhe($id = NULL) 
	{	
		// Pega a id do cliente
		$id = $this->uri->segment(4);
		$slug = $this->uri->segment(3);

		// Caso o id não for informado, ele pega o slug e faz uma pesquisa
		if (empty($id)) {

			if (empty($slug)) {
				redirect('lanchonete');
			}
			else {
				// Salva o slug em uma variável
				$search = $slug;

				// Retira os traços
				$search = str_replace('-', ' ', $search);	
			}
		}
		else {

			$dados['conteudo'] 		= $this->lanchonete->get_lanchonete($id);
			$dados['fotos'] 		= $this->lanchonete->listar_fotos($id);
			$dados['p_principal']	= $this->lanchonete->listar_prato_principal($id);
			$dados['p_normal']		= $this->lanchonete->listar_pratos($id);
			$dados['lanchonetes']		= $this->lanchonete->listar_lanchonetes($id);
			$dados['promocoes']     = $this->lanchonete->listar_promocao($id);

			$_titulo = $dados['conteudo'][0]->nome_lanchonete;
			$_descri = $dados['conteudo'][0]->desc_lanchonete;
			$_imagem = $dados['conteudo'][0]->logo_lanchonete;
			$_latitu = $dados['conteudo'][0]->lati_lanchonete;
			$_longit = $dados['conteudo'][0]->long_lanchonete;

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
				array('name' => 'og:url', 'content' => base_url('lanchonete'), 'type' => 'property'),
				array('name' => 'og:image', 'content' => base_url('tim.php?src=uploads/logos/'.$_imagem.''), 'type' => 'property'),
			);

			// Carrega o topo
			$this->load->view('includes/header', $seo);

			// Carrega o conteudo
			$this->load->view('lanchonete/detalhe', $dados);

			// Carrega o rodape
			$this->load->view('includes/footer');
		}
	}
}