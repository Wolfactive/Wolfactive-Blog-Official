<?php
require_once THEME_DIR.'/includes/core/imagecow/imagecow/src/autoloader.php';
require_once THEME_DIR.'/includes/core/imagecow/imagecow/src/Image.php';
require_once THEME_DIR.'/includes/core/imagecow/imagecow/src/ImageException.php';

use Imagecow\Image;

/**
 * create_directory_image
 *
 * @param  mixed $path
 * @return void
 */
function create_directory_image($path){
    if(!is_dir($path)){
        mkdir($path,0755,TRUE);
    }
}

function clean_special_character_from_string($string) {
     // Replaces all spaces with hyphens.
    $string = str_replace(' ', '-', $string); 
    $string = str_replace('_', '-', $string); 
     // Removes special chars.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}
/**
 * crop_image
 *
 * @param  mixed $url
 * @param  mixed $width
 * @param  mixed $height
 * @return void
 */
function crop_image($url,$width,$height,$mode){   
    // analytic url
    $file = explode( 'uploads/', $url )[1];
    $name = explode( '.', $file )[0];
    $type = explode( '.', $file )[1];
    //$year = explode( '/', $name )[0];
    //$month = explode( '/', $name )[1];
    //$path = 'uploads/'.$year.'/'.$month;
    // create directory when directory exists;
    //create_directory_image($path);
    // do crop image
    if($mode == "webp"){
        $image = Image::fromFile($url,Image::LIB_IMAGICK);
    }else{
        $image = Image::fromFile($url);
    }    
    $image->autoRotate();
    $image->resizeCrop($width, $height,Image::CROP_ENTROPY);
    $image->quality(60);
    $image->format($type);   
    $image->save('uploads/'.$name.'-wolfactive-'.$width.'x'.$height.'.'.$type);
}

/**
 * get_image_crop_url
 *
 * @param  mixed $url
 * @param  mixed $width
 * @param  mixed $height
 * @return void
 */
function get_image_crop_url($url,$width,$height){
    $file = explode( 'uploads/', $url )[1];
    $name = explode( '.', $file )[0];
    $type = explode( '.', $file )[1];    
    $file_path_check_crop = 'uploads/'.$name.'-wolfactive-'.$width.'x'.$height.'.'.$type;
    $file_name_path_crop = get_bloginfo('url').'/'.'uploads/'.$name.'-wolfactive-'.$width.'x'.$height.'.'.$type;
    if (!file_exists($file_path_check_crop)) {
        crop_image($url,$width,$height,'nomarl');
    } 
    return $file_name_path_crop;
}
/**
 * the_image_crop_url
 *
 * @param  mixed $url
 * @param  mixed $width
 * @param  mixed $height
 * @return void
 */
function the_image_crop_url($url,$width,$height){
    $file = explode( 'uploads/', $url )[1];
    $name = explode( '.', $file )[0];
    $type = explode( '.', $file )[1];    
    $file_path_check_crop = 'uploads/'.$name.'-wolfactive-'.$width.'x'.$height.'.'.$type;
    $file_name_path_crop = get_bloginfo('url').'/'.'uploads/'.$name.'-wolfactive-'.$width.'x'.$height.'.'.$type;
    if (!file_exists($file_path_check_crop)) {
        crop_image($url,$width,$height,'nomarl');
    } 
    echo $file_name_path_crop;
}

/**
 * the_image_crop
 *
 * @param  mixed $url
 * @param  mixed $width
 * @param  mixed $height
 * @return void
 */
function the_image_crop($url,$width,$height){
    $file = explode( 'uploads/', $url )[1];
    $name = explode( '.', $file )[0];
    $type = explode( '.', $file )[1];
    $types = $type;
    if($type === "jpg"){
        $types = "jpeg";
    }
    $title = explode( '/', $name )[2];
    $alt = clean_special_character_from_string($title).'-wolfactive-'.$width.'x'.$height;
    $file_path_check_crop = 'uploads/'.$name.'-wolfactive-'.$width.'x'.$height.'.'.$type;
    $file_name_path_crop = get_bloginfo('url').'/'.'uploads/'.$name.'-wolfactive-'.$width.'x'.$height.'.'.$type;
    $whitelist = array(
        '127.0.0.1',
        '::1'
    );    
    if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
        if (!file_exists($file_path_check_crop)) {
            crop_image($url,$width,$height,'webp');
        } 
        $output  = '<picture>';
        $output .= '<source src="'.get_bloginfo('url').'/'.'uploads/'.$name.'-'.$width.'x'.$height.'.webp" type="image/webp" >';
        $output .= '<source src="'.$file_name_path_crop.'" type="image/'.$types.'" >';
        $output .= '<img src="'.$file_name_path_crop.'" alt="'.$alt.'" >';
        $output .= '<picture>';
        echo $output;
    }else{
        if (!file_exists($file_path_check_crop)) {
            crop_image($url,$width,$height,'nomarl');
        } 
        echo '<img src="'.$file_name_path_crop.'" alt="'.$alt.'" >';
    }    
}


