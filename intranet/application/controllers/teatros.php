<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teatros extends CI_Controller {

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
        $this->load->model('teatros_model', 'cinemodel');

        // Carrega o model enderecos
        $this->load->model('Enderecos_model', 'enderecosmodel');
    }

    // Exibe uma lista com os teatros
    public function index($_msg = NULL)
    {
        // Pega todos os teatros do banco
        $_dados['teatros']  = $this->cinemodel->get_teatros();
        $_dados['msg']      = $_msg;

        // Carrega os views
        $this->load->view('includes/header');
        $this->load->view('teatros/listar', $_dados);
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
        $this->load->view('teatros/novo', $_dados);
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
                "logo_teatro"       => $_newLogo,
                "nome_teatro"       => $_nome,
                "desc_teatro"       => $_descricao,
                "fone_teatro"       => $_telefone,
                "pag_teatro"        => $_pagamento,
                "email_teatro"      => $_email,
                "site_teatro"       => $_site,
                "twitter_teatro"    => $_twitter,
                "facebook_teatro"   => $_facebook,
                "youtube_teatro"    => $_youtube,
                "insta_teatro"      => $_instagram,
                "flickr_teatro"     => $_flickr,
                "googleplus_teatro" => $_googleplus,
                "orkut_teatro"      => $_orkut,
                "bairro_teatro"     => $_bairro,
                "uf_teatro"         => $_uf,
                "cidade_teatro"     => $_cidade,
                "rua_teatro"        => $_rua,
                "num_teatro"        => $_num,
                "cep_teatro"        => $_cep,
                "long_teatro"       => $_longitude,
                "lati_teatro"       => $_latitude,
                "categoria_teatro"  => $_categoria,
                "slug_teatro"       => $_slug,
                "adaptado_teatro"   => $_acessibilidade
            );

            $_save = $this->cinemodel->save($_dados);
    
            if ($_save)
            {
                $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>teatro cadastrado com sucesso!</div>');
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
            redirect('teatros');
        }

        // Pega o teatro no banco
        $_dados['teatro'] = $this->cinemodel->get_teatro($_id);

        // Envia uma msg
        $_dados['msg'] = $_msg;

        // Pega todos os estados
        $_dados['estados'] = $this->enderecosmodel->get_all_estados();

        // Pega as cidades
        $_dados['cidades'] = $this->enderecosmodel->get_cidades($_dados['teatro'][0]->uf_teatro);

        // Pega os bairros
        $_dados['bairros'] = $this->enderecosmodel->get_bairros($_dados['teatro'][0]->cidade_teatro);

        // Chama as views
        $this->load->view('includes/header');
        $this->load->view('teatros/editar', $_dados);
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
                "logo_teatro"       => $_newLogo,
                "nome_teatro"       => $_nome,
                "desc_teatro"       => $_descricao,
                "fone_teatro"       => $_telefone,
                "pag_teatro"        => $_pagamento,
                "email_teatro"      => $_email,
                "site_teatro"       => $_site,
                "twitter_teatro"    => $_twitter,
                "facebook_teatro"   => $_facebook,
                "youtube_teatro"    => $_youtube,
                "insta_teatro"      => $_instagram,
                "flickr_teatro"     => $_flickr,
                "googleplus_teatro" => $_googleplus,
                "orkut_teatro"      => $_orkut,
                "bairro_teatro"     => $_bairro,
                "uf_teatro"         => $_uf,
                "cidade_teatro"     => $_cidade,
                "rua_teatro"        => $_rua,
                "num_teatro"        => $_num,
                "cep_teatro"        => $_cep,
                "long_teatro"       => $_longitude,
                "lati_teatro"       => $_latitude,
                "categoria_teatro"  => $_categoria,
                "slug_teatro"       => $_slug,
                "adaptado_teatro"   => $_acessibilidade
            );

            $_update = $this->cinemodel->update($_id, $_dados);
    
            if ($_update)
            {
                $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>teatro atualizado com sucesso!</div>');
            }
            else
            {
                $this->index('Erros ocorreram, por favor, contacte um administrador!');
            }
        }
    }

    // Deleta o teatro
    public function excluir($_id)
    {
        // Verifica se o id do usuário foi informado
        if (empty($_id))
        {
            redirect('teatros');
        }

        // Verifica se deletou o usuário informado
        $_delete = $this->cinemodel->delete($_id);

        // Verifica se foi deletado
        if ($_delete)
        {
            $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>teatro deletado com sucesso!</div>');
        }
        else
        {
            $this->index('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Não foi possível deletar o teatro, por favor, tente novamente!</div>');
        }
    }
}