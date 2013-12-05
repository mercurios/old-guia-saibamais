<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fotos_model extends CI_Model
{
    // Nome da tabela
    private $tabela = 'guia_fotos';

    public function __construct()
    {
            parent::__construct();
    }

    // Lista as fotos do cliente informado pelo parametro
    public function get_fotos($_categoria, $_idCliente)
    {
        $this->db->where('categoria_foto', $_categoria);
        $this->db->where('id_cliente', $_idCliente);
        $this->db->order_by('status_foto', 'desc');
        return $this->db->get($this->tabela)->result();
    }

    // Salva as informações no banco de dados
    public function save($_dados)
    {
        $this->db->insert($this->tabela, $_dados);
        return $this->db->insert_id();
    }

    // Salva no banco de dados
    public function update($id, $dados)
    {
        $this->db->where('id_foto', $id);
        $this->db->update($this->tabela, $dados);
        return true;
    }

    // Deleta
    public function delete($_id, $_categoria, $_idCliente)
    {
        $this->db->where('id_foto', $_id);
        $this->db->where('categoria_foto', $_categoria);
        $this->db->where('id_cliente', $_idCliente);
        $this->db->delete($this->tabela);
        return true;
    }

    // Pega todas as fotos com status iguais
    public function get_ativas($_categoria, $_idCliente)
    {
        $this->db->where('categoria_foto', $_categoria);
        $this->db->where('id_cliente', $_idCliente);
        $this->db->where('status_foto', 1);
        return $this->db->get($this->tabela)->result();
    }
    

}