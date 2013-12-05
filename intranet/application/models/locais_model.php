<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Locais_model extends CI_Model
{
    // Construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Retorna todos os locais
    public function all_locais()
    {
        $this->db->select('*');
        $this->db->from('guia_locais');
        $this->db->join('guia_bairros', 'guia_bairros.cd_bairro = guia_locais.bairro_local');
        $this->db->join('guia_cidades', 'guia_cidades.cd_cidade = guia_locais.cidade_local');
        return $this->db->get()->result();
    }

    // Pega o local informado pela id
    public function get_local($_id)
    {
        $this->db->where('id_local', $_id);
        return $this->db->get('guia_locais')->result();
    }

    // Salva as informações no banco de dados
    public function save($_dados)
    {
        $this->db->insert('guia_locais', $_dados);
        return $this->db->insert_id();
    }

    // Atualiza no banco de dados
    public function update($id, $dados)
    {
        $this->db->where('id_local', $id);
        $this->db->update('guia_locais', $dados);
        return true;
    }

    // Deleta o local
    public function delete($_id)
    {
        $this->db->where('id_local', $_id);
        $this->db->delete('guia_locais');
        return true;
    }
}