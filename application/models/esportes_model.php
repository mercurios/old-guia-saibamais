<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Esportes_model extends CI_Model
{
    // Nome da Tabela
    private $tabela   = 'guia_esportes';
    private $publicidade = 'guia_publicidades';

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
    public function get_esportes()
    {
        return $this->db->get($this->tabela)->result();
    }

    // Lista os esportes por categoria
    public function search_esportes($categoria)
    {   
        $this->db->select('*');
        $this->db->from('guia_esportes');
        $this->db->join('guia_bairros', 'guia_bairros.cd_bairro = guia_esportes.bairro_esporte');
        $this->db->join('guia_cidades', 'guia_cidades.cd_cidade = guia_esportes.cidade_esporte');
        $this->db->like('categoria_esporte',$categoria);

        $this->db->query('SET SQL_BIG_SELECTS=1');
        $query = $this->db->get()->result();
        return $query;
    }

    // Pega o esporte pelo id
    public function get_esporte($id)
    {
        $this->db->where('id_esporte', $id);
        return $this->db->get($this->tabela)->result();
    }

    // Lista as fotos de esportes
    public function listar_fotos($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('categoria_foto', 'esporte');
        return $this->db->get('guia_fotos')->result();
    }

    // Listar promoções
    public function listar_promocao($id)
    {
        $this->db->where('id_cliente', $id);
        return $this->db->get('guia_promocoes')->result();
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