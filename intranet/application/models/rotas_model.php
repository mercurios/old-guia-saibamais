<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rotas_model extends CI_Model
{
    // Construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Retorna todos os rotas
    public function all_rotas()
    {
        $this->db->select('*');
        $this->db->from('guia_rotas');
        return $this->db->get()->result();
    }

    // Pega o rota informado pela id
    public function get_rota($_id)
    {
        $this->db->where('id_rota', $_id);
        return $this->db->get('guia_rotas')->result();
    }

    // Salva as informações no banco de dados
    public function save($_dados)
    {
        $this->db->insert('guia_rotas', $_dados);
        return $this->db->insert_id();
    }

    // Atualiza no banco de dados
    public function update($id, $dados)
    {
        $this->db->where('id_rota', $id);
        $this->db->update('guia_rotas', $dados);
        return true;
    }

    // Deleta o rota
    public function delete($_id)
    {
        $this->db->where('id_rota', $_id);
        $this->db->delete('guia_rotas');
        return true;
    }
}