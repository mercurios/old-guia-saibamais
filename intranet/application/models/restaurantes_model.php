<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restaurantes_model extends CI_Model
{
    // Construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Retorna todos os restaurantes
    public function all_restaurantes()
    {
        $this->db->select('*');
        $this->db->from('guia_restaurantes');
        $this->db->join('guia_bairros', 'guia_bairros.cd_bairro = guia_restaurantes.bairro_restaurante');
        $this->db->join('guia_cidades', 'guia_cidades.cd_cidade = guia_restaurantes.cidade_restaurante');
        $this->db->query('SET SQL_BIG_SELECTS=1');
        return $this->db->get()->result();
    }

    // Pega o restaurante informado pela id
    public function get_restaurante($_id)
    {
        $this->db->where('id_restaurante', $_id);
        return $this->db->get('guia_restaurantes')->result();
    }

    // Salva as informações no banco de dados
    public function save($_dados)
    {
        $this->db->insert('guia_restaurantes', $_dados);
        return $this->db->insert_id();
    }

    // Atualiza no banco de dados
    public function update($id, $dados)
    {
        $this->db->where('id_restaurante', $id);
        $this->db->update('guia_restaurantes', $dados);
        return true;
    }

    // Deleta o restaurante
    public function delete($_id)
    {
        $this->db->where('id_restaurante', $_id);
        $this->db->delete('guia_restaurantes');
        return true;
    }
}