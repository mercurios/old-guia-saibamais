<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{
    // Nome da tabela
    private $tabela = 'guia_users';

    public function __construct()
    {
            parent::__construct();
    }

    // Verifica se existe o e-mail informado
    public function chec_usuario($usuario)
    {
            $this->db->where('email_user', $usuario);
            return $this->db->get($this->tabela)->result();
    }

    // Verifica se existe o e-mail informado
    public function chec_email($email)
    {
            $this->db->where('email', $email);
            return $this->db->get($this->tabela)->result();
    }

    // Verifica se existe o login informado
    public function chec_login($login)
    {
            $this->db->where('login', $login);
            return $this->db->get($this->tabela)->result();
    }

    // Lista usuários cadastrados
    public function all_users()
    {
            $result = $this->db->get($this->tabela)->result();
            return $result;
    }

    // Pega o usuário pelo ID
    public function get_user($id)
    {
            $this->db->where('id', $id);
            return $this->db->get($this->tabela)->result();
    }

    // Salva no banco de dados
    public function save($dados)
    {
            $this->db->insert($this->tabela, $dados);
            return $this->db->insert_id();
    }

    // Salva no banco de dados
    public function update($id, $dados)
    {
            $this->db->where('id', $id);
            $this->db->update($this->tabela, $dados);
            return true;
    }

    // Deleta
    public function delete($id)
    {
            $this->db->where('id', $id);
            $this->db->delete($this->tabela);
    }

}