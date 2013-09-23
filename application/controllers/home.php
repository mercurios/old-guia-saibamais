<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Página inicial
	 *	Itens
	 *	 -
	 */
	public function __construct()
	{
		parent::__construct();

		// Carrega o model home
		$this->load->model('Home_model', 'home');
	}


	public function index()
	{
		// Titulo da página
		$seo['titulopag'] = "Guia Saiba Mais | Fácil de lembrar, gostoso de navegar";

		// Meta tags
		$seo['meta'] = array(
			array('name' => 'language', 'content' => 'pt-br'),
			array('name' => 'description', 'content' => 'Descrição do site'),
			array('name' => 'keywords', 'content' => 'Key, key'),
			array('name' => 'author', 'content' => 'Mercurios'),
			array('name' => 'googlebot', 'content' => 'ALL'),
			array('name' => 'robots', 'content' => 'ALL'),
			array('name' => 'viewport', 'content' => 'width=device-width; initial-scale=1.0')
		);

		// Meta tags facebook
		$seo['metaface'] = array(
			array('name' => 'og:title', 'content' => 'Guia Saiba Mais | Fácil de lembrar, gostoso de navegar', 'type' => 'property'),
			array('name' => 'og:type', 'content' => 'website', 'type' => 'property'),
			array('name' => 'og:url', 'content' => base_url('restaurante'), 'type' => 'property'),
			array('name' => 'og:image', 'content' => 'img', 'type' => 'property'),
		);

		// Publicidade top
		$dados['pub_top'] = $this->home->get_publicidade('top', 'home');

		// Chamadas Passeio e lazer Slider
		$dados['lazer_slider'] = $this->home->get_chamada('slider', 'passeio-lazer', 4);

		// Chamadas Passeio e lazer média
		$dados['lazer_media'] = $this->home->get_chamada('media', 'passeio-lazer', 4);

		// Frase do dia
		$dados['frases_dia'] = $this->home->get_frase(getdate());

		// Carrega os views
		$this->load->view('includes/header', $seo);
		//$this->load->view('home', $dados);
		$this->load->view('restaurante/inicial-restaurante', $dados);
		$this->load->view('includes/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */