<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadia_model extends CI_Model
{
    // Nome da Tabela
    private $tabela   = 'guia_estadias';

    // Método construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Pega o total de registro no banco
    public function count_all()
    {
        return $this->db->count_all($this->tabela);
    }

    // Pega as informações vindas do DB
    public function get_estadias()
    {
        return $this->db->get($this->tabela);
    }

    // Pega a estadia pelo id
    public function get_estadia($id)
    {
        $this->db->where('id_estadia', $id);
        return $this->db->get($this->tabela)->result();
    }

    // Lista as fotos de estadias
    public function listar_fotos($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('categoria_foto', 'estadia');
        return $this->db->get('guia_fotos')->result();
    }

    // Listar acomodações
    public function listar_acomodacao($id)
    {
        $this->db->where('id_cliente', $id);
        return $this->db->get('guia_acomodacoes')->result();
    }
}