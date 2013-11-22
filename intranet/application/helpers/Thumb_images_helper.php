<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function image_thumb( $image_path, $width, $height, $titulo = NULL ) {
    // Get the CodeIgniter super object
    $CI =& get_instance();

    // Pega o caminho da pasta
    $pathinfo   = pathinfo($image_path);

    // Pega o nome da foto
    $img_name   = $pathinfo['filename'];

    // Path to image thumbnail
    $image_thumb = dirname( $image_path ) . '/thumb/' . $img_name . '_' . $height . '_' . $width . '.jpg';

    if ( !file_exists( $image_thumb ) ) {

        // Carrega a biblioteca
        $CI->load->library( 'image_lib' );

        // Configura a biblioteca images
        $config['image_library']    = 'gd2';
        $config['source_image']     = $image_path;
        $config['new_image']        = $image_thumb;
        $config['maintain_ratio']   = FALSE;
        $config['height']           = $height;
        $config['width']            = $width;

        // Inicia a biblioteca
        $CI->image_lib->initialize( $config );
        $CI->image_lib->resize();
        $CI->image_lib->clear();
    }

    return '<img src="' . base_url() . $image_thumb . '"  alt="'.$titulo.'" />';
}
/* End of file Thumbimages.php */