<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videos extends CI_Controller {

	public function __construct()
	{
		// Construtor
		parent::__construct();

		// Verifica se o usuario esta logado
		if (!$this->session->userdata('session_id') || !$this->session->userdata('logado'))
        {
            redirect('users/login');
        }

        // Carrega o model
        $this->load->model('Videos_model', 'videomodel');
	}

	public function index()
	{
		redirect('home');
	}

	// Lista os vídeos da categoria passada pelo parametro
	public function listar()
	{
		// Define as variáveis
		$_categoria = $this->uri->segment(3);
		$_idCliente = $this->uri->segment(4);

		// Verifica se foi informado a categoria
		if (empty($_categoria))
		{
			redirect('home');
		}

		// Pega o vídeo
		$_result = $this->videomodel->get_video($_categoria, $_idCliente);

		// Verifica se retornou algum resultado
		if (empty($_result))
		{
			// Redireciona para o formulário de cadastro
			$this->novo($_categoria, $_idCliente);
		}
		else
		{
			$_dados['videos'] = $_result;

			// Exibe o formulário de cadastro de vídeo
			$this->load->view('includes/header');
			$this->load->view('videos/listar', $_dados);
			$this->load->view('includes/footer');
		}
	}

	// Formulário de cadastro de video
	public function novo($_categoria, $_idCliente)
	{
		$_dados['categoria'] = $_categoria;
		$_dados['idCliente'] = $_idCliente;

		// Verifica se o usuário já tem algum vídeo cadastrado
		$_result = $this->videomodel->get_video($_categoria, $_idCliente);

		if ($_result)
		{
			redirect('videos/listar' . '/' . $_categoria . '/' . $_idCliente);
		}

		// Exibe o formulário de cadastro de vídeo
		$this->load->view('includes/header');
		$this->load->view('videos/novo', $_dados);
		$this->load->view('includes/footer');
	}

	// Grava o vídeo no banco de dados
	public function save()
	{
		// Pega o id e a categoria do cliente
		$_categoria = $this->input->post('categoria');
		$_idCliente = $this->input->post('idCliente');

		// Valida o formulário
        $this->form_validation->set_rules('titulo', 'Titulo', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');

		if ($this->form_validation->run() == FALSE)
        {
            $this->novo($_categoria, $_idCliente);
        }
        else
        {
        	// Pega as informações
        	$_titulo = $this->input->post('titulo');
        	$_link	 = $this->input->post('link');

        	// Salva os dados em um array
        	$_dados = array(
        		"titulo_video" 	  => $_titulo,
        		"link_video"	  => $_link,
        		"categoria_video" => $_categoria,
        		"id_cliente"	  => $_idCliente
        	);

        	$_save = $this->videomodel->save($_dados);

        	if ($_save)
        	{
        		redirect('videos/listar' . '/' . $_categoria . '/' . $_idCliente);
        	}
        }
	}

	// Exibe o formulário para edição
	public function editar($_categoria = NULL, $_idCliente = NULL)
	{
		if (empty($_categoria) || empty($_idCliente))
		{
			redirect('home');
		}

		// Salva o resultado em um array
		$_dados['videos'] = $this->videomodel->get_video($_categoria, $_idCliente);

		// Carrega as views
		$this->load->view('includes/header');
		$this->load->view('videos/editar', $_dados);
		$this->load->view('includes/footer');
	}

	// Atualiza o vídeo no banco de dados
	public function update()
	{
		// Pega o id e a categoria do cliente
		$_categoria = $this->input->post('categoria');
		$_idCliente = $this->input->post('idCliente');

		// Valida o formulário
        $this->form_validation->set_rules('titulo', 'Titulo', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');

		if ($this->form_validation->run() == FALSE)
        {
            $this->editar($_categoria, $_idCliente);
        }
        else
        {
        	// Pega as informações
        	$_titulo = $this->input->post('titulo');
        	$_link	 = $this->input->post('link');

        	// Salva os dados em um array
        	$_dados = array(
        		"titulo_video" 	  => $_titulo,
        		"link_video"	  => $_link,
        		"categoria_video" => $_categoria,
        		"id_cliente"	  => $_idCliente
        	);

        	$_update = $this->videomodel->update($_categoria, $_idCliente, $_dados);

        	if ($_update)
        	{
        		redirect('videos/listar' . '/' . $_categoria . '/' . $_idCliente);
        	}
        }
	}

	// Deleta o vídeo
	public function deletar($_categoria, $_idCliente)
	{
		// Verifica se a categoria e o id foi informado
		if (empty($_categoria) || empty($_idCliente))
		{
			redirect('home');
		}

		$_delete = $this->videomodel->delete($_categoria, $_idCliente);

		if ($_delete)
    	{
    		redirect('videos/listar' . '/' . $_categoria . '/' . $_idCliente);
    	}
	}
}