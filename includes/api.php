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
