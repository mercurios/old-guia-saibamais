<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cardapios extends CI_Controller {

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
        $this->load->model('Cardapios_model', 'cardapiosmodel');
	}

	public function index()
	{
		// Redireciona para home
		redirect('home');	
	}

	// Lista o cardápio do cliente
	public function listar($_categoria, $_idCliente, $_msg = NULL)
	{
		// Verifica se foi passado os parametros
		if (empty($_categoria) || empty($_idCliente))
		{
			// Redireciona para home
			redirect('home');
		}

		// Busca no banco os registros
		$_dados['cardapios'] = $this->cardapiosmodel->get_cardapio($_categoria, $_idCliente);
		$_dados['msg'] 		 = $_msg;

		// Carrega as views
		$this->load->view('includes/header');
		$this->load->view('cardapios/listar', $_dados);
		$this->load->view('includes/footer');
	}

	// Adiciona um novo cardápio
	public function novo($_categoria, $_idCliente, $_msg = NULL)
	{
		// Verifica se foi informado os parametros
		if (empty($_categoria) || empty($_idCliente))
		{
			// Redireciona
			redirect('home');
		}

		// Busca no banco os registros
		$_dados['categoria'] 	= $_categoria;
		$_dados['idCliente'] 	= $_idCliente;
		$_dados['msg'] 			= $_msg;

		// Carrega as views
		$this->load->view('includes/header');
		$this->load->view('cardapios/novo', $_dados);
		$this->load->view('includes/footer');		
	}

	// Atualiza no banco
	public function save()
	{
		// Pega as informações enviadas pelo post
		$_nome 		= $this->input->post('nome');
		$_descricao = $this->input->post('descricao');
		$_titulo1 	= $this->input->post('titulo1');
		$_valor1 	= $this->input->post('valor1');
		$_titulo2 	= $this->input->post('titulo2');
		$_valor2	= $this->input->post('valor2');
		$_titulo3	= $this->input->post('titulo3');
		$_valor3	= $this->input->post('valor3');
		$_tipoPrato = $this->input->post('tipoPrato');
		$_diaPrato	= $this->input->post('diaprato');
		if (!empty($_diaPrato)) : 
            $_diaPrato = implode(",", $_diaPrato);
        endif;
		$_categoria	= $this->input->post('categoria');
		$_idCliente = $this->input->post('idCliente');

		// Valida os campos
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('descricao', 'Descrição', 'required');
		$this->form_validation->set_rules('tipoPrato', 'Tipo do prato', 'required');

		if ($this->form_validation->run() == FALSE)
        {
            $this->novo($_categoria, $_idCliente);
        }
        else
        {
			// Salva em um array
			$_dados = array(
				"nome_prato" 		=> $_nome,
				"desc_prato" 		=> $_descricao,
				"titulo_preco_um"	=> $_titulo1,
				"titulo_preco_dois"	=> $_titulo2,
				"titulo_preco_tres"	=> $_titulo3,
				"valor_preco_um"	=> $_valor1,
				"valor_preco_dois"	=> $_valor2,
				"valor_preco_tres"	=> $_valor3,
				"tipo_prato"		=> $_tipoPrato,
				"dia_prato"			=> $_diaPrato,
				"categoria_prato"	=> $_categoria,
				"id_cliente"		=> $_idCliente
			);

			// Atualiza no banco
			$_save = $this->cardapiosmodel->save($_dados);

			if ($_save)
			{
				redirect(base_url('cardapios/listar') . '/' . $_categoria . '/' . $_idCliente);
			}
        }
	}

	// Edita o prato
	public function editar($_categoria, $_idCliente, $_idCardapio, $_msg = NULL)
	{
		// Verifica se foi informado os parametros
		if (empty($_categoria) || empty($_idCliente) || empty($_idCardapio))
		{
			// Redireciona
			redirect('home');
		}

		// Faz a busca no banco de dados
		$_dados['prato'] = $this->cardapiosmodel->get_prato($_idCardapio);
		$_dados['msg'] = $_msg;

		// Carrega as views
		$this->load->view('includes/header');
		$this->load->view('cardapios/editar', $_dados);
		$this->load->view('includes/footer');
	}

	// Atualiza no banco
	public function update()
	{
		// Pega as informações enviadas pelo post
		$_nome 		= $this->input->post('nome');
		$_descricao = $this->input->post('descricao');
		$_titulo1 	= $this->input->post('titulo1');
		$_valor1 	= $this->input->post('valor1');
		$_titulo2 	= $this->input->post('titulo2');
		$_valor2	= $this->input->post('valor2');
		$_titulo3	= $this->input->post('titulo3');
		$_valor3	= $this->input->post('valor3');
		$_tipoPrato = $this->input->post('tipoPrato');
		$_diaPrato	= $this->input->post('diaprato');
		if (!empty($_diaPrato)) : 
            $_diaPrato = implode(",", $_diaPrato);
        endif;
		$_categoria	= $this->input->post('categoria');
		$_idCliente = $this->input->post('idCliente');
		$_idCardapio = $this->input->post('idCardapio');

		// Valida os campos
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('descricao', 'Descrição', 'required');
		$this->form_validation->set_rules('tipoPrato', 'Tipo do prato', 'required');

		if ($this->form_validation->run() == FALSE)
        {
            $this->editar($_categoria, $_idCliente, $_idCardapio, 'Campos obrigatórios');
        }
        else
        {
			// Salva em um array
			$_dados = array(
				"nome_prato" 		=> $_nome,
				"desc_prato" 		=> $_descricao,
				"titulo_preco_um"	=> $_titulo1,
				"titulo_preco_dois"	=> $_titulo2,
				"titulo_preco_tres"	=> $_titulo3,
				"valor_preco_um"	=> $_valor1,
				"valor_preco_dois"	=> $_valor2,
				"valor_preco_tres"	=> $_valor3,
				"tipo_prato"		=> $_tipoPrato,
				"dia_prato"			=> $_diaPrato,
				"categoria_prato"	=> $_categoria,
				"id_cliente"		=> $_idCliente
			);

			// Atualiza no banco
			$_update = $this->cardapiosmodel->update($_dados, $_idCardapio);

			if ($_update)
			{
				redirect(base_url('cardapios/listar') . '/' . $_categoria . '/' . $_idCliente);
			}
        }
	}

	// Deleta um prato
	public function deletar($_categoria, $_idCliente, $_idCardapio)
	{
		// Verifica se foi informado os parametros
		if (empty($_categoria) || empty($_idCliente) || empty($_idCardapio))
		{
			// Redireciona
			redirect('home');
		}

		// Verifica se deletou
		if ($this->cardapiosmodel->delete($_idCardapio))
		{
			redirect(base_url('cardapios/listar') . '/' . $_categoria . '/' . $_idCliente);	
		}
		else
		{
			redirect(base_url('cardapios/listar') . '/' . $_categoria . '/' . $_idCliente);
		}
	}
}