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

    /* --------------------------------
        Filtragem por categorias
        - Cinemas
        - Exposições
        - Eventos
        - Shows
        - Teatros
    -------------------------------- */
    public function filtrar_entretenimentos($bairro, $adaptado)
    {
        // Filtra cinemas por bairro
        $this->db->like('bairro_cinema', $bairro);
        $resultado_cinema = $this->db->get('guia_cinemas')->result();

        // Filtra exposicoes por bairro
        $this->db->like('bairro_exposicao', $bairro);
        $resultado_exposicao = $this->db->get('guia_exposicoes')->result();

        // Filtra eventos por bairro
        $this->db->like('bairro_evento', $bairro);
        $resultado_evento = $this->db->get('guia_eventos')->result();

        // Filtra shows por bairro
        $this->db->like('bairro_show', $bairro);
        $resultado_show = $this->db->get('guia_shows')->result();

        // Filtra shows por bairro
        $this->db->like('bairro_teatro', $bairro);
        $resultado_teatro = $this->db->get('guia_teatros')->result();

        $resultados = array(
            "cinemas"       => $resultado_cinema,
            "exposicoes"    => $resultado_exposicao,
            "eventos"       => $resultado_evento,
            "shows"         => $resultado_show,
            "teatros"       => $resultado_teatro
        );

        return $resultados;
    }

    // Retorna os bairros
    public function get_bairros($cd_cidade)
    {
        $this->db->where('cd_cidade', $cd_cidade);
        return $this->db->get('guia_bairros')->result();
    }
}