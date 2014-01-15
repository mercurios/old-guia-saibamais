<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lanchonetes_model extends CI_Model
{
    // Construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Retorna todos os lanchonetes
    public function all_lanchonetes()
    {
        $this->db->select('*');
        $this->db->from('guia_lanchonetes');
        $this->db->join('guia_bairros', 'guia_bairros.cd_bairro = guia_lanchonetes.bairro_lanchonete');
        $this->db->join('guia_cidades', 'guia_cidades.cd_cidade = guia_lanchonetes.cidade_lanchonete');
        $this->db->query('SET SQL_BIG_SELECTS=1');
        return $this->db->get()->result();
    }

    // Pega o lanchonete informado pela id
    public function get_lanchonete($_id)
    {
        $this->db->where('id_lanchonete', $_id);
        return $this->db->get('guia_lanchonetes')->result();
    }

    // Salva as informações no banco de dados
    public function save($_dados)
    {
        $this->db->insert('guia_lanchonetes', $_dados);
        return $this->db->insert_id();
    }

    // Atualiza no banco de dados
    public function update($id, $dados)
    {
        $this->db->where('id_lanchonete', $id);
        $this->db->update('guia_lanchonetes', $dados);
        return true;
    }

    // Deleta o lanchonete
    public function delete($_id)
    {
        $this->db->where('id_lanchonete', $_id);
        $this->db->delete('guia_lanchonetes');
        return true;
    }
}