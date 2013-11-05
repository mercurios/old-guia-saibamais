<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class exposicao_model extends CI_Model 
{
    // Tabelas do banco de dados
    private $tabela      = 'guia_exposicoes';
    private $publicidade = 'guia_publicidades';
    private $filmes      = 'guia_filmes';

    // Método construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Lista todos os exposicoes
    public function listar_exposicoes()
    {
        $_query = $this->db->get($this->tabela)->result();
        
        return $_query;
    }

    // Pega um único exposicao
    public function get_exposicao($id)
    {
        $this->db->where('id_exposicao', $id);

        return $this->db->get($this->tabela)->result();
    }

    // Lista as fotos de exposicoes
    public function listar_fotos($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('categoria_foto', 'exposicao');

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
    public function listar_filmes($id)
    {
        $this->db->where('id_exposicao', $id);
        return $this->db->get($this->filmes)->result();
    }
}