<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entretenimento_model extends CI_Model 
{
    // Nome da Tabela
    private $chamada        = 'guia_chamadas';
    private $publicidade    = 'guia_publicidades';
    private $cinema         = 'guia_cinemas';
    private $exposicao      = 'guia_exposicoes';
    private $evento         = 'guia_eventos';
    private $show           = 'guia_shows';
    private $teatro         = 'guia_teatros';

    // Método construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Lista as chamadas
    public function get_chamada($posicao, $categoria, $qnt, $offset = NULL)
    {
        $this->db->where('pos_chamada', $posicao);
        $this->db->where('categoria_chamada', $categoria);
        return $this->db->get($this->chamada, $qnt, $offset)->result();
    }

    // Publicidades
    public function get_publicidade($pos, $pag)
    {
        // $pos = 'top' , 'conteudo' , 'sidebar' , 'bottom'
        // $pag = 'home' , 'bebidas' , 'lanchonetes' , 'bebidas' , 'lazer' , 'estadias' , 'entretenimento'    

        $this->db->where('pos_publicidade', $pos);
        $this->db->where('pag_publicidade', $pag);
        $result = $this->db->get($this->publicidade)->result();

        return $result;
    }

    public function listar_resultados($categoria)
    {
        $this->db->like('categoria_cinema', $categoria);
        $query_cinemas  = $this->db->get($this->cinema)->result();

        $this->db->like('categoria_exposicao', $categoria);
        $query_exposicoes  = $this->db->get($this->exposicao)->result();

        $this->db->like('categoria_evento', $categoria);
        $query_eventos  = $this->db->get($this->evento)->result();

        $this->db->like('categoria_show', $categoria);
        $query_shows  = $this->db->get($this->show)->result();

        $this->db->like('categoria_teatro', $categoria);
        $query_teatros  = $this->db->get($this->teatro)->result();

        $result = array(
            "cinemas"       => $query_cinemas, 
            "exposicoes"    => $query_exposicoes, 
            "eventos"       => $query_eventos, 
            "shows"         => $query_shows, 
            "teatros"       => $query_teatros
        );
        return $result;
    }











}