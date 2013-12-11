<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cinemas extends CI_Controller {

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
        $this->load->model('Cinemas_model', 'cinemodel');

        // Carrega o model enderecos
        $this->load->model('Enderecos_model', 'enderecosmodel');
    }

    // Exibe uma lista com os cinemas
    public function index($_msg = NULL)
    {
        // Pega todos os cinemas do banco
        $_dados['cinemas']  = $this->cinemodel->get_cinemas();
        $_dados['msg']      = $_msg;

        // Carrega os views
        $this->load->view('includes/header');
        $this->load->view('cinemas/listar', $_dados);
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
        $this->load->view('cinemas/novo', $_dados);
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
            $_t_1_cinema            = $this->input->post('t_1_cinema');
            $_t_2_cinema            = $this->input->post('t_2_cinema');
            $_t_3_cinema            = $this->input->post('t_3_cinema');
            $_t_4_cinema            = $this->input->post('t_4_cinema');
            $_dom_1_cinema          = $this->input->post('dom_1_cinema');
            $_dom_2_cinema          = $this->input->post('dom_2_cinema');
            $_dom_3_cinema          = $this->input->post('dom_3_cinema');
            $_dom_4_cinema          = $this->input->post('dom_4_cinema');
            $_seg_1_cinema          = $this->input->post('seg_1_cinema');
            $_seg_2_cinema          = $this->input->post('seg_2_cinema');
            $_seg_3_cinema          = $this->input->post('seg_3_cinema');
            $_seg_4_cinema          = $this->input->post('seg_4_cinema');
            $_ter_1_cinema          = $this->input->post('ter_1_cinema');
            $_ter_2_cinema          = $this->input->post('ter_2_cinema');
            $_ter_3_cinema          = $this->input->post('ter_3_cinema');
            $_ter_4_cinema          = $this->input->post('ter_4_cinema');
            $_qua_1_cinema          = $this->input->post('qua_1_cinema');
            $_qua_2_cinema          = $this->input->post('qua_2_cinema');
            $_qua_3_cinema          = $this->input->post('qua_3_cinema');
            $_qua_4_cinema          = $this->input->post('qua_4_cinema');
            $_qui_1_cinema          = $this->input->post('qui_1_cinema');
            $_qui_2_cinema          = $this->input->post('qui_2_cinema');
            $_qui_3_cinema          = $this->input->post('qui_3_cinema');
            $_qui_4_cinema          = $this->input->post('qui_4_cinema');
            $_sex_1_cinema          = $this->input->post('sex_1_cinema');
            $_sex_2_cinema          = $this->input->post('sex_2_cinema');
            $_sex_3_cinema          = $this->input->post('sex_3_cinema');
            $_sex_4_cinema          = $this->input->post('sex_4_cinema');
            $_sab_1_cinema          = $this->input->post('sab_1_cinema');
            $_sab_2_cinema          = $this->input->post('sab_2_cinema');
            $_sab_3_cinema          = $this->input->post('sab_3_cinema');
            $_sab_4_cinema          = $this->input->post('sab_4_cinema');
            $_fer_1_cinema          = $this->input->post('fer_1_cinema');
            $_fer_2_cinema          = $this->input->post('fer_2_cinema');
            $_fer_3_cinema          = $this->input->post('fer_3_cinema');
            $_fer_4_cinema          = $this->input->post('fer_4_cinema');
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
                "logo_cinema"       => $_newLogo,
                "nome_cinema"       => $_nome,
                "desc_cinema"       => $_descricao,
                "fone_cinema"       => $_telefone,
                "pag_cinema"        => $_pagamento,
                "email_cinema"      => $_email,
                "site_cinema"       => $_site,
                "twitter_cinema"    => $_twitter,
                "facebook_cinema"   => $_facebook,
                "youtube_cinema"    => $_youtube,
                "insta_cinema"      => $_instagram,
                "flickr_cinema"     => $_flickr,
                "googleplus_cinema" => $_googleplus,
                "orkut_cinema"      => $_orkut,
                "bairro_cinema"     => $_bairro,
                "uf_cinema"         => $_uf,
                "cidade_cinema"     => $_cidade,
                "rua_cinema"        => $_rua,
                "num_cinema"        => $_num,
                "cep_cinema"        => $_cep,
                "long_cinema"       => $_longitude,
                "lati_cinema"       => $_latitude,
                "t_1_cinema"        => $_t_1_cinema,
                "t_2_cinema"        => $_t_2_cinema,
                "t_3_cinema"        => $_t_3_cinema,
                "t_4_cinema"        => $_t_4_cinema,
                "dom_1_cinema"      => $_dom_1_cinema,
                "dom_2_cinema"      => $_dom_2_cinema,
                "dom_3_cinema"      => $_dom_3_cinema,
                "dom_4_cinema"      => $_dom_4_cinema,
                "seg_1_cinema"      => $_seg_1_cinema,
                "seg_2_cinema"      => $_seg_2_cinema,
                "seg_3_cinema"      => $_seg_3_cinema,
                "seg_4_cinema"      => $_seg_4_cinema,
                "ter_1_cinema"      => $_ter_1_cinema,
                "ter_2_cinema"      => $_ter_2_cinema,
                "ter_3_cinema"      => $_ter_3_cinema,
                "ter_4_cinema"      => $_ter_4_cinema,
                "qua_1_cinema"      => $_qua_1_cinema,
                "qua_2_cinema"      => $_qua_2_cinema,
                "qua_3_cinema"      => $_qua_3_cinema,
                "qua_4_cinema"      => $_qua_4_cinema,
                "qui_1_cinema"      => $_qui_1_cinema,
                "qui_2_cinema"      => $_qui_2_cinema,
                "qui_3_cinema"      => $_qui_3_cinema,
                "qui_4_cinema"      => $_qui_4_cinema,
                "sex_1_cinema"      => $_sex_1_cinema,
                "sex_2_cinema"      => $_sex_2_cinema,
                "sex_3_cinema"      => $_sex_3_cinema,
                "sex_4_cinema"      => $_sex_4_cinema,
                "sab_1_cinema"      => $_sab_1_cinema,
                "sab_2_cinema"      => $_sab_2_cinema,
                "sab_3_cinema"      => $_sab_3_cinema,
                "sab_4_cinema"      => $_sab_4_cinema,
                "fer_1_cinema"      => $_fer_1_cinema,
                "fer_2_cinema"      => $_fer_2_cinema,
                "fer_3_cinema"      => $_fer_3_cinema,
                "fer_4_cinema"      => $_fer_4_cinema,
                "categoria_cinema"  => $_categoria,
                "slug_cinema"       => $_slug,
                "adaptado_cinema"   => $_acessibilidade
            );

            $_save = $this->cinemodel->save($_dados);
    
            if ($_save)
            {
                $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Cinema cadastrado com sucesso!</div>');
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
            redirect('cinemas');
        }

        // Pega o cinema no banco
        $_dados['cinema'] = $this->cinemodel->get_cinema($_id);

        // Envia uma msg
        $_dados['msg'] = $_msg;

        // Pega todos os estados
        $_dados['estados'] = $this->enderecosmodel->get_all_estados();

        // Pega as cidades
        $_dados['cidades'] = $this->enderecosmodel->get_cidades($_dados['cinema'][0]->uf_cinema);

        // Pega os bairros
        $_dados['bairros'] = $this->enderecosmodel->get_bairros($_dados['cinema'][0]->cidade_cinema);

        // Chama as views
        $this->load->view('includes/header');
        $this->load->view('cinemas/editar', $_dados);
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
            $_t_1_cinema            = $this->input->post('t_1_cinema');
            $_t_2_cinema            = $this->input->post('t_2_cinema');
            $_t_3_cinema            = $this->input->post('t_3_cinema');
            $_t_4_cinema            = $this->input->post('t_4_cinema');
            $_dom_1_cinema          = $this->input->post('dom_1_cinema');
            $_dom_2_cinema          = $this->input->post('dom_2_cinema');
            $_dom_3_cinema          = $this->input->post('dom_3_cinema');
            $_dom_4_cinema          = $this->input->post('dom_4_cinema');
            $_seg_1_cinema          = $this->input->post('seg_1_cinema');
            $_seg_2_cinema          = $this->input->post('seg_2_cinema');
            $_seg_3_cinema          = $this->input->post('seg_3_cinema');
            $_seg_4_cinema          = $this->input->post('seg_4_cinema');
            $_ter_1_cinema          = $this->input->post('ter_1_cinema');
            $_ter_2_cinema          = $this->input->post('ter_2_cinema');
            $_ter_3_cinema          = $this->input->post('ter_3_cinema');
            $_ter_4_cinema          = $this->input->post('ter_4_cinema');
            $_qua_1_cinema          = $this->input->post('qua_1_cinema');
            $_qua_2_cinema          = $this->input->post('qua_2_cinema');
            $_qua_3_cinema          = $this->input->post('qua_3_cinema');
            $_qua_4_cinema          = $this->input->post('qua_4_cinema');
            $_qui_1_cinema          = $this->input->post('qui_1_cinema');
            $_qui_2_cinema          = $this->input->post('qui_2_cinema');
            $_qui_3_cinema          = $this->input->post('qui_3_cinema');
            $_qui_4_cinema          = $this->input->post('qui_4_cinema');
            $_sex_1_cinema          = $this->input->post('sex_1_cinema');
            $_sex_2_cinema          = $this->input->post('sex_2_cinema');
            $_sex_3_cinema          = $this->input->post('sex_3_cinema');
            $_sex_4_cinema          = $this->input->post('sex_4_cinema');
            $_sab_1_cinema          = $this->input->post('sab_1_cinema');
            $_sab_2_cinema          = $this->input->post('sab_2_cinema');
            $_sab_3_cinema          = $this->input->post('sab_3_cinema');
            $_sab_4_cinema          = $this->input->post('sab_4_cinema');
            $_fer_1_cinema          = $this->input->post('fer_1_cinema');
            $_fer_2_cinema          = $this->input->post('fer_2_cinema');
            $_fer_3_cinema          = $this->input->post('fer_3_cinema');
            $_fer_4_cinema          = $this->input->post('fer_4_cinema');
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
                "logo_cinema"       => $_newLogo,
                "nome_cinema"       => $_nome,
                "desc_cinema"       => $_descricao,
                "fone_cinema"       => $_telefone,
                "pag_cinema"        => $_pagamento,
                "email_cinema"      => $_email,
                "site_cinema"       => $_site,
                "twitter_cinema"    => $_twitter,
                "facebook_cinema"   => $_facebook,
                "youtube_cinema"    => $_youtube,
                "insta_cinema"      => $_instagram,
                "flickr_cinema"     => $_flickr,
                "googleplus_cinema" => $_googleplus,
                "orkut_cinema"      => $_orkut,
                "bairro_cinema"     => $_bairro,
                "uf_cinema"         => $_uf,
                "cidade_cinema"     => $_cidade,
                "rua_cinema"        => $_rua,
                "num_cinema"        => $_num,
                "cep_cinema"        => $_cep,
                "long_cinema"       => $_longitude,
                "lati_cinema"       => $_latitude,
                "t_1_cinema"        => $_t_1_cinema,
                "t_2_cinema"        => $_t_2_cinema,
                "t_3_cinema"        => $_t_3_cinema,
                "t_4_cinema"        => $_t_4_cinema,
                "dom_1_cinema"      => $_dom_1_cinema,
                "dom_2_cinema"      => $_dom_2_cinema,
                "dom_3_cinema"      => $_dom_3_cinema,
                "dom_4_cinema"      => $_dom_4_cinema,
                "seg_1_cinema"      => $_seg_1_cinema,
                "seg_2_cinema"      => $_seg_2_cinema,
                "seg_3_cinema"      => $_seg_3_cinema,
                "seg_4_cinema"      => $_seg_4_cinema,
                "ter_1_cinema"      => $_ter_1_cinema,
                "ter_2_cinema"      => $_ter_2_cinema,
                "ter_3_cinema"      => $_ter_3_cinema,
                "ter_4_cinema"      => $_ter_4_cinema,
                "qua_1_cinema"      => $_qua_1_cinema,
                "qua_2_cinema"      => $_qua_2_cinema,
                "qua_3_cinema"      => $_qua_3_cinema,
                "qua_4_cinema"      => $_qua_4_cinema,
                "qui_1_cinema"      => $_qui_1_cinema,
                "qui_2_cinema"      => $_qui_2_cinema,
                "qui_3_cinema"      => $_qui_3_cinema,
                "qui_4_cinema"      => $_qui_4_cinema,
                "sex_1_cinema"      => $_sex_1_cinema,
                "sex_2_cinema"      => $_sex_2_cinema,
                "sex_3_cinema"      => $_sex_3_cinema,
                "sex_4_cinema"      => $_sex_4_cinema,
                "sab_1_cinema"      => $_sab_1_cinema,
                "sab_2_cinema"      => $_sab_2_cinema,
                "sab_3_cinema"      => $_sab_3_cinema,
                "sab_4_cinema"      => $_sab_4_cinema,
                "fer_1_cinema"      => $_fer_1_cinema,
                "fer_2_cinema"      => $_fer_2_cinema,
                "fer_3_cinema"      => $_fer_3_cinema,
                "fer_4_cinema"      => $_fer_4_cinema,
                "categoria_cinema"  => $_categoria,
                "slug_cinema"       => $_slug,
                "adaptado_cinema"   => $_acessibilidade
            );

            $_update = $this->cinemodel->update($_id, $_dados);
    
            if ($_update)
            {
                $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Cinema atualizado com sucesso!</div>');
            }
            else
            {
                $this->index('Erros ocorreram, por favor, contacte um administrador!');
            }
        }
    }

    // Deleta o cinema
    public function excluir($_id)
    {
        // Verifica se o id do usuário foi informado
        if (empty($_id))
        {
            redirect('cinemas');
        }

        // Verifica se deletou o usuário informado
        $_delete = $this->cinemodel->delete($_id);

        // Verifica se foi deletado
        if ($_delete)
        {
            $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Cinema deletado com sucesso!</div>');
        }
        else
        {
            $this->index('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Não foi possível deletar o cinema, por favor, tente novamente!</div>');
        }
    }
}