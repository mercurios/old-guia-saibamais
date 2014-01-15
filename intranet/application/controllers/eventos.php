<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos extends CI_Controller {

    // Método construtor
    public function __construct()
    {
        parent::__construct();

        // Verifica se o usuario esta logado
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado'))
        {
            redirect('users/login');
        }

        // Carrega o model eventos
        $this->load->model('eventos_model', 'eventmodel');

        // Carrega o model enderecos
        $this->load->model('Enderecos_model', 'enderecosmodel');
    }

    // Lista os eventos
    public function index($msg = NULL)
    {
        // Pega todos os eventos cadastrados
        $dados['eventos']    = $this->eventmodel->all_eventos();
        $dados['msg']           = $msg;

        // Chama a view
        $this->load->view('includes/header');
        $this->load->view('eventos/listar', $dados);
        $this->load->view('includes/footer');
    }

    // Exibe o formulário
    public function novo($_msg = NULL)
    {
        $dados['msg'] = $_msg;

        // Pega todos os estados
        $dados['estados'] = $this->enderecosmodel->get_all_estados();

        // Chama as views
        $this->load->view('includes/header');
        $this->load->view('eventos/novo', $dados);
        $this->load->view('includes/footer');
    }

    // Salva no banco
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
            $_logo          = 'logo';
            $_nome          = $this->input->post('nome');
            $_descricao     = $this->input->post('descricao');
            $_data          = $this->input->post('data');
            $_horario       = $this->input->post('horario');
            $_censura       = $this->input->post('censura');
            $_twitter       = $this->input->post('twitter');
            $_facebook      = $this->input->post('facebook');
            $_youtube       = $this->input->post('youtube');
            $_instagram     = $this->input->post('instagram');
            $_flickr        = $this->input->post('flickr');
            $_google        = $this->input->post('google');
            $_orkut         = $this->input->post('orkut');
            $_atendimento   = $this->input->post('num_atendimento');
            $_email         = $this->input->post('email');
            $_site          = $this->input->post('site');
            $_tituloUm      = $this->input->post('tituloUm');
            $_tituloDois    = $this->input->post('tituloDois');
            $_tituloTres    = $this->input->post('tituloTres');
            $_valorUm       = $this->input->post('valorUm');
            $_valorDois     = $this->input->post('valorDois');
            $_valorTres     = $this->input->post('valorTres');
            $_estado        = $this->input->post('estado');
            $_cidade        = $this->input->post('cidade');
            $_estado        = $this->input->post('estado');
            $_bairro        = $this->input->post('bairro');
            $_rua           = $this->input->post('rua');
            $_numero        = $this->input->post('numero');
            $_cep           = $this->input->post('cep');
            $_longitude     = $this->input->post('longitude');
            $_latitude      = $this->input->post('latitude');
            $_slug          = $this->biblioteca->gerar_slug($_nome);

            // Verifica se está vazio / Se não, regulariza para ser gravado no banco
            $_pagamento = $this->input->post('formaPagamento');
            if (!empty($_pagamento)) : 
                $_pagamento = implode(",", $_pagamento);
            endif;

            $_categoria = $this->input->post('categoria');
            if (!empty($_categoria)) : 
                $_categoria = implode(",", $_categoria);
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
        
            // Salva em um array
            $_dados = array(
                "logo_evento"        => $_newLogo,
                "nome_evento"        => $_nome,
                "desc_evento"        => $_descricao,
                "pag_evento"         => $_pagamento,
                "fone_evento"        => $_atendimento,
                "email_evento"       => $_email,
                "site_evento"        => $_site,
                "twitter_evento"     => $_twitter,
                "facebook_evento"    => $_facebook,
                "youtube_evento"     => $_youtube,
                "insta_evento"       => $_instagram,
                "flickr_evento"      => $_flickr,
                "googleplus_evento"  => $_google,
                "orkut_evento"       => $_orkut,
                "bairro_evento"      => $_bairro,
                "uf_evento"          => $_estado,
                "cidade_evento"      => $_cidade,
                "rua_evento"         => $_rua,
                "num_evento"         => $_numero,
                "cep_evento"         => $_cep,
                "long_evento"        => $_longitude,
                "lati_evento"        => $_latitude,
                "titulo_preco_um"       => $_tituloUm,
                "titulo_preco_dois"     => $_tituloDois,
                "titulo_preco_tres"     => $_tituloTres,
                "val_preco_um"          => $_valorUm,
                "val_preco_dois"        => $_valorDois,
                "val_preco_tres"        => $_valorTres,
                "data_evento"        => $_data,
                "horario_evento"     => $_horario,
                "censura_evento"     => $_censura,
                "slug_evento"        => $_slug,
                "categoria_evento"   => $_categoria
            );

            // verifica se salvou no banco
            $_save = $this->eventmodel->save($_dados);

            if ($_save)
            {
                $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Exposição cadastrada com sucesso!</div>');
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
            redirect('eventos');
        }

        // Consulta o evento
        $_dados['evento'] = $this->eventmodel->get_evento($_id);

        // Envia uma msg
        $_dados['msg'] = $_msg;

        // Pega todos os estados
        $_dados['estados'] = $this->enderecosmodel->get_all_estados();

        // Pega as cidades
        $_dados['cidades'] = $this->enderecosmodel->get_cidades($_dados['evento'][0]->uf_evento);

        // Pega os bairros
        $_dados['bairros'] = $this->enderecosmodel->get_bairros($_dados['evento'][0]->cidade_evento);

        // Chama as views
        $this->load->view('includes/header');
        $this->load->view('eventos/editar', $_dados);
        $this->load->view('includes/footer');
    }

    // Atualiza no banco
    public function update()
    {
        // Pega o ID e a imagem atual
        $_id        = $this->input->post('id');
        $_imgAtual  = $this->input->post('imgAtual');

        // Verifica se o id foi informado
        if (empty($_id))
        {
            redirect('restaurantes');
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

        // Pega as informações do banco
        $_nome          = $this->input->post('nome');
        $_descricao     = $this->input->post('descricao');
        $_data          = $this->input->post('data');
        $_horario       = $this->input->post('horario');
        $_censura       = $this->input->post('censura');
        $_twitter       = $this->input->post('twitter');
        $_facebook      = $this->input->post('facebook');
        $_youtube       = $this->input->post('youtube');
        $_instagram     = $this->input->post('instagram');
        $_flickr        = $this->input->post('flickr');
        $_google        = $this->input->post('google');
        $_orkut         = $this->input->post('orkut');
        $_atendimento   = $this->input->post('num_atendimento');
        $_email         = $this->input->post('email');
        $_site          = $this->input->post('site');
        $_tituloUm      = $this->input->post('tituloUm');
        $_tituloDois    = $this->input->post('tituloDois');
        $_tituloTres    = $this->input->post('tituloTres');
        $_valorUm       = $this->input->post('valorUm');
        $_valorDois     = $this->input->post('valorDois');
        $_valorTres     = $this->input->post('valorTres');
        $_estado        = $this->input->post('estado');
        $_cidade        = $this->input->post('cidade');
        $_estado        = $this->input->post('estado');
        $_bairro        = $this->input->post('bairro');
        $_rua           = $this->input->post('rua');
        $_numero        = $this->input->post('numero');
        $_cep           = $this->input->post('cep');
        $_longitude     = $this->input->post('longitude');
        $_latitude      = $this->input->post('latitude');
        $_slug          = $this->biblioteca->gerar_slug($_nome);

        // Verifica se está vazio / Se não, regulariza para ser gravado no banco
        $_pagamento = $this->input->post('formaPagamento');
        if (!empty($_pagamento)) : 
            $_pagamento = implode(",", $_pagamento);
        endif;

        $_categoria = $this->input->post('categoria');
        if (!empty($_categoria)) : 
            $_categoria = implode(",", $_categoria);
        endif;

        // Salva em um array
        $_dados = array(
            "logo_evento"        => $_newLogo,
            "nome_evento"        => $_nome,
            "desc_evento"        => $_descricao,
            "pag_evento"         => $_pagamento,
            "fone_evento"        => $_atendimento,
            "email_evento"       => $_email,
            "site_evento"        => $_site,
            "twitter_evento"     => $_twitter,
            "facebook_evento"    => $_facebook,
            "youtube_evento"     => $_youtube,
            "insta_evento"       => $_instagram,
            "flickr_evento"      => $_flickr,
            "googleplus_evento"  => $_google,
            "orkut_evento"       => $_orkut,
            "bairro_evento"      => $_bairro,
            "uf_evento"          => $_estado,
            "cidade_evento"      => $_cidade,
            "rua_evento"         => $_rua,
            "num_evento"         => $_numero,
            "cep_evento"         => $_cep,
            "long_evento"        => $_longitude,
            "lati_evento"        => $_latitude,
            "titulo_preco_um"       => $_tituloUm,
            "titulo_preco_dois"     => $_tituloDois,
            "titulo_preco_tres"     => $_tituloTres,
            "val_preco_um"          => $_valorUm,
            "val_preco_dois"        => $_valorDois,
            "val_preco_tres"        => $_valorTres,
            "data_evento"        => $_data,
            "horario_evento"     => $_horario,
            "censura_evento"     => $_censura,
            "slug_evento"        => $_slug,
            "categoria_evento"   => $_categoria
        );

        // verifica se salvou no banco
        $_update = $this->eventmodel->update($_id, $_dados);

        if ($_update)
        {
            $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Exposição atualizada com sucesso!</div>');
        }
        else
        {
            $this->index('Erros ocorreram, por favor, contacte um administrador!');
        }
    }

    // Deleta o local
    public function excluir($_id)
    {
        // Verifica se o id do usuário foi informado
        if (empty($_id))
        {
            redirect('eventos');
        }

        // Verifica se deletou o usuário informado
        $_delete = $this->eventmodel->delete($_id);

        // Verifica se foi deletado
        if ($_delete)
        {
            $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Exposição deletada com sucesso!</div>');
        }
        else
        {
            $this->index('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Não foi possível deletar a exposição, por favor, tente novamente!</div>');
        }
    }
}