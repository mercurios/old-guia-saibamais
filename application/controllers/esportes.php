<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Esportes extends CI_Controller {

	/**
	 * esporte
	 */

	/* Construtor
	=========================================================== */
	public function __construct()
	{
		parent::__construct();

		// Carrega o model esportes
		$this->load->model('esportes_model', 'esportes');
	}


	public function index()
	{	
		redirect('lazer/');
	}


	/* Lista esportes
	=========================================================== */
	public function categoria($categoria = NULL)
	{	
		$_categoria = $this->uri->segment(3);

		if (isset($_categoria)) {
			$dados['esportes'] = $this->esportes->search_esportes($_categoria);
		}
		else {
			$dados['esportes'] = $this->esportes->get_esportes();
		}

		// Titulo da página
		$seo['titulopag'] = "esportes | Guia Saiba Mais";

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
			array('name' => 'og:url', 'content' => base_url('esporte'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		$dados['pub_top']		= $this->esportes->get_publicidade('top', 'esporte');
		$dados['pub_bottom'] 	= $this->esportes->get_publicidade('bottom', 'esporte');

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteúdo
		$this->load->view('esportes/listar', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}

	/* Detalhe do esporte
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

			$dados['conteudo'] 		= $this->esportes->get_esporte($id);
			$dados['fotos'] 		= $this->esportes->listar_fotos($id);
			$dados['promocoes']     = $this->esportes->listar_promocao($id);
			$dados['pub_top']		= $this->esportes->get_publicidade('top', 'esporte');
			$dados['pub_bottom'] 	= $this->esportes->get_publicidade('bottom', 'esporte');
			$_titulo 				= $dados['conteudo'][0]->nome_esporte;
			$_descri 				= $dados['conteudo'][0]->desc_esporte;
			$_imagem 				= $dados['conteudo'][0]->logo_esporte;
			$_latitu 				= $dados['conteudo'][0]->lati_esporte;
			$_longit 				= $dados['conteudo'][0]->long_esporte;

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
				array('name' => 'og:url', 'content' => base_url('esporte'), 'type' => 'property'),
				array('name' => 'og:image', 'content' => base_url('tim.php?src=uploads/logos/'.$_imagem.''), 'type' => 'property'),
			);

			// Carrega o topo
			$this->load->view('includes/header', $seo);

			// Carrega o conteudo
			$this->load->view('esportes/detalhe', $dados);

			// Carrega o rodape
			$this->load->view('includes/footer');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */