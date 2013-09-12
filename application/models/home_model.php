<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{
    // Nome da Tabela
    private $chamada = 'guia_chamadas';
    private $frases = 'guia_frases';


    // Método construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Lista as chamadas
    public function get_chamada($posicao, $categoria, $qnt)
    {
        $this->db->where('pos_chamada', $posicao);
        $this->db->where('categoria_chamada', $categoria);
        return $this->db->get($this->chamada, $qnt)->result();
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

        $hoje = $dia['wday'];
        $diaext = $diasemana[$hoje];

        $this->db->where('dia_frase', $diaext);
        return $this->db->get($this->frases)->result();
    }







}