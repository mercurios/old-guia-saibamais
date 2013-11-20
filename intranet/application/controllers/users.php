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
	public function index($msg = NULL)
	{
		// Verifica se o usuario esta logado
		if (!$this->session->userdata('session_id') || !$this->session->userdata('logado'))
        {
            redirect('users/login');
        }

        // Pega todos os usuários cadastrados
        $dados['users'] = $this->usersmodel->all_users();
        $dados['msg']   = $msg;

        // Lista os usuários cadastrados
        $this->load->view('includes/header');
        $this->load->view('users/listar', $dados);
        $this->load->view('includes/footer');
	}

    // Formulário de cadastro
    public function novo($msg = NULL)
    {
        // Mensagem
        $dados['msg'] = $msg;

        // Chama a view
        $this->load->view('includes/header');
        $this->load->view('users/novo', $dados);
        $this->load->view('includes/footer');
    }

    // Atualiza o usuário no db
    public function save()
    {
        // Valida o formulário
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'required|matches[confSenha]');
        $this->form_validation->set_rules('confSenha', 'Confirme a senha', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->novo();
        }
        else
        {
            // Pega as informações vindas do formulário
            $_nome      = $this->input->post('nome');
            $_email     = $this->input->post('email');
            $_senha     = md5($this->input->post('senha'));
            $_status    = $this->input->post('status');

            // Verifica se o e-mail já existe
            $_checkUser = $this->usersmodel->check_email($_email);

            if ($_checkUser)
            {
                $this->novo('O e-mail informado, já existe. Por favor tente outro.');
            }
            else
            {
                // Salva os dados em um array
                $_dados = array(
                    "nome_user"     => $_nome,
                    "email_user"    => $_email,
                    "senha_user"    => $_senha,
                    "status_user"   => $_status
                );

                // Valida se o usuário foi atualizado
                if ($this->usersmodel->save($_dados))
                {
                    $this->index('Usuário cadastrado com sucesso!');
                }
            }
        }
    }

    // Formulário de update
    public function editar($_id = NULL)
    {
        // valida o id do usuário
        if (empty($_id))
        {
            // Caso nao seja informado, redireciona
            redirect('users');
        }

        // Retorna o usuário informado pelo ID
        $dados['users'] = $this->usersmodel->get_user($_id);

        // Carrega o formulário
        $this->load->view('includes/header');
        $this->load->view('users/editar', $dados);
        $this->load->view('includes/footer');
    }

    // Atualiza o usuário no db
    public function update()
    {
        // Pega a id do usuário
        $_id = $this->input->post('id');

        // Valida o formulário
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->editar($_id);
        }
        else
        {
            // Pega as informações vindas do formulário
            $_nome      = $this->input->post('nome');
            $_email     = $this->input->post('email');
            $_senha     = $this->input->post('senha');
            $_status    = $this->input->post('status');
            $_senhamd5  = $this->input->post('senhamd5');  

            // Verifica se a senha foi alterada
            if ($_senha != $_senhamd5)
            {
                $_senha = md5($_senha);
            }

            // Salva os dados em um array
            $_update = array(
                "nome_user"     => $_nome,
                "email_user"    => $_email,
                "senha_user"    => $_senha,
                "status_user"   => $_status
            );

            // Valida se o usuário foi atualizado
            if ($this->usersmodel->update($_id, $_update))
            {
                $this->index('Usuário atualizado com sucesso!');
            }
        }
    }

    // Deleta o usuário
    public function excluir($_id)
    {
        // Verifica se o id do usuário foi informado
        if (empty($_id))
        {
            redirect('users');
        }

        // Verifica se deletou o usuário informado
        $_delete = $this->usersmodel->delete($_id);

        if ($_delete)
        {
            $this->index('Usuário deletado com sucesso!');
        }
    }

    // Formulario de login
    public function login()
    {
        //Carrega o formulário de login
        $this->load->view('users/login');
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

    // Termina a sessão do usuarios
    public function logoff()
    {
        $this->session->sess_destroy();
        redirect('users');
    }
}