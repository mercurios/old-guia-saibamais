<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Locais extends CI_Controller {

	// Método construtor
    public function __construct()
    {
        parent::__construct();

        // Carrega o model locais
        $this->load->model('Locais_model', 'localmodel');

        // Carrega o model enderecos
        $this->load->model('Enderecos_model', 'enderecosmodel');

        // Verifica se o usuario esta logado
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado'))
        {
            redirect('users/login');
        }
    }

	// Lista os locais
	public function index($msg = NULL)
	{
        // Pega todos os locais cadastrados
        $dados['locais']  = $this->localmodel->all_locais();
        $dados['msg']     = $msg;

        // Chama a view
        $this->load->view('includes/header');
        $this->load->view('locais/listar', $dados);
        $this->load->view('includes/footer');
	}

    // Chama o forumlário de cadastro
    public function novo($_msg = NULL)
    {
        $dados['msg'] = $_msg;

        // Pega todos os estados
        $dados['estados'] = $this->enderecosmodel->get_all_estados();

        // Chama as views
        $this->load->view('includes/header');
        $this->load->view('locais/novo', $dados);
        $this->load->view('includes/footer');
    }

    // exibe o formulário de edição
    public function editar($_id)
    {
        // Pega o local informado pelo id
        $dados['local'] = $this->localmodel->get_local($_id);

        // Pega todos os estados
        $dados['estados'] = $this->enderecosmodel->get_all_estados();

        // Pega as cidades
        $dados['cidades'] = $this->enderecosmodel->get_cidades($dados['local'][0]->uf_local);

        // Pega os bairros
        $dados['bairros'] = $this->enderecosmodel->get_bairros($dados['local'][0]->cidade_local);

        // Chama as views
        $this->load->view('includes/header');
        $this->load->view('locais/editar', $dados);
        $this->load->view('includes/footer');
    }

    // Cadastra o local no db
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
            // Pega as informações enviadas pelo formulário
            $_logo              = 'logo';
            $_nome              = $this->input->post('nome');
            $_descricao         = $this->input->post('descricao');
            $_dicas             = $this->input->post('dicas');
            $_estado            = $this->input->post('estado');
            $_cidade            = $this->input->post('cidade');
            $_estado            = $this->input->post('estado');
            $_bairro            = $this->input->post('bairro');
            $_rua               = $this->input->post('rua');
            $_numero            = $this->input->post('numero');
            $_cep               = $this->input->post('cep');
            $_longitude         = $this->input->post('longitude');
            $_latitude          = $this->input->post('latitude');
            $_h_dom             = $this->input->post('h_dom');
            $_h_seg             = $this->input->post('h_seg');
            $_h_ter             = $this->input->post('h_ter');
            $_h_qua             = $this->input->post('h_qua');
            $_h_qui             = $this->input->post('h_qui');
            $_h_sex             = $this->input->post('h_sex');
            $_h_sab             = $this->input->post('h_sab');
            $_valorInteira      = $this->input->post('valorInteira');
            $_valorMeia         = $this->input->post('valorMeia');
            $_valorEspecial     = $this->input->post('valorEspecial');
            $_censura           = $this->input->post('censura');
            $_slug              = $this->biblioteca->gerar_slug($_nome);
            $_status            = 1;

            $_acessibilidade = $this->input->post('acessibilidade');
            if (!empty($_acessibilidade)) : 
                $_acessibilidade = implode(",", $_acessibilidade);
            endif;

            $_categoria = $this->input->post('categoria');
            if (!empty($_categoria)) : 
                $_categoria = implode(",", $_categoria);
            endif;

            $_titulo_oqfazer = $this->input->post('tituloOqfazer');
            if (!empty($_titulo_oqfazer)) : 
                $_titulo_oqfazer = implode("_-_", $_titulo_oqfazer);
            endif;

            $_link_oqfazer = $this->input->post('linkOqfazer');
            if (!empty($_link_oqfazer)) : 
                $_link_oqfazer = implode("_-_", $_link_oqfazer);
            endif;

            $_desc_oqfazer = $this->input->post('descOqfazer');
            if (!empty($_desc_oqfazer)) : 
                $_desc_oqfazer = implode("_-_", $_desc_oqfazer);
            endif;

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

            // salva os dados em um array
            $_dados = array(
                "logo_local"        => $_newLogo,
                "nome_local"        => $_nome,
                "desc_local"        => $_descricao,
                "dicas_local"       => $_dicas,
                "bairro_local"      => $_bairro,
                "uf_local"          => $_estado,
                "cidade_local"      => $_cidade,
                "rua_local"         => $_rua,
                "num_local"         => $_numero,
                "cep_local"         => $_cep,
                "long_local"        => $_longitude,
                "lati_local"        => $_latitude,
                "h_dom"             => $_h_dom,
                "h_seg"             => $_h_seg,
                "h_ter"             => $_h_ter,
                "h_qua"             => $_h_qua,
                "h_qui"             => $_h_qui,
                "h_sex"             => $_h_sex,
                "h_sab"             => $_h_sab,
                "categoria_local"   => $_categoria,
                "val_inteira_local" => $_valorInteira,
                "val_meia_local"    => $_valorMeia,
                "val_especial_local" => $_valorEspecial,
                "censura_local"     => $_censura,
                "fazer_titulo_local" => $_titulo_oqfazer,
                "fazer_desc_local"  => $_desc_oqfazer,
                "fazer_link_local"  => $_link_oqfazer,
                "adaptado_local"    => $_acessibilidade,
                "slug_local"        => $_slug
            );

            $_save = $this->localmodel->save($_dados);
    
            if ($_save)
            {
                $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Local cadastrado com sucesso!</div>');
            }
            else
            {
                $this->index('Erros ocorreram, por favor, contacte um administrador!');
            }
        }
    }

    // atualiza o local no db
    public function update()
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

            // Pega as informações enviadas pelo formulário
            $_nome              = $this->input->post('nome');
            $_descricao         = $this->input->post('descricao');
            $_dicas             = $this->input->post('dicas');
            $_estado            = $this->input->post('estado');
            $_cidade            = $this->input->post('cidade');
            $_estado            = $this->input->post('estado');
            $_bairro            = $this->input->post('bairro');
            $_rua               = $this->input->post('rua');
            $_numero            = $this->input->post('numero');
            $_cep               = $this->input->post('cep');
            $_longitude         = $this->input->post('longitude');
            $_latitude          = $this->input->post('latitude');
            $_h_dom             = $this->input->post('h_dom');
            $_h_seg             = $this->input->post('h_seg');
            $_h_ter             = $this->input->post('h_ter');
            $_h_qua             = $this->input->post('h_qua');
            $_h_qui             = $this->input->post('h_qui');
            $_h_sex             = $this->input->post('h_sex');
            $_h_sab             = $this->input->post('h_sab');
            $_valorInteira      = $this->input->post('valorInteira');
            $_valorMeia         = $this->input->post('valorMeia');
            $_valorEspecial     = $this->input->post('valorEspecial');
            $_censura           = $this->input->post('censura');
            $_slug              = $this->biblioteca->gerar_slug($_nome);
            $_status            = 1;

            $_acessibilidade = $this->input->post('acessibilidade');
            if (!empty($_acessibilidade)) : 
                $_acessibilidade = implode(",", $_acessibilidade);
            endif;

            $_categoria = $this->input->post('categoria');
            if (!empty($_categoria)) : 
                $_categoria = implode(",", $_categoria);
            endif;

            $_titulo_oqfazer = $this->input->post('tituloOqfazer');
            if (!empty($_titulo_oqfazer)) : 
                $_titulo_oqfazer = implode("_-_", $_titulo_oqfazer);
            endif;

            $_link_oqfazer = $this->input->post('linkOqfazer');
            if (!empty($_link_oqfazer)) : 
                $_link_oqfazer = implode("_-_", $_link_oqfazer);
            endif;

            $_desc_oqfazer = $this->input->post('descOqfazer');
            if (!empty($_desc_oqfazer)) : 
                $_desc_oqfazer = implode("_-_", $_desc_oqfazer);
            endif;

            // salva os dados em um array
            $_dados = array(
                "logo_local"        => $_newLogo,
                "nome_local"        => $_nome,
                "desc_local"        => $_descricao,
                "dicas_local"       => $_dicas,
                "bairro_local"      => $_bairro,
                "uf_local"          => $_estado,
                "cidade_local"      => $_cidade,
                "rua_local"         => $_rua,
                "num_local"         => $_numero,
                "cep_local"         => $_cep,
                "long_local"        => $_longitude,
                "lati_local"        => $_latitude,
                "h_dom"             => $_h_dom,
                "h_seg"             => $_h_seg,
                "h_ter"             => $_h_ter,
                "h_qua"             => $_h_qua,
                "h_qui"             => $_h_qui,
                "h_sex"             => $_h_sex,
                "h_sab"             => $_h_sab,
                "categoria_local"   => $_categoria,
                "val_inteira_local" => $_valorInteira,
                "val_meia_local"    => $_valorMeia,
                "val_especial_local" => $_valorEspecial,
                "censura_local"     => $_censura,
                "fazer_titulo_local" => $_titulo_oqfazer,
                "fazer_desc_local"  => $_desc_oqfazer,
                "fazer_link_local"  => $_link_oqfazer,
                "adaptado_local"    => $_acessibilidade,
                "slug_local"        => $_slug
            );

            $_update = $this->localmodel->update($_id, $_dados);

            if ($_update)
            {
                $this->editar($_id, '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Local atualizado com sucesso!</div>');
            }
            else
            {
                $this->index('Erros ocorreram, por favor, contacte um administrador!');
            }
        }
    }

    // Deleta o local
    public function excluir($_id)
    {
        // Verifica se o id do usuário foi informado
        if (empty($_id))
        {
            redirect('locais');
        }

        // Verifica se deletou o usuário informado
        $_delete = $this->localmodel->delete($_id);

        // Verifica se foi deletado
        if ($_delete)
        {
            $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>local deletado com sucesso!</div>');
        }
        else
        {
            $this->index('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Não foi possível deletar o local, por favor, tente novamente!</div>');
        }
    }

    
}