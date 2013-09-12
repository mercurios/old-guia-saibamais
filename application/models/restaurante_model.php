<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restaurante_model extends CI_Model
{
    // Nome da Tabela
    private $tabela   = 'guia_restaurantes';

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
    public function get_restaurantes()
    {
        return $this->db->get($this->tabela)->result();
    }

    // Lista os restaurantes por categoria
    public function search_restaurantes($categoria)
    {   
        $this->db->like('tipo_cozinha_restaurante',$categoria);
        $this->db->or_like('tipo_comida_restaurante',$categoria);
        $this->db->or_like('tipo_servico_restaurante',$categoria);
        $query = $this->db->get($this->tabela)->result();
        return $query;
    }

    // Pega o restaurante pelo id
    public function get_restaurante($id)
    {
        $this->db->where('id_restaurante', $id);
        return $this->db->get($this->tabela)->result();
    }

    // Lista as fotos de restaurantes
    public function listar_fotos($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('categoria_foto', 'restaurante');
        return $this->db->get('guia_fotos')->result();
    }

    // Lista pratos principal
    public function listar_prato_principal($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('tipo_prato', 'pratoprincipal');
        return $this->db->get('guia_cardapios')->result();
    }

    // Lista todos os pratos
    public function listar_pratos($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('tipo_prato', 'normal');
        return $this->db->get('guia_cardapios')->result();
    }

    // Lista bebidas
    public function listar_bebidas($id)
    {
        $this->db->where('id_cliente', $id);
        $this->db->where('tipo_prato', 'bebida');
        return $this->db->get('guia_cardapios')->result();
    }

    // Listar promoções
    public function listar_promocao($id)
    {
        $this->db->where('id_cliente', $id);
        return $this->db->get('guia_promocoes')->result();
    }




}