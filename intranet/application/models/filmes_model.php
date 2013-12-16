<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filmes_model extends CI_Model
{

    public function __construct()
    {
            parent::__construct();
    }

    // Lista as fotos do cliente informado pelo parametro
    public function get_filmes($_idCliente)
    {
        $this->db->where('id_cinema', $_idCliente);
        return $this->db->get('guia_filmes')->result();
    }

    // Salva as informações no banco de dados
    public function save($_dados)
    {
        $this->db->insert('guia_filmes', $_dados);
        return $this->db->insert_id();
    }

    // 
    public function get_filme($_id)
    {
        $this->db->where('id_filme', $_id);
        return $this->db->get('guia_filmes')->result();
    }

    // Atualiza no banco de dados
    public function update($_id, $_dados)
    {
        $this->db->where('id_filme', $_id);
        $this->db->update('guia_filmes', $_dados);
        return true;
    }

    // Deleta o restaurante
    public function delete($_id)
    {
        $this->db->where('id_filme', $_id);
        $this->db->delete('guia_filmes');
        return true;
    }
}