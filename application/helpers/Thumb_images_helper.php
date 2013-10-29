<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

function image_thumb( $image_path, $width, $height, $titulo = NULL ) {
    // Get the CodeIgniter super object
    $CI =& get_instance();

    // Pega o caminho da pasta
    $pathinfo   = pathinfo($image_path);

    // Pega o nome da foto
    $img_name   = $pathinfo['filename'];

    // Url completa da img
    $img_info = base_url($pathinfo['dirname']) . '/' . $img_name . '.' . $pathinfo['extension'];
    $img_info = getimagesize($img_info);
    
    $img_w = $img_info[0];   // largura
    $img_h = $img_info[1];   // altura

    // Path to image thumbnail
    $image_thumb = dirname( $image_path ) . '/thumb/' . $img_name . '_' . $height . '_' . $width . '.jpg';

    if ( !file_exists( $image_thumb ) ) {

        // Carrega a biblioteca
        $CI->load->library( 'image_lib' );
        $CI->image_lib->clear();

        // Configura a biblioteca images
        $image_config['image_library']  = 'gd2';
        $image_config['source_image']   = $image_path;
        $image_config['new_image']      = $image_thumb;
        $image_config['maintain_ratio'] = FALSE;
        $image_config['width']          = $width;
        $image_config['height']         = $height;
        $image_config['x_axis']         = '0';
        $image_config['y_axis']         = '0';
        $dim                            = (intval($img_w) / intval($img_h)) - ($image_config['width'] / $image_config['height']);
        $image_config['master_dim']     = ($dim > 0) ? "height" : "width";
        
        $CI->image_lib->initialize($image_config); 
        $CI->image_lib->resize();
        $CI->image_lib->crop();
    }

    return '<img src="' . base_url() . $image_thumb . '"  alt="'.$titulo.'" />';
}
/* End of file Thumbimages.php */