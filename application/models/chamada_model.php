<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chamada_model extends CI_Model 
{
    /*************************************************
     * 
     * Atributos
     * 
    **************************************************/
    private $_tabela = 'guia_chamadas';

    /*************************************************
     * 
     * Chamadas construtor
     * Carrega as funções do CI
     * 
    **************************************************/
    public function __construct()
    {
        parent::__construct();
    }

    /*************************************************
     * 
     * Atributos
     * 
    **************************************************/
    public function get_chamada($_id)
    {
        $_query = $this->db->where('id_chamada', $_id);
        $_query = $this->db->get($this->_tabela)->result();
        return $_query;
    }
}
