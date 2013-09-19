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

		// Publicidade conteudo Top
		$dados['pub_contenttop'] = $this->home->get_publicidade('conteudo-top', 'home');

		// Chamadas restaurantes pequena
		$dados['chamada_res_p'] = $this->home->get_chamada('pequena', 'restaurante', 3);

		// Chamadas restaurantes Slider
		$dados['chamada_res_s'] = $this->home->get_chamada('slider', 'restaurante', 3);

		// Chamadas restaurantes média
		$dados['chamada_res_m'] = $this->home->get_chamada('media', 'restaurante', 4);

		// Chamadas lanchonete pequena
		$dados['chamada_lan_p'] = $this->home->get_chamada('pequena', 'lanchonete', 3);

		// Chamadas lanchonete Slider
		$dados['chamada_lan_s'] = $this->home->get_chamada('slider', 'lanchonete', 3);

		// Chamadas lanchonete média
		$dados['chamada_lan_m'] = $this->home->get_chamada('media', 'lanchonete', 4);

		// Chamadas bebidas pequena
		$dados['chamada_beb_p'] = $this->home->get_chamada('pequena', 'bebida', 3);

		// Chamadas bebidas Slider
		$dados['chamada_beb_s'] = $this->home->get_chamada('slider', 'bebida', 3);

		// Chamadas bebidas média
		$dados['chamada_beb_m'] = $this->home->get_chamada('media', 'bebida', 4);

		// Publicidade conteudo bottom
		$dados['pub_contentbot'] = $this->home->get_publicidade('conteudo-bottom', 'home');

		// Publicidade conteudo bottom
		$dados['pub_bottom'] = $this->home->get_publicidade('bottom', 'home');

		// Chamada Entretenimento média plus
		$dados['chamada_ent_m_p'] = $this->home->get_chamada('sidebar-m-p', 'entretenimento', 4);

		// Chamada Entretenimento pequena
		$dados['chamada_ent_p'] = $this->home->get_chamada('sidebar-p', 'entretenimento', 3);

		// Chamada Entretenimento pequena
		$dados['chamada_ent_m'] = $this->home->get_chamada('sidebar-m', 'entretenimento', 2);

		// Publicidade conteudo bottom
		$dados['pub_sidebar'] = $this->home->get_publicidade('sidebar', 'home');

		// Chamada Estadia slider
		$dados['chamada_est_s'] = $this->home->get_chamada('sidebar-s', 'estadia', 3);

		// Chamada Estadia media
		$dados['chamada_est_m'] = $this->home->get_chamada('sidebar-m', 'estadia', 2);

		// Chamada Estadia pequena
		$dados['chamada_est_p'] = $this->home->get_chamada('sidebar-p', 'estadia', 3);

		// Frase do dia
		$dados['frases_dia'] = $this->home->get_frase(getdate());

		// Carrega os views
		$this->load->view('includes/header', $seo);
		$this->load->view('home', $dados);
		$this->load->view('includes/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */