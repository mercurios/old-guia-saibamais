<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Esportes_model extends CI_Model
{
    // Construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Retorna todos os esportes
    public function get_esportes()
    {
        $this->db->select('*');
        $this->db->from('guia_esportes');
        $this->db->join('guia_bairros', 'guia_bairros.cd_bairro = guia_esportes.bairro_esporte');
        $this->db->join('guia_cidades', 'guia_cidades.cd_cidade = guia_esportes.cidade_esporte');
        return $this->db->get()->result();
    }

    // Pega o esporte informado pela id
    public function get_esporte($_id)
    {
        $this->db->where('id_esporte', $_id);
        return $this->db->get('guia_esportes')->result();
    }

    // Salva as informações no banco de dados
    public function save($_dados)
    {
        $this->db->insert('guia_esportes', $_dados);
        return $this->db->insert_id();
    }

    // Atualiza no banco de dados
    public function update($id, $dados)
    {
        $this->db->where('id_esporte', $id);
        $this->db->update('guia_esportes', $dados);
        return true;
    }

    // Deleta o esporte
    public function delete($_id)
    {
        $this->db->where('id_esporte', $_id);
        $this->db->delete('guia_esportes');
        return true;
    }
}