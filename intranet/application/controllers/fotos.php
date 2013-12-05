<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fotos extends CI_Controller {

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
        $this->load->model('Fotos_model', 'fotosmodel');
	}

	public function index()
	{
		// Redireciona para home
		redirect('home');
	}

	// Lista as fotos do usuário
	public function listar($_categoria, $_idCliente, $_msg = NULL)
	{
		// Verifica se foi informado os parametros
		if (empty($_categoria) || empty($_idCliente))
		{
			// Se não foi, redireciona para home
			redirect('home');
		}

		// Pega as fotos salvas no banco
		$_result = $this->fotosmodel->get_fotos($_categoria, $_idCliente);

		// Envia para a view
		$_dados['fotos'] = $_result;
		$_dados['msg']	 = $_msg;

		// Carrega as views
		$this->load->view('includes/header');
		$this->load->view('fotos/listar', $_dados);
		$this->load->view('includes/footer');
	}

	// Envia uma foto
	public function upload()
	{
		// Pega o nome do campo
		$_foto 	    = 'foto';
		$_titulo    = $this->input->post('titulo');
		$_categoria = $this->input->post('categoria');
		$_idCliente = $this->input->post('idCliente');


		// Seta as configurações de upload
        $_config['upload_path']     = '../uploads/fotos/'; // Caminho
        $_config['allowed_types']   = 'gif|jpg|png|jpeg|pjpeg'; // Tipos de imagens aceito
        $_config['max_size']        = '2048'; // 2MB
        $_config['overwrite']       = FALSE; // Não irá sobre-escrever o arquivo
        $_config['encrypt_name']    = TRUE; // Trocará o nome do arquivo para um HASH

        // Inicializa a library
        $this->load->library('upload', $_config);

        //Faz o upload
        if(!$this->upload->do_upload($_foto))
        {
            $error = array('erro' => $this->upload->display_errors());
            $_newFoto = "";
        }
        else
        {
            $upload_data = $this->upload->data();
            $_newFoto   = $upload_data['file_name']; 
        }

        // Salva os dados em um array
        $_dados = array(
        	"titulo_foto" 		=> $_titulo,
        	"img_foto" 			=> $_newFoto,
        	"categoria_foto" 	=> $_categoria,
        	"id_cliente"		=> $_idCliente,
        	"status_foto"		=> 0
        );

        // Salva no banco de dados
        $_save = $this->fotosmodel->save($_dados);

        if ($_save)
        {
        	redirect('fotos/listar' . '/' . $_categoria . '/' . $_idCliente);
        }
	}

	// Deleta a imagem
	public function deletar($_id, $_categoria, $_idCliente, $_img)
    {
        // Verifica se o id do usuário foi informado
        if (empty($_id) || empty($_categoria) || empty($_idCliente))
        {
            redirect('home');
        }

        if (unlink('../uploads/fotos/' . $_img))
        {
        	// Verifica se deletou o usuário informado
        	$_delete = $this->fotosmodel->delete($_id, $_categoria, $_idCliente);

	        if ($_delete)
	        {
	           redirect('fotos/listar' . '/' . $_categoria . '/' . $_idCliente);
	        }
        }
    }

    // Altera o status de exibição da imagem
    public function status($_atual, $_idImg, $_categoria, $_idCliente)
    {
    	// Verifica o status atual das fotos
    	if ($_atual == 'desativada')
    	{
			// Conta quantas ativas existem no banco
			$_ativas = count($this->fotosmodel->get_ativas($_categoria, $_idCliente));

			// Se tiver menos que 10, ativa
			if ($_ativas < 10)
			{
				// Salva os dados em um array
		        $_dados = array(
		        	"status_foto" => 1
		        );

		        $_update = $this->fotosmodel->update($_idImg, $_dados);

		        if ($_update)
		        {
		        	redirect('fotos/listar' . '/' . $_categoria . '/' . $_idCliente);
		        }
			}
			else
			{
				$this->listar($_categoria, $_idCliente, '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><h4>Advertência!</h4> Você já tem 10 fotos ativas!</div>');
			}
    	}
    	else
    	{
    		// Salva os dados em um array
	        $_dados = array(
	        	"status_foto" => 0
	        );

	        $_update = $this->fotosmodel->update($_idImg, $_dados);

	        if ($_update)
	        {
	        	redirect('fotos/listar' . '/' . $_categoria . '/' . $_idCliente);
	        }
    	}



    	
    }


}