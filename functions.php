<?php
// CLEAN UP WP_HEAD
function cubiq_setup () {
    remove_action('wp_head', 'wp_generator');                
    remove_action('wp_head', 'wlwmanifest_link');            
    remove_action('wp_head', 'rsd_link');                   
    add_filter('show_admin_bar','__return_false');            
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );  
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    }
add_action('after_setup_theme', 'cubiq_setup');

function theming_scripts() {
// FONT
     wp_enqueue_style( 'font', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
     wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Lato:400,700', false );
         
// CSS
    wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css' );	
    //css for slider js which is in 'single-works.php'. js enqued here didn't work
    wp_enqueue_style( 'slippry', get_template_directory_uri() . '/css/slippry.css' );
// JS
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js' );
    wp_enqueue_script( 'hamburger', get_template_directory_uri() . '/js/hamburger.js' );
    wp_enqueue_script( 'panorama', get_template_directory_uri() . '/js/panorama.js' );
    wp_enqueue_script( 'filter_toggle', get_template_directory_uri() . '/js/filter_toggle.js' );
    }
    add_action( 'wp_enqueue_scripts', 'theming_scripts' );




//POST TYPES LIBS FOLDER
    include( get_template_directory() . '/libs/posttypes.php'); 
//UTILS LIBS FOLDER - FUNCTIONS FOR GENERAL USE
    include( get_template_directory() . '/libs/utils.php'); 

//ADD THEME SUPPORT
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form'));
    




//CREATING CUSTOM META BOX with META BOX PLUGIN
//ARTISTS
  function art_img_upload( $meta_boxes ) {
	$prefix = 'ar_';

	$meta_boxes[] = array(
		'id' => 'art_img_upload_id',
		'title' => esc_html__( 'Artists', 'Image Upload' ),
		'post_types' => 'artists',
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'art_img_upload',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Image Upload', 'Image Upload' ),
			),
			array(
				'id' => $prefix . 'source_site',
				'type' => 'url',
				'name' => esc_html__( 'URL', 'Image Upload' ),
			),
            array(
				'id' => $prefix . 'source_site_name',
				'type' => 'text',
				'name' => esc_html__( 'URL name', 'Artists' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'art_img_upload' );

//WORKS
 function works_img_upload( $meta_boxes ) {
	$prefix = 'wo_';

	$meta_boxes[] = array(
		'id' => 'works_img_upload_id',
		'title' => esc_html__( 'Works', 'Image Upload' ),
		'post_types' => 'works',
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'works_img_upload',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Image Upload', 'Image Upload' ),
			),
			array(
				'id' => $prefix . 'source_site',
				'type' => 'url',
				'name' => esc_html__( 'URL', 'Image Upload' ),
			),
            array(
				'id' => $prefix . 'source_site_name',
				'type' => 'text',
				'name' => esc_html__( 'URL name', 'Works' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'works_img_upload' );
// ENDCREATING CUSTOM META BOX with META BOX PLUGIN


/*
// SEARCH ALL TAXONOMIES, based on: http://projects.jesseheap.com/all-projects/wordpress-plugin-tag-search-in-wordpress-23
    function atom_search_where($where){
      global $wpdb;
      if (is_search())
        $where .= "OR (t.name LIKE '%".get_search_query()."%' AND {$wpdb->posts}.post_status = 'publish')";
      return $where;
    }

    function atom_search_join($join){
      global $wpdb;
      if (is_search())
        $join .= "LEFT JOIN {$wpdb->term_relationships} tr ON {$wpdb->posts}.ID = tr.object_id INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id=tr.term_taxonomy_id INNER JOIN {$wpdb->terms} t ON t.term_id = tt.term_id";
      return $join;
    }

    function atom_search_groupby($groupby){
      global $wpdb;

      // we need to group on post ID
      $groupby_id = "{$wpdb->posts}.ID";
      if(!is_search() || strpos($groupby, $groupby_id) !== false) return $groupby;

      // groupby was empty, use ours
      if(!strlen(trim($groupby))) return $groupby_id;

      // wasn't empty, append ours
      return $groupby.", ".$groupby_id;
    }

    add_filter('posts_where','atom_search_where');
    add_filter('posts_join', 'atom_search_join');
    add_filter('posts_groupby', 'atom_search_groupby');
// END SEARCH ALL TAXONOMIES
*/

//ADDING SVG TO WORDPRESS
    function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
    }
    add_action('upload_mimes', 'add_file_types_to_uploads');
//END ADDING SVG TO WORDPRESS


//MENU REGISTRATION
if(function_exists('register_nav_menus')){
    register_nav_menus(array(
        'main_nav'=>'Main menu'
    ));
}
//END MENU REGISTRATION



//REMOVE URL AND EMAIL FROM COMMENTS FORM
function remove_website_field($fields)
{
  if(isset($fields['url']))
   unset($fields['url']);
  return $fields;
}

add_filter('comment_form_default_fields', 'remove_website_field');  
 
function remove_email_field($fields)
{
  if(isset($fields['email']))
   unset($fields['email']);
  return $fields;
}

add_filter('comment_form_default_fields', 'remove_email_field');

//add placeholder text -> CUSTOM FIELDS
function my_update_comment_fields( $fields ) {

$fields['author'] =
		'<p class="comment-form-author">
			<label for="author"></label>
			<input id="author" name="author" type="text" placeholder=" Your name... *" />
		</p>';
    return $fields;
}
add_filter( 'comment_form_default_fields', 'my_update_comment_fields' );

//add placeholder text -> TEXTAREA
function my_update_comment_field( $comment_field ) {

  $comment_field =
    '<p class="comment-form-comment">
            <label for="comment"></label>
            <textarea required id="comment" name="comment" placeholder=" What do you think... *"></textarea>
        </p>';

  return $comment_field;
}
add_filter( 'comment_form_field_comment', 'my_update_comment_field' );


//make comment author field required if empty diplay ERROR
//function custom_validate_name() {
  //  if( empty($_POST[ 'author' ])) // do you url validation here (I am not a regex expert)
    //   wp_die(('Please enter a name') );
//}

//add_action('pre_comment_on_post', 'custom_validate_name');





//COMMENTS FORMATING
   function format_comment($comment, $args, $depth) {
    //odwoalnie sie do zmiennej globalne - cos co juz gdzies tam istnieje tu: comment
    $GLOBALS['comment'] = $comment; ?>
       
        
    <div class="comment">
          <h3><?php comment_author(); ?> on  <?php comment_date('n-j-Y'); ?> at <?php comment_time('H.i'); ?></h3>
        <?php comment_text(); ?>
    <?php }
































?>








