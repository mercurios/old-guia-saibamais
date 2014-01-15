<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shows_model extends CI_Model
{
    // Construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Pega todos so shows
    public function get_shows()
    {
        $this->db->select('*');
        $this->db->from('guia_shows');
        $this->db->join('guia_bairros', 'guia_bairros.cd_bairro = guia_shows.bairro_show');
        $this->db->join('guia_cidades', 'guia_cidades.cd_cidade = guia_shows.cidade_show');
        return $this->db->get()->result();
    }

    // Grava no banco
    public function save($_dados)
    {
        $this->db->insert('guia_shows', $_dados);
        return $this->db->insert_id();
    }

    // Pega o show informado pela id
    public function get_show($_id)
    {
        $this->db->where('id_show', $_id);
        return $this->db->get('guia_shows')->result();
    }

    // Atualiza no banco de dados
    public function update($id, $dados)
    {
        $this->db->where('id_show', $id);
        $this->db->update('guia_shows', $dados);
        return true;
    }

    // Deleta o show
    public function delete($_id)
    {
        $this->db->where('id_show', $_id);
        $this->db->delete('guia_shows');
        return true;
    }
}