/**
 * get_thumbnail_crop_url
 *
 * @param  mixed $width
 * @param  mixed $height
 * @return void
 */
function get_thumbnail_crop_url($width,$height){
    $url = get_the_post_thumbnail_url();
    $file = explode( 'uploads/', $url )[1];
    $name = explode( '.', $file )[0];
    $type = explode( '.', $file )[1];    
    $file_path_check_crop = 'uploads/'.$name.'-wolfactive-'.$width.'x'.$height.'.'.$type;
    $file_name_path_crop = get_bloginfo('url').'/'.'uploads/'.$name.'-wolfactive-'.$width.'x'.$height.'.'.$type;
    if (!file_exists($file_path_check_crop)) {
        crop_image($url,$width,$height,'nomarl');
    } 
    return $file_name_path_crop;
}

/**
 * the_thumbnail_crop_url
 *
 * @param  mixed $width
 * @param  mixed $height
 * @return void
 */
function the_thumbnail_crop_url($width,$height){
    $url = get_the_post_thumbnail_url();
    $file = explode( 'uploads/', $url )[1];
    $name = explode( '.', $file )[0];
    $type = explode( '.', $file )[1];    
    $file_path_check_crop = 'uploads/'.$name.'-wolfactive-'.$width.'x'.$height.'.'.$type;
    $file_name_path_crop = get_bloginfo('url').'/'.'uploads/'.$name.'-wolfactive-'.$width.'x'.$height.'.'.$type;
    if (!file_exists($file_path_check_crop)) {
        crop_image($url,$width,$height,'nomarl');
    } 
    echo $file_name_path_crop;
}

/**
 * the_thumbnail_crop
 *
 * @param  mixed $width
 * @param  mixed $height
 * @return void
 */
function the_thumbnail_crop($width,$height){
    $url = get_the_post_thumbnail_url();
    $file = explode( 'uploads/', $url )[1];
    $name = explode( '.', $file )[0];
    $type = explode( '.', $file )[1];    
    //$title = explode( '/', $name )[2];
    $alt = clean_special_character_from_string($name).'-wolfactive-'.$width.'x'.$height;
    $file_path_check_crop = 'uploads/'.$name.'-wolfactive-'.$width.'x'.$height.'.'.$type;
    $file_name_path_crop = get_bloginfo('url').'/'.'uploads/'.$name.'-wolfactive-'.$width.'x'.$height.'.'.$type;
    $whitelist = array(
        '127.0.0.1',
        '::1'
    );    
    if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
        if (!file_exists($file_path_check_crop)) {
            crop_image($url,$width,$height,'webp');
        } 
        $output  = '<picture>';
        $output .= '<source src="'.get_bloginfo('url').'/'.'uploads/'.$name.'-wolfactive-'.$width.'x'.$height.'.webp" type="image/webp" >';
        $output .= '<source src="'.$file_name_path_crop.'" type="image/'.$types.'" >';
        $output .= '<img src="'.$file_name_path_crop.'" alt="'.$alt.'" >';
        $output .= '<picture>';
        echo $output;
    }else{
        if (!file_exists($file_path_check_crop)) {
            crop_image($url,$width,$height,'nomarl');
        } 
        echo '<img src="'.$file_name_path_crop.'" alt="'.$alt.'" >';
    }    
}

