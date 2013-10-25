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
        return $this->db->get($this->tabela)->result();
    }

    // Lista os lanchonetes por categoria
    public function search_lanchonetes($categoria)
    {   
        $this->db->like('tipo_lanchonete',$categoria);
        $this->db->or_like('tipo_comida_lanchonete',$categoria);
        $this->db->or_like('tipo_servico_lanchonete',$categoria);
        $query = $this->db->get($this->tabela)->result();
        return $query;
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
        return $this->db->get('guia_fotos')->result();
    }

    // Lista pratos principal
    public function listar_prato_principal($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('tipo_prato', 'pratoprincipal');
        $this->db->where('categoria_prato', 'lanchonete');
        return $this->db->get('guia_cardapios')->result();
    }

    // Lista todos os pratos
    public function listar_pratos($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('tipo_prato', 'normal');
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
}