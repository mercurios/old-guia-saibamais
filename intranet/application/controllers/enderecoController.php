<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EnderecoController extends CI_Controller {

	// Método construtor
    public function __construct()
    {
        parent::__construct();

        // Carrega o model enderecos
        $this->load->model('Enderecos_model', 'enderecosmodel');

        // Verifica se o usuario esta logado
        if (!$this->session->userdata('session_id') || !$this->session->userdata('logado'))
        {
            redirect('users/login');
        }
    }

	// Método obrigatório no CI
	public function index()
	{

	}

    // Pega todas as cidades
    function getCidades($_id) {
        
        // Pega as cidades conforme o id do estado
        $cidades = $this->enderecosmodel->get_cidades($_id);
        
        // Verifica se retornou algum resultado
        if( empty ( $cidades ) ) 
            return '{ "nome": "Nenhuma cidade encontrada" }';
                    
        // Cria um array com os resultados
        $arr_cidade = array();

        foreach ($cidades as $cidade) 
        {    
            $arr_cidade[] = '{"id":' . $cidade->cd_cidade . ',"nome":"' . $cidade->ds_cidade_nome . '"}';                    
        }
            
        echo '[ ' . implode(",", $arr_cidade) . ']';
            
        return;
    }

    // Pega todos bairros da cidade informada
    function getBairros($_id) {
        
        // Pega os bairros com o id da cidade informada no parametro
        $bairros = $this->enderecosmodel->get_bairros($_id);
        
        // Caso retorne nulo, exibe a msg
        if( empty ( $bairros ) ) 
                return '{ "nome": "Nenhum bairro encontrado" }';
        
        // Transforma o resultado em array            
        $arr_bairro = array();

        foreach ($bairros as $bairro) {
                
                $arr_bairro[] = '{"id":' . $bairro->cd_bairro . ',"nome":"' . $bairro->ds_bairro_nome . '"}';
                        
        }
            
        echo '[ ' . implode(",",$arr_bairro) . ']';
        
        return;
    }
    

    
}