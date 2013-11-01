<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rotas extends CI_Controller {

	/* Construtor
	=========================================================== */
	public function __construct()
	{
		parent::__construct();

		// Carrega o model rotas
		$this->load->model('rotas_model', 'rotas');
	}


	public function index()
	{	
		redirect('lazer/');
	}


	/* Listar
	=========================================================== */
	public function categoria($categoria = NULL)
	{	
		$_categoria = $this->uri->segment(3);

		if (isset($_categoria)) {
			$dados['rotas'] = $this->rotas->search_rotas($_categoria);
		}
		else {
			$dados['rotas'] = $this->rotas->get_rotas();
		}

		// Titulo da página
		$seo['titulopag'] = "Rotas | Guia Saiba Mais";

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
			array('name' => 'og:title', 'content' => 'rotas | Guia Saiba Mais', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('rota'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		$dados['pub_top']		= $this->rotas->get_publicidade('top', 'rota');
		$dados['pub_bottom'] 	= $this->rotas->get_publicidade('bottom', 'rota');

		// Carrega o header
		$this->load->view('includes/header', $seo);

		// Carrega o conteúdo
		$this->load->view('rotas/listar', $dados);

		// Carrega o rodape
		$this->load->view('includes/footer');
	}

	/* Detalhe do rota
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

			$dados['conteudo'] 		= $this->rotas->get_rota($id);
			$dados['fotos'] 		= $this->rotas->listar_fotos($id);
			$dados['pub_top']		= $this->rotas->get_publicidade('top', 'rota');
			$dados['pub_bottom'] 	= $this->rotas->get_publicidade('bottom', 'rota');
			$_titulo 				= $dados['conteudo'][0]->titulo_rota;
			$_descri 				= $dados['conteudo'][0]->desc_rota;
			$_imagem 				= $dados['conteudo'][0]->logo_rota;

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
				array('name' => 'og:url', 'content' => base_url('rota'), 'type' => 'property'),
				array('name' => 'og:image', 'content' => base_url('tim.php?src=uploads/logos/'.$_imagem.''), 'type' => 'property'),
			);

			// Carrega o topo
			$this->load->view('includes/header', $seo);

			// Carrega o conteudo
			$this->load->view('rotas/detalhe', $dados);

			// Carrega o rodape
			$this->load->view('includes/footer');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */