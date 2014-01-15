<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos_model extends CI_Model
{
    // Construtor
    public function __construct()
    {
        parent::__construct();
    }

    // Pega todos os resultados com o id informado
    public function all_eventos()
    {
        $this->db->select('*');
        $this->db->from('guia_eventos');
        $this->db->join('guia_bairros', 'guia_bairros.cd_bairro = guia_eventos.bairro_evento');
        $this->db->join('guia_cidades', 'guia_cidades.cd_cidade = guia_eventos.cidade_evento');
        return $this->db->get()->result();
    }

    // Pega uma acomodação por id
    public function get_evento($_idevento)
    {
        $this->db->where('id_evento', $_idevento);
        return $this->db->get('guia_eventos')->result();
    }

    // Grava no banco
    public function save($_dados)
    {
        $this->db->insert('guia_eventos', $_dados);
        return $this->db->insert_id();
    }

    // Atualiza no banco de dados
    public function update($_id, $_dados)
    {
        $this->db->where('id_evento', $_id);
        $this->db->update('guia_eventos', $_dados);
        return true;
    }

    // Deleta o evento
    public function delete($_idevento)
    {
        $this->db->where('id_evento', $_idevento);
        $this->db->delete('guia_eventos');
        return true;
    }

}