<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadias extends CI_Controller {

	// Método construtor
    public function __construct()
    {
        parent::__construct();

        // Carrega o model estadias
        $this->load->model('estadias_model', 'estmodel');

        // Carrega o model enderecos
        $this->load->model('Enderecos_model', 'enderecosmodel');

        // Verifica se o usuario esta logado
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado'))
        {
            redirect('users/login');
        }
    }

	// Lista os estadias
	public function index($msg = NULL)
	{
        // Pega todos os estadias cadastrados
        $dados['estadias']  = $this->estmodel->all_estadias();
        $dados['msg']       = $msg;

        // Chama a view
        $this->load->view('includes/header');
        $this->load->view('estadias/listar', $dados);
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
        $this->load->view('estadias/novo', $dados);
        $this->load->view('includes/footer');
    }

    // Cadastra o estadia no db
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
            $_logo              = 'logo';
            $_nome              = $this->input->post('nome');
            $_descricao         = $this->input->post('descricao');
            $_twitter           = $this->input->post('twitter');
            $_facebook          = $this->input->post('facebook');
            $_youtube           = $this->input->post('youtube');
            $_instagram         = $this->input->post('instagram');
            $_flickr            = $this->input->post('flickr');
            $_google            = $this->input->post('google');
            $_orkut             = $this->input->post('orkut');
            $_estado            = $this->input->post('estado');
            $_cidade            = $this->input->post('cidade');
            $_estado            = $this->input->post('estado');
            $_bairro            = $this->input->post('bairro');
            $_rua               = $this->input->post('rua');
            $_numero            = $this->input->post('numero');
            $_cep               = $this->input->post('cep');
            $_longitude         = $this->input->post('longitude');
            $_latitude          = $this->input->post('latitude');
            $_num_atendimento   = $this->input->post('num_atendimento');
            $_email             = $this->input->post('email');
            $_site              = $this->input->post('site');
            $_slug              = $this->biblioteca->gerar_slug($_nome);
            $_status            = 1;

            // Verifica se está vazio / Se não, regulariza para ser gravado no banco
            $_extras = $this->input->post('infoExtras');
            if (!empty($_extras)) : 
                $_extras = implode(",", $_extras);
            endif;

            $_tipo_estadia = $this->input->post('porTipo');
            if (!empty($_tipo_estadia)) : 
                $_tipo_estadia = implode(",", $_tipo_estadia);
            endif;

            $_localidade = $this->input->post('porLocalidade');
            if (!empty($_localidade)) : 
                $_localidade = implode(",", $_localidade);
            endif;

            $_classificacao = $this->input->post('tipoClassificacao');
            if (!empty($_classificacao)) : 
                $_classificacao = implode(",", $_classificacao);
            endif;

            $_acessibilidade = $this->input->post('acessibilidade');
            if (!empty($_acessibilidade)) : 
                $_acessibilidade = implode(",", $_acessibilidade);
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

            // Grava as informações em um array
            $_dados = array(
                "logo_estadia"          => $_newLogo,
                "nome_estadia"          => $_nome,
                "desc_estadia"          => $_descricao,
                "twitter_estadia"       => $_twitter,
                "facebook_estadia"      => $_facebook,
                "youtube_estadia"       => $_youtube,
                "insta_estadia"         => $_instagram,
                "flickr_estadia"        => $_flickr,
                "googleplus_estadia"    => $_google,
                "orkut_estadia"         => $_orkut,
                "bairro_estadia"        => $_bairro,
                "uf_estadia"            => $_estado,
                "cidade_estadia"        => $_cidade,
                "rua_estadia"           => $_rua,
                "num_estadia"           => $_numero,
                "cep_estadia"           => $_cep,
                "long_estadia"          => $_longitude,
                "lati_estadia"          => $_latitude,
                "fone_estadia"          => $_num_atendimento,
                "email_estadia"         => $_email,
                "site_estadia"          => $_site,
                "extra_estadia"         => $_extras,
                "tipo_estadia"          => $_tipo_estadia,
                "localidade_estadia"    => $_localidade,
                "class_estadia"         => $_classificacao,
                "adaptado_estadia"      => $_acessibilidade,
                "slug_estadia"          => $_slug,
                "status_estadia"        => $_status
            );

            $_save = $this->estmodel->save($_dados);
    
            if ($_save)
            {
                $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>estadia cadastrado com sucesso!</div>');
            }
            else
            {
                $this->index('Erros ocorreram, por favor, contacte um administrador!');
            }
        }
    }

    // Exibe o formulário de edição
    public function editar($_id = NULL, $_msg = NULL)
    {
        // Verifica se o id foi informado
        if (empty($_id))
        {
            redirect('estadias');
        }

        // Consulta o estadia
        $dados['estadia'] = $this->estmodel->get_estadia($_id);

        // Envia uma msg
        $dados['msg'] = $_msg;

        // Pega todos os estados
        $dados['estados'] = $this->enderecosmodel->get_all_estados();

        // Pega as cidades
        $dados['cidades'] = $this->enderecosmodel->get_cidades($dados['estadia'][0]->uf_estadia);

        // Pega os bairros
        $dados['bairros'] = $this->enderecosmodel->get_bairros($dados['estadia'][0]->cidade_estadia);

        // Chama as views
        $this->load->view('includes/header');
        $this->load->view('estadias/editar', $dados);
        $this->load->view('includes/footer');
    }

    // Atualiza as informações do estadia
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
                redirect('estadias');
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

            // Pega as informações
            $_nome              = $this->input->post('nome');
            $_descricao         = $this->input->post('descricao');
            $_twitter           = $this->input->post('twitter');
            $_facebook          = $this->input->post('facebook');
            $_youtube           = $this->input->post('youtube');
            $_instagram         = $this->input->post('instagram');
            $_flickr            = $this->input->post('flickr');
            $_google            = $this->input->post('google');
            $_orkut             = $this->input->post('orkut');
            $_estado            = $this->input->post('estado');
            $_cidade            = $this->input->post('cidade');
            $_estado            = $this->input->post('estado');
            $_bairro            = $this->input->post('bairro');
            $_rua               = $this->input->post('rua');
            $_numero            = $this->input->post('numero');
            $_cep               = $this->input->post('cep');
            $_longitude         = $this->input->post('longitude');
            $_latitude          = $this->input->post('latitude');
            $_num_atendimento   = $this->input->post('num_atendimento');
            $_email             = $this->input->post('email');
            $_site              = $this->input->post('site');
            $_slug              = $this->biblioteca->gerar_slug($_nome);
            $_status            = 1;

            // Verifica se está vazio / Se não, regulariza para ser gravado no banco
            $_extras = $this->input->post('infoExtras');
            if (!empty($_extras)) : 
                $_extras = implode(",", $_extras);
            endif;

            $_tipo_estadia = $this->input->post('porTipo');
            if (!empty($_tipo_estadia)) : 
                $_tipo_estadia = implode(",", $_tipo_estadia);
            endif;

            $_localidade = $this->input->post('porLocalidade');
            if (!empty($_localidade)) : 
                $_localidade = implode(",", $_localidade);
            endif;

            $_classificacao = $this->input->post('tipoClassificacao');
            if (!empty($_classificacao)) : 
                $_classificacao = implode(",", $_classificacao);
            endif;

            $_acessibilidade = $this->input->post('acessibilidade');
            if (!empty($_acessibilidade)) : 
                $_acessibilidade = implode(",", $_acessibilidade);
            endif;

            // Grava as informações em um array
            // Grava as informações em um array
            $_dados = array(
                "logo_estadia"          => $_newLogo,
                "nome_estadia"          => $_nome,
                "desc_estadia"          => $_descricao,
                "twitter_estadia"       => $_twitter,
                "facebook_estadia"      => $_facebook,
                "youtube_estadia"       => $_youtube,
                "insta_estadia"         => $_instagram,
                "flickr_estadia"        => $_flickr,
                "googleplus_estadia"    => $_google,
                "orkut_estadia"         => $_orkut,
                "bairro_estadia"        => $_bairro,
                "uf_estadia"            => $_estado,
                "cidade_estadia"        => $_cidade,
                "rua_estadia"           => $_rua,
                "num_estadia"           => $_numero,
                "cep_estadia"           => $_cep,
                "long_estadia"          => $_longitude,
                "lati_estadia"          => $_latitude,
                "fone_estadia"          => $_num_atendimento,
                "email_estadia"         => $_email,
                "site_estadia"          => $_site,
                "extra_estadia"         => $_extras,
                "tipo_estadia"          => $_tipo_estadia,
                "localidade_estadia"    => $_localidade,
                "class_estadia"         => $_classificacao,
                "adaptado_estadia"      => $_acessibilidade,
                "slug_estadia"          => $_slug,
                "status_estadia"        => $_status
            );

            $_update = $this->estmodel->update($_id, $_dados);

            if ($_update)
            {
                $this->editar($_id, '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>estadia atualizado com sucesso!</div>');
            }
            else
            {
                $this->index('Erros ocorreram, por favor, contacte um administrador!');
            }
        }
    }

    // Deleta o estadia
    public function excluir($_id)
    {
        // Verifica se o id do usuário foi informado
        if (empty($_id))
        {
            redirect('estadias');
        }

        // Verifica se deletou o usuário informado
        $_delete = $this->estmodel->delete($_id);

        // Verifica se foi deletado
        if ($_delete)
        {
            $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>estadia deletado com sucesso!</div>');
        }
        else
        {
            $this->index('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Não foi possível deletar o estadia, por favor, tente novamente!</div>');
        }
    }

    
}