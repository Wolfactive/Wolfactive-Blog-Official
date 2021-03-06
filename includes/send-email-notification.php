<?php 
function post_push_noti_data_list($ID, $post){
    if ('publish' !== $new_status || 'publish' === $old_status || 'theme_products' !== get_post_type($post) )
        return;
    $dataQuery = new WP_Query(array(
        'post_type'     => 'submit_email',   
    ));
    if($dataQuery->have_posts()):
        while($dataQuery->have_posts()){$dataQuery->the_post();
            $title = $post->post_title;
            $permalink = get_permalink( $ID );
            $edit = get_edit_post_link( $ID, '' );
            $to[] = sprintf( '%s <%s>', get_the_title(), get_field('email_data') );
            $subject = sprintf( 'Published: %s', $title );
            $message = sprintf ('Hi, %s! We "%s" have been published new post.' . "\n\n", get_the_title(), $title );
            $message .= '<img src="'.get_theme_file_uri('dist/images/wolfactive-news-notification.png').'"/>';
            $headers[] = '';
            wp_mail( $to, $subject, $message, $headers );
        };
    endif;
}
add_action( 'transition_post_status', 'post_push_noti_data_list', 10, 2 );