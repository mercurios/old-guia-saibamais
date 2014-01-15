<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Esportes extends CI_Controller {

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
        $this->load->model('Esportes_model', 'esportemodel');

        // Carrega o model enderecos
        $this->load->model('Enderecos_model', 'enderecosmodel');
	}

	public function index($_msg = NULL)
	{
		// Pega os esportes no banco
		$_dados['esportes'] = $this->esportemodel->get_esportes();
        $_dados['msg'] = $_msg;

		// Carrega as views
		$this->load->view('includes/header');
		$this->load->view('esportes/listar', $_dados);
		$this->load->view('includes/footer'); 
	}

	// Exibe o formulário de cadastro
	public function novo()
	{
		// Pega todos os estados
        $_dados['estados'] = $this->enderecosmodel->get_all_estados();

		// Carrega as views
		$this->load->view('includes/header');
		$this->load->view('esportes/novo', $_dados);
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
        	// Pega as informações enviadas pelo formulário
            $_logo              = 'logo';
            $_nome              = $this->input->post('nome');
            $_descricao         = $this->input->post('descricao');
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
            $_tituloUm			= $this->input->post('tituloUm');
            $_tituloDois		= $this->input->post('tituloDois');
            $_tituloTres		= $this->input->post('tituloTres');
            $_valorUm			= $this->input->post('valorUm');
            $_valorDois			= $this->input->post('valorDois');
            $_valorTres			= $this->input->post('valorTres');
            $_slug              = $this->biblioteca->gerar_slug($_nome);
            $_idade 			= $this->input->post('idade');

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

            // Salva os dados em um array
            $_dados = array(
            	"logo_esporte" 		=> $_newLogo,
            	"nome_esporte" 		=> $_nome,
            	"desc_esporte" 		=> $_descricao,
            	"categoria_esporte" => $_categoria,
            	"slug_esporte" 		=> $_slug,
            	"val_titulo_um" 	=> $_tituloUm,
            	"val_titulo_dois" 	=> $_tituloDois,
            	"val_titulo_tres" 	=> $_tituloTres,
            	"val_um" 			=> $_valorUm,
            	"val_dois" 			=> $_valorDois,
            	"val_tres" 			=> $_valorTres,
            	"idade_esporte"		=> $_idade,
            	"bairro_esporte"    => $_bairro,
                "uf_esporte"        => $_estado,
                "cidade_esporte"    => $_cidade,
                "rua_esporte"       => $_rua,
                "num_esporte"       => $_numero,
                "cep_esporte"       => $_cep,
                "long_esporte"      => $_longitude,
                "lati_esporte"      => $_latitude,
                "h_dom"             => $_h_dom,
                "h_seg"             => $_h_seg,
                "h_ter"             => $_h_ter,
                "h_qua"             => $_h_qua,
                "h_qui"             => $_h_qui,
                "h_sex"             => $_h_sex,
                "h_sab"             => $_h_sab,
            );

            $_save = $this->esportemodel->save($_dados);
    
            if ($_save)
            {
                $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Esporte cadastrado com sucesso!</div>');
            }
            else
            {
                $this->index('Erros ocorreram, por favor, contacte um administrador!');
            }
        }
	}

	// Mostra o formulário de edição
	public function editar($_id)
	{
		// Verifica se foi passado o ID
		if (empty($_id))
		{
			redirect('home');
		}

		// Pega o esporte no banco pelo id
		$_dados['esporte'] = $this->esportemodel->get_esporte($_id);

		// Pega todos os estados
        $_dados['estados'] = $this->enderecosmodel->get_all_estados();

        // Pega as cidades
        $_dados['cidades'] = $this->enderecosmodel->get_cidades($_dados['esporte'][0]->uf_esporte);

        // Pega os bairros
        $_dados['bairros'] = $this->enderecosmodel->get_bairros($_dados['esporte'][0]->cidade_esporte);

		// Carrega as views	
		$this->load->view('includes/header');
		$this->load->view('esportes/editar', $_dados);
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
            $_tituloUm          = $this->input->post('tituloUm');
            $_tituloDois        = $this->input->post('tituloDois');
            $_tituloTres        = $this->input->post('tituloTres');
            $_valorUm           = $this->input->post('valorUm');
            $_valorDois         = $this->input->post('valorDois');
            $_valorTres         = $this->input->post('valorTres');
            $_slug              = $this->biblioteca->gerar_slug($_nome);
            $_idade             = $this->input->post('idade');

            $_categoria = $this->input->post('categoria');
            if (!empty($_categoria)) : 
                $_categoria = implode(",", $_categoria);
            endif;

            // Salva os dados em um array
            $_dados = array(
                "logo_esporte"      => $_newLogo,
                "nome_esporte"      => $_nome,
                "desc_esporte"      => $_descricao,
                "categoria_esporte" => $_categoria,
                "slug_esporte"      => $_slug,
                "val_titulo_um"     => $_tituloUm,
                "val_titulo_dois"   => $_tituloDois,
                "val_titulo_tres"   => $_tituloTres,
                "val_um"            => $_valorUm,
                "val_dois"          => $_valorDois,
                "val_tres"          => $_valorTres,
                "idade_esporte"     => $_idade,
                "bairro_esporte"      => $_bairro,
                "uf_esporte"          => $_estado,
                "cidade_esporte"      => $_cidade,
                "rua_esporte"         => $_rua,
                "num_esporte"         => $_numero,
                "cep_esporte"         => $_cep,
                "long_esporte"        => $_longitude,
                "lati_esporte"        => $_latitude,
                "h_dom"             => $_h_dom,
                "h_seg"             => $_h_seg,
                "h_ter"             => $_h_ter,
                "h_qua"             => $_h_qua,
                "h_qui"             => $_h_qui,
                "h_sex"             => $_h_sex,
                "h_sab"             => $_h_sab,
            );

            $_update = $this->esportemodel->update($_id, $_dados);
    
            if ($_update)
            {
                $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Esporte atualizado com sucesso!</div>');
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
            redirect('esportes');
        }

        // Verifica se deletou o usuário informado
        $_delete = $this->esportemodel->delete($_id);

        // Verifica se foi deletado
        if ($_delete)
        {
            $this->index('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Esporte deletado com sucesso!</div>');
        }
        else
        {
            $this->index('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Não foi possível deletar o local, por favor, tente novamente!</div>');
        }
    }
}