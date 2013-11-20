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
        return $this->db->get()->result();
    }

    // Deleta o restaurante
    public function delete($_id)
    {
        $this->db->where('id_restaurante', $_id);
        $this->db->delete('guia_restaurantes');
        return true;
    }
}