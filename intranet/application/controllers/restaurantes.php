<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restaurantes extends CI_Controller {

	// Método construtor
    public function __construct()
    {
        parent::__construct();

        // Carrega o model users
        $this->load->model('Restaurantes_model', 'resmodel');

        // Verifica se o usuario esta logado
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado'))
        {
            redirect('users/login');
        }
    }

	// Lista os restaurantes
	public function index($msg = NULL)
	{
        // Pega todos os restaurantes cadastrados
        $dados['restaurantes']  = $this->resmodel->all_restaurantes();
        $dados['msg']           = $msg;

        // Chama a view
        $this->load->view('includes/header');
        $this->load->view('restaurantes/listar', $dados);
        $this->load->view('includes/footer');
	}

    // Chama o forumlário de cadastro
    public function novo($_msg = NULL)
    {
        $dados['msg'] = $_msg;

        // Chama as views
        $this->load->view('includes/header');
        $this->load->view('restaurantes/novo', $dados);
        $this->load->view('includes/footer');
    }

    // Cadastra o restaurante no db
    public function save()
    {
        // Valida o formulário
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('descricao', 'Drescrição', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('numero', 'Número', 'required');
        $this->form_validation->set_rules('rua', 'Rua', 'required');
        $this->form_validation->set_rules('cep', 'Cep', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->novo();
        }
        else
        {
            // Pega as informações vindas do formulário
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
            $_nome = $this->input->post();
        }

    }

    // Deleta o restaurante
    public function excluir($_id)
    {
        // Verifica se o id do usuário foi informado
        if (empty($_id))
        {
            redirect('restaurantes');
        }

        // Verifica se deletou o usuário informado
        $_delete = $this->resmodel->delete($_id);

        // Verifica se foi deletado
        if ($_delete)
        {
            $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Restaurante deletado com sucesso!</div>');
        }
        else
        {
            $this->index('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Não foi possível deletar o restaurante, por favor, tente novamente!</div>');
        }
    }

    
}