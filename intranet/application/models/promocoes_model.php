<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promocoes_model extends CI_Model
{
    // Nome da tabela
    private $tabela = 'guia_promocoes';

    public function __construct()
    {
            parent::__construct();
    }

    // Lista o cardapio do cliente informado pelo parametro
    public function get_promocoes($_categoria, $_idCliente)
    {
        $this->db->where('categoria_promocao', $_categoria);
        $this->db->where('id_cliente', $_idCliente);
        return $this->db->get($this->tabela)->result();
    }

    // Grava o vídeo no banco
    public function save($_dados)
    {
        $this->db->insert($this->tabela, $_dados);
        return $this->db->insert_id();
    }

    // Atualiza no banco de dados
    public function update($_dados, $_idCardapio)
    {
        $this->db->where('id_cardapio', $_idCardapio);
        $this->db->update($this->tabela, $_dados);
        return true;
    }

    // Deleta o restaurante
    public function delete($_idCardapio)
    {
        $this->db->where('id_promocao', $_idCardapio);
        $this->db->delete($this->tabela);
        return true;
    }
}