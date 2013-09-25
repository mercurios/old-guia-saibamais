<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restaurantes extends CI_Controller {

	/**
	 * Restaurante
	 */

	/* Construtor
	=========================================================== */
	public function __construct()
	{
		parent::__construct();

		// Carrega o model cinema
		$this->load->model('Restaurante_model', 'restaurante');
	}


	public function index()
	{	
		// Titulo da página
		$seo['titulopag'] = "Restaurantes | Guia Saiba Mais";

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

		// Publicidade top
		$dados['pub_top'] = $this->restaurante->get_publicidade('top', 'restaurante');

		// Chamadas restaurantes pequena top
		$dados['chamada_p_top'] = $this->restaurante->get_chamada('pequena', 'restaurante', 3);

		// Chamadas restaurantes pequena top
		$dados['chamada_p_bot'] = $this->restaurante->get_chamada('pequena', 'restaurante', 2, 3);

		// Chamadas restaurantes Slider default
		$dados['chamada_res_s'] = $this->restaurante->get_chamada('slider', 'restaurante', 3);

		// Chamadas restaurantes média
		$dados['chamada_res_m'] = $this->restaurante->get_chamada('media', 'restaurante', 4);

		// Chamadas restaurantes Slider full
		$dados['chamada_res_s_f'] = $this->restaurante->get_chamada('slider-full', 'restaurante', 3);

		// Chamadas restaurantes média plus
		$dados['chamada_res_m_p'] = $this->restaurante->get_chamada('media-plus', 'restaurante', 4);

		// Chamadas restaurantes média Full
		$dados['chamada_res_m_f'] = $this->restaurante->get_chamada('media-full', 'restaurante', 1);

		// Publicidade conteudo bottom
		$dados['pub_contentbot'] = $this->restaurante->get_publicidade('conteudo-bottom', 'restaurante');

		// Chamadas restaurantes média
		$dados['chamada_res_m_2'] = $this->restaurante->get_chamada('media', 'restaurante', 4, 4);

		// Publicidade conteudo bottom
		$dados['pub_bottom'] = $this->restaurante->get_publicidade('bottom', 'restaurante');

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteudo
		$this->load->view('restaurante/inicial-restaurante', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}


	/* Lista restaurantes
	=========================================================== */
	public function categoria($categoria = NULL)
	{	
		$_categoria = $this->uri->segment(3);

		if (isset($_categoria)) {
			$dados['restaurantes'] = $this->restaurante->search_restaurantes($_categoria);
		}
		else {
			$dados['restaurantes'] = $this->restaurante->get_restaurantes();
		}

		// Titulo da página
		$seo['titulopag'] = "Restaurantes | Guia Saiba Mais";

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
		$this->load->view('restaurante/listar', $dados);

		// Carrega o rodape
			$this->load->view('includes/footer');
	}

	/* Detalhe do restaurante
	=========================================================== */
	public function detalhe($id = NULL) 
	{	
		// Pega a id do cliente
		$id = $this->uri->segment(4);
		$slug = $this->uri->segment(3);

		// Caso o id não for informado, ele pega o slug e faz uma pesquisa
		if (empty($id)) {

			if (empty($slug)) {
				redirect('restaurante');
			}
			else {
				// Salva o slug em uma variável
				$search = $slug;

				// Retira os traços
				$search = str_replace('-', ' ', $search);	
			}
		}
		else {

			$dados['conteudo'] 		= $this->restaurante->get_restaurante($id);
			$dados['fotos'] 		= $this->restaurante->listar_fotos($id);
			$dados['p_principal']	= $this->restaurante->listar_prato_principal($id);
			$dados['p_normal']		= $this->restaurante->listar_pratos($id);
			$dados['bebidas']		= $this->restaurante->listar_bebidas($id);
			$dados['promocoes']     = $this->restaurante->listar_promocao($id);

			$_titulo = $dados['conteudo'][0]->nome_restaurante;
			$_descri = $dados['conteudo'][0]->desc_restaurante;
			$_imagem = $dados['conteudo'][0]->logo_restaurante;
			$_latitu = $dados['conteudo'][0]->lati_restaurante;
			$_longit = $dados['conteudo'][0]->long_restaurante;

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
				array('name' => 'og:url', 'content' => base_url('restaurante'), 'type' => 'property'),
				array('name' => 'og:image', 'content' => base_url('tim.php?src=uploads/logos/'.$_imagem.''), 'type' => 'property'),
			);

			// Carrega o topo
			$this->load->view('includes/header', $seo);

			// Carrega o conteudo
			$this->load->view('restaurante/detalhe', $dados);

			// Carrega o rodape
			$this->load->view('includes/footer');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */