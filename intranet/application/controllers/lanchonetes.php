<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lanchonetes extends CI_Controller {

	// Método construtor
    public function __construct()
    {
        parent::__construct();

        // Carrega o model lanchonetes
        $this->load->model('lanchonetes_model', 'lanmodel');

        // Carrega o model enderecos
        $this->load->model('Enderecos_model', 'enderecosmodel');

        // Verifica se o usuario esta logado
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado'))
        {
            redirect('users/login');
        }
    }

	// Lista os lanchonetes
	public function index($msg = NULL)
	{
        // Pega todos os lanchonetes cadastrados
        $dados['lanchonetes']  = $this->lanmodel->all_lanchonetes();
        $dados['msg']          = $msg;

        // Chama a view
        $this->load->view('includes/header');
        $this->load->view('lanchonetes/listar', $dados);
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
        $this->load->view('lanchonetes/novo', $dados);
        $this->load->view('includes/footer');
    }

    // Cadastra o lanchonete no db
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

            $_tipo_lanchonete = $this->input->post('tipoLanchonete');
            if (!empty($_tipo_lanchonete)) : 
                $_tipo_lanchonete = implode(",", $_tipo_lanchonete);
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
                "logo_lanchonete"          => $_newLogo,
                "nome_lanchonete"          => $_nome,
                "desc_lanchonete"          => $_descricao,
                "twitter_lanchonete"       => $_twitter,
                "facebook_lanchonete"      => $_facebook,
                "youtube_lanchonete"       => $_youtube,
                "insta_lanchonete"         => $_instagram,
                "flickr_lanchonete"        => $_flickr,
                "googleplus_lanchonete"    => $_google,
                "orkut_lanchonete"         => $_orkut,
                "bairro_lanchonete"        => $_bairro,
                "uf_lanchonete"            => $_estado,
                "cidade_lanchonete"        => $_cidade,
                "rua_lanchonete"           => $_rua,
                "num_lanchonete"           => $_numero,
                "cep_lanchonete"           => $_cep,
                "long_lanchonete"          => $_longitude,
                "lati_lanchonete"          => $_latitude,
                "fone_atend_lanchonete"    => $_num_atendimento,
                "fone_entrega_lanchonete"  => $_num_entrega,
                "email_lanchonete"         => $_email,
                "site_lanchonete"          => $_site,
                "h_dom"                     => $_h_dom,
                "h_seg"                     => $_h_seg,
                "h_ter"                     => $_h_ter,
                "h_qua"                     => $_h_qua,
                "h_qui"                     => $_h_qui,
                "h_sex"                     => $_h_sex,
                "h_sab"                     => $_h_sab,
                "pag_lanchonete"           => $_pagamento,
                "extra_lanchonete"         => $_extras,
                "tipo_lanchonete"          => $_tipo_lanchonete,
                "tipo_comida_lanchonete"   => $_tipo_comida,
                "tipo_servico_lanchonete"  => $_tipo_servico,
                "adaptado_lanchonete"      => $_acessibilidade,
                "slug_lanchonete"          => $_slug,
                "status_lanchonete"        => $_status
            );

            $_save = $this->lanmodel->save($_dados);
    
            if ($_save)
            {
                $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>lanchonete cadastrado com sucesso!</div>');
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
            redirect('lanchonetes');
        }

        // Consulta o lanchonete
        $dados['lanchonete'] = $this->lanmodel->get_lanchonete($_id);

        // Envia uma msg
        $dados['msg'] = $_msg;

        // Pega todos os estados
        $dados['estados'] = $this->enderecosmodel->get_all_estados();

        // Pega as cidades
        $dados['cidades'] = $this->enderecosmodel->get_cidades($dados['lanchonete'][0]->uf_lanchonete);

        // Pega os bairros
        $dados['bairros'] = $this->enderecosmodel->get_bairros($dados['lanchonete'][0]->cidade_lanchonete);

        // Chama as views
        $this->load->view('includes/header');
        $this->load->view('lanchonetes/editar', $dados);
        $this->load->view('includes/footer');
    }

    // Atualiza as informações do lanchonete
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

            $_tipo_lanchonete = $this->input->post('tipoLanchonete');
            if (!empty($_tipo_lanchonete)) : 
                $_tipo_lanchonete = implode(",", $_tipo_lanchonete);
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
                "logo_lanchonete"          => $_newLogo,
                "nome_lanchonete"          => $_nome,
                "desc_lanchonete"          => $_descricao,
                "twitter_lanchonete"       => $_twitter,
                "facebook_lanchonete"      => $_facebook,
                "youtube_lanchonete"       => $_youtube,
                "insta_lanchonete"         => $_instagram,
                "flickr_lanchonete"        => $_flickr,
                "googleplus_lanchonete"    => $_google,
                "orkut_lanchonete"         => $_orkut,
                "bairro_lanchonete"        => $_bairro,
                "uf_lanchonete"            => $_estado,
                "cidade_lanchonete"        => $_cidade,
                "rua_lanchonete"           => $_rua,
                "num_lanchonete"           => $_numero,
                "cep_lanchonete"           => $_cep,
                "long_lanchonete"          => $_longitude,
                "lati_lanchonete"          => $_latitude,
                "fone_atend_lanchonete"    => $_num_atendimento,
                "fone_entrega_lanchonete"  => $_num_entrega,
                "email_lanchonete"         => $_email,
                "site_lanchonete"          => $_site,
                "h_dom"                     => $_h_dom,
                "h_seg"                     => $_h_seg,
                "h_ter"                     => $_h_ter,
                "h_qua"                     => $_h_qua,
                "h_qui"                     => $_h_qui,
                "h_sex"                     => $_h_sex,
                "h_sab"                     => $_h_sab,
                "pag_lanchonete"           => $_pagamento,
                "extra_lanchonete"         => $_extras,
                "tipo_lanchonete"          => $_tipo_lanchonete,
                "tipo_comida_lanchonete"   => $_tipo_comida,
                "tipo_servico_lanchonete"  => $_tipo_servico,
                "adaptado_lanchonete"      => $_acessibilidade,
                "slug_lanchonete"          => $_slug,
                "status_lanchonete"        => 1
            );

            $_update = $this->lanmodel->update($_id, $_dados);

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

    // Deleta o lanchonete
    public function excluir($_id)
    {
        // Verifica se o id do usuário foi informado
        if (empty($_id))
        {
            redirect('lanchonetes');
        }

        // Verifica se deletou o usuário informado
        $_delete = $this->lanmodel->delete($_id);

        // Verifica se foi deletado
        if ($_delete)
        {
            $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>lanchonete deletado com sucesso!</div>');
        }
        else
        {
            $this->index('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Não foi possível deletar o lanchonete, por favor, tente novamente!</div>');
        }
    }

    
}