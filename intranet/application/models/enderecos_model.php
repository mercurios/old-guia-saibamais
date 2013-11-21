<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enderecos_model extends CI_Model
{
    // Tabelas
    private $_estados = 'guia_estados';
    private $_cidades = 'guia_cidades';
    private $_bairros = 'guia_bairros';


    // Construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Lista todos os estados
    public function get_all_estados()
    {
        return $this->db->get($this->_estados)->result();
    }

    // Lista as cidades por estados informados no parametro
    public function get_cidades($_estados)
    {
        return $this->db->select('guia_cidades.cd_cidade, guia_cidades.ds_cidade_nome')
            ->from('guia_estados')
            ->join('guia_cidades', 'guia_cidades.cd_uf = guia_estados.cd_uf')
            ->where( array('guia_estados.cd_uf' => $_estados) )
            ->get()->result();
    }

    // Lista os bairros por cidade informada no parametro
    public function get_bairros($_cidade)
    {
        return $this->db->select('guia_bairros.cd_bairro, guia_bairros.ds_bairro_nome')
                ->from('guia_cidades')
                ->join('guia_bairros', 'guia_bairros.cd_cidade = guia_cidades.cd_cidade')
                ->where( array('guia_cidades.cd_cidade' => $_cidade) )
                ->get()->result();
    }
    
}