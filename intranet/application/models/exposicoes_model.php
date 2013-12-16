<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exposicoes_model extends CI_Model
{
    // Construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Pega todos os resultados com o id informado
    public function all_exposicoes()
    {
        $this->db->select('*');
        $this->db->from('guia_exposicoes');
        $this->db->join('guia_bairros', 'guia_bairros.cd_bairro = guia_exposicoes.bairro_exposicao');
        $this->db->join('guia_cidades', 'guia_cidades.cd_cidade = guia_exposicoes.cidade_exposicao');
        return $this->db->get()->result();
    }

    // Pega uma acomodação por id
    public function get_exposicao($_idexposicao)
    {
        $this->db->where('id_exposicao', $_idexposicao);
        return $this->db->get('guia_exposicoes')->result();
    }

    // Grava no banco
    public function save($_dados)
    {
        $this->db->insert('guia_exposicoes', $_dados);
        return $this->db->insert_id();
    }

    // Atualiza no banco de dados
    public function update($_id, $_dados)
    {
        $this->db->where('id_exposicao', $_id);
        $this->db->update('guia_exposicoes', $_dados);
        return true;
    }

    // Deleta o exposicao
    public function delete($_idexposicao)
    {
        $this->db->where('id_exposicao', $_idexposicao);
        $this->db->delete('guia_exposicoes');
        return true;
    }

}