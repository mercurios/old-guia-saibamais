<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rotas extends CI_Controller {

	// Método construtor
    public function __construct()
    {
        parent::__construct();

        // Carrega o model rotas
        $this->load->model('rotas_model', 'rotamodel');

        // Carrega o model enderecos
        $this->load->model('Enderecos_model', 'enderecosmodel');

        // Verifica se o usuario esta logado
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado'))
        {
            redirect('users/login');
        }
    }

	// Lista os rotas
	public function index($msg = NULL)
	{
        // Pega todos os rotas cadastrados
        $dados['rotas']  = $this->rotamodel->all_rotas();
        $dados['msg']     = $msg;

        // Chama a view
        $this->load->view('includes/header');
        $this->load->view('rotas/listar', $dados);
        $this->load->view('includes/footer');
	}

    // Chama o forumlário de cadastro
    public function novo($_msg = NULL)
    {
        $dados['msg'] = $_msg;

        // Chama as views
        $this->load->view('includes/header');
        $this->load->view('rotas/novo', $dados);
        $this->load->view('includes/footer');
    }

    // salva a rota

    // Deleta o rota
    public function excluir($_id)
    {
        // Verifica se o id do usuário foi informado
        if (empty($_id))
        {
            redirect('rotas');
        }

        // Verifica se deletou o usuário informado
        $_delete = $this->rotamodel->delete($_id);

        // Verifica se foi deletado
        if ($_delete)
        {
            $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>rota deletado com sucesso!</div>');
        }
        else
        {
            $this->index('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Não foi possível deletar o rota, por favor, tente novamente!</div>');
        }
    }

    
}