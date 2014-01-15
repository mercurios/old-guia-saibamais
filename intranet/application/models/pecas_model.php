<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pecas_model extends CI_Model
{

    public function __construct()
    {
            parent::__construct();
    }

    // Lista as fotos do cliente informado pelo parametro
    public function get_pecas($_idCliente)
    {
        $this->db->where('id_teatro', $_idCliente);
        return $this->db->get('guia_pecas')->result();
    }

    // Salva as informações no banco de dados
    public function save($_dados)
    {
        $this->db->insert('guia_pecas', $_dados);
        return $this->db->insert_id();
    }

    // 
    public function get_peca($_id)
    {
        $this->db->where('id_peca', $_id);
        return $this->db->get('guia_pecas')->result();
    }

    // Atualiza no banco de dados
    public function update($_id, $_dados)
    {
        $this->db->where('id_peca', $_id);
        $this->db->update('guia_pecas', $_dados);
        return true;
    }

    // Deleta o restaurante
    public function delete($_id)
    {
        $this->db->where('id_peca', $_id);
        $this->db->delete('guia_pecas');
        return true;
    }
}