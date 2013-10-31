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

	/* Lista entretenimentos
	=========================================================== */
	public function categoria($categoria = NULL)
	{	
		$_categoria = $this->uri->segment(3); 

		if (isset($_categoria)) {
			$dados['entretenimentos'] = $this->entretenimento->search_entretenimentos($_categoria);
		}
		else {
			$dados['entretenimentos'] = $this->entretenimento->get_entretenimentos();
		}

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

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteúdo
		$this->load->view('entretenimento/listar', $dados);

		// Carrega o rodape
			$this->load->view('includes/footer');
	}

	/* Detalhe do entretenimento
	=========================================================== */
	public function detalhe($id = NULL) 
	{	
		// Pega a id do cliente
		$id = $this->uri->segment(4);
		$slug = $this->uri->segment(3);

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

			$dados['conteudo'] 		= $this->entretenimento->get_entretenimento($id);
			$dados['fotos'] 		= $this->entretenimento->listar_fotos($id);
			$dados['p_principal']	= $this->entretenimento->listar_prato_principal($id);
			$dados['p_normal']		= $this->entretenimento->listar_pratos($id);
			$dados['entretenimentos']		= $this->entretenimento->listar_entretenimentos($id);
			$dados['promocoes']     = $this->entretenimento->listar_promocao($id);

			$_titulo = $dados['conteudo'][0]->nome_entretenimento;
			$_descri = $dados['conteudo'][0]->desc_entretenimento;
			$_imagem = $dados['conteudo'][0]->logo_entretenimento;
			$_latitu = $dados['conteudo'][0]->lati_entretenimento;
			$_longit = $dados['conteudo'][0]->long_entretenimento;

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
				array('name' => 'og:url', 'content' => base_url('entretenimento'), 'type' => 'property'),
				array('name' => 'og:image', 'content' => base_url('tim.php?src=uploads/logos/'.$_imagem.''), 'type' => 'property'),
			);

			// Carrega o topo
			$this->load->view('includes/header', $seo);

			// Carrega o conteudo
			$this->load->view('entretenimento/detalhe', $dados);

			// Carrega o rodape
			$this->load->view('includes/footer');
		}
	}
}