<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teatros_model extends CI_Model
{
    // Construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Pega todos so teatros
    public function get_teatros()
    {
        $this->db->select('*');
        $this->db->from('guia_teatros');
        $this->db->join('guia_bairros', 'guia_bairros.cd_bairro = guia_teatros.bairro_teatro');
        $this->db->join('guia_cidades', 'guia_cidades.cd_cidade = guia_teatros.cidade_teatro');
        return $this->db->get()->result();
    }

    // Grava no banco
    public function save($_dados)
    {
        $this->db->insert('guia_teatros', $_dados);
        return $this->db->insert_id();
    }

    // Pega o teatro informado pela id
    public function get_teatro($_id)
    {
        $this->db->where('id_teatro', $_id);
        return $this->db->get('guia_teatros')->result();
    }

    // Atualiza no banco de dados
    public function update($id, $dados)
    {
        $this->db->where('id_teatro', $id);
        $this->db->update('guia_teatros', $dados);
        return true;
    }

    // Deleta o teatro
    public function delete($_id)
    {
        $this->db->where('id_teatro', $_id);
        $this->db->delete('guia_teatros');
        return true;
    }
}