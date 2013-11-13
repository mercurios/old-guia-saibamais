<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class locais_model extends CI_Model
{
    // Nome da Tabela
    private $tabela   = 'guia_locais';
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
    public function get_locais()
    {
        return $this->db->get($this->tabela)->result();
    }

    // Lista os locals por categoria
    public function search_locais($categoria)
    {   
        $this->db->like('categoria_local',$categoria);
        $query = $this->db->get($this->tabela)->result();
        return $query;
    }

    // Pega o local pelo id
    public function get_local($id)
    {
        $this->db->where('id_local', $id);
        return $this->db->get($this->tabela)->result();
    }

    // Lista as fotos de locals
    public function listar_fotos($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('categoria_foto', 'local');
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

    // Retorna os bairros
    public function get_bairros($cd_cidade)
    {
        $this->db->where('cd_cidade', $cd_cidade);
        return $this->db->get('guia_bairros')->result();
    }

    // Retorna os clientes seguindo os parametros
    public function filtrar_locais($local, $deficiencia, $comida, $ordem)
    {
        //$this->db->where('bairro_restaurante', $local);
        $this->db->like('bairro_local', $local);
        $this->db->like('adaptado_local', $deficiencia);
        $this->db->like('categoria_local', $comida);
        $this->db->order_by("nome_local", $ordem);
        return $this->db->get($this->tabela)->result();
    }
}