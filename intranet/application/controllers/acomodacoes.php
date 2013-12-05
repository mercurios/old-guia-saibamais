<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acomodacoes extends CI_Controller {

	// Método construtor
    public function __construct()
    {
        parent::__construct();

        // Verifica se o usuario esta logado
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado'))
        {
            redirect('users/login');
        }

        // Carrega o model
        $this->load->model('Acomodacoes_model', 'acomodel');
    }

	// Redireciona para home
	public function index()
	{
        redirect('home');
	}

    // Lista as acomodações
    public function listar($_id)
    {
        // Verifica se o id foi informado
        if (empty($_id))
        {
            redirect('home');
        }

        // Faz a busca no banco
        $_dados['acomodacoes'] = $this->acomodel->get_all($_id);

        // Carrega as views
        $this->load->view('includes/header');
        $this->load->view('acomodacoes/listar', $_dados);
        $this->load->view('includes/footer');
    }

    // Mostra o formulário de cadastro de acomodação
    public function novo($_idCliente)
    {
        // Verifica se o id foi informado
        if (empty($_idCliente))
        {
            redirect('home');
        }

        // Armazena os dados
        $_dados['idCliente'] = $_idCliente;

        // Carrega as views
        $this->load->view('includes/header');
        $this->load->view('acomodacoes/novo', $_dados);
        $this->load->view('includes/footer');
    }

    // Mostra o formulário de edição de acomodação
    public function editar($_idAcomodacao)
    {
        // Verifica se o id foi informado
        if (empty($_idAcomodacao))
        {
            redirect('home');
        }

        $_dados['acomodacao'] = $this->acomodel->get_acomodacao($_idAcomodacao);

        // Carrega as views
        $this->load->view('includes/header');
        $this->load->view('acomodacoes/editar', $_dados);
        $this->load->view('includes/footer');
    }

    // Salva no banco
    public function save()
    {
        // Pega o id do cliente
        $_idCliente = $this->input->post('idCliente');

        // Verifica se o id do cliente foi informado
        if (empty($_idCliente))
        {
            redirect('home');
        }

        // Valida o formulário
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('descricao', 'Drescrição', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->novo($_idCliente);
        }
        else
        {
            // pega os valores passados pelo formulário
            $_nome       = $this->input->post('nome');
            $_descricao  = $this->input->post('descricao');
            $_infoExtra  = $this->input->post('infoExtra');
            $_tituloUm   = $this->input->post('tituloUm');
            $_valorUm    = $this->input->post('valorUm');
            $_tituloDois = $this->input->post('tituloDois');
            $_valorDois  = $this->input->post('valorDois');
            $_tituloTres = $this->input->post('tituloTres');
            $_valorTres  = $this->input->post('valorTres');

            // salva em um array
            $_dados = array(
                "nome_acomodacao"   => $_nome,
                "desc_acomodacao"   => $_descricao,
                "titulo_preco_um"   => $_tituloUm,
                "titulo_preco_dois" => $_tituloDois,
                "titulo_preco_tres" => $_tituloTres,
                "valor_preco_um"    => $_valorUm,
                "valor_preco_dois"  => $_valorDois,
                "valor_preco_tres"  => $_valorTres,
                "id_cliente"        => $_idCliente
            );

            // salva no banco
            $_save = $this->acomodel->save($_dados);

            // Verifica se salvou com sucesso
            if ($_save)
            {
                redirect('acomodacoes/listar' . '/' . $_idCliente);
            }
        }
    }

    // Salva no banco
    public function update()
    {
        // Pega o id do cliente
        $_idCliente = $this->input->post('idCliente');
        $_idAcomodacao = $this->input->post('idAcomodacao');

        // Verifica se o id do cliente foi informado
        if (empty($_idAcomodacao))
        {
            redirect('home');
        }

        // Valida o formulário
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('descricao', 'Drescrição', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->novo($_idCliente);
        }
        else
        {
            // pega os valores passados pelo formulário
            $_nome       = $this->input->post('nome');
            $_descricao  = $this->input->post('descricao');
            $_infoExtra  = $this->input->post('infoExtra');
            $_tituloUm   = $this->input->post('tituloUm');
            $_valorUm    = $this->input->post('valorUm');
            $_tituloDois = $this->input->post('tituloDois');
            $_valorDois  = $this->input->post('valorDois');
            $_tituloTres = $this->input->post('tituloTres');
            $_valorTres  = $this->input->post('valorTres');

            // salva em um array
            $_dados = array(
                "nome_acomodacao"   => $_nome,
                "desc_acomodacao"   => $_descricao,
                "titulo_preco_um"   => $_tituloUm,
                "titulo_preco_dois" => $_tituloDois,
                "titulo_preco_tres" => $_tituloTres,
                "valor_preco_um"    => $_valorUm,
                "valor_preco_dois"  => $_valorDois,
                "valor_preco_tres"  => $_valorTres,
                "id_cliente"        => $_idCliente
            );

            // salva no banco
            $_update = $this->acomodel->update($_dados, $_idAcomodacao);

            // Verifica se salvou com sucesso
            if ($_update)
            {
                redirect('acomodacoes/listar' . '/' . $_idCliente);
            }
        }
    }

    // Deleta um prato
    public function excluir($_idCliente, $_idAcomodacao)
    {
        // Verifica se foi informado os parametros
        if (empty($_idCliente) || empty($_idAcomodacao))
        {
            // Redireciona
            redirect('home');
        }

        // Verifica se deletou
        if ($this->acomodel->delete($_idAcomodacao))
        {
            redirect(base_url('acomodacoes/listar') . '/' . $_idCliente); 
        }
        else
        {
            redirect(base_url('acomodacoes/listar') . '/' . $_idCliente);
        }
    }
}