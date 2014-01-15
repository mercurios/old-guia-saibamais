<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bebidas_model extends CI_Model
{
    // Construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Retorna todos os bebidas
    public function all_bebidas()
    {
        $this->db->select('*');
        $this->db->from('guia_bebidas');
        $this->db->join('guia_bairros', 'guia_bairros.cd_bairro = guia_bebidas.bairro_bebida');
        $this->db->join('guia_cidades', 'guia_cidades.cd_cidade = guia_bebidas.cidade_bebida');
        $this->db->query('SET SQL_BIG_SELECTS=1');
        return $this->db->get()->result();
    }

    // Pega o bebida informado pela id
    public function get_bebida($_id)
    {
        $this->db->where('id_bebida', $_id);
        return $this->db->get('guia_bebidas')->result();
    }

    // Salva as informações no banco de dados
    public function save($_dados)
    {
        $this->db->insert('guia_bebidas', $_dados);
        return $this->db->insert_id();
    }

    // Atualiza no banco de dados
    public function update($id, $dados)
    {
        $this->db->where('id_bebida', $id);
        $this->db->update('guia_bebidas', $dados);
        return true;
    }

    // Deleta o bebida
    public function delete($_id)
    {
        $this->db->where('id_bebida', $_id);
        $this->db->delete('guia_bebidas');
        return true;
    }
}