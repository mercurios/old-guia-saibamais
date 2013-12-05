<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promocoes extends CI_Controller {

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
        $this->load->model('Promocoes_model', 'promocaomodel');
	}

	public function index()
	{
		// redireciona para a home
		redirect('home');
	}

	// Lista as promoções
	public function listar($_categoria, $_idCliente, $_msg = NULL)
	{
		// Verifica se foi passado os parametros
		if (empty($_categoria) || empty($_idCliente))
		{
			// Redireciona para home
			redirect('home');
		}

		// Busca no banco os registros
		$_dados['promocoes'] = $this->promocaomodel->get_promocoes($_categoria, $_idCliente);
		$_dados['msg'] 		 = $_msg;

		// Carrega as views
		$this->load->view('includes/header');
		$this->load->view('promocoes/listar', $_dados);
		$this->load->view('includes/footer');
	}

	// Adicionar uma nova promoção
	public function novo($_categoria, $_idCliente)
	{
		// Verifica se foi passado os parametros
		if (empty($_categoria) || empty($_idCliente))
		{
			// Redireciona para home
			redirect('home');
		}

		// Salva as variaveis
		$_dados['categoria'] = $_categoria;
		$_dados['idCliente'] = $_idCliente;

		// Carrega as views
		$this->load->view('includes/header');
		$this->load->view('promocoes/novo', $_dados);
		$this->load->view('includes/footer');
	}

	// Salva no banco
	public function save()
	{
		// Pega as informações do formulário
		$_imagem 	= 'imagem';
		$_titulo 	= $this->input->post('titulo');
		$_diaSemana = $this->input->post('diaSemana');
            if (!empty($_diaSemana)) : 
                $_diaSemana = implode(",", $_diaSemana);
            endif;
		$_descricao = $this->input->post('descricao');
		$_categoria = $this->input->post('categoria');
		$_idCliente = $this->input->post('idCliente');
		$_dataInicio = $this->input->post('dataInicio');
		$_dataInicio = $this->biblioteca->formataForMysql($_dataInicio);
		$_dataFinal = $this->input->post('dataFinal');
		$_dataFinal = $this->biblioteca->formataForMysql($_dataFinal);

		// Valida o formulário
        $this->form_validation->set_rules('titulo', 'Titulo', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->novo($_categoria, $_idCliente);
        }
        else
        {
        	// Verifica se foi informado dia inicio e final
        	if (isset($_diaSemana))
        	{
        		$_dataInicio = '0000-00-00 00:00:00';
        		$_dataFinal  = '0000-00-00 00:00:00';
        	}


        	// Seta as configurações de upload
            $_config['upload_path']     = '../uploads/promocoes/'; // Caminho
            $_config['allowed_types']   = 'gif|jpg|png|jpeg|pjpeg'; // Tipos de imagens aceito
            $_config['max_size']        = '2048'; // 2MB
            $_config['overwrite']       = FALSE; // Não irá sobre-escrever o arquivo
            $_config['encrypt_name']    = TRUE; // Trocará o nome do arquivo para um HASH

            // Inicializa a library
            $this->load->library('upload', $_config);

            //Faz o upload
            if(!$this->upload->do_upload($_imagem))
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
            	"titulo_promocao" => $_titulo,
            	"desc_promocao" => $_descricao,
            	"categoria_promocao" => $_categoria,
            	"id_cliente" => $_idCliente,
            	"data_inicio" => $_dataInicio,
            	"data_final" => $_dataFinal,
            	"dia_semana" => $_diaSemana,
            	"image_promocao" => $_newLogo
            );

            $_save = $this->promocaomodel->save($_dados);

            if ($_save)
            {
            	redirect('promocoes/listar' . '/' . $_categoria . '/' . $_idCliente);
            }
        }
	}

	// Deleta um prato
	public function deletar($_categoria, $_idCliente, $_idPromocao)
	{
		// Verifica se foi informado os parametros
		if (empty($_categoria) || empty($_idCliente) || empty($_idPromocao))
		{
			// Redireciona
			redirect('home');
		}

		// Verifica se deletou
		if ($this->promocaomodel->delete($_idPromocao))
		{
			redirect(base_url('promocoes/listar') . '/' . $_categoria . '/' . $_idCliente);	
		}
		else
		{
			redirect(base_url('promocoes/listar') . '/' . $_categoria . '/' . $_idCliente);
		}
	}
}