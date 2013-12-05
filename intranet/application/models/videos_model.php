<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videos_model extends CI_Model
{
    // Nome da tabela
    private $tabela = 'guia_videos';

    // Construtor
    public function __construct()
    {
            parent::__construct();
    }

    // Pega o vídeo pelos parametros passados
    public function get_video($_categoria, $_idCliente)
    {
        $this->db->where('categoria_video', $_categoria);
        $this->db->where('id_cliente', $_idCliente);
        return $this->db->get($this->tabela)->result();
    }

    // Grava o vídeo no banco
    public function save($_dados)
    {
        $this->db->insert($this->tabela, $_dados);
        return $this->db->insert_id();
    }

    // atualiza no banco de dados
    public function update($_categoria, $_idcliente, $_dados)
    {
        $this->db->where('categoria_video', $_categoria);
        $this->db->where('id_cliente', $_idcliente);
        $this->db->update($this->tabela, $_dados);
        return true;
    }

    // Deleta
    public function delete($_categoria, $_idcliente)
    {   
        $this->db->where('categoria_video', $_categoria);
        $this->db->where('id_cliente', $_idcliente);
        $this->db->delete($this->tabela);
        return true;
    }
}