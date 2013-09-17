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
		$seo['titulopag'] = "Guia Saiba Mais";

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

		// Chamadas pequena de restaurante
		$dados['chamada_restaurante_pequena'] = $this->home->get_chamada('pequena', 'restaurante', 4);

		// Chamadas media de restaurante
		$dados['chamada_restaurante_media'] = $this->home->get_chamada('media', 'restaurante', 3);

		// Chamadas pequena de lanchonete
		$dados['chamada_lanchonete_pequena'] = $this->home->get_chamada('pequena', 'lanchonete', 4);

		// Chamadas media de lanchonete
		$dados['chamada_lanchonete_media'] = $this->home->get_chamada('media', 'lanchonete', 3);

		// Chamadas pequena de bebida
		$dados['chamada_bebida_pequena'] = $this->home->get_chamada('pequena', 'bebida', 4);

		// Chamadas media de bebida
		$dados['chamada_bebida_media'] = $this->home->get_chamada('media', 'bebida', 3);

		// Chamadas pequena entretenimento
		$dados['chamada_entretenimento_pequena'] = $this->home->get_chamada('pequena', 'entretenimento', 4);

		// Chamadas pequena estadia
		$dados['chamada_estadia_pequena'] = $this->home->get_chamada('pequena', 'estadia', 4);

		// Frase do dia
		$dados['frases_dia'] = $this->home->get_frase(getdate());

		// Publicidade top
		$dados['pub_top'] = $this->home->get_publicidade('top', 'home');

		// Publicidade sidebar
		$dados['pub_sidebar'] = $this->home->get_publicidade('sidebar', 'home');

		// Publicidade bottom
		$dados['pub_bottom'] = $this->home->get_publicidade('bottom', 'home');

		// Carrega os views
		$this->load->view('includes/header', $seo);
		$this->load->view('home', $dados);
		$this->load->view('includes/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */