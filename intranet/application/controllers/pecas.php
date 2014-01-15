<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pecas extends CI_Controller {

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
        $this->load->model('pecas_model', 'pecamodel');
    }

    public function index()
    {
        // Redireciona para home
        redirect('home');
    }

    // Lista os pecas do peca
    public function listar($_idCliente, $_msg = NULL)
    {
        // Verifica se foi informado os parametros
        if (empty($_idCliente))
        {
            // Se não foi, redireciona para home
            redirect('home');
        }

        // Envia para a view
        $_dados['pecas']    = $this->pecamodel->get_pecas($_idCliente);
        $_dados['msg']      = $_msg;

        // Carrega as views
        $this->load->view('includes/header');
        $this->load->view('pecas/listar', $_dados);
        $this->load->view('includes/footer');
    }

    // Cadastra um novo peca
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
        $this->load->view('pecas/novo', $_dados);
        $this->load->view('includes/footer');
    }

    // Salva no banco
    public function save()
    {
        $_logo      = 'logo';
        $_idCliente = $this->input->post('idCliente');
        $_titulo    = $this->input->post('titulo');
        $_descricao = $this->input->post('descricao');
        $_categoria = $this->input->post('categoria');
        $_duracao   = $this->input->post('duracao');
        $_censura   = $this->input->post('censura');
        $_valInt    = $this->input->post('val_inteira');
        $_valMei    = $this->input->post('val_meia');
        $_h_dom     = $this->input->post('h_dom');
        $_h_seg     = $this->input->post('h_seg');
        $_h_ter     = $this->input->post('h_ter');
        $_h_qua     = $this->input->post('h_qua');
        $_h_qui     = $this->input->post('h_qui');
        $_h_sex     = $this->input->post('h_sex');
        $_h_sab     = $this->input->post('h_sab');

        // Seta as configurações de upload
        $_config['upload_path']     = '../uploads/pecas'; // Caminho
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
            "logo_peca"         => $_newLogo,
            "titulo_peca"       => $_titulo,
            "desc_peca"         => $_descricao,
            "duracao_peca"      => $_duracao,
            "categoria_peca"    => $_categoria,
            "idade_peca"        => $_censura,
            "val_inteira"       => $_valInt,
            "val_meia"          => $_valMei,
            "id_teatro"         => $_idCliente,
            "h_dom"             => $_h_dom,
            "h_seg"             => $_h_seg,
            "h_ter"             => $_h_ter,
            "h_qua"             => $_h_qua,
            "h_qui"             => $_h_qui,
            "h_sex"             => $_h_sex,
            "h_sab"             => $_h_sab
        );

        $_save = $this->pecamodel->save($_dados);
    
        if ($_save)
        {
            redirect('pecas/listar/' . $_idCliente);
        }
        else
        {
            redirect('pecas/listar/' . $_idCliente);
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

        $_dados['peca'] = $this->pecamodel->get_peca($_id);

        // Carrega as views
        $this->load->view('includes/header');
        $this->load->view('pecas/editar', $_dados);
        $this->load->view('includes/footer');
    }

    // Atualiza no banco
    public function update()
    {
        // Pega o id do cliente
        $_idCliente = $this->input->post('idCliente');
        $_idpeca = $this->input->post('idpeca');
        $_imgAtual = $this->input->post('imgAtual');

        // Verifica se o id do cliente foi informado
        if (empty($_idpeca))
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
            $_config['upload_path']     = '../uploads/pecas/'; // Caminho
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
        $_titulo    = $this->input->post('titulo');
        $_descricao = $this->input->post('descricao');
        $_categoria = $this->input->post('categoria');
        $_duracao   = $this->input->post('duracao');
        $_censura   = $this->input->post('censura');
        $_valInt    = $this->input->post('val_inteira');
        $_valMei    = $this->input->post('val_meia');
        $_h_dom     = $this->input->post('h_dom');
        $_h_seg     = $this->input->post('h_seg');
        $_h_ter     = $this->input->post('h_ter');
        $_h_qua     = $this->input->post('h_qua');
        $_h_qui     = $this->input->post('h_qui');
        $_h_sex     = $this->input->post('h_sex');
        $_h_sab     = $this->input->post('h_sab');

        // Salva os dados em um array
        $_dados = array(
            "logo_peca"         => $_newLogo,
            "titulo_peca"       => $_titulo,
            "desc_peca"         => $_descricao,
            "duracao_peca"      => $_duracao,
            "categoria_peca"    => $_categoria,
            "idade_peca"        => $_censura,
            "val_inteira"       => $_valInt,
            "val_meia"          => $_valMei,
            "id_teatro"         => $_idCliente,
            "h_dom"             => $_h_dom,
            "h_seg"             => $_h_seg,
            "h_ter"             => $_h_ter,
            "h_qua"             => $_h_qua,
            "h_qui"             => $_h_qui,
            "h_sex"             => $_h_sex,
            "h_sab"             => $_h_sab
        );

        $_update = $this->pecamodel->update($_idpeca, $_dados);
    
        if ($_update)
        {
            redirect('pecas/listar/' . $_idCliente);
        }
        else
        {
            redirect('pecas/listar/' . $_idCliente);
        };
    }

    // Deleta um prato
    public function excluir($_idPeca, $_idTeatro)
    {
        // Verifica se foi informado os parametros
        if (empty($_idPeca) || empty($_idTeatro))
        {
            // Redireciona
            redirect('home');
        }

        // Verifica se deletou
        if ($this->pecamodel->delete($_idPeca))
        {
            redirect(base_url('pecas/listar') . '/' . $_idTeatro); 
        }
        else
        {
            redirect(base_url('pecas/listar') . '/' . $_idTeatro);
        }
    }
}