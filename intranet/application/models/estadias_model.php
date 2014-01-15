<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadias_model extends CI_Model
{
    // Construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Retorna todos os estadias
    public function all_estadias()
    {
        $this->db->select('*');
        $this->db->from('guia_estadias');
        $this->db->join('guia_bairros', 'guia_bairros.cd_bairro = guia_estadias.bairro_estadia');
        $this->db->join('guia_cidades', 'guia_cidades.cd_cidade = guia_estadias.cidade_estadia');
        $this->db->query('SET SQL_BIG_SELECTS=1');
        return $this->db->get()->result();
    }

    // Pega o estadia informado pela id
    public function get_estadia($_id)
    {
        $this->db->where('id_estadia', $_id);
        return $this->db->get('guia_estadias')->result();
    }

    // Salva as informações no banco de dados
    public function save($_dados)
    {
        $this->db->insert('guia_estadias', $_dados);
        return $this->db->insert_id();
    }

    // Atualiza no banco de dados
    public function update($id, $dados)
    {
        $this->db->where('id_estadia', $id);
        $this->db->update('guia_estadias', $dados);
        return true;
    }

    // Deleta o estadia
    public function delete($_id)
    {
        $this->db->where('id_estadia', $_id);
        $this->db->delete('guia_estadias');
        return true;
    }
}