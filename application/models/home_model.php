<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{
    // Nome da Tabela
    private $chamada    = 'guia_chamadas';
    private $frases     = 'guia_frases';
    private $publicidade = 'guia_publicidades';


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

    // Get frases do dia
    public function get_frase($dia)
    {

        // Dia da semana
        $diasemana = array(
            1 => "segunda",
            2 => "terca",
            3 => "quarta",
            4 => "quinta",
            5 => "sexta",
            6 => "sabado",
            0 => "domingo"
        );

        $hoje   = $dia['wday'];
        $diaext = $diasemana[$hoje];

        $this->db->where('dia_frase', $diaext);
        $result = $this->db->get($this->frases)->result();
        return $result;
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





















}