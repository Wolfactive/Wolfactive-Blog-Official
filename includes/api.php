<?php
/*create search api for blog*/
add_action('rest_api_init','blogRegisterApiSearch');
function blogRegisterApiSearch(){
  register_rest_route('blog-api/v1','/blog/offset=(?P<offset>\d+)&category=(?P<category>[a-z]+[[:punct:]]+[a-z]+|[a-z]+)',array(
    'methods'   =>  WP_REST_SERVER::READABLE,
    'callback'  =>  'blogApiQuery',
    'args' => [
        'offset',
        'category'
    ],
  ));
}
function blogApiQuery( $request ) {
    // Here we are accessing the path variable 'id' from the $request.
    $blog = prefix_blogApiQuery( $request['offset'],$request['category'] );
    return rest_ensure_response( $blog );
}

// A simple function that grabs a book title from our blogsby ID.
function prefix_blogApiQuery( $offset,$category) {
    if($category === "all-blog"){
      $blogList = new WP_Query(array(
        'post_status'   => 'publish',
        'post_type'     => 'theme_products',
        'posts_per_page'=> '100000000000',
        'showposts'     =>  9,
        'offset'        => $offset,
        'order'         => 'DESC',
        'order_by'      =>  'date',        
      ));
    }else{
      $blogList = new WP_Query(array(
        'post_status'   => 'publish',
        'post_type'     => 'theme_products',
        'posts_per_page'=> '100000000000',
        'showposts'     =>  9,
        'offset'        => $offset,
        'order'         => 'DESC',
        'order_by'      =>  'date',
        'tax_query'     =>  array(
          array(
            'taxonomy'      => 'cat-theme',
            'field'         => 'slug',
            'terms'         =>  $category
          )
        )
      ));
    }
    $blogResult = array();
    if($blogList->have_posts()):
    while($blogList->have_posts()){
    $blogList->the_post();
      array_push($blogResult,
      array(
        'title'             => get_the_title(),
        'date'              => get_the_date(),
        'thumbnail'         => get_the_post_thumbnail(),
        'url'               => get_permalink(),
        )
      );
    };
    else:
      if($offset === 0):
        return new WP_Error( 'rest_not_found', esc_html__( 'Hiện đang cập nhật bài viết cho mục này', 'wolfactive' ), array( 'status' => 200 ) );
      elseif($offset > 0):
      return new WP_Error( 'rest_empty_found', esc_html__( '', 'wolfactive' ), array( 'status' => 200 ) );
      endif;
    endif;
    return $blogResult;
}
/*create search api for blog*/
add_action('rest_api_init','blogSubmitEmail');
function blogSubmitEmail(){
  register_rest_route('blog-api/v1','/submit-email',array(
    'methods'   =>  "POST",
    'callback'  =>  'blogSubmitEmailDb',    
  ));
}
function blogSubmitEmailDb( $request ) {
    // Here we are accessing the path variable 'id' from the $request.
    $submit = prefix_blogSubmitDB( );
    return rest_ensure_response( $submit );
}

// A simple function that grabs a book title from our blogsby ID.
function prefix_blogSubmitDB() {    
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if ($contentType === "application/json") {
      //Receive the RAW post data.
      $content = trim(file_get_contents("php://input"));
      $decoded = json_decode($content, true);      
      
      // setup default result data
      $result = array(            
        'status' => 0,
        'message' => '',
        'error'=>'',           
    );                     
    $checkEmailsubmit = checkEmailSubmit($decoded['email']);
    if(!$checkEmailsubmit){
        $subscriber_id =  wp_insert_post( 
            array(
                'post_type'=>'submit_email',
                'post_title'=> explode("@",$decoded['email'])[0],
                'post_status'=>'publish',
            ), 
            true
        );
        // add/update custom meta data
        update_field('email_data',$decoded['email'], $subscriber_id);
        $result['message'] = "Đăng ký thành công";
    }else{
        $result['message'] = "Email này đã tồn tại";
    } 
  }
  // return result as json       
  email_return_json($result);   
}
// Helper function to submit
function checkEmailSubmit($email){
  $check_submit = 0;
  $subscriber_query = new WP_Query( 
      array(
          'post_type'		=>	'submit_email',
          'posts_per_page' => 1,
          'meta_key' => 'email_data',
          'meta_value' => $email,
      )
  );  
  // IF the subscriber exists...
  if( $subscriber_query->have_posts() ):    
      // get the subscriber_id
      $subscriber_query->the_post();
      $check_submit = get_the_ID();        
  endif;
  return $check_submit;
}
function email_return_json( $php_array ) {	
// encode result as json string
$json_result = json_encode( $php_array );	
// return result
die( $json_result );	
// stop all other processing 
exit;

}