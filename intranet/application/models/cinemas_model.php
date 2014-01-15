<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cinemas_model extends CI_Model
{
    // Construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Pega todos so cinemas
    public function get_cinemas()
    {
        $this->db->select('*');
        $this->db->from('guia_cinemas');
        $this->db->join('guia_bairros', 'guia_bairros.cd_bairro = guia_cinemas.bairro_cinema');
        $this->db->join('guia_cidades', 'guia_cidades.cd_cidade = guia_cinemas.cidade_cinema');
        $this->db->query('SET SQL_BIG_SELECTS=1');
        return $this->db->get()->result();
    }

    // Grava no banco
    public function save($_dados)
    {
        $this->db->insert('guia_cinemas', $_dados);
        return $this->db->insert_id();
    }

    // Pega o cinema informado pela id
    public function get_cinema($_id)
    {
        $this->db->where('id_cinema', $_id);
        return $this->db->get('guia_cinemas')->result();
    }

    // Atualiza no banco de dados
    public function update($id, $dados)
    {
        $this->db->where('id_cinema', $id);
        $this->db->update('guia_cinemas', $dados);
        return true;
    }

    // Deleta o cinema
    public function delete($_id)
    {
        $this->db->where('id_cinema', $_id);
        $this->db->delete('guia_cinemas');
        return true;
    }
}