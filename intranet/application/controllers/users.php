<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	// Método construtor
    public function __construct()
    {
            parent::__construct();

            // Carrega o model users
            $this->load->model('Users_model', 'usersmodel');
    }

	// Exibe o formulário de login
	public function index()
	{
		// Verifica se o usuario esta logado
		if (!$this->session->userdata('session_id') || !$this->session->userdata('logado'))
        {
            redirect('users/login');
        }

        // Pega todos os usuários cadastrados
        $dados['users'] = $this->usersmodel->all_users();

        // Lista os usuários cadastrados
        $this->load->view('includes/header');
        $this->load->view('users/listar', $dados);
        $this->load->view('includes/footer');
	}

	// Faz a autenticação do usuário
    public function logar()
    {        
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        $this->form_validation->set_message('email', 'Error email');

        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
	        $_usuario	= $this->input->post('email');
	        $_senha     = md5($this->input->post('senha'));
	        $result     = $this->usersmodel->chec_usuario($_usuario);

            if (!$result)
            {
                $dados['msg'] = '<p class="text-warning"> O usuário informado não é válido. </p>';
                $this->load->view('users/login', $dados);
            }
            else if ($result[0]->senha_user != $_senha)
            {
                $dados['msg'] = '<p class="text-warning"> A senha esta incorreta. </p>';
                $this->load->view('users/login', $dados);
            }
            else if ($result[0]->status == 'bloqueado')
            {
                $dados['msg'] = '<p class="text-warning"> Você está bloqueado, entre em contato com o administrador. </p>';
                $this->load->view('users/login', $dados);
            }
            else
            {
                $data = array(
					'id'        => $result[0]->id_user,
					'usuario'	=> $result[0]->nome_user,
					'logado'    => TRUE
                );

                $this->session->set_userdata($data);
                redirect("home/");
            }
        }
    }

    // Formulario de login
    public function login()
    {
    	//Carrega o formulário de login
    	$this->load->view('users/login');
    }

    // Termina a sessão do usuarios
    public function logoff()
    {
        $this->session->sess_destroy();
        redirect('users');
    }
}