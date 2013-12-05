<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Locais extends CI_Controller {

	// Método construtor
    public function __construct()
    {
        parent::__construct();

        // Carrega o model locals
        $this->load->model('Locais_model', 'localmodel');

        // Carrega o model enderecos
        $this->load->model('Enderecos_model', 'enderecosmodel');

        // Verifica se o usuario esta logado
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado'))
        {
            redirect('users/login');
        }
    }

	// Lista os locals
	public function index($msg = NULL)
	{
        // Pega todos os locals cadastrados
        $dados['locals']  = $this->localmodel->all_locals();
        $dados['msg']     = $msg;

        // Chama a view
        $this->load->view('includes/header');
        $this->load->view('locals/listar', $dados);
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
        $this->load->view('locals/novo', $dados);
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
            $_num_entrega       = $this->input->post('num_entrega');
            $_email             = $this->input->post('email');
            $_site              = $this->input->post('site');
            $_h_dom             = $this->input->post('h_dom');
            $_h_seg             = $this->input->post('h_seg');
            $_h_ter             = $this->input->post('h_ter');
            $_h_qua             = $this->input->post('h_qua');
            $_h_qui             = $this->input->post('h_qui');
            $_h_sex             = $this->input->post('h_sex');
            $_h_sab             = $this->input->post('h_sab');
            $_slug              = $this->biblioteca->gerar_slug($_nome);
            $_status            = 1;

            // Verifica se está vazio / Se não, regulariza para ser gravado no banco
            $_pagamento = $this->input->post('formaPagamento');
            if (!empty($_pagamento)) : 
                $_pagamento = implode(",", $_pagamento);
            endif;

            $_extras = $this->input->post('infoExtras');
            if (!empty($_extras)) : 
                $_extras = implode(",", $_extras);
            endif;

            $_tipo_local = $this->input->post('tipolocal');
            if (!empty($_tipo_local)) : 
                $_tipo_local = implode(",", $_tipo_local);
            endif;

            $_tipo_comida = $this->input->post('tipoComida');
            if (!empty($_tipo_comida)) : 
                $_tipo_comida = implode(",", $_tipo_comida);
            endif;

            $_tipo_servico = $this->input->post('tipoServico');
            if (!empty($_tipo_servico)) : 
                $_tipo_servico = implode(",", $_tipo_servico);
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
                "logo_local"          => $_newLogo,
                "nome_local"          => $_nome,
                "desc_local"          => $_descricao,
                "twitter_local"       => $_twitter,
                "facebook_local"      => $_facebook,
                "youtube_local"       => $_youtube,
                "insta_local"         => $_instagram,
                "flickr_local"        => $_flickr,
                "googleplus_local"    => $_google,
                "orkut_local"         => $_orkut,
                "bairro_local"        => $_bairro,
                "uf_local"            => $_estado,
                "cidade_local"        => $_cidade,
                "rua_local"           => $_rua,
                "num_local"           => $_numero,
                "cep_local"           => $_cep,
                "long_local"          => $_longitude,
                "lati_local"          => $_latitude,
                "fone_atend_local"    => $_num_atendimento,
                "fone_entrega_local"  => $_num_entrega,
                "email_local"         => $_email,
                "site_local"          => $_site,
                "h_dom"                     => $_h_dom,
                "h_seg"                     => $_h_seg,
                "h_ter"                     => $_h_ter,
                "h_qua"                     => $_h_qua,
                "h_qui"                     => $_h_qui,
                "h_sex"                     => $_h_sex,
                "h_sab"                     => $_h_sab,
                "pag_local"           => $_pagamento,
                "extra_local"         => $_extras,
                "tipo_local"          => $_tipo_local,
                "tipo_comida_local"   => $_tipo_comida,
                "tipo_servico_local"  => $_tipo_servico,
                "adaptado_local"      => $_acessibilidade,
                "slug_local"          => $_slug,
                "status_local"        => $_status
            );

            $_save = $this->localmodel->save($_dados);
    
            if ($_save)
            {
                $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>local cadastrado com sucesso!</div>');
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
            redirect('locals');
        }

        // Consulta o local
        $dados['local'] = $this->localmodel->get_local($_id);

        // Envia uma msg
        $dados['msg'] = $_msg;

        // Pega todos os estados
        $dados['estados'] = $this->enderecosmodel->get_all_estados();

        // Pega as cidades
        $dados['cidades'] = $this->enderecosmodel->get_cidades($dados['local'][0]->uf_local);

        // Pega os bairros
        $dados['bairros'] = $this->enderecosmodel->get_bairros($dados['local'][0]->cidade_local);

        // Chama as views
        $this->load->view('includes/header');
        $this->load->view('locals/editar', $dados);
        $this->load->view('includes/footer');
    }

    // Atualiza as informações do local
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
                redirect('locals');
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
            $_num_entrega       = $this->input->post('num_entrega');
            $_email             = $this->input->post('email');
            $_site              = $this->input->post('site');
            $_h_dom             = $this->input->post('h_dom');
            $_h_seg             = $this->input->post('h_seg');
            $_h_ter             = $this->input->post('h_ter');
            $_h_qua             = $this->input->post('h_qua');
            $_h_qui             = $this->input->post('h_qui');
            $_h_sex             = $this->input->post('h_sex');
            $_h_sab             = $this->input->post('h_sab');
            $_slug              = $this->biblioteca->gerar_slug($_nome);

            // Verifica se está vazio / Se não, regulariza para ser gravado no banco
            $_pagamento = $this->input->post('formaPagamento');
            if (!empty($_pagamento)) : 
                $_pagamento = implode(",", $_pagamento);
            endif;

            $_extras = $this->input->post('infoExtras');
            if (!empty($_extras)) : 
                $_extras = implode(",", $_extras);
            endif;

            $_tipo_local = $this->input->post('tipolocal');
            if (!empty($_tipo_local)) : 
                $_tipo_local = implode(",", $_tipo_local);
            endif;

            $_tipo_comida = $this->input->post('tipoComida');
            if (!empty($_tipo_comida)) : 
                $_tipo_comida = implode(",", $_tipo_comida);
            endif;

            $_tipo_servico = $this->input->post('tipoServico');
            if (!empty($_tipo_servico)) : 
                $_tipo_servico = implode(",", $_tipo_servico);
            endif;

            $_acessibilidade = $this->input->post('acessibilidade');
            if (!empty($_acessibilidade)) : 
                $_acessibilidade = implode(",", $_acessibilidade);
            endif;

            // Grava as informações em um array
            $_dados = array(
                "logo_local"          => $_newLogo,
                "nome_local"          => $_nome,
                "desc_local"          => $_descricao,
                "twitter_local"       => $_twitter,
                "facebook_local"      => $_facebook,
                "youtube_local"       => $_youtube,
                "insta_local"         => $_instagram,
                "flickr_local"        => $_flickr,
                "googleplus_local"    => $_google,
                "orkut_local"         => $_orkut,
                "bairro_local"        => $_bairro,
                "uf_local"            => $_estado,
                "cidade_local"        => $_cidade,
                "rua_local"           => $_rua,
                "num_local"           => $_numero,
                "cep_local"           => $_cep,
                "long_local"          => $_longitude,
                "lati_local"          => $_latitude,
                "fone_atend_local"    => $_num_atendimento,
                "fone_entrega_local"  => $_num_entrega,
                "email_local"         => $_email,
                "site_local"          => $_site,
                "h_dom"                     => $_h_dom,
                "h_seg"                     => $_h_seg,
                "h_ter"                     => $_h_ter,
                "h_qua"                     => $_h_qua,
                "h_qui"                     => $_h_qui,
                "h_sex"                     => $_h_sex,
                "h_sab"                     => $_h_sab,
                "pag_local"           => $_pagamento,
                "extra_local"         => $_extras,
                "tipo_local"          => $_tipo_local,
                "tipo_comida_local"   => $_tipo_comida,
                "tipo_servico_local"  => $_tipo_servico,
                "adaptado_local"      => $_acessibilidade,
                "slug_local"          => $_slug,
                "status_local"        => 1
            );

            $_update = $this->localmodel->update($_id, $_dados);

            if ($_update)
            {
                $this->editar($_id, '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>local atualizado com sucesso!</div>');
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
            redirect('locals');
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