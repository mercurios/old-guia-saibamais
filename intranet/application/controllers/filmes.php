<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filmes extends CI_Controller {

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
        $this->load->model('Filmes_model', 'filmemodel');
	}

	public function index()
	{
		// Redireciona para home
		redirect('home');
	}

	// Lista os filmes do cinema
	public function listar($_idCliente, $_msg = NULL)
	{
		// Verifica se foi informado os parametros
		if (empty($_idCliente))
		{
			// Se não foi, redireciona para home
			redirect('home');
		}

		// Envia para a view
		$_dados['filmes'] = $this->filmemodel->get_filmes($_idCliente);
		$_dados['msg']	  = $_msg;

		// Carrega as views
		$this->load->view('includes/header');
		$this->load->view('filmes/listar', $_dados);
		$this->load->view('includes/footer');
	}

	// Cadastra um novo filme
	public function novo($_idCliente)
	{
		// Verifica se foi informado o id
		if (empty($_idCliente))
		{
			redirect('home');
		}

		$_dados['idCliente'] = $_idCliente;

		// Carrega as views
		$this->load->view('includes/header');
		$this->load->view('filmes/novo', $_dados);
		$this->load->view('includes/footer');
	}

	// Salva no banco
	public function save()
	{
		$_logo   	= 'logo';
		$_idCliente = $this->input->post('idCliente');
		$_titulo 	= $this->input->post('titulo');
		$_sinopse 	= $this->input->post('sinopse');
		$_categoria = $this->input->post('categoria');
		$_duracao 	= $this->input->post('duracao');
		$_censura 	= $this->input->post('censura');
		$_h_dom		= $this->input->post('h_dom');
		$_h_seg		= $this->input->post('h_seg');
		$_h_ter		= $this->input->post('h_ter');
		$_h_qua		= $this->input->post('h_qua');
		$_h_qui		= $this->input->post('h_qui');
		$_h_sex		= $this->input->post('h_sex');
		$_h_sab		= $this->input->post('h_sab');

		// Seta as configurações de upload
        $_config['upload_path']     = '../uploads/filmes'; // Caminho
        $_config['allowed_types']   = 'gif|jpg|png|jpeg|pjpeg'; // Tipos de imagens aceito
        $_config['max_size']        = '2048'; // 2MB
        $_config['overwrite']       = FALSE; // Não irá sobre-escrever o arquivo
        $_config['encrypt_name']    = TRUE; // Trocará o nome do arquivo para um HASH

        // Inicializa a library
        $this->load->library('upload', $_config);

        //Faz o upload
        if(!$this->upload->do_upload($_logo))
        {
            $error = array('erro' => $this->upload->display_errors());
            $_newLogo = "";
        }
        else
        {
            $upload_data = $this->upload->data();
            $_newLogo   = $upload_data['file_name']; 
        }

        // Salva os dados em um array
        $_dados = array(
        	"logo_filme" 		=> $_newLogo,
        	"titulo_filme" 		=> $_titulo,
        	"sinopse_filme" 	=> $_sinopse,
        	"duracao_filme" 	=> $_duracao,
        	"categoria_filme" 	=> $_categoria,
        	"idade_filme"		=> $_censura,
        	"id_cinema"			=> $_idCliente,
        	"h_dom"				=> $_h_dom,
        	"h_seg"				=> $_h_seg,
        	"h_ter"				=> $_h_ter,
        	"h_qua"				=> $_h_qua,
        	"h_qui"				=> $_h_qui,
        	"h_sex"				=> $_h_sex,
        	"h_sab"				=> $_h_sab
        );

        $_save = $this->filmemodel->save($_dados);
    
        if ($_save)
        {
            redirect('filmes/listar/' . $_idCliente);
        }
        else
        {
            redirect('filmes/listar/' . $_idCliente);
        }
	}

	// Mostra o formulário de edição
	public function editar($_id)
	{
		// Verifica se foi informado o id
		if (empty($_id))
        {
            redirect('home');
        }

        $_dados['filme'] = $this->filmemodel->get_filme($_id);

        // Carrega as views
		$this->load->view('includes/header');
		$this->load->view('filmes/editar', $_dados);
		$this->load->view('includes/footer');
	}

	// Atualiza no banco
	public function update()
	{
		// Pega o id do cliente
        $_idCliente = $this->input->post('idCliente');
        $_idFilme = $this->input->post('idFilme');
        $_imgAtual = $this->input->post('imgAtual');

        // Verifica se o id do cliente foi informado
        if (empty($_idFilme))
        {
            redirect('home');
        }

        // Verifica se o usuário selecionou outra logo
        $_checkLogo = $_FILES['logo']['name'];

        if (empty($_checkLogo))
        {
            $_newLogo = $_imgAtual;
        }
        else
        {
            $_logo = 'logo';

            // Seta as configurações de upload
            $_config['upload_path']     = '../uploads/filmes/'; // Caminho
            $_config['allowed_types']   = 'gif|jpg|png|jpeg|pjpeg'; // Tipos de imagens aceito
            $_config['max_size']        = '2048'; // 2MB
            $_config['overwrite']       = FALSE; // Não irá sobre-escrever o arquivo
            $_config['encrypt_name']    = TRUE; // Trocará o nome do arquivo para um HASH

            // Inicializa a library
            $this->load->library('upload', $_config);

            //Faz o upload
            if(!$this->upload->do_upload($_logo))
            {
                $error = array('erro' => $this->upload->display_errors());
                $_newLogo = "";
            }
            else
            {
                $upload_data = $this->upload->data();
                $_newLogo   = $upload_data['file_name']; 
            }
        }

        $_idCliente = $this->input->post('idCliente');
		$_titulo 	= $this->input->post('titulo');
		$_sinopse 	= $this->input->post('sinopse');
		$_categoria = $this->input->post('categoria');
		$_duracao 	= $this->input->post('duracao');
		$_censura 	= $this->input->post('censura');
		$_h_dom		= $this->input->post('h_dom');
		$_h_seg		= $this->input->post('h_seg');
		$_h_ter		= $this->input->post('h_ter');
		$_h_qua		= $this->input->post('h_qua');
		$_h_qui		= $this->input->post('h_qui');
		$_h_sex		= $this->input->post('h_sex');
		$_h_sab		= $this->input->post('h_sab');

		// Salva os dados em um array
        $_dados = array(
        	"logo_filme" 		=> $_newLogo,
        	"titulo_filme" 		=> $_titulo,
        	"sinopse_filme" 	=> $_sinopse,
        	"duracao_filme" 	=> $_duracao,
        	"categoria_filme" 	=> $_categoria,
        	"idade_filme"		=> $_censura,
        	"id_cinema"			=> $_idCliente,
        	"h_dom"				=> $_h_dom,
        	"h_seg"				=> $_h_seg,
        	"h_ter"				=> $_h_ter,
        	"h_qua"				=> $_h_qua,
        	"h_qui"				=> $_h_qui,
        	"h_sex"				=> $_h_sex,
        	"h_sab"				=> $_h_sab
        );

        $_update = $this->filmemodel->update($_idFilme, $_dados);
    
        if ($_update)
        {
            redirect('filmes/listar/' . $_idCliente);
        }
        else
        {
            redirect('filmes/listar/' . $_idCliente);
        };
	}

    public function excluir($_id, $_idCinema)
    {
        // Verifica se foi informado os parametros
        if (empty($_id) || empty($_idCinema))
        {
            redirect('cinemas');
        }

        $_delete = $this->filmemodel->delete($_id);

        if ($_delete)
        {
            redirect('filmes/listar/' . $_idCinema);
        }
        else
        {
            redirect('filmes/listar/' . $_idCinema);
        }
    }	
}