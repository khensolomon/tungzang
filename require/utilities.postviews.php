<?php
/**
 * <?php setPostViews(get_the_ID()); ?>
 * <?php echo getPostViews(get_the_ID()); ?>
 */
 function setPostViews($postID) {
   $count_key = 'views';
   $count = get_post_meta($postID, $count_key, true);
   if($count){
     $count++; update_post_meta($postID, $count_key, $count);
   } else {
     delete_post_meta($postID, $count_key);
     add_post_meta($postID, $count_key, 1);
   }
 }
function getPostViews($postID){
  $count_key = 'views';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
    $count = "0";
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, $count);
  }
  return $count;
}

// Add it to a column in WP-Admin
function custom_views_column($columns) {
  $columns['views'] = __('Views');
  return $columns;
}
add_filter('manage_posts_columns', 'custom_views_column');

function custom_views_sortable($columns) {
  $columns['views'] = 'views';
  return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'custom_views_sortable');

function custom_views_manage_posts_column($column_name, $postID) {
	if($column_name === 'views') echo getPostViews($postID);
}
add_action('manage_posts_custom_column', 'custom_views_manage_posts_column', 10, 2);

function custom_views_request($vars) {
  if ( isset($vars['orderby']) && 'views' == $vars['orderby'] ) {
    $vars = array_merge( $vars, array(
      'meta_key' => 'views',
      'orderby' => 'meta_value_num')
    );
  }
  return $vars;
}
add_filter( 'request', 'custom_views_request' );
?>
