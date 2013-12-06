<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chamadas_model extends CI_Model
{
    // Construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Lista as chamadas
    public function get_chamadas($_categoria)
    {
        $this->db->where('categoria_chamada', $_categoria);
        return $this->db->get('guia_chamadas')->result();
    }

    // Lista a chamada pelo id
    public function get_chamada($_id)
    {
        $this->db->where('id_chamada', $_id);
        return $this->db->get('guia_chamadas')->result();
    }

    // Atualiza no banco de dados
    public function update($_dados, $_idChamada)
    {
        $this->db->where('id_chamada', $_idChamada);
        $this->db->update('guia_chamadas', $_dados);
        return true;
    }
}