<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function gerar_miniatura( $image, $width, $height, $miniatua = TRUE ) {

    // Get the CodeIgniter super object
    $CI =& get_instance();

    // Carrega a biblioteca
    $CI->load->library('image_lib');

    // Limpa todo histórico da image_lib
    $CI->image_lib->clear();

    // Configuração da biblioteca
    $config['image_library'] = 'gd2';

    
}
/* End of file Thumbimages.php */