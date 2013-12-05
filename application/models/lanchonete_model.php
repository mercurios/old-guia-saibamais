<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lanchonete_model extends CI_Model 
{
    // Nome da Tabela
    private $tabela      = 'guia_lanchonetes';
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
    public function get_lanchonetes()
    {
        $this->db->select('*');
        $this->db->from('guia_lanchonetes');
        $this->db->join('guia_bairros', 'guia_bairros.cd_bairro = guia_lanchonetes.bairro_lanchonete');
        $this->db->join('guia_cidades', 'guia_cidades.cd_cidade = guia_lanchonetes.cidade_lanchonete');
        return $this->db->get()->result();
    }

    // Lista os lanchonetes por categoria
    public function search_lanchonetes($categoria)
    {   
        $this->db->select('*');
        $this->db->from('guia_lanchonetes');
        $this->db->join('guia_bairros', 'guia_bairros.cd_bairro = guia_lanchonetes.bairro_lanchonete');
        $this->db->join('guia_cidades', 'guia_cidades.cd_cidade = guia_lanchonetes.cidade_lanchonete');
        $this->db->like('tipo_lanchonete', $categoria);
        $this->db->or_like('tipo_comida_lanchonete', $categoria);
        $this->db->or_like('tipo_servico_lanchonete', $categoria);

        return $this->db->get()->result();
    }

    // Pega o lanchonete pelo id
    public function get_lanchonete($id)
    {
        $this->db->where('id_lanchonete', $id);
        return $this->db->get($this->tabela)->result();
    }

    // Lista as fotos de lanchonetes
    public function listar_fotos($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('categoria_foto', 'lanchonete');
        $this->db->where('status_foto', 1);
        return $this->db->get('guia_fotos')->result();
    }

    // Lista pratos principal
    public function get_lanches($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('tipo_prato', 'normal');
        $this->db->where('categoria_prato', 'lanchonete');
        return $this->db->get('guia_cardapios')->result();
    }

    // Lista pratos principal
    public function get_bebidas($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('tipo_prato', 'bebida');
        $this->db->where('categoria_prato', 'lanchonete');
        return $this->db->get('guia_cardapios')->result();
    }

    // Lista lanchonetes
    public function listar_lanchonetes($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('tipo_prato', 'lanchonete');
        return $this->db->get('guia_cardapios')->result();
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
        // $pag = 'home' , 'lanchonetes' , 'lanchonetes' , 'lanchonetes' , 'lazer' , 'estadias' , 'entretenimento'    

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
    public function filtrar_lanchonetes($local, $deficiencia, $comida, $ordem)
    {
        //$this->db->where('bairro_lanchonete', $local);
        $this->db->like('bairro_lanchonete', $local);
        $this->db->like('adaptado_lanchonete', $deficiencia);
        $this->db->like('tipo_comida_lanchonete', $comida);
        $this->db->order_by("nome_lanchonete", $ordem);
        return $this->db->get($this->tabela)->result();
    }
}