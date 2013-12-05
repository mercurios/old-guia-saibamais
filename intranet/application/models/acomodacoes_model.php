<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acomodacoes_model extends CI_Model
{
    // Construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Pega todos os resultados com o id informado
    public function get_all($_id)
    {
        $this->db->where('id_cliente', $_id);
        return $this->db->get('guia_acomodacoes')->result();
    }

    // Pega uma acomodação por id
    public function get_acomodacao($_idAcomodacao)
    {
        $this->db->where('id_acomodacao', $_idAcomodacao);
        return $this->db->get('guia_acomodacoes')->result();
    }

    // Grava no banco
    public function save($_dados)
    {
        $this->db->insert('guia_acomodacoes', $_dados);
        return $this->db->insert_id();
    }

    // Atualiza no banco de dados
    public function update($_dados, $_idCardapio)
    {
        $this->db->where('id_acomodacao', $_idCardapio);
        $this->db->update('guia_acomodacoes', $_dados);
        return true;
    }

    // Deleta o restaurante
    public function delete($_idAcomodacao)
    {
        $this->db->where('id_acomodacao', $_idAcomodacao);
        $this->db->delete('guia_acomodacoes');
        return true;
    }

}