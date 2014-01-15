<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shows extends CI_Controller {

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
        $this->load->model('shows_model', 'cinemodel');

        // Carrega o model enderecos
        $this->load->model('Enderecos_model', 'enderecosmodel');
    }

    // Exibe uma lista com os shows
    public function index($_msg = NULL)
    {
        // Pega todos os shows do banco
        $_dados['shows']  = $this->cinemodel->get_shows();
        $_dados['msg']      = $_msg;

        // Carrega os views
        $this->load->view('includes/header');
        $this->load->view('shows/listar', $_dados);
        $this->load->view('includes/footer');
    }

    // Exibe o formulário de cadastro
    public function novo($_msg = NULL)
    {
        // Mensagem
        $_dados['msg'] = $_msg;

        // Pega todos os estados
        $_dados['estados'] = $this->enderecosmodel->get_all_estados();

        // Carrega os views
        $this->load->view('includes/header');
        $this->load->view('shows/novo', $_dados);
        $this->load->view('includes/footer');
    }

    // salva no banco
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
            $_logo                  = 'logo';
            $_nome                  = $this->input->post('nome');                   
            $_descricao             = $this->input->post('descricao');                      
            $_extras                = $this->input->post('extras');                                               
            $_telefone              = $this->input->post('num_atendimento');                       
            $_email                 = $this->input->post('email');                  
            $_site                  = $this->input->post('site');                       
            $_twitter               = $this->input->post('twitter');                            
            $_facebook              = $this->input->post('facebook');                       
            $_youtube               = $this->input->post('youtube');                        
            $_instagram             = $this->input->post('instagram');                  
            $_flickr                = $this->input->post('flickr');                         
            $_googleplus            = $this->input->post('google');                         
            $_orkut                 = $this->input->post('orkut');                      
            $_rua                   = $this->input->post('rua');
            $_num                   = $this->input->post('numero');
            $_cep                   = $this->input->post('cep');
            $_bairro                = $this->input->post('bairro');
            $_cidade                = $this->input->post('cidade');
            $_uf                    = $this->input->post('estado');
            $_longitude             = $this->input->post('longitude');
            $_latitude              = $this->input->post('latitude');
            $_tituloUm              = $this->input->post('tituloUm');
            $_tituloDois            = $this->input->post('tituloDois');
            $_tituloTres            = $this->input->post('tituloTres');
            $_valorUm               = $this->input->post('valorUm');
            $_valorDois             = $this->input->post('valorDois');
            $_valorTres             = $this->input->post('valorTres');
            $_data                  = $this->input->post('data');
            $_horario               = $this->input->post('horario');
            $_censura               = $this->input->post('censura');
            $_slug                  = $this->biblioteca->gerar_slug($_nome);

            $_pagamento = $this->input->post('formaPagamento');
            if (!empty($_pagamento)) : 
                $_pagamento = implode(",", $_pagamento);
            endif;

            $_acessibilidade = $this->input->post('acessibilidade');
            if (!empty($_acessibilidade)) : 
                $_acessibilidade = implode(",", $_acessibilidade);
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

            $_dados = array(
                "logo_show"         => $_newLogo,
                "nome_show"         => $_nome,
                "desc_show"         => $_descricao,
                "fone_show"         => $_telefone,
                "pag_show"          => $_pagamento,
                "email_show"        => $_email,
                "site_show"         => $_site,
                "twitter_show"      => $_twitter,
                "facebook_show"     => $_facebook,
                "youtube_show"      => $_youtube,
                "insta_show"        => $_instagram,
                "flickr_show"       => $_flickr,
                "googleplus_show"   => $_googleplus,
                "orkut_show"        => $_orkut,
                "bairro_show"       => $_bairro,
                "uf_show"           => $_uf,
                "cidade_show"       => $_cidade,
                "rua_show"          => $_rua,
                "num_show"          => $_num,
                "cep_show"          => $_cep,
                "long_show"         => $_longitude,
                "lati_show"         => $_latitude,
                "titulo_preco_um"   => $_tituloUm,
                "titulo_preco_dois" => $_tituloDois,
                "titulo_preco_tres" => $_tituloTres,
                "val_preco_um"      => $_valorUm,
                "val_preco_dois"    => $_valorDois,
                "val_preco_tres"    => $_valorTres,
                "data_show"         => $_data,
                "horario_show"      => $_horario,
                "censura_show"      => $_censura,
                "categoria_show"    => $_categoria,
                "slug_show"         => $_slug,
                "adaptado_show"     => $_acessibilidade
            );

            $_save = $this->cinemodel->save($_dados);
    
            if ($_save)
            {
                $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>show cadastrado com sucesso!</div>');
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
            redirect('shows');
        }

        // Pega o show no banco
        $_dados['show'] = $this->cinemodel->get_show($_id);

        // Envia uma msg
        $_dados['msg'] = $_msg;

        // Pega todos os estados
        $_dados['estados'] = $this->enderecosmodel->get_all_estados();

        // Pega as cidades
        $_dados['cidades'] = $this->enderecosmodel->get_cidades($_dados['show'][0]->uf_show);

        // Pega os bairros
        $_dados['bairros'] = $this->enderecosmodel->get_bairros($_dados['show'][0]->cidade_show);

        // Chama as views
        $this->load->view('includes/header');
        $this->load->view('shows/editar', $_dados);
        $this->load->view('includes/footer');
    }

    // Atualiza no banco
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
            $this->novo();
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
            $_nome                  = $this->input->post('nome');                   
            $_descricao             = $this->input->post('descricao');                      
            $_extras                = $this->input->post('extras');                                               
            $_telefone              = $this->input->post('num_atendimento');                       
            $_email                 = $this->input->post('email');                  
            $_site                  = $this->input->post('site');                       
            $_twitter               = $this->input->post('twitter');                            
            $_facebook              = $this->input->post('facebook');                       
            $_youtube               = $this->input->post('youtube');                        
            $_instagram             = $this->input->post('instagram');                  
            $_flickr                = $this->input->post('flickr');                         
            $_googleplus            = $this->input->post('google');                         
            $_orkut                 = $this->input->post('orkut');                      
            $_rua                   = $this->input->post('rua');
            $_num                   = $this->input->post('numero');
            $_cep                   = $this->input->post('cep');
            $_bairro                = $this->input->post('bairro');
            $_cidade                = $this->input->post('cidade');
            $_uf                    = $this->input->post('estado');
            $_longitude             = $this->input->post('longitude');
            $_latitude              = $this->input->post('latitude');
            $_tituloUm              = $this->input->post('tituloUm');
            $_tituloDois            = $this->input->post('tituloDois');
            $_tituloTres            = $this->input->post('tituloTres');
            $_valorUm               = $this->input->post('valorUm');
            $_valorDois             = $this->input->post('valorDois');
            $_valorTres             = $this->input->post('valorTres');
            $_data                  = $this->input->post('data');
            $_horario               = $this->input->post('horario');
            $_censura               = $this->input->post('censura');
            $_slug                  = $this->biblioteca->gerar_slug($_nome);

            $_pagamento = $this->input->post('formaPagamento');
            if (!empty($_pagamento)) : 
                $_pagamento = implode(",", $_pagamento);
            endif;

            $_acessibilidade = $this->input->post('acessibilidade');
            if (!empty($_acessibilidade)) : 
                $_acessibilidade = implode(",", $_acessibilidade);
            endif;

            $_categoria = $this->input->post('categoria');
            if (!empty($_categoria)) : 
                $_categoria = implode(",", $_categoria);
            endif;

            $_dados = array(
                "logo_show"         => $_newLogo,
                "nome_show"         => $_nome,
                "desc_show"         => $_descricao,
                "fone_show"         => $_telefone,
                "pag_show"          => $_pagamento,
                "email_show"        => $_email,
                "site_show"         => $_site,
                "twitter_show"      => $_twitter,
                "facebook_show"     => $_facebook,
                "youtube_show"      => $_youtube,
                "insta_show"        => $_instagram,
                "flickr_show"       => $_flickr,
                "googleplus_show"   => $_googleplus,
                "orkut_show"        => $_orkut,
                "bairro_show"       => $_bairro,
                "uf_show"           => $_uf,
                "cidade_show"       => $_cidade,
                "rua_show"          => $_rua,
                "num_show"          => $_num,
                "cep_show"          => $_cep,
                "long_show"         => $_longitude,
                "lati_show"         => $_latitude,
                "titulo_preco_um"   => $_tituloUm,
                "titulo_preco_dois" => $_tituloDois,
                "titulo_preco_tres" => $_tituloTres,
                "val_preco_um"      => $_valorUm,
                "val_preco_dois"    => $_valorDois,
                "val_preco_tres"    => $_valorTres,
                "data_show"         => $_data,
                "horario_show"      => $_horario,
                "censura_show"      => $_censura,
                "categoria_show"    => $_categoria,
                "slug_show"         => $_slug,
                "adaptado_show"     => $_acessibilidade
            );

            $_update = $this->cinemodel->update($_id, $_dados);
    
            if ($_update)
            {
                $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>show atualizado com sucesso!</div>');
            }
            else
            {
                $this->index('Erros ocorreram, por favor, contacte um administrador!');
            }
        }
    }

    // Deleta o show
    public function excluir($_id)
    {
        // Verifica se o id do usuário foi informado
        if (empty($_id))
        {
            redirect('shows');
        }

        // Verifica se deletou o usuário informado
        $_delete = $this->cinemodel->delete($_id);

        // Verifica se foi deletado
        if ($_delete)
        {
            $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>show deletado com sucesso!</div>');
        }
        else
        {
            $this->index('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Não foi possível deletar o show, por favor, tente novamente!</div>');
        }
    }
}