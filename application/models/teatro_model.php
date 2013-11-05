<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teatro_model extends CI_Model 
{
    // Tabelas do banco de dados
    private $tabela      = 'guia_teatros';
    private $publicidade = 'guia_publicidades';
    private $pecas      = 'guia_pecas';

    // Método construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Lista todos os teatros
    public function listar_teatros()
    {
        $_query = $this->db->get($this->tabela)->result();
        return $_query;
    }

    // Pega um único teatro
    public function get_teatro($id)
    {
        $this->db->where('id_teatro', $id);
        return $this->db->get($this->tabela)->result();
    }

    // Lista as fotos de teatros
    public function listar_fotos($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('categoria_foto', 'teatro');
        return $this->db->get('guia_fotos')->result();
    }

    // Publicidades
    public function get_publicidade($pos, $pag)
    {
        // $pos = 'top' , 'conteudo' , 'sidebar' , 'bottom'
        // $pag = 'home' , 'restaurantes' , 'lanchonetes' , 'bebidas' , 'lazer' , 'estadias' , 'entretenimento'    

        $this->db->where('pos_publicidade', $pos);
        $this->db->where('pag_publicidade', $pag);
        $result = $this->db->get($this->publicidade)->result();

        return $result;
    }

    // Lista os filmes
    public function listar_pecas($id)
    {
        $this->db->where('id_teatro', $id);
        return $this->db->get($this->pecas)->result();
    }
}
