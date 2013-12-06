<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chamadas extends CI_Controller {

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
        $this->load->model('Chamadas_model', 'chamadamodel');
	}

	public function index()
	{
		// Redireciona para home
		redirect('home');
	}

	// Lista as chamadas
	public function listar($_categoria)
	{
		// Se não for informado a categoria, redireciona
		if (empty($_categoria))
		{
			redirect('home');
		}

		// Busca no banco as chamadas
		$_dados['chamadas'] = $this->chamadamodel->get_chamadas($_categoria);

		// Carrega as views
		$this->load->view('includes/header');
		$this->load->view('chamadas/listar', $_dados);
		$this->load->view('includes/footer');
	}

	// Exibe o formulário de edição
	public function editar($_id = NULL)
	{
		// Verifica se foi informado o id
		if (empty($_id))
		{
			redirect('home');
		}

		// Busca no banco as chamadas
		$_dados['chamada'] = $this->chamadamodel->get_chamada($_id);

		// Carrega as views
		$this->load->view('includes/header');
		$this->load->view('chamadas/editar', $_dados);
		$this->load->view('includes/footer');
	}

	// atualiza no banco
	public function update()
	{
		// Valida o formulário
		$this->form_validation->set_rules('titulo', 'Titulo', 'required');
		$this->form_validation->set_rules('link', 'Link', 'required');
		$this->form_validation->set_rules('descricao', 'Drescrição', 'required');

		if ($this->form_validation->run() == FALSE)
        {
            $this->editar();
        }
        else
        {
        	 // Pega o ID e a imagem atual
            $_id        = $this->input->post('id');
            $_imgAtual  = $this->input->post('imgAtual'); 

            // Verifica se o id foi informado
            if (empty($_id))
            {
                redirect('lanchonetes');
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
                $_config['upload_path']     = '../uploads/logos/'; // Caminho
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

            $_titulo 	= $this->input->post('titulo');
            $_link		= $this->input->post('link');
            $_desc  	= $this->input->post('descricao');

            $_dados = array(
            	"img_chamada" 	=> $_newLogo,
            	"titulo_chamada"=> $_titulo,
            	"link_chamada" 	=> $_link,
            	"desc_chamada" 	=> $_desc
            );

            $_update = $this->chamadamodel->update($_dados, $_id);

            if ($_update)
            {
                $this->editar($_id, '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>lanchonete atualizado com sucesso!</div>');
            }
            else
            {
                $this->index('Erros ocorreram, por favor, contacte um administrador!');
            }
        }
	}
}