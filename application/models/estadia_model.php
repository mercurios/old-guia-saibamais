<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadia_model extends CI_Model
{
    // Nome da Tabela
    private $tabela      = 'guia_estadias';
    private $chamada     = 'guia_chamadas';
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
    public function get_estadias()
    {
        return $this->db->get($this->tabela)->result();
    }

    // Lista os estadias por categoria
    public function search_estadias($categoria)
    {   
        $this->db->like('tipo_estadia',$categoria);
        $this->db->or_like('localidade_estadia',$categoria);
        $this->db->or_like('class_estadia',$categoria);
        $query = $this->db->get($this->tabela)->result();
        return $query;
    }

    // Pega o estadia pelo id
    public function get_estadia($id)
    {
        $this->db->where('id_estadia', $id);
        return $this->db->get($this->tabela)->result();
    }

    // Lista as fotos de estadias
    public function listar_fotos($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('categoria_foto', 'estadia');
        return $this->db->get('guia_fotos')->result();
    }

    // Lista pratos principal
    public function listar_acomodacoes($id)
    {
        $this->db->where('id_cliente', $id);
        return $this->db->get('guia_acomodacoes')->result();
    }

    // Listar promoções
    public function listar_promocao($id)
    {
        $this->db->where('id_cliente', $id);
        return $this->db->get('guia_promocoes')->result();
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
        // $pag = 'home' , 'estadias' , 'lanchonetes' , 'bebidas' , 'lazer' , 'estadias' , 'entretenimento'    

        $this->db->where('pos_publicidade', $pos);
        $this->db->where('pag_publicidade', $pag);
        $result = $this->db->get($this->publicidade)->result();

        return $result;
    }

    // Retorna os bairros
    public function get_bairros($cd_cidade)
    {
        $this->db->where('cd_cidade', $cd_cidade);
        return $this->db->get('guia_bairros')->result();
    }

    // Retorna os clientes seguindo os parametros
    public function filtrar_estadias($local, $deficiencia, $tipo, $ordem)
    {
        //$this->db->where('bairro_lanchonete', $local);
        $this->db->like('bairro_estadia', $local);
        $this->db->like('adaptado_estadia', $deficiencia);
        $this->db->like('tipo_estadia', $tipo);
        $this->db->order_by("nome_estadia", $ordem);
        return $this->db->get($this->tabela)->result();
    }
}