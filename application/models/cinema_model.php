<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cinema_model extends CI_Model 
{
    // Tabelas do banco de dados
    private $tabela      = 'guia_cinemas';
    private $publicidade = 'guia_publicidades';
    private $filmes      = 'guia_filmes';

    // Método construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Lista todos os cinemas
    public function listar_cinemas()
    {
        $_query = $this->db->get($this->tabela)->result();
        return $_query;
    }

    // Pega um único cinema
    public function get_cinema($id)
    {
        $this->db->where('id_cinema', $id);
        return $this->db->get($this->tabela)->result();
    }

    // Lista as fotos de cinemas
    public function listar_fotos($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('categoria_foto', 'cinema');
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
        $this->db->where('id_cinema', $id);
        return $this->db->get($this->filmes)->result();



    }




}